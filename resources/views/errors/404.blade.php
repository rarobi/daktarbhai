@extends('frontend.layouts.theme.master')

@section('page-header-class', 'header-static')

@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap">
        <div class="row">
            <!-- ————————————————————————————————————————————
            ———	404 page content
            —————————————————————————————————————————————— -->
            <div class="col-md-3 col-xs-5 col-md-offset-2 error-page">
                <div class="text padding-bottom-md ">
                    <img src="{!! asset('assets/img/404.png') !!}">
                </div>
            </div>
            <div class="col-md-4 col-xs-7 error-page">
                <div class="text padding-bottom-md padding-left-null">
                    <h1><span>Sorry!</span> We couldn't find what you were looking for...</h1>
                    <a href="{!! route('frontend.index') !!}" class="btn-alt small active doc-btn">Go Back to Home page</a>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('before-scripts-end')


@endsection