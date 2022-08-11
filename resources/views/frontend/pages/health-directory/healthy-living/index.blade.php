@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Find Healthy Living | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')
@section('after-styles')
    <style>
        @media (max-width: 768px) {
            .directory-list-page .sin-button-area {
                bottom: -10px;
            }
        }
    </style>
@stop

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
                    @foreach($items as $healthyLiving)
                        <div class="col-md-3">
                            <div class="card-title text-center">
                                <p><span class="">Healthy Living</span></p>
                            </div>
                            <div class="thumbnail hospitals healthy-living">
                                <div class="panel-hos">
                                    <img src="{!! (isset($healthyLiving) && $healthyLiving->image_path != null) ? $healthyLiving->image_path : asset('assets/img/directory/healthy-living-directory.png') !!}" alt="...">
                                    @if($healthyLiving->discount_availability)
                                        <span>Panel Discount Partner</span>
                                    @endif
                                </div>
                                <div class="caption text-center directory-info-box">
                                    <h3>{!! $healthyLiving->name or '' !!}</h3>
                                    <p style="margin-bottom: 0;">
{{--                                        <span class="directory-cat">Healthy Living</span>--}}
                                        @if(! isEmptyOrNull($healthyLiving->district_name))
                                            <i class="fa fa-map-marker"></i> {!! $healthyLiving->district_name or '' !!} </p>
                                    @endif
                                    <hr class="separator" style="margin-bottom: 0">
                                </div>
                                <div class="caption">
                                    @if(! isEmptyOrNull($healthyLiving->address))
                                        <p>
{{--                                            <i class="fa fa-home"></i> --}}
                                            <i> <img src="{!! asset('assets/img/directory-location.png') !!}" alt=""></i>
                                            <span> {!! $healthyLiving->address or '' !!}</span></p>
                                    @endif

                                    @if(! isEmptyOrNull($healthyLiving->email))
                                        <p><i class="fa fa-envelope-o"></i> {!! $healthyLiving->email or '' !!}</p>
                                    @endif

                                    @if(! isEmptyOrNull($healthyLiving->landphone ) || ! isEmptyOrNull($healthyLiving->landphone_2) )
                                        <p>
                                            <i class="fa fa-phone"></i>
                                            <i ><img src="{!! asset('assets/img/directory-landphone.png') !!}" alt=""></i>
                                            <span>
                                        <a data-tel="{!! $healthyLiving->landphone or '' !!}">
                                            {!! $healthyLiving->landphone or '' !!}
                                        </a>
                                                @if(! isEmptyOrNull($healthyLiving->landphone_2) ) ,
                                                <a data-tel="{!! $healthyLiving->landphone_2 or '' !!}">
                                            {!! $healthyLiving->landphone_2 or '' !!}
                                        </a>
                                                @endif
                                            </span>
                                        </p>
                                    @endif

                                    @if(! isEmptyOrNull($healthyLiving->mobile) || ! isEmptyOrNull($healthyLiving->mobile_2))
                                        <p>
{{--                                            <i class="fa fa-mobile"></i>--}}
                                            <i><img src="{!! asset('assets/img/directory-mobile.png') !!}" alt=""></i>
                                            <span>
                                                <a data-tel="{!! $healthyLiving->mobile or '' !!}">
                                                    {!! $healthyLiving->mobile or '' !!}
                                                </a>
                                                @if(! isEmptyOrNull($healthyLiving->mobile_2) )
                                                    ,
                                                    <a data-tel="{!! $healthyLiving->mobile_2 or '' !!}">
                                                    {!! $healthyLiving->mobile_2 or '' !!}
                                                </a>
                                                @endif
                                            </span>
                                        </p>
                                    @endif

                                    @if($healthyLiving->discount_availability)
                                        <div class="dir-button-area">
                                            <a href="{!! route('frontend.healthy-living.show',  $healthyLiving->id) !!}" class="btn-alt active shadow small margin-null discount-btn" ><i class="fa fa-hand-o-up" ></i> {{__('find_hospital.buttons.get_discount')}}</a>
                                            {{--<a href="#" class="btn-alt active shadow small margin-null" data-toggle="modal" data-target="#tipsmodal"><i class="fa fa-map-marker"></i> Show on Map</a>--}}
                                            <a class=" btn-alt active shadow small margin-null btnShow"
                                               data-title="{!! $healthyLiving->name or '' !!}"
                                               data-latitude="{!! $healthyLiving->latitude or '' !!}"
                                               data-longitude="{!! $healthyLiving->longitude or '' !!}" type="button">
{{--                                                <i class="fa fa-map-marker"></i>--}}
                                                <i><img src="{!! asset('assets/img/map_icon.png') !!}" alt=""></i>
                                                {{__('buttons.show_map')}}
                                                {{--Show On Map--}}
                                            </a>

                                        </div>
                                    @else
                                        <div class="sin-button-area">
                                            <a class=" btn-alt active shadow small margin-null btnShow"
                                               data-title="{!! $healthyLiving->name or '' !!}"
                                               data-latitude="{!! $healthyLiving->latitude or '' !!}"
                                               data-longitude="{!! $healthyLiving->latitude or '' !!}" type="button">
{{--                                                <i class="fa fa-map-marker"></i>--}}
                                                <i><img src="{!! asset('assets/img/map_icon.png') !!}" alt=""></i>
                                                {{__('buttons.show_map')}}
                                                {{--Show On Map--}}
                                            </a>
                                        </div>

                                    @endif
                                        {{--<a class=" btn-alt active shadow small margin-null btnShow"
                                           data-title="{!! $healthyLiving->name or '' !!}"
                                           data-latitude="{!! $healthyLiving->latitude or '' !!}"
                                           data-longitude="{!! $healthyLiving->longitude or '' !!}" type="button">
                                            <i class="fa fa-map-marker"></i> Show On Map</a>--}}


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
                        <h6 class="text-center">{{__('find_hospital.msg_10')}}</h6>
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
