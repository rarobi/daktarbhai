<?php

namespace App\Http\Controllers\Pages\Ambulance;

use App\Http\Controllers\ApiListController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AmbulancesController extends ApiListController
{
    protected $limit;

    /**
     * ArticlesController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->limit            = 6;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $page=null)
    {
        $url = $this->getHealthDirectoryData('ambulance');
        $location = $request->location;
        $params                        = [
            'page'          => $page,
            'platform'      => 'web',
            'limit'         => $this->limit,
            'district'      => $location
        ];

        $result = $this->getQueryArticleListDataApi($url, $params);
        if(isset($result) && $result->status_code == 200) {
            $data['ambulances'] = $result->ambulances;
        } else {
            $data['ambulances'] = null;
        }

        return view('frontend.pages.health-directory.ambulance.index', $data);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

}
