@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Subscription Packages| ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('after-styles')
    <style>
        #pricing .price.daily .price-header {
            background: #F7941E;
            height: 100px;
            border-radius: 10px 10px 0 0;
        }

        #pricing .price .price-number {

            line-height: 100px !important;
        }


    </style>
@stop


@section('content')

    <!--  Page Content, class footer-fixed if footer is fixed  -->
    <div id="page-content" class="header-static footer-fixed">
        <div id="home-wrap" class="content-section fullpage-wrap row dir-bg">
            <div class="col-md-12 padding-leftright-null">
                <!-- ————————————————————————————————————————————
                ———	Find Doctor Start here
                —————————————————————————————————————————————— -->
                <section class="health-directory-page doctor page padding-md doctor-pd" style="padding: 130px 0 100px 0 !important;">
                    <div class="container">
                        <div class="text-center package-header">
                            <h3 class="big margin-bottom-small">Protyasha Packages</h3>
                            <p class="heading margin-bottom text-center">
                                {{__('packages.header_text')}}
                            </p>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div id="home-wrap" class="content-section fullpage-wrap">
            <div class="row no-margin">
                <div class="col-md-12 padding-leftright-null">
                    <div class="row">
                        @if(isset($subscriptionPlans))
                            <section id="pricing" class="{!! count($subscriptionPlans)>2?'showcase-carousel':'' !!}">

                                @foreach($subscriptionPlans as $plan)
                                    @if($plan->plan_slug == 'protyasha-1' || $plan->plan_slug == 'protyasha-2' ||  $plan->plan_slug == 'protyasha-3')
                                        @if(Cookie::has('_tn') && isset($logged_in_api_user))
                                            @if($logged_in_api_user->is_subscribed && $plan->plan_slug == 'free')
                                                @continue
                                            @endif
                                        @endif
                                        @if(count($subscriptionPlans)>2)
                                            <div class="price daily standard padding-leftright-null {!! lcfirst($plan->name) !!} ">
                                                @else
                                                    <div class="col-md-4 plan-2 price daily standard padding-leftright-null {!! lcfirst($plan->name) !!} ">
                                                        @endif
                                                        <div class="price-header two">
                                                            <div class="price-number relative" style="color: #fff;">
                                                                <div>
                                                                    {!! '৳'.$plan->price !!}
                                                                    <span style="color: #fff;">
                                                                      {!! is_null($plan->duration)?'':'/ '.$plan->days !!} Days
                                                                </span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <ul>
                                                            @foreach($plan->plan_features as $feature)
                                                                <li class="{!! ($feature->feature_status)?'':'not-allow' !!}">{!! $feature->feature_title !!}</li>
                                                            @endforeach
                                                        </ul>
                                                        @if(Cookie::has('_tn') && isset($logged_in_api_user))
                                                            @if($logged_in_api_user->is_subscribed == false || $logged_in_api_user->is_trial_user==true)

                                                                {{--//SUBSCRIPTION_ACTIVE bool required --}}
                                                                @if(config("misc.web.subscription_active") == 'active')
                                                                    @if($plan->plan_slug == 'free')
                                                                        <a href="#" class="btn-alt small">{!! 'You are enjoying free subscription' !!}</a>
                                                                    @else
                                                                        @if(preg_match("/bl/", $plan->plan_slug))
                                                                            <a href="{!! route('frontend.subscription.confirmation.blink', [$plan->plan_slug] ) !!}" class="btn-alt small buy-btn">Buy Now</a>
                                                                        @else
                                                                            <a href="{!! route('frontend.subscription.confirmation', [$plan->plan_slug] ) !!}" class="btn-alt small buy-btn">Buy Now</a>
                                                                        @endif

                                                                    @endif

                                                                @else
                                                                    {{--<a class="disable-subscriptions " href="#openbox">Buy Now</a>--}}
                                                                @endif
                                                            @else
                                                                @if(in_array($plan->id,$plans))
                                                                    <p class="active-plane">You have Purchased this plan</p>
                                                                @else
                                                                    @if(config("misc.web.subscription_active") == 'active')
                                                                        @if(isset($logged_in_api_user) && $logged_in_api_user->is_subscribed == false)
                                                                            <a href="{!! route('frontend.subscription.confirmation', [$plan->plan_slug] ) !!}" class="btn-alt small buy-btn">BUY NOW</a>
                                                                        @endif
                                                                    @else
                                                                        <a class="disable-subscriptions buy-btn" href="#openbox">BUY NOW</a>
                                                                    @endif

                                                                @endif

                                                            @endif
                                                        @else
                                                            @if(config("misc.web.subscription_active") == 'active')
                                                                @if($plan->plan_slug == 'free')
                                                                    <a href="{!! route('frontend.signin') !!}" class="btn-alt small">{{__('packages.buttons.signup_now')}}</a>
                                                                @else
                                                                    @if(isset($logged_in_api_user) && $logged_in_api_user->is_subscribed == false)
                                                                     <a href="{!! route('frontend.subscription.confirmation', [$plan->plan_slug] ) !!}" class="btn-alt small buy-btn">BUY NOW</a>
                                                                    @endif
                                                                @endif
                                                            @else
                                                                <a class="disable-subscriptions buy-btn" href="#openbox">BUY NOW<</a>
                                                            @endif
                                                        @endif

                                                    </div>
                                                @endif
                                            @endforeach
                            </section>
                        @endif
                        <div id="openbox" class="openboxdiv">
                            <div>
                                <a href="#div-close" title="Close" class="div-close">x</a>
                                <h2></h2>
                                <p><br>To purchase a subscription package, please dial 16643.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <style media="screen">
        .disable-subscriptions {
            height: 40px;
            line-height: 42px;
            background-color: transparent;
            border: 1px solid #00d4a4;
            color: #00d4a4;
            transition: all .4s ease;
            font-size: 12px;
            padding: 0;
            padding-right: 30px;
            padding-left: 30px;
            text-align: center;
            letter-spacing: 1px;
            font-family: "Poppins",sans-serif;
            text-transform: uppercase;
            display: inline-block;
            overflow: hidden;
            outline: 0;
            border-radius: 2px;
            font-weight: 100;
            position: relative;
            margin-right: 10px;
            margin-left: 10px;
            margin-bottom: 35px;
            text-decoration: none !important;
            /*background-color: #00d4a4;*/
        }
        .disable-subscriptions:hover{
            color: #fff;
            background-color: #FF6D00;
            border: 1px solid #FF6D00;
        }
        .openboxdiv {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.7);
            z-index: 99999;
            opacity: 0;
            -webkit-transition: opacity 400ms ease-in;
            -moz-transition: opacity 400ms ease-in;
            transition: opacity 400ms ease-in;
            pointer-events: none;
        }
        .openboxdiv:target {
            opacity: 1;
            pointer-events: auto;
        }
        .openboxdiv > div {
            width: 400px;
            position: relative;
            margin: 17% auto;
            padding: 5px 20px 13px 20px;
            border-radius: 4px;
            background: #fff;
            box-shadow: 0 0 10px 0 #ccc;
            text-align: center;
        }
        .openboxdiv > div p{
            font-size: 15px;
            color: #666;

        }
        .div-close {
            background: #FF6D00 ;
            color: #ffffff;
            line-height: 20px;
            position: absolute;
            right: -12px;
            text-align: center;
            top: -10px;
            width: 24px;
            border-radius: 12px;
            opacity: 1;
            height: 24px;
            font-weight: 400;
        }
        .div-close:hover {
            background: #FF6D00 ;
            color: #fff;
        }

    </style>
@endsection

