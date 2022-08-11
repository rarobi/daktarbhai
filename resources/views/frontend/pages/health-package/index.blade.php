@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Health Package | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap row hos-bg">
        <div class="col-md-12 padding-leftright-null">
            <!-- ————————————————————————————————————————————
            ———	Contact Content Start here
            —————————————————————————————————————————————— -->
            <section class="doctor page padding-md">
                <div class="container">
                    <h2 class="text-center padding-top-null white">
                         {{__('health-package.header.title')}}
                    </h2>
                    <p class="heading white text-center"> {{__('health-package.header.description')}}</p>
                </div>
            </section>
        </div>
    </div>
    <div id="home-wrap" class="content-section fullpage-wrap about-page health-package">
        <div class="row no-margin bottom-shadow">
            <div class="col-md-12 padding-leftright-null">
                <div class="col-md-12 padding-leftright-null health-intro">
                    <div class="text padding-md-bottom-null">
                        <h3 class="grey big margin-bottom-small">{{__('health-package.content.health')}} <span class="brand-color">{{__('health-package.content.package')}} </span></h3>
                        <p class="justi">
                            <br>{{__('health-package.content.para_1')}}<br>
                        </p>
                        <p class="justi">
                            {{__('health-package.content.para_2')}}
                        </p>
                    </div>
                </div>
                <div class="col-md-6 padding-leftright-null">
                    <div class="text padding-md-bottom-null cor-pack">
                        <!--<h2 class="small">Personal Health Record (PHR)</h2>-->
                        <table class="table">
                            <tbody>
                            <tr>
                                <th class="text-center text-bold text-uppercase">{{__('health-package.table.title')}}</th>
                            </tr>
                            <tr>
                                <td class="grey-bg"><i class="ion-android-done-all active" data-pack="android" data-tags=""></i>{{__('health-package.table.tr_1')}} </td>
                            </tr>
                            <tr>
                                <td><i class="ion-android-done-all active" data-pack="android" data-tags=""></i> {{__('health-package.table.tr_2')}}</td>
                            </tr>
                            <tr>
                                <td class="grey-bg"><i class="ion-android-done-all active" data-pack="android" data-tags=""></i>{{__('health-package.table.tr_3')}} </td>
                            </tr>
                            <tr>
                                <td><i class="ion-android-done-all active" data-pack="android" data-tags=""></i>{{__('health-package.table.tr_4')}} </td>
                            </tr>
                            <tr>
                                <td class="grey-bg"><i class="ion-android-done-all active" data-pack="android" data-tags=""></i>{{__('health-package.table.tr_5')}} </td>
                            </tr>
                            <tr>
                                <td><i class="ion-android-done-all active" data-pack="android" data-tags=""></i>{{__('health-package.table.tr_6')}} </td>
                            </tr>
                            <tr>
                                <td class="grey-bg"><i class="ion-android-done-all active" data-pack="android" data-tags=""></i>{{__('health-package.table.tr_7')}} </td>
                            </tr>
                            <tr>
                                <td><i class="ion-android-done-all active" data-pack="android" data-tags=""></i>{{__('health-package.table.tr_8')}} </td>
                            </tr>
                            <tr>
                                <td class="grey-bg"><i class="ion-android-done-all active" data-pack="android" data-tags=""></i>{{__('health-package.table.tr_9')}} </td>
                            </tr>
                            <tr>
                                <td><i class="ion-android-done-all active" data-pack="android" data-tags=""></i>{{__('health-package.table.tr_10')}} </td>
                            </tr>
                            <tr>
                                <td class="grey-bg"><i class="ion-android-done-all active" data-pack="android" data-tags=""></i>{{__('health-package.table.tr_11')}} </td>
                            </tr>
                            <tr>
                                <td><i class="ion-android-done-all active" data-pack="android" data-tags=""></i>{{__('health-package.table.tr_12')}} </td>
                            </tr>
                            <tr>
                                <td class="grey-bg"><i class="ion-android-done-all active" data-pack="android" data-tags=""></i>{{__('health-package.table.tr_13')}} </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 padding-leftright-null">
                    <div class="text padding-md-bottom-null download-app">
                        <p class="left margin-bottom text-highlight">{{__('health-package.contact_form.title')}}
                        </p>
                        {!! Form::open(['route'=>'frontend.contact','id'=>'contact-form', 'class' => 'form-contact padding-md-topbottom-null', 'data-parsley-validate']) !!}
                        <div class="row">
                            <div class="col-md-4">
                                {!! Form::text('name', old('name'),['class' => 'form-field', 'id' => 'name', 'placeholder' => __('health-package.contact_form.placeholder.name'), 'required' => 'required',
                                                                                 'data-parsley-required-message' => 'Name field is required',
                                                                                 'data-parsley-trigger'          => 'change focusout',
                                                                                 'data-parsley-minlength'        => '2',
                                                                                 'data-parsley-maxlength'        => '32']) !!}
                                @if ($errors->has('name'))
                                    <span class="error-text filled">{!! $errors->first('name') !!}  </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                {!! Form::email('email', old('email'), ['class' => 'form-field','id' => 'email', 'placeholder' => __('health-package.contact_form.placeholder.email'), 'required' => 'required',
                                                                                    'data-parsley-required-message' => 'Email is required',
                                                                                    'data-parsley-pattern'          => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$',
                                                                                    'data-parsley-pattern-message'  => 'Please provide with a valid email address',
                                                                                    'data-parsley-trigger'          => 'change focusout',
                                                                                    'data-parsley-type'             => 'email',
                                                                                    'data-parsley-type-message'     => 'Please provide with a valid email address']) !!}
                                @if ($errors->has('email'))
                                    <span class="error-text filled">{!! $errors->first('email') !!}  </span>
                                @endif
                                <div id="formEmail"></div>
                            </div>
                            <div class="col-md-4">
                                {!! Form::text('subject', old('subject'), ['class' => 'form-field', 'id' => 'subjectForm', 'placeholder' => __('health-package.contact_form.placeholder.subject'), 'required' => 'required',
                                                                           'data-parsley-required-message' => 'Subject field is required',
                                                                           'data-parsley-trigger'          => 'change focusout',
                                                                           'data-parsley-minlength'        => '2',
                                                                           'data-parsley-maxlength'        => '32']) !!}
                                @if ($errors->has('subject'))
                                    <span class="error-text filled">{!! $errors->first('subject') !!}  </span>
                                @endif
                            </div>
                            <input class="form-field" name="feedback_type" id="subjectForm" type="hidden" placeholder="Subject" value="health-package">
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::textarea('description', old('description'), ['class' => 'form-field', 'id' => 'messageForm', 'rows' => '6', 'placeholder' => __('health-package.contact_form.placeholder.msg'),
                                                                                       'required' => 'required',
                                                                                       'data-parsley-required-message' => 'Message field is required',
                                                                                       'data-parsley-trigger'          => 'change focusout',
                                                                                       'data-parsley-minlength'        => '14']) !!}
                                @if ($errors->has('description'))
                                    <span class="error-text filled">{!! $errors->first('description') !!}  </span>
                                @endif
                                <div class="submit-area">
                                    <input type="submit"  class="btn-alt active shadow" value="{{__('health-package.button')}}">
                                    @if(session('success'))
                                        <div id="msg"  class="message success" > {!! session('success') !!}</div>
                                    @endif
                                    @if(session('error') )
                                        <div id="msg" class="message error" > {!! session('error')  !!} </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div id='recaptcha' class="g-recaptcha"
                             data-sitekey="{!! config("misc.web.google_recapcha_sitekey") !!}"
                             data-size="invisible" data-callback="recaptchaCallback"></div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('before-scripts-end')


@endsection