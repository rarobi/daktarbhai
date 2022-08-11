@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Find Ambulance | ' . app_name()  !!}
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
                @foreach($items as $ambulance)
                <div class="col-md-3">
                    <div class="card-title text-center">
                        <p><span class="">Ambulance</span></p>
                    </div>
                    <div class="thumbnail ">
                        <div class="panel-hos">
                            <img src="{!! (isset($ambulance) && $ambulance->image_path != null) ? $ambulance->image_path : asset('assets/img/directory/ambulance-dir.png') !!}" alt="...">
                            @if(isset($ambulance->discount_availability))
                                <span>Panel Discount Partner</span>
                            @endif
                        </div>
                        <div class="caption text-center directory-info-box">
                            <h3>{!! $ambulance->service_provider_name or '' !!}</h3>
                            <p style="margin-bottom: 0;">
{{--                                <span class="directory-cat">Ambulance</span>--}}
                                @if(! isEmptyOrNull($ambulance->district_name))
                                    <i class="fa fa-map-marker"></i> {!! ucwords($ambulance->district_name) !!} </p>
                                @endif

                            <hr class="separator">
                        </div>
                        <div class="caption">
                        @if(! isEmptyOrNull($ambulance->address))
                                <p>
{{--                                    <i class="fa fa-home"></i>--}}
                                    <i> <img src="{!! asset('assets/img/directory-location.png') !!}" alt=""></i>
                                    <span>{!! $ambulance->address or '' !!}</span>
                                </p>
                            @endif

                            @if(! isEmptyOrNull($ambulance->email))
                                <p><i class="fa fa-envelope-o"></i> {!! $ambulance->email or '' !!}</p>
                            @endif

                            @if(! isEmptyOrNull($ambulance->landphone ) || ! isEmptyOrNull($ambulance->landphone_2) )
                                <p>
{{--                                    <i class="fa fa-phone"></i>--}}
                                    <i ><img src="{!! asset('assets/img/directory-landphone.png') !!}" alt=""></i>
                                    <span>
                                        <a data-tel="{!! $ambulance->landphone or '' !!}">
                                            {!! $ambulance->landphone or '' !!}
                                        </a>
                                        @if(! isEmptyOrNull($ambulance->landphone_2) ) ,
                                        <a data-tel="{!! $ambulance->landphone_2 or '' !!}">
                                            {!! $ambulance->landphone_2 or '' !!}
                                        </a>
                                        @endif
                                    </span>
                                </p>
                            @endif

                            @if(! isEmptyOrNull($ambulance->mobile) || ! isEmptyOrNull($ambulance->mobile_2))
                                <p>
{{--                                    <i class="fa fa-mobile"></i>--}}
                                    <i><img src="{!! asset('assets/img/directory-mobile.png') !!}" alt=""></i>
                                    <span>
                                        <a data-tel="{!! $ambulance->mobile or '' !!}">
                                            {!! $ambulance->mobile or '' !!}
                                        </a>
                                        @if(! isEmptyOrNull($ambulance->mobile_2) )
                                            ,
                                        <a data-tel="{!! $ambulance->mobile_2 or '' !!}">
                                            {!! $ambulance->mobile_2 or '' !!}
                                        </a>
                                        @endif
                                    </span>
                                </p>
                            @endif

                            <a class=" btn-alt active shadow small margin-null btnShow"
                               data-title="{!! $ambulance->service_provider_name or '' !!}"
                               data-latitude="{!! $ambulance->latitude or '' !!}"
                               data-longitude="{!! $ambulance->longitude or '' !!}"
                               type="button">
{{--                                <i class="fa fa-map-marker"></i>--}}
                                <i><img src="{!! asset('assets/img/map_icon.png') !!}" alt=""></i>
                                {{__('buttons.show_map')}}
                                {{--Show On Map--}}
                            </a>
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
                        {{--<h6 class="text-center">We have not found any <span>ambulance</span> that match your search criteria.</h6>--}}
                        <h6 class="text-center">{{__('find_hospital.ambulance_search')}}</h6>
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
