@extends('frontend.layouts.theme.master')

@section('after-styles')
    <style>
        .display-none{
            display: none;
        }
        div#parsley-id-22 {
            margin-top: 5px;
        }
        .login-btn {
            border: 1px solid #36B7B4;
        }
        .login-btn:hover {
            border: 1px solid #F46E02;
        }
        .login-area .tab-pane.active {
            margin-top: 0px;
        }

        label:hover{
            border: 1px solid #36B7B4;
        }
        .gender-btn-active {
            background-color: #36B7B4;
            color: #fff;
        }
        .country-code select {
            width: 100%;
            border-radius: 0;
            border: 1px solid #fff;
            line-height: 16px;
            margin: 0 0 15px 0;
            background: #fff;
            padding: 7px 6px;
        }
        .fa.fa-mobile {
            font-size: 25px;
            margin-top: 5px;
            margin-right: 5px;

        }
        .login-btn{
            line-height: 40px;
            border-radius: 4px;
            /*margin-left: 7px !important;*/
            margin-top: 10px; !important;
        }

        .next-btn{
            width: 94% !important;
            margin-left: 60px !important;
        }
        .for-pass {
            color: #00d4a4;
        }
        .login-area{
            padding-left: 10px;
            padding-right: 10px;
        }
        .login-card {
            margin-bottom: 50px;
            height: 355px;
            width: 70%;
            padding: 80px 0;
            background: #FFFFFF;
            border: 0.5px solid #36B7B4;
            box-sizing: border-box;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        a#reg {
            font-size: 12px;
        }
        a#Log {
            font-size: 12px;
        }

        .modal-content {
            margin-top: 340px;
            width: 750px;
            height: 355px;
            margin-left: -75px;
            border: 0.5px solid #36B7B4 !important;
        }
        .modal-otp {
            height: 435px;
            margin-top: 305px;
        }
        h5.modal-title {
            text-align: center;
        }
        .modal-body {
            height: 220px;
            padding: 15px 0;
        }
        .modal_logo {
            width: 150px;
            height: auto;
            margin-left: 60px;
        }
        .form-group.mobile_box {
            margin-top: 35px;
        }
        .form-group.submit {
            margin-top: 25px;
        }
        .form-control[disabled]{
            /*background: none !important;*/
            border: none !important;
        }

        .form-control{
            border: 0.5px solid #36B7B4 !important;
            height: 50px !important;
        }

        .modal-header .close {
            margin-top: -20px;
            color: #00d4a4;
            opacity: 1;
        }
        .otp_input {
            margin-top: 10px;
            width: 90%;
            margin-left: 15px;
        }
        span#mobileErrMsg {
            font-size: 12px;
        }
        .error {
            margin-bottom: 0px;
        }

        .col-md-6.col-md-offset-3.otp_box {
            margin-top: -10px;
        }
        input.login-btn.otp_input {
            margin-left: 0px !important;
        }

        img.otp_logo {
            height: 110px;
        }

        label#resend {
            color: #36B7B4;
            margin-left: 5px;
            font-weight: 800;
            font-size: 15px;
        }

        #max-otp{
            /*line-height: 0;*/
            text-align: center;
        }

        ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
            color: #2f2f2f;
        }
        ::-moz-placeholder { /* Firefox 19+ */
            color: #2f2f2f;
        }

        .ask-btn{
            width: 100% !important;
            margin-bottom: 10px;
        }

        @media only screen and (max-width: 769px) {

            .next-btn {
                width: 50% !important;
                margin-left: 202px !important;
            }

            .modal_logo {
                margin-left: 290px;
                margin-top: 10px;
            }
        }

        @media only screen and (max-width: 450px) {
            .form-group.mobile_box {
                margin-top: 0px;
            }
            .form-group.submit {
                margin-top: 0px;
            }
            .modal_logo {
                margin-left: 100px;
                margin-top: 10px;
            }
            .modal-content {
                margin-top: 170px;
                width: auto;
                /*height: 400px;*/
                margin-left: -10px;
            }

            .mobile {
                margin-left: 0 !important;
            }
            .mobile_box {
                /* margin-top: 35px; */
                margin-left: 0;
            }
            input#mobile {
                width: 181%;
                margin-top: 20px;
            }
            button#login-btn {
                margin-top: -25px;
            }
            button#login-btn {
                width: 50%;
                margin-left: 80px !important;
            }
            img.otp_logo {
                margin-left: 120px;
            }
            .col-md-8.col-md-offset-2 {
                margin-left: 0px;
                margin-top: -20px !important;
            }
            .col-md-6.col-md-offset-3.otp_box {
                margin-left: 0px;
            }
            input.login-btn.otp_input {
                width: 91%;
                margin-left: 14px !important;
            }

        }

        @media only screen and (max-width: 400px) {

            .modal_logo {
                margin-left: 75px;
            }
        }

    </style>
@endsection

