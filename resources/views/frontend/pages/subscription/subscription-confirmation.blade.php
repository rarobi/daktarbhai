@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Subscription Confirmation | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('content')

    <!--  Page Content, class footer-fixed if footer is fixed  -->
    <div id="page-content" class="header-static footer-fixed">
        <div class="row">
            <div id="home-wrap" class="content-section fullpage-wrap row">
                <div class="col-md-12 padding-leftright-null">
                    <!-- ————————————————————————————————————————————
                    ———	Contact Content Start here
                    —————————————————————————————————————————————— -->
                    <div class="row">
                        <section class="doctor subscriptions page padding-md">
                            <div class="container">
                                <div class="text-center">
                                    <h3 class="grey big margin-bottom-small">Confirm Subscription</h3>
                                    <p class="heading margin-bottom grey text-center">Subscribe to Daktarbhai and take charge of your own health. Live a healthy and happy life.  </p>
                                    @if(isset($plan) && $plan == 'trial')
                                        <div class="col-md-12 padding-leftright-null trail-sub">
                                            <div class="row">
                                                <section id="pricing">
                                                    <div class="col-md-6 col-md-offset-3 price trial free padding-leftright-null">
                                                        <div class="price-header one">
                                                            <div class="icon-img trial">
                                                                <img class="trial" src="{!! asset('assets/img/trial.png') !!}" alt="">
                                                            </div>
                                                        </div>
                                                        <ul>
                                                            <li>Your Phone Number : <strong>@if($user){!! isset($user->mobile)?$user->mobile:'<i>(not provided)</i>' !!}@endif</strong></li>
                                                            <li>Your Package : <strong>{!! 'Trial' !!}</strong></li>
                                                            <li>Payment Amount : <strong>{!! '0' !!} tk</strong></li>
                                                            <li>Subscription Duration : <strong>{!! 7 !!} days</strong></li>
                                                            <li class="tr-check">
                                                                <label><input id="checkbox" type="checkbox" > I have read and agreed to the Terms and Conditions</label>
                                                            </li>
                                                        </ul>
                                                        <a class="btn-alt active shadow small margin-null" href="{!! route('frontend.subscription.purchase', ['trial'] ) !!}" id="subscribe">Get Free Trial</a>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            @if(isset($plan) && $plan != 'trial')
                <div id="home-wrap" class="confirm-subscriptions content-section fullpage-wrap">
                    <section id="pricing">
                        <div class="col-md-6 col-md-offset-3 price active standard padding-leftright-null">
                            <div class="price-title">Subscription Information</div>
                            <ul class="subscription-pay">
                                <li>Your Phone Number : <strong>@if($user){!! isset($user->mobile)?$user->mobile:'<i>(not provided)</i>' !!}@endif</strong></li>
{{--                                <li>Your Package : <strong>{!! ucfirst($plan->name) !!}</strong></li>--}}
                                <li>Payment Amount : <strong>{!! $plan->price !!} tk</strong></li>
                                @if(ucfirst($plan->name)=='Daily' ) <li>Payment Method : <strong>{!! 'Phone Balance' !!}</strong></li>
                                @if($user && $user->subscribed_number == null)
                                    <h6 class="mo-msg margin-bottom-extrasmall" style="margin-top: 20px"> To subscribe from <span style="font-weight: bolder; font-size: 20px; color: #ED1C24 ">Robi </span><br>please send following sms  <br/> <span style="font-weight: bold; margin-left: 10px; color: green"> daktarbhai {!! $user->username !!}</span>  send to <span style="font-weight: bold; margin-left: 10px; color: green">21213</span></h6>
                                @else
                                    <label><input id="checkbox" type="checkbox" > Agree with terms & conditions</label>
                                    {!! Form::open(['route'=>['frontend.subscription.purchase', $plan->plan_slug]]) !!}
                                    <button type="submit" class="btn-alt active btn-lg btn-primary" href="#" id="subscribe">Subscribe </button>
                                    {!! Form::close() !!}
                                @endif
                                @else
                                    {!! Form::open(['url' => config('subscription.subscription-url'), 'id' => 'make-payment-form']) !!}
                                    {{--This code only required when a user will get the provision to select a specific payment gateway--}}
                                    <div class="col-md-12" style="margin-bottom: 10px;">
                                        <div class="sub-pay">
                                            <label for="" class="choose-payment"> Please Choose a payment method</label>
                                            <div class="payment-area">
                                                @if(isset($plan->providers_info))
                                                    @foreach($plan->providers_info as $provider)
                                                        @if(strtolower($provider->name) == 'sslwireless' || strtolower($provider->name) == 'ipay' || strtolower($provider->name) == 'bkash')
                                                            <?php
                                                            if(strtolower($provider->name) == 'sslwireless') {
                                                                $class = 'Cards/Mobile Banking/Net Banking';
//                                                                $class = 'Pay with SSL COMMERZ';
                                                            } elseif(strtolower($provider->name) == 'ipay') {
                                                                $class = 'ipay';
                                                            } elseif (strtolower($provider->name) == 'bkash') {
//                                                                $class = 'Bkash';
                                                                $class = 'Pay with bKash';
                                                            }
                                                            ?>
                                                            <label class="{!! $class !!}">
                                                                <input class="provider" id="provider" type="radio" name="provider_id" value="{!! $provider->id !!}" data-content="{{ $provider->name }}">
                                                                @if(strtolower($provider->name) == 'bkash')
                                                                    <img class="m-l-5" src="{!! asset('assets/img/payment/bKash.png') !!}">
                                                                 @else
                                                                    <img class="m-l-5" src="{!! isset($provider->image) ? $provider->image : asset('assets/img/missing-image.jpg') !!}">
                                                                @endif
                                                                <strong>{!! $class !!} &nbsp;</strong> &nbsp;
                                                            </label><br><br>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <label for="">No provider Found</label>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- Subscription flow using backed as payment base--}}
                                        {{-- End --}}
                                    </div>
                                    {{-- This value only required when user use a fixed provider set by daktarbhai--}}

                                    {{--<input class="provider" type="hidden" name="provider_id" value="{!! $providerId !!}">--}}
                                    <input type="hidden" name="plan_id" value="{!! $plan->id !!}">
                                    <input type="hidden" name="service_name" value="subscription">
                                    <input type="hidden" name="api_token" value="{!! $user->access_token !!}">
                                    <input type="hidden" name="membership_id" value="{!! $user->username !!}">
                                    <input type="hidden" name="platform" value="web">
                                    <label class="p-trams">
                                        <input id="checkbox" type="checkbox" > I have read and agreed to the <a href="{!! route('frontend.terms') !!}" target="_blank"><u>Terms and Conditions</u></a>
                                    </label>
                                    <button type="submit" class="btn-alt active btn-lg btn-primary" href="#" id="subscribe">Confirm </button>
                                    {!! Form::close() !!}
                                @endif
                            </ul>
                        </div>
                    </section>
                </div>
            @elseif(!$plan)
                <div id="home-wrap" class="confirm-subscriptions content-section fullpage-wrap ">
                <div class="row">
                    <div class="col-md-12 padding-leftright-null">
                        <div class="col-md-8 col-md-offset-2 sucess-subscribe">
                            <div class="text padding-bottom-sm ">
                                <img src="{!! asset('assets/img/error.png') !!}">
                            </div>
                            <div>
                                <h1>{!! 'Subscription plan not found' !!}</h1>
                                <a href="{!! route('frontend.subscription.plan') !!}" class="btn-alt small active doc-btn">Subscription Plans</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection

