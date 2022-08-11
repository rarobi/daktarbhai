@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Subscription success | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('content')

    <div id="home-wrap" class="content-section fullpage-wrap">
        <div class="row">
            <!-- ————————————————————————————————————————————
            ———	About us content
            —————————————————————————————————————————————— -->
            @if($status ==  200)
                 <div class="col-md-8 col-md-offset-2 sucess-subscribe">
                   <div class="text padding-bottom-md ">
                       <img src="{!! asset('assets/img/success.png') !!}">
                   </div>
                   <div>
                       <h1>{!! $message !!}</h1>
                       <a href="{!! url('profile/subscription-history') !!}" class="btn-alt small active doc-btn">Go Back to Home page</a>
                   </div>
                 </div>
            @else
                <div class="col-md-8 col-md-offset-2 sucess-subscribe">
                    <div class="text padding-bottom-sm ">
                        <img src="{!! asset('assets/img/error.png') !!}">
                    </div>
                    <div>
                        <h1>{!! $message !!}</h1>
                        <a href="javascript:void(0)" class="btn-alt small active doc-btn" onclick="goBack()">Go Back</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('before-scripts-end')
    <script>
        function getUrlVars() {
            var vars = [], hash;
            var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
            console.log(hashes);
            for (var i = 0; i < hashes.length; i++) {
                hash = hashes[i].split('=');
                vars.push(hash[0]);
                vars[hash[0]] = hash[1];
            }
            return vars;
        }

        function goBack() {
            window.history.go(-1);
        }
    </script>

@endsection
