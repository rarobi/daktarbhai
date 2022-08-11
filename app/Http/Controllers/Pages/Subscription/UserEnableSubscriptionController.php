<?php

namespace App\Http\Controllers\Pages\Subscription;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiAuthenticatedListController;
use App\Http\Controllers\ApiListController;
use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: shuvrow
 * Date: 7/25/17
 * Time: 12:49 PM
 */
class UserEnableSubscriptionController extends ApiListController
{
    public function index()
    {
        $data['isBlUser'] = false;
        if(session('user')) {
            $user        = decrypt(session('user'));
            $user_mobile = $user->mobile;
            if ($user_mobile){
                $data['isBlUser'] = $this->isBanglalinkNo($user_mobile);
            }
        }

        $url = $this->getSubscriptionPlanList();

        $params =   [
            'platform'   =>  'web'
        ];

        $subscriptionResult = $this->getQueryArticleListDataApi($url, $params);

        if( $subscriptionResult != null && $subscriptionResult->status_code == 200) {
            $subscriptionPlans  =   ($subscriptionResult->plans);

            $planSlugList = [];
            foreach ($subscriptionPlans as $plan){
              array_push($planSlugList, $plan->plan_slug);
            }
            $data['plans'] = $planSlugList;
//            dd($data['plans']);
        } else {
            $data['plans'] = null;
        }

        return view('frontend.pages.subscription.index', $data);
    }

    public function packagesList(Request $request){
//    public function packagesList($requestedParams){

//        dd($request->param);

        $user   =   null;
        if(\Cookie::has('_tn')) {
            $myProfileUrl   =   $this->prefix.'/user/profile';
            $params                        = [
                'api_token'          => decrypt(\Cookie::get('_tn')) // session('user')->access_token
            ];
            $profileApiResult = $this->getQueryArticleListDataApi($myProfileUrl, $params);
            if(isset($profileApiResult->status_code) && $profileApiResult->status_code == 200) {
                \Session::forget('user');
                session(['user'=>encrypt($profileApiResult->user)]);
            }
        }

        $url = $this->getSubscriptionPlanList();

        $params =   [
            'platform'   =>  'web'
        ];

        $subscriptionPlans = $this->getQueryArticleListDataApi($url, $params);

        if( $subscriptionPlans != null && $subscriptionPlans->status_code == 200) {
            $subscriptionPlans  =   ($subscriptionPlans->plans);
            $activePlans    =   isset($profileApiResult)?isset($profileApiResult->user->subscribed_plans)?$profileApiResult->user->subscribed_plans:[]:[];

            $plans  =   [];
            foreach ($activePlans as $key=>$plan) {
                $plans[$key]    =   $plan->plan_id;
            }

//            dd($plans);
//            $planSlug = []
            foreach ($subscriptionPlans as $subscriptionPlan){
                $planSlug = $subscriptionPlan->plan_slug;

//                dd($planSlug);
                if ($request->param == 'bl' && ($planSlug == 'bl-daily' || $planSlug == 'bl-monthly' || $planSlug == 'bl-yearly')){
//                if ($requestedParams == 'bl' && ($planSlug == 'bl-daily' || $planSlug == 'bl-monthly' || $planSlug == 'bl-yearly')){
                    return view('frontend.pages.subscription.packages.banglalink-packages')->with(compact('subscriptionPlans','user','plans'));
                }
            elseif ($request->param == 'suchana' && ($planSlug == 'shuchana-1' || $planSlug == 'shuchana-2' || $planSlug == 'shuchana-3')){
//            elseif ($requestedParams == 'suchana' && ($planSlug == 'shuchana-1' || $planSlug == 'shuchana-2' || $planSlug == 'shuchana-3')){
                    return view('frontend.pages.subscription.packages.suchana-packages')->with(compact('subscriptionPlans','user','plans'));
                }
                elseif ($request->param == 'perona' && ($planSlug == 'prerona-1' || $planSlug == 'prerona-2' || $planSlug == 'prerona-3')){
//                elseif ($requestedParams == 'perona' && ($planSlug == 'prerona-1' || $planSlug == 'prerona-2' || $planSlug == 'prerona-3')){
                    return view('frontend.pages.subscription.packages.prerona-packages')->with(compact('subscriptionPlans','user','plans'));
                }
//                elseif ($requestedParams == 'protyasha' && ($planSlug == 'protyasha-1' || $planSlug == 'protyasha-2' || $planSlug == 'protyasha-3')){
                elseif ($request->param == 'protyasha' && ($planSlug == 'protyasha-1' || $planSlug == 'protyasha-2' || $planSlug == 'protyasha-3')){
                    return view('frontend.pages.subscription.packages.protyasha-packages')->with(compact('subscriptionPlans','user','plans'));
                }
            }


        } else if($subscriptionPlans->status_code == 500){
            abort(500);
        } else {
            $error = isset($subscriptionPlans->error->message) ? $subscriptionPlans->error->message : 'Some technical problem';
            return view('frontend.pages.subscription.index')->with(compact('error'));
        }

    }

    /**
     * Test bl number or not
     * @param $phone
     * @return bool
     */
    public function isBanglalinkNo($phone)
    {
        $phonePrefix = substr($phone, -11, 3);
        if ($phonePrefix == '019' || $phonePrefix == '014') {
            return true;
        } else {
            return false;
        }
    }


    public function banglalinkPackagesList(Request $request){
                 $user   =   null;
                 if(\Cookie::has('_tn')) {
                     $myProfileUrl   =   $this->prefix.'/user/profile';
                     $params                        = [
                         'api_token'          => decrypt(\Cookie::get('_tn')) // session('user')->access_token
                     ];
                     $profileApiResult = $this->getQueryArticleListDataApi($myProfileUrl, $params);
                     if(isset($profileApiResult->status_code) && $profileApiResult->status_code == 200) {
                         \Session::forget('user');
                         session(['user'=>encrypt($profileApiResult->user)]);
                     }
                 }
        
                $url = $this->getSubscriptionPlanList();
        
                $params =   [
                    'platform'   =>  'web'
                ];
        
                $subscriptionPlans = $this->getQueryArticleListDataApi($url, $params);
        
                if( $subscriptionPlans != null && $subscriptionPlans->status_code == 200) {
                    $subscriptionPlans  =   ($subscriptionPlans->plans);
                    $activePlans    =   isset($profileApiResult)?isset($profileApiResult->user->subscribed_plans)?$profileApiResult->user->subscribed_plans:[]:[];
        
                    $plans  =   [];
                    foreach ($activePlans as $key=>$plan) {
                        $plans[$key]    =   $plan->plan_id;
                    }
    
                    foreach ($subscriptionPlans as $subscriptionPlan){
                        $planSlug = $subscriptionPlan->plan_slug;
        
                        if ($planSlug == 'bl-daily' || $planSlug == 'bl-monthly' || $planSlug == 'bl-yearly'){
        //                if ($requestedParams == 'bl' && ($planSlug == 'bl-daily' || $planSlug == 'bl-monthly' || $planSlug == 'bl-yearly')){
                            return view('frontend.pages.subscription.packages.bl-packages')->with(compact('subscriptionPlans','user','plans'));
                        }
                    }
        
                } else if($subscriptionPlans->status_code == 500){
                    abort(500);
                } else {
                    $error = isset($subscriptionPlans->error->message) ? $subscriptionPlans->error->message : 'Some technical problem';
                    return view('frontend.pages.subscription.index')->with(compact('error'));
                }
        
            }

}
