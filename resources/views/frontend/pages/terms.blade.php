@extends('frontend.layouts.theme.master')

@section('after-styles')
    {{--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">--}}
    <link rel="stylesheet" href="{!! asset('assets/css/datepicker.css') !!}">
    <style>
        .ussd{
            font-weight: 900;
        }
        p{
            color: #2F2F2F !important;
        }

        .text ol li{
            color: #2F2F2F !important;
        }
    </style>
@endsection

@section('title')
    {!! 'Terms | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap terms-page">
        <div id="home-wrap" class="content-section fullpage-wrap terms-bg">
            <div class="row margin-leftright-null">
                <section class="doctor page padding-md">
                    <div class="container">
                        <h1 class="text-center">{{__('terms.title')}}</h1>
                    </div>
                </section>
            </div>
        </div>
        <div class="row no-margin">
            <div class="col-md-12 padding-leftright-null">
                <div class="row no-margin">
                    <div class="col-md-10 col-md-offset-1 padding-leftright-null">
                        <div class="text padding-bottom-null">
                            <h5 class="heading  margin-bottom-extrasmall">{{__('terms.service_section.title')}}</h5>
                            @if(app()->getLocale() == 'en')
                                <p>{{__('terms.service_section.description_1')}} <span class="ussd">{{__('terms.ussd_code')}}</span> {{__('terms.service_section.description_2')}}</p>
                            @endif
                            @if(app()->getLocale() == 'bn')
                                <p>ডাক্তারভাই অ্যাপটি ফ্রি ও সাবস্ক্রিপশন ভিত্তিক-উভয় মাধ্যমে সেবা প্রদান করে থাকে। আমাদের কল সেন্টারের নাম্বার <span class="ussd">{{__('terms.ussd_code')}}</span>; এই নাম্বারে ফোন করতে বাংলাদেশের সকল মোবাইল অপারেটর কর্তৃক নির্ধারিত কলচার্জ প্রযোজ্য হবে।</p>
                            @endif
                            <p>{{__('terms.service_section.description_3')}}</p>
                            <p class="margin-bottom-null">{{__('terms.service_section.description_4')}} </p>
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1 padding-leftright-null">
                        <div class="text padding-bottom-null">
                            <h5 class="heading  margin-bottom-extrasmall">{{__('terms.membership_terms_section.title')}}</h5>
                            <p class="margin-bottom-null">{{__('terms.membership_terms_section.description')}}</p>
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1 padding-leftright-null">
                        <div class="text padding-bottom-null">
                            <h5 class="heading  margin-bottom-extrasmall">{{__('terms.do_daktarbhai_section.title')}}</h5>
                            <h6 class="heading  margin-bottom-extrasmall">{{__('terms.do_daktarbhai_section.sub_title_1')}}</h6>
                            <p>{{__('terms.do_daktarbhai_section.description_1')}}</p>

                            <h6 class="heading  margin-bottom-extrasmall">{{__('terms.do_daktarbhai_section.sub_title_2')}}</h6>
                            <p>{{__('terms.do_daktarbhai_section.description_2')}}</p>

                            <h6 class="heading  margin-bottom-extrasmall">{{__('terms.do_daktarbhai_section.sub_title_3')}}</h6>
                            <p>{{__('terms.do_daktarbhai_section.description_3')}}</p>

                            <h6 class="heading  margin-bottom-extrasmall">{{__('terms.do_daktarbhai_section.sub_title_4')}}</h6>
                            @if(app()->getLocale() == 'en')
                                <p class="margin-bottom-null">If you want to unsubscribe our services, you can use Daktarbhai app. Contact us, if there is any kind of issues with our services through our call center number <span class="ussd">{{__('terms.ussd_code')}}</span> or send us an email to <i><b>{{__('terms.email')}}</b></i>. Daktarbhai will not be responsible for anything out of our service list.</p>
                            @endif
                            @if(app()->getLocale() == 'bn')
                                <p class="margin-bottom-null"> ডাক্তারভাই অ্যাপ ব্যবহার করে আপনি আমাদের সেবাসমুহ থেকে আনসাবস্ক্রাইব করতে পারবেন। সেবা সংক্রান্ত কোন সমস্যা থাকলে আমাদের কল সেন্টার নাম্বার <span class="ussd">{{__('terms.ussd_code')}}</span> এ কল করতে পারেন অথবা <i><b>{{__('terms.email')}}</b></i> এ ই-মেইল পাঠাতে পারেন। আমাদের সেবা তালিকার বাইরে অন্য কোন কিছুর জন্য ডাক্তারভাই দায়িত্ব নিবেনা।</p>
                            @endif


                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1 padding-leftright-null">
                        <div class="text padding-bottom-null">
                            <h5 class="heading  margin-bottom-extrasmall">{{__('terms.membership_renewal_section.title')}}</h5>
                            <p>{{__('terms.membership_renewal_section.description')}}
                                {{--<a href="http://healthcare4umember.com">www.healthcare4umember.com</a> {{__('terms.membership_renewal_section.and')}} <a href="http://hc4ubd.com">www.hc4ubd.com</a>.--}}
                            </p>
                            <h6 class="heading  margin-bottom-extrasmall">{{__('terms.membership_renewal_section.un_subscription.title')}}</h6>
                            <ul class="trams">
                                <li>{{__('terms.membership_renewal_section.un_subscription.rule_1')}}</li>
                                <li>{{__('terms.membership_renewal_section.un_subscription.rule_2')}}</li>
                            </ul>

                            <h6 class="heading  margin-bottom-extrasmall">{{__('terms.membership_renewal_section.member_responsibility.title')}}</h6>
                            <p class="margin-bottom-extrasmall">{{__('terms.membership_renewal_section.member_responsibility.description')}}
                                {{--<a href="http://healthcare4umember.com">www.healthcare4umember.com</a> {{__('terms.membership_renewal_section.and')}} <a href="http://hc4ubd.com">www.hc4ubd.com</a>.--}}
                            </p>
                            <ul class="trams">
                                <li>{{__('terms.membership_renewal_section.member_responsibility.responsibility_1')}}</li>
                                <li>{{__('terms.membership_renewal_section.member_responsibility.responsibility_2')}}</li>
                                <li>{{__('terms.membership_renewal_section.member_responsibility.responsibility_3')}}</li>
                                <li>{{__('terms.membership_renewal_section.member_responsibility.responsibility_4')}}</li>
{{--                                <li>{{__('terms.membership_renewal_section.member_responsibility.responsibility_5')}}</li>--}}
                                <li>{{__('terms.membership_renewal_section.member_responsibility.responsibility_6')}}</li>
                                <li>{{__('terms.membership_renewal_section.member_responsibility.responsibility_7')}}</li>
                                <li>{{__('terms.membership_renewal_section.member_responsibility.responsibility_8')}}</li>
                                <li>{{__('terms.membership_renewal_section.member_responsibility.responsibility_9')}}</li>
                            </ul>

                            <p class="margin-bottom-extrasmall">{{__('terms.membership_renewal_section.member_responsibility.conclusion')}}
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1 padding-leftright-null">
                        <div class="text padding-bottom-null">
                            <h5 class="heading  margin-bottom-extrasmall">{{__('terms.e-phr.title')}}</h5>
                            <p>{{__('terms.e-phr.description')}}</p>
                            <p>{{__('terms.e-phr.tips.title')}}</p>
                            <p>{{__('terms.e-phr.tips.description')}}</p>
                            <ul class="trams">
                                <li>{{__('terms.e-phr.tips.tips_2')}}</li>
                                <li>{{__('terms.e-phr.tips.tips_3')}}</li>
                                <li>{{__('terms.e-phr.tips.tips_4')}}</li>
                            </ul>
                            <br>
                            <h6 class="heading  margin-bottom-extrasmall">{{__('terms.e-phr.life_insurance.title')}}</h6>
                            <h6 class="heading  margin-bottom-extrasmall" style="font-style: italic;font-weight: 600">{{__('terms.e-phr.life_insurance.exemption_health_insurance.title')}}</h6>
                            <ul class="trams">
                                <li>{{__('terms.e-phr.life_insurance.exemption_health_insurance.rule_1')}}</li>
                                <li>{{__('terms.e-phr.life_insurance.exemption_health_insurance.rule_2')}}</li>
                                <li>{{__('terms.e-phr.life_insurance.exemption_health_insurance.rule_3')}}</li>
                                <li>{{__('terms.e-phr.life_insurance.exemption_health_insurance.rule_4')}}</li>
                                <li>{{__('terms.e-phr.life_insurance.exemption_health_insurance.rule_5')}}</li>
                                <li>{{__('terms.e-phr.life_insurance.exemption_health_insurance.rule_6')}}</li>
                                <li>{{__('terms.e-phr.life_insurance.exemption_health_insurance.rule_7')}}</li>
                                <li>{{__('terms.e-phr.life_insurance.exemption_health_insurance.rule_8')}}</li>
                                <li>{{__('terms.e-phr.life_insurance.exemption_health_insurance.rule_9')}}</li>
                                <li>{{__('terms.e-phr.life_insurance.exemption_health_insurance.rule_10')}}</li>
                                <li>{{__('terms.e-phr.life_insurance.exemption_health_insurance.rule_11')}}</li>
                                <li>{{__('terms.e-phr.life_insurance.exemption_health_insurance.rule_12')}}</li>
                            </ul>

                            <h6 class="heading  margin-bottom-extrasmall" style="font-style: italic;font-weight: 600">{{__('terms.e-phr.life_insurance.exemption_life_insurance.title')}}</h6>
                            <ul class="trams">
                                <li>{{__('terms.e-phr.life_insurance.exemption_life_insurance.rule_1')}}</li>
                                <li>{{__('terms.e-phr.life_insurance.exemption_life_insurance.rule_2')}}</li>
                                <li>{{__('terms.e-phr.life_insurance.exemption_life_insurance.rule_3')}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1 padding-leftright-null">
                        <div class="text">
                            <h5 class="heading  margin-bottom-extrasmall">{{__('terms.user_section.title')}}</h5>
                            <h6 class="heading  margin-bottom-extrasmall">{{__('terms.user_section.account_responsibility.title')}}</h6>
                            <p>{{__('terms.user_section.account_responsibility.description')}}</p>
                            <h6 class="heading  margin-bottom-extrasmall">{{__('terms.user_section.legal_purpose.title')}}</h6>
                            <p>{{__('terms.user_section.legal_purpose.description')}}</p>
                            <h6 class="heading  margin-bottom-extrasmall">{{__('terms.user_section.acceptance_terms.title')}}</h6>
                            <p>{{__('terms.user_section.acceptance_terms.description')}}</p>
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1 padding-leftright-null">
                        <div class="text">
                            <h5 class="heading  margin-bottom-extrasmall">{{__('terms.bkash_section.title')}}</h5>
                            <h6 class="heading  margin-bottom-extrasmall">{{__('terms.bkash_section.service_name.title')}}</h6>
                                <ol>
                                    <li>{{__('terms.bkash_section.service_name.service1')}}</li>
                                    <li>{{__('terms.bkash_section.service_name.service2')}}</li>
                                </ol>
                            <h6 class="heading  margin-bottom-extrasmall">{{__('terms.bkash_section.note_for_telemedicine.title')}}</h6>
                                <ol>
                                    <li>{{__('terms.bkash_section.note_for_telemedicine.note1')}}</li>
                                    <li>{{__('terms.bkash_section.note_for_telemedicine.note2')}}</li>
                                    <li>{{__('terms.bkash_section.note_for_telemedicine.note3')}}</li>
                                    <li>{{__('terms.bkash_section.note_for_telemedicine.note4')}}</li>
                                </ol>
                            <h6 class="heading  margin-bottom-extrasmall">{{__('terms.bkash_section.note_for_sample_collection.title')}}</h6>
                                <ol>
                                    <li>{{__('terms.bkash_section.note_for_sample_collection.note1')}}</li>
                                    <li>{{__('terms.bkash_section.note_for_sample_collection.note2')}}</li>
                                    <li>{{__('terms.bkash_section.note_for_sample_collection.note3')}}</li>
                                    <li>{{__('terms.bkash_section.note_for_sample_collection.note4')}}</li>
                                </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('after-scripts')


@endsection
