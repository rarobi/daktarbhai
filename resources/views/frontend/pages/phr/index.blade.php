@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Personal Health Record | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('after-styles')

    <style>
        a.btn-alt.small.active {
             background-color: #36B7B4 !important;
            border: 1px solid #36B7B4 !important;
             color: #fff;
            height: 55px !important;
            line-height: 55px;
        }

        .app-download-area img {
            width: 80% !important;
            height: 600px !important;
        }

    </style>
@endsection

@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap row dir-bg">
        <div class="col-md-12 padding-leftright-null">
            <!-- ————————————————————————————————————————————
            ———	Find Doctor Start here
            —————————————————————————————————————————————— -->
            <section class="health-directory-page doctor page padding-md doctor-pd" style="padding: 130px 0 100px 0 !important;">
                <div class="container">
                    <h2 class="text-center padding-top-null white margin-bottom-small" style="font-weight: 800">
                        {{__('phr.public_page.title')}}
                    </h2>
                    <p class="heading white text-center" style="font-weight: 500; font-size: 20px">{{__('phr.public_page.sub_title')}}</p>
                </div>
            </section>
        </div>
    </div>
    <div id="home-wrap" class="content-section fullpage-wrap phr">
        <div class="row no-margin bottom-shadow" style="background: linear-gradient(180deg, #F6F7F9 0%, rgba(244, 246, 248, 0) 100%);">
            <div class="col-md-12 padding-leftright-null">
                <div class="col-md-6 padding-leftright-null">
                    <div class="text padding-md-bottom-null">
                        <p class="justi padding-onlytop-md"><strong>{{__('phr.public_page.title')}} {{__('phr.public_page.phr')}}</strong>{{__('phr.public_page.section_web.description')}}</p>
                        <a href="{!! route('frontend.profile.phr') !!}" class="btn-alt active shadow small margin-null">{{__('phr.common.button.rec_phr')}}</a>
                    </div>
                </div>
                <div class="col-md-6 padding-leftright-null">
                  <div class="text padding-md-bottom-null phr-top">
                          <img src="{!! asset('assets/img/phr-page (2).png') !!}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="row margin-leftright-null" style="background: linear-gradient(180deg, #F4F6F8 0%, #FFFFFF 100%);">
          <div class="col-md-6 padding-leftright-null">
              <div class="text padding-md-bottom-null">
                <div class="app-download-area">
                  <img src="{!! asset('assets/img/app-view.png') !!}" alt="">
                </div>
              </div>
          </div>
          <div class="col-md-6 padding-leftright-null">
              <div class="text padding-md-bottom-null download-app">
                <h1>
                    {{__('phr.public_page.section_app.title')}}
                </h1>
                <p class="justi">{{__('phr.public_page.section_app.description')}}</p>
                <a target="_blank" href="{{ config('misc.app.android-native.app_url') }}" class="app-btn margin-null"><img src="{!! asset('assets/img/android-playstore.png') !!}" class="google-icon" alt=""></a>
                {{--<a target="_blank" href="{{ config('misc.app.ios.app_url') }}" class="app-btn margin-null"><img src="{!! asset('assets/img/ios-app-store.png') !!}" class="google-icon" alt=""></a>--}}
              </div>
          </div>
        </div>
    </div>
@endsection
