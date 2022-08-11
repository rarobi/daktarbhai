<?php

namespace App\Http\Controllers\Pages\Subscription;
use App\Api\Transformers\V1\BlinkSubscriptionTransformer;
use App\Api\Transformers\V1\BlinkUnsubscriptionTransformer;
use App\Http\Controllers\ApiAuthenticatedListController;
use Illuminate\Http\Request;
use Session;

class SubscriptionController extends ApiAuthenticatedListController
{
    protected $blinkSubscriptionTransformer;
    protected $blinkUnsubscriptionTransformer;
    public function __construct(
        BlinkSubscriptionTransformer $blinkSubscriptionTransformer,
        BlinkUnsubscriptionTransformer $blinkUnsubscriptionTransformer
    )
    {
        $this->blinkSubscriptionTransformer = $blinkSubscriptionTransformer;
        $this->blinkUnsubscriptionTransformer = $blinkUnsubscriptionTransformer;
        parent::__construct();
    }

    private function checkUser()
    {

        if(session('user')) {
            $user = decrypt(session('user'));

        } else {
            $myProfileUrl = $this->getProfileInfoApi();
            $params                        = [
                'api_token'          => decrypt(\Cookie::get('_tn')) // session('user')->access_token
            ];
            $profileApiResult = $this->getQueryArticleListDataApi($myProfileUrl, $params);

            if(isset($profileApiResult->status_code) && $profileApiResult->status_code == 200) {
                $user = $profileApiResult->user;
                session(['user' => encrypt($user)]);
            } else {
                \Cookie::queue(\Cookie::forget('_tn'));

                return redirect()->route('frontend.signin');
            }
        }

        return $user;
    }

    public function subscriptionConfirmation(Request $request, $planId)
    {
        if(config("misc.web.subscription_active") != 'active') {
            abort(404);
        }

        if($planId  == 'trial') {

            $plan=  'trial';

        } else {
            $url = $this->getSubscriptionPlanInformation();
            $subscriptionPlan = $this->getDataFromApi($url.'?plan_id='.$planId);
            session(['chosen_plan'=> json_encode($subscriptionPlan)]);
            if($subscriptionPlan->status_code != 200) {
                abort(404,'');
            }

            $plan   =   $subscriptionPlan->plan;
            if(!count((array)$plan)){
                $plan   =   null;
            } else {
                $plan   =   $plan;
            }
        }

        $user = $this->checkUser();
        $activePlans    =   isset($user->subscribed_plans)?$user->subscribed_plans:[];

        $plans  =   [];
        foreach ($activePlans as $key=>$planInfo) {
            $plans[$key]    =   $planInfo->plan_slug;
        }

        if(in_array($planId,$plans)) {
            $message    =   'You have already purchased this plan ';
            $status     =   404;
            abort($status,$message);
        }

        if($user) {

            $subscriptionNumber   = $user->user_id;
        } else {
            $subscriptionNumber =   null;
        }

        // following code is required when we fixed the provider
        // start

        $providers = isset($plan->providers_info)?$plan->providers_info:null;
        $providerId =   null;


        if(is_null($providers)) {
            $message    =   'Currently this plan is not available';
            $status     =   404;
            abort($status,$message);
        } else {
            /* TODO choose one provider when necessary */
            foreach ($providers as $provider) {
                if(strtolower($provider->name) == 'sslwireless') {
                    /*
                    TODO this is required because only payment method currently available is sslWireless
                    TODO need to change it to adjust dynamic value
                    */
                    $providerId =   $provider->id;
                } elseif (strtolower($provider->name) == 'ipay') {
                    $providerId =   $provider->id;
                } elseif (strtolower($provider->name) == 'banglalink') {
                    $providerId =   $provider->id;
                }
            }

            if(is_null($providerId)) {
                $message    =   'Currently this plan is not available';
                $status     =   404;
                abort($status,$message);
            }
        }

        // flow end

        return view('frontend.pages.subscription.subscription-confirmation')->with(compact('plan','subscriptionNumber','user','providerId'));


    }

