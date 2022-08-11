<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\ApiListController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HealthDirectoryController extends ApiListController
{
    protected $limit;
    protected $district;
    protected $health_directories;

    public function __construct()
    {
        parent::__construct();

        $this->limit = 12;

        $districtUrl       = $this->getAllDistrict();
        $this->district   = $this->getDataFromApi($districtUrl);

        $this->health_directories = [
            'ambulance' => 'Ambulance',
            'hospital' => 'Hospital',
            'pharmacy' => 'Pharmacy',
            'blood-bank' => 'Blood Bank',
//            'healthy-shop' => 'Healthy Shop',
            'healthy-living' => 'Healthy Living',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $url                               = $this->getAllDistrict();
//        $result                            = $this->getDataFromApi($url);
        $data['districts']                 = isset($this->district->districts) ? $this->district->districts : null;

        $data['health_directories'] = $this->health_directories;

        $data['dis_search'] = array();
        if($data['districts'] != null) {
            foreach ($data['districts'] as $key=>$district){
                if(\Lang::getLocale() == 'en'){
                    $data['dis_search'][$key]['name'] =   $district->district_name;
                    $data['district_list'][$district->district_name] = $district->district_name;
                }elseif(\Lang::getLocale() == 'bn')  {
                    $data['dis_search'][$key]['name'] =   $district->district_bn_name;
                    $data['district_list'][$district->district_name] = $district->district_bn_name;
                }
                $data['dis_search'][$key]['id'] =   $district->district_id;
                $data['dis_search'][$key]['type'] =   'districts';

            }
        }

//        $data['search_doctor'] = array();
        $data['districts'] = json_encode($data['dis_search']);
        return view('frontend.pages.health-directory.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request, $page = null)
    {
//        dd($request->all());
        $location = $request->district_name;
        $health_directory = $request->health_directory;

        return redirect()->route('frontend.health_directory.searchResult', [$health_directory, $location]);
    }

    public function searchResult($health_directory=null, $location=null, $page=null) {

        $data['health_directories'] = $this->health_directories;

        $data['health_directory'] = $health_directory;

        $data['districts'] = isset($this->district->districts) ? $this->district->districts : null;

        $data['dis_search'] = array();

        if($data['districts'] != null) {
            foreach ($data['districts'] as $key=>$district){
                if(\Lang::getLocale() == 'en'){
                    $data['dis_search'][$key]['name'] =   $district->district_name;
                    $data['district_list'][$district->district_name] = $district->district_name;
                }elseif(\Lang::getLocale() == 'bn')  {
                    $data['dis_search'][$key]['name'] =   $district->district_bn_name;
                    $data['district_list'][$district->district_name] = $district->district_bn_name;
                }
                $data['dis_search'][$key]['id'] =   $district->district_id;
                $data['dis_search'][$key]['type'] =   'districts';
            }
        }

        $data['districts'] = json_encode($data['dis_search']);
        $data['location'] = $location;

        $health_directory = strtolower($health_directory);

        $data['type'] = $health_directory;

        $arrayHealthDirectory = array("ambulance", "blood-bank", "hospital", "pharmacy", "panel-hospitals", "healthy-living");

        if (! in_array($health_directory, $arrayHealthDirectory)) {
            abort(404);
        }

        if($health_directory == 'hospital' || $health_directory == 'panel-hospitals') {
            $health_directory = 'hospitals';
        }

        $url = $this->getHealthDirectoryData($health_directory);

        if($health_directory == 'pharmacy') {
            $item = 'pharmacies';
        } elseif ($health_directory == 'blood-bank') {
            $item = 'blood_banks';
        } elseif ($health_directory == 'hospitals') {
            $item = 'hospitals';
        } elseif ($health_directory == 'healthy-living') {
            $item = 'healthy_livings';
        } else {
            $item = $health_directory.'s';
        }

        $params = [
            'page'          => $page,
            'platform'      => 'web',
            'limit'         => $this->limit,
            'district'      => $location,
            'display'       => (isset($data['health_directory']) && $data['health_directory'] == 'panel-hospitals') ? 'show_panel' : null,
        ];

        if ($data['health_directory'] == 'panel-hospitals') {
            $data['health_directory'] = 'hospital';
        }


        $result = $this->getQueryArticleListDataApi($url, $params);
//        dd($result->$item);
        if(isset($result) && $result->status_code == 200) {
            $data['items'] = isset($result->$item) ? $result->$item : null;
            $data['paginator'] = isset($result->paginator) ? $result->paginator : null;
        } else {
            $data['items'] = null;
        }

        return view('frontend.pages.health-directory.'.$health_directory.'.index', $data);
    }

    public function typeWithPagination($health_directory, $location = null, $page = null) {
        $data['health_directory'] = $health_directory;

        if($page == null) {
            $page = $location;
            $location = null;
        } else {
            $data['location'] = $location;
        }

        $data['health_directories'] = $this->health_directories;

        $data['districts'] = isset($this->district->districts) ? $this->district->districts : null;

        $data['dis_search'] = array();

        if($data['districts'] != null) {
            foreach ($data['districts'] as $key=>$district){
                if(\Lang::getLocale() == 'en'){
                    $data['dis_search'][$key]['name'] =   $district->district_name;
                    $data['district_list'][$district->district_name] = $district->district_name;
                }elseif(\Lang::getLocale() == 'bn')  {
                    $data['dis_search'][$key]['name'] =   $district->district_bn_name;
                    $data['district_list'][$district->district_name] = $district->district_bn_name;
                }
                $data['dis_search'][$key]['id'] =   $district->district_id;
                $data['dis_search'][$key]['type'] =   'districts';
            }
        }

        $data['districts'] = json_encode($data['dis_search']);

        $health_directory = strtolower($health_directory);

        $data['type'] = $health_directory;

        $arrayHealthDirectory = array("ambulance", "blood-bank", "hospital", "pharmacy", "panel-hospitals", "healthy-living");

        if (! in_array($health_directory, $arrayHealthDirectory)) {

            abort(404);
        }

        if($health_directory == 'hospital' || $health_directory == 'panel-hospitals') {
            $health_directory = 'hospitals';
        }

        $url = $this->getHealthDirectoryData($health_directory);

        if($health_directory == 'pharmacy') {
            $item = 'pharmacies';
        } elseif ($health_directory == 'blood-bank') {
            $item = 'blood_banks';
        } elseif ($health_directory == 'hospitals') {
            $item = 'hospitals';
        } elseif ($health_directory == 'healthy-living') {
            $item = 'healthy_livings';
        } else {
            $item = $health_directory.'s';
        }

        $params = [
            'page'          => $page,
            'platform'      => 'web',
            'limit'         => $this->limit,
            'district'      => $location,
            'display'       => (isset($data['health_directory']) && $data['health_directory'] == 'panel-hospitals') ? 'show_panel' : null,
        ];

        if ($data['health_directory'] == 'panel-hospitals') {
            $data['health_directory'] = 'hospital';
        }

        $result = $this->getQueryArticleListDataApi($url, $params);

        if(isset($result) && $result->status_code == 200) {
            $data['items'] = isset($result->$item) ? $result->$item : null;
            $data['paginator'] = isset($result->paginator) ? $result->paginator : null;
        } else {
            $data['items'] = null;
        }
        $data['first_page'] = $this->current_page = 1;

        return view('frontend.pages.health-directory.'.$health_directory.'.index', $data);
    }

    public function show($health_directory, $id) {
        /*dd($id);*/
        $url              = $this->getHealthDirectoryDataById($health_directory,$id);
        $result           = $this->getDataFromApi($url);
        if($result != null && $result->status_code == 200) {
            $data['pharmacy'] = $result->pharmacy;
            $data['services'] = $result->pharmacy->services;

            $user   =   (session('user'))?decrypt(session('user')):null;

            if(is_null($user)) {
                $data['is_subscribed'] = null;
            } else {
                $data['is_subscribed'] = (($user->is_subscribed) || ($user->is_trial_user))?true:false; // only true when user is
            }

            $params    = [
                'platform'      => 'web',
            ];

            return view('frontend.pages.health-directory.pharmacy.show', $data);
        } else if ($result->status_code == 500){
            abort(500);
        }
        else {
            abort(404);
        }
    }

}
