@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Coming | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap row hos-bg">
        <div class="col-md-12 padding-leftright-null">
            <!-- ————————————————————————————————————————————
            ———	Contact Content Start here
            —————————————————————————————————————————————— -->
            <section class="doctor page padding-md">
                <div class="container">
                    <h2 class="text-center padding-top-null white">
                        {{__('askDoctor.doctor_available')}}
                    </h2>
                    @if(Session::has('success'))
                        <p class="text-center padding-top-null success-notify">{{ Session::get('success') }}</p>
                    @endif
                    @if(Session::has('error'))
                        <p class="text-center padding-top-null error-notify">{{ Session::get('error') }}</p>
                    @endif

                    {!! Form::open(['route'=>'frontend.services.contact'])  !!}
                        <p class="user-notify text-center">
                            <input class="form-field" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$"  name="email" id="email" type="email" placeholder="Write Your amail address"  required    title="Please valid email address">
                            <input class="form-field" name="feedback_type" id="subjectForm" type="hidden" placeholder="Subject" value="ask-doctor">
                            <input id="" class="btn-alt active shadows" value="Notify Me" type="submit">
                        </p>
                    {!! Form::close() !!}


                </div>
            </section>
        </div>
    </div>
    <div id="home-wrap" class="content-section fullpage-wrap phr">
        <div class="row no-margin bottom-shadow">
            <div class="col-md-12 padding-leftright-null">
                <div class="col-md-6 padding-leftright-null">
                    <div class="text padding-md-bottom-null">
                        <!--<h2 class="small">Personal Health Record (PHR)</h2>-->
                        <p class="justi">{{__('askDoctor.doctor_available')}}
                        </p>
                    </div>
                </div>
                <div class="col-md-6 padding-leftright-null">
                    <div class="text padding-md-bottom-null download-app">
                        <p class="justi"> </p>
                        <a href="{{ config('misc.app.android-native.app_url') }}"><img src="{!! asset('assets/img/playstore1.png') !!}" class="" alt="" width="180px"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('before-scripts-end')

@endsection