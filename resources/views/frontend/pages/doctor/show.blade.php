@extends('frontend.layouts.theme.master')

@section('title', $doctor->name .'|'  . app_name() )

@section('page-header-class', 'header-static')

@section('after-styles')
    <link rel="stylesheet" href="{!! asset('assets/css/theme/doctor-modal.css') !!}">
    <style>
        .msg{
            background: ghostwhite;
            /*height: 100px;*/
            color: #f8f8f8
            !important;
        }
        .common-btn{
            width: 175px !important;
            height: 50px !important;
            border-radius: 5px !important;
        }
        .schedule_btn{
            background: #36B7B4 !important;
            border: 1px solid #36B7B4 !important;
            line-height: 50px !important;

        }

        .book-appoinment-area .panel .panel-heading {
            background: #36B7B4;
        }

        .panel-group .panel .panel-heading h4.panel-title a {
            color: #fff !important;
            font-weight: 500 !important;
        }

        .doc-images img {
            width: 50% !important;
            height: 200px !important;
            border-radius: 100px !important;
        }

        @media (max-width: 768px){

            .single-doctor-box {
                display: flex;
                height: auto;
            }

            .doc-btn {
                margin-bottom: 10px !important;
                margin-left: 30px !important;
            }

            .doc-images img {
                width: 50% !important;
                height: 200px !important;
                margin-left: 10px !important;
            }
        }
    </style>
