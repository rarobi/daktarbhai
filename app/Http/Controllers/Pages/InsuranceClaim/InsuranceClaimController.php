<?php

namespace App\Http\Controllers\Pages\InsuranceClaim;

use App\Http\Controllers\ApiAuthenticatedListController;
use App\Rules\AgeRestriction;
use Illuminate\Http\Request;

class InsuranceClaimController extends ApiAuthenticatedListController
{
    /**
     * Display a list of Claims
     *
     */
    public function index($page = 1)
    {
        $data['user'] = decrypt(session('user'));

        $params = [
            'api_token' => $data['user']->access_token,
            'platform'           => 'web',
            'page'               =>  $page,
            'limit'              =>  10
        ];

        $insuranceClaimsUrl         = $this->getAllInsuranceClaims();
        $insuranceClaims            = $this->getQueryArticleListDataApi($insuranceClaimsUrl, $params);

        $data['insuranceClaims'] = $this->_group_by($insuranceClaims->insuranceClaims, 'claimed_on_year');

        $data['subPaginator']       = isset($insuranceClaims->paginator) ? $insuranceClaims->paginator : null;
        $data['rootUrl']            = 'claim-insurance/history';

        return view('frontend.pages.profile.insurance-claim-history', $data);
    }

    /**
     * Group claims by year
     *
     * @param $array
     * @param $key
     * @return array
     */
    private function _group_by($array, $key) {
        $return = array();
        foreach($array as $val) {
            $return[$val->claimed_on_formatted->$key][] = $val;
        }
        return $return;
    }

    /*
     * Display the details of a Claim
     *
     */
    public function show($id)
    {
        $data['user'] = decrypt(session('user'));

        $params = [
            'api_token' => $data['user']->access_token,
            'platform'           => 'web'
        ];

        $insuranceClaimDetailsUrl   = $this->getInsuranceClaimDetails($id);
        $response                   = $this->getQueryArticleListDataApi($insuranceClaimDetailsUrl, $params);

        if(is_object($response->insuranceClaim) && (count(get_object_vars($response->insuranceClaim)) > 0)) {
            $data['insuranceClaimDetails']  = $response->insuranceClaim;
            $data['insuranceType']          = $this->getInsuranceType($data['insuranceClaimDetails']->insurance_type);
            $data['claimedOn']              = $data['insuranceClaimDetails']->claimed_on_formatted->claimed_on_formatted_month . ' ' . $data['insuranceClaimDetails']->claimed_on_formatted->claimed_on_formatted_date . ', ' . $data['insuranceClaimDetails']->claimed_on_formatted->claimed_on_year;
            $data['claimDocs']              = $data['insuranceClaimDetails']->insurance_claim_docs;
            $data['subscriptionPlan']       = $data['insuranceClaimDetails']->subscription_plan_info->name;
        }

        return view('frontend.pages.profile.insurance-claim-details', $data);
    }

    private function getInsuranceType($type) {
        $insuranceType = '';

        if($type == 'IPD') {
            $insuranceType = 'Hospital Cashback (IPD)';
        } elseif($type == 'OPD') {
            $insuranceType = 'Emergency Medical Wallet';
        } elseif($type == 'Life Insurance') {
            $insuranceType = 'Life Insurance';
        }elseif($type == 'Accidental Cash Claim') {
            $insuranceType = 'Accidental Cash Claim';
        }

        return $insuranceType;
    }

