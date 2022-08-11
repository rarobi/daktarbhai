@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Health Tourism | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('content')
            <div id="home-wrap" class="content-section fullpage-wrap medical-tourism-bg">
                <div class="row margin-leftright-null">
                    <!-- ————————————————————————————————————————————
                    ———	Medical Tourism content
                    —————————————————————————————————————————————— -->
                    <section class="doctor page padding-md">
                        <div class="container">
                            <h2 class="text-center padding-top-null white">
                                Medical Tourism
                            </h2>
                            <p class="heading white text-center">Go Around the Globe with Daktarbhai!<br>You choose the country, we provide you with the services.</p>
                        </div>
                    </section>
                </div>
            </div>
            <div id="home-wrap" class="content-section fullpage-wrap about-page">
                <div class="row margin-leftright-null">
                    <!-- ————————————————————————————————————————————
                    ———	Medical Tourism content
                    —————————————————————————————————————————————— -->
                    <div class="col-md-12 padding-leftright-null">
                        <div data-responsive="parent-height" data-responsive-id="dev" class="text">
                            <h3 class="grey big margin-bottom-small">Medical <span class="brand-color">Tourism</span></h3>
                            <p class="medical-tourism first-p">Daktarbhai is a groundbreaking initiative to facilitate the next generation of healthcare for Bangladesh. At Daktarbhai we offer an online based doctors’ appointment service with the facility of an electronic personal health record system, the first of its kind in our country, on both Web and Mobile app platforms. The state-of- the-art IT platform is designed to empower people to take charge of their own health using mHealth. The integration of health-care seekers with healthcare providers such as hospitals &amp; doctors and subsequent discount offers under one umbrella provides a great opportunity for a paperless and cashless treatment process for every individual under the universal wellness program.</p>
                        </div>
                    </div>
                    <div class="col-md-6 padding-leftright-null">
                        <div data-responsive="parent-height" data-responsive-id="dev" class="text">
                            <h3 class="grey big margin-bottom-small m-t-lg"><span class="brand-color title-thin">India</span></h3>
                            <ul class="medical-tourism-list">
                                <li><i class="ion-android-done-all active"></i>Online  form  fill up</li>
                                <li><i class="ion-android-done-all active"></i>Medical Visa Letter  Processing</li>
                                <li><i class="ion-android-done-all active"></i>Treatment plan which includes doctor consult, pathological test, operation.</li>
                                <li><i class="ion-android-done-all active"></i>Prepare packages according to patient requirement.</li>
                                <li><i class="ion-android-done-all active"></i>Schedule doctor’s appointment</li>
                                <li><i class="ion-android-done-all active"></i>Travel ticket processing(Air, Bus, Train)</li>
                                <li><i class="ion-android-done-all active"></i>Provide medical guide</li>
                                <li><i class="ion-android-done-all active"></i>Arrange  accommodation</li>
                                <li><i class="ion-android-done-all active"></i>Telemedicine  support (follow up)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 padding-leftright-null">
                        <div data-responsive="child-height" data-responsive-id="dev" class="bg-img" style="background-image:url({!! asset('assets/img/india.png') !!})"></div>
                    </div>
                </div>
                <div class="row margin-leftright-null flex-order-md">
                    <div class="col-md-6 padding-leftright-null flex-column-push-md">
                        <div data-responsive="child-height" data-responsive-id="strategy" class="bg-img" style="background-image:url({!! asset('assets/img/malaysia.png') !!})"></div>
                    </div>
                    <div class="col-md-6 padding-leftright-null flex-column-pull-md">
                        <div data-responsive="parent-height" data-responsive-id="strategy" class="row">
                            <div class="col-md-12">
                                <div class="text">
                                    <h3 class="grey big margin-bottom-small"><span class="brand-color title-thin">Malaysia</span></h3>
                                    <ul class="medical-tourism-list">
                                        <li><i class="ion-android-done-all active"></i>Invitation letter</li>
                                        <li><i class="ion-android-done-all active"></i>Doctor appointment</li>
                                        <li><i class="ion-android-done-all active"></i>Second consultation (Follow up)</li>
                                        <li><i class="ion-android-done-all active"></i>Arrange accommodation for attendant</li>
                                        <li><i class="ion-android-done-all active"></i>Medical visa processing</li>
                                        <li><i class="ion-android-done-all active"></i>Travel ticket processing</li>
                                        <li><i class="ion-android-done-all active"></i>Airport transfer</li>
                                        <li><i class="ion-android-done-all active"></i>Air ambulance(emergency case)</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row margin-leftright-null">
                    <div class="col-md-6 padding-leftright-null">
                        <div data-responsive="parent-height" data-responsive-id="dev" class="text">
                            <div class="padding-onlytop-null">
                                <h3 class="grey big margin-bottom-small"><span class="brand-color title-thin">Singapore</span></h3>
                                <ul class="medical-tourism-list">
                                    <li><i class="ion-android-done-all active"></i>Invitation letter</li>
                                    <li><i class="ion-android-done-all active"></i>Doctor appointment</li>
                                    <li><i class="ion-android-done-all active"></i>Arrange accommodation for attendant</li>
                                    <li><i class="ion-android-done-all active"></i>Medical visa processing</li>
                                    <li><i class="ion-android-done-all active"></i>Travel ticket processing</li>
                                    <li><i class="ion-android-done-all active"></i>Airport transfer</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 padding-leftright-null">
                        <div data-responsive="child-height" data-responsive-id="dev" class="bg-img" style="background-image:url({!! asset('assets/img/singapur.png') !!})"></div>
                    </div>
                </div>
                <div class="row padding-md margin-leftright-null medical-tourism-bottom">
                    <div class="col-md-12 text-center">
                        <h3 class="big title-thin">For any query Call Us at </h3>
                        <h3 class="big text-bold">16643</h3>
                        <a href="{!! route('frontend.contact') !!}"  class="btn-alt small active doc-btn">Contact Us</a>
                    </div>
                </div>
            </div>
@endsection
