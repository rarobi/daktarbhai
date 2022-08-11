@extends('frontend.layouts.theme.master')

@section('after-styles')
    {{--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">--}}
    <link rel="stylesheet" href="{!! asset('assets/css/datepicker.css') !!}">
    <style>
      #sidemenu{
        display: none;
      }

      .header-top{
          display: none;
      }

      .responsive-menu-bar {
        display: none !important;
      }
      header nav.navbar #logo a.navbar-brand img {
        max-width: 115px;
        float: none;
        margin-left: 50px;
      }
      header nav.navbar #logo {
        	width: 250px;
        	position: relative;
        	float: none;
        	margin: 0 auto;
        }
      footer.fixed1{
        display: none;
      }
      #logo a, .copy a{
        pointer-events: none;
      }
      footer.fixed, .footer.fixed {
        height: auto;
      }
      footer, .footer {
          padding: 0px 10px 10px 10px !important;
        }
      footer .copy, .footer .copy {
      	padding: 15px 14px 0 0 !important;
      	text-align: center;
      }
      footer .copy a#backtotop, .footer .copy a#backtotop {
      	display: none;
      }
      footer .copy a, .footer .copy a {
      	display: block;
      }
    </style>
@endsection

@section('page-header-class', 'header-static')

@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap terms-page">
        <div class="row">
            <!-- ————————————————————————————————————————————
            ———	About us content
            —————————————————————————————————————————————— -->
            <div class="col-md-10 col-md-offset-1">
                <div class="text padding-bottom-null">
                    {{--<h1 class="text-center">Privacy Policy</h1>--}}
                    {{--<h5 class="heading  margin-bottom-extrasmall">How we Protect You</h5>--}}
                    {{--<p class="margin-bottom-null"><i class="ion-android-done-all"></i>  Your identity is private and never to be shared without your consent.</p>--}}
                    {{--<p class="margin-bottom-null"><i class="ion-android-done-all"></i>  Personal identifiable information is not visible to others at time or moment.</p>--}}
                    {{--<p class="margin-bottom-null"><i class="ion-android-done-all"></i>  Phone contacts and data are confidential and will not be used/accessed without your permission</p>--}}

                    <h1 class="text-center">{{__('app-privacy-policy.title')}}</h1>
                    <h5 class="heading  margin-bottom-extrasmall">{{__('app-privacy-policy.how_protect.title')}}</h5>
                    <p class="margin-bottom-null"><i class="ion-android-done-all"></i>  {{__('app-privacy-policy.how_protect.text_1')}}</p>
                    <p class="margin-bottom-null"><i class="ion-android-done-all"></i>  {{__('app-privacy-policy.how_protect.text_2')}}</p>
                    <p class="margin-bottom-null"><i class="ion-android-done-all"></i>  {{__('app-privacy-policy.how_protect.text_3')}}</p>
                </div>
            </div>
        </div>
        <div class="row no-margin">
            <div class="col-md-12 padding-leftright-null">
                <div class="row no-margin">
                    <div class="col-md-10 col-md-offset-1 padding-leftright-null">
                        <div class="text padding-bottom-null">
                            {{--<h5 class="heading  margin-bottom-extrasmall">Login</h5>--}}
                            {{--<p class="margin-bottom-null">Logging into Daktarbhai needs an ID and a password. Daktarbhai do not permit anyone to create a password in plain text and we encrypt these passwords for the safety of your account.</p>--}}

                            <h5 class="heading  margin-bottom-extrasmall">{{__('app-privacy-policy.login.title')}}</h5>
                            <p class="margin-bottom-null">{{__('app-privacy-policy.login.description')}}</p>
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1 padding-leftright-null">
                        <div class="text padding-bottom-null">
                            {{--<h5 class="heading grey margin-bottom-extrasmall">Sharing policy of personal information</h5>--}}
                            {{--<p>Daktarbhai uses certain personal informations to identify its members. Such details are; the full member’s name, national id, credit card or other payment information (if provided), email address, contact number, address, health information data and photograph. Daktarbhai will collect these informations at the time of establishing an account and communicate with a member using these when needed.</p>--}}

                            {{--<p class="text-bold">Here are some tips about how to stay anonymous and share data securely:</p>--}}
                            {{--<p><i class="ion-android-done-all"></i>  Always keep your password private.</p>--}}
                            {{--<p><i class="ion-android-done-all"></i>  Don't reveal any personally identifiable information (such as a public questions of ‘Ask a Question’) in your public posts on Daktarbhai.</p>--}}
                            {{--<p class="margin-bottom-null"><i class="ion-android-done-all"></i>  Don't leave an active health-chat session unattended.</p>--}}

                            <h5 class="heading grey margin-bottom-extrasmall">{{__('app-privacy-policy.personal_information.title')}}</h5>
                            <p>{{__('app-privacy-policy.personal_information.description')}}</p>

                            <p class="text-bold">{{__('app-privacy-policy.personal_information.note')}}</p>
                            <p><i class="ion-android-done-all"></i>  {{__('app-privacy-policy.personal_information.text_1')}}  </p>
                            <p><i class="ion-android-done-all"></i>  {{__('app-privacy-policy.personal_information.text_2')}} </p>
                            <p class="margin-bottom-null"><i class="ion-android-done-all"></i>  {{__('app-privacy-policy.personal_information.text_3')}} </p>
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1 padding-leftright-null">
                        <div class="text padding-bottom-null">
                            {{--<h5 class="heading  margin-bottom-extrasmall">Sharing of information with a third party</h5>--}}
                            {{--<p class="margin-bottom-null">Daktarbhai will not sell your personal information to a third party(s) without your consent.</p>--}}

                            <h5 class="heading  margin-bottom-extrasmall"> {{__('app-privacy-policy.sharing_information.title')}}</h5>
                            <p class="margin-bottom-null">{{__('app-privacy-policy.sharing_information.text')}}</p>
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1 padding-leftright-null">
                        <div class="text padding-bottom-null">
                            {{--<h5 class="heading  margin-bottom-extrasmall">Changes</h5>--}}
                            {{--<p class="margin-bottom-null">When Daktarbhai makes any amended changes in this privacy policy, you will be notified immediately. </p>--}}

                            <h5 class="heading  margin-bottom-extrasmall">{{__('app-privacy-policy.changes.title')}}</h5>
                            <p class="margin-bottom-null">{{__('app-privacy-policy.changes.text')}} </p>
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1 padding-leftright-null">
                        <div class="text">
                            {{--<h5 class="heading  margin-bottom-extrasmall">Contact Us</h5>--}}
                            {{--<p>To update any kind of personal information, to delete your account or have any questions & concerns regarding Daktarbhai privacy policy, you may contact us at <a href="{{ config('misc.app.email.contact_email') }}" target="_blank">{{ config('misc.app.email.contact_email') }}</a>.</p>--}}
                            {{--<p class="text-bold">Note: We may preserve some of your account information after the deletion of your account. </p>--}}

                            <h5 class="heading  margin-bottom-extrasmall">{{__('app-privacy-policy.contact.title')}}</h5>
{{--                            <p>{{__('app-privacy-policy.contact.text')}} <a href="{{ config('misc.app.email.contact_email') }}" target="_blank">{{ config('misc.app.email.contact_email') }}</a>.</p>--}}
                            <p>{{__('app-privacy-policy.contact.text')}} <i style="font-weight: bold">{{ config('misc.app.email.contact_email') }}</i>.</p>
                            <p class="text-bold">{{__('app-privacy-policy.contact.note')}} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('after-scripts')


@endsection