@section('title')
    {!! 'Ask your question | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap ask-doc-bg">{{--{!! dd($user) !!}--}}

        {{--@if(Cookie::has('_tn') && isset($logged_in_api_user))
            --}}{{--@if($user->is_subscribed && $user->is_premium)
                  @else
                      <div class="premium-content">
                          <p>To enjoy this feature you have to enable one of our subscriptions plan.</p>
                          {{ Html::link('subscription/plan','Subscriptions Plan',['class'=>'btn-alt active shadow small margin-null purchase-plan']) }}

                      </div>
            @endif--}}{{--
        @else
            <div class="ask-a-doc-overly">
                <div class="premium-content">
                    --}}{{--<p>To enjoy this feature you have to enable one of our subscriptions plan.</p>--}}{{--
                    <p>To enjoy this feature please login to Daktarbhai.</p>

                    {{ Html::link('signin','Login',['class'=>'btn-alt active shadow small margin-null purchase-plan']) }}

                </div>
            </div>
        @endif--}}

        <?php
        if(session('backUrl'))
        {
            Session::forget('backUrl');
        }
        Session::put('backUrl', Request::url());
        ?>
        <div class="row slider-section section-padding" style="height: 410px">
            <div class="col-md-12">
                <div class="col-md-4 col-sm-12 speciality-title-section">
                    <h2 class="margin-bottom">Ask a Doctor and Get Answers from Real Doctors.</h2>
                </div>
                <div class="col-md-7 col-md-offset-1 col-sm-12 img-section">
                    <img src="{!! asset('assets/img/ask_doctor.png') !!}" class="facility-slider-img" alt="" style="width: -webkit-fill-available;">
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <!-- ————————————————————————————————————————————
                    ———	Ask a Doctor content
                    —————————————————————————————————————————————— -->
                    <div class="ask-doc-login ask-doc-login-out">
                        <!-- ————————————————————————————————————————————
                         ———	Modal start
                         —————————————————————————————————————————————— -->
{{--                        <div class="login-area">--}}
{{--                            <div class="col-md-12">--}}
{{--                                <a class="ask-close"><i class="ion-close" data-pack="default" data-tags="delete, trash, kill, x" style="font-size: 25px"></i></a>--}}
{{--                                @if(app()->getLocale() == 'en')--}}
{{--                                    --}}{{--                    <h2 class="text-center padding-sm small padding-top-null">Welcome to <img src="{!! asset('assets/img/login-logo.png') !!}" class="login-logo" alt="Daktarbhai"></h2>--}}
{{--                                    <h2 class="text-center padding-sm small padding-top-null">Welcome to <img src="{!! asset('assets/img/logo.png') !!}" class="login-logo" alt="Daktarbhai"></h2>--}}
{{--                                @elseif(app()->getLocale() == 'bn')--}}
{{--                                    <h2 class="text-center padding-sm small padding-top-null"><img src="{!! asset('assets/img/logo.png') !!}" class="login-logo" alt="ডাক্তারভাই"> সেবায় আপনাকে স্বাগতম </h2>--}}
{{--                                @endif--}}
{{--                                <h2 class="text-center padding-sm small padding-top-null">Welcome to <img src="{!! asset('assets/img/logo.png') !!}" class="login-logo" alt="logo"></h2>--}}
{{--                                <ul class="nav nav-tabs" role="tablist">--}}
{{--                                    <li role="presentation" class="active" style="width: 50%"><a href="#tab-one" aria-controls="tab-one" role="tab" data-toggle="tab" aria-expanded="false">Login</a></li>--}}
{{--                                    <li role="presentation" style="width: 50%"><a href="#tab-two" aria-controls="tab-two" role="tab" data-toggle="tab" aria-expanded="true">Register</a></li>--}}
{{--                                </ul>--}}
{{--                                <div class="tab-content">--}}
{{--                                    <div role="tabpanel" class="tab-pane @if(!session('activeReg')) active @endif" id="tab-one">--}}
{{--                                        <div class="login-form">--}}
{{--                                            {!! Form::open(['route' => 'frontend.post.signin', 'class' => 'form-horizontal login', 'data-parsley-validate']) !!}--}}
{{--                                            <div class="form-group">--}}
{{--                                                <div class="col-md-12">--}}
{{--                                                    {!! Form::input('email_phone', old('email_phone'),'', ['name'=>'email_phone','placeholder' => 'Membership ID or Phone Number', 'required' => 'required',  'class' => 'form-control form-field email-phone',--}}
{{--                                                                                    'data-parsley-required-message' => 'Email or Phone Number is required',--}}
{{--                                                                                    'data-parsley-pattern'          => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}|(?:\+)+[1-9]+[0-9]{6,}$',--}}
{{--                                                                                    'data-parsley-trigger'          => 'change focusout',--}}
{{--                                                                                    //'data-parsley-type'             => 'email',--}}
{{--                                                                                    'data-parsley-type-message'     => 'Please provide with a Membership ID or phone number']) !!}--}}
{{--                                                    @if ($errors->has('email_phone'))--}}
{{--                                                        <span class="error-text filled">{!! $errors->first('email_phone') !!}  </span>--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                            <div class="form-group">--}}
{{--                                                <div class="col-md-12">--}}
{{--                                                    {!! Form::password('password', ['placeholder' => 'Enter your password',  'required' => 'required', 'class' => 'form-control form-field',--}}
{{--                                                                                    'data-parsley-required-message' => 'Password is required',--}}
{{--                                                                                    'data-parsley-trigger'          => 'change focusout'--}}
{{--                                                                                    ]) !!}--}}
{{--                                                    @if ($errors->has('password'))--}}
{{--                                                        <span class="error-text filled">{!! $errors->first('password') !!}  </span>--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group">--}}
{{--                                                <div class="col-md-12">--}}
{{--                                                    {!! Form::submit('Login', ['class' => 'login-btn']) !!}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group">--}}
{{--                                                <div class="col-md-12">--}}
{{--                                                    <div class="checkbox">--}}
{{--                                                        --}}{{--<label><input name="remember" value="1" type="checkbox"> Remember Me </label>--}}
{{--                                                        <a href="{!! route('frontend.reset-password-form') !!}"class="for-pass" style="margin-left: 2px; float: left;">Forgot Your Password?</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            {!! Form::close() !!}--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <div>--}}
{{--                                                --}}{{--<button onclick="otpLogin();" class = "login-btn"><i class="fa fa-mobile" aria-hidden="true"></i>--}}
{{--                                                <button class = "login-btn" data-toggle="modal" data-target="#login_modal"><i class="fa fa-mobile" aria-hidden="true"></i>--}}
{{--                                                    <span class="login-mobile">Continue with mobile</span> </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div role="tabpanel" class="tab-pane @if(session('activeReg')) active @endif" id="tab-two">--}}
{{--                                        <div class="login-form">--}}
{{--                                            {!! Form::open(['route' => 'frontend.signup', 'class' => 'form-horizontal login', 'data-parsley-validate' => '','id'=>'registerUser']) !!}--}}

{{--                                            <div class="form-group">--}}
{{--                                                <div class="col-md-12">--}}
{{--                                                    {!! Form::text('name', old('name'), ['placeholder' => 'Name', 'id' => 'name', 'class' => 'form-control form-field','required' => 'required',--}}
{{--                                                                                         'data-parsley-trigger'          => 'change focusout',--}}
{{--                                                                                         'data-parsley-minlength'        => '2',--}}
{{--                                                                                         'data-parsley-maxlength'        => '50']) !!}--}}
{{--                                                    @if ($errors->has('name'))--}}
{{--                                                        <span class="error-text filled">{!! $errors->first('name') !!}  </span>--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group">--}}
{{--                                                <div class="col-md-12">--}}
{{--                                                    {!! Form::email('email', old('email'), ['placeholder' => 'E-mail Address',   'class' => 'form-control form-field email-reg',--}}
{{--                                                                                            'required' => 'required', 'data-parsley-required-message' => 'Email is required',--}}
{{--                                                                                            'data-parsley-pattern'          => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$',--}}
{{--                                                                                            'data-parsley-pattern-message'  => 'Please provide with a valid email address',--}}
{{--                                                                                            'data-parsley-trigger'          => 'change focusout',--}}
{{--                                                                                            'data-parsley-type'             => 'email',--}}
{{--                                                                                            'data-parsley-type-message'     => 'Please provide with a valid email address']) !!}--}}
{{--                                                    @if ($errors->has('email'))--}}
{{--                                                        <span class="error-text filled">{!! $errors->first('email') !!}  </span>--}}
{{--                                                    @endif--}}
{{--                                                    <span class="error-text email-exist"></span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="form-group">--}}
{{--                                                <div class="col-md-12">--}}
{{--                                                    {!! Form::password('password', ['placeholder' => 'Password',  'id' => 'password', 'class' => 'form-control form-field',--}}
{{--                                                                                    'required' => 'required', 'data-parsley-required-message' => 'Password is required',--}}
{{--                                                                                    'data-parsley-trigger'          => 'change focusout',--}}
{{--                                                                                    'data-parsley-minlength'        => '6',--}}
{{--                                                                                    'data-parsley-maxlength'        => '20']) !!}--}}
{{--                                                    @if ($errors->has('password'))--}}
{{--                                                        <span class="error-text filled">{!! $errors->first('password') !!}  </span>--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group">--}}
{{--                                                <div class="col-md-12">--}}
{{--                                                    <div class="checkbox">--}}
{{--                                                        <label><input name="checkbox" id="termsAgreed" value="1" required type="checkbox"> I agree to the <a target="_blank" href="{!! route('frontend.terms') !!}">terms and conditions</a> </label>--}}
{{--                                                    </div>--}}
{{--                                                    @if ($errors->has('checkbox'))--}}
{{--                                                        <span class="error-text filled">{!! $errors->first('checkbox') !!}  </span>--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group" style="display: none">--}}
{{--                                                <input class="csrf" id="csrf_reg" type="hidden" name="csrf_reg" />--}}
{{--                                                <input class="code" id="code_reg" type="hidden" name="code_reg" />--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group">--}}
{{--                                                <div class="col-md-12">--}}
{{--                                                    {!! Form::submit('Register',['class' => 'login-btn']) !!}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            {!! Form::close() !!}--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <!-- ————————————————————————————————————————————
                         ———	Modal end
                         —————————————————————————————————————————————— -->

                        <div class="login-area">
                            <div class="col-md-4 col-md-offset-2 login-card">


                                {{--<div>OR</div>
                                <input placeholder="email" id="email"/>
                                <button onclick="emailLogin();">Login via Email</button>--}}

                                @if (\Session::has('message'))
                                    <div class="alert alert-danger" style="background-color: rgba(237, 28, 36, 0.33); color: #ed1c24;">
                                        {{ \Session::get('message') }}
                                    </div>
                                @endif
                                @if (\Session::has('success'))
                                    <div class="alert alert-success" style="color:green;">
                                        {{ \Session::get('success') }}
                                    </div>
                                @endif
                                {{--                    @if(app()->getLocale() == 'en')--}}
                                {{--                    --}}{{--                    <h2 class="text-center padding-sm small padding-top-null">Welcome to <img src="{!! asset('assets/img/login-logo.png') !!}" class="login-logo" alt="Daktarbhai"></h2>--}}
                                {{--                    <h2 class="text-center padding-sm small padding-top-null">Welcome to <img src="{!! asset('assets/img/logo.png') !!}" class="login-logo" alt="Daktarbhai"></h2>--}}
                                {{--                    @elseif(app()->getLocale() == 'bn')--}}
                                {{--                        <h2 class="text-center padding-sm small padding-top-null"><img src="{!! asset('assets/img/logo.png') !!}" class="login-logo" alt="ডাক্তারভাই"> সেবায় আপনাকে স্বাগতম </h2>--}}
                                {{--                    @endif--}}

                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation"  @if(!session('activeReg')) class="active" @endif><a href="#login" id="logIn" aria-controls="login" role="tab" data-toggle="tab" aria-expanded="false">{{__('login.buttons.login')}}</a></li>
                                    {{--<li role="presentation" @if(session('activeReg')) class="active" @endif><a href="#register" aria-controls="register" role="tab" data-toggle="tab" aria-expanded="true">Register</a></li>--}}
                                </ul>

                                <div class="tab-content">

                                    <div role="tabpanel" class="tab-pane @if(!session('activeReg')) active @endif" id="login">

                                        <div class="login-form login-hide login-form-default">
                                            {{--                                    {!! Form::open(['route' => 'frontend.post.signin', 'id' => 'form','class' => 'form-horizontal login', 'data-parsley-validate']) !!}--}}
                                            {{--                                    <div class="form-group">--}}
                                            {{--                                        <div class="col-md-12">--}}

                                            {{--                                            {!! Form::input('email_phone', old('email_phone'),'', ['name'=>'email_phone','placeholder' => __('login.placeholder.email'), 'required' => 'required',  'class' => 'form-control form-field email-phone email',--}}
                                            {{--                                                                                    'data-parsley-required-message' => __('login.validation.email'),--}}
                                            {{--                                                                                    'data-parsley-pattern'          => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}|(?:\+)+[1-9]+[0-9]{6,}|^[a-zA-Z0-9]*$',--}}
                                            {{--                                                                                    'data-parsley-pattern-message'  => __('askDoctor.question_form.message.email_address'),--}}
                                            {{--                                                                                    'data-parsley-trigger'          => 'change focusout',--}}
                                            {{--                                                                                    //'data-parsley-type'             => 'email',--}}
                                            {{--                                                                                    //'data-parsley-type-message'     => 'Please provide with a valid email address or phone number'--}}
                                            {{--                                                                                    ])--}}
                                            {{--                                                                                    !!}--}}
                                            {{--                                            @if ($errors->has('email_phone'))--}}
                                            {{--                                                <span class="error-text filled">{!! $errors->first('email_phone') !!}  </span>--}}
                                            {{--                                            @endif--}}

                                            {{--                                        </div>--}}

                                            {{--                                    </div>--}}
                                            {{--                                    <div class="form-group">--}}
                                            {{--                                        <div class="col-md-12">--}}
                                            {{--                                            {!! Form::password('password', ['placeholder' => __('login.placeholder.password'), 'required' => 'required', 'class' => 'form-control form-field password',--}}
                                            {{--                                                                            'data-parsley-required-message' =>__('login.validation.password') ,--}}
                                            {{--                                                                            'data-parsley-trigger'          => 'change focusout']) !!}--}}
                                            {{--                                            @if ($errors->has('password'))--}}
                                            {{--                                                <span class="error-text filled">{!! $errors->first('password') !!}  </span>--}}
                                            {{--                                            @endif--}}
                                            {{--                                        </div>--}}
                                            {{--                                    </div>--}}

                                            {{--                                    <div class="form-group">--}}
                                            {{--                                        <div class="col-md-12">--}}
                                            {{--                                            {!! Form::submit('Login', ['class' => 'login-btn']) !!}--}}
                                            {{--                                            {!! Form::button(__('login.buttons.login'), ['class' => 'login-btn','type' => 'submit']) !!}--}}

                                            {{--                                        </div>--}}
                                            {{--                                    </div>--}}
                                            {{--                                    <div class="form-group">--}}
                                            {{--                                        <div class="col-md-12">--}}
                                            {{--                                            <div class="checkbox">--}}
                                            {{--                                                @if(session('activeReg')) class="active" @endif--}}
                                            {{--                                                <a href="{!! route('frontend.reset-password-form') !!}"class="for-pass" style="margin-left: 2px; float: left;">{{__('login.text_1')}}</a><br>--}}
                                            {{--                                                <p style="margin-left: 2px; float: left;font-size: 12px">{{__('login.text_2')}}</p>&nbsp;--}}
                                            {{--                                                <li role="presentation" @if(session('activeReg')) class="active" @endif><a href="#register" aria-controls="register" id="reg" role="tab" data-toggle="tab" aria-expanded="false">Register</a></li>--}}
                                            {{--                                                <a href="#register" class="active" aria-controls="register" id="reg" role="tab" data-toggle="tab" aria-expanded="true">{{__('login.buttons.register')}}</a>--}}
                                            {{--                                            </div>--}}
                                            {{--                                        </div>--}}
                                            {{--                                    </div>--}}
                                            {{--                                {!! Form::close() !!}--}}
                                            <div class="form-group col-md-offset-2">
                                                <div>
                                                    {{--<button onclick="otpLogin();" class = "login-btn"><i class="fa fa-mobile" aria-hidden="true"></i>--}}
                                                    {{--<span class="login-mobile">{{__('login.text_3')}}</span> </button>--}}
                                                    <button class = "login-btn" data-toggle="modal" data-target="#login_modal"><i class="fa fa-mobile" aria-hidden="true"></i>
                                                        <span class="login-mobile">{{__('login.text_3')}}</span> </button>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div role="tabpanel" class="tab-pane @if(session('activeReg')) active @endif" id="register">
                                        <div class="login-form login-form-default">
                                            {!! Form::open(['route' => 'frontend.signup', 'class' => 'form-horizontal login', 'data-parsley-validate' => '','id'=>'registerUser']) !!}

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    {!! Form::text('name', old('name'), ['placeholder' => __('login.placeholder.name'), 'id' => 'name', 'class' => 'form-control form-field','required' => 'required',
                                                                                         'data-parsley-required-message' => __('login.validation.name'),
                                                                                         'data-parsley-trigger'          => 'change focusout',
                                                                                         //'data-parsley-minlength'        => '2',
                                                                                         'data-parsley-maxlength'        => '50']) !!}
                                                    @if ($errors->has('name'))
                                                        <span class="error-text filled">{!! $errors->first('name') !!}  </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    {!! Form::email('email', old('email'), ['placeholder' =>__('login.placeholder.email_address'),   'class' => 'form-control form-field email-reg email',
                                                                                            'required' => 'required', 'data-parsley-required-message' => __('login.validation.email_address'),
                                                                                            'data-parsley-pattern'          => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$',
                                                                                            'data-parsley-pattern-message'  => __('askDoctor.question_form.message.email_address'),
                                                                                            'data-parsley-trigger'          => 'change focusout',
                                                                                            'data-parsley-type'             => 'email',
                                                                                            'data-parsley-type-message'     => __('askDoctor.question_form.message.email_address')]) !!}
                                                    @if ($errors->has('email'))
                                                        <span class="error-text filled">{!! $errors->first('email') !!}  </span>
                                                    @endif
                                                    <span class="error-text email-exist"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    {!! Form::password('password', ['placeholder' =>__('login.placeholder.reg_pass'),   'class' => 'form-control form-field password',
                                                                                    'required' => 'required', 'data-parsley-required-message' => __('login.validation.password'),
                                                                                    'data-parsley-trigger'          => 'change focusout',
                                                                                    'data-parsley-minlength'        => '6',
                                                                                    'data-parsley-minlength-message'=>  __('login.validation.min_length'),
                                                                                    'data-parsley-maxlength'        => '20']) !!}
                                                    @if ($errors->has('password'))
                                                        <span class="error-text filled">{!! $errors->first('password') !!}  </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input name="checkbox"
                                                                   id="termsAgreed"
                                                                   value="1" required
                                                                   data-parsley-required-message="{{ __('login.validation.terms_conditions') }}"
                                                                   type="checkbox">
                                                            @lang('login.text_5', ['url' => route('frontend.terms')])
                                                        </label>
                                                    </div>
                                                    @if ($errors->has('checkbox'))
                                                        <span class="error-text filled">{!! $errors->first('checkbox') !!}  </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group" style="display: none">
                                                <input class="csrf" id="csrf_reg" type="hidden" name="csrf_reg" />
                                                <input class="code" id="code_reg" type="hidden" name="code_reg" value=""/>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    {{--{{ Form::submit('Register',['class' => 'login-btn']) }}--}}
                                                    {{--                                            {{ Form::button('Register',['class' => 'login-btn reg-button','']) }}--}}
                                                    {{ Form::button(__('navs.frontend.register'),['class' => 'login-btn reg-button','']) }}


                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="checkbox">
                                                        <p style="margin-left: 2px; float: left;font-size: 12px" class="">{{__('login.text_4')}} </p>&nbsp;
                                                        {{--<li role="presentation" @if(session('activeReg')) class="active" @endif>--}}
                                                        <a href="#login" class="active" id="Log" aria-controls="login" role="tab" data-toggle="tab" aria-expanded="false">{{__('login.buttons.login')}}</a></li>
                                                    </div>
                                                </div>
                                            </div>

                                            {!! Form::close() !!}

                                        </div>
                                        <div class="form-group">
                                            <div>
                                                {{--<button onclick="otpLogin();" class = "login-btn"><i class="fa fa-mobile" aria-hidden="true"></i>--}}
                                                {{--<span class="login-mobile">{{__('login.text_3')}}</span> </button>--}}
                                                <button class = "login-btn" data-toggle="modal" data-target="#login_modal"><i class="fa fa-mobile" aria-hidden="true"></i>
                                                    <span class="login-mobile">{{__('login.text_3')}}</span> </button>
                                            </div>
                                        </div>
                                    </div>

                                    {{--<a href="{{ config('misc.site.corporate_link').'/login' }}" class="login-button">Login as Corporate user</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ————————————————————————————————————————————
                                 ———	Sucess Modal start
                                 —————————————————————————————————————————————— -->
                    <div class="ask-doc-sucess ask-doc-sucess-out">
                        <div class="ask-doc-sucess-area">
                            <div class="col-md-12">
                                <a class="ask-close"><i class="ion-close" data-pack="default" data-tags="delete, trash, kill, x" style="font-size: 25px"></i></a>
                                <p class="sucess-img"><img src="{!! asset('assets/img/ask-a-question-sucess.png') !!}" alt=""> <span id="ask-sub-msg"></span></p>
                                <p class="error-img"><img src="{!! asset('assets/img/ask-a-questions-error.png') !!}" alt=""> <span id="ask-sub-error-msg"></span></p>
                            </div>
                        </div>
                    </div>
                    <!-- ————————————————————————————————————————————
                     ———	Sucess Modal end
                     —————————————————————————————————————————————— -->
                    <section class="ask-doc-page padding-md">
                        {!! Form::open(['route'=>'frontend.post-ask-doctor','id'=>'contact-form', 'class' => "question-form from-bg", 'data-parsley-validate', 'method' => 'POST']) !!}
                        <div class="row ask-doctor-box">
                            <div class="col-md-12 make-private m-b-15px">
                                {{--<div class="add-info">--}}
                                {{--<input data-modal="#modal" id="six" class="popup" name="" value="value" type="checkbox">--}}
                                {{--<label for="six">Additional Information</label>--}}
                                {{--</div>--}}

                                <div class="col-md-12">
                                    {!! Form::textarea('description', session('question_info')['description'], ['class' => 'form-field', 'id' => 'description', 'rows' => '2',
                                    'placeholder' => __('askDoctor.placeholder'),
                                                                                       'required' => 'required',
                                                                                       'data-parsley-required-message' => __('askDoctor.provide_input'),
                                                                                       'data-parsley-trigger'          => 'change focusout',
                                                                                       'data-parsley-minlength'        => '40',
                                                                                       'data-parsley-minlength-message' => __('askDoctor.min_input'),
                                                                                       'data-parsley-maxlength'        => '1000',
                                                                                       'onkeyup' => 'countTextAreaChar(this, 1000)']) !!}

                                    <p class="charNum"><span id="charNum"></span>/{{__('askDoctor.one_thousand')}}</p>
                                    <div id="errorMessageShow" ></div>
                                </div>
                                <div class="col-md-12">
                                    <select name="topics" class="form-field" id="topics" required data-parsley-required-message="{!!__('askDoctor.question_form.placeholder.select_topic') !!}">
                                        <option value="{!! isset(session('question_info')['topics']) ? session('question_info')['topics'] : '' !!}" selected="selected">  {!! isset(session('question_info')['topics']) && session('question_info')['topics'] != null ? session('question_info')['topics'] : __('askDoctor.question_form.placeholder.select_topic') !!} </option>
                                        @foreach($topics as $topic)
                                            <option value="{!! $topic->title !!}" >{!! $topic->title or '' !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <p class="ask-gendar">
{{--                                        <span>{{__('askDoctor.gender')}} :</span><br>--}}
                                        <span>Choose Gender</span>
                                        <br>
                                        @if(Cookie::has('_tn') && isset($logged_in_api_user) && ($logged_in_api_user->gender != null))
                                            @if($logged_in_api_user->gender == 'male')

                                                <input type="radio" name="gender" class="radio_hide" id="male" value="male" checked>
                                                <label for="male" class="btn gender-btn-active">{{__('find_doctor.male')}}</label>

                                                <input type="radio" name="gender" class="radio_hide" id="female" value="female" >
                                                <label for="female">{{__('find_doctor.female')}}</label>

                                                <input type="radio" name="gender" class="radio_hide" id="other" value="other" >
                                                <label for="other">{{__('askDoctor.other')}}</label>

                                            @elseif ($logged_in_api_user->gender == 'female')

                                                <input type="radio" name="gender" class="radio_hide"  id="male" value="male" >
                                                <label for="male" class="btn btn-light">{{__('find_doctor.male')}}</label>

                                                <input type="radio" name="gender" class="radio_hide" id="female" value="female" checked>
                                                <label for="female" class="btn gender-btn-active">{{__('find_doctor.female')}}</label>

                                                <input type="radio" name="gender" class="radio_hide" id="other" value="other" >
                                                <label for="other" class="btn btn-light">{{__('askDoctor.other')}}</label>

                                            @else

                                                <input type="radio" name="gender" class="radio_hide" id="male" value="male" >
                                                <label for="male">{{__('find_doctor.male')}}</label>

                                                <input type="radio" name="gender" class="radio_hide" id="female" value="female" >
                                                <label for="female">{{__('find_doctor.female')}}</label>

                                                <input type="radio" name="gender" class="radio_hide" id="other" value="other" checked>
                                                <label for="other">{{__('askDoctor.other')}}</label>

                                            @endif
                                        @else

                                            <input type="radio" name="gender" class="radio_hide" id="male" value="male" checked>
                                            <label for="male">{{__('find_doctor.male')}}</label>

                                            <input type="radio" name="gender" class="radio_hide" id="female" value="female">
                                            <label for="female">{{__('find_doctor.female')}}</label>

                                            <input type="radio" name="gender" class="radio_hide" id="other" value="other">
                                            <label for="other">{{__('askDoctor.other')}}</label>

                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-12 user-age">
                                    @if(Cookie::has('_tn') && isset($logged_in_api_user) && ($logged_in_api_user->age != null))
                                        {{--{!! $ageValue =  !!}--}}
                                        <input type="number" id="age" name="age" class="form-field" placeholder="{{__('askDoctor.age')}}" value="{!! $logged_in_api_user->ageValue !!}" required data-parsley-required-message="{!!__('askDoctor.question_form.placeholder.input_age') !!}">
                                    @else
                                        <input type="number" id="age" name="age" class="form-field" placeholder="{{__('askDoctor.age')}}" required data-parsley-required-message="{!!__('askDoctor.question_form.placeholder.input_age') !!}">
                                    @endif

                                </div>
                                {{--<div class="col-md-12 make-private">--}}
                                {{--<input type="checkbox" data-modal="#modal" id="is_private" class="popup" name="is_private" value="1"--}}
                                {{--@if(isset(session('question_info')['is_private']) && session('question_info')['is_private'] == 1) checked @endif>--}}
                                {{--<label for="six">Make it Private</label>--}}
                                {{--</div>--}}

                                {{--<div class="col-md-12 make-private">--}}
                                    {{--@if(Cookie::has('_tn') && isset($logged_in_api_user))--}}
                                        {{--<div class="add-info">--}}
                                            {{--<input data-modal="#modal" id="six" class="popup" name="" value="value" type="checkbox">--}}
                                            {{--<label for="six">{{__('askDoctor.question_form.additional_information')}}  <span class="additional_note">{{__('askDoctor.question_form.additional_info')}}</span></label>--}}
                                        {{--</div>--}}
                                    {{--@endif--}}
                                    {{--<div class="col-md-12 padding-leftright-null additional-info  display-none">--}}
                                        {{--<div class="col-md-6 padding-leftright-null">--}}
                                            {{--<div class="fever-question">--}}
                                                {{--<div class="question-info">--}}
                                                    {{--<label for="question">{{__('askDoctor.question_form.any_fever')}}</label>--}}
                                                    {{--<input class="fever" type="radio" name="fever[status]" value="1" >--}}
                                                    {{--<label for="Yes">{{__('askDoctor.yes')}}</label>--}}

                                                    {{--<input class="fever" type="radio" name="fever[status]" value="0" >--}}
                                                    {{--<label for="No">{{__('askDoctor.no')}}</label>--}}

                                                    {{--{!! Form::text('fever[note]', old('fever[note]'), ['placeholder' => __('askDoctor.question_form.placeholder.fever'), 'class' => 'form-control form-field display-none note-placeholder note-fever' ]) !!}--}}
                                                {{--</div>--}}
                                                {{--<div class="btn btn-sm btn-primary question-btn">Next <i class="fa fa-angle-double-right" aria-hidden="true"></i></div>--}}
                                            {{--</div>--}}
                                            {{--<div class="fever-question">--}}
                                                {{--<div class="question-info">--}}
                                                    {{--<label for="question">{{__('askDoctor.question_form.any_hypertensive')}}</label>--}}
                                                    {{--<input class="hypertensive" type="radio" name="hypertensive[status]"  value="1" >--}}
                                                    {{--<label for="Yes">{{__('askDoctor.yes')}}</label>--}}

                                                    {{--<input class="hypertensive" type="radio" name="hypertensive[status]"  value="0" >--}}
                                                    {{--<label for="No">{{__('askDoctor.no')}}</label>--}}

                                                    {{--{!! Form::text('hypertensive[note]', old('hypertensive[note]'), ['placeholder' => __('askDoctor.question_form.placeholder.blood_pressure'),  'class' => 'form-control form-field display-none note-placeholder note-hypertensive' ]) !!}--}}
                                                {{--</div>--}}
                                                {{--<div class="btn btn-sm btn-primary question-btn">Next <i class="fa fa-angle-double-right" aria-hidden="true"></i></div>--}}
                                            {{--</div>--}}
                                            {{--<div class="fever-question">--}}
                                                {{--<div class="question-info">--}}
                                                    {{--<label for="question">{{__('askDoctor.question_form.any_allergic')}}--}}
                                                    {{--</label>--}}
                                                    {{--<input class="allergic" type="radio" name="allergic[status]"  value="1" >--}}
                                                    {{--<label for="Yes">{{__('askDoctor.yes')}}</label>--}}

                                                    {{--<input class="allergic" type="radio" name="allergic[status]"  value="0" >--}}
                                                    {{--<label for="No">{{__('askDoctor.no')}}</label>--}}

                                                    {{--{!! Form::text('allergic[note]', old('allergic[note]'), ['placeholder' => __('askDoctor.question_form.placeholder.allergic'),  'class' => 'form-control form-field display-none note-placeholder note-allergy-input' ]) !!}--}}
                                                {{--</div>--}}
                                                {{--<div class="btn btn-sm btn-primary question-btn">Next <i class="fa fa-angle-double-right" aria-hidden="true"></i></div>--}}
                                            {{--</div>--}}

                                            {{--<div class="fever-question">--}}
                                                {{--<div class="question-info">--}}
                                                    {{--<label for="question">{{__('askDoctor.question_form.taking_drugs')}}--}}
                                                    {{--</label>--}}
                                                    {{--<input class="drugs" type="radio" name="drugs[status]"  value="1" >--}}
                                                    {{--<label for="Yes">{{__('askDoctor.yes')}}</label>--}}

                                                    {{--<input class="drugs" type="radio" name="drugs[status]"  value="0" >--}}
                                                    {{--<label for="No">{{__('askDoctor.no')}}</label>--}}

                                                    {{--{!! Form::textarea('drugs[note]', old('drugs[note]'), ['placeholder' =>  __('askDoctor.question_form.placeholder.taking_drugs'),'rows'=>'2','cols'=>'40','class' => 'form-control form-field display-none note-placeholder note-drugs' ]) !!}--}}
                                                {{--</div>--}}
                                                {{--<div class="btn btn-sm btn-primary question-btn">Next <i class="fa fa-angle-double-right" aria-hidden="true"></i></div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-6 additional-q">--}}
                                            {{--<div class="fever-question">--}}
                                                {{--<div class="question-info">--}}
                                                    {{--<label for="question">{{__('askDoctor.question_form.height')}}--}}
                                                    {{--</label>--}}

                                                    {{--<div class=" padding-leftright-null">--}}
                                                        {{--<div class="form-group col-md-4 padding-leftright-null margin-bottom-null">--}}
                                                            {{--{{ Form::select('height[unit]', ['' => __('askDoctor.question_form.placeholder.select'), 'feet' => __('askDoctor.question_form.placeholder.feet'),'cm' => __('askDoctor.question_form.placeholder.cm')], old('height[unit]'), ['id' =>'height','class' => 'form-control form-field note-placeholder note-units']) }}--}}
                                                        {{--</div>--}}

                                                        {{--<div class="form-group col-md-8 margin-bottom-null heightFeetToggle">--}}
                                                            {{--<div id="centimeter">--}}
                                                                {{--{{ Form::number('height[value]', old('height[value]'), ['placeholder' =>  __('askDoctor.question_form.placeholder.enter_height'), 'step' => '.01','class' => 'form-control form-field note-placeholder note-cm']) }}--}}
                                                                {{--<label for="input" class="control-label">Enter Height in Centimeter</label><i class="bar"></i>--}}
                                                            {{--</div>--}}
                                                            {{--<div id="feet" class="input-group">--}}
                                                                {{--{{ Form::number('height[value]', old('height[value]'),['placeholder' => __('askDoctor.question_form.placeholder.feet'),'class' => 'form-control form-field note-placeholder note-feet']) }}--}}
                                                                {{--<span class="input-group-addon  "> Ft </span>--}}
                                                                {{--{{ Form::number('height[inc_value]', old('height[inc_value]'),['placeholder' => __('askDoctor.question_form.placeholder.inches'),'class' => 'form-control form-field note-placeholder note-inch']) }}--}}
                                                                {{--<span class="height-group-addon"> Inches </span>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}

                                            {{--</div>--}}

                                            {{--<div class="fever-question">--}}
                                                {{--<div class="question-info">--}}
                                                    {{--<label for="question">{{__('askDoctor.question_form.weight')}}--}}
                                                    {{--</label>--}}
                                                    {{--<div class="col-md-12 padding-leftright-null">--}}
                                                        {{--<div class="form-group col-md-5 padding-leftright-null margin-bottom-null">--}}
                                                            {{--{{ Form::select('weight[unit]',['' =>  __('askDoctor.question_form.placeholder.select'), 'kg' =>__('askDoctor.question_form.placeholder.kg'), 'lb' => __('askDoctor.question_form.placeholder.lb')] , old('weight[unit]'), ['id' =>'weight','class' => 'form-control form-field note-placeholder note-allergic']) }}--}}
                                                            {{--<label for="select" class="control-label"></label><i class="bar"></i>--}}
                                                        {{--</div>--}}

                                                        {{--<div class="form-group col-md-7 margin-bottom-null">--}}
                                                            {{--{{ Form::number('weight[value]', old('weight[value]'), ['placeholder' =>  __('askDoctor.question_form.placeholder.enter_weight'), 'step' => '.01','class' => 'form-control form-field note-placeholder note-allergic']) }}--}}
                                                            {{--<label for="input" class="control-label">Enter Weight</label><i class="bar"></i>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="btn btn-sm btn-primary question-btn">Next <i class="fa fa-angle-double-right" aria-hidden="true"></i></div>--}}
                                            {{--</div>--}}
                                            {{--<div class="fever-question disease-box">--}}
                                                {{--<div class="question-info ">--}}
                                                    {{--<label for="question">{{__('askDoctor.question_form.chronic')}}--}}
                                                    {{--</label>--}}
                                                    {{--<input class="chronic" type="radio" name="chronic[status]"  value="1" >--}}
                                                    {{--<label for="Yes">{{__('askDoctor.yes')}}</label>--}}

                                                    {{--<input class="chronic" type="radio" name="chronic[status]"  value="0" >--}}
                                                    {{--<label for="No">{{__('askDoctor.no')}}</label>--}}

                                                    {{--{!! Form::text('chronic[note]', old('chronic[note]'), ['placeholder' =>  __('askDoctor.question_form.placeholder.chronic'),  'class' => 'form-control form-field display-none note-placeholder note-chronic' ]) !!}--}}
                                                {{--</div>--}}
                                                {{--<div class="btn btn-sm btn-primary question-btn">Next <i class="fa fa-angle-double-right" aria-hidden="true"></i></div>--}}
                                            {{--</div>--}}

                                        {{--</div>--}}

                                        {{--@if(isset($logged_in_api_user))--}}
                                            {{--<button id="#" class="ask-login login-btn shadow">Ask a Doctor</button>--}}
                                            {{----}}{{----}}{{--@if($logged_in_api_user->is_subscribed && $logged_in_api_user->is_premium)--}}
                                                {{----}}{{----}}{{----}}{{----}}{{--{!! Form::submit('Submit',['class' => 'login-btn']) !!}--}}{{----}}{{----}}{{----}}{{----}}
                                                {{--<button id="#" class="ask-login login-btn shadow">Ask a Doctor</button>--}}
                                            {{--@else--}}
                                                {{--<a class="ask-login login-btn shadow text-center"  data-toggle="modal" data-target="#primiummodal">Subscribe Now </a>--}}
                                                {{--<div class="primium-modal health-tips-modal modal fade" id="primiummodal" tabindex="-1" role="dialog" aria-labelledby="tipsmodalLabel" aria-hidden="true">--}}
                                                    {{--<div class="modal-dialog">--}}
                                                        {{--<div class="modal-content">--}}
                                                            {{--<div class="modal-footer">--}}
                                                                {{--<button type="button" class="btn btn-default" data-dismiss="modal"><i class="ion-close-round"></i></button>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="modal-body">--}}
                                                                {{--<p>To enjoy this feature you have to enable one of our subscriptions plan.</p><br>--}}

                                                                {{--{{ Html::link('subscription/plan','Subscriptions Plan',['class'=>'btn-alt active shadow small margin-null purchase-plan']) }}--}}
                                                            {{--</div>--}}

                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}

                                            {{--@endif--}}{{----}}{{----}}
                                        {{--@else--}}
                                            {{--<a class=" login-btn shadow text-center btn-lg login-btn purchase-plan"  data-toggle="modal" data-target="#primiummodal">Subscribe Now </a>--}}
                                            {{--<div class="primium-modal health-tips-modal modal fade" id="primiummodal" tabindex="-1" role="dialog" aria-labelledby="tipsmodalLabel" aria-hidden="true">--}}
                                                {{--<div class="modal-dialog">--}}
                                                    {{--<div class="modal-content">--}}
                                                        {{--<div class="modal-footer">--}}
                                                            {{--<button type="button" class="btn btn-default" data-dismiss="modal"><i class="ion-close-round"></i></button>--}}
                                                        {{--</div>--}}
                                                        {{--<div class="modal-body">--}}
                                                            {{--<p>To enjoy this feature you have to enable one of our subscriptions plan.</p><br>--}}

                                                            {{--{{ Html::link('subscription/plan','Subscriptions Plan',['class'=>'btn-alt active shadow small margin-null purchase-plan']) }}--}}
                                                        {{--</div>--}}

                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--@endif--}}

                                    {{--</div>--}}


                                {{--</div>--}}
                                <div class="col-md-12">
                                    @if(isset($logged_in_api_user))
{{--                                        @if($logged_in_api_user && $logged_in_api_user->is_subscribed)--}}
                                        @if($logged_in_api_user)
                                            <input class="ask-doctor-button login-btn shadow ask-btn" value="Ask a Doctor" type="submit">
{{--                                        @else--}}
{{--                                            <a class="ask-login login-btn shadow text-center"  data-toggle="modal" data-target="#primiummodal">{{__('askDoctor.question_form.button.subscribe_now')}} </a>--}}
{{--                                            <div class="primium-modal health-tips-modal modal fade" id="primiummodal" tabindex="-1" role="dialog" aria-labelledby="tipsmodalLabel" aria-hidden="true">--}}
{{--                                                <div class="modal-dialog">--}}
{{--                                                    <div class="modal-content">--}}
{{--                                                        <div class="modal-footer">--}}
{{--                                                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="ion-close-round"></i></button>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="modal-body">--}}
{{--                                                            <p>{{__('askDoctor.enable_subscriptions')}}</p><br>--}}

{{--                                                            {{ Html::link('subscription/plan',__('askDoctor.subscriptions_plan'),['class'=>'btn-alt active shadow small margin-null purchase-plan']) }}--}}
{{--                                                        </div>--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                        @endif
                                    @else
                                        <input class="ask-doctor-button shadow ask-doctor-btn" value="{{__('askDoctor.button.search_btn')}}" type="submit">
                                    @endif
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!--First Modal -->
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <div class="modal fade" id="login_modal" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Login With Mobile</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <img class="modal_logo" src="{!! asset('assets/img/daktarbhai_logo.png') !!}">
                                    </div>
                                </div><br>
                                <form action="{{ route('frontend.otp_generate') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group mobile_box">
                                        <div class="col-md-2 col-sm-2  col-md-offset-3">
                                            {{--<span class="input-group-addon" id="basic-addon1">+88 </span>--}}
                                            <input type="text" value="+88" class="form-control" disabled>

                                        </div>
                                        <div class="col-md-5 col-sm-3 mobile ask-doc-mobile-login" style="margin-left: -25px">
                                            <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Mobile (Ex.01431234567)" required/>
                                            <span class="text-danger" id="mobileErrMsg"></span>
                                        </div>
                                    </div><br><br>
                                    <div class="form-group submit">
                                        <div class="col-md-7 col-md-offset-2">
                                            {{--<input id="login-btn" class="login-btn" data-toggle="modal" data-target="#otp_modal" value="NEXT" type="submit">--}}
                                            <button id="login-btn" class="login-btn next-btn" data-toggle="modal" data-target="#otp_modal" type="submit">NEXT </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{--<div class="modal-footer">--}}
                            {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                            {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>

        </div>
    </div>
    <!--First Modal Close-->

    <!--OTP Modal -->
    <div class="modal fade" id="otp_modal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-otp">
                <div class="modal-header">
                    <h5 class="modal-title">Enter OTP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('frontend.otp_verify') }}" method="post">
                        <input id="mobile_number" name="mobile_number" type="hidden" value="">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-5">
                                <img class="otp_logo" src="{!! asset('assets/img/otp.png') !!}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-3" style="margin-top:0px">
                                <p style="margin-left: 20px">We have sent an OTP via SMS to <span id="showMobile"></span></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3 otp_box">
                                <div class="col-md-12">
                                    <input class="form-control otp_input_field" type="number" name="otp"/>
                                </div>

                            </div>
                        </div>
                        <div class="form-group submit">
                            <div class="col-md-6 col-md-offset-3">
                                <button class="login-btn otp_input" type="submit">Submit</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12" style="margin-top:10px;">
                                <p style="color:#F7941E;margin-bottom: 0; margin-left: 15px " id="max-otp"></p>
                            </div>
                        </div>
                        <div class="form-group submit">
                            <div class="col-md-12 text-center" style="margin-top: 5px">
                                <p>Didn't get OTP? <label id="resend" class="btn btn-xs">Resend OTP</label></p>
                                {{--<input id="resend" class="resend" data-toggle="modal" data-target="#otp_modal" value="Resend" type="submit">--}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--OTP Modal Close-->

    <div id="home-wrap" class="content-section fullpage-wrap row white">
        <div class="col-md-12 padding-leftright-null">
            <section id="news" class="page padding-md padding-bottom-null">
                <div class="row no-margin" style="margin-bottom:100px;">
                    <div class="col-md-12 services-box how-it-works">
                        <h1 class="text-center">{{__('askDoctor.how_work.title')}}</h1>
                        <div class="col-md-12">
                            <div class="col-md-4 col-md-offset-2">
                                <img src="{!! asset('assets/img/works1.png') !!}" width="" height="250px" alt="Search">
                            </div>
                            <div class="col-md-4 col-md-offset-1">
                                <h6 class="heading  margin-bottom-extrasmall">{{__('askDoctor.how_work.health_concern.title')}}</h6>
                                <p>{{__('askDoctor.how_work.health_concern.description')}}</p>
                            </div>
                        </div><br>
                        <div class="col-md-12 m-t-30">
                            <div class="col-md-4 col-md-offset-2">
                                <h6 class="heading  margin-bottom-extrasmall">{{__('askDoctor.how_work.doctors_answer.title')}}</h6>
                                <p>{{__('askDoctor.how_work.doctors_answer.description')}}</p>
                            </div>
                            <div class="col-md-4 col-md-offset-1">
                                <img src="{!! asset('assets/img/works2.png') !!}" width="" height="250px" alt="Search">
                            </div>
                        </div><br>
                        <div class="col-md-12 m-t-30">
                            <div class="col-md-4 col-md-offset-2">
                                <img src="{!! asset('assets/img/works3.png') !!}" width="" height="250px" alt="Search">
                            </div>
                            <div class="col-md-4 col-md-offset-1">
                                <h6 class="heading  margin-bottom-extrasmall">{{__('askDoctor.how_work.health_query.title')}}</h6>
                                <p>{{__('askDoctor.how_work.health_query.description')}}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
    <form id="login_success" method="post" action="{{ route('frontend.login.facebook') }}">
        <input id="csrf" type="hidden" name="csrf" />
        <input id="csrf_token" value="{{ csrf_token() }}" type="hidden" name="_token" />
        <input id="code" type="hidden" name="code" />
    </form>

@endsection

@section('header-scripts')
    <!-- HTTPS required. HTTP will give a 403 forbidden response -->
    <script src="https://sdk.accountkit.com/en_US/sdk.js"></script>
@stop

@section('before-scripts-end')

    <script>
        $(function() {
            var form = $('#contact-form');
            var formMessages = $('#ask-sub-msg');
            var formErrorMessages = $('#ask-sub-error-msg');
            var redirectURL = "{{ url('services/ask-a-doctor/') }}";

            $(form).submit(function(event) {
                event.preventDefault();
                if ( $(this).parsley().isValid() ) {
                    $('.ask-doctor-button').prop('disabled', true);
                    var formData = $(form).serialize();
                    $.ajax({
                        type: 'POST',
                        url: $(form).attr('action'),
                        data: formData
                    }).done(function(response) {
                        if(response.error == "sign-in") {
                            $(".ask-doc-login").fadeIn();
                            $(".ask-close").click(function(){
                                $(".ask-doc-login-out").fadeOut();
                                $('.ask-doctor-button').prop('disabled', false);
                            });
                        }
                        else if(response.submit == '1') {

                            document.getElementById('description').value = "";
                            document.getElementById('topics').value = "";
                            $("#is_private").prop("checked", false);
                            $(formErrorMessages).hide('');
                            $(".error-img").hide();
                            $(".sucess-img").show();
                            $(formMessages).show('');
                            $(formMessages).html('<i class="ion-checkmark-circled" data-pack="default" data-tags="complete, finished, success, on"></i> ' +response.success);
                            $(".ask-doc-sucess").fadeIn();
                            $("#contact-form").get(0).reset();
                            $(".ask-close").click(function(){
//                                $(".ask-doc-sucess-out").fadeOut();
                                $('.ask-doctor-button').prop('disabled', false);
//                                $("#contact-form").get(0).reset();
//                                $("#contact-form")[0].reset();

                                var questionId = response.questionResponse.askDoctor.id;
                                redirectURL += '/'+questionId;
                                window.location.href = redirectURL;
                            });


//                            var description = document.getElementById('description');
//                            countTextAreaChar(description, 1000);
                        } else{
                            $(formMessages).hide('');
                            $(".sucess-img").hide();
                            $(".error-img").show();
                            $(formErrorMessages).show('');
                            if(response.error == undefined) {
                                $(formErrorMessages).html('<i class="ion-close-circled" data-pack="default" data-tags="delete, trash, kill, x"></i> Oops! An error occured and your message could not be sent.');
                            } else {
                                $(formErrorMessages).html('<i class="ion-close-circled" data-pack="default" data-tags="delete, trash, kill, x"></i> ' +response.error);
                            }
                            $(".ask-doc-sucess").fadeIn();
                            $(".ask-close").click(function(){
                                $(".ask-doc-sucess-out").fadeOut();
                                $('.ask-doctor-button').prop('disabled', false);
                            });
                        }

                    }).fail(function(data) {
                        var parsedJson = data.responseJSON;
                        var errorString = '';
                        $.each( parsedJson.description, function( key, value) {
                            errorString += '<li class="error-text filled">' + value + '</li>';
                            console.log(errorString);
                        });
                        $('#errorMessageShow').html(errorString);
                        $('.ask-doctor-button').prop('disabled', false);
                        /*$(formMessages).hide('');
                         $(formErrorMessages).show('');
                         $(formErrorMessages).text('Oops! An error occured and your message could not be sent.');
                         $(".ask-doc-sucess").fadeIn();
                         $(".ask-close").click(function(){
                         $(".ask-doc-sucess-out").fadeOut();
                         });*/
                    });
                }

            });


        });
    </script>

    <script>
        // initialize Account Kit with CSRF protection
        AccountKit_OnInteractive = function(){
            AccountKit.init(
                    {
                        appId:"{!! config("misc.web.facebook_app_id") !!}",
                        state:"{{ csrf_token() }}",
                        version:"{{ config("misc.web.fb_account_kit_version") }}",
                        fbAppEventsEnabled:true,
                        Redirect:"{{ config("misc.web.fb_account_kit_redirect") }}"

                    }
            );
        };

        function otpLogin() {
            AccountKit.login(
                    'PHONE',
                    {countryCode: '+880', phoneNumber: ''}, // will use default values if not specified
                    loginCallback
            );
        }

    </script>

    <script>
        function loginCallback(response) {

            if (response.status === "PARTIALLY_AUTHENTICATED") {
                document.getElementById("code").value = response.code;
                document.getElementById("csrf").value = response.state;
                document.getElementById("login_success").submit();
            }
        }

        /* to count question during ask a question*/
        var userLang = navigator.language || navigator.userLanguage;
        var lang = "{{ Lang::locale() }}";

        if(lang == 'bn'){
            var numbers=['০','১','২','৩','৪','৫','৬','৭','৮','৯'];
        }
        if(lang == 'en'){
            var numbers=['0','1','2','3','4','5','6','7','8','9'];
        }
        var num_length = numbers.length;

        var len = $('#description').val().length;
        $('#charNum').text(len);
        function countTextAreaChar(txtarea, l){
            var len = $(txtarea).val().length;
            if (len > l) $(txtarea).val($(txtarea).val().slice(0, l));
//            else $('#charNum').text(len);
              var  output = [];
              var  sNumber = len.toString();

            for (var i = 0, len = sNumber.length; i < len; i += 1) {
                output.push(+sNumber.charAt(i));
            }

            var conct = '';
            for (var j = 0; j< output.length; j++) {
                for ( var k = 0; k < num_length;k++){
                    if(output[j] == k){
                        conct += numbers[k];
                     $('#charNum').text(conct);
                    }
                }

            }
        }

        /*to view placeholder on age field*/
        function myFunction() {
            document.getElementById("age").placeholder = "Amount";
        }

        //        $('.question-btn').click(function () {
        //            var parentFever = $(this).parents('.fever-question');
        //            parentFever.hide();
        //            parentFever.next('.fever-question').show();
        //        });

        $('.make-private .popup').on('change',function () {
            if($(this).is(':checked') == true) {
                $('.additional-info').show();
            } else {
                $('.additional-info').hide();
            }
        });

        $('.fever').on('change', function () {
            if($(this).val() == 1) {
                $('.note-fever').show();
            } else {
                $('.note-fever').hide();
                $('.note-fever').val("");
            }
        });

        $('.hypertensive').on('change', function () {
            if($(this).val() == 1) {
                $('.note-hypertensive').show();
            } else {
                $('.note-hypertensive').hide();
                $('.note-hypertensive').val("");
            }
        });

        $('.allergic').on('change', function () {
            if($(this).val() == 1) {
                $('.note-allergy-input').show();
            } else {
                $('.note-allergy-input').hide();
                $('.note-allergy-input').val("");
            }
        });

        //        $('.height').on('change', function () {
        //            if($(this).val() == 1) {
        //                $('.note-height').show();
        //            } else {
        //                $('.note-height').hide();
        //            }
        //        });
        $(".note-height").show(function() {
//Do something
        });

        $(".note-weight").show(function() {
//Do something
        });

        //        $('.weight').on('change', function () {
        //            if($(this).val() == 1) {
        //                $('.note-weight').show();
        //            } else {
        //                $('.note-weight').hide();
        //            }
        //        });

        $('.chronic').on('change', function () {
            if($(this).val() == 1) {
                $('.note-chronic').show();
            } else {
                $('.note-chronic').hide();
                $('.note-chronic').val("");
            }
        });

        $('.drugs').on('change', function () {
            if($(this).val() == 1) {
                $('.note-drugs').show();
            } else {
                $('.note-drugs').hide();
                $('.note-drugs').val("");
            }
        });

        //        showNote();
        //
        //        function showNote() {
        //            if(($('.fever').val() == 1)) {
        //                $('.note-placeholder').show();
        //            } else {
        //                $('.note-placeholder').hide();
        //            }
        //
        //        }
        //        $('.note-placeholder').hide();

        //        $("#feet").css("display","none");
        //        $('#feet input').removeAttr('required');
        //        $("#bmiheight").click(function(){
        //            if ($('select').val() == "cm") {
        //                $("#centimeter").show();
        //                $('#centimeter input').attr('required', 'required');
        //                $('#feet input').removeAttr('required');
        //                $("#feet").hide();
        //            }
        //            if ($('select').val() == "feet"){
        //                $("#centimeter").hide();
        //                $('#feet input').attr('required', 'required');
        //                $('#centimeter input').removeAttr('required');
        //                $("#feet").show();
        //            }
        //        });
        $(document).ready(function() {
            var feetElement = $("#feet");
            var cmElement = $("#centimeter");

            getHeightElement($('#height option:selected').val(), feetElement, cmElement);

            $("#height").change(function(){
                getHeightElement($('#height option:selected').val(), feetElement, cmElement);
            });
        });

        function getHeightElement(selectedValue, feetDiv, cmDiv) {
            if (selectedValue == "cm") {
                $(feetDiv).find('input').val('');
                feetDiv.remove();
                $('.heightFeetToggle').append(cmDiv);
            }
            else if (selectedValue == "feet"){
                $(cmDiv).find('input').val('');
                cmDiv.remove();
                $('.heightFeetToggle').append(feetDiv);
            }
            if(selectedValue == ""){
                $(feetDiv).find('input').val('');
                feetDiv.remove();

                $(cmDiv).find('input').val('');
                cmDiv.remove();
            }
        }

    </script>

    <script>
        var mobile = '';
        $('#login-btn').click(function(event) {
            event.preventDefault();


            mobile = $('#mobile').val();
            if(mobile==null || mobile == ''){
                $('#mobile').addClass('error');
                return false;
            }

            $('#mobileErrMsg').html('');
            var mobileValidation = mobile.match(/(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/ig);
            if(mobileValidation == null){
                $('#mobileErrMsg').html('Please provide valid number');
                return false;
            }

            $.ajax({
                type: "POST",
                url: "{{ url('login/mobile') }}",
                data: {
                    mobile:mobile
                },
                success: function(data){
                    $("#max-otp").text(data.error.message).fadeIn(4000).delay(6000).fadeOut("slow");
                    console.dir(data);
                },
                error:function(e){
                    console.dir(e);
                }
            });

            $('#mobile_number').val(mobile);
            $('#showMobile').html(mobile);
            $('#login_modal').modal('hide');
        });

        $('.otp_input').click(function() {
            var otp = $('.otp_input_field').val();
            if(otp == null || otp == ''){
                $('.otp_input_field').addClass('error');
                return false;
            }
        });

        $('#resend').click(function() {
            $.ajax({
                type: "POST",
                url: "{{ url('login/mobile') }}",
                data: {
                    mobile:mobile
                },
                success: function(data){
                    $("#max-otp").text(data.error.message).fadeIn(4000).delay(6000).fadeOut("slow");
                    console.dir(data);
                },
                error:function(e){
                    console.dir(e);
                }
            });
            return false;
        });

        var $radios = $('input:radio');

        $radios.change(function () {
            $radios.next().removeClass('gender-btn-active');
            $(this).next().addClass('gender-btn-active');
        });

    </script>

@endsection
