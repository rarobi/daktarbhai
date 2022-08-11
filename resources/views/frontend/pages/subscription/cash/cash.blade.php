@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Subscription Confirmation | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('content')

    <div id="home-wrap" class="content-section fullpage-wrap">
        <div class="row">

                <div class="col-md-8 col-md-offset-2 sucess-subscribe">
                    <div class="text padding-bottom-sm ">
                        <img src="{!! asset('assets/img/error.png') !!}">
                    </div>
                    <div>
                        <h1>{!! 'Sorry '.$provider_name. ' is currently unavailable!!!' !!}</h1>
                        <a href="{!! url('profile/subscription-history') !!}" class="btn-alt small active doc-btn">Go Back to Home page</a>
                    </div>
                </div>

        </div>
    </div>
@endsection