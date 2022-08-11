@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Find Pharmacy | ' . app_name()  !!}
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
            @foreach($items as $pharmacy)
                <div class="col-md-3">
                    <div class="card-title text-center">
                        <p><span class="">Pharmacy</span></p>
                    </div>
                    <div class="thumbnail hospitals pharmacy">
                        <div class="panel-hos">
                        <img src="{!! (isset($pharmacy) && $pharmacy->image_path != null) ? $pharmacy->image_path : asset('assets/img/directory/pharmacy-dir.png') !!}" alt="...">
{{--                        @if($pharmacy->discount_availability)--}}
{{--                            <span>Panel Discount Partner</span>--}}
{{--                        @endif--}}
                        </div>
                        <div class="caption text-center directory-info-box">
                            <h3>{!! $pharmacy->name or '' !!}</h3>
                            <p style="margin-bottom: 0;">
{{--                                <span class="directory-cat">Pharmacy</span>--}}
                                @if(! isEmptyOrNull($pharmacy->district_name))
                                <i class="fa fa-map-marker"></i>
                                    {!! $pharmacy->district_name or '' !!}
                                @endif
                            </p>
                            <hr class="separator" style="margin-bottom: 0">
                        </div>
                        <div class="caption">
                        @if(! isEmptyOrNull($pharmacy->address))
                                <p>
{{--                                    <i class="fa fa-home"></i>--}}
                                   <i> <img src="{!! asset('assets/img/directory-location.png') !!}" alt=""></i>
                                    <span> {!! $pharmacy->address or '' !!}</span>
                                </p>
                            @endif

                            @if(! isEmptyOrNull($pharmacy->email))
                                <p><i class="fa fa-envelope-o"></i> {!! $pharmacy->email or '' !!}</p>
                            @endif

                            @if(! isEmptyOrNull($pharmacy->landphone || ! isEmptyOrNull($pharmacy->landphone_2)) )
                                <p>
{{--                                    <i class="fa fa-phone"></i>--}}
                                    <i ><img src="{!! asset('assets/img/directory-landphone.png') !!}" alt=""></i>
                                    <span>
                                        <a data-tel="{!! $pharmacy->landphone or '' !!}">
                                            {!! $pharmacy->landphone or '' !!}
                                        </a>
                                        @if(! isEmptyOrNull($pharmacy->landphone_2) ) ,
                                        <a data-tel="{!! $pharmacy->landphone_2 or '' !!}">
                                            {!! $pharmacy->landphone_2 or '' !!}
                                        </a>
                                        @endif
                                    </span>
                                </p>
                            @endif

                            @if(! isEmptyOrNull($pharmacy->mobile || ! isEmptyOrNull($pharmacy->mobile_2)))
                                <p>
{{--                                    <i class="fa fa-mobile"></i>--}}
                                    <i><img src="{!! asset('assets/img/directory-mobile.png') !!}" alt=""></i>
                                    <span>
                                        <a data-tel="{!! $pharmacy->mobile or '' !!}">
                                            {!! $pharmacy->mobile or '' !!}
                                        </a>
                                        @if(! isEmptyOrNull($pharmacy->mobile_2) )
                                            ,
                                        <a data-tel="{!! $pharmacy->mobile_2 or '' !!}">
                                            {!! $pharmacy->mobile_2 or '' !!}
                                        </a>
                                        @endif
                                    </span>
                                </p>
                            @endif

                            @if($pharmacy->discount_availability)
                                <div class="dir-button-area">
                                    <a href="{!! route('frontend.pharmacy.show', $pharmacy->id) !!}" class="btn-alt active shadow small margin-null discount-btn" ><i class="fa fa-hand-o-up" ></i>
                                        {{__('find_hospital.buttons.get_discount')}}
                                        {{--Get Discount--}}
                                    </a>
                                    {{--<a href="#" class="btn-alt active shadow small margin-null" data-toggle="modal" data-target="#tipsmodal"><i class="fa fa-map-marker"></i> Show on Map</a>--}}
                                    <a class=" btn-alt active shadow small margin-null btnShow"
                                       data-title="{!! $pharmacy->name or '' !!}"
                                       data-latitude="{!! $pharmacy->latitude or '' !!}"
                                       data-longitude="{!! $pharmacy->longitude or '' !!}" type="button">
{{--                                        <i class="fa fa-map-marker"></i>  --}}
                                        <i><img src="{!! asset('assets/img/map_icon.png') !!}" alt=""></i>
                                        {{__('buttons.show_map')}}
                                        {{--Show On Map--}}
                                    </a>

                                </div>
                            @else
                                <div class="sin-button-area">
                                    <a class=" btn-alt active shadow small margin-null btnShow"
                                       data-title="{!! $pharmacy->name or '' !!}"
                                       data-latitude="{!! $pharmacy->latitude or '' !!}"
                                       data-longitude="{!! $pharmacy->latitude or '' !!}" type="button">
{{--                                        <i class="fa fa-map-marker"></i>--}}
                                        <i><img src="{!! asset('assets/img/map_icon.png') !!}" alt=""></i>
                                        {{__('buttons.show_map')}}
                                        {{--Show On Map--}}
                                    </a>
                                </div>

                            @endif
                            {{--<a href="#" class="btn-alt active shadow small margin-null" data-toggle="modal" data-target="#tipsmodal"><i class="fa fa-map-marker"></i> Show on Map</a>--}}
                            {{--<a class=" btn-alt active shadow small margin-null btnShow"
                               data-title="{!! $pharmacy->name or '' !!}"
                               data-latitude="{!! $pharmacy->latitude or '' !!}"
                               data-longitude="{!! $pharmacy->longitude or '' !!}"
                               type="button">
                                <i class="fa fa-map-marker"></i> Show On Map
                            </a>--}}
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
                    {{--<h6 class="text-center">We have not found any <span>pharmacy</span> that match your search criteria.</h6>--}}
                    <h6 class="text-center">{{__('find_hospital.pharmacy_search')}}</h6>
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

