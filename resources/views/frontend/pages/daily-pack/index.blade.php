@extends('frontend.layouts.theme.master')

@section('title')
  {!! 'Health Insurance | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('content')
  <div id="home-wrap" class="content-section fullpage-wrap row premium-bg">
    <div class="col-md-12 padding-leftright-null">

      <section class="doctor page padding-md">
        <div class="container">
          <h2 class="text-center padding-top-null white">
{{--            {{__('premium.daktarbhai')}}--}}
            {{__('premium.banglalink_daily.title')}}
          </h2>
{{--          <p class="heading white text-center"> {{__('premium.heading')}} </p>--}}
        </div>
      </section>
    </div>
  </div>
  <div id="home-wrap" class="content-section fullpage-wrap about-page health-package premium-page">
    <div class="row no-margin">
      <div class="col-md-5 padding-leftright-null col-md-offset-1">
        <div class="text padding-md-bottom-null cor-pack">
          <h3>{{__('premium.health_records.title')}}</h3>
          <p class="m-b-15px">{{__('premium.health_records.description')}}
          </p>
          <a href="{!! route('frontend.profile.phr') !!}" class="premium-btn">{{__('premium.health_records.button')}}</a>
        </div>
      </div>
      <div class="col-md-5 padding-leftright-null">
        <div class="text padding-md-bottom-null">
          <div class="premium-images">
            <img src="{!! asset('assets/img/premium/phr.png') !!}" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="row no-margin grey-bg">
      <div class="col-md-5 padding-leftright-null col-md-offset-1">
        <div class="text padding-md-bottom-null">
          <div class="premium-images">
            <img src="{!! asset('assets/img/premium/book-appoinment.png') !!}" alt="">
          </div>
        </div>
      </div>
      <div class="col-md-5 padding-leftright-null">
        <div class="text padding-md-bottom-null cor-pack">
          <h3>{{__('premium.doctors_appointment.title')}}</h3>
          <p class="m-b-15px">{{__('premium.doctors_appointment.description')}}
          </p>

          @if(Cookie::has('_tn') && isset($logged_in_api_user) && $logged_in_api_user->is_subscribed)
            <a href="{!! route('frontend.doctor.index') !!}" class="premium-btn">{{__('premium.doctors_appointment.button')}}</a>
          @else
            <a href="{!! route('frontend.subscription.plan') !!}" class="premium-btn">{{__('premium.upgrade')}}</a>
          @endif
        </div>
      </div>
    </div>
    <div class="row no-margin">
      <div class="col-md-5 padding-leftright-null col-md-offset-1">
        <div class="text padding-md-bottom-null cor-pack">
          <h3>{{__('premium.ask_doctor.title')}}</h3>
          <p class="m-b-15px">{{__('premium.ask_doctor.description')}}
          </p>
          @if(Cookie::has('_tn') && isset($logged_in_api_user) && $logged_in_api_user->is_subscribed)
            <a href="{!! route('frontend.ask_doctor') !!}" class="premium-btn">{{__('premium.ask_doctor.button')}}</a>
          @else
            <a href="{!! route('frontend.subscription.plan') !!}" class="premium-btn">{{__('premium.upgrade')}}</a>
          @endif
        </div>
      </div>
      <div class="col-md-5 padding-leftright-null">
        <div class="text padding-md-bottom-null cor-pack">
          <div class="premium-images">
            <img src="{!! asset('assets/img/premium/ask-a-doc.png') !!}" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="row no-margin grey-bg">
      <div class="col-md-5 padding-leftright-null col-md-offset-1">
        <div class="text padding-md-bottom-null cor-pack">
          <div class="premium-images">
            <img src="{!! asset('assets/img/premium/cash-back.png') !!}" alt="">
          </div>
        </div>
      </div>
      <div class="col-md-5 padding-leftright-null">
        <div class="text padding-md-bottom-null cor-pack">
          <h3>{{__('premium.accidental_coverage.title')}} </h3>
          <p class="m-b-15px">{{__('premium.accidental_coverage.description')}}
          </p>
          @if(Cookie::has('_tn') && isset($logged_in_api_user) && $logged_in_api_user->is_subscribed)
            <a href="{!! route('frontend.insurance-claim') !!}" class="premium-btn">{{__('premium.accidental_coverage.button')}}</a>
          @else
            <a href="{!! route('frontend.subscription.plan') !!}" class="premium-btn">{{__('premium.upgrade')}}</a>
          @endif
          <a href="{!! route('frontend.health-insurance') !!}" class="premium-btn">{{__('premium.learn_more')}}</a>
        </div>
      </div>
    </div>
    <div class="row no-margin">
      <div class="col-md-5 padding-leftright-null col-md-offset-1">
        <div class="text padding-md-bottom-null cor-pack">
          <h3>{{__('premium.hospitalization_coverage.title')}}</h3>
          <p class="m-b-15px">{{__('premium.hospitalization_coverage.description')}}
          </p>
          @if(Cookie::has('_tn') && isset($logged_in_api_user) && $logged_in_api_user->is_subscribed)
            <a href="{!! route('frontend.insurance-claim') !!}" class="premium-btn">{{__('premium.hospitalization_coverage.button')}}</a>
          @else
            <a href="{!! route('frontend.subscription.plan') !!}" class="premium-btn">{{__('premium.upgrade')}}</a>
          @endif
          <a href="{!! route('frontend.health-insurance') !!}" class="premium-btn">{{__('premium.learn_more')}}</a>

        </div>
      </div>
      <div class="col-md-5 padding-leftright-null">
        <div class="text padding-md-bottom-null cor-pack">
          <div class="premium-images">
            <img src="{!! asset('assets/img/premium/hospitalizations.png') !!}" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="row no-margin grey-bg">
      <div class="col-md-5 padding-leftright-null col-md-offset-1">
        <div class="text padding-md-bottom-null cor-pack">
          <div class="premium-images">
            <img src="{!! asset('assets/img/premium/life-insurance.png') !!}" alt="">
          </div>
        </div>
      </div>
      <div class="col-md-5 padding-leftright-null">
        <div class="text padding-md-bottom-null cor-pack">
          <h3>{{__('premium.lif_insurance.title')}} </h3>
          <p class="m-b-15px">{{__('premium.lif_insurance.description')}}
          </p>
          @if(Cookie::has('_tn') && isset($logged_in_api_user) && $logged_in_api_user->is_subscribed)
            <a href="{!! route('frontend.insurance-claim') !!}" class="premium-btn">{{__('premium.lif_insurance.button')}}</a>
          @else
            <a href="{!! route('frontend.subscription.plan') !!}" class="premium-btn">{{__('premium.upgrade')}}</a>
          @endif
          <a href="{!! route('frontend.health-insurance') !!}" class="premium-btn">{{__('premium.learn_more')}}</a>
        </div>
      </div>
    </div>
    <div class="row no-margin">
      <div class="col-md-5 padding-leftright-null col-md-offset-1">
        <div class="text padding-md-bottom-null cor-pack">
          <h3>{{__('premium.section_7.title')}}  </h3>
          <p class="m-b-15px">{{__('premium.section_7.description')}}
          </p>
          <a href="{!! route('frontend.health_directory') !!}" class="premium-btn"> {{__('premium.section_7.button')}}</a>
        </div>
      </div>
      <div class="col-md-5 padding-leftright-null">
        <div class="text padding-md-bottom-null cor-pack">
          <div class="premium-images">
            <img src="{!! asset('assets/img/premium/health-directory.png') !!}" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="row no-margin grey-bg">
      <div class="col-md-5 padding-leftright-null col-md-offset-1">
        <div class="text padding-md-bottom-null cor-pack">
          <div class="premium-images">
            <img src="{!! asset('assets/img/premium/blog.png') !!}" alt="">
          </div>
        </div>
      </div>
      <div class="col-md-5 padding-leftright-null">
        <div class="text padding-md-bottom-null cor-pack">
          <h3>{{__('premium.section_8.title')}}</h3>
          <p class="m-b-15px"> {{__('premium.section_8.description')}}  </p>
          </p>
          <a href="{!! route('frontend.blog.index') !!}" class="premium-btn"> {{__('premium.section_8.button')}}</a>
        </div>
      </div>
    </div>
    {{--<div class="row no-margin">--}}
      {{--<div class="col-md-5 padding-leftright-null col-md-offset-1">--}}
        {{--<div class="text padding-md-bottom-null cor-pack">--}}
          {{--<h3>Steps Count</h3>--}}
          {{--<p class="m-b-15px">Stay fit. Use our “Daktarbhai” app and automatically track how many steps you have taken, how far you have walked and how much calorie you have--}}
            {{--burned – all while your smartphone is in your pocket.</p>--}}
          {{--<a target="_blank" href="{{ config('misc.app.android-native.app_url') }}" class="premium-btn">Download App</a>--}}
        {{--</div>--}}
      {{--</div>--}}
      {{--<div class="col-md-5 padding-leftright-null">--}}
        {{--<div class="text padding-md-bottom-null cor-pack">--}}
          {{--<div class="premium-images">--}}
            {{--<img src="{!! asset('assets/img/premium/step-count.png') !!}" alt="">--}}
          {{--</div>--}}
        {{--</div>--}}
      {{--</div>--}}
    {{--</div>--}}
    <div class="row no-margin ">
      <div class="col-md-5 padding-leftright-null col-md-offset-1">
        <div class="text padding-md-bottom-null cor-pack">
          <h3>{{__('premium.section_9.title')}}</h3>
          <p class="m-b-15px"> {{__('premium.section_9.description')}}  </p>
          <a target="_blank" href="{{ config('misc.app.android-native.app_url') }}" class="premium-btn">{{__('premium.section_9.button')}} </a>
        </div>
      </div>
      <div class="col-md-5 padding-leftright-null">
        <div class="text padding-md-bottom-null cor-pack">
          <div class="premium-images">
            <img src="{!! asset('assets/img/premium/medicine-remainder.png') !!}" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="row no-margin grey-bg">
      <div class="col-md-5 padding-leftright-null col-md-offset-1">
        <div class="text padding-md-bottom-null cor-pack">
          <div class="premium-images">
            <img src="{!! asset('assets/img/premium/sleep.png') !!}" alt="">
          </div>
        </div>
      </div>
      <div class="col-md-5 padding-leftright-null">
        <div class="text padding-md-bottom-null cor-pack">
          <h3>{{__('premium.section_10.title')}}</h3>
          <p class="m-b-15px">{{__('premium.section_10.description')}}</p>
          <a target="_blank" href="{{ config('misc.app.android-native.app_url') }}" class="premium-btn">{{__('premium.section_10.button')}} </a>
        </div>
      </div>
    </div>
  </div>
@endsection
