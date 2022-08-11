@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'All e-PHR | ' . app_name()  !!}
@endsection

@section('main-content')
    <!-- ————————————————————————————————————————————
            ———	Phr Content
            —————————————————————————————————————————————— -->

    <!-- Content start here -->
    <div class="col-xs-6 col-sm-4 col-md-2 text-center padding-leftright-10">
        <div  class="thumbnail text-center">
            <div class="actions">
                <div class="btn-group">
                    <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="ion-ios-more"></i></a>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route('frontend.phr.create', 'bmi') }}">{{__('phr.common.action.add')}}</a></li>
                        <li><a href="{!! route('frontend.phr.index', 'bmi') !!}">{{__('phr.common.view_details')}}</a></li>
                    </ul>
                </div>
            </div>
            <a href="{!! route('frontend.phr.index', 'bmi') !!}">
                <img src="{!! asset('assets/img/phr/bmi.png') !!}" alt="BMI">
                <h3 class="phr-m-title">{{__('phr.phr_report.bmi')}}</h3>
            </a>
        </div>
    </div>

    <div class="col-xs-6 col-sm-4 col-md-2 text-center padding-leftright-10">
        <div  class="thumbnail">
            <div class="actions">
                <div class="btn-group">
                    <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="ion-ios-more"></i></a>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route('frontend.phr.create', 'bp') }}">{{__('phr.common.action.add')}}</a></li>
                        <li><a href="{!! route('frontend.phr.index', 'bp') !!}">{{__('phr.common.view_details')}}</a></li>
                    </ul>
                </div>
            </div>
            <a href="{{ route('frontend.phr.index', 'bp') }}">
                <img src="{!! asset('assets/img/phr/blood1.png') !!}" alt="Blood Pressure">
                <h3 class="phr-m-title">{{__('phr.phr_report.bp')}}</h3>
            </a>
        </div>
    </div>

    <div class="col-xs-6 col-sm-4 col-md-2 text-center padding-leftright-10">
        <div  class="thumbnail text-center">
            <div class="actions">
                <div class="btn-group">
                    <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="ion-ios-more"></i></a>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route('frontend.phr.create', 'cbc') }}">{{__('phr.common.action.add')}}</a></li>
                        <li><a href="{!! route('frontend.phr.index', 'cbc') !!}">{{__('phr.common.view_details')}}</a></li>
                    </ul>
                </div>
            </div>
            <a href="{!! route('frontend.phr.index', 'cbc') !!}">
                <img src="{!! asset('assets/img/phr/cbc.png') !!}" alt="CBC">
                <h3 class="phr-m-title">{{__('phr.phr_report.cbc')}}</h3>
            </a>
        </div>
    </div>

    <div class="col-xs-6 col-sm-4 col-md-2 text-center padding-leftright-10">
        <div href="{!! route('frontend.phr.index', 'glucose') !!}" class="thumbnail">
            <div class="actions">
                <div class="btn-group">
                    <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="ion-ios-more"></i></a>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route('frontend.phr.create', 'glucose') }}">{{__('phr.common.action.add')}}</a></li>
                        <li><a href="{!! route('frontend.phr.index', 'glucose') !!}">{{__('phr.common.view_details')}}</a></li>
                    </ul>
                </div>
            </div>
            <a href="{!! route('frontend.phr.index', 'glucose') !!}">
                <img src="{!! asset('assets/img/phr/glucose1.png') !!}" alt="Glucose">
                <h3 class="phr-m-title">{{__('phr.phr_report.glucose')}}</h3>
            </a>
        </div>
    </div>

    <div class="col-xs-6 col-sm-4 col-md-2 text-center padding-leftright-10">
        <div href="{!! route('frontend.phr.index', 'lipid') !!}" class="thumbnail">
            <div class="actions">
                <div class="btn-group">
                    <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="ion-ios-more"></i></a>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route('frontend.phr.create', 'lipid') }}">{{__('phr.common.action.add')}}</a></li>
                        <li><a href="{!! route('frontend.phr.index', 'lipid') !!}">{{__('phr.common.view_details')}}</a></li>
                    </ul>
                </div>
            </div>
            <a href="{!! route('frontend.phr.index', 'lipid') !!}">
                <img src="{!! asset('assets/img/phr/lipid1.png') !!}" alt="Lipid Profile">
                <h3 class="phr-m-title">{{__('phr.phr_report.lipid')}}</h3>
            </a>
        </div>
    </div>

    <div class="col-xs-6 col-sm-4 col-md-2 text-center padding-leftright-10">
        <div href="{!! route('frontend.phr.index', 'kidney') !!}" class="thumbnail">
            <div class="actions">
                <div class="btn-group">
                    <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="ion-ios-more"></i></a>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route('frontend.phr.create', 'kidney') }}">{{__('phr.common.action.add')}}</a></li>
                        <li><a href="{!! route('frontend.phr.index', 'kidney') !!}">{{__('phr.common.view_details')}}</a></li>
                    </ul>
                </div>
            </div>
            <a href="{{ route('frontend.phr.index', 'kidney') }}">
                <img src="{!! asset('assets/img/phr/kidney1.png') !!}" alt="Kidney Function">
                <h3 class="phr-m-title">{{__('phr.phr_report.kidney')}}</h3>
            </a>
        </div>
    </div>

    <div class="col-xs-6 col-sm-4 col-md-2 text-center padding-leftright-10">
        <div href="{{ route('frontend.phr.index', 'urine-profile') }}" class="thumbnail">
            <div class="actions">
                <div class="btn-group">
                    <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="ion-ios-more"></i></a>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route('frontend.phr.create', 'urine-profile') }}">{{__('phr.common.action.add')}}</a></li>
                        <li><a href="{{ route('frontend.phr.index', 'urine-profile') }}">{{__('phr.common.view_details')}}</a></li>
                    </ul>
                </div>
            </div>
            <a href="{{ route('frontend.phr.index', 'urine-profile') }}">
                <img src="{!! asset('assets/img/phr/urine.png') !!}" alt="Urine Profile">
                <h3 class="phr-m-title">{{__('phr.phr_report.urine')}}</h3>
            </a>
        </div>
    </div>

    <div class="col-xs-6 col-sm-4 col-md-2 text-center padding-leftright-10">
        <div href="{{ route('frontend.phr.index', 'electrolyte') }}" class="thumbnail">
            <div class="actions">
                <div class="btn-group">
                    <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="ion-ios-more"></i></a>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route('frontend.phr.create', 'electrolyte') }}">{{__('phr.common.action.add')}}</a></li>
                        <li><a href="{{ route('frontend.phr.index', 'electrolyte') }}">{{__('phr.common.view_details')}}</a></li>
                    </ul>
                </div>
            </div>
            <a href="{{ route('frontend.phr.index', 'electrolyte') }}">
                <img src="{!! asset('assets/img/phr/electrolytes.png') !!}" alt="Electrolytes">
                <h3 class="phr-m-title">{{__('phr.phr_report.electrolytes')}}</h3>
            </a>
        </div>
    </div>

    <div class="col-xs-6 col-sm-4 col-md-2 text-center padding-leftright-10">
        <div href="{{ route('frontend.phr.index', 'thyroid') }}" class="thumbnail">
            <div class="actions">
                <div class="btn-group">
                    <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="ion-ios-more"></i></a>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route('frontend.phr.create', 'thyroid') }}">{{__('phr.common.action.add')}}</a></li>
                        <li><a href="{{ route('frontend.phr.index', 'thyroid') }}">{{__('phr.common.view_details')}}</a></li>
                    </ul>
                </div>
            </div>
            <a href="{{ route('frontend.phr.index', 'thyroid') }}">
                <img src="{!! asset('assets/img/phr/thyroid1.png') !!}" alt="Thyroid Function">
                <h3 class="phr-m-title">{{__('phr.phr_report.thyroid')}}</h3>
            </a>
        </div>
    </div>

    <div class="col-xs-6 col-sm-4 col-md-2 text-center padding-leftright-10">
        <div href="{{ route('frontend.phr.index', 'tumor-marker') }}" class="thumbnail">
            <div class="actions">
                <div class="btn-group">
                    <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="ion-ios-more"></i></a>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route('frontend.phr.create', 'tumor-marker') }}">{{__('phr.common.action.add')}}</a></li>
                        <li><a href="{{ route('frontend.phr.index', 'tumor-marker') }}">{{__('phr.common.view_details')}}</a></li>
                    </ul>
                </div>
            </div>
            <a href="{{ route('frontend.phr.index', 'tumor-marker') }}">
                <img src="{!! asset('assets/img/phr/tumour1.png') !!}" alt="Tumor Marker">
                <h3 class="phr-m-title">{{__('phr.phr_report.tumor')}}</h3>
            </a>
        </div>
    </div>

    <div class="col-xs-6 col-sm-4 col-md-2 text-center padding-leftright-10">
        <div href="{{ route('frontend.phr.index', 'serology') }}" class="thumbnail">
            <div class="actions">
                <div class="btn-group">
                    <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="ion-ios-more"></i></a>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route('frontend.phr.create', 'serology') }}">{{__('phr.common.action.add')}}</a></li>
                        <li><a href="{{ route('frontend.phr.index', 'serology') }}">{{__('phr.common.view_details')}}</a></li>
                    </ul>
                </div>
            </div>
            <a href="{{ route('frontend.phr.index', 'serology') }}">
                <img src="{!! asset('assets/img/phr/serology1.png') !!}" alt="Serology Report">
                <h3 class="phr-m-title">{{__('phr.phr_report.serology')}}</h3>
            </a>
        </div>
    </div>

    <div class="col-xs-6 col-sm-4 col-md-2 text-center padding-leftright-10">
        <div href="{{ route('frontend.phr.index', 'liver') }}" class="thumbnail">
            <div class="actions">
                <div class="btn-group">
                    <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="ion-ios-more"></i></a>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route('frontend.phr.create', 'liver') }}">{{__('phr.common.action.add')}}</a></li>
                        <li><a href="{{ route('frontend.phr.index', 'liver') }}">{{__('phr.common.view_details')}}</a></li>
                    </ul>
                </div>
            </div>
            <a href="{{ route('frontend.phr.index', 'liver') }}">
                <img src="{!! asset('assets/img/phr/liver1.png') !!}" alt="Liver Function">
                <h3 class="phr-m-title">{{__('phr.phr_report.liver')}}</h3>
            </a>
        </div>
    </div>

    <div class="col-xs-6 col-sm-4 col-md-2 text-center padding-leftright-10">
        <div href="{{ route('frontend.phr.corona.vaccine') }}" class="thumbnail">
            <div class="actions">
                <div class="btn-group">
                    <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="ion-ios-more"></i></a>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route('frontend.phr.corona.vaccine.create') }}">{{__('phr.common.action.add')}}</a></li>
                        <li><a href="{{ route('frontend.phr.corona.vaccine') }}">{{__('phr.common.view_details')}}</a></li>
                    </ul>
                </div>
            </div>
            <a href="{{ route('frontend.phr.corona.vaccine') }}">
                <img src="{!! asset('assets/img/phr/covid_vaccination.png') !!}" alt="Covid-19 vaccine">
                <h3 class="phr-m-title">{{__('phr.phr_report.corona')}}</h3>
            </a>
        </div>
    </div>

@endsection
