<?php

namespace App\Http\Controllers\Pages\Hospital;

use App\Http\Controllers\ApiListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HospitalsController extends ApiListController
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

    public function index(Request $request, $type = null, $page = null)
    {
        $data['default'] = 1;

        if($request->all() != null) {
            $url                           = $this->getHospitalListApi();
            $params                        = [
                'division'                 => $request->division_name,
                'district'                 => $request->district_name,
                'name'                     => $request->hospital_name,
                'locality'                 => $request->locality,
                'type'                     => $request->type,
                'page'                     => $request->page,
                'platform'                 => 'web',
                'limit'                    => $this->limit
            ];
            $data['query_string']          = "division_name=$request->division_name&district_name=$request->district_name&hospital_name=$request->hospital_name&type=$request->type&locality=$request->locality&page=".$page;
            $result                        = $this->getQueryArticleListDataApi($url, $params);
            $data['hospitals']             = isset($result->hospitals) ? $result->hospitals : null;
            $data['paginator']             = isset($result->paginator) ? $result->paginator : null;
            $data['default'] = 0;
        }

        if(isset($type) && $type != null) {
            $url = $this->getHospitalListApi();
            $params                        = [
                'type'          => $type,
                'page'          => $page,
                'platform'      => 'web',
                'limit'         => $this->limit
            ];
            $result                        = $this->getQueryArticleListDataApi($url, $params);
            $data['hospitals']             = isset($result->hospitals) ? $result->hospitals : null;
            $data['paginator']             = isset($result->paginator) ? $result->paginator : null;
            $data['type']                  = $type;
            $data['default'] = 0;
        }

        $url                               = $this->getAllDivision();
        $result                            = $this->getDataFromApi($url);
        $data['divisions']                 = isset($result->divisions) ? $result->divisions : null;

        $data['first_page'] = $this->current_page = 1;

        return view('frontend.pages.hospital.index', $data);
    }

    public function allHospitals(Request $request, $type = null, $page = null)
    {
        $data['default'] = 1;

        if($request->all() == null) {
            $url                           = $this->getHospitalListApi();
            $params                        = [
                'division'                 => $request->division_name,
                'district'                 => $request->district_name,
                'name'                     => $request->hospital_name,
                'page'                     => $request->page,
                'platform'                 => 'web',
                'limit'                    => $this->limit
            ];
            $data['query_string']          = "division_name=$request->division_name&district_name=$request->district_name&hospital_name=$request->hospital_name&page=".$page;
            $result                        = $this->getQueryArticleListDataApi($url, $params);
            $data['hospitals']             = isset($result->hospitals) ? $result->hospitals : null;
            $data['paginator']             = isset($result->paginator) ? $result->paginator : null;
            $data['default'] = 0;
        }
        $url                               = $this->getAllDivision();
        $result                            = $this->getDataFromApi($url);
        $data['divisions']                 = isset($result->divisions) ? $result->divisions : null;

        return view('frontend.pages.hospital.index', $data);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $url              = $this->getHospitalDataApi($id);
        $result           = $this->getDataFromApi($url);
        if($result != null && $result->status_code == 200) {
            $data['hospital'] = $result->hospital;
            $data['services'] = $result->hospital->services;

            $user   =   (session('user'))?decrypt(session('user')):null;

            if(is_null($user)) {
                $data['is_subscribed'] = null;
            } else {
                $data['is_subscribed'] = (($user->is_subscribed) || ($user->is_trial_user))?true:false; // only true when user is
            }

//            $params    = [
//                'platform'      => 'web',
////                'api_token'     => decrypt(session('user'))->access_token
//            ];

//            $url              = $this->getDoctorListByHospitalId($id);
//            $result           = $this->getQueryArticleListDataApi($url, $params);
//            dd($result);
//            $data['count']    = count($result->doctors);
//            $data['doctors']  = array_slice($result->doctors,0,3);

            return view('frontend.pages.hospital.show', $data);
        } else if ($result->status_code == 500){
            abort(500);
        }
        else {
            abort(404);
        }

    }

    public function getNearByHospitals($latitude, $longitude)
    {
        $result['lat'] = $latitude;
        $result['lon'] = $longitude;
        $url           =  $this->getNearbyHospital($latitude, $longitude);
        $result        = $this->getDataFromApi($url);
        $hospitals     = $result->hospitals;
        return  ($hospitals);
    }

    public function doctorList($id, $page = null)
    {
        $url              = $this->getHospitalDataApi($id);
        $result           = $this->getDataFromApi($url);
        $data['hospital'] = isset($result->hospital) ? $result->hospital : null;

        $url              = $this->getDoctorListByHospitalId($id);
        $params                        = [
            'page'          => $page,
            'platform'      => 'web',
            'limit'         => $this->limit
        ];
        $result           = $this->getQueryArticleListDataApi($url, $params);
        $data['doctors']  = isset($result->doctors) ? $result->doctors : null;

        if($result->status_code == 200 && isset($data['doctors']) && $data['doctors'] != null) {
            $data['paginator'] = isset($result->paginator) ? $result->paginator : null;
            $data['id'] = $id;
            return view('frontend.pages.hospital.doctor-list', $data);
        } else {
            abort(404);
        }

        $data['first_page'] = $this->current_page = 1;

    }
}
