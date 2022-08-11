@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Video Call To a Doctor' !!}
@endsection

@section('page-header-class', 'header-static')
@section('after-styles')
<link rel="stylesheet" href="{!! asset('assets/css/nice-select.min.css') !!}">
@endsection
<style>
    .back_btn{
        margin-right: 15px;
    }

</style>
@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap row doc-bg">

    <div id="home-wrap" class="content-section fullpage-wrap row">

        <div class="doctor-list ">

            <div class="col-md-1"></div>
            <div class="col-md-10" style="background-color: #F4F6F8;">
                <div class="row" style="margin: 0px 15px 15px 0px">
                    <div class="col-sm-12">
                        <a href="{{ route('frontend.tele-medicine.speciality-list') }}" class="back_btn pull-right"><i class="fa fa-backward"></i> Back</a>
                    </div>
                </div>
                @if(count($doctors)>0)
                        @foreach($doctors as $doctor)
                            <div class="col-md-3">
                                <div class="single-doctor-box">
                                    <div class="doc-single search-list row" style="background-color: #ffffff;margin-bottom: 15px !important;">
                                        <div class="col-md-12 padding-sm">
                                            <div class="doc-images text-center">
                                                <a href=""><img src="{!! (isset($doctor) && $doctor->image !=null) ? $doctor->image : asset('assets/img/doctor-grey.png') !!}" alt="doctor" class="img-responsive"></a>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center doctor-profile-btn">
                                            <div class="doctor-info">
                                             <h4 class="margin-bottom-small">{!! $doctor->name or '' !!}</h4>
                                                {{--                                          <p class="designation margin-bottom-null">{!! $doctor->qualification or '' !!}</p>--}}
                                                @if(isset($doctor->specialities) && $doctor->specialities != null)
                                                    <div class="address-wrap">
                                                        <div class="address-left">
                                                            <ul class="doc-specil">
                                                                <li>
                                                                    {!! $doctor->specialities or '' !!}
{{--                                                                    {{ \Illuminate\Support\Str::limit($doctor->specialities, 140, $end='...') }}--}}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3 padding-top-null">
                                            <a href="{!! route('frontend.tele-medicine.doctor-appointment',$doctor->doctor_id ) !!}" class="btn-alt small active doc-btn" style="float: none;margin-bottom: 15px;">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @else
                        <div class="doc-single padding-sm doctor-not-found">
                            <img src="{!! asset('assets/img/doctor-not-found.png') !!}" alt="">
                            <h6 class="text-center">{{__('find_doctor.message.search_doctor')}}
                                {{--We have not found any <span>Doctors</span> that match your search criteria.--}}
                            </h6>
                        </div>
{{--                    @endif--}}
                @endif
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>


@endsection

