@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Insurance Claim Confirm | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('after-styles')

@endsection

@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap service-bg">
        <div class="row margin-leftright-null">
            <section class="doctor page padding-md">
                <div class="container">
                    <h2 class="text-center padding-top-null white">
                        {{__('claim_insurance.header.title')}}
                    </h2>
                    <p class="heading white text-center">{{__('claim_insurance.header.text')}}</p>
                </div>
            </section>
        </div>
    </div>
    <div id="home-wrap" class="content-section fullpage-wrap about-page claim">
        <div class="row no-margin text new-services">

            {{--@if(session('message'))--}}
                {{--<p class="success" style="position: relative; top: 2px;left: 40px;"> {!! session('message') !!}</p>--}}
            {{--@endif--}}
            <div class="claim-mgs">
                <img src="{!! asset('assets/img/checked.png') !!}" alt="">
                {{__('claim_insurance.confirm_msg')}}
                </div>

        </div>
    </div>
@endsection

@section('before-scripts-end')

@endsection
