<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\ApiListController;
use Illuminate\Http\Request;

class LocationsController extends ApiListController
{
    //
    public function district($division)
    {

        $data = [];
        
        /*Need after further requirement if need  only doctor based district show*/
//        $url = $this->getDistrictListByDivision($division, true);
        $url = $this->getDistrictListByDivision($division);
        $result = $this->getDataFromApi($url);
        if(\Lang::getLocale() == 'en'){
            foreach ($result->districts as $key => $district) {
                $data[$district->district_name] = $district->district_name ;
            }
        }elseif(\Lang::getLocale() == 'bn')  {
            foreach ($result->districts as $key => $district) {
                $data[$district->district_name] = $district->district_bn_name ;
            }
        }

        return response()->json($data);
    }

    public function districtWithParam($division)
    {

        $data = [];

            $param = [
                'request_from' => "sample-collection"
            ];

            $url = $this->getDistrictListByDivision($division);
            $result =$this->getQueryArticleListDataApi($url,$param);;

        foreach ($result->districts as $key => $district) {
            $data[$district->district_id] = $district->district_name ;
        }

        return response()->json($data);
    }

    public function areaListByDistrict( $district){


        $data = [];

        $url = $this->getAreaListByDistrict($district);

        $result =$this->getDataFromApi($url);

        foreach ($result->areas as $key => $area) {
            $data[$area->area_id] = $area->area_name ;
        }

        return response()->json($data);


    }

    public function divisionWiseDistrict($division)
    {

        $data = [];

        $url = $this->getDistrictListByDivision($division);
        $result =$this->getQueryArticleListDataApi($url);;

        foreach ($result->districts as $key => $district) {
            $data[$district->district_id] = $district->district_name ;
        }

        return response()->json($data);
    }
}
