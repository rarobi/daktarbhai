<?php

namespace App\Http\Controllers\Pages\SampleCollection;

use App\Http\Controllers\ApiAuthenticatedListController;
use App\Rules\AgeRestriction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class SampleCollectionController extends ApiAuthenticatedListController
{
    /**
     * Display a list of Claims
     *
     */
    public function index(Request $request,$page = 1)
    {
        $data['user'] = decrypt(session('user'));


        $param = [
            'api_token' => $data['user']->access_token,
        ];

        $url                   = $this->sampleCollectionRequestList();

        $result                = $this->postDataFromApi($url, $param);

        if (isset($result) && $result->status_code == 200){
            $data['success'] = $request->message;
            $data['error']   = $request->errorMsg;
            $data['sample_collection_requests'] = $result->requests;
        }
        else{
            $data['sample_collection_requests'] = null;
        }

        return view('frontend.pages.sample-collection.sample-collection-history', $data);
    }




    public function store(Request $request)
    {
        $param = json_decode($request->params);
        $partner_id   = strip_tags($request->input('partner_id'));
        $lab_test_ids = strip_tags($request->input('lab_test_ids'));

        $price         = strip_tags($request->input('total_price'));

        $data['user'] = decrypt(session('user'));

        $requestData = [
            'api_token' => $data['user'] ->access_token,
            'request_date' => $param->request_date,
            'request_time' => $param->request_time,
            'email_address' => $param->email,
            'mobile' => $data['user']->mobile,
            'division_id' => $param->division_id,
            'division' => $param->division,
            'district_id' => $param->district_id,
            'district' => $param->district,
            'area_id' => $param->area_id,
            'area' => $param->area,
            'address' => $param->address,
            'partner_id' => $partner_id,
            'lab_test_ids' => $lab_test_ids,
            'payment_amount'     => trim($price),
        ];

        $url                   = $this->postSampleCollectionApi();
        $result                = $this->postDataFromApi($url, $requestData);


        $requestID = $result->sample_request->id;

        session(["request_id"=>$requestID,"price"=>$price]);

        return redirect()->route('frontend.sample-collection.payment-info');
    }

    public function  sampleCollectionDetails(Request $request){

        $data['user'] = decrypt(session('user'));

        $request_id = $request->input('request_id');

        $params = [
            'api_token' => $data['user'] ->access_token,
            'request_id' => $request_id,

        ];

        $url = $this->sampleCollectionRequestDetails();

        $result                = $this->postDataFromApi($url, $params);

        $ppe_cost =  $result->ppe_cost;
        $sample_collection_cost =  $result->sample_collection_cost;

        foreach ($result->request_details as $request_details){

            $test_price[] = $request_details->test_price;
        }

        $total_test_price = array_sum($test_price);

        $total_amount =  $total_test_price + $ppe_cost + $sample_collection_cost;

        session(["request_id"=>$request_id,"price"=>$total_amount]);

        if ($request->input('details')){

            return view('frontend.pages.sample-collection.sample-collection-details',compact('result','total_amount'));

        }

        return redirect()->route('frontend.sample-collection.payment-info');

}



    /*
     * Create an Sample Collection.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url                               = $this->getAllDivision();
        $param = [
            'request_from' => "sample-collection"
        ];
        $result                            = $this->getQueryArticleListDataApi($url,$param);
        $data['divisions']                 = isset($result->divisions) ? $result->divisions : null;

        return view('frontend.pages.sample-collection.create',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function userInfoSubmit(Request $request)
    {
        $data['params'] =[
            'request_date' => $request->input('request_date'),
            'request_time' => $request->input('request_time'),
            'email' => $request->input('email_address'),
            'division_id' => $request->input('division_id'),
            'division' => $request->input('division'),
            'district_id' => $request->input('district_id'),
            'district' => $request->input('district'),
            'area_id' => $request->input('area_id'),
            'area' => $request->input('area'),
            'address' => $request->input('address'),
            ];

        $data['user'] = decrypt(session('user'));

        $param = [
            'api_token' => $data['user']->access_token,
        ];
        $url                               = $this->getSampleCollectionVendor();
        $results                            = $this->getQueryArticleListDataApi($url,$param);

        $data['results'] = isset($results->partners) ? $results->partners :null;

        return view('frontend.pages.sample-collection.partner-list',$data);
    }

    public function getTestList(Request $request)
    {
        $data['user'] = decrypt(session('user'));

        $data['params'] = $request->input('params');
        $data['partner_id'] = $request->input('partner_id');

        $request = [
            'api_token' => $data['user']->access_token,
            'partner_id' => $request->partner_id,
        ];
        $url                               = $this->getSampleCollectionTestList();
        $results                            = $this->postDataFromApi($url,$request);

        $data['ppe_cost'] = isset($results->ppe_cost) ? $results->ppe_cost:null;
        $data['sample_collection_cost'] = isset($results->sample_collection_cost) ? $results->sample_collection_cost:null;

        $data['results'] = isset($results->test_names) ? $results->test_names :null;

        return view('frontend.pages.sample-collection.lab-test-list',$data);
    }

    public function sampleCollectionAmountCalculation(Request $request){

        $data['lab_test_ids'] = $request->input('lab_test_info');
        $data['user'] = decrypt(session('user'));
        $params = json_decode($request->input('params'));

        $data['params'] = $params;
        $data['partner_id'] = $request->partner_id;

        $ppe_cost_request = [
            'api_token' => $data['user']->access_token,
            'partner_id' => $request->partner_id,
        ];
        $ppe_url                                = $this->getSampleCollectionTestList();
        $ppe_results                            = $this->postDataFromApi($ppe_url, $ppe_cost_request);

        if($ppe_results->status_code ==200){
            $data['ppe_cost'] = $ppe_results->ppe_cost;
            $data['sample_collection_cost'] = $ppe_results->sample_collection_cost;
        } else {
            $data['ppe_cost'] = $request->input('ppe_cost');
            $data['sample_collection_cost'] = $request->input('sample_collection_cost');
        }

        $test_infos =  $request->test_info;
       if (!is_null($test_infos)){
           $test = json_decode($test_infos);

           foreach ($test as $key=> $value){
               if ($key % 2 == 0) {
                   $even[] = $value;
               }
               else {
                   $odd[] = $value;
               }
           }
       } else{
           return redirect()->back()
               ->with('error', 'Please select the test from test list');
       }

        $data['test_data'] = array_combine($even,$odd);

        $data['test_amount'] = array_sum($odd);
        $data['total'] = $data['test_amount'] + $data['ppe_cost']+ $data['sample_collection_cost'];

        return view('frontend.pages.sample-collection.invoice',$data);
    }

    public function paymentInformation(){

        $request_id = \session('request_id');
        $data['price'] = \session('price');

        $data['request_id'] = $request_id;
        $data['price'] = \session('price');


        $data['user'] = decrypt(session('user'));


        return view('frontend.pages.sample-collection.sample-collection-confirmation',$data);
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
            'service_name' => 'sample-collection'
        ];

//        $url                   = $this->sampleCollectionPaymentIntregation();
        $url                   = $this->paymentIntregationUrl();
        $result                = $this->postDataFromApi($url,$requestData);


        if(!is_null($result) || $result->code == 200){
            return redirect($result->data);
        }

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

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {



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

    }


}
