@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Health Insurance | ' . app_name()  !!}
@endsection

@section('after-styles')
    <style>
        table{
            text-align: center;
            width: 100%;
            /*display: block !important;*/
        }

        .table {
            border-spacing: 3px 0;
            border-collapse: separate;
            border: none !important;
        }

        table th{
            background: #36B7B4 !important;
            font-weight: 500;
            font-size: 16px;
            border: 0.5px solid #36B7B4 !important;
        }

       table td{
            border: 0.5px solid #36B7B4 !important;

        }

        table tbody {
            background-color: #fff;
        }

        .package{
           padding-left: 0 !important;
           padding-right: 0 !important;
        }

        .note{
            font-size: 14px;
            bottom: 10px;
            line-height: 15px;
        }
        ul li{
            font-size: 13px;
            line-height: 20px;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
@endsection

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
                        {{__('insurance.header.title')}}
                    </h2>
                    <p class="heading white text-center" style="font-weight: 500; font-size: 20px">{{__('insurance.header.text')}}</p>
                </div>
            </section>
        </div>
    </div>


    <div id="home-wrap" class="fullpage-wrap about-page health-package">

        <br><br>
        <div class="row margin-left-null">
            <div class="col-md-1"></div>
            <div class="col-md-10 package">
                <div class="padding-md-bottom-null">
                    <!--<h2 class="small">Personal Health Record (PHR)</h2>-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class=" table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th class="col text-center">{{__('claim_insurance.banglalink-package-details.table.title.plan')}}</th>
                                        <th class="col text-center">{{__('claim_insurance.banglalink-package-details.table.title.daily')}}</th>
                                        <th class="col text-center">{{__('claim_insurance.banglalink-package-details.table.title.monthly')}}</th>
                                        <th class="col text-center">{{__('claim_insurance.banglalink-package-details.table.title.yearly')}}</th>
                                    </tr>
                                    <tr>
                                        <td>{{__('claim_insurance.banglalink-package-details.table.tbody.hospitalization_coverage')}}
                                        </td>
                                        <td>
                                            <a href="#banglalink-daily-package-details" class="daily-plan-details">{{__('claim_insurance.banglalink-package-details.table.tbody.month_usage')}}</a>
                                            {{--<button class="premium-btn btn-sm daily-plan-details">Details</button>--}}
                                        </td>
                                        <td>{{__('claim_insurance.banglalink-package-details.table.tbody.30000_year')}}
                                        </td>
                                        <td>{{__('claim_insurance.banglalink-package-details.table.tbody.30000_year')}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            {{__('claim_insurance.banglalink-package-details.table.tbody.accidental_reimbursement')}}
                                        </td>
                                        <td>
                                            <a href="#banglalink-daily-package-details" class="daily-plan-details">{{__('claim_insurance.banglalink-package-details.table.tbody.month_usage')}}</a>
                                            {{--<button class="premium-btn btn-sm daily-plan-details">Details</button>--}}
                                        </td>
                                        <td>{{__('claim_insurance.banglalink-package-details.table.tbody.5000_year')}}
                                        </td>
                                        <td>{{__('claim_insurance.banglalink-package-details.table.tbody.5000_year')}}
                                    </tr>
                                    <tr>
                                        <td>
                                            {{__('claim_insurance.banglalink-package-details.table.title.life_insurance')}}
                                        </td>
                                        <td>
                                            <a href="#banglalink-daily-package-details" class="daily-plan-details">{{__('claim_insurance.banglalink-package-details.table.tbody.month_usage')}}</a>
                                            {{--<button class="premium-btn btn-sm daily-plan-details">Details</button>--}}
                                        </td>
                                        <td>{{__('claim_insurance.banglalink-package-details.table.tbody.10000_tk')}}</td>
                                        <td>{{__('claim_insurance.banglalink-package-details.table.tbody.10000_tk')}}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row margin-left-null">
                        <div  id="banglalink-daily-package-details">
                            <div class="row">
                                <div class="col-md-12 margin-bottom-small">
                                    <h5 class="">
                                        {{__('claim_insurance.banglalink-package-details.insurance_coverage_title')}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12 padding-leftright-null">
                                <div class="text padding-md-bottom-null table-responsive">
                                    <!--<h2 class="small">Personal Health Record (PHR)</h2>-->
                                    <table class="table ">
                                        <tbody>
                                        <tr>
                                            <th class="text-center">{{__('claim_insurance.banglalink-package-details.table.title.monthly_deduction')}} </th>
                                            <th class="text-center">{{__('claim_insurance.banglalink-package-details.table.tbody.life_insurance')}}</th>
                                            <th class="text-center">{{__('claim_insurance.banglalink-package-details.table.tbody.hospitalization_coverage')}}
                                                &nbsp;&nbsp;&nbsp; {{__('claim_insurance.banglalink-package-details.table.tbody.one_month')}}
                                            </th>
                                            <th class="text-center">{{__('claim_insurance.banglalink-package-details.table.tbody.accidental_reimbursement')}}
                                               &nbsp;&nbsp;&nbsp;{{__('claim_insurance.banglalink-package-details.table.tbody.one_month')}}
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>{{__('claim_insurance.banglalink-package-details.table.tbody.2 – 18')}} (+{{__('claim_insurance.banglalink-package-details.table.tbody.tax')}})</td>
                                            <td>৳{{__('claim_insurance.banglalink-package-details.table.tbody.10000')}}</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>{{__('claim_insurance.banglalink-package-details.table.tbody.20 – 28')}} (+{{__('claim_insurance.banglalink-package-details.table.tbody.tax')}})</td>
                                            <td>৳{{__('claim_insurance.banglalink-package-details.table.tbody.10000')}}</td>
                                            <td>৳{{__('claim_insurance.banglalink-package-details.table.tbody.10000')}}</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>{{__('claim_insurance.banglalink-package-details.table.tbody.30 – 48')}} (+{{__('claim_insurance.banglalink-package-details.table.tbody.tax')}})</td>
                                            <td>৳{{__('claim_insurance.banglalink-package-details.table.tbody.10000')}}</td>
                                            <td>৳{{__('claim_insurance.banglalink-package-details.table.tbody.15000')}}</td>
                                            <td>৳{{__('claim_insurance.banglalink-package-details.table.tbody.2000')}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('claim_insurance.banglalink-package-details.table.tbody.50 – 58')}} (+{{__('claim_insurance.banglalink-package-details.table.tbody.tax')}})</td>
                                            <td>৳{{__('claim_insurance.banglalink-package-details.table.tbody.10000')}}</td>
                                            <td>৳{{__('claim_insurance.banglalink-package-details.table.tbody.20000')}}</td>
                                            <td>৳{{__('claim_insurance.banglalink-package-details.table.tbody.3000')}}</td>
                                        </tr>

                                        <tr>
                                            <td>{{__('claim_insurance.banglalink-package-details.table.tbody.60 – 62')}} (+{{__('claim_insurance.banglalink-package-details.table.tbody.tax')}})</td>
                                            <td>৳{{__('claim_insurance.banglalink-package-details.table.tbody.10000')}}</td>
                                            <td>৳{{__('claim_insurance.banglalink-package-details.table.tbody.30000')}}</td>
                                            <td>৳{{__('claim_insurance.banglalink-package-details.table.tbody.5000')}}</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="margin-bottom-small">
                            <span class="note"><i>**{{__('claim_insurance.banglalink-package-details.short_note.note')}} ({{__('claim_insurance.banglalink-package-details.table.tbody.life_insurance')}}):</i>  </span>
                            <ul>
                                <li><i class="ion-android-done-all active"> {{__('claim_insurance.banglalink-package-details.short_note.coverage_applicable')}} </i></li>
                                <li><i class="ion-android-done-all active"> {{__('claim_insurance.banglalink-package-details.short_note.not_covered')}}</i></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
            <section class="page padding-md padding-bottom-null" style="background: linear-gradient(180deg, #F4F6F8 45.21%, #FFFFFF 100%);">
                <div class="row no-margin insurance-process">
                    <div class="col-md-12 services-box how-it-works">
                        <h1 class="text-center claim-title">{{__('insurance.claim_process.title')}}</h1>
                        <div class="col-md-4">
                            <div class="insurance-info margin-md-bottom text-center">
                                <span class="insurance-step">{{__('insurance.claim_process.step_1')}}</span>
{{--                                <img src="assets/img/step-1.png" alt="Search" width="100px">--}}
                                <p> {{__('insurance.claim_process.step_1_description')}} <br>
                                    <!-- a.       Customer or nominee sends the image of Hospital Discharge Certificate and other required documents via Daktarbhai app, web or email<br>
                                  b.      If called at 16643 hotline, the customer service agent will guide the claimant about how to proceed and apply -->
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="insurance-info margin-md-bottom text-center">
                                <span class="insurance-step">{{__('insurance.claim_process.step_2')}}</span>
{{--                                <img src="assets/img/step-2.png" alt="Book" width="100px">--}}
                                <p>{{__('insurance.claim_process.step_2_description')}} </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="insurance-info margin-md-bottom text-center">
                                <span class="insurance-step">{{__('insurance.claim_process.step_3')}}</span>
{{--                                <img src="assets/img/step-3.png" alt="Get Well Soon" width="100px">--}}
                                <p> {{__('insurance.claim_process.step_3_description')}}  </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

    </div>
@endsection

@section('before-scripts')

@endsection
