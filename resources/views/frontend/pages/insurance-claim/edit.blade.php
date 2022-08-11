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
        .removeExistingDoc {
            position: absolute;
            top: -10px;
            right: 6px;
            width: 20px;
            height: 20px;
            border-radius: 20px;
            font-size: 10px;
            line-height: 1.42;
            padding: 2px 0;
            text-align: center;
            z-index: 3;
        }
    </style>
@endsection

@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap service-bg">
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

    @if(isset($insurance_details->insuranceClaim) && ($insurance_details->insuranceClaim->verification_info->is_verified == 0 && $insurance_details->insuranceClaim->verification_info->verification_status == "Applied"))

        <div id="home-wrap" class="content-section fullpage-wrap about-page claim">
            <div class="row no-margin text new-services">
                <div class="col-md-12 padding-leftright-null">
                    {{--<h3 class="grey big margin-bottom-small">How to Claim  <span class="brand-color">Daktarbhai </span>Cash</h3>--}}
                    <h3 class="grey big margin-bottom-small">{{__('claim_insurance.content.title')}}</h3>
                </div>
                <div class="claim-prosess">
                    <div class="col-md-6">
                        <div class="media">
                            <div class="media-left media-middle">
                                <a href="#">
                                    <img class="media-object" src="{!! asset('assets/img/claim/1.png') !!}" width="64px">
                                </a>
                            </div>
                            <div class="media-body">
                                <p>{{__('claim_insurance.content.text_1')}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="media">
                            <div class="media-left media-middle">
                                <a href="#">
                                    <img class="media-object" src="{!! asset('assets/img/claim/2.png') !!}" width="64px">
                                </a>
                            </div>
                            <div class="media-body">
                                <p>{{__('claim_insurance.document_field.msg_1')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="media">
                            <div class="media-left media-middle">
                                <a href="#">
                                    <img class="media-object" src="{!! asset('assets/img/claim/3.png') !!}" width="64px">
                                </a>
                            </div>
                            <div class="media-body">
                                <p>{{__('claim_insurance.document_field.msg_2')}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                @if(count($insurance_claim_documents) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            @foreach($insurance_claim_documents as $key => $doc)
                                @if(substr( $doc->doc_mime_type, 0, 6 ) === "image/")
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger fa fa-close removeExistingDoc" onclick="removeExistingDoc('{!! $doc->id !!}', this)"></button>
                                        <a target="_blank" href="{!! $doc->doc_path != null ? $doc->doc_path : 'http://placehold.it/250x250' !!}"><img class="thumbnail" src="{!! $doc->doc_path != null ? $doc->doc_path : 'http://placehold.it/250x250' !!}" alt="Insurance Claim Image" width="200" height="150"></a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="claim-attach">
                    <div class="col-md-12">

                        <div class="text-center">
                            <h4>{{__('claim_insurance.document_field.title')}}
                                {{--Attach Your Documents--}}
                            </h4>

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

                            <p class="claim-info-text">{{__('claim_insurance.document_field.description')}}
                                {{--Attach your NID, Discharge Certificate, Doctor Advice--}}
                                {{--for hospitalization, Treatment sheet, Hospital Bill/Hospital--}}
                                {{--Ticket, Diagnosis Report and others.--}}
                            </p>
                            <div class="uploader__box js-uploader__box l-center-box">

                                {!! Form::model($insurance_details_formatted, ['id'=>'claim-insurance','method' => 'POST', 'route' => ["frontend.insurance-claim.update", $insurance_details->insuranceClaim->id], 'files' => true, 'class' => 'form']) !!}

                                <div class="uploader__contents">
                                    <input id="fileinput" name="image_path[]" class="uploadFile uploader__file-input" accept="image/*" type="file" multiple value="Select Files" enctype="multipart/form-data">
                                </div>
                            </div>
                            <p class="claim-info-text">  {{__('claim_insurance.document_field.upload_msg')}}
                                {{--Drag & Drop your files or click the attach button.--}}
                                {{--(To complete your claim please attach the 6 mentioned--}}
                                {{--documents otherwise your claim will not be submitted)--}}
                            </p>
                        </div>
                    </div>
                </div>

                @include('frontend.pages.insurance-claim.form')

                {!! Form::close() !!}
            </div>
        </div>
    @else
        <div id="home-wrap" class="content-section fullpage-wrap about-page claim">
            <div class="row no-margin text new-services">
                <div class="col-md-12 padding-leftright-null">
                    <h3 class="grey big margin-bottom-small">{{__('claim_insurance.header.title')}}
                        {{--Claim  <span class="brand-color">Daktarbhai </span>Cash--}}
                    </h3>
                </div>
                <div class="claim-prosess">
                    <div class="col-md-12">
                        <div class="media notToBeChanged">
                            <div class="media-left media-middle">
                                <a href="#">
                                    <img class="media-object" src="{!! asset('assets/img/claim/1.png') !!}" width="64px">
                                </a>
                            </div>
                            <div class="media-body">
                                <p class="customFont">{{__('claim_insurance.document_field.msg_3')}}
                                    {{--The status of this insurance claim has been changed and can not therefore be modified any further!--}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
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
                $('#claim-insurance').unbind('submit').bind('submit').submit();
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

        function removeExistingDoc(imageID, imageElement) {
            var linkURL = "{!! route("frontend.insurance-claim.removeInsuranceClaimDocRecord") !!}";

            swal({
                title: "Are you sure?",
                text: "Confirming this action will delete this Document. This action can not be undone!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#ed1c24',
                confirmButtonText: 'Yes, I am sure!',
                cancelButtonText: "No, cancel it!"
            }).then(function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: "DELETE",
                        url: linkURL,
                        data: {imageID: imageID},
                        success: function(response) {
                            console.log(response);
                            if(response.error){
                                swal("Sorry", response.error, "error");
                            } else {
                                swal("Submitted!", "Selected Insurance Document has been deleted successfully.", "success");
                                imageElement.parentElement.remove();
                            }
                        }
                    })
                } else {
                    swal("Cancelled", "Action Cancelled.", "error");
                }

            });
        }
    </script>
@endsection
