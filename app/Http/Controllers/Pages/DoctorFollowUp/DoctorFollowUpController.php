<?php

namespace App\Http\Controllers\Pages\DoctorFollowUp;

use App\Http\Controllers\ApiAuthenticatedListController;
use Illuminate\Http\Request;

class DoctorFollowUpController extends ApiAuthenticatedListController
{





    public function packages(Request $request)
    {

        $url    = $this->getDoctorFollowUpPackages();

        $data['user'] = decrypt(session('user'));

        $param = [
            'api_token' => $data['user']->access_token,
        ];

        $results    = $this->getQueryArticleListDataApi($url,$param);

//        dd($results);
        $data['packages'] = isset($results->package_list) ? $results->package_list : null;
        return view('frontend.pages.doctor-follow-up.packages',$data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function userInfo(Request $request)
    {
//dd($request->params);
        $data['package_info'] = $request->params;

        $data['user'] = decrypt(session('user'));

        $url                               = $this->getAllDivision();

        $result                            = $this->getQueryArticleListDataApi($url);
        $divisions                 = isset($result->divisions) ? $result->divisions : null;

        $data['division_list'] = [];
        foreach ($divisions as $key => $value){
            $data['division_list'][$value->division_id] = $value->division_name;

        }

        return view('frontend.pages.doctor-follow-up.user-info-form',$data);
    }

    public function requestStore(Request $request)
    {

        $package_info = json_decode($request->package_info);

        $url        = $this->doctorFollowUpRequestStore();

        $data['user'] = decrypt(session('user'));

        $requestData = [
            'api_token'                =>   $data['user'] ->access_token,
            'email'                    =>   $request->email,
            'mobile'                   =>   $data['user']->mobile,
            'sample_provide_date'      =>   $request->sample_provide_date,
            'test_result_date'         =>   $request->test_result_date,
            'test_result'              =>   $request->test_result,
            'tested_by'                =>   $request->tested_by,
            'test_count'               =>   $request->test_no,
            'sample_provide_place'     =>   $request->sample_provide_place,
            'request_type'             =>   $package_info->type,
            'division_id'              =>   $request->division,
            'division'                 =>   $request->division_name,
            'district_id'              =>   $request->district,
            'district'                 =>   $request->district_name,
            'area_id'                  =>   $request->area,
            'area'                     =>   $request->area_name,
            'address'                  =>   $request->address,
            'payment_amount'           =>   trim($package_info->price),
            'is_vaccine_taken'         =>   $request->is_vaccine_taken,
            'vaccination_date_one'     =>   $request->first_dosage_date,
            'vaccination_date_two'     =>   $request->second_dosage_date,
            'package_id'               =>   $package_info->id,
            'package_duration'         =>   $package_info->days,
            'is_corona_tested'         =>   $request->is_corona_tested,
            'is_sample_provided'       =>   $request->is_sample_provided,

        ];

        $result                = $this->postDataFromApi($url, $requestData);

        $requestID = $result->followup_request->id;

        session(["request_id"=>$requestID,"price"=>$package_info->price]);

        return redirect()->route('frontend.doctor-follow-up.payment-info');
    }

    public function paymentInformation(){

        $request_id = \session('request_id');
        $data['price'] = \session('price');

        $data['request_id'] = $request_id;
        $data['price'] = \session('price');


        $data['user'] = decrypt(session('user'));

        return view('frontend.pages.doctor-follow-up.doctor-follow-up-confirmation',$data);
    }

    public function paymentConfirmation(Request $request){

        $providerId = strip_tags($request->input('provider_id'));
        $price      = strip_tags($request->input('price'));
        $requestId  = strip_tags($request->input('request_id'));

        if (trim(session('price'))!= trim($price)){
            return redirect()->back()->with('flash_danger', 'Sorry! Payment amount is not matched with your request store amount. Please input correct amount');
        }

        $data['user'] = decrypt(session('user'));

        $requestData = [
            'api_token' => $data['user'] ->access_token,
            'price' => $price,
            'platform' => 'web',
            'request_id' => $requestId,
            'provider_id' => $providerId,
            'service_name' => 'followup'
        ];

        $url                   = $this->paymentIntregationUrl();
        $result                = $this->postDataFromApi($url,$requestData);


        if(!is_null($result) || $result->code == 200){
            return redirect($result->data);
        }

    }

    public function followUpRequestHistory(Request $request)
    {
        $data['user'] = decrypt(session('user'));


        $param = [
            'api_token' => $data['user']->access_token,
        ];

        $url                   = $this->doctorFollowUpRequestList();

        $result                = $this->getQueryArticleListDataApi($url, $param);
//dd($result);
        if (isset($result) && $result->status_code == 200){
            $data['follow_up_requests'] = $result->followup_list;
        }
        else{
            $data['follow_up_requests'] = null;
        }

        return view('frontend.pages.doctor-follow-up.doctor-follow-up-history', $data);
    }

    public function  followUpRequestDetails(Request $request){

        $data['user'] = decrypt(session('user'));

        $request_id = $request->input('request_id');

        $params = [
            'api_token' => $data['user'] ->access_token,
            'request_id' => $request_id,

        ];
        $url = $this->doctorFollowUpRequestDetails();

        $result                = $this->postDataFromApi($url, $params);

        return view('frontend.pages.doctor-follow-up.doctor-follow-up-details',compact('result'));

    }

    public function  sampleCollectionInvoiceReport(Request $request,$request_id){

        $data['user'] = decrypt(session('user'));

        $params = [
            'api_token' => $data['user'] ->access_token,
            'request_id' => $request_id,

        ];

        $url = $this->sampleCollectionRequestDetails();


        $result                = $this->postDataFromApi($url, $params);

        $data['invoice'] = isset($result->invoice_details) ? $result->invoice_details :null;

        return view('frontend.pages.sample-collection.sample-collection-invoice',$data);


    }


}
