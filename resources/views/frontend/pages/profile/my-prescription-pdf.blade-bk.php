<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Prescription pdf</title>
    <style media="screen">
        a {color: #0087C3;text-decoration: none;}
        html{background: #f1f1f1; margin: 0px; padding: 20px;}
        p{margin: 0px;}
        /* @import url('https://fonts.maateen.me/solaiman-lipi/font.css'); */
    </style>
    <link rel="stylesheet" href="https://cdn.rawgit.com/mirazmac/bengali-webfont-cdn/master/solaimanlipi/style.css">
    <!-- <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet"> -->
</head>
<body style="position: relative;width: 8.5in;height: 11in;margin: 0px auto 0px !important; padding: 0px !important;color: #555555;background: #fff;font-family: Arial, sans-serif;font-size: 14px;font-family: SourceSansPro;">
<!-- ———————————————————————————————————————
———	Doctor info start here
————————————————————————————————————————— -->
{{--<header style="width: 8.5in;display:block;clear:both; height:1.07in; margin-bottom:1.4in;">--}}
<header style="height:2.77in;">
    <div style="height: 2.50in;">
    <div style="padding:0px 20px 0px 20px; float:left; width:5in; margin:0px !important;">
        @if(isset($myPrescription->short_bio) && ($myPrescription->short_bio != null))
            <h3 style="margin: 0px 0px 5px 0px;font-size: 25px"> {!! $myPrescription->practitioner_name !!}</h3>
            <p>{!! $myPrescription->short_bio !!}</p>
        @endif
    </div>
    <div style="padding:0px 20px 20px 20px;float:right; margin-right:50px !important; width:3in; font-family: 'SolaimanLipi', serif !important;">
        @if(isset($myPrescription->short_bio_bn) && ($myPrescription->short_bio_bn != null))
            <h3 style="margin: 0px 0px 5px 0px;font-size: 25px"> {!! $myPrescription->practitioner_name !!}</h3>
            <p>{!! $myPrescription->short_bio_bn !!}</p>
        @endif
    </div>
    </div>
    <div style="width:100%; padding: 5px 0;border-top:1px solid #555;border-bottom:1px solid #555; height:25px;display:block;clear:both; margin-bottom: 4px;">
        <h3 style=" margin:0 20px 0 20px;float: left;">Name : {!! $myPrescription->patient_name  !!}</h3>
        <p style=" margin:0 20px 0 20px;float: left;width:25%;">Age : {!! isset($myPrescription->age ) ? $myPrescription->age.' years' : '' !!} <span>{!! isset($myPrescription->month ) ? $myPrescription->month.' months' : '' !!}</span></p>
        <p style=" margin:0 20px 0 20px;float: left;width:15%;">Sex :{!! ucfirst($myPrescription->gender) !!} </p>
        <p style=" margin:0 20px 0 20px;float: left;width:15%;">Date : {{ date('d F, Y', strtotime($myPrescription->prescription_date)) }}</p>
    </div>
</header>
<!-- ———————————————————————————————————————
———	patient start here
————————————————————————————————————————— -->

<!-- ———————————————————————————————————————
———	prescriptions left bar start here
————————————————————————————————————————— -->
<div style="width: 8.5in;display:block;">
    <div style="width:2.7in; float: left !important; padding: 15px 20px;height: 4.6in;">
{{--        <div style="width:2.7in; float: left !important; padding: 65px 15px 10px 20px;height: 7.6in;">--}}

        @if(!empty($myPrescription->chief_complain))
        <div style="margin-bottom: 20px;height:130px;">
            <h4 style="margin:0px;">Chief Complain </h4>
            @foreach($myPrescription->chief_complain as $value)
                <p>
                    <span style="font-size:14px;">{!! $value->complain_name !!}</span>
                    @if($value->duration != '' || $value->duration_type != '')
                        <span style="font-size:14px; margin-left:15px;"> (for {!! $value->duration.' '.$value->duration_type !!})
                            @if(isset($value->notes) && $value->notes != '')
                                ({!! $value->notes !!})
                            @endif
                        </span>
                    @else
                        <span style="font-size:14px; margin-left:15px;"> {!! $value->duration.' '.$value->duration_type !!}
                            @if(isset($value->notes) && $value->notes != '')
                                ({!! $value->notes !!})
                            @endif
                        </span>
                    @endif
                </p>
            @endforeach
        </div>
        @endif

        @if(!empty($myPrescription->chronic_disease))
        <div style="margin-bottom: 20px;height:60px;">
            <h4 style="margin:0px;">Chronic disease </h4>
            @foreach($myPrescription->chronic_disease as $value)
                <p>
                    <span style="font-size:14px;">{!! isset($value->chronic_disease_name) ? $value->chronic_disease_name : null !!}</span>
                    @if($value->duration != '' || $value->duration_type != '')
                        <span style="font-size:14px;"> (for {!! $value->duration.' '.$value->duration_type !!})
                            @if(isset($value->notes) && $value->notes != '')
                                ({!! $value->notes !!})
                            @endif
                        </span>
                    @else
                        <span style="font-size:14px;"> {!! $value->duration.' '.$value->duration_type !!}
                            @if(isset($value->notes) && $value->notes != '')
                                ({!! $value->notes !!})
                            @endif
                        </span>
                    @endif
                </p>
            @endforeach
        </div>
        @endif

        @if(!empty($myPrescription->past_medical_history))
        <div style="margin-bottom: 20px;height:60px;">
            <h4 style="margin:0px;">Past medical History </h4>
            @foreach($myPrescription->past_medical_history as $value)
                <p>
                    <span style="font-size:14px;">{!! isset($value->health_record_name) ? $value->health_record_name : null !!}</span>
                    @if($value->duration != '' || $value->duration_type != '')
                        <span style="font-size:14px; margin-left:15px;"> (for {!! $value->duration.' '.$value->duration_type !!})
                            @if(isset($value->notes) && $value->notes != '')
                                ({!! $value->notes !!})
                            @endif
                        </span>
                    @else
                        <span style="font-size:14px; margin-left:15px;"> {!! $value->duration.' '.$value->duration_type !!}
                            @if(isset($value->notes) && $value->notes != '')
                                ({!! $value->notes !!})
                            @endif
                        </span>
                    @endif
                </p>
            @endforeach
        </div>
        @endif

        <div style="margin-bottom: 20px;height:150px;">
            <h4 style="margin:0px;">on Examination </h4>
            <div id="vitals">
                @if(isset($myPrescription->height_obj))
                    <div> <span style="font-weight:600;font-size:13px;"> Height : {!! $myPrescription->height_obj->height_obj->feet->feet !!} feet
                            {!! $myPrescription->height_obj->height_obj->feet->inches !!} inc
                </span>

                        ({!! $myPrescription->height_obj->height_obj->cm !!} cm)
                    </div>
                @endif

                @if(isset($myPrescription->weight_obj))
                    <div>
                        <span style="font-weight:600;font-size:13px;">Weight :{!! $myPrescription->weight_obj->weight_obj->kg !!}</span> kg
                        <i>({!! $myPrescription->weight_obj->weight_obj->pounds !!} lb)</i>
                    </div>
                @endif

                @if(isset($myPrescription->bmi_value))
                    <div><span style="font-weight:600;font-size:13px;">Patient BMI : {!! $myPrescription->bmi_value !!} </span> </div>
                @endif

                @if(isset($myPrescription->body_temperature_obj))
                    <div>
                        <span style="font-weight:600;font-size:13px;">Temperature : {!! $myPrescription->body_temperature_obj->body_obj->fahrenheitValue !!} fahrenheit </span>
                        <i>({!! $myPrescription->body_temperature_obj->body_obj->celcius !!} celcius)</i>
                    </div>
                @endif

                @if(isset($myPrescription->pulse_rate))
                    <div> <span style="font-weight:600;font-size:13px;"> Patient Pulse : {!! $myPrescription->pulse_rate !!}</span>
                    </div>
                @endif

                @if(isset($myPrescription->respiratory_rate))
                    <div> <span style="font-weight:600;font-size:13px;"> Respiratory Rate : {!! $myPrescription->respiratory_rate !!} </span>
                    </div>
                @endif

                @if(isset($myPrescription->blood_pressure_obj))
                    <div>
                <span style="font-weight:600;font-size:13px;"> Blood Pressure :  {!! $myPrescription->blood_pressure_obj->bp_obj->systolic.'/'. $myPrescription->blood_pressure_obj->bp_obj->diastolic !!}
            </span>
                    </div>
                @endif
            </div>
        </div>

        @if(!empty($myPrescription->allergy))
        <div style="margin-bottom: 20px;height:60px;">
            <h4 style="margin:0px;">Allergy  </h4>
            @foreach($myPrescription->allergy as $value)
                <p>
                    <span class="chief-complain-name">{!! isset($value->allergy_cause) ? $value->allergy_cause : null !!}</span>
                    @if($value->duration != '' || $value->duration_type != '')
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
        <!-- <p>
            <span style="font-size:14px;">Chronic</span>
            <span style="font-size:14px; margin-left:15px;"> (for 1 days)</span>
            <span style="font-size:14px; margin-left:15px;"> This is note</span>
          </p> -->
        </div>
        @endif

        @if(!empty($myPrescription->family_health_record))
        <div style="margin-bottom: 20px;height:60px;">
            <h4 style="margin:0px;">Family History </h4>
            @foreach($myPrescription->family_health_record as $value)
                <p>
                    <span class="chief-complain-name">{!! isset($value->health_record_name) ? $value->health_record_name : null !!}</span>
                    @if($value->duration != '' || $value->duration_type != '')
                        <span class="chief-complain-field"> (for {!! $value->duration.' '.$value->duration_type !!})
                            @if(isset($value->notes) && $value->notes != '')
                                ({!! $value->notes !!})
                            @endif
                            @if(isset($value->relation) && $value->relation != '')
                                ({!! $value->relation !!})
                            @endif
                        </span>
                    @else
                        <span class="chief-complain-field"> {!! $value->duration.' '.$value->duration_type !!}
                            @if(isset($value->notes) && $value->notes != '')
                                ({!! $value->notes !!})
                            @endif
                            @if(isset($value->relation) && $value->relation != '')
                                ({!! $value->relation !!})
                            @endif
                        </span>
                    @endif
                </p>
            @endforeach
        </div>
        @endif

        @if(!empty($myPrescription->diagnosis))
        <div style="margin-bottom: 20px;height:60px;">
            <h4 style="margin:0px;">Diagnosis </h4>
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
        @endif

        @if(!empty($myPrescription->lab_test))
        <div style="margin-bottom: 20px; height:60px;">
            <h4 style="margin:0px;">Investigation (Lab Test)  </h4>
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
        @endif
    </div>

    <!-- ———————————————————————————————————————
    ———	prescriptions right bar start here
    ————————————————————————————————————————— -->

    <div style="width:5.2in; float: left !important; padding: 20px; border-left: 1px solid #555;height: 4.6in" >
        <h3 style="margin:0px 0px 5px 0px;">Rx  </h3>
        @foreach($myPrescription->medicine as $medication)
            <div style="margin: 0 0 15px 15px;">
                <h4 style="margin:0 0 5px 0;">
                    {!! $medication->medication_type or '' !!} {!! $medication->medicine_name or '' !!}
                    @if(isset($medication->medicine_route) && $medication->medicine_route != '')
                    ({!! $medication->medicine_route or '' !!})
                    @endif
                </h4>
                <p>
            <span style="font-size:14px;">
                 {!! $medication->frequency or '' !!}
            </span>
            <span style="font-size:14px; margin-left:20px;">
                {!! $medication->duration or '' !!} {!! $medication->duration_unit or '' !!}
            </span>
                    {{--<span style="font-size:14px; margin-left:20px;">--}}
                    {{--{!! $medication->medication_instruction or ' ' !!}--}}
                    {{--</span>--}}
                    <span style="font-size:14px; margin-left:20px;">
            {!! $medication->medication_notes or ' ' !!}
            </span>
                </p>
            </div>
        @endforeach

        @if(!empty($myPrescription->advices))
        <div style="margin: 70px 0 0 0px;">
            <h3 style="margin:0 0 5px 0;">Advice</h3>
            @foreach($myPrescription->advices as $value)
                <p>
                    <span style="font-size:14px;">{!! isset($value->advice_name) ? $value->advice_name : null !!}</span>
                    <span style="font-size:14px;">
                        @if(isset($value->notes) && $value->notes != '')
                            ({!! $value->notes !!})
                        @endif
                    </span>
                </p>
            @endforeach
        </div>
        @endif

        @if(!empty($prescriptionData->follow_up_date))
        <div style="margin: 70px 0 0 0px;">
            <h3 style="margin:0 0 5px 0;">Follow-up </h3>
        </div>
        <p>
            @if(isset($prescriptionData->follow_up_date ))
                <span style="font-weight:600;font-size:13px; margin-right:5px;">Follow-Up Date:</span> <span style="margin-right:15px;">{{ (isset($prescriptionData->follow_up_date) && $prescriptionData->follow_up_date != null) ? date('d F, Y', strtotime($prescriptionData->follow_up_date)) : 'Not Provided' }}</span>
            @endif
            @isset($prescriptionData->follow_up_type)
                <span style="font-weight:600;font-size:13px; margin-right:5px;">Follow Up Type :</span>  <span style="margin-right:15px;">{!! $prescriptionData->follow_up_type !!}</span>
            @endisset
            @isset($prescriptionData->instructions)
                <span style="font-weight:600;font-size:13px;">Instructions : </span> <span style="margin-right:15px;">{!! $prescriptionData->instructions !!}</span>
            @endisset
        </p>
        @endif
    </div>
</div>
<footer style="color: #777777;width: 100%; height: 30px; position: absolute;  bottom: 0; border-top: 1px solid #555;padding: 8px 0; text-align: center;">
    Your health, Take care - Daktarbhai
</footer>
</body>
</html>