    public function confirmedSslSubscription()
    {
        if (\Session::has('subscriptionConfirmation'))
        {
            $data   =   json_decode(session('subscriptionConfirmation'));
            \Session::forget('subscriptionConfirmation');
            if($data->code == 200) {

                if(session('user')) {
                    \Session::forget('user');
                    $user = $data->user;
                    session(['user' => encrypt($user)]);
                }

                $message    =   "Congratulations. You have subscribed to Daktarbhai. <br/> An email has been sent to you with subscription details. ";
                $status     =   200;

            } else {
                $message    =   "Subscription failed ";
                $status     =   400;
            }
        } else {
            $message    =   'technical error';
            $status     =   500;
        }
        return view('frontend.pages.subscription.subscription-success')->with(compact('message','status'));
    }

    public function unSubscribe(Request $request)
    {
        if(!$request->has('provider') || !$request->has('plan_id')) {
            return response()->json(['status' => 'Please provide valid provider information']);
        }
        Session::forget('user');
        $user = $this->checkUser();

        if($user) {
            $token = $user->access_token;
        } else {
            return response()->json(['status' => 'Not an authenticated user']);
        }

        if(!$user->is_subscribed) {
            return response()->json(['status' => 'No active subscription found']);
        }

        $url = $this->disableSubscription();
        $parameters = [
            'api_token' => $token,
            'provider'  => $request->input('provider'),
            'plan_id'   => $request->input('plan_id'),
            'unsubscription_platform' => 'Website'
        ];

        $enabledSubscription = $this->postDataFromApi($url,$parameters);

        if($enabledSubscription->status_code == 200) {
            \Session::forget('user');
        }
        $this->checkUser();

       return response()->json($enabledSubscription);
    }

    public function trialSubscriptionConfirmation() {
        $user   =   $this->checkUser();

        $url   =   $this->enableTrialSubscriptionPlan();
        $params =   [
            'api_token' =>  $user->access_token,
            'plan_id'   =>  'trial'
        ];

        $result =   $this->postDataFromApi($url, $params);

        if($result->status_code == 200) {
            return redirect()->route('frontend.subscription.plan');
        } else if($result->status_code == 400){
            return redirect()->route('frontend.subscription.plan');
        } else {
            $message    =   'Currently this plan is not available';
            $status     =   404;
            abort($status,$message);
        }

    }

    /**
     * @param Request $request
     */
    public function makePayment(Request $request) {
        $chosenPlanDetails  =   json_decode(session('chosen_plan'),true);


        $request['plan_name']   =   $chosenPlanDetails['plan']['name'];
        $request['plan_original_price']   =   $chosenPlanDetails['plan']['price'];
        $request['plan_discounted_price']   =   0;

        if(! is_null($chosenPlanDetails['plan']['discount_information'])) {
            foreach ($chosenPlanDetails['plan']['discount_information'] as $discount) {
                if($discount['provider_id'] == $request->input('provider_id')) {
                    $request['plan_discounted_price']   =   $this->getPlanPrice($request['plan_original_price'],$discount);

                }
            }
        }

        $data['transactionInfo'] = json_encode($request->except('_token'));
        $jsonDecodedData = json_decode($data['transactionInfo']);

        $data['planName'] = $jsonDecodedData->plan_name;
        $data['planDiscountedPrice'] = $jsonDecodedData->plan_discounted_price;
        $data['planOriginalPrice'] = $jsonDecodedData->plan_original_price;


        return view('frontend.pages.subscription.bkash-payment', $data);
    }

    public function confirmBkashPayment(Request $request) {

        $trxNumber = $request->input('trx_number');

        // Check TRX Number Duplicacy From Daktarbhai
        $checkTrxToDaktarbhai = $this->checkTrxToDaktarbhai($trxNumber);

        // Check TRX Number Duplicacy From Agent Panel
        $checkTrxToAgentPanel = $this->checkTrxToAgentPanel($trxNumber);

        if (!$checkTrxToDaktarbhai && !$checkTrxToAgentPanel) {

            $userPlanProviderIDs = json_decode($request->input('userPlanProviderIDs'));

            $userID     = $userPlanProviderIDs->membership_id;
            $planID     = $userPlanProviderIDs->plan_id;
            $providerID = $userPlanProviderIDs->provider_id;

            $bkashTrxUrl = $this->getBkashTransactionUrl();

            $params = [
                'api_token'     => decrypt(session('user'))->access_token,
                'trxID'         => $trxNumber,
                'userID'        => $userID,
                'planID'        => $planID,
                'providerID'    => $providerID,
            ];

            $result = $this->postDataFromApi($bkashTrxUrl, $params);
//            dd($result);

            // If everything is OK, then back to "My Subscription Page"
            if($result->status_code == 200) {
                $status = "You've successfully subscribe to Daktarbhai";
                return redirect()->route('frontend.subscription.history')->with(compact('status'));
            } else {
                $message = "Subscription Failed. ".$result->message;
                $status  = $result->status_code;
            }
        } else {
            $message = "Subscription Failed. Your Provided Transaction Number Already Used";
            $status  = 400;
        }

        return view('frontend.pages.subscription.subscription-success')->with(compact('message','status'));
    }

