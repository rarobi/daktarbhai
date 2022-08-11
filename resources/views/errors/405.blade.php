@extends('frontend.layouts.theme.master')

@section('page-header-class', 'header-static')

@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap">
        <div class="row">
            <!-- ————————————————————————————————————————————
            ———	About us content
            —————————————————————————————————————————————— -->
            <div class="col-md-4 col-xs-12 col-md-offset-2 other-error-page">
                <div class="text padding-bottom-md ">
                    <img src="{!! asset('assets/img/500.png') !!}" style="width:100%">
                </div>
            </div>
            <div class="col-md-4 col-xs-12 other-error-page">
                <div class="text padding-bottom-md padding-left-null">
                    <h1><span>Oops!</span><br>Something went <span>wrong</span>...</h1>
                    <p class="text-center">Try that again, and if it still dosen't work, let us know our status page is currently reporting a status of All systems Operational.</p>
                    <!--<a href="#" class="btn-alt small active doc-btn">Go Back to Home page</a>-->
                </div>
            </div>

        </div>
    </div>
@endsection

@section('before-scripts-end')


@endsection