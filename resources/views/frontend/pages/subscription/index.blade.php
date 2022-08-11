@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Subscription Packages| ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('content')

    <!--  Page Content, class footer-fixed if footer is fixed  -->
    <div id="page-content" class="header-static footer-fixed" style="background: lightgrey">
        <div id="home-wrap" class="content-section fullpage-wrap row dir-bg">
            <div class="col-md-12 padding-leftright-null">
                <!-- ————————————————————————————————————————————
                ———	Find Doctor Start here
                —————————————————————————————————————————————— -->
                <section class="health-directory-page doctor page padding-md doctor-pd" style="padding: 130px 0 100px 0 !important;">
                    <div class="container">
                        <div class="text-center package-header">
                            <h3 class="big margin-bottom-small">{{__('packages.title')}}</h3>
                            <p class="heading margin-bottom text-center"> {{__('packages.header_text')}}</p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div id="home-wrap" class="content-section fullpage-wrap">
            <div class="row no-margin">
                <div class="col-md-12">
                    <div class="row padding-bottom-null m-t-30 m-b-15px">
{{--                        <div class="col-lg-3 col-md-2 col-sm-1"></div>--}}
                        @if($isBlUser)
                            @if(in_array("bl-daily", $plans) || in_array("bl-monthly", $plans) || in_array("bl-yearly", $plans))
{{--                                <div class="col-lg-3 col-md-4 col-sm-5 margin-bottom-null padding-bottom-null">--}}
                                 <div class="col-md-4"></div>
                                <div class="col-lg-3 col-md-4 col-sm-5">
                                    <div class="doc-single search-list " style="background-color: #ffffff">
                                        <div class="col-md-12 padding-sm">
                                            <div class="text-center">
                                                <img src="{!! asset('assets/img/perona.png') !!}" alt="hospital" class="">
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <div class="package-info">
                                                <h3 class=""><a href="{!! route('frontend.subscription.plan-list', ['param' => 'bl']) !!}">{{__('packages.banglalink')}}</a></h3>
                                                <p class="designation">{{__('packages.bl_desc')}}</p>
                                            </div>
                                            <a href="{!! route('frontend.subscription.plan-list', ['param' => 'bl']) !!}" class="btn details-btn m-b-15px">{{__('packages.buttons.details')}}</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>

                            @endif
                        @endif

                        @if(!$isBlUser)
{{--                        @if(in_array("bl-daily", $plans) || in_array("bl-monthly", $plans) || in_array("bl-yearly", $plans))--}}
                        @if($isBlUser)
                            <div class="col-lg-3 col-md-4 col-sm-5 margin-bottom-null padding-bottom-null">
                        @else
                            <div class="col-lg-12 col-md-12 col-sm-12">
                        @endif
                                <div class="col-md-4">
                                    <div class="doc-single search-list " style="background-color: #ffffff">
                                        <div class="col-md-12 padding-sm">
                                            <div class="text-center">
                                                <img src="{!! asset('assets/img/suchana.png') !!}" alt="hospital" class="">
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <div class="package-info">
                                                <h3 class=""><a href="{!! route('frontend.subscription.plan-list', ['param' => 'suchana']) !!}">{{__('packages.shuchana')}}</a></h3>
                                                <p class="designation">{{__('packages.other_desc')}}</p>
                                            </div>
                                            <a href="{!! route('frontend.subscription.plan-list', ['param' => 'suchana']) !!}" class="btn details-btn m-b-15px">{{__('packages.buttons.details')}}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="doc-single search-list " style="background-color: #ffffff">
                                        <div class="col-md-12 padding-sm">
                                            <div class="text-center">
                                                <img src="{!! asset('assets/img/perona.png') !!}" alt="hospital" class="">
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <div class="package-info">
                                                <h3 class=""> <a href="{!! route('frontend.subscription.plan-list', ['param' => 'perona']) !!}">{{__('packages.prerona')}}</a></h3>
                                                <p class="designation">{{__('packages.other_desc')}}</p>
                                            </div>
                                            <a href="{!! route('frontend.subscription.plan-list', ['param' => 'perona']) !!}" class="btn details-btn m-b-15px">{{__('packages.buttons.details')}}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="doc-single search-list " style="background-color: #ffffff">
                                        <div class="col-md-12 padding-sm">
                                            <div class="text-center">
                                                <img src="{!! asset('assets/img/protyasa.png') !!}" alt="hospital" class="">
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <div class="package-info">
                                                <h3 class=""> <a href="{!! route('frontend.subscription.plan-list', ['param' => 'protyasha']) !!}">{{__('packages.protyasha')}}</a></h3>
                                                <p class="designation">{{__('packages.other_desc')}}</p>
                                            </div>
                                            <a href="{!! route('frontend.subscription.plan-list', ['param' => 'protyasha']) !!}" class="btn details-btn m-b-15px">{{__('packages.buttons.details')}}</a>
                                        </div>
                                    </div>
                                </div>
                           </div>
                    </div>
                        @endif
                </div>
            </div>

        </div>
    </div>
    <style media="screen">
        .serviceBox{
            font-family: 'Montserrat', sans-serif;
            text-align: center;
            /*padding: 60px 0 30px;*/
            /*padding-bottom: 20px;*/
            position: relative;
        }
        /*.serviceBox:after{*/
        /*    content: '';*/
        /*    background: linear-gradient(#FF3187,#F2244A);*/
        /*    height: 40px;*/
        /*    width: 40px;*/
        /*    transform: translateX(-50%) rotate(45deg);*/
        /*    position: absolute;*/
        /*    left: 50%;*/
        /*    bottom: 10px;*/
        /*}*/
        /*.serviceBox .service-content{*/
        /*    background: #f0f0f0;*/
        /*    padding: 80px 15px 0;*/
        /*    position: relative;*/
        /*    z-index: 1;*/
        /*    transition: all 0.3s ease;*/
        /*}*/
        /*.serviceBox .service-content:hover{ box-shadow: 5px 5px 2px rgba(0,0,0,0.1); }*/
        /*.serviceBox .service-content:before{*/
        /*    content: "";*/
        /*    background: linear-gradient(#77D9B0,#77D9B0);*/
        /*    width: 100%;*/
        /*    height: 63px;*/
        /*    border-radius: 0 0 80px 0;*/
        /*    position: absolute;*/
        /*    top: 0;*/
        /*    left: 0;*/
        /*}*/
        /*.serviceBox .service-icon{*/
        /*    color: #F2244A;*/
        /*    background: linear-gradient(#F2244A,#FF3187);*/
        /*    font-size: 50px;*/
        /*    text-align: center;*/
        /*    line-height: 120px;*/
        /*    height: 120px;*/
        /*    width: 120px;*/
        /*    border-radius: 50%;*/
        /*    box-shadow: 5px 0 10px rgba(0,0,0,0.2);*/
        /*    position: absolute;*/
        /*    right: 0;*/
        /*    top: -60px;*/
        /*    z-index: 1;*/
        /*}*/
        /*.serviceBox .service-icon:after{*/
        /*    content: '';*/
        /*    background: #fff;*/
        /*    width: 80%;*/
        /*    height: 80%;*/
        /*    border-radius: 50% 50%;*/
        /*    box-shadow: 0 0 15px rgba(0,0,0,0.5);*/
        /*    transform: translateX(-50%) translateY(-50%);*/
        /*    position: absolute;*/
        /*    top: 50%;*/
        /*    left: 50%;*/
        /*    z-index:-1;*/
        /*}*/
        /*.serviceBox .title{*/
        /*    color: #F2244A;*/
        /*    font-size: 24px;*/
        /*    font-weight: 400;*/
        /*    text-transform: uppercase;*/
        /*    margin: 0 0 10px;*/
        /*}*/
        /*.serviceBox .description{*/
        /*    color: #777;*/
        /*    font-size: 16px;*/
        /*    line-height: 25px;*/
        /*}*/
        /*.serviceBox .read-more{*/
        /*    color: #777;*/
        /*    background-color: #fff;*/
        /*    font-size: 13px;*/
        /*    text-transform: capitalize;*/
        /*    padding: 4px 8px;*/
        /*    border-radius: 10px;*/
        /*    box-shadow: 0 0 5px rgba(0,0,0,0.3);*/
        /*    display: inline-block;*/
        /*    transform: translateY(12px);*/
        /*    transition: all 0.3 ease;*/
        /*}*/
        /*.serviceBox .read-more:hover{ color: #F2244A; }*/
        /*.serviceBox.green:after,*/
        /*.serviceBox.green .service-content:before{*/
        /*    background: linear-gradient(#D5DB00,#7ABA48);*/
        /*}*/
        /*.serviceBox.green .service-icon{*/
        /*    color: #7ABA48;*/
        /*    background: linear-gradient(#7ABA48,#D5DB00);*/
        /*}*/
        /*.serviceBox.green .title,*/
        /*.serviceBox.green .read-more:hover{*/
        /*    color: #7ABA48;*/
        /*}*/
        /*.serviceBox.blue:after,*/
        /*.serviceBox.blue .service-content:before{*/
        /*    background: linear-gradient(#39C5E0,#2642C9);*/
        /*}*/
        /*.serviceBox.blue .service-icon{*/
        /*    color: #2642C9;*/
        /*    background: linear-gradient(#2642C9,#39C5E0);*/
        /*}*/
        /*.serviceBox.blue .title,*/
        /*.serviceBox.blue .read-more:hover{*/
        /*    color: #2642C9;*/
        /*}*/
        /*.serviceBox.purple:after,*/
        /*.serviceBox.purple .service-content:before{*/
        /*    background: linear-gradient(#A23592,#5B2F6A);*/
        /*}*/
        /*.serviceBox.purple .service-icon{*/
        /*    color: #5B2F6A;*/
        /*    background: linear-gradient(#5B2F6A,#A23592);*/
        /*}*/
        /*.serviceBox.purple .title,*/
        /*.serviceBox.purple .read-more:hover{*/
        /*    color: #5B2F6A;*/
        /*}*/
        /*@media only screen and (max-width:990px){*/
        /*    !*.serviceBox{ margin: 0 0 30px; }*!*/
        /*}*/

    </style>
@endsection

