@extends('frontend.layouts.theme.master')
@section('title')
    {!! 'Find Hospital | ' . app_name()  !!}
@endsection
@section('page-header-class', 'header-static')
@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap row health-directory-bg m-b-15px">
        <div class="col-md-12 padding-leftright-null">
            <!-- ————————————————————————————————————————————
            ———	Find Doctor Start here
            —————————————————————————————————————————————— -->
            <section class="directory-top-bar doctor page">
                <div class="container">
                    <div class="directory-search doc-search">
                        <div class="search-form">
                            @include('frontend.pages.health-directory.search')
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div id="home-wrap" class="content-section fullpage-wrap row white" style="margin-top: 90px">
        @if(isset($items) && $items != null)
            <div class="directory-list-page row no-margin text">
                <div class="col-md-12 padding-leftright-null">
                    <div class="col-md-12">
                        {{--<div class="hospital-filter">--}}
                        {{--<form method="" action="">--}}
                        {{--<div class="checkbox">--}}
                        {{--<label class="col-md-2"><strong>Filter by :</strong></label>--}}
                        {{--<label class="col-md-3"><input name="gender" id="male" value="male" class="gender" type="checkbox">All Hospitals</label>--}}
                        {{--<label class="col-md-6"><input name="gender" id="female" value="female" class="gender" type="checkbox"> Panel Hospitals with multiple discounts</label>--}}
                        {{--<!-- <label class="col-md-4"><input name="gender" id="any" value="any" class="gender" type="checkbox"> Any</label> -->--}}
                        {{--</div>--}}
                        {{--</form>--}}
                        {{--</div>--}}
                    </div>
                    @foreach($items as $hospital)
                        <div class="col-md-3">
                            <div class="card-title text-center">
                                <p><span class="">Hospital</span></p>
                            </div>
                            <div class="thumbnail hospitals">
                                <div class="panel-hos">
                                    <img  src="{!! (isset($hospital) && $hospital->image != null) ? $hospital->image : asset('assets/img/directory/hospital-dir.png') !!}" alt="...">
                                    @if($hospital->discount_availability)
                                        <span>Panel Hospital</span>
                                    @endif
                                </div>
                                <div class="caption text-center directory-info-box">
                                    <h3>{!! $hospital->name or '' !!}</h3>
                                    <p style="margin-bottom: 0;">
                                        @if(! isEmptyOrNull($hospital->district_name))
                                            <i class="fa fa-map-marker"></i> {!! $hospital->district_name or '' !!} </p>
                                    @endif
                                    <hr class="separator" style="margin-bottom: 0">
                                </div>
                                <div class="caption">
                                    @if(! isEmptyOrNull($hospital->address))
{{--                                        <p><i class="fa fa-home"></i> <span> {!! $hospital->address or '' !!}</span></p>--}}
                                        <p><i><img src="{!! asset('assets/img/directory-location.png') !!}" alt=""></i> <span>
                                                {!! $hospital->address or '' !!}</span></p>
                                    @endif

                                    @if(! isEmptyOrNull($hospital->email))
                                        <p><i class="fa fa-envelope-o"></i> {!! $hospital->email or '' !!}</p>
                                    @endif

                                    @if(! isEmptyOrNull($hospital->landphone ) || ! isEmptyOrNull($hospital->landphone_2) )
                                        <p class="landphone-address">
{{--                                            <i class="fa fa-phone"></i>--}}
                                            <i ><img src="{!! asset('assets/img/directory-landphone.png') !!}" alt=""></i>
                                            <span>
                                        <a data-tel="{!! $hospital->landphone or '' !!}">
                                            {!! $hospital->landphone or '' !!}
                                        </a>
                                                @if(! isEmptyOrNull($hospital->landphone_2) ) ,
                                                <a data-tel="{!! $hospital->landphone_2 or '' !!}">
                                            {!! $hospital->landphone_2 or '' !!}
                                        </a>
                                                @endif
                                            </span>
                                        </p>
                                    @endif

                                    @if(! isEmptyOrNull($hospital->mobile) || ! isEmptyOrNull($hospital->mobile_2))
                                        <p class="mobile-no">
{{--                                            <i class="fa fa-mobile"></i>--}}
                                            <i><img src="{!! asset('assets/img/directory-mobile.png') !!}" alt=""></i>
                                            <span>
                                                <a data-tel="{!! $hospital->mobile or '' !!}">
                                                    {!! $hospital->mobile or '' !!}
                                                </a>
                                                @if(! isEmptyOrNull($hospital->mobile_2) )
                                                    ,
                                                    <a data-tel="{!! $hospital->mobile_2 or '' !!}">
                                                    {!! $hospital->mobile_2 or '' !!}
                                                </a>
                                                @endif
                                            </span>
                                        </p>
                                    @endif

                                    @if($hospital->discount_availability)
                                        <div class="dir-button-area">
                                            {{--<a href="{!! route('frontend.hospital.show', $hospital->id) !!}" class="btn-alt active shadow small margin-null" ><i class="fa fa-hand-o-up" ></i> Get Discount</a>--}}
                                            <a href="{!! route('frontend.hospital.show', $hospital->id) !!}" class="btn-alt active shadow small margin-null discount-btn" ><i class="fa fa-hand-o-up" ></i> {{__('find_hospital.buttons.get_discount')}}</a>
                                            {{--<a href="#" class="btn-alt active shadow small margin-null" data-toggle="modal" data-target="#tipsmodal"><i class="fa fa-map-marker"></i> Show on Map</a>--}}
                                            <a class=" btn-alt active shadow small margin-null btnShow"
                                               data-title="{!! $hospital->name or '' !!}"
                                               data-latitude="{!! $hospital->latitude or '' !!}"
                                               data-longitude="{!! $hospital->longitude or '' !!}" type="button">
                                                {{--<i class="fa fa-map-marker"></i>  Show On Map</a>--}}
                                               <i><img src="{!! asset('assets/img/map_icon.png') !!}" alt=""></i>
                                                {{__('buttons.show_map')}}</a>
                                        </div>
                                    @else
                                        <div class="sin-button-area">
                                            <a class=" btn-alt active margin-null btnShow"
                                               data-title="{!! $hospital->name or '' !!}"
                                               data-latitude="{!! $hospital->latitude or '' !!}"
                                               data-longitude="{!! $hospital->longitude or '' !!}" type="button">
                                                {{--<i class="fa fa-map-marker"></i> Show On Map</a>--}}
                                                <i><img src="{!! asset('assets/img/map_icon.png') !!}" alt=""></i>
                                                {{__('buttons.show_map')}}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="doctor-list">
                <div class="col-md-12">
                    <div class="doc-single padding-sm doctor-not-found">
                        <img src="{!! asset('assets/img/doctor-not-found.png') !!}" alt="">
                        {{--<h6 class="text-center">We have not found any <span>hospital</span> that match your search criteria.</h6>--}}
                        <h6 class="text-center">{{__('find_hospital.msg_7')}}</h6>
                    </div>
                </div>
            </div>
        @endif
        @if(isset($paginator) && $paginator != null))
        <section id="nav" class="padding-top-null ">
            @include('frontend.pages.health-directory.pagination')
        </section>
        @endif
    </div>
    @include('frontend.pages.health-directory.map-show')

@endsection

@include('frontend.pages.health-directory.scripts')
