@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Find Blood-Bank | ' . app_name()  !!}
@endsection
@section('page-header-class', 'header-static')
@section('after-styles')
    <style>
        @media (max-width: 768px) {
            .directory-list-page .thumbnail a.btn-alt {
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
                @foreach($items as $bloodBank)
                    {{--{!! dd($bloodBank) !!}--}}
                <div class="col-md-3 blood_panel">
                    <div class="card-title text-center">
                        <p><span class="">Pharmacy</span></p>
                    </div>
                    <div class="thumbnail blood_box">
                        <img src="{!! (isset($bloodBank) && $bloodBank->image_path != null) ? $bloodBank->image_path : asset('assets/img/directory/blood-bank-dir.png') !!}" alt="...">
                        <div class="caption text-center directory-info-box">
                            <h3>{!! $bloodBank->name or '' !!}</h3>
                            <p  style="margin-bottom: 0;">
{{--                                <span class="directory-cat">Blood Bank</span>--}}
                                @if(! isEmptyOrNull($bloodBank->district_name))
                                    <i class="fa fa-map-marker"></i> {!! ucwords($bloodBank->district_name) !!}
                            </p>
                                @endif

                            <hr class="separator">
                        </div>
                        <div class="caption">
                        @if(! isEmptyOrNull($bloodBank->address))
                                <p>
{{--                                    <i class="fa fa-home"></i>--}}
                                    <i> <img src="{!! asset('assets/img/directory-location.png') !!}" alt=""></i>
                                    <span> {!! $bloodBank->address or '' !!}</span></p>
                            @endif

                            @if(! isEmptyOrNull($bloodBank->email))
                                <p><i class="fa fa-envelope-o"></i> {!! $bloodBank->email or '' !!}</p>
                            @endif

                            @if(! isEmptyOrNull($bloodBank->landphone ) || ! isEmptyOrNull($bloodBank->landphone_2) )
                                <p>
{{--                                    <i class="fa fa-phone"></i>--}}
                                    <i ><img src="{!! asset('assets/img/directory-landphone.png') !!}" alt=""></i>
                                    <span>
                                        <a data-tel="{!! $bloodBank->landphone or '' !!}">
                                            {!! $bloodBank->landphone or '' !!}
                                        </a>
                                        @if(! isEmptyOrNull($bloodBank->landphone_2) ) ,
                                        <a data-tel="{!! $bloodBank->landphone_2 or '' !!}">
                                            {!! $bloodBank->landphone_2 or '' !!}
                                        </a>
                                        @endif
                                    </span>
                                </p>
                            @endif

                            @if(! isEmptyOrNull($bloodBank->mobile) || ! isEmptyOrNull($bloodBank->mobile_2))
                                <p>
{{--                                    <i class="fa fa-mobile"></i>--}}
                                    <i><img src="{!! asset('assets/img/directory-mobile.png') !!}" alt=""></i>
                                    <span>
                                        <a data-tel="{!! $bloodBank->mobile or '' !!}">
                                            {!! $bloodBank->mobile or '' !!}
                                        </a> @if(! isEmptyOrNull($bloodBank->mobile_2) )
                                            ,
                                        <a data-tel="{!! $bloodBank->mobile_2 or '' !!}">
                                            {!! $bloodBank->mobile_2 or '' !!}
                                        </a> @endif
                                    </span>
                                </p>
                            @endif

                            <a class=" btn-alt active shadow small margin-null btnShow"
                               data-title="{!! $bloodBank->name or '' !!}"
                               data-latitude="{!! $bloodBank->latitude or '' !!}"
                               data-longitude="{!! $bloodBank->longitude or '' !!}"
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
                        {{--<h6 class="text-center">We have not found any <span>blood-bank</span> that match your search criteria.</h6>--}}
                        <h6 class="text-center">{{__('find_hospital.msg_9')}}</h6>
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

