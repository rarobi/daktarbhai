@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Contact | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('after-styles')

    <style>

        i.service.material{
            box-shadow: none !important;
        }

        h6.contact-heading{
            color: #F7941E !important;
        }

        p{
            color: #000000 !important;
        }

        .service-content p a{
            color: #000000 !important;
        }

        .text h2{
            color: #F7941E !important;
            text-transform: uppercase;
            position: relative;
            letter-spacing: 0;
            font-size: 16px;
            line-height: 32px;
            font-weight: 500;
        }
        #contact-form .form-field, #search-form .form-field {
            border: 1px solid #36B7B4 !important;
        }
        .padding-leftright-sm{
            padding-left: 5px;
            padding-right: 5px;
        }

        @media screen and (min-width: 320px)and (max-width: 991px){

          .email-box{
              padding-right: 15px !important;
              padding-left:  15px !important;
          }
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
                        {{__('contact.header.title')}}
                    </h2>
                    <p class="heading white text-center" style="font-weight: 500; font-size: 16px">{{__('contact.header.text_1')}} {{__('contact.header.text_2')}}</p>
{{--                    <p class="heading white text-center" style="font-weight: 500; font-size: 20px">{{__('about-us.header.text')}}</p>--}}
                </div>
            </section>
        </div>
    </div>
    <div id="home-wrap" class="content-section fullpage-wrap">
        <div class="row no-margin">
            <div class="col-md-12 padding-leftright-null">
                <div class="col-md-4 padding-leftright-null">
                    <div class="text padding-md-bottom-null">
                        <div class="col-md-12" style="padding-left:95px">
                            {{--                        <i class="icon ion-ios-location-outline service material left">--}}
                            <i class="service material">
                                <img style="height: 60px" src="{!! asset('assets/img/location.png') !!}">
                            </i>
                        </div>
                        <div class="service-content">
                            <h6 class="contact-heading  margin-bottom-extrasmall">{{__('contact.content.box_1.title')}}</h6>
                            <p class="margin-bottom-null">{{__('footer.address.line_1')}} <br>
                                {{__('footer.address.line_2')}}
                                {{--House# 32, Road# 7, Block – F,<br>--}}
                                {{--Banani, Dhaka – 1213--}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 padding-leftright-null">
                    <div class="text padding-md-bottom-null">
                        <div class="col-md-12" style="padding-left:95px">
                            {{--                        <i class="icon ion-ios-telephone-outline service material left"></i>--}}
                            <i class="service material"><img style="height: 60px" src="{!! asset('assets/img/telephone.png') !!}"></i>
                        </div>
                        <div class="service-content">
                            <h6 class="contact-heading grey margin-bottom-extrasmall">{{__('contact.content.box_2.title')}}</h6>
                            <p class="margin-bottom-null">{{__('contact.content.box_2.line_1')}}<br>{{__('contact.content.box_2.line_2')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 padding-leftright-null">
                    <div class="text">
                        <div class="col-md-12" style="padding-left:95px">
                            {{--                        <i class="icon ion-ios-telephone-outline service material left"></i>--}}
                            <i class=" service material"><img style="height: 60px" src="{!! asset('assets/img/globe.png') !!}"></i>
                        </div>
                        <div class="service-content">
                            <h6 class="contact-heading margin-bottom-extrasmall">{{__('contact.content.box_3.title')}}</h6>
                            <p class="margin-bottom-null"><a href="mailto:{{ config('misc.app.email.contact_email') }}" target="_top">{{ config('misc.app.email.contact_email') }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row margin-leftright-null">
            <div class="col-md-6 padding-leftright-null">
                <div class="text">
                    <h2 class="margin-bottom-null left">{{__('contact.contact_box.title_1')}}</h2>
                    <div class="">
                        <p class="heading left margin-bottom">{{__('health-package.contact_form.title')}}
                        </p>

                        <h2 class="margin-bottom-null left">{{__('contact.contact_box.title_2')}}</h2>
                        <ul class="info connect-social">
                            <li><a target="_blank" href="{{ config('misc.app.social.facebook') }}"><i class="" data-pack="social" data-tags="like, post, share"><img height="30px" src="{!! asset('assets/img/contact-facebook.png') !!}"></i></a></li>
                            <li><a target="_blank" href="{{ config('misc.app.social.twitter') }}"><i class="" data-pack="social" data-tags="follow, post, share"><img height="30px" src="{!! asset('assets/img/contact-twitter.png') !!}"></i></a></li>
                            {{--<li><a target="_blank" href="#"><i class="ion-social-googleplus" data-pack="social" data-tags="follow, post, share"></i></a></li>--}}
                            <li><a target="_blank" href="{{ config('misc.app.social.youtube') }}"><i class="" data-pack="social" data-tags="follow, post, share"><img height="30px" src="{!! asset('assets/img/contact-youtube.png') !!}"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 padding-leftright-null">
                <div class="text padding-md-top-null padding-bottom-null">
                        {!! Form::open(['route'=>'frontend.contact','id'=>'contact-form', 'class' => 'form-contact padding-md padding-md-topbottom-null', 'data-parsley-validate']) !!}
                        <div class="row">
                            <div class="col-md-4 padding-right-null email-box">
                                {!! Form::text('name', old('name'),['class' => 'form-field', 'id' => 'name', 'placeholder' => __('health-package.contact_form.placeholder.name'), 'required' => 'required',
                                                                                 'data-parsley-required-message' => 'Name field is required',
                                                                                 'data-parsley-trigger'          => 'change focusout',
                                                                                 'data-parsley-minlength'        => '2',
                                                                                 'data-parsley-maxlength'        => '32']) !!}
                                @if ($errors->has('name'))
                                    <span class="error-text filled">{!! $errors->first('name') !!}  </span>
                                @endif
                            </div>
                            <div class="col-md-4 padding-leftright-sm email-box">
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
                            <div class="col-md-4 padding-left-null email-box">
                                {!! Form::text('subject', old('subject'), ['class' => 'form-field', 'id' => 'subjectForm', 'placeholder' => __('health-package.contact_form.placeholder.subject'), 'required' => 'required',
                                                                           'data-parsley-required-message' => 'Subject field is required',
                                                                           'data-parsley-trigger'          => 'change focusout',
                                                                           'data-parsley-minlength'        => '2',
                                                                           'data-parsley-maxlength'        => '32']) !!}
                                @if ($errors->has('subject'))
                                    <span class="error-text filled">{!! $errors->first('subject') !!}  </span>
                                @endif
                            </div>
                            <input class="form-field" name="feedback_type" id="subjectForm" type="hidden" placeholder="Subject" value="contact">
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
        <div class="row margin-leftright-null">
            <!-- ————————————————————————————————————————————
          ———	Map. Settings in maps.js
          —————————————————————————————————————————————— -->
            <div class="col-md-12 padding-leftright-null map">
                <div id="map"></div>
            </div>
            <!-- ————————————————————————————————————————————
          ———	END Map
          —————————————————————————————————————————————— -->
        </div>
    </div>
@endsection

@section('before-scripts-end')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfqf3jfD6CGO3Ormy168g7fwMBJlKMrM4"></script>
    <script src="{!! asset('assets/js/maps.js') !!}"></script>
@endsection
