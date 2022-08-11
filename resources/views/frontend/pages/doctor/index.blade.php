@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Book Appointment | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')
@section('after-styles')
<link rel="stylesheet" href="{!! asset('assets/css/nice-select.min.css') !!}">
@endsection

<style>
    /*#scrollable-dropdown-menu .tt-menu {*/
    /*max-height: 300px;*/
    /*overflow-y: auto;*/
    /*background-color: white;*/
    /*width: 100%;*/
    /*padding: 20px 15px;*/
    /*font-size: 14px;*/
    /*line-height: 30px;*/
    /*}*/
    /*span.twitter-typeahead {*/
    /*width: 100%;*/
    /*}*/
    option {
        background: white;
        width: 110%;
        margin-left: -5%;
        padding: 0 20px;
    }

    .list {
        height: 300px;
        overflow-y: scroll !important;
    }

    @media screen and (min-width: 320px)and (max-width: 1000px) {
        .white{
            margin-top: 100px;
        }
    }
</style>
@section('content')

    <div id="home-wrap" class="content-section fullpage-wrap row doc-bg overlay m-b-15px">
        <div class="col-md-12 padding-leftright-null">
            <!-- ————————————————————————————————————————————
            ———	Find Doctor Start here
            —————————————————————————————————————————————— -->
            <section class="doctor page padding-md doctor-pd">
                <div class="container">
                    <h2 class="text-center padding-sm padding-top-null white">
                        {{--Find Your <span>Doctor</span>--}}
                        {{__('find_doctor.header.title_1')}}
                    </h2>
                    {{--{{dd(Lang::locale())}}--}}
                    <div class="doc-search">
                        <div class="search-form">
                            <form method="get" action="{!! route('frontend.doctor.details-info-search') !!}"  class="doctor-search-form">
                                <div class="col-md-3 search-form-left">
                                    <div class="form-group">
                                        <select class="division-list form-control location-search custom-select select2-hidden-accessible" data-placeholder="Location" name="division_name" tabindex="-1" aria-hidden="true">
                                            <option value="" selected="selected"> {{__('find_doctor.placeholder.search_division')}}</option>
                                            @if(Lang::locale() == 'bn')
                                              @if(isset($divisions))
                                                @foreach($divisions as $division)
                                                    <option value="{!! $division->division_name  !!}" >{!! $division->division_bn_name or '' !!}</option>
                                                @endforeach
                                              @endif
                                            @endif

                                            @if(Lang::locale() == 'en')
                                              @if(isset($divisions))

                                                @foreach($divisions as $division)
                                                    <option value="{!! $division->division_name  !!}" >{!! $division->division_name or '' !!}</option>
                                                @endforeach
                                              @endif
                                            @endif

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 search-form-left">
                                    <div class="form-group">
                                        <select class="district-list form-control location-search" data-placeholder="Location" name="district_name" tabindex="-1" aria-hidden="true">
                                            <option value="" selected="selected">{{__('find_doctor.placeholder.search_district')}}</option>
                                        @if(Lang::locale() == 'bn')
                                            @if(isset($districts))
                                                @foreach($districts as $district)
                                                        <option value="{!! $district->district_name  !!}" >{!! $district->district_bn_name or '' !!}</option>
                                                    @endforeach
                                                @endif
                                            @endif

                                            @if(Lang::locale() == 'en')
                                                @if(isset($districts))
                                                    @foreach($districts as $district)
                                                        <option value="{!! $district->district_name  !!}" >{!! $district->district_name or '' !!}</option>
                                                    @endforeach
                                                @endif
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div id="scrollable-dropdown-menu" class="col-md-5 search-form-left">
                                    {{--<input type="text" class="form-control " placeholder="Search by Doctor name..." name="doctor_name" value="">--}}
                                    <input  list="browsers" class="typeahead form-control" id="doctorName" type="text" name="doctor_name" value="" placeholder="{{__('find_doctor.placeholder.search_doctor')}}">
                                    <input type="hidden" id="typeSelecctedVal" name="search_id">
                                </div>
                                <div class="col-md-1 search-form-left">
                                    <input type="submit" class="f-button btn-alt small active margin-null" value="{{__('find_doctor.button.search')}}">
                                    {{--<a class="btn-alt small active margin-null" type="submit"><i class="ion-android-search"></i></a>--}}
                                </div>
                            </form>
                        </div>
                        {{--<div class="top-specialty">--}}
                            {{--<p>{{__('find_doctor.header.title_2')}} : </p>--}}
                            {{--<ul>--}}
                                {{--<li><a href="{!! route('frontend.doctor.details-info-search'). '?doctor_name=Gastroenterology&search_id'.'='.  13 !!}"><img src="{!! asset('assets/img/specialist/gastroenterology.png') !!}" alt="Gastroenterology"><span> <br> {{__('find_doctor.header.gastroenterology')}}</span></a></li>--}}
                                {{--<li><a href="{!! route('frontend.doctor.details-info-search'). '?doctor_name=Dermatology&search_id'.'='.  8 !!}"><img src="{!! asset('assets/img/specialist/dermatology.png') !!}" alt="Dermatology"><span>  <br>{{__('find_doctor.header.dermatology')}}</span></a></li>--}}
                                {{--<li><a href="{!! route('frontend.doctor.details-info-search'). '?doctor_name=Neurology&search_id'.'='.  6 !!}"><img src="{!! asset('assets/img/specialist/neurology.png') !!}" alt="Neurology"><span> <br> {{__('find_doctor.header.neurology')}}</span></a></li>--}}
                                {{--<li><a href="{!! route('frontend.doctor.details-info-search'). '?doctor_name=Cardiology&search_id'.'='.  5 !!}"><img src="{!! asset('assets/img/specialist/cardiology.png') !!}" alt="Cardiology"><span>  <br>{{__('find_doctor.header.cardiology')}}</span></a></li>--}}
                                {{--<li><a href="{!! route('frontend.doctor.details-info-search'). '?doctor_name=Allergy&search_id'.'='.  4 !!}"><img src="{!! asset('assets/img/specialist/allergy-Immunology.png') !!}" alt="Allergy & Immunology"><span> <br> {{__('find_doctor.header.allergy')}}</span></a></li>--}}
                                {{--<li><a href="{!! route('frontend.doctor.details-info-search'). '?doctor_name=Obstetrics&search_id'.'='.  3 !!}"><img src="{!! asset('assets/img/specialist/obstetrics-gynecology.png') !!}" alt="Gynecology"><span>  <br>{{__('find_doctor.header.gynecology')}}</span></a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </section>
        </div>
    </div>
{{--    <div id="home-wrap" class="content-section fullpage-wrap row white">--}}
{{--        <!-- ————————————————————————————————————————————--}}
{{--        ———	specialist Doctor search here--}}
{{--        —————————————————————————————————————————————— -->--}}
{{--        <div class="col-md-12 padding-leftright-null">--}}
{{--            <section id="news" class="page padding-md padding-bottom-null">--}}
{{--                <div class="row no-margin" style="margin-bottom:100px;">--}}
{{--                    <div class="col-md-12 services-box how-it-works">--}}
{{--                        <h1 class="text-center">{{__('find_doctor.bottom_content.title')}}</h1>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <div class="margin-md-bottom text-center">--}}
{{--                                <img src="{{ asset('assets/img/doctor-search.jpg') }}" width="75px" alt="Search">--}}
{{--                                <h6 class="heading  margin-bottom-extrasmall">{{__('find_doctor.bottom_content.search_doctor.title')}}--}}
{{--                                </h6>--}}
{{--                                <p>{{__('find_doctor.bottom_content.search_doctor.description')}}--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <div class="margin-md-bottom text-center">--}}
{{--                                <img src="{{ asset('assets/img/appointment.png') }}" width="75px" alt="Book">--}}
{{--                                <h6 class="heading  margin-bottom-extrasmall">{{__('find_doctor.bottom_content.book_appointment.title')}}</h6>--}}
{{--                                <p>{{__('find_doctor.bottom_content.book_appointment.description')}}--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <div class="margin-md-bottom text-center">--}}
{{--                                <img src="{{ asset('assets/img/get-well-soon.png') }}" width="75px" alt="Get Well Soon">--}}
{{--                                <h6 class="heading  margin-bottom-extrasmall">{{__('find_doctor.bottom_content.get_well_soon.title')}}</h6>--}}
{{--                                <p>{{__('find_doctor.bottom_content.get_well_soon.description')}}--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div id="home-wrap" class="content-section fullpage-wrap row white">
        <div class="col-md-12 padding-leftright-null  m-t-10px">
            <section id="news" class="page padding-md padding-bottom-null">
                <div class="row no-margin  m-t-10px" style="margin-bottom:100px;">
                    <div class="col-md-12 services-box how-it-works m-t-30">
                        <h1 class="text-center">{{__('askDoctor.how_work.title')}}</h1>
                        <div class="col-md-12">
                            <div class="col-md-4 col-md-offset-2">
                                <img src="{!! asset('assets/img/works1.png') !!}" width="" height="250px" alt="Search">
                            </div>
                            <div class="col-md-4 col-md-offset-1">
                                <h6 class="heading  margin-bottom-extrasmall">{{__('find_doctor.bottom_content.search_doctor.title')}}
                                </h6>
                                <p>{{__('find_doctor.bottom_content.search_doctor.description')}}
                                </p>
                            </div>
                        </div><br>
                        <div class="col-md-12 m-t-30">
                            <div class="col-md-4 col-md-offset-2">
                                <h6 class="heading  margin-bottom-extrasmall">{{__('find_doctor.bottom_content.book_appointment.title')}}</h6>
                                <p>{{__('find_doctor.bottom_content.book_appointment.description')}}
                                </p>
                            </div>
                            <div class="col-md-4 col-md-offset-1">
                                <img src="{!! asset('assets/img/works2.png') !!}" width="" height="250px" alt="Search">
                            </div>
                        </div><br>
                        <div class="col-md-12 m-t-30">
                            <div class="col-md-4 col-md-offset-2">
                                <img src="{!! asset('assets/img/works3.png') !!}" width="" height="250px" alt="Search">
                            </div>
                            <div class="col-md-4 col-md-offset-1">
                                <h6 class="heading  margin-bottom-extrasmall">{{__('find_doctor.bottom_content.get_well_soon.title')}}</h6>
                                <p>{{__('find_doctor.bottom_content.get_well_soon.description')}}
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('before-scripts')
  <script src="{!! asset('assets/js/typeahead.bundle.js') !!}"></script>
  <script src="{!! asset('assets/js/jquery.nice-select.min.js')!!}"></script>
  <!-- <script src='//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script> -->
@endsection
@section('before-scripts-end')
    @include('frontend.pages.doctor.scripts')
@endsection
