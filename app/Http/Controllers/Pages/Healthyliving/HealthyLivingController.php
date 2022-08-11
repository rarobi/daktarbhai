<?php

namespace App\Http\Controllers\Pages\Healthyliving;

use App\Http\Controllers\ApiListController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HealthyLivingController extends ApiListController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $url              = $this->getHealthDirectoryDataById('healthy-living',$id);
        $result           = $this->getDataFromApi($url);

        if($result != null && $result->status_code == 200) {
            $data['healthy_living'] = $result->healthy_living;
            $data['services'] = $result->healthy_living->services;

            $user   =   (session('user'))?decrypt(session('user')):null;

            if(is_null($user)) {
                $data['is_subscribed'] = null;
            } else {
                $data['is_subscribed'] = (($user->is_subscribed) || ($user->is_trial_user))?true:false; // only true when user is
            }

            $params    = [
                'platform'      => 'web',
            ];

            return view('frontend.pages.health-directory.healthy-living.show', $data);
        } else if ($result->status_code == 500){
            abort(500);
        }
        else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
