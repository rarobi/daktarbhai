<?php

namespace App\Http\Controllers\Pages\VideoBlog;

use App\Http\Controllers\ApiListController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoBlogController extends ApiListController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url        = $this->getVideoBlogs();
        $videoBlogs = $this->getDataFromApi($url);

        if( $videoBlogs != null && isset($videoBlogs->video_blogs) && count($videoBlogs->video_blogs)) {
            $data['video_blogs']       = $videoBlogs->video_blogs;
        }

        return  view('frontend.pages.blog.video-blog', $data);
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
        //
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
