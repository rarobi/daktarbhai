@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Health Insurance | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('content')
            <div id="home-wrap" class="content-section fullpage-wrap row health-insurance-bg">
                <div class="col-md-12 padding-leftright-null">

                    <section class="doctor page padding-md">
                      <div class="container">
                          <h2 class="text-center padding-top-null white">
                          {{__('insurance.header.title')}}
                          </h2>
                          <p class="heading white text-center"> {{__('insurance.header.text')}}</p>
                      </div>
                  </section>
                </div>
            </div>
            <div id="home-wrap" class="content-section fullpage-wrap about-page health-package">
                    <div class="row no-margin bottom-shadow health-insurance">
                        <div class="col-md-12 padding-leftright-null">
                            <!-- <div class="col-md-12 padding-leftright-null health-intro">
                                <div class="text padding-md-bottom-null">
                                    <h3 class="grey big margin-bottom-small">Health Insurance</h3>
                                    <p class="justi">
                                        It is widely known that, the secret of a healthy organization is a fit workforce. By creating a positive, safe and healthy environment for employees, you can increase morale, improve your employees’ work-life balance and, in turn, positively impact your business. The obvious benefit of having a healthy workforce is that healthier employees are absent less often.<br><br>
                                    </p>
                                    <p class="justi">
                                        We, at DAKTARBHAI, offer a handful of corporate packages which have been designed carefully to tackle such issues. So, why not have a look at these packages and take the first step towards ensuring a healthy organization?
                                    </p>
                                </div>
                            </div> -->
                            <div class="col-md-1"></div>
                            <div class="col-md-9 padding-leftright-null">
                                <div class="text padding-md-bottom-null cor-pack">
                                    <!--<h2 class="small">Personal Health Record (PHR)</h2>-->
                                    <table class="table">
                                        <tbody class="insurance-bg">
                                            <tr>
                                                <th class="text-center text-uppercase">{{__('insurance.hospital_cash.title')}}</th>
                                                <th class="text-center text-bold text-uppercase"></th>
                                            </tr>
                                            <tr>
                                                <td > <i class="ion-android-done-all active"></i>{{__('insurance.hospital_cash.per_night')}} </td>
                                                <td class="text-center text-bold text-uppercase"></td>
                                            </tr>
                                             <tr>
                                               <td> <i class="ion-android-done-all active"></i>{{__('insurance.hospital_cash.duration')}}  </td>

                                                <!-- <td class="text-center text-bold text-uppercase">৳ 12000 /=</td> -->
                                            </tr>
                                            <tr>
                                                <td class=""> <i class="ion-android-done-all active"></i>{{__('insurance.hospital_cash.maximum_nights')}} </td>
                                                <td class=""></td>
                                            </tr>
                                        </tbody>
                                        </table>
                                        <table>
                                        <tbody>

                                            <tr>
                                                <th class="text-center text-uppercase">{{__('insurance.Accidental_cash.title')}}</th>
                                                <th class="text-center text-bold text-uppercase"></th>
                                            </tr>

                                            {{--<tr>--}}
                                                {{--<td>  <i class="ion-android-done-all active"></i> Can claim bills for Diagnostic Tests if prescribed by doctor</td>--}}
                                                {{--<td class="text-center text-bold text-uppercase"></td>--}}
                                            {{--</tr>--}}
                                            <tr>
                                                <td>  <i class="ion-android-done-all active"></i>   {{__('insurance.Accidental_cash.maximum_nights')}}</td>
                                                <td class="text-center text-bold text-uppercase"></td>
                                            </tr>
                                            {{--<tr>--}}
                                                {{--<td>  <i class="ion-android-done-all active"></i>{{__('insurance.table.td_5')}}</td>--}}
                                                {{--<td class="text-center text-bold text-uppercase"></td>--}}
                                            {{--</tr>--}}
                                        </tbody>
                                        </table>
                                        <table>
                                        <tbody>
                                            <tr>
                                                <th class="text-center text-uppercase">{{__('insurance.life_insurance.title')}} </th>
                                                <th class="text-center text-bold text-uppercase"></th>
                                            </tr>
                                            <tr>
                                                <td class=""><i class="ion-android-done-all active"></i>{{__('insurance.life_insurance.coverage')}} </td>
                                                <!-- <td class="text-center text-bold text-uppercase">  ৳ 25000/=</td> -->
                                            </tr>
                                            <tr>
                                                <td class=""><i class="ion-android-done-all active"></i>{{__('insurance.life_insurance.not_covered')}}</td>
                                                <!-- <td class="text-center text-bold text-uppercase">  ৳ 25000/=</td> -->
                                            </tr>
                                        </tbody>
                                    </table>
                                    {{--<span class="insurance-note">* Hospital Cash Back, Diagnostic Test Cash Back and Free Life Insurance will be underwritten by Pragati Life Insurance Ltd. </span>--}}
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                            {{--<div class="col-md-4 padding-leftright-null">--}}
                                {{--<div class="text padding-md-bottom-null ">--}}
                                  {{--<div class="health-insurance-side">--}}
                                    {{--<div class="inner-sidebar">--}}
                                      {{--<h3>{{__('insurance.sidebar.text')}}</h3>--}}
                                      {{--<a href="{!! route('frontend.subscription.plan') !!}" class="btn-alt small active doc-btn">{{__('insurance.sidebar.btn')}}</a>--}}
                                    {{--</div>--}}
                                  {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                    <section class="page padding-md padding-bottom-null grey-bg">
                        <div class="row no-margin insurance-process">
                            <div class="col-md-12 services-box how-it-works">
                              <h1 class="text-center claim-title">{{__('insurance.claim_process.title')}}</h1>
                                <div class="col-md-4">
                                    <div class="insurance-info margin-md-bottom text-center">
                                      <span class="insurance-step">{{__('insurance.claim_process.step_1')}}</span>
                                        <img src="assets/img/step-1.png" alt="Search" width="100px">
                                        <p> {{__('insurance.claim_process.step_1_description')}} <br>
                                        <!-- a.       Customer or nominee sends the image of Hospital Discharge Certificate and other required documents via Daktarbhai app, web or email<br>
                                      b.      If called at 16643 hotline, the customer service agent will guide the claimant about how to proceed and apply -->
                                      </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="insurance-info margin-md-bottom text-center">
                                        <span class="insurance-step">{{__('insurance.claim_process.step_2')}}</span>
                                        <img src="assets/img/step-2.png" alt="Book" width="100px">
                                        <p>{{__('insurance.claim_process.step_2_description')}} </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="insurance-info margin-md-bottom text-center">
                                        <span class="insurance-step">{{__('insurance.claim_process.step_3')}}</span>
                                        <img src="assets/img/step-3.png" alt="Get Well Soon" width="100px">
                                        <p> {{__('insurance.claim_process.step_3_description')}}  </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
@endsection
