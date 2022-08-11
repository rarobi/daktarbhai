<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://cdn.rawgit.com/mirazmac/bengali-webfont-cdn/master/solaimanlipi/style.css">
</head>
<body>
<header style="height:2.05in;margin-left: -40px">
    <table style=" width:100%;">
        <tr>
            <td style="width: 50%;;text-align:left;vertical-align:top;">
                @if(isset($myPrescription->short_bio) && ($myPrescription->short_bio != null))
                    <p style="margin: 0 0 5px 0;font-size: 18px"> {!! $myPrescription->practitioner_name !!}</p>
                    <small>{!! $myPrescription->short_bio !!}</small>
                @endif
            </td>
            <td style="width: 50%;text-align:left;vertical-align:top;" class="pull-right">
                @if(isset($myPrescription->short_bio_bn) && ($myPrescription->short_bio_bn != null))
                    <p style="margin: 0 0 5px 0;font-size: 18px"> {!! $myPrescription->practitioner_name !!}</p>
                    <small>{!! strip_tags($myPrescription->short_bio_bn) !!}</small>
                @endif
            </td>
        </tr>
    </table><br>
    <div style="width:100%; padding: 5px 0;border-top:1px solid #555;border-bottom:1px solid #555; height:25px;display:block;clear:both; margin-bottom: 4px;">
        <h3 style=" margin:0 0px 0px 0px;float: left; width:30%">Name : {!! $myPrescription->patient_name  !!}</h3>
        <p style=" margin:0 20px 0 20px;float: left;width:28%;">Age : {!! isset($myPrescription->age ) ? $myPrescription->age.' years' : '' !!} <span>{!! isset($myPrescription->month ) ? $myPrescription->month.' months' : '' !!}</span> <span>{!! isset($myPrescription->days ) ? $myPrescription->days.' days' : '' !!}</span></p>
        <p style=" margin:0 10px 0 10px;float: left;width:12%;">Sex :{!! ucfirst($myPrescription->gender) !!} </p>
        <p style=" margin:0 10px 0 10px;float: left;width:24%;">Date : {{ date('d F, Y', strtotime($myPrescription->prescription_date)) }}</p>
    </div>
</header>
<!-- ———————————————————————————————————————
———	patient start here
————————————————————————————————————————— -->
<table style="width: 100%;margin-left: -40px;">

    <tr>
        <!-- ———————————————————————————————————————
            ———	prescriptions left bar start here
        ————————————————————————————————————————— -->
        <td style="width: 40%;float: left !important;text-align:left;vertical-align:top;">
            {{--            <div style="width:30%; float: left !important;">--}}
            @if(!empty($myPrescription->chief_complain))
                <div style="margin:20px 0px 10px 0px !important;height:130px;">
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
                <br>
            @endif

            @if(!empty($myPrescription->chronic_disease))
                <div style="margin-bottom: 20px;height:60px;">
                    <h4 style="margin:0;">Chronic disease </h4>
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
                <br>
            @endif

{{--            @if(!empty($myPrescription->past_medical_history))--}}
{{--                <div style="margin-bottom: 20px;height:60px;" class="past">--}}
{{--                    <h4 style="margin:0;">Past medical History </h4>--}}
{{--                    @foreach($myPrescription->past_medical_history as $value)--}}
{{--                        <p>--}}
{{--                            <span style="font-size:14px;">{!! isset($value->health_record_name) ? $value->health_record_name : null !!}</span>--}}
{{--                            @if($value->duration != '' || $value->duration_type != '')--}}
{{--                                <span style="font-size:14px; margin-left:15px;"> (for {!! $value->duration.' '.$value->duration_type !!})--}}
{{--                            @if(isset($value->notes) && $value->notes != '')--}}
{{--                                        ({!! $value->notes !!})--}}
{{--                                    @endif--}}
{{--                        </span>--}}
{{--                            @else--}}
{{--                                <span style="font-size:14px; margin-left:15px;"> {!! $value->duration.' '.$value->duration_type !!}--}}
{{--                                    @if(isset($value->notes) && $value->notes != '')--}}
{{--                                        ({!! $value->notes !!})--}}
{{--                                    @endif--}}
{{--                        </span>--}}
{{--                            @endif--}}
{{--                        </p>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--                <br>--}}
{{--            @endif--}}

            <div style="margin-bottom: 20px;height:150px;">
                <h4 style="margin:0;">on Examination </h4>
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
            </div><br>

            @if(!empty($myPrescription->allergy))
                <div style="margin-bottom: 20px;height:60px;">
                    <h4 style="margin:0;">Allergy  </h4>
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
                </div><br>
            @endif

