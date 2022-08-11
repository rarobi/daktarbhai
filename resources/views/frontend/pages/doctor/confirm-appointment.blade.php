@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Confirm Appointment | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap row white">
        <!-- ————————————————————————————————————————————
      ———	Hospital Details
      —————————————————————————————————————————————— -->
        <div class="col-md-6 col-md-offset-3 margin-bottom-small">
            <div class="col-md-12 request-box padding-leftright-null">
{{--                <div class="page-header confirm-appointment-header">--}}
                    <h5>{{__('find_doctor.appointment.request_appointment')}}:</h5>
{{--                </div>--}}
                <div class="request-appointment">
{{--                    <div class="">--}}
                        <div class="request-doc-info" style="background: #FFFFFF; margin-bottom: 0">
                            <p class="text-bold"> {!! $doctor->name or '' !!}</p>
                            <p>{!! $doctor->specialities or '' !!}</p>
                            <p>{!! $doctor->qualification or '' !!}</p>
                            <p>{!! $chamber->chamber_name or '' !!}</p>
                            <p>{!! $chamber->chamber_address or '' !!}</p>
                            <p class="text-bold">Date : {!! $booking_date !!} Time : {!! $booking_time !!}</p>

                        </div>
                        <div class="req-app-form patient-info-form">
                            {!! Form::open(['route' => 'frontend.doctor.confirm-appointment',  'data-parsley-validate','class'=>'book-an-appointment']) !!}
                            <input type="hidden" value="{!! csrf_token() !!}" name="_token">
                            <input type="hidden"  name="doctor_id" value="{!! $doctor->doctor_id !!}">
                            <input type="hidden"  name="doctor_schedule_id" value="{!! $doctor_schedule_id !!}">
                            <input type="hidden"  name="datetime" value="{!! $dateTime !!}">
                            <div class="form-group">
                                <p class="text-bold">{{__('find_doctor.appointment.whom_appointment')}}</p>
                                <label><input type="radio" name="appointment_for" value="myself" class="appointment radio_hide" checked/> {{__('find_doctor.appointment.myself')}}</label>
                                <label><input type="radio" name="appointment_for" value="others" class="appointment radio_hide" /> {{__('find_doctor.appointment.others')}}</label>
                                @if ($errors->has('appointment_for'))
                                    <span class="error-text filled">{!! $errors->first('appointment_for
                                    ') !!}  </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <p class="text-bold">{{__('find_doctor.appointment.ever_visited')}}</p>
                                <label><input type="radio" name="visit_type" value="first_time" class=" radio_hide" checked> {{__('find_doctor.appointment.first_time')}}</label>
                                <label><input type="radio" name="visit_type" value="return" class="radio_hide"> {{__('find_doctor.appointment.return_patient')}}</label>
                                @if ($errors->has('visit_type'))
                                    <span class="error-text filled">{!! $errors->first('visit_type') !!}  </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <p class="text-bold">{{__('find_doctor.appointment.reason_visit')}}</p>
                                <input name="reason_for_appointment" type="text" class="form-control" >
                            </div>
                            <div class="form-group">
                                <p class="text-bold">{{__('find_doctor.appointment.who_communicate')}}</p>
                                <label><input type="radio" name="contact_to_whom" value="me" class="radio_hide" checked> {{__('find_doctor.appointment.me')}}</label>
                                <span id="others">
                                        <label><input type="radio" name="contact_to_whom"  class="radio_hide"  value="patient"> {{__('find_doctor.appointment.patient')}}</label>
                                        <label><input type="radio" name="contact_to_whom"  class="radio_hide"  value="both"> {{__('find_doctor.appointment.both')}}</label>
                                        </span>
                                @if ($errors->has('contact_to_whom'))
                                    <span class="error-text filled">{!! $errors->first('contact_to_whom') !!}  </span>
                                @endif
                            </div>
                            <div class="form-group country-code-n" >
                                <p class="text-bold">{{__('find_doctor.appointment.contact_number')}}</p>
                                <div class="input-group form-inline">
                                    <span class="input-group-addon" id="basic-addon1">{{__('find_doctor.appointment.country_code')}}</span>

                                    {!! Form::text('contact_number', $contactNumber, ['aria-describedby' => "basic-addon1",
                                                                                      'placeholder' => __('find_doctor.appointment.placeholder.mobile'),   'class' => 'form-control mob-num',
                                                                                      'required' => 'required', 'data-parsley-required-message' => __('find_doctor.appointment.message.mobile_number'),
                                                                                         //'data-parsley-pattern'          => '^(?:\+?88)?01[15-9]\d{8}$',
                                                                                      'data-parsley-pattern'          => '^[1-9][0-9]{0,10}$',
  'data-parsley-length' =>'[10, 10]',
                                                                                      'data-parsley-pattern-message' => __('find_doctor.appointment.message.valid_number'),

  'data-parsley-length-message' =>'mobile number should be valid',
                                                                                      'data-parsley-errors-container' => '#contactError',
                                                                                      'data-parsley-trigger'          => 'change focusout']) !!}
                                </div>

                                <p id="contactError" style="margin-left: 20px;"></p>
                                @if ($errors->has('contact_number'))
                                    <span class="error-text filled" style="margin-left: 20px;">{!! $errors->first('contact_number') !!}  </span>
                                @endif
                            </div>

                            @if(isset($user))
                                {{--                            @if($user->is_subscribed || $user->is_trial_user ))--}}
                                {!! Form::submit(__('find_doctor.appointment.submit'),['class' => 'login-btn']) !!}
                                {{--                            @else--}}
                                {{--                                <div class="doc-overly">--}}
                                {{--                                    <div class="premium-content">--}}
                                {{--                                        <p>{{__('find_hospital.msg_1')}}--}}
                                {{--                                            --}}{{--To enjoy this feature you have to enable one of our subscriptions plan.--}}
                                {{--                                        </p>--}}
                                {{--                                        {{ Html::link('subscription/plan',__('find_hospital.buttons.subscription_btn'),['class'=>'btn-alt active shadow small margin-null purchase-plan']) }}--}}

                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                {{--                            @endif--}}
                            @else
                                <div class="doc-overly">
                                    <div class="premium-content">
                                        {{--<p>To enjoy this feature you have to enable one of our subscriptions plan.</p>
                                        {{ Html::link('subscription/plan','Subscriptions Plan',['class'=>'btn-alt active shadow small margin-null purchase-plan']) }}--}}
                                        <p>{{__('find_doctor.message.enjoy_feature')}}
                                            {{--To enjoy this feature please login to Daktarbhai.--}}
                                        </p>
                                        {{ Html::link('/signin',__('login.buttons.login'),['class'=>'btn-alt active shadow small margin-null purchase-plan']) }}

                                    </div>
                                </div>
                            @endif
                            {!! Form::close() !!}
                        </div>
{{--                    </div>--}}
                </div>
            </div>

        </div>
    </div>
@endsection
@section('before-scripts-end')
    <script>
        $("#others, #parent3").css("display","none");
        $(".appointment").click(function() {
            if ($('input[name=appointment_for]:checked').val() == "others") {
                $("#others").slideDown("fast"); //Slide Down Effect
            }
            if ($('input[name=appointment_for]:checked').val() == "myself"){
                $("#others").slideUp("fast");
            }
        });
        /*$('.book-an-appointment').submit(function (event) {
            event.preventDefault();

        });*/

//        is_subscribed
    </script>
@endsection
