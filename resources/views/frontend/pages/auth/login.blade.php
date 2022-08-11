@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Login | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('header-scripts')
    <!-- HTTPS required. HTTP will give a 403 forbidden response -->
    <script src="https://sdk.accountkit.com/en_US/sdk.js"></script>
@stop

@section('after-styles')
    <style>
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
            font-size: 40px;
            position: absolute;
            top: 130px;
            right: 455px;

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
            height: 300px;
            width: 50%;
            padding: 70px 0;
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
            margin-top: 215px;
            width: 750px;
            height: 350px;
            margin-left: -75px;
            border: 0.5px solid #36B7B4 !important;
        }
        .modal-otp {
            height: 470px;
            margin-top: 130px;
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
        /*.col-md-offset-3 {*/
        /*    margin-left: 25%;*/
        /*    margin-top: 14px;*/
        /*}*/
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
                /*margin-top: 225px;*/
                margin-top: 135px;
                width: auto;
                height: 500px;
                margin-left: 0;
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

@section('content')
{{--{{dd($error)}}--}}
        <div id="home-wrap" class="content-section fullpage-wrap row">
            <!-- ————————————————————————————————————————————
            ———	Login From Start
            —————————————————————————————————————————————— -->
            <?php
            \Session::get('appointmentUrl') ? \Session::put('backUrl', \Session::get('appointmentUrl')) : \Session::put('backUrl', \URL::previous());
            ?>
            @if(app()->getLocale() == 'en')
                {{--                    <h2 class="text-center padding-sm small padding-top-null">Welcome to <img src="{!! asset('assets/img/login-logo.png') !!}" class="login-logo" alt="Daktarbhai"></h2>--}}
                <h2 class="text-center small padding-top-lg padding-bottom-null">Welcome to <img src="{!! asset('assets/img/logo.png') !!}" class="login-logo" alt="Daktarbhai"></h2>
            @elseif(app()->getLocale() == 'bn')
                <h2 class="text-center small paddint-top-lg padding-bottom-null"><img src="{!! asset('assets/img/logo.png') !!}" class="login-logo" alt="ডাক্তারভাই"> সেবায় আপনাকে স্বাগতম </h2>
            @endif
            <div class="login-area">
                <div class="col-md-4 col-md-offset-3 login-card">


                    {{--<div>OR</div>
                    <input placeholder="email" id="email"/>
                    <button onclick="emailLogin();">Login via Email</button>--}}

                    @if (\Session::has('message'))
                        <div class="alert alert-danger" style="background-color: rgba(237, 28, 36, 0.33); color: #ed1c24;text-align: center;">
                            {{ \Session::get('message') }}
                        </div>
                    @endif
                    @if (\Session::has('success'))
                        <div class="alert alert-success" style="color:green;text-align: center;">
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
                                <div class="form-group col-md-offset-3">
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

        <!--First Modal -->
        <div class="row">
        <div class="col-md-12">
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <div class="modal fade" id="login_modal"  data-backdrop="static" role="dialog">
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
                                        <div class="col-md-5 col-sm-3 mobile" style="margin-left: -25px">
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
        <div class="modal fade" id="otp_modal"  data-backdrop="static" role="dialog">
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
                                    <p>Didn't get OTP? <label id="resend" class="btn btn-xs">Resend OTP</label><span id="resend_msg"></span></p>
                                    {{--<input id="resend" class="resend" data-toggle="modal" data-target="#otp_modal" value="Resend" type="submit">--}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--OTP Modal Close-->

        <form id="login_success" method="post" action="{{ route('frontend.login.facebook') }}">
            <input id="csrf" type="hidden" name="csrf" />
            <input id="csrf_token" value="{{ csrf_token() }}" type="hidden" name="_token" />
            <input id="code" type="hidden" name="code" />
        </form>
@endsection

@section('header-scripts')
    <!-- HTTPS required. HTTP will give a 403 forbidden response -->
    {{--<script src="https://sdk.accountkit.com/en_US/sdk.js"></script>--}}
@stop
@section('before-scripts-end')

    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
@section('after-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
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

            // email form submission handler
            function emailLogin() {
                var emailAddress = document.getElementsByClassName("email").value;
                AccountKit.login(
                        'EMAIL',
                        {emailAddress: emailAddress},
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

        function registerLoginCallback(response) {
            if (response.status === "PARTIALLY_AUTHENTICATED") {

                document.getElementById("code_reg").value = response.code;
                document.getElementById("csrf_reg").value = response.state;
                document.getElementById("registerUser").submit();
            }
        }


    </script>

    <script>

            function userRegister() {
                //if($("#registerUser").valid()) {
                if($("#registerUser").parsley().validate()) {
                    if ($('#termsAgreed').prop('checked') == true) {

                        // check if the email already exist
                        var emailValue =   $('.email-reg').val();

                        getRegistrationStatus(emailValue);
                    }
                }

            }

    </script>

    <script>
        function getRegistrationStatus(email) {
            var reqEmail  =   email;
            var getEmailValidation    =   $.post('{!! route("frontend.pre.email.validation") !!}',{ email: reqEmail, '_token': '{!! csrf_token() !!}' } );
            getEmailValidation.done(function(data){

                if(data == true) {
                    $('.email-exist').text('');
                    document.getElementById("registerUser").submit();
                } else {
                    $('.email-exist').text('User already exists with this email');
                }
            });
        }
    </script>

    <script>
        $('.reg-button').click(function(){
            userRegister();
        });
    </script>

    <script>

        function otpLogin() {

                var getUserActivityStatus    =   $.post('{!! url("user/is-active") !!}',{ '_token': '{!! csrf_token() !!}' } );
                getUserActivityStatus.done(function(data){

                    if(data==1) {
                        window.location.replace('{!! url('/profile') !!}');
                    } else {
                        AccountKit.login(
                                'PHONE',
                                {countryCode: '+880', phoneNumber: ''}, // will use default values if not specified
                                loginCallback
                        );
                    }
                });

        }

    </script>

    <script>
            $(".alert").fadeOut(5000);
    </script>
    <script>
        $(document).ready(function(){
            $("#reg").click(function(){
                console.log('reg')
                $("#logIn").text('{{__('login.buttons.register')}}');
                $("#register").show();
                $("#login").hide();

            });
            $("#Log").click(function(){
                console.log('login')
                // $("#logIn").text('Login');
                $("#logIn").text('{{__('login.buttons.login')}}');
                $("#login").show();
                $("#register").hide();

            });
        });
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
            var mobileValidation = mobile.match(/(^(\+8801|8801|01|008801))[1|1-9]{1}(\d){8}$/ig);
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
                    console.log(data);
                    if (data.status =='error'){
                        $("#max-otp").text(data.error.message).fadeIn(4000).delay(6000).fadeOut("slow");
                    }
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
                    $("#resend").hide();
                    // $("#resend_msg").text('An OTP send your mobile.You can try again after 60 seconds,');
                    $("#resend_msg").html('An OTP send your mobile.You can try again after'+ "&nbsp;" +"<span id='time' style='font-weight: bold;'></span>");

                    if (data.status =='error'){
                        $("#max-otp").text(data.error.message).fadeIn(4000).delay(6000).fadeOut("slow");
                    }


                    setTimeout(function() {
                        $("#resend").show();
                        $("#resend_msg").text("");
                    }, 60000);
                },
                error:function(e){
                    console.dir(e);
                }
            });

            var timeleft = 60;
            var downloadTimer = setInterval(function(){

                document.getElementById("time").innerHTML = timeleft + " seconds";

                timeleft -= 1;

                if(timeleft == 0){
                    clearInterval(downloadTimer);
                }
            }, 1000);


        });

    </script>
@endsection
