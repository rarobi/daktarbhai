
@extends('frontend.layouts.theme.master')
@section('title')
    {!! 'About | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('after-styles')

    <style>

        h6.about-heading{
            color: #000000 !important;
        }
        p{
            color: #000000 !important;
        }
    </style>
@endsection

@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap row dir-bg">
        <div class="col-md-12 padding-leftright-null">
            <!-- ————————————————————————————————————————————
            ———	Find Doctor Start here
            —————————————————————————————————————————————— -->
            <section class="health-directory-page doctor page padding-md doctor-pd" style="padding: 130px 0 100px 0 !important;">
                <div class="container">
                    <h2 class="text-center padding-top-null white margin-bottom-small" style="font-weight: 800">
                        {{__('about-us.header.title')}}
                    </h2>
                    <p class="heading white text-center" style="font-weight: 500; font-size: 20px">{{__('about-us.header.text')}}</p>
                </div>
            </section>
        </div>
    </div>
    <div id="home-wrap" class="content-section fullpage-wrap about-page">
        <div class="row">
            <!-- ————————————————————————————————————————————
            ———	About us content
            —————————————————————————————————————————————— -->
            <div class="col-md-12">
                <div class="text padding-bottom-null">
                    <h3 class="grey big margin-bottom-small"> <span style="color:#F7941E; font-weight: 500; ">{{__('about-us.content_1.title')}}</span></h3>
                    <p class="margin-bottom-null">{{__('about-us.content_1.description')}}</p>
                </div>
            </div>
        </div>
        <div class="row no-margin">
            <div class="col-md-12 padding-leftright-null">
                <div class="row no-margin">
                    <div class="col-md-6 padding-leftright-null">
                        <div class="text padding-bottom-null">
                            {{--<div class="service material left"><img src="{!! asset('assets/img/find-doctor.png') !!}" alt="find-doctor"></div>--}}
                            <div class="service material left">
                                <img style="height: 60px" src="{!! asset('assets/img/ask-1.png') !!}" alt="find-doctor">
                            </div>
                            <div class="service-content">
                                <h6 class="about-heading  margin-bottom-extrasmall">{{__('about-us.content_1.box_1.title')}}</h6>
                                <p class="margin-bottom-null">{{__('about-us.content_1.box_1.description')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 padding-leftright-null">
                        <div class="text padding-bottom-null">
                            <div class="service material left"><img src="{!! asset('assets/img/phr-1.png') !!}" style="height: 60px" alt="phr"></div>
                            <div class="service-content">
                                <h6 class="about-heading grey margin-bottom-extrasmall">{{__('about-us.content_1.box_2.title')}}</h6>
                                <p class="margin-bottom-null">{{__('about-us.content_1.box_2.description')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row no-margin">

                    <div class="col-md-6 padding-leftright-null">
                        <div class="text">
                            <div class="service material left"><img style="height: 60px" src="{!! asset('assets/img/query.png') !!}" alt="ask/share"></div>
                            <div class="service-content">
                                <h6 class="about-heading  margin-bottom-extrasmall">{{__('about-us.content_1.box_3.title')}}</h6>
                                <p class="margin-bottom-null">{{__('about-us.content_1.box_3.description')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 padding-leftright-null">
                        <div class="text">
                            <div class="service material left"><img style="height: 60px" src="{!! asset('assets/img/monitor.png') !!}" alt="monitor-health"></div>
                            <div class="service-content">
                                <h6 class="about-heading  margin-bottom-extrasmall">{{__('about-us.content_1.box_4.title')}}</h6>
                                <p class="margin-bottom-null">{{__('about-us.content_1.box_4.description')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row text padding-top-null">
            <div class="col-md-12">
                {{--<h3 class="grey big margin-bottom-small">Our <span class="brand-color">Aim</span></h3>--}}
                <h3 class="grey big margin-bottom-small"style="color:#F7941E!important; font-weight: 500; ">{{__('about-us.content_2.title')}}</h3>
                <p>{{__('about-us.content_2.description')}}</p>
            </div>
        </div>
    </div>
@endsection