@section('after-scripts')
    <script>
        var isAgree = false;
        var providerSelected = false;

        window.addEventListener("pageshow", () => {
            // update hidden input field
            $('.provider').prop('checked', false);
            $('#checkbox').prop('checked', false);
        });

        $("#checkbox").change(function() {
            if(this.checked) {
                isAgree = true;
            } else {
                isAgree = false;
            }
        });

        $('.provider').click(function() {
            if($('.provider').is(':checked')) {
                providerSelected = true;
            } else {
                providerSelected = false;
            }
        });

        $(document).ready(function() {
            $('#subscribe').click(function(event) {
                // only required when user have to choose a provider
                if(!isAgree || !providerSelected){
                    swal('please provide all information');
                    event.preventDefault();
                }
            });
        });

        $(document).ready(function() {
            $("#make-payment-form").on('submit', function(e){
                e.preventDefault();
                var formAction = $('#make-payment-form').attr('action');
//                var radioValue = $("input[name='provider_id']:checked").val();  // Currently NOT USE
                var selectedRadioValue = $("input[type='radio']:checked").attr('data-content').toLowerCase();

                if(selectedRadioValue == 'bkash') {
                    var userMobile = '{!! $user->mobile !!}';
                    formAction = '{{ config('subscription.bkash-subscription-url') }}';
                } else {
                    $('#make-payment-form').attr('action', formAction);
                }

                $("#make-payment-form").unbind('submit').bind('submit').submit();
            });
        });

    </script>

@endsection