    /**
     * @param $trxNumber
     * @return mixed
     */
    public function checkTrxToDaktarbhai($trxNumber) {

        $bkashTrxIDCheckUrl = $this->getBkashTrxIDCheckApiUrl();

        $params = [
          'api_token' => decrypt(session('user'))->access_token,
          'trx_id' => $trxNumber
        ];

        $bkashTrx = $this->postDataFromApi($bkashTrxIDCheckUrl, $params);

        if ($bkashTrx->statusCode == 200) {
            return $bkashTrx->transactionStatus;
        }
    }

    /**
     * @param $trxNumber
     * @return mixed
     */
    public function checkTrxToAgentPanel($trxNumber) {

        $bkashTrxIDCheckUrl = $this->getBkashTrxIDCheckApiUrlInAgentPanel();

        $params = ['trx_id' => $trxNumber];

        $bkashTrx = $this->postDataFromAgentApi($bkashTrxIDCheckUrl, $params);

        if ($bkashTrx->statusCode == 200) {
            return $bkashTrx->transactionStatus;
        }
    }

    public function getPlanPrice($originalPrice,$discountInfo) {
        $discountedPrice = 0;
        if($discountInfo['unit'] == 'tk') {
            $discountedPrice = $originalPrice-$discountInfo['amount'];
        } elseif ($discountInfo['unit'] == '%') {
            $discountedPrice = $originalPrice- ceil(($originalPrice*$discountInfo['amount']) / 100);
        }

        return $discountedPrice;

    }


    public function subscriptionConfirmationForBlink(Request $request, $planId)
    {
        if(env('SUBSCRIPTION_ACTIVE') != 'active') {
            abort(404);
        }

        if($planId  == 'trial') {
            $plan=  'trial';
        } else {
            $url = $this->getSubscriptionPlanInformation();
            $subscriptionPlan = $this->getDataFromApi($url.'?plan_id='.$planId);
            session(['chosen_plan'=> json_encode($subscriptionPlan)]);
            if($subscriptionPlan->status_code != 200) {
                abort(404,'');
            }

            $plan   =   $subscriptionPlan->plan;
            if(!count((array)$plan)){
                $plan   =   null;
            } else {
                $plan   =   $plan;
            }
        }

        $user = $this->checkUser();
        $activePlans    =   isset($user->subscribed_plans)?$user->subscribed_plans:[];

        $plans  =   [];
        foreach ($activePlans as $key=>$planInfo) {
            $plans[$key]    =   $planInfo->plan_slug;
        }

        if(in_array($planId,$plans)) {
            $message    =   'You have already purchased this plan ';
            $status     =   404;
            abort($status,$message);
        }

        if($user) {

            $subscriptionNumber   = $user->user_id;
        } else {
            $subscriptionNumber =   null;
        }

        // following code is required when we fixed the provider
        // start

        $providers = isset($plan->providers_info)?$plan->providers_info:null;
        $providerId =   null;


        if(is_null($providers)) {
            $message    =   'Currently this plan is not available';
            $status     =   404;
            abort($status,$message);
        } else {
            /* TODO choose one provider when necessary */
            foreach ($providers as $provider) {
                if(strtolower($provider->name) == 'sslwireless') {
                    /*
                    TODO this is required because only payment method currently available is sslWireless
                    TODO need to change it to adjust dynamic value
                    */
                    $providerId =   $provider->id;
                } elseif (strtolower($provider->name) == 'ipay') {
                    $providerId =   $provider->id;
                } elseif (strtolower($provider->name) == 'banglalink') {
                    $providerId =   $provider->id;
                }
            }

            if(is_null($providerId)) {
                $message    =   'Currently this plan is not available';
                $status     =   404;
                abort($status,$message);
            }
        }

        $nomineeRelations = [
            'parent'=>'Parent',
            'husband/wife'=>'Husband/Wife',
            'child'=>'Child',
            'other'=>'Other'
        ];

        // flow end


        return view('frontend.pages.subscription.subscription-confirmation-blink-user')->with(compact('plan','subscriptionNumber','user','providerId','nomineeRelations'));
    }

