<?php

namespace App\Http\Controllers\Pages\Hospital;

use App\Http\Controllers\ApiAuthenticatedListController;

class HospitalDiscountController extends ApiAuthenticatedListController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $limit;

    public function __construct()
    {
        parent::__construct();
        $this->limit            = 8;
    }

    public function avail_discount($id)
    {
//        if(session('user')) {
        if( \Cookie::has('_tn')) {
            $url                  = $this->getHospitalDiscountDataApi($id);

            $request['api_token'] = decrypt(\Cookie::get('_tn')); // session('user')->access_token;

            /* TODO: if access_token changed, then this code will not work */
            $result               = $this->postDataFromApi($url, $request);

        }
        else {
            $result['status'] =400;
            $result['msg']= 'please login';
        }
        return response()->json($result);
    }

    public function directory_discount($type,$id)
    {
//        if(session('user')) {
        if( \Cookie::has('_tn')) {
            $url                  = $this->getHealthDirectoryDiscountApi($type,$id);

            $request['api_token'] = decrypt(\Cookie::get('_tn')); // session('user')->access_token;

            /* TODO: if access_token changed, then this code will not work */
            $result               = $this->postDataFromApi($url, $request);

        }
        else {
            $result['status'] =400;
            $result['msg']= 'please login';
        }
        return response()->json($result);
    }
}
