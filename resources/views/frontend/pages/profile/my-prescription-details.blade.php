@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'My Prescription | ' . app_name()  !!}
@endsection

@section('main-content')
    <div class="bhoechie-tab-content active">
        <h3 class="profile-title"> {{__('profile.prescription.title')}}</h3>
        <div class="my-prescription">
         @if($myPrescription)
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard-cart bg-white has-shadow">
                            <div class="doctor-info">
                                <div class="row">
                                    <div class="col-md-6 eng">
                                        @if(isset($myPrescription->short_bio) && ($myPrescription->short_bio != null))
                                        {{--{!! (isset($myPrescription->short_bio) && $myPrescription->short_bio != null) ? $myPrescription->short_bio : $myPrescription->practitioner_name !!}--}}
                                            <h3 class="doctor-name"> {!! $myPrescription->practitioner_name !!}</h3>
                                            <p>{!! $myPrescription->short_bio !!}</p>
                                        @endif
                                    </div>
                                    <div class="col-md-6 ban">
                                        @if(isset($myPrescription->short_bio_bn) && ($myPrescription->short_bio_bn != null))
                                            <h3 class="doctor-name"> {!! $myPrescription->practitioner_name !!}</h3>
                                            <p>{!! $myPrescription->short_bio_bn !!}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="patient-info">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h3>Name : {!! $myPrescription->patient_name  !!}</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="age float-left">Age :  {!! isset($myPrescription->age ) ? $myPrescription->age.' years' : '' !!} <span>{!! isset($myPrescription->month ) ? $myPrescription->month.' months' : '' !!}</span> <span>{!! isset($myPrescription->days ) ? $myPrescription->days.' days' : '' !!}</span></p>

                                    </div>
                                    <div class="col-md-2">
                                        <p class="age float-left">Sex : {!! ucfirst($myPrescription->gender)  !!}</p>

                                    </div>
                                    <div class="col-md-3">
                                        <p class="date float-left"> {{ date('d F, Y', strtotime($myPrescription->prescription_date)) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="prescription-details">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="prescription-left-bar">
                                            <div class="left-block">
                                                <p class="left-bar-header">Chief Complain </p>
                                                <div class="chief-complain-left-bar">
                                                    @foreach($myPrescription->chief_complain as $value)
                                                        <p>
                                                            <span class="chief-complain-name">{!! $value->complain_name !!}</span>
                                                            @if(!empty($value->duration) || !empty($value->duration_type))
                                                                <span class="chief-complain-field"> (for {!! $value->duration.' '.$value->duration_type !!})
                                                                    @if(isset($value->notes) && $value->notes != '')
                                                                        ({!! $value->notes !!})
                                                                    @endif
                                                                </span>
                                                            @else
                                                                <span class="chief-complain-field"> {!! $value->duration.' '.$value->duration_type !!}
                                                                    @if(isset($value->notes) && $value->notes != '')
                                                                        ({!! $value->notes !!})
                                                                    @endif
                                                                </span>
                                                            @endif
                                                        </p>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="left-block">
                                                <p id="chronic-disease-popups" class="left-bar-header">Chronic disease</p>
                                                <div class="chronic-disease-left-bar">
                                                    @foreach($myPrescription->chronic_disease as $value)
                                                        <p>
                                                            <span class="chief-complain-name">{!! isset($value->chronic_disease_name) ? $value->chronic_disease_name : null !!}</span>
                                                            @if(!empty($value->duration) || !empty($value->duration_type))
                                                                <span class="chief-complain-field"> (for {!! $value->duration.' '.$value->duration_type !!})
                                                                    @if(isset($value->notes) && $value->notes != '')
                                                                        ({!! $value->notes !!})
                                                                    @endif
                                                                </span>
                                                            @else
                                                                <span class="chief-complain-field"> {!! $value->duration.' '.$value->duration_type !!}
                                                                    @if(isset($value->notes) && $value->notes != '')
                                                                        ({!! $value->notes !!})
                                                                    @endif
                                                                </span>
                                                            @endif
                                                        </p>
                                                    @endforeach
                                                </div>
                                            </div>
{{--                                            <div class="left-block">--}}
{{--                                                <p id="past-medical-history-popup" class="left-bar-header">Past medical History </p>--}}
{{--                                                <div class="past-medical-history-left-bar">--}}
{{--                                                    @foreach($myPrescription->past_medical_history as $value)--}}
{{--                                                        <p>--}}
{{--                                                            <span class="chief-complain-name">{!! isset($value->health_record_name) ? $value->health_record_name : null !!}</span>--}}
{{--                                                            @if(!empty($value->duration) || !empty($value->duration_type))--}}
{{--                                                                <span class="chief-complain-field"> (for {!! $value->duration.' '.$value->duration_type !!})--}}
{{--                                                                    @if(isset($value->notes) && $value->notes != '')--}}
{{--                                                                        ({!! $value->notes !!})--}}
{{--                                                                    @endif--}}
{{--                                                            </span>--}}
{{--                                                            @else--}}
{{--                                                                <span class="chief-complain-field"> {!! $value->duration.' '.$value->duration_type !!}--}}
{{--                                                                    @if(isset($value->notes) && $value->notes != '')--}}
{{--                                                                        ({!! $value->notes !!})--}}
{{--                                                                    @endif--}}
{{--                                                                </span>--}}
{{--                                                            @endif--}}
{{--                                                        </p>--}}
{{--                                                    @endforeach--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <div class="left-block">
                                                <p id="patients-vitals-popup" class="left-bar-header">on Examination </p>
                                                <div class="patients-vitals-left-bar">
                                                        @if(isset($myPrescription->height_obj))
                                                            <p> <span> Height :</span> {!! $myPrescription->height_obj->height_obj->feet->feet !!} feet
                                                                    {!! $myPrescription->height_obj->height_obj->feet->inches !!} inc


                                                                ({!! $myPrescription->height_obj->height_obj->cm !!} cm)
                                                            </p>
                                                        @endif

                                                        @if(isset($myPrescription->weight_obj))
                                                            <p>
                                                                <span>Weight :</span>{!! $myPrescription->weight_obj->weight_obj->kg !!} kg
                                                                <i>({!! $myPrescription->weight_obj->weight_obj->pounds !!} lb)</i>
                                                            </p>
                                                        @endif

                                                        @if(isset($myPrescription->bmi_value))
                                                            <p><span>Patient BMI :</span> {!! $myPrescription->bmi_value !!}  </p>
                                                        @endif

                                                        @if(isset($myPrescription->body_temperature_obj))
                                                            <p>
                                                                <span>Temperature :</span> {!! $myPrescription->body_temperature_obj->body_obj->fahrenheitValue !!} fahrenheit
                                                                <i>({!! $myPrescription->body_temperature_obj->body_obj->celcius !!} celcius)</i>
                                                            </p>
                                                        @endif

                                                        @if(isset($myPrescription->pulse_rate))
                                                            <p> <span> Patient Pulse :</span> {!! $myPrescription->pulse_rate !!}
                                                            </p>
                                                        @endif

                                                        @if(isset($myPrescription->respiratory_rate))
                                                            <p> <span> Respiratory Rate :</span> {!! $myPrescription->respiratory_rate !!}</p>

                                                        @endif

                                                        @if(isset($myPrescription->blood_pressure_obj))
                                                            <p>
                                                        <span> Blood Pressure :</span>  {!! $myPrescription->blood_pressure_obj->bp_obj->systolic.'/'. $myPrescription->blood_pressure_obj->bp_obj->diastolic !!}

                                                        </p>
                                                        @endif

                                                </div>
                                            </div>
                                            <div class="left-block">
                                                <p id="allergy-popup" class="left-bar-header">Allergy </p>
                                                <div class="allergy-left-bar">
                                                    @foreach($myPrescription->allergy as $value)
                                                        <p>
                                                            <span class="chief-complain-name">{!! isset($value->allergy_cause) ? $value->allergy_cause : null !!}</span>
                                                            @if(!empty($value->duration) || !empty($value->duration_type))
                                                                <span class="chief-complain-field"> (for {!! $value->duration.' '.$value->duration_type !!})
                                                                    @if(isset($value->notes) && $value->notes != '')
                                                                        ({!! $value->notes !!})
                                                                    @endif
                                                                </span>
                                                            @else
                                                                <span class="chief-complain-field"> {!! $value->duration.' '.$value->duration_type !!}
                                                                    @if(isset($value->notes) && $value->notes != '')
                                                                        ({!! $value->notes !!})
                                                                    @endif
                                                                </span>
                                                            @endif
                                                        </p>
                                                    @endforeach
                                                </div>
                                            </div>
{{--                                            <div class="left-block">--}}
{{--                                                <p id="family-popup" class="left-bar-header">Family History </p>--}}
{{--                                                <div class="family-left-bar">--}}
{{--                                                    @foreach($myPrescription->family_health_record as $value)--}}
{{--                                                        <p>--}}
{{--                                                            <span class="chief-complain-name">{!! isset($value->health_record_name) ? $value->health_record_name : null !!}</span>--}}
{{--                                                            @if(!empty($value->duration) || !empty($value->duration_type))--}}
{{--                                                                <span class="chief-complain-field"> (for {!! $value->duration.' '.$value->duration_type !!})--}}
{{--                                                                    @if(isset($value->notes) && $value->notes != '')--}}
{{--                                                                        ({!! $value->notes !!})--}}
{{--                                                                    @endif--}}
{{--                                                                    @if(isset($value->relation) && $value->relation != '')--}}
{{--                                                                        ({!! $value->relation !!})--}}
{{--                                                                    @endif--}}
{{--                                                            </span>--}}
{{--                                                            @else--}}
{{--                                                                <span class="chief-complain-field"> {!! $value->duration.' '.$value->duration_type !!}--}}
{{--                                                                    @if(isset($value->notes) && $value->notes != '')--}}
{{--                                                                        ({!! $value->notes !!})--}}
{{--                                                                    @endif--}}
{{--                                                                    @if(isset($value->relation) && $value->relation != '')--}}
{{--                                                                        ({!! $value->relation !!})--}}
{{--                                                                    @endif--}}
{{--                                                                </span>--}}
{{--                                                            @endif--}}
{{--                                                        </p>--}}
{{--                                                    @endforeach--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <div class="left-block">
                                                <p id="diagnosis-popup" class="left-bar-header">Diagnosis </p>
                                                <div class="diagnosis-left-bar">
                                                    @foreach($myPrescription->diagnosis as $value)
                                                        <p>
                                                            <span class="chief-complain-name">{!! isset($value->diagnosis_name) ? $value->diagnosis_name : null !!}</span>
                                                            <span class="chief-complain-field">
                                                            @if(isset($value->notes) && $value->notes != '')
                                                                    ({!! $value->notes !!})
                                                                @endif
                                                            </span>
                                                        </p>
                                                    @endforeach
                                                </div>

                                            </div>
                                            <div class="left-block">
                                                <p id="investigation-popup" class="left-bar-header">Investigation (Lab Test) </p>
                                                <div class="investigation-left-bar">
                                                    @foreach($myPrescription->lab_test as $value)
                                                        <p>
                                                            <span class="chief-complain-name">{!! isset($value->lab_test_name) ? $value->lab_test_name : null !!}</span>
                                                            <span class="chief-complain-field">
                                                            @if(isset($value->notes) && $value->notes != '')
                                                                    ({!! $value->notes !!})
                                                                @endif
                                                            </span>
                                                        </p>
                                                    @endforeach
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-8 padding-20">
                                        <div class="prescription-medication-area">
                                            <p class="rx-header">Rx </p>
                                            {{--<p >Rx <a href=""><i class="fa fa-plus-circle" aria-hidden="true"></i></a></p>--}}
                                            @foreach($myPrescription->medicine as $medication)
                                                <div class="madication">
                                                    <p class="medicine-name col-md-12">
                                                        {!! $medication->medication_type or '' !!}  {!! $medication->medicine_name or '' !!}
                                                        @if(isset($medication->medicine_route) && $medication->medicine_route != '')
                                                            ({!! $medication->medicine_route or '' !!})
                                                        @endif
                                                    </p>
                                                    <div class="row">
                                                        <p class="madication-info col-md-2 offset-md-1">
                                                            {!! $medication->frequency or '' !!}
                                                        </p>
                                                        <p class="madication-info col-md-2">
                                                            {!! $medication->duration or '' !!} {!! $medication->duration_unit or '' !!}
                                                        </p>
                                                        <p class="madication-info col-md-7">
                                                            {!! $medication->medication_notes or ' ' !!}
                                                        </p>

                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="advices-area">
                                            <p class="rx-header">Advices </p>
                                            <div class="advice-right-bar">
                                                @foreach($myPrescription->advices as $value)
                                                    <p>
                                                        <span class="chief-complain-name">{!! isset($value->advice_name) ? $value->advice_name : null !!}</span>
                                                        <span class="chief-complain-field">
                                                            @if(isset($value->notes) && $value->notes != '')
                                                                ({!! $value->notes !!})
                                                            @endif
                                                        </span>
                                                    </p>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="follow-up-area">
                                            <p class="rx-header">Follow-up </p>
                                            <div class="followup-right-bar">
                                              <p>
                                                @if(isset($prescriptionData->follow_up_date ))
                                                    <div><span>Follow-Up Date:</span> {{ (isset($prescriptionData->follow_up_date) && $prescriptionData->follow_up_date != null) ? date('d F, Y', strtotime($prescriptionData->follow_up_date)) : 'Not Provided' }}</div>
                                                @endif
                                                @isset($prescriptionData->follow_up_type)
                                                    <div><span>Follow Up Type :</span>  {!! $prescriptionData->follow_up_type !!}</div>
                                                @endisset
                                                @isset($prescriptionData->instructions)
                                                    <div><span >Instructions : </span> {!! $prescriptionData->instructions !!}</div>
                                                @endisset
                                              </p>
                                            </div>

                                            <!-- <p class="rx-header">Follow-up <a href=""><i class="fa fa-plus-circle" aria-hidden="true"></i></a></p> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="prescription-footer" >
                              <a href="{!! route('frontend.prescription.download', ['id'=> $myPrescription->id]) !!}" class="prescription-downoad"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>   {{__('profile.prescription.button.download_prescription')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
           @else
             <p>{{__('profile.prescription.msg.no_data')}}</p>
        @endif
        </div>
    </div>
@endsection

@section('after-scripts')
    <script>
        $('#viewRepost').click(function() {
            $('#repostDetails').css("display", "block");
        });
    </script>
@endsection