    public function blinkSubscription(Request $request){

//        $url        = $this->otpVerifyURL();
//
//        $input['api_key']           = 'BUFWICFGGNILMSLIYUVH';
//        $input['api_secret']        = 'WZENOMMJPOKHYOMJSPOGZNAGMPAEZDMLNVXGMTVE';
//        $input['platform']          = 'web';
//        $input['mobile']            = "+880".substr($request->mobile_number, -10, 10);
//        $input['otp_code']          = $request->otp;
//
//        $result = $this->postDataFromApi($url, $input);

//        if( $result != null && $result->status_code == 200) {
//            $request->validate([
//                'membership_id'=>'required',
//                'customer_name'=>'required',
//                'date_of_birth'=>'required',
//                'gender'=>'required',
//                'mobile_number'=>'required | bd_phone | min:10',
//                'nominee_name'=>'required',
//                'nominee_relation'=>'required'
//            ]);
//            $blinkSubscriptionUrl = $this->postBlinkSubscriptionApi();
//            $params = $this->blinkSubscriptionTransformer->transform($request);
//            $result = $this->postDataFromBlinkApi($blinkSubscriptionUrl, $params);
//
//            if($result->status_code == 200) {
////                return redirect('profile')->with('success','Subscription completed successfully');
//                return redirect('profile')->with('success','Your subscription request is accepted successfully. You will get a SMS soon');
//            } else {
//                $url = '/subscription/blink/'.$request->plan_slug;
//                $msg = $result->error->message;
//                return redirect()->to($url)->with('error',"Subscription failed! $msg");
//            }
//
//        } else {
//            $url = '/subscription/blink/'.$request->plan_slug;
//            $msg = $result->error->message;
//            return redirect()->to($url)->with('error',"Subscription failed! $msg");
//        }

        $request->validate([
            'membership_id'=>'required',
            'customer_name'=>'required',
            'date_of_birth'=>'required',
            'gender'=>'required',
            'mobile_number'=>'required | bd_phone | min:10',
            'nominee_name'=>'required',
            'nominee_relation'=>'required'
        ]);
        $blinkSubscriptionUrl = $this->postBlinkSubscriptionApi();
        $params = $this->blinkSubscriptionTransformer->transform($request);
        $result = $this->postDataFromBlinkApi($blinkSubscriptionUrl, $params);

        if($result->status_code == 200) {
//                return redirect('profile')->with('success','Subscription completed successfully');
            return redirect('profile')->with('success','Your subscription request is accepted successfully. You will get a SMS soon');
        } else {
            $url = '/subscription/blink/'.$request->plan_slug;
            $msg = $result->error->message;
            return redirect()->to($url)->with('error',"Subscription failed! $msg");
        }

    }


    public function blinkUnsubscribe(Request $request){
        if(!$request->has('customer_membership_id')|| !$request->has('customer_mobile') || !$request->has('plan_slug'))
            return response()->json(['status'=>'Please provide valid information']);


        Session::forget('user');
        $user = $this->checkUser();

        if($user)
            $token  =   $user->access_token;
        else
            return response()->json(['status'=>'Not an authenticated user']);

        if(!$user->is_subscribed)
            return response()->json(['status'=>'No active subscription found']);

        $url = $this->postBlinkUnsubscriptionApi();
        $params  = $this->blinkUnsubscriptionTransformer->transform($request);
        $unsubscription = $this->postDataFromBlinkApi($url,$params);

        if($unsubscription->status_code == 200) {
            \Session::forget('user');
        }

        $this->checkUser();

        return response()->json($unsubscription);
    }

    public function generateOtpForBLSubscription(Request $request){

        $url        = $this->otpGenerateURL();


        $input['api_key']           = 'BUFWICFGGNILMSLIYUVH';
        $input['api_secret']        = 'WZENOMMJPOKHYOMJSPOGZNAGMPAEZDMLNVXGMTVE';
        $input['platform']          = 'web';
        $input['activity']          = 'banglalink-subscription';
        $mobile                     = $request->input('mobile');
        $input['mobile']            = "+880".substr($mobile, -10, 10);

        $result = $this->postDataFromApi($url, $input);

        return response()->json($result);

//        if($result->status_code == 400) {
//            return redirect('/signin');
//        }

    }

}