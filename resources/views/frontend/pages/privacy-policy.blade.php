@extends('frontend.layouts.theme.master')

@section('after-styles')
    {{--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">--}}
    <link rel="stylesheet" href="{!! asset('assets/css/datepicker.css') !!}">
@endsection

@section('title')
    {!! 'Privacy policy | ' . app_name()  !!}
@endsection

<style>
    p{
        color: #2F2F2F !important;
    }
</style>

@section('page-header-class', 'header-static')

@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap terms-page">
        <div id="home-wrap" class="content-section fullpage-wrap terms-bg">
            <div class="row margin-leftright-null">
                <section class="doctor page padding-md">
                    <div class="container">
                        <h1 class="text-center">{{__('privacy-policy.title')}}</h1>
                    </div>
                </section>
            </div>
        </div>
        <div class="row">
            <!-- ————————————————————————————————————————————
            ———	About us content
            —————————————————————————————————————————————— -->
            <div class="col-md-10 col-md-offset-1">
                <div class="text padding-bottom-null">
{{--                    <h1 class="text-center">{{__('privacy-policy.title')}}</h1>--}}
                    <h5 class="heading  margin-bottom-extrasmall">{{__('privacy-policy.how_protect.title')}}</h5>
                    <p class="margin-bottom-null"><i class="ion-android-done-all"></i>  {{__('privacy-policy.how_protect.text_1')}}</p>
                    <p class="margin-bottom-null"><i class="ion-android-done-all"></i>  {{__('privacy-policy.how_protect.text_2')}}</p>
                    <p class="margin-bottom-null"><i class="ion-android-done-all"></i>  {{__('privacy-policy.how_protect.text_3')}}</p>
                </div>
            </div>
        </div>
        <div class="row no-margin">
            <div class="col-md-12 padding-leftright-null">
                <div class="row no-margin">
                    <div class="col-md-10 col-md-offset-1 padding-leftright-null">
                        <div class="text padding-bottom-null">
                            <h5 class="heading  margin-bottom-extrasmall">{{__('privacy-policy.login.title')}}</h5>
                            <p class="margin-bottom-null">{{__('privacy-policy.login.description')}}</p>
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1 padding-leftright-null">
                        <div class="text padding-bottom-null">
                            <h5 class="heading grey margin-bottom-extrasmall">{{__('privacy-policy.personal_information.title')}}</h5>
                            <p>{{__('privacy-policy.personal_information.description')}}</p>

                            <p class="text-bold">{{__('privacy-policy.personal_information.note')}}</p>
                            <p><i class="ion-android-done-all"></i>  {{__('privacy-policy.personal_information.text_1')}}  </p>
                            <p><i class="ion-android-done-all"></i>  {{__('privacy-policy.personal_information.text_2')}} </p>
                            <p class="margin-bottom-null"><i class="ion-android-done-all"></i>  {{__('privacy-policy.personal_information.text_3')}} </p>
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1 padding-leftright-null">
                        <div class="text padding-bottom-null">
                            <h5 class="heading  margin-bottom-extrasmall"> {{__('privacy-policy.sharing_information.title')}}</h5>
                            <p class="margin-bottom-null">{{__('privacy-policy.sharing_information.text')}}</p>
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1 padding-leftright-null">
                        <div class="text padding-bottom-null">
                            <h5 class="heading  margin-bottom-extrasmall">{{__('privacy-policy.changes.title')}}</h5>
                            <p class="margin-bottom-null">{{__('privacy-policy.changes.text')}} </p>
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1 padding-leftright-null">
                        <div class="text">
                            <h5 class="heading  margin-bottom-extrasmall">{{__('privacy-policy.contact.title')}}</h5>
{{--                            <p>{{__('privacy-policy.contact.text')}} <a href="{{ config('misc.app.email.contact_email') }}" target="_blank">{{ config('misc.app.email.contact_email') }}</a>.</p>--}}
                            <p>{{__('privacy-policy.contact.text')}} <i style="font-weight: bold">{{ config('misc.app.email.contact_email') }}</i>.</p>
                            <p class="text-bold">{{__('privacy-policy.contact.note')}} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('after-scripts')


@endsection
