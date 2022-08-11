@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Subscription Packages| ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('content')

    <!--  Page Content, class footer-fixed if footer is fixed  -->
    <div id="page-content" class="header-static footer-fixed">
        <div id="home-wrap" class="content-section fullpage-wrap row">
            <div class="col-md-12 padding-leftright-null">
                <!-- ————————————————————————————————————————————
                ———	Contact Content Start here
                —————————————————————————————————————————————— -->
                <section class="doctor subscriptions page">
                    <div class="container">
                        <div class="text-center">
                            <h3 class="grey big margin-bottom-small">{{__('packages.title')}}</h3>
                            <p class="heading margin-bottom grey text-center"> {{__('packages.header_text')}}</p>

                            {{--@if(Cookie::has('_tn') && isset($logged_in_api_user))--}}
                            {{--@if($logged_in_api_user->is_subscribed==false && $logged_in_api_user->enabled_subscription == false)--}}
                            {{--<a href="{!! route('frontend.subscription.trial') !!}" class="btn-alt active shadow small margin-null">Get Free Trial</a>--}}
                            {{--@else--}}
                            {{--@if($logged_in_api_user->is_trial_user==true)--}}
                            {{--<span style="color:#00a65a;font-weight: bold"> {!! 'You are enjoying trial subscription' !!} </span>--}}
                            {{--@endif--}}
                            {{--@endif--}}
                            {{--@endif--}}
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
                                                        <div class="price-title">
                                                            @if(Lang::locale() == 'bn')
                                                                @if($plan->plan_slug=='premium')
                                                                    ডাক্তারভাই ক্লাসিক
                                                                @endif
                                                                @if($plan->plan_slug=='bl-daily')
                                                                    ডাক্তারভাই ডেইলি প্যাকেজ
                                                                @endif
                                                                @if($plan->plan_slug=='bl-monthly')
                                                                    ডাক্তারভাই মান্থলি প্যাকেজ
                                                                @endif
                                                                @if($plan->plan_slug=='bl-yearly')
                                                                    ডাক্তারভাই ইয়ারলি প্যাকেজ
                                                                @endif
                                                            @else
                                                                {!! ucfirst($plan->name) !!}
                                                            @endif
                                                        </div>
                                                        {{--                                                        <div class="icon-img"><img src="{!! $plan->icon_image !!}" alt=""></div>--}}
                                                        <div class="price-number relative">
                                                            <div>
                                                                @if(Lang::locale() == 'bn')
                                                                    @if($plan->plan_slug=='premium')
                                                                        {!! ($plan->plan_slug == 'free')?'':'৳'.'৮০০' !!}
                                                                    @endif
                                                                    @if($plan->plan_slug=='bl-daily')
                                                                        {!! ($plan->plan_slug == 'free')?'':'৳'.'২.৪৪' !!}
                                                                    @endif
                                                                    @if($plan->plan_slug=='bl-monthly')
                                                                        {!! ($plan->plan_slug == 'free')?'':'৳'.'৬০.৮৮' !!}
                                                                    @endif
                                                                    @if($plan->plan_slug=='bl-yearly')
                                                                        {!! ($plan->plan_slug == 'free')?'':'৳'.'৭০০.০৬' !!}
                                                                    @endif
                                                                @else
                                                                    @if($plan->plan_slug=='premium')
                                                                        {!! ($plan->plan_slug == 'free')?'':'৳'.'800' !!}
                                                                    @else
                                                                        {!! ($plan->plan_slug == 'free')?'':'৳'.$plan->price !!}
                                                                    @endif
                                                                @endif

                                                                <span>
                                                                     @if(Lang::locale() == 'bn')
                                                                        @if($plan->plan_slug=='premium')
                                                                            /বছরে
                                                                        @endif
                                                                        @if($plan->plan_slug=='bl-daily')
                                                                            /দৈনিক
                                                                        @endif
                                                                        @if($plan->plan_slug=='bl-monthly')
                                                                            /মাসিক
                                                                        @endif
                                                                        @if($plan->plan_slug=='bl-yearly')
                                                                            /বাৎসরিক
                                                                        @endif
                                                                    @else
                                                                        {!! is_null($plan->duration)?'':'/ '.$plan->duration !!}
                                                                    @endif
                                                                </span>
                                                            </div>
                                                            <div>
                                                                <sup>
                                                                    @if(Lang::locale() == 'bn')
                                                                        @if($plan->plan_slug=='premium')
                                                                            ওয়েবসাইট থেকে ক্রয় করলে ৩৭.৫% ডিস্কাউন্ট
                                                                        @else
                                                                           (সরকার কর্তৃক ধার্যকৃত ভ্যাট ও ট্যাক্স সহ)
                                                                        @endif
                                                                    @else
                                                                        @if($plan->plan_slug=='premium')
                                                                          37.5% discount if purchage here
                                                                        @else
                                                                          (incl. tax)
                                                                        @endif

                                                                    @endif
                                                                </sup>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <ul>
                                                        @if(Lang::locale() == 'bn')
                                                            @foreach($plan->plan_features_bn as $feature)
                                                                <li class="{!! ($feature->feature_status)?'':'not-allow' !!}">{!! $feature->feature_title !!}</li>
                                                            @endforeach
                                                        @else
                                                            @foreach($plan->plan_features as $feature)
                                                                <li class="{!! ($feature->feature_status)?'':'not-allow' !!}">{!! $feature->feature_title !!}</li>
                                                            @endforeach
                                                        @endif

                                                        {{-- <li>@if(ucfirst($plan->name) == 'Daily'){!! '<span style="color:red">*</span>' !!}@endif Get a Hospital discount.</li> --}}
                                                    </ul>
                                                    @if(Cookie::has('_tn') && isset($logged_in_api_user))
                                                        @if($logged_in_api_user->is_subscribed == false || $logged_in_api_user->is_trial_user==true)

                                                            {{--//SUBSCRIPTION_ACTIVE bool required --}}
                                                            @if(config("misc.web.subscription_active") == 'active')
                                                                @if($plan->plan_slug == 'free')
                                                                    <a href="#" class="btn-alt small">{!! 'You are enjoying free subscription' !!}</a>
                                                                @else
                                                                    @if(preg_match("/bl/", $plan->plan_slug))
                                                                        <a href="{!! route('frontend.subscription.confirmation.blink', [$plan->plan_slug] ) !!}" class="btn-alt small">{{__('packages.buttons.buy_now')}}</a>
                                                                    @else
                                                                        <a href="{!! route('frontend.subscription.confirmation', [$plan->plan_slug] ) !!}" class="btn-alt small">{{__('packages.buttons.buy_now')}}</a>
                                                                    @endif

                                                                @endif

                                                            @else
                                                                {{--<a class="disable-subscriptions " href="#openbox">Buy Now</a>--}}
                                                            @endif
                                                        @else
                                                            {{--@if($plan->id   ==  $logged_in_api_user->subscription_plan_id)
                                                                <p class="active-plane">You have Purchased this plan</p>
                                                            @endif--}}
                                                            @if(in_array($plan->id,$plans))
                                                                <p class="active-plane">You have Purchased this plan</p>
                                                            @else
                                                                @if(config("misc.web.subscription_active") == 'active')
                                                                    @if(preg_match("/bl/", $plan->plan_slug))
                                                                        <a href="{!! route('frontend.subscription.confirmation.blink', [$plan->plan_slug] ) !!}" class="btn-alt small">{{__('packages.buttons.buy_now')}}</a>
                                                                    @else
                                                                        <a href="{!! route('frontend.subscription.confirmation', [$plan->plan_slug] ) !!}" class="btn-alt small">{{__('packages.buttons.buy_now')}}</a>
                                                                    @endif
                                                                @else
                                                                    <a class="disable-subscriptions " href="#openbox">{{__('packages.buttons.buy_now')}}</a>
                                                                @endif

                                                            @endif

                                                        @endif
                                                    @else
                                                        @if(config("misc.web.subscription_active") == 'active')
                                                            @if($plan->plan_slug == 'free')
                                                                <a href="{!! route('frontend.signin') !!}" class="btn-alt small">{{__('packages.buttons.signup_now')}}</a>
                                                            @else
                                                                @if(preg_match("/bl/", $plan->plan_slug))
                                                                    <a href="{!! route('frontend.subscription.confirmation.blink', [$plan->plan_slug] ) !!}" class="btn-alt small">{{__('packages.buttons.buy_now')}}</a>
                                                                @else
                                                                    <a href="{!! route('frontend.subscription.confirmation', [$plan->plan_slug] ) !!}" class="btn-alt small">{{__('packages.buttons.buy_now')}}</a>
                                                                @endif
                                                            @endif
                                                        @else
                                                            <a class="disable-subscriptions " href="#openbox">{{__('packages.buttons.buy_now')}}</a>
                                                        @endif
                                                    @endif


                                                    @if($plan->plan_slug == 'premium')
                                                        <a href="{!! route('frontend.premium') !!}" class="btn-alt small">{{__('packages.buttons.view_details')}}</a>
                                                    @elseif($plan->plan_slug == 'bl-daily')
                                                        <a href="{!! route('frontend.daily-plan') !!}" class="btn-alt small">{{__('packages.buttons.view_details')}}</a>
                                                    @elseif($plan->plan_slug == 'bl-monthly')
                                                        <a href="{!! route('frontend.monthly-plan') !!}" class="btn-alt small">{{__('packages.buttons.view_details')}}</a>
                                                    @elseif($plan->plan_slug == 'bl-yearly')
                                                        <a href="{!! route('frontend.yearly-plan') !!}" class="btn-alt small">{{__('packages.buttons.view_details')}}</a>
                                                    @endif


                                                </div>
                                                @endforeach
                                        </div>
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

