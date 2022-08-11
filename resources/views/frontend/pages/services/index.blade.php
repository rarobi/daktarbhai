@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Services | ' . app_name()  !!}
@endsection

<style>
    p {
        color: #2F2F2F !important;
    }
</style>

@section('page-header-class', 'header-static')

@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap row dir-bg">
        <div class="col-md-12 padding-leftright-null">
            <!-- ————————————————————————————————————————————
            ———	Find Doctor Start here
            —————————————————————————————————————————————— -->
            <section class="health-directory-page doctor page padding-md doctor-pd" style="padding: 130px 0 100px 0 !important;">
                <div class="container">
                    <h2 class="text-center padding-top-null white margin-bottom-small" style="font-weight: 800">
                        {{__('home.services.our')}} {{__('home.services.services')}}
                    </h2>
                    <p class="heading white text-center" style="font-weight: 500; font-size: 20px">{{__('home.services.title')}}</p>
                </div>
            </section>
        </div>
    </div>
        <div id="home-wrap" class="content-section fullpage-wrap about-page grey-background">
            <div class="row">
                <!-- ————————————————————————————————————————————
                ———	About us content
                —————————————————————————————————————————————— -->
                <div class="col-md-12">
                    <div class="text padding-bottom-null">
                        <h3 class="grey big margin-bottom-small" style="color: #F7941E !important;">{{__('home.services.our')}} <span>{{__('home.services.services')}}</span></h3>
                        <p class="margin-bottom-null">{{__('home.services.description')}} </p>
                    </div>
                </div>
            </div>
            <div class="row no-margin text new-services grey-background">
              <div class="col-md-12 padding-leftright-null">
                <div class="col-md-3">
                  <a href="{!! route('frontend.personal_health_report') !!}" alt="">
                  <div class="services-bg-white">
                      <div class="icon-area">
                        <img src="{!! asset('assets/img/profile/appointment-history.png') !!}" alt="">
                      </div>
                      <h1>{{__('home.health_record.title')}}</h1>
                      <p>{{__('home.health_record.description')}}
                      </p>
                  </div>
                  </a>
                </div>
                <div class="col-md-3">
                  <a href="{!! route('frontend.ask_doctor') !!}" alt="">
                    <div class="services-bg-white">
                      <div class="icon-area">
{{--                        <img src="{!! asset('assets/img/services-1.png') !!}" alt="">--}}
                        <img src="{!! asset('assets/img/services/ask-doctor.png') !!}" alt="">
                      </div>
                      <h1>{{__('home.ask_doctor.title')}}</h1>
                      <p>{{__('home.ask_doctor.description')}}
                      </p>
                    </div>
                    </a>
                </div>
                <div class="col-md-3">
                  <a href="{!! route('frontend.doctor.index') !!}" alt="">
                    <div class="services-bg-white">
                      <div class="icon-area">
{{--                        <img src="{!! asset('assets/img/services-2.png') !!}" alt="">--}}
                        <img src="{!! asset('assets/img/services/book-appointment.png') !!}" alt="">
                      </div>
                      <h1>{{__('home.book_appointment.title')}}</h1>
                      <p>{{__('home.book_appointment.description')}}
                      </p>
                    </div>
                  </a>
                </div>
                <div class="col-md-3">
                  <a href="{!! route('frontend.health_directory') !!}" alt="">
                    <div class="services-bg-white">
                        <div class="icon-area">
{{--                          <img src="{!! asset('assets/img/services-4.png') !!}" alt="">--}}
                          <img src="{!! asset('assets/img/services/health-directory.png') !!}" alt="">
                        </div>
                        <h1>{{__('home.health_directory.title')}}</h1>
                        <p>{{__('home.health_directory.description')}}
                        </p>
                    </div>
                  </a>
                </div>
              </div>
            <div class="col-md-12 padding-leftright-null">
              <div class="col-md-3">
                <a href="{!! route('frontend.health-insurance') !!}" class="link">
                  <div class="services-bg-white">
                      <div class="icon-area">
{{--                        <img src="{!! asset('assets/img/hos-discount.png') !!}" alt="">--}}
{{--                        <img src="{!! asset('assets/img/discount.png') !!}" alt="">--}}
                          <img src="{!! asset('assets/img/services/ins-claim.png') !!}" alt="">
                      </div>
                      <h1>{{__('home.health_insurance.title')}}</h1>
                      <p>{{__('home.health_insurance.description')}}
                      </p>
                  </div>
                </a>
              </div>
              <div class="col-md-3">
                <a href="{!! route('frontend.hospital.index') !!}" class="link">
                  <div class="services-bg-white">
                      <div class="icon-area">
{{--                        <img src="{!! asset('assets/img/hos-discount.png') !!}" alt="">--}}
                        <img src="{!! asset('assets/img/services/discount.png') !!}" alt="">
                      </div>
                      <h1>{{__('home.discount_facility.title')}}</h1>
                      <p>{{__('home.discount_facility.description')}}
                      </p>
                  </div>
                </a>
              </div>
              {{--<div class="col-md-3">--}}
                {{--<a href="{!! route('frontend.health_tourism') !!}" class="link">--}}
                  {{--<div class="services-bg-white">--}}
                    {{--<div class="icon-area">--}}
                      {{--<img src="{!! asset('assets/img/health-t.png') !!}" alt="">--}}
                    {{--</div>--}}
                    {{--<h1>Health Tourism</h1>--}}
                    {{--<p>We will take you through every step to avail treatment internationally.--}}
                    {{--</p>--}}
                  {{--</div>--}}
                {{--</a>--}}
              {{--</div>--}}
              {{--<div class="col-md-3">--}}
                {{--<a href="{!! route('frontend.health_package') !!}" class="link">--}}
                  {{--<div class="services-bg-white">--}}
                    {{--<div class="icon-area">--}}
                      {{--<img src="{!! asset('assets/img/health-package.png') !!}" alt="">--}}
                    {{--</div>--}}
                    {{--<h1>Health Package</h1>--}}
                    {{--<p>You can easily pick a preferred health package for you and your family.--}}
                    {{--</p>--}}
                  {{--</div>--}}
                {{--</a>--}}
              {{--</div>--}}
            </div>
          </div>
            <!-- ————————————————————————————————————————————
            ———	Services Start Here
            —————————————————————————————————————————————— -->

            <!-- <div id="showcase-projects" class="related-projects row margin-leftright-null home-services">
                <div class="col-md-12 text padding-bottom-null">
                    <section class="showcase">
                        <div class="item col-md-4">
                            <div class="showcase-project ">
                                <img src="{!! asset('assets/img/item3.jpg') !!}" alt="Personal Health Report">
                                <div class="content">
                                                <span class="read">
                                                    <i class="ion-clipboard"></i>
                                                </span>
                                    <h6 class="heading black">Personal Health Record (PHR)</h6>
                                    <p class="heading margin-null">  Track your health status from anywhere with a few clicks.</p>
                                </div>
                                <a href="{!! route('frontend.personal_health_report') !!}"  class="link"></a>
                            </div>
                        </div>
                        <div class="item col-md-4">
                            <div class="showcase-project ">
                                <img src="{!! asset('assets/img/item-6.jpg') !!}" alt="Book Appoinment">
                                <div class="content">
                                                <span class="read">
                                                    <i class="ion-calendar">add</i>
                                                </span>
                                    <h6 class="heading black">Book Appoinment</h6>
                                    <p class="heading margin-null">Don’t miss out on anything while waiting to see a doctor. </p>
                                </div>
                                <a href="{!! route('frontend.doctor.index') !!}" class="link"></a>
                            </div>
                        </div>
                        <div class="item col-md-4">
                            <div class="showcase-project ">
                                <img src="{!! asset('assets/img/ask-a-doc.jpg') !!}" alt="Ask a Doctor">
                                <div class="content">
                                            <span class="read">
                                                <i class="ion-person-stalker">add</i>
                                            </span>
                                    <h6 class="heading black">Ask a Doctor</h6>
                                    <p class="heading margin-null">If you have any medical quarries, ask a free question using ‘Ask a Question’.</p>
                                </div>
                                <a href="{!! route('frontend.ask_doctor') !!}" class="link"></a>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-12 text padding-bottom-null padding-top-null">
                    <section class="showcase">
                        <div class="item col-md-4">
                            <div class="showcase-project ">
                                <img src="{!! asset('assets/img/hospital-discount.jpg') !!}" alt="Hospital Discount">
                                <div class="content">
                                                <span class="read">
                                                    <i class="ion-ios-pricetags-outline">add</i>
                                                </span>
                                    <h6 class="heading black">Hospital Discount</h6>
                                    <p class="heading margin-null">Stop worrying and start enjoy discounts by becoming a member</p>
                                </div>
                                <a href="{!! route('frontend.hospital.index') !!}" class="link"></a>
                            </div>
                        </div>
                        <div class="item col-md-4">
                            <div class="showcase-project ">
                                <img src="{!! asset('assets/img/item5.jpg') !!}" alt="Health Tourism">
                                <div class="content">
                                                <span class="read">
                                                    <i class="ion-model-s">add</i>
                                                </span>
                                    <h6 class="heading black">Health Tourism</h6>
                                    <p class="heading margin-null"> We will take you through every step to avail treatment internationally</p>
                                </div>
                                <a href="{!! route('frontend.health_tourism') !!}" class="link"></a>
                            </div>
                        </div>
                        <div class="item col-md-4">
                            <div class="showcase-project ">
                                <img src="{!! asset('assets/img/h-pack.jpg') !!}" alt="Health Package">
                                <div class="content">
                                                <span class="read">
                                                    <i class="ion-person-stalker">add</i>
                                                </span>
                                    <h6 class="heading black">Health Package</h6>
                                    <p class="heading margin-null">You can easily pick a preferred health package for you and your family</p>
                                </div>
                                <a href="{!! route('frontend.health_package') !!}" class="link"></a>
                            </div>
                        </div>
                    </section>
                </div>

            </div> -->

            <!-- ————————————————————————————————————————————
            ———	Services End
            —————————————————————————————————————————————— -->

        </div>
@endsection

@section('before-scripts-end')

@endsection