    /**
     * Create an Insurance Claim.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['complete_profile_message']     = "";
        $data['subscription_package_message'] = "";
        $data['user'] = decrypt(session('user'));

        if(isset($data['user']->date_of_birth)){
            $date_of_birth                  =   new \DateTime($data['user']->date_of_birth);
            $today                          =   new \DateTime('today');
            $data['claimer_age_in_years']   =   (int) $date_of_birth->diff($today)->y;
        }

        $myProfileUrl = $this->getProfileInfoApi();
        $params = [
            'api_token' => $data['user']->access_token
        ];

        $profileApiResult = $this->getQueryArticleListDataApi($myProfileUrl, $params);
        $data['user_subscribed_plans'] = $profileApiResult->user->subscribed_plans;

        $data['user_subscriptions'] = [];
        foreach ($data['user_subscribed_plans'] as $key => $plan) {
            if($plan->plan_slug != 'free') {
                $data['user_subscriptions'][$plan->plan_id]  = $plan->plan_name;
            }

            if($plan->plan_slug =='bl-daily' || $plan->plan_slug =='bl-monthly' || $plan->plan_slug =='bl-yearly') {
                $data['insurance_type'] = [
                    'ipd'               =>  'Hospital Cashback (IPD)',
                    'accidental'        =>  'Accidental Cash Claim',
//                    'life_insurance'    =>  'Life Insurance'
                ];
            }
            else{
                $data['insurance_type'] = [
                    'ipd'               =>  'Hospital Cashback (IPD)',
                    'opd'               =>  'Emergency Medical Wallet',
//                    'life_insurance'    =>  'Life Insurance'
                ];
            }
        }

//        $data['insurance_type'] = [
//            'ipd'               =>  'Hospital Cashback (IPD)',
//            'opd'               =>  'Diagnostic Test (OPD)',
//            'life_insurance'    =>  'Life Insurance'
//        ];

        if(!(isset($data['user']->name)) || $data['user']->name == null){
            $data['complete_profile_message']                =   'Please provide your name and complete your profile to continue!';
        } elseif(!(isset($data['user']->date_of_birth))){
            $data['complete_profile_message']                =   'Please provide your date of birth and complete your profile to continue!';
        } elseif(!(isset($data['user']->name)) && !(isset($data['user']->date_of_birth))) {
            $data['complete_profile_message']                =   'Please provide your name & date of birth and complete your profile to continue!';
        } elseif(count($data['user_subscriptions']) == 0){
            $data['subscription_package_message']            =   'Please buy a subscription package to be eligible for insurance cash back!';
        }

        return view('frontend.pages.insurance-claim.create', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function submit(Request $request)
    {
        $request->validate([
            'claimer_name'          => 'required',
            'claimer_phone'         => 'required',
            'claimer_gender'        => 'required',
            'claimer_age_in_years'  => ['required', new AgeRestriction],
            'claimer_date_of_birth' => 'date',
//            'payment_method'        => 'required',
//            'payment_number'        => 'required',
            'subscription_plan_id'  => 'required',
            'insurance_type'        => 'required',
            'hospital_name'         => 'required_if:insurance_type,ipd',
            'admission_date'        => 'required_if:insurance_type,ipd|date',
            'discharge_date'        => 'required_if:insurance_type,ipd|date',
//            'image_path.*'        => 'required|mimes:jpeg,bmp,png,jpg' // TODO: Need to work on it
        ]);

        $inputs                 = $request->except('_token', 'image_path');
        $inputs['api_token']    = decrypt(session('user'))->access_token;

        $multipart_arr = [];

        if ($request->has('image_path')) {
            foreach ($request->file('image_path') as $key => $image) {
                $multipart_arr[$key]['name']     = 'image_path[]';
                $multipart_arr[$key]['contents'] = fopen($image->getPathname(), 'r');
            }
        } else {
            return redirect()->back()
                ->with('api_error', 'You have to submit the necessary documents to claim insurance.')
                ->withInput();
        }

        foreach($inputs as $key => $input) {
            array_push($multipart_arr, [
                'name' => $key,
                'contents' => $input
            ]);
        }

        $url                   = $this->postInsuranceClaimApi();
        $result                = $this->multipartFromDataApiForMultiImage($url, $multipart_arr);

        if (isset($result->status_code) && $result->status_code == 200) {
            $data['success']   = 'Thank you for submitting your documents. We will review your documents & will get in touch with you shortly...';
        } else {
            $data['api_error'] = (isset($result->error) && isset($result->error->message)) ? $result->error->message : trans('strings.generic.error_messages.technical_error');

            return redirect()->back()
                ->with('api_error', $data['api_error'])
                ->withInput();
        }

        return redirect()->route('frontend.insurance-claim')
            ->with('message', $data['success']);
    }

    public function confirm()
    {
        return view('frontend.pages.insurance-claim.confirm');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data['insurance_details_formatted'] = new \stdClass();

        $data['user'] = decrypt(session('user'));

        if(isset($data['user']->date_of_birth)){
            $date_of_birth                  =   new \DateTime($data['user']->date_of_birth);
            $today                          =   new \DateTime('today');
            $data['claimer_age_in_years']   =   (int) $date_of_birth->diff($today)->y;
        }

        $myProfileUrl = $this->getProfileInfoApi();
        $params = [
            'api_token' => $data['user']->access_token
        ];

        $profileApiResult = $this->getQueryArticleListDataApi($myProfileUrl, $params);
        $data['user_subscribed_plans'] = $profileApiResult->user->subscribed_plans;


        $data['user_subscriptions'] = [];
        foreach ($data['user_subscribed_plans'] as $key => $plan) {
            if($plan->plan_slug != 'free') {
                $data['user_subscriptions'][$plan->plan_id]  = $plan->plan_name;
            }

            if($plan->plan_slug =='bl-daily' || $plan->plan_slug =='bl-monthly' || $plan->plan_slug =='bl-yearly') {
                $data['insurance_type'] = [
                    'ipd'               =>  'Hospital Cashback (IPD)',
                    'accidental'        =>  'Accidental Cash Claim',
//                    'life_insurance'    =>  'Life Insurance'
                ];
            }
            else{
                $data['insurance_type'] = [
                    'ipd'               =>  'Hospital Cashback (IPD)',
                    'opd'               =>  'Emergency Medical Wallet',
//                    'life_insurance'    =>  'Life Insurance'
                ];
            }
        }

        $insuranceClaimDetailsUrl   = $this->getInsuranceClaimDetails($id);
        $data['insurance_details']  = $this->getQueryArticleListDataApi($insuranceClaimDetailsUrl, $params);

        $data['insurance_details_formatted']->insurance_type            = $this->formatClaimType($data['insurance_details']->insuranceClaim->insurance_type);
        $data['insurance_details_formatted']->hospital_name             = $data['insurance_details']->insuranceClaim->hospital_info->hospital_name;
        $data['insurance_details_formatted']->admission_date            = $data['insurance_details']->insuranceClaim->hospital_info->admission_date;
        $data['insurance_details_formatted']->discharge_date            = $data['insurance_details']->insuranceClaim->hospital_info->discharge_date;
        $data['insurance_details_formatted']->payment_method            = $data['insurance_details']->insuranceClaim->payment_info->payment_method;
        $data['insurance_details_formatted']->payment_number            = $data['insurance_details']->insuranceClaim->payment_info->payment_number;
        $data['insurance_details_formatted']->bank_acc_holder_name      = $data['insurance_details']->insuranceClaim->bank_acc_info->bank_acc_holder_name;
        $data['insurance_details_formatted']->bank_acc_no               = $data['insurance_details']->insuranceClaim->bank_acc_info->bank_acc_no;
        $data['insurance_details_formatted']->bank_acc_branch           = $data['insurance_details']->insuranceClaim->bank_acc_info->bank_acc_branch;
        $data['insurance_details_formatted']->bank_name                 = $data['insurance_details']->insuranceClaim->bank_acc_info->bank_name;
        $data['insurance_details_formatted']->subscription_plan_name    = $data['insurance_details']->insuranceClaim->subscription_plan_info->name;
        $data['insurance_details_formatted']->subscription_plan_id      = $data['insurance_details']->insuranceClaim->subscription_plan_info->id;

        $data['insurance_claim_documents']  = $data['insurance_details']->insuranceClaim->insurance_claim_docs;

//        $data['insurance_type'] = [
//            'ipd'               =>  'Hospital Cashback (IPD)',
//            'opd'               =>  'Diagnostic Test (OPD)',
//            'life_insurance'    =>  'Life Insurance'
//        ];

        if(!(isset($data['user']->name)) || $data['user']->name == null){
            $data['complete_profile_message']                =   'Please provide your name and complete your profile to continue!';
        } elseif(!(isset($data['user']->date_of_birth))){
            $data['complete_profile_message']                =   'Please provide your date of birth and complete your profile to continue!';
        } elseif(!(isset($data['user']->name)) && !(isset($data['user']->date_of_birth))) {
            $data['complete_profile_message']                =   'Please provide your name & date of birth and complete your profile to continue!';
        } elseif(count($data['user_subscriptions']) == 0){
            $data['subscription_package_message']            =   'Please buy a subscription package to be eligible for insurance cash back!';
        }

        return view('frontend.pages.insurance-claim.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'claimer_name'          => 'required',
            'claimer_phone'         => 'required',
            'claimer_gender'        => 'required',
            'claimer_age_in_years'  => ['required', new AgeRestriction],
            'claimer_date_of_birth' => 'date',
//            'payment_method'        => 'required',
//            'payment_number'        => 'required',
            'subscription_plan_id'  => 'required',
            'insurance_type'        => 'required',
            'hospital_name'         => 'required_if:insurance_type,ipd',
            'admission_date'        => 'required_if:insurance_type,ipd|date',
            'discharge_date'        => 'required_if:insurance_type,ipd|date',
//            'image_path.*'        => 'required|mimes:jpeg,bmp,png,jpg' // TODO: Need to work on it
        ]);

        $inputs                 = $request->except('_token', '_method', 'image_path');
        $inputs['api_token']    = decrypt(session('user'))->access_token;

        $multipart_arr = [];

        if ($request->has('image_path')) {
            foreach ($request->file('image_path') as $key => $image) {
                $multipart_arr[$key]['name']     = 'image_path[]';
                $multipart_arr[$key]['contents'] = fopen($image->getPathname(), 'r');
            }
        } else {
            $params = [
                'api_token' => $inputs['api_token']
            ];
            $insuranceClaimDetailsUrl   = $this->getInsuranceClaimDetails($id);
            $insurance_details          = $this->getQueryArticleListDataApi($insuranceClaimDetailsUrl, $params);

            if(count($insurance_details->insuranceClaim->insurance_claim_docs) < 1) {
                return redirect()->back()
                    ->with('api_error', 'You must submit the necessary documents to claim insurance.')
                    ->withInput();
            }
        }

        foreach($inputs as $key => $input) {
            array_push($multipart_arr, [
                'name' => $key,
                'contents' => $input
            ]);
        }

        $url                   = $this->updateInsuranceClaimApi($id);
        $result                = $this->multipartFromDataApiForMultiImage($url, $multipart_arr);

        if (isset($result->status_code) && $result->status_code == 200) {
            $data['success']   = 'Your claim details have been updated successfully. We will review your documents & will get in touch with you shortly...';
        } else {
            $data['api_error'] = (isset($result->error) && isset($result->error->message)) ? $result->error->message : trans('strings.generic.error_messages.technical_error');

            return redirect()->back()
                ->with('api_error', $data['api_error'])
                ->withInput();
        }

        return redirect()->route('frontend.insurance-claim')
            ->with('message', $data['success']);
    }

    /**
     * Remove Claim Document Record from DB
     *
     * @param $insuranceClaim
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeInsuranceClaimDocRecord(Request $request)
    {
        $data['user'] = decrypt(session('user'));

        $params = [
            'api_token' => $data['user']->access_token,
            'image_id' => $request->input('imageID')
        ];

        $insuranceDocRemovalsUrl    = $this->deleteInsuranceClaimDocRecord();
        $result                     = $this->destroyDataFromApi($insuranceDocRemovalsUrl, $params);

        return response()->json($result);
    }

    /**
     * To modify the insurance types and change them into a more readable format
     *
     * @param $insuranceType
     * @return string
     */
    private function formatClaimType($insuranceType)
    {
        if($insuranceType == 'IPD') {
            return 'ipd';
        } elseif($insuranceType == 'Emergency Medical Wallet') {
            return 'opd';
        } elseif($insuranceType == 'Life Insurance') {
            return 'life_insurance';
        }
        elseif($insuranceType == 'Accidental Cash Claim') {
            return 'accidental';
        }
    }

}
