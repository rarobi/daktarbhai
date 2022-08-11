@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Insurance Claim | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('after-styles')
    <link rel="stylesheet" href="{!! asset('assets/css/imageuploadify.min.css') !!}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css">--}}
    <style>
        .imageuploadify .imageuploadify-images-list .imageuploadify-container{
            border-radius: 4px !important;
        }
        .imageuploadify {
            min-width: 205px;
            color:  #F7941E;
            border: none !important;

        }

        p{
            color: #2f2f2f !important;
        }
        .imageuploadify.well {
            background: linear-gradient(180deg, #F4F6F8 45.21%, #FFFFFF 100%);
        }

        .imageuploadify .imageuploadify-images-list span.imageuploadify-message {

            border-top:none;
            border-bottom: none;
            color: #2f2f2f;
        }

        .imageuploadify .imageuploadify-images-list button.btn-default {
            display: block;
            color: #fff !important;
            border-color: #36B7B4;
            border-radius: 4px;
            margin: 25px auto;
            /*width: 30%;*/
            max-width: 500px;
            background: #36B7B4 !important;
            height: 50px;
        }

        .claim-info label{
            font-size: 13px;
            font-weight: 400;
            margin-bottom: 5px;
        }

        .claim-from .form-control {
            border: 1px solid #36B7B4 !important;
            border-radius: 2px;
            height: 50px;
        }

        hr{
            border-top: 1px solid #36B7B4 !important;

        }
    </style>
@endsection

@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap dir-bg">
        <div class="row margin-leftright-null">
            <section class="doctor page padding-md">
                <div class="container">
                    <h2 class="text-center padding-top-null white">
                        {{__('claim_insurance.header.title')}}
                    </h2>
                    <p class="heading white text-center">{{__('claim_insurance.header.text')}}</p>
                </div>
            </section>
        </div>
    </div>

    <div id="home-wrap" class="content-section fullpage-wrap claim">
        <div class="row no-margin text new-services">
            <div class="col-md-12 padding-leftright-null">
                {{--<h3 class="grey big margin-bottom-small">How to claim <span class="brand-color">Daktarbahi </span>Cash</h3>--}}
                <h5 class="grey big margin-bottom-small">{{__('claim_insurance.content.title')}}</h5>
            </div>
            <div class="claim-prosess">
                <div class="col-md-4 text-center">
                        <div class="col-md-12">
                            <div class="text-center margin-bottom-small">
                                <a href="#">
                                    <img class="" src="{!! asset('assets/img/claim/claim-1.png') !!}" width="64px">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="text-center">
                                <p>{{__('claim_insurance.content.text_1')}}
                                </p>
                            </div>
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="col-md-12">
                            <div class="text-center margin-bottom-small">
                                <a href="#">
                                    <img class="" src="{!! asset('assets/img/claim/claim-2.png') !!}" width="64px">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="text-center">
                                <p>{{__('claim_insurance.content.text_2')}}</p>
                            </div>
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="col-md-12">
                            <div class="text-center margin-bottom-small">
                                <a href="#">
                                    <img class="" src="{!! asset('assets/img/claim/claim-3.png') !!}" width="64px">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="text-center">
                                <p>{{__('claim_insurance.content.text_3')}}</p>
                            </div>
                        </div>
                </div>
            </div>

            <div class="claim-attach">
                <div class="col-md-12">
                    <div class="text-center">
                        <h4>{{__('claim_insurance.document_field.title')}}</h4>
                        <!-- Error message content starts here -->
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="claim-insurance-alert alert alert-danger" id="success-alert">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong>{{__('claim_insurance.error')}}! </strong>
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif
                        @if(Session::has('api_error'))
                            <div class="claim-insurance-alert alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>{{__('claim_insurance.error')}}! </strong>
                                {!! session('api_error') !!}
                            </div>
                        @endif

                        <p class="claim-info-text">{{__('claim_insurance.document_field.description')}}</p>
                        <div class="uploader__box js-uploader__box l-center-box">

                            {!! Form::open(['route' => ["frontend.insurance-claim.submit"],  'class' => 'form-horizontal claim-insurance', 'files' => true ]) !!}

                            <div class="uploader__contents">
                                <input id="fileinput" name="image_path[]" class="uploadFile uploader__file-input" accept="image/*" type="file" multiple value="Select Files" enctype="multipart/form-data">
                            </div>
                        </div>
                        <p class="claim-info-text">
                            {{__('claim_insurance.document_field.upload_msg')}}
                        </p>
                    </div>
                </div>
            </div>

            @include('frontend.pages.insurance-claim.form')

            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('before-scripts-end')
    <script src="{!! asset('assets/js/imageuploadify.min.js') !!}"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('.uploadFile').imageuploadify();

            selectInsurance(document.getElementById('insurance_type'));

            /* Hide or show Bank Information - On form load */
            selectPaymentMethod(document.getElementById('payment_method'));

            $(".login-btn").click( function () {
                $('.claim-insurance').unbind('submit').bind('submit').submit();
            });
        });

        function selectInsurance(selectedInsuranceType) {
            displayHospitalInfo(selectedInsuranceType.value);
        }

        function displayHospitalInfo(insuranceType) {
            if(insuranceType == 'ipd') {
                $('#hospitalInfo :input').prop('disabled', false);
                $('#hospitalInfo').show();
            } else {
                $('#hospitalInfo :input').prop('disabled', true);
                $('#hospitalInfo').hide();
            }
        }

        function selectPaymentMethod(selectedPaymentMethod) {
            displayBankInfo(selectedPaymentMethod.value);
        }

        function displayBankInfo(paymentMethod) {
            if(paymentMethod == 'BANK_TRANSFER') {
                $('#payment_number :input').prop('disabled', true);
                $('#payment_number').hide();

                $('#bankInfo :input').prop('disabled', false);
                $('#bankInfo').show();
            } else {
                $('#payment_number :input').prop('disabled', false);
                $('#payment_number').show();

                $('#bankInfo :input').prop('disabled', true);
                $('#bankInfo').hide();
            }
        }

        function validate(evt) {
            var theEvent = evt || window.event;
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode( key );
            var regex = /[0-9]|\+/;
            if( !regex.test(key) ) {
                theEvent.returnValue = false;
                if(theEvent.preventDefault) theEvent.preventDefault();
            }
        }
    </script>
    <script src="{!! asset('assets/plugins/datepicker/js/bootstrap-datepicker.js') !!}"></script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>--}}
    <script>
        $(function() {
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                changeMonth: true,
                changeYear:true,
                orientation: 'bottom',
                defaultDate: new Date(),
                maxDate: new Date(),
                endDate: '+0d'
//            clearBtn: true
            });
        });
    </script>
@endsection