@endsection
@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap row" style="background: linear-gradient(180deg, #F4F6F8 45.5%, #FFFFFF 100%);">

        @if(session('errors'))
            @if($errors->any())
                <div class="error-doctor">
                    <i class="ion-alert-circled"></i> {{ $errors->first() }}
                </div>
        @endif
    @endif
    <!-- ————————————————————————————————————————————
            ———	Doctor Details
            —————————————————————————————————————————————— -->
        <div class="doctor-list"  >
            <div class="col-md-12" style="background: linear-gradient(180deg, #F4F6F8 45.5%, #FFFFFF 100%);">
                <div class="doc-single">
                    <div class="col-md-6">
{{--                        @if($utm_source==true)--}}
{{--                            <a class="btn btn-sm back-doc" onclick="history.back(-1)" {{ setActive('doctor') }}><i class="ion-reply" aria-hidden="true"></i> {{__('find_doctor.button.back_search')}}</a>--}}
{{--                        @endif--}}
                        <div class="col-md-4 padding-null">
                            <div class="doc-images">
                                <a href="#"><img src="{!! (isset($doctor) && $doctor->image !=null) ? $doctor->image : asset('assets/img/doctor-grey.png') !!}" alt="doctor" class="img-responsive img-center"></a>
                            </div>
                        </div>
                        <div class="col-md-8 padding-sm">
                            <h4 class="doc-name">{!! $doctor->name or '' !!} </h4>
                            @if(isset($doctor->designation) && $doctor->designation != null)
                                <p class="designation">{!! $doctor->designation or '' !!}</p>
                            @endif
                            @if(isset($doctor->qualification) && $doctor->qualification != null)
                                <p class="designation">{!! $doctor->qualification or '' !!}</p>
                            @endif
                            <div class="address-wrap">
                                <div class="address-left">
                                    <p class="sp-icon">
                                        <span>Specialist</span>
                                      {!! $doctor->specialities or '' !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12 padding-sm book-appoinment-area">
                            @if(isset($user))
                                {{--@if($user->is_subscribed && (($user->is_premium || $user->is_trial_user)))--}}
                                {{--                            @if(!$user->is_subscribed)--}}
                                {{--                            --}}{{--@else--}}
                                {{--                                <div class="doc-overly" style="top: 25px">--}}
                                {{--                                    <div class="premium-content">--}}
                                {{--                                        <p style="color: #000;">{{__('find_hospital.msg_1')}}--}}
                                {{--                                            --}}{{--To enjoy this feature you have to enable one of our subscriptions plan.--}}
                                {{--                                        </p>--}}
                                {{--                                        {{ Html::link('subscription/plan',__('find_hospital.buttons.subscription_btn'),['class'=>'btn-alt active shadow small margin-null purchase-plan']) }}--}}

                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                {{--                            @endif--}}
                            @else
                                <div class="doc-overly" style="top: 25px">
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
                            <h3>{{__('find_doctor.bottom_content.book_appointment.title')}}</h3>
                            <form method="get" action="{!! route('frontend.doctor.show', $doctor->doctor_id) !!}">
                                <div class="date-picker">
                                    <div class="input">
                                        <div class="result">Select Date: <span>{!! $selected->appointment_date  !!}</span></div>
                                        <input id="dateInput" type="hidden" name="appointment_date" value="{!! $selected->appointment_date !!}"/>
                                        <a><i class="fa fa-calendar"></i></a>
                                    </div>
                                    <div class="calendar"></div>
                                </div>
                                <button  class="date-serch btn-alt small active margin-null common-btn">{{__('find_doctor.button.search')}}</button>
                            </form>

                            <form method="post" id="scheduleDate" action="{!! route('frontend.doctor.get-schedule') !!}" style="display: none">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <input type="hidden" name="schedule_id" id="scheduleId">
                                <input type="hidden" name="chamber" id="chamber">
                                <input type="hidden" name="date_time" id="datetime">
                            </form>
                        </div>
                    </div>
                        <div class="col-md-6 padding-sm book-appoinment-area" >
                            <div id="chamberSchedule">
                                <div class="panel-group chembar" id="accordion" role="tablist" aria-multiselectable="true">
                                    @if(isset($chambers) && $chambers != null)
                                        @foreach($chambers as $key => $chamber)
                                            <div class="panel panel-default test">
                                                <div class="panel-heading" role="tab" id="heading{!! $chamber->chamber_id !!}">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{!! $chamber->chamber_id !!}" aria-expanded="true" aria-controls="collapse{!! $chamber->chamber_id !!}">
                                                            {!! $chamber->chamber_name or 'Chamber' !!}
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse{!! $chamber->chamber_id !!}" class="panel-collapse collapse @if($key == 0) in @endif" role="tabpanel" aria-labelledby="heading{!! $chamber->chamber_id !!}">
                                                    <div class="panel-body">
                                                        <h6>{!! $chamber->chamber_name or 'Chamber' !!}</h6>
                                                        <p>{!! $chamber->chamber_address or '' !!}
                                                        </p>
                                                        @if(isset($user))
                                                            {{--                                                                @if($user->is_subscribed && ($user->is_premium || $user->is_trial_user ))--}}
{{--                                                            @if($user->is_subscribed || $user->is_trial_user)--}}
                                                                <a href="" data-modal="#modal{!! $chamber->chamber_id !!}" class="modal__trigger btn-alt small active margin-null schedule_btn common-btn">{{__('find_doctor.find_Schedule')}}</a>
{{--                                                            @endif--}}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="modal{!! $chamber->chamber_id !!}" class="modal modal__bg" role="dialog" aria-hidden="true">
                                                <div class="modal__dialog">
                                                    <div class="modal__content">
                                                        <h4>{{__('find_doctor.time_slot')}}</h4>
                                                        @if(isset($chamber->slots) && $chamber->slots != null)
                                                            @foreach($chamber->slots as $slot)
                                                                @php
                                                                    $dateTime =  $selected->appointment_date.' '.$slot->slot_time;
                                                                    $dateTime = strtotime($dateTime);
                                                                @endphp
                                                                <a href="#" data-scheduleid ="{!! $slot->doctor_schedule_id !!}"
                                                                   data-datetime="{!! $dateTime !!}"  data-chamber = "{!! htmlspecialchars(json_encode($chamber)) !!}"
                                                                   class='schedule btn-alt small @if($slot->slot_availability == false) inactive @else active @endif margin-null'>
                                                                    {!! $slot->slot_time !!}
                                                                </a>
                                                            @endforeach
                                                        @else
                                                            <p class="no-schedule">{{__('find_doctor.message.schedules')}}</p>
                                                    @endif
                                                    <!-- modal close button -->
                                                        <a href="" class="modal__close demo-close">
                                                            <svg class="" viewBox="0 0 24 24"><path d="M19 6.41l-1.41-1.41-5.59 5.59-5.59-5.59-1.41 1.41 5.59 5.59-5.59 5.59 1.41 1.41 5.59-5.59 5.59 5.59 1.41-1.41-5.59-5.59z"/><path d="M0 0h24v24h-24z" fill="none"/></svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
{{--                                        @if(isset($user) && $user->is_subscribed)--}}
                                        @if(isset($user))
                                            <div class="msg">
                                                <p class="no-schedule" style="margin-left: 30px;color: grey">{{__('find_doctor.message.schedules')}}</p>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        <!-- ————————————————————————————————————————————

        ———	Related Doctors
        —————————————————————————————————————————————— -->
        <div class="col-md-12 padding-leftright-null" style="background: #FFFFFF">
            <div class="col-md-8 col-md-offset-2 hospital-doc services-box specialty related-doc">
                <h2 class="text-center"><span>{{__('find_doctor.related')}}</span> {{__('find_doctor.doctors')}} </h2>
                @foreach($related_doctors as $related_doctor)
{{--                    {!! dd($related_doctors) !!}--}}
{{--                    <div class="col-md-4">--}}
{{--                        <a href="{!! route('frontend.doctor.show', $related_doctor->doctor_id) !!}">--}}
{{--                            <div class="doctor-hover alt-services text-center single-related-doc">--}}
{{--                                <div class="doc-img">--}}
{{--                                    <img style="height: 135px;" src="{!! (isset($related_doctor) && $related_doctor->image !=null) ? $related_doctor->image : asset('assets/img/doctor-grey.png') !!}">--}}
{{--                                </div>--}}
{{--                                <div class="service">--}}
{{--                                    <h6 class="heading margin-bottom-extrasmall">{!! $related_doctor->name or '' !!}</h6>--}}
{{--                                    <p class="margin-bottom-null">{!! $related_doctor->designation or ''  !!}</p>--}}
{{--                                    <p class="designation margin-bottom-null">{!! preg_replace('/[ ,]+/', ', ', trim($related_doctor->qualification))   !!}</p>--}}
{{--                                    @if(isset($related_doctor->specialities) && $related_doctor->specialities != null)--}}
{{--                                        <div class="address-wrap">--}}
{{--                                            <div class="address-left">--}}
{{--                                                <p class="sp-icon"><img style="height: 20px" src="{!! asset('assets/img/sp-doc-icon.png') !!}"><span>Specialist</span></p>--}}
{{--                                                <ul class="doc-specil">--}}
{{--                                                    <li>{!!  $related_doctor->specialities or '' !!}</li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
                    <div class="col-md-4 margin-bottom-small">
                        <div class="single-doctor-box">
                            <div class="doc-single search-list " style="background-color: #ffffff">
                                <div class="col-md-12 padding-sm">
                                    <div class="doc-images text-center">
                                        <a href=""><img src="{!! (isset($related_doctor) && $related_doctor->image !=null) ? $related_doctor->image : asset('assets/img/doctor-grey.png') !!}" alt="doctor" class=""></a>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center doctor-profile-btn">
                                    <div class="doctor-info">
                                        <h4 class="margin-bottom-small">{!! $related_doctor->name or '' !!}</h4>
                                        {{--                                          <p class="designation margin-bottom-null">{!! $related_doctor->qualification or '' !!}</p>--}}
                                        @if(isset($related_doctor->specialities) && $related_doctor->specialities != null)
                                            <div class="address-wrap">
                                                <div class="address-left">
                                                    <ul class="doc-specil">
                                                        <li>
                                                            {!! $related_doctor->specialities or '' !!}
                                                            {{--                                                                    {{ \Illuminate\Support\Str::limit($related_doctor->specialities, 140, $end='...') }}--}}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3 padding-top-null">
                                    {{--                                            <a href="{!! route('frontend.tele-medicine.doctor-appointment',$related_doctor->doctor_id ) !!}" class="btn-alt small active doc-btn">View Profile</a>--}}
                                    <a href="{!! route('frontend.doctor.show', $related_doctor->doctor_id.'?utm_source=DSP') !!}" class="btn-alt small active doc-btn">{{__('find_doctor.button.view_profile')}}</a>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- ————————————————————————————————————————————
        ———	specialist Doctor search here
        —————————————————————————————————————————————— -->
        <div class="col-md-12 padding-leftright-null" style="background: #FFFFFF">
            <section id="news" class="page padding-bottom-null">
                <div class="row no-margin">
                    <div class="col-md-12 services-box specialty">
                        @foreach($specialities as $speciality)
                            <div class="col-md-2">
                                <a href="{!! route('frontend.doctor.speciality', $speciality->id) !!}">
                                    <div class="alt-services text-center">
{{--                                        <i class="icon ion-ios-pulse service big color"></i>--}}
                                        <img src="{!! asset('assets/img/specialist_icon.png') !!}" alt="">
                                        <div class="service">
                                            <h6 class="heading margin-bottom-extrasmall">{!! $speciality->name or '' !!}</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('before-scripts-end')
    <script src='//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
    <script>
        /*-------------------------------------------------*/
        /* =>  Doctor details page datepicker
        /*-------------------------------------------------*/
        var SelectDate=$('#dateInput').val() ;

        $(function() {
            $( ".calendar" ).datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: '1',
                maxDate: '15',
                defaultDate: SelectDate
            });

            $(document).on('click', '.date-picker .input', function(e){
                var $me = $(this),
                    $parent = $me.parents('.date-picker');
                $parent.toggleClass('open');
            });


            $(".calendar").on("change",function(){
                var $me = $(this),
                    $selected = $me.val(),
                    $parent = $me.parents('.date-picker');
                $parent.find('.result').children('span').html($selected);
                $parent.find('#dateInput').val($selected);

            });
        });
    </script>
    <script>
        $('#search').click(function(e) {
            e.preventDefault();
            /*$(".chamberSchedule").html('');*/
            var selectedDate = $('.result span').html();
            var doctorId = '{!! $doctor->doctor_id !!}';
            var URL = "{!! url('schedule-date') !!}" +'/'+doctorId+'/'+selectedDate;
            $.ajax({
                type: "GET",
                url: URL,
                success: function(data) {
//                    console.log(data);
                    var schedule = $("#chamberSchedule");
                    schedule.empty();
//                    schedule.html('');
                    schedule.html(data);
//                    console.log(schedule);

                    /*options.append('<option selected="selected" value="">Select an option</option>');
                    $.each(data, function(key, value) {
                        options.append($("<option />").val(key).text(value));
                    });*!/*/
                }
            });
        });
    </script>
    <script>
        $(".schedule").on('click', function(){
            var doctorId = '{{ $doctor->doctor_id }}';
            var chamberData =   ($(this).data('chamber'));
            var scheduleId =   ($(this).data('scheduleid'));
            var dateTime =   ($(this).data('datetime'));

            $('#scheduleId').val(scheduleId);
            $('#chamber').val(JSON.stringify(chamberData));
            $('#datetime').val(dateTime);
            $('#scheduleDate').submit();

            var URL = "{!! url('doctor') !!}" +'/'+doctorId+'/'+scheduleId+'/dateTime/'+dateTime;
            window.location = URL;
        });
    </script>
@endsection
