@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Reset Password | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('content')
        <div id="home-wrap" class="content-section fullpage-wrap row">
            <!-- ————————————————————————————————————————————
            ———	reset password From Start
            —————————————————————————————————————————————— -->
            <div class="login-area">

                <div class="col-md-4 col-md-offset-4">
                    @if(session('success'))
                        <p class="success" style="position: absolute; top: -12px;"> {!! session('success') !!}</p>
                    @endif
                    @if(session('error') )
                        <p class="error" style="position: absolute; top: -40px;"> {!! session('error')  !!} </p>
                    @endif
                    {{--<h2 class="text-center padding-sm small">Welcome to <img src="{!! asset('assets/img/logo.png') !!}" class="login-logo" alt="logo"></h2>--}}
                    @if(app()->getLocale() == 'en')
                        <h2 class="text-center padding-sm small padding-top-null">Welcome to <img src="{!! asset('assets/img/logo.png') !!}" class="login-logo" alt="Daktarbhai"></h2>
                    @elseif(app()->getLocale() == 'bn')
                        <h2 class="text-center padding-sm small padding-top-null"><img src="{!! asset('assets/img/logo.png') !!}" class="login-logo" alt="ডাক্তারভাই"> সেবায় আপনাকে স্বাগতম </h2>
                    @endif
                    <p>{{__('login.reset_password.title')}} </p>
                    <div class="login-form forget-pass">
                        {!! Form::open(['route' => ['frontend.reset-password'], 'method' => 'post', 'class' => 'form-horizontal login', 'data-parsley-validate']) !!}
                            <div class="form-group">
                                <div class="col-md-12">
                                    {{--{!! Form::email('email', old('email'), ['placeholder' => 'E-mail Address', 'id' => 'email', 'class' => 'form-control form-field',
                                                                            'required' => 'required', 'data-parsley-required-message' => 'Email is required',
                                                                            'data-parsley-pattern'          => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$',
                                                                            'data-parsley-pattern-message'  => 'Please provide with a valid email address',
                                                                            'data-parsley-trigger'          => 'change focusout',
                                                                            'data-parsley-type'             => 'email',
                                                                            'data-parsley-type-message'     => 'Please provide with a valid email address']) !!}
                                    @if ($errors->has('email'))
                                        <span class="error-text filled">{!! $errors->first('email') !!}  </span>
                                    @endif--}}

                                    {!! Form::input('email_username', old('email_username'),'', ['name'=>'email_username','placeholder' => __('login.reset_password.placeholder.email'), 'required' => 'required',  'class' => 'form-control form-field email-phone email',
                                                                                    'data-parsley-required-message' => __('login.reset_password.validation_msg.email'),
                                                                                    'data-parsley-pattern'          => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}|(?:\+)+[1-9]+[0-9]{6,}|^[a-zA-Z0-9]*$',
                                                                                    'data-parsley-trigger'          => 'change focusout',
                                                                                    //'data-parsley-type'             => 'email',
                                                                                    'data-parsley-type-message'     => __('login.reset_password.validation_msg.valid_email')]) !!}
                                    @if ($errors->has('email_username'))
                                        <span class="error-text filled">{!! $errors->first('email_username') !!}  </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input  class="login-btn" value="{{__('login.reset_password.button.submit')}}" type="submit">
                                </div>
                            </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <a href="{!! route('frontend.signin') !!}"class="for-pass" style="margin-left: 2px; float: left;">{{__('login.reset_password.click_login')}} <i class="ion-ios-arrow-thin-right active"></i></a>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('before-scripts-end')


@endsection