@extends('frontend.layouts.theme.master')

@section('after-styles')
    {{--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">--}}
    <link rel="stylesheet" href="{!! asset('assets/css/datepicker.css') !!}">
    <style>
        .header-top{

            display: none;
        }
    #sidemenu{
      display: none;
    }
    /*#menu-responsive-sidemenu {*/
    /*  display: none !important;*/
    /*}*/
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
        strong{
            font-weight: 600 !important;
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
                    {{--<h1 class="text-center">Daktarbhai Terms & Conditions</h1>--}}
                    <h1 class="text-center">{{__('app-terms.title')}}</h1>
                    <h5 class="heading  margin-bottom-extrasmall">{{__('app-terms.definition_section.title')}}</h5>
                    <p >{{__('app-terms.definition_section.description')}}</p>
                    {{--<p class="margin-bottom-null">Daktarbhai  or the <span class="text-bold">" Daktarbhai Apps"</span> means http://healthcare4umember.com/HC4U/ and related web sites.<span class="text-bold">"Company,"</span> is Health Care Information System Limited, <span class="text-bold">"we"</span> <span class="text-bold">"us, "</span> or <span class="text-bold">"our"</span> means “Daktarbhai” or the company, a healthcare organization and any other companies that are affiliated with “Daktarbhai” and professional corporations, to which Daktarbhai provides administrative services. <span class="text-bold">"Content"</span> means text, graphics, images and any other material entered, processed, contained on or accessed through the applications/features, including content created or modified. <span class="text-bold">"Services"</span> means, services provided through the Daktarbhai Application. <span class="text-bold">"Premium Services"</span> means paid services provided through the applications/features. Our applications/features and web portal are easy, innovative solution, which includes; medical history, doctor appointment booking, scanning reports, medical history, health tips and much more.  </p>--}}
                    <p class="margin-bottom-null"><span class="text-bold"> {{__('app-terms.definition_section.daktarbhai')}}</span> {{__('app-terms.definition_section.daktarbhai_description')}} <span class="text-bold">{{__('app-terms.definition_section.content')}}</span> {{__('app-terms.definition_section.content_description')}} <span class="text-bold">{{__('app-terms.definition_section.services')}}</span> {{__('app-terms.definition_section.services_description')}}
                </div>
            </div>
        </div>
        <div class="row no-margin">
            <div class="col-md-12 padding-leftright-null">
                <div class="row no-margin">
                    <div class="col-md-10 col-md-offset-1 padding-leftright-null">
                        <div class="text padding-bottom-null">
                            <h5 class="heading  margin-bottom-extrasmall">{{__('app-terms.service_section.title')}}</h5>
                            <p>{{__('app-terms.service_section.description_1')}} <strong> {{__('app-terms.ussd_code')}}</strong> {{__('app-terms.service_section.description_2')}}</p>
                            <p>{{__('app-terms.service_section.description_3')}}</p>
                            <p class="margin-bottom-null">{{__('app-terms.service_section.description_4')}} </p>
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1 padding-leftright-null">
                        <div class="text padding-bottom-null">
                            <h5 class="heading  margin-bottom-extrasmall">{{__('app-terms.membership_terms_section.title')}}</h5>
                            <p class="margin-bottom-null">{{__('app-terms.membership_terms_section.description')}}</p>
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1 padding-leftright-null">
                        <div class="text padding-bottom-null">
                            <h5 class="heading  margin-bottom-extrasmall">{{__('app-terms.do_daktarbhai_section.title')}}</h5>
                            <h6 class="heading  margin-bottom-extrasmall">{{__('app-terms.do_daktarbhai_section.sub_title_1')}}</h6>
                            <p>{{__('app-terms.do_daktarbhai_section.description_1')}}</p>

                            <h6 class="heading  margin-bottom-extrasmall">{{__('app-terms.do_daktarbhai_section.sub_title_2')}}</h6>
                            <p>{{__('app-terms.do_daktarbhai_section.description_2')}}</p>

                            <h6 class="heading  margin-bottom-extrasmall">{{__('app-terms.do_daktarbhai_section.sub_title_3')}}</h6>
                            <p>{{__('app-terms.do_daktarbhai_section.description_3')}}</p>

                            <h6 class="heading  margin-bottom-extrasmall">{{__('app-terms.do_daktarbhai_section.sub_title_4')}}</h6>
                            <p class="margin-bottom-null">{{__('app-terms.do_daktarbhai_section.description_4')}}<strong> {{__('app-terms.ussd_code')}}</strong>.

                            <p class="margin-bottom-null">{{__('app-terms.do_daktarbhai_section.description_5')}}
                                <strong> {{__('app-terms.ussd_code')}}</strong>
                                {{__('app-terms.do_daktarbhai_section.send_email')}}
                                <strong> {{__('app-terms.do_daktarbhai_section.info_dakatarbhai')}}</strong>.
                                {{__('app-terms.do_daktarbhai_section.description_6')}}
                            </p>
                        </div>
                    </div>
                    {{--<div class="col-md-10 col-md-offset-1 padding-leftright-null">--}}
                        {{--<div class="text padding-bottom-null">--}}
                            {{--<h5 class="heading  margin-bottom-extrasmall">We are not your Doctors</h5>--}}
                            {{--<p>Whenever we use the words “your doctor” or “Healthcare provider” or similar words on Daktarbhai, including these terms of use, we mean your personal doctor within our panel, with whom you have mutually acknowledged doctor-patient relationship. Call center experts are not your doctors, physician, or healthcare provider; they are your gateway or guide to choosing the correct doctor/hospital for you.--}}
                            {{--</p>--}}
                            {{--<h6 class="heading  margin-bottom-extrasmall">Remember</h6>--}}
                            {{--<p>If you want to unsubscribe our services, you can dial USSD 16497/ *16497*2# from your ROBI, Teletalk numbers.--}}
                                {{--Consult us, if there is any kind of health related issues with our service by contacting us through our call center or send us an email. Daktarbhai will not responsible for anything out of our service list.</p>--}}

                            {{--<h6 class="heading  margin-bottom-extrasmall">However</h6>--}}

                            {{--<p><i class="ion-android-done-all"></i> If you have any personal questions about your medical condition or symptom then you should consult with your doctor, do contact us or ask a free question in our “Ask a Question”.</p>--}}
                            {{--<p class="margin-bottom-null"><i class="ion-android-done-all"></i> You should never disregard professional medical advice or delay seeking medical advice or treatment, because of something you read or learn on Daktarbhai service. You should rather call or contact us for the most related solution for yourself.</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="col-md-10 col-md-offset-1 padding-leftright-null">
                        <div class="text padding-bottom-null">
                            <h5 class="heading  margin-bottom-extrasmall">{{__('app-terms.membership_renewal_section.title')}}</h5>
                            <p>{{__('app-terms.membership_renewal_section.description')}}
                                {{--Annual membership renewal must be made within 30 days before the expiration of one’s membership date to continue receiving our benefits. The renewal fee is the same and payment will be accepted via the same means as before to continue receiving the benefits of the membership program. The fee can be paid by cash, cheque or online to Daktarbhai offices as per information given in the application or visit our website <a href="http://healthcare4umember.com">www.healthcare4umember.com</a> and <a href="http://hc4ubd.com">www.hc4ubd.com</a>.--}}
                            </p>

                            <h6 class="heading  margin-bottom-extrasmall"> {{__('app-terms.membership_renewal_section.un_subscription.title')}} </h6>
                            <ul class="trams">
                                <li>{{__('app-terms.membership_renewal_section.un_subscription.rule_1')}}</li>
                                <li>{{__('app-terms.membership_renewal_section.un_subscription.rule_2')}}</li>
                            </ul>

                            <h6 class="heading  margin-bottom-extrasmall">{{__('app-terms.membership_renewal_section.member_responsibility.title')}}</h6>
                            <p class="margin-bottom-extrasmall">{{__('app-terms.membership_renewal_section.member_responsibility.description')}}

                            <ul class="trams">
                                <li>{{__('app-terms.membership_renewal_section.member_responsibility.responsibility_1')}}</li>
                                <li>{{__('app-terms.membership_renewal_section.member_responsibility.responsibility_2')}}</li>
                                <li>{{__('app-terms.membership_renewal_section.member_responsibility.responsibility_3')}}</li>
                                <li>{{__('app-terms.membership_renewal_section.member_responsibility.responsibility_4')}}</li>
                                <li>{{__('app-terms.membership_renewal_section.member_responsibility.responsibility_5')}}</li>
                                <li>{{__('app-terms.membership_renewal_section.member_responsibility.responsibility_6')}}</li>
                                <li>{{__('app-terms.membership_renewal_section.member_responsibility.responsibility_7')}}</li>
                                <li>{{__('app-terms.membership_renewal_section.member_responsibility.responsibility_8')}}</li>
                                <li>{{__('app-terms.membership_renewal_section.member_responsibility.responsibility_9')}}</li>
                            </ul>

                            <p class="margin-bottom-extrasmall">{{__('app-terms.membership_renewal_section.member_responsibility.conclusion')}}

                            {{--<p class="margin-bottom-null">Members who fail to renew their membership will not be able to access the mobile application or members’ portal and use the benefits of their membership.</p>--}}
                        </div>
                    </div>
                    {{--<div class="col-md-10 col-md-offset-1 padding-leftright-null">--}}
                        {{--<div class="text padding-bottom-null">--}}
                            {{--<h5 class="heading  margin-bottom-extrasmall">Unsubscription </h5>--}}
                            {{--<ul class="trams">--}}
                                {{--<li>Subscribers at any point during the month, decides to unsubscribe, we will not return a refund for the features already paid for.</li>--}}
                                {{--<li>Unsubscribed members, at any point wishes to subscribe back, will again be charged the same amount for the features that they purchase.</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-10 col-md-offset-1 padding-leftright-null">--}}
                        {{--<div class="text padding-bottom-null">--}}
                            {{--<h5 class="heading  margin-bottom-extrasmall">Lost or Damaged Membership Card</h5>--}}
                            {{--<p class="margin-bottom-null">In case of lost or damaged card, please inform Daktarbhai for a new card. There will be a penalty charge of Tk. 400 (USD 5.00).</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-10 col-md-offset-1 padding-leftright-null">--}}
                        {{--<div class="text padding-bottom-null">--}}
                            {{--<h5 class="heading  margin-bottom-extrasmall">Member's Responsibility</h5>--}}
                            {{--<p>As a member of Daktarbhai program you have the following responsibilities:</p>--}}
                            {{--<ul class="trams">--}}
                                {{--<li>Review and understand the information you receive about your healthcare benefit plan.</li>--}}
                                {{--<li>Please call ‘Customer Service’ or contact us via email, when you have questions or concerns.</li>--}}
                                {{--<li>Understand how to obtain services and supplies that are covered under your plan.</li>--}}
                                {{--<li>Show your membership card or the member ‘E-Card’ at panel hospital/diagnostic centers through Daktarbhai application to receive membership benefits.</li>--}}
                                {{--<li>Understand your health condition and work with your doctor to develop treatment goals that you both agree upon.</li>--}}
                                {{--<li>Provide honest, complete information to the healthcare professionals for your best care.</li>--}}
                                {{--<li>Know what medicine(s) you take, why and how to take it.</li>--}}
                                {{--<li>Pay all fees for which you are responsible at the time of service renewal/render or when the payment is due.</li>--}}
                                {{--<li>Voice your opinions, concerns or complaints to Daktarbhai customer service and/or your healthcare professional.</li>--}}
                                {{--<p>Ensure that you update your personal healthcare record in the members’ portal immediately with care and continue to update the changes in your health status.</p>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="col-md-10 col-md-offset-1 padding-leftright-null">
                        <div class="text padding-bottom-null">
                            <h5 class="heading  margin-bottom-extrasmall">{{__('app-terms.e-phr.title')}}</h5>
                            <p>{{__('app-terms.e-phr.description')}}</p>
                            <p>{{__('app-terms.e-phr.tips.title')}}</p>
                            <p>{{__('app-terms.e-phr.tips.description')}}</p>
                            {{--<p>Good medical records are an indication of good practice and good patient care. Having a comprehensive personal healthcare record is not difficult if every individual takes the responsibility to maintain and update the required information on a regular basis. When it comes to medicine, ‘empowerment’ is the watchword - you must take charge of your own health and your loved ones. Neither one will ever care as much about you as much as you do nor will anyone ever pay as much attention to your medical care and needs, as you will and can. A well-maintained personal healthcare record is your first and most important step to maintain as high a standard of one’s health. Daktarbhai is making it as simple as possible by creating this simple menu driven personal healthcare record for its members to update and maintain it. You can do this for yourself and for all your family members. Life gets a lot simpler when you maintain a good practice of regularly updating your healthcare records, especially when you visit a doctor. A member is solely responsible to get his/her medical records from their treating doctor or service provider. In managing your own healthcare records the following tips as below, would be useful:</p>--}}
                            <ul class="trams">
                                <li>{{__('app-terms.e-phr.tips.tips_1')}}</li>
                                <li>{{__('app-terms.e-phr.tips.tips_2')}}</li>
                                <li>{{__('app-terms.e-phr.tips.tips_3')}}</li>
                                <li>{{__('app-terms.e-phr.tips.tips_4')}}</li>
                            </ul>
                            <br>
                            <h6 class="heading  margin-bottom-extrasmall">{{__('app-terms.e-phr.life_insurance.title')}}</h6>
                            <h6 class="heading  margin-bottom-extrasmall" style="font-style: italic">{{__('app-terms.e-phr.life_insurance.exemption_health_insurance.title')}}</h6>
                            <p class="margin-bottom-extrasmall">{{__('app-terms.e-phr.life_insurance.exemption_health_insurance.description')}}</p>
                            <ul class="trams">
                                <li>{{__('app-terms.e-phr.life_insurance.exemption_health_insurance.rule_1')}}</li>
                                <li>{{__('app-terms.e-phr.life_insurance.exemption_health_insurance.rule_2')}}</li>
                                <li>{{__('app-terms.e-phr.life_insurance.exemption_health_insurance.rule_3')}}</li>
                                <li>{{__('app-terms.e-phr.life_insurance.exemption_health_insurance.rule_4')}}</li>
                                <li>{{__('app-terms.e-phr.life_insurance.exemption_health_insurance.rule_5')}}</li>
                                <li>{{__('app-terms.e-phr.life_insurance.exemption_health_insurance.rule_6')}}</li>
                                <li>{{__('app-terms.e-phr.life_insurance.exemption_health_insurance.rule_7')}}</li>
                                <li>{{__('app-terms.e-phr.life_insurance.exemption_health_insurance.rule_8')}}</li>
                                <li>{{__('app-terms.e-phr.life_insurance.exemption_health_insurance.rule_9')}}</li>
                                <li>{{__('app-terms.e-phr.life_insurance.exemption_health_insurance.rule_10')}}</li>
                                <li>{{__('app-terms.e-phr.life_insurance.exemption_health_insurance.rule_11')}}</li>
                                <li>{{__('app-terms.e-phr.life_insurance.exemption_health_insurance.rule_12')}}</li>
                            </ul>

                            <h6 class="heading  margin-bottom-extrasmall" style="font-style: italic">{{__('app-terms.e-phr.life_insurance.exemption_life_insurance.title')}}</h6>
                            <ul class="trams">
                                <li>{{__('app-terms.e-phr.life_insurance.exemption_life_insurance.rule_1')}}</li>
                                <li>{{__('app-terms.e-phr.life_insurance.exemption_life_insurance.rule_2')}}</li>
                                <li>{{__('app-terms.e-phr.life_insurance.exemption_life_insurance.rule_3')}}</li>
                            </ul>
                            {{--<p class="text-center text-bold block margin-bottom-null">Knowledge is power!</p>--}}
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1 padding-leftright-null">
                        <div class="text">
                            {{--<h5 class="heading  margin-bottom-extrasmall">Your Account and the use of Daktarbhai</h5>--}}
                            {{--<h6 class="heading  margin-bottom-extrasmall">You are Responsible for Your Account</h6>--}}
                            {{--<p>Daktarbhai needs accurate information to complete the registration. The password and security responsibility for your account is only your responsibility. If you face any problem including your password and account related issues you should notify us about it immediately.</p>--}}
                            {{--<h6 class="heading  margin-bottom-extrasmall">Your Use have to be for legal purpose</h6>--}}
                            {{--<p>Daktarbhai will use your personal information in a secured manner. Daktarbhai has implemented various encryption and security technologies and some procedures to protect you from unauthorized access. Electronic procedural safeguards are used here to limit the access of your personal information to our employees. You are completely responsible for the complete access of your username and password. Daktarbhai reserves the right to revoke or deactivate your username and password at any time when there is a violation of code or your are being a threat to us.</p>--}}
                            {{--<h6 class="heading  margin-bottom-extrasmall">Daktarbhai Notifications and Informations</h6>--}}
                            {{--<p>After updating information in Daktarbhai mobile application and web portal service, we will definitely notify you in your notification bar. We will reach out to you via email and notification after updating our applications and web page.</p>--}}
                            {{--<h6 class="heading  margin-bottom-extrasmall">Acceptance of these Terms</h6>--}}
                            {{--<p>Generally, these terms and conditions governs the use of this applications. Other terms may apply to your use of a specific feature or parts of our application. If there is a conflict between these TOU (Terms of Use) and terms posted for a specific feature(s) or part(s), the latter terms apply to your use of that feature(s) or part(s).</p>--}}

                            <h5 class="heading  margin-bottom-extrasmall">{{__('app-terms.user_section.title')}}</h5>
                            <h6 class="heading  margin-bottom-extrasmall">{{__('app-terms.user_section.account_responsibility.title')}}</h6>
                            <p>{{__('app-terms.user_section.account_responsibility.description')}}</p>
                            <h6 class="heading  margin-bottom-extrasmall">{{__('app-terms.user_section.legal_purpose.title')}}</h6>
                            <p>{{__('app-terms.user_section.legal_purpose.description')}}</p>
                            <h6 class="heading  margin-bottom-extrasmall">{{__('app-terms.user_section.acceptance_terms.title')}}</h6>
                            <p>{{__('app-terms.user_section.acceptance_terms.description')}}</p>
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1 padding-leftright-null">
                        <div class="text">
                            <h5 class="heading  margin-bottom-extrasmall">{{__('app-terms.bkash_section.title')}}</h5>
                            <h6 class="heading  margin-bottom-extrasmall">{{__('app-terms.bkash_section.service_name.title')}}</h6>
                            <ol>
                                <li>{{__('app-terms.bkash_section.service_name.service1')}}</li>
                                <li>{{__('app-terms.bkash_section.service_name.service2')}}</li>
                            </ol>
                            <h6 class="heading  margin-bottom-extrasmall">{{__('app-terms.bkash_section.note_for_telemedicine.title')}}</h6>
                            <ol>
                                <li>{{__('app-terms.bkash_section.note_for_telemedicine.note1')}}</li>
                                <li>{{__('app-terms.bkash_section.note_for_telemedicine.note2')}}</li>
                                <li>{{__('app-terms.bkash_section.note_for_telemedicine.note3')}}</li>
                                <li>{{__('app-terms.bkash_section.note_for_telemedicine.note4')}}</li>
                            </ol>
                            <h6 class="heading  margin-bottom-extrasmall">{{__('app-terms.bkash_section.note_for_sample_collection.title')}}</h6>
                            <ol>
                                <li>{{__('app-terms.bkash_section.note_for_sample_collection.note1')}}</li>
                                <li>{{__('app-terms.bkash_section.note_for_sample_collection.note2')}}</li>
                                <li>{{__('app-terms.bkash_section.note_for_sample_collection.note3')}}</li>
                                <li>{{__('app-terms.bkash_section.note_for_sample_collection.note4')}}</li>
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