{{--            @if(!empty($myPrescription->family_health_record))--}}
{{--                <div style="margin-bottom: 20px;height:60px;">--}}
{{--                    <h4 style="margin:0;">Family History </h4>--}}
{{--                    @foreach($myPrescription->family_health_record as $value)--}}
{{--                        <p>--}}
{{--                            <span class="chief-complain-name">{!! isset($value->health_record_name) ? $value->health_record_name : null !!}</span>--}}
{{--                            @if($value->duration != '' || $value->duration_type != '')--}}
{{--                                <span class="chief-complain-field"> (for {!! $value->duration.' '.$value->duration_type !!})--}}
{{--                            @if(isset($value->notes) && $value->notes != '')--}}
{{--                                        ({!! $value->notes !!})--}}
{{--                                    @endif--}}
{{--                                    @if(isset($value->relation) && $value->relation != '')--}}
{{--                                        ({!! $value->relation !!})--}}
{{--                                    @endif--}}
{{--                        </span>--}}
{{--                            @else--}}
{{--                                <span class="chief-complain-field"> {!! $value->duration.' '.$value->duration_type !!}--}}
{{--                                    @if(isset($value->notes) && $value->notes != '')--}}
{{--                                        ({!! $value->notes !!})--}}
{{--                                    @endif--}}
{{--                                    @if(isset($value->relation) && $value->relation != '')--}}
{{--                                        ({!! $value->relation !!})--}}
{{--                                    @endif--}}
{{--                        </span>--}}
{{--                            @endif--}}
{{--                        </p>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--                <br>--}}
{{--            @endif--}}

            @if(!empty($myPrescription->diagnosis))
                <div style="margin-bottom: 20px;height:60px;">
                    <h4 style="margin:0;">Diagnosis </h4>
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
                <br>
            @endif

            @if(!empty($myPrescription->lab_test))
                <div style="margin-bottom: 20px; height:60px;">
                    <h4 style="margin:0;">Investigation (Lab Test)  </h4>
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
                <br>
            @endif
            {{--            </div>--}}

        </td>
        <!-- ———————————————————————————————————————
           ———	prescriptions right bar start here
       ————————————————————————————————————————— -->
        <td style="width: 60%;float: left !important;text-align:left;vertical-align:top;padding:0;padding: 20px; border-left: 1px solid #555;height: 8.8in;">

            <div>
                <h3 style="margin:0 0 5px 0;">Rx.  </h3>
                @foreach($myPrescription->medicine as $medication)
                    <span style="margin: 0px 0px 15px 15px !important;" class="medication">
                        <h4 >
                            {!! $medication->medication_type or '' !!} {!! $medication->medicine_name or '' !!}
                            @if(isset($medication->medicine_route) && $medication->medicine_route != '')
                                ({!! $medication->medicine_route or '' !!})
                            @endif
                        </h4>
                        <p>
                        <span style="font-size:14px;">
                            {!! $medication->frequency or '' !!}
                        </span>
                        <span >
                            {!! $medication->duration or '' !!} {!! $medication->duration_unit or '' !!}
                        </span>
                        <span>
                            {!! $medication->medication_notes or ' ' !!}
                        </span>
                        </p>
                    </span><br>
                @endforeach

                @if(!empty($myPrescription->advices))
                    <div style="margin: 70px 0 0 0;">
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
                    </div><br>
                @endif

                @if(!empty($myPrescription->follow_up_date))
                    <div style="margin: 70px 0 0 0;">
                        <h3 style="margin:0 0 5px 0;">Follow-up </h3>
                    </div>
                    <p>
                        @if(isset($myPrescription->follow_up_date ))
                            <span style="font-weight:600;font-size:13px; margin-right:5px;">Follow-Up Date:</span> <span style="margin-right:15px;">{{ (isset($myPrescription->follow_up_date) && $myPrescription->follow_up_date != null) ? date('d F, Y', strtotime($myPrescription->follow_up_date)) : 'Not Provided' }}</span>
                        @endif
                        @isset($myPrescription->follow_up_type)
                            <span style="font-weight:600;font-size:13px; margin-right:5px;">Follow Up Type :</span>  <span style="margin-right:15px;">{!! $myPrescription->follow_up_type !!}</span>
                        @endisset
                        @isset($myPrescription->instructions)
                            <span style="font-weight:600;font-size:13px;">Instructions : </span> <span style="margin-right:15px;">{!! $myPrescription->instructions !!}</span>
                        @endisset
                    </p>
                @endif
            </div>

        </td>
    </tr>
</table>

<footer style="color: #777777;width: 100%; height: 30px; position: absolute;  bottom: 0; border-top: 1px solid #555;padding: 8px 0; text-align: center;">
    Your health, Take care - Daktarbhai
</footer>
</body>
</html>
