@extends('frontend.layouts.theme.master')

@section('title', $doctor->name )

@section('page-header-class', 'header-static')

@section('after-styles')
    <link rel="stylesheet" href="{!! asset('assets/css/theme/doctor-modal.css') !!}">
    <style>

        .doc-images {
            width: 80% !important;
        }

        .doc-images img {
            width: fit-content;
        }
        .msg{
            background: ghostwhite;
            /*height: 100px;*/
            color: #f8f8f8
            !important;
        }

        .specialities{
            font-weight: normal;
        }

        @media screen and (max-width: 1000px) {
            .consultancy_fee{
                margin-top: 20px!important;
                margin-bottom: 10px;
            }
        }

        @media screen and (max-width: 1000px) {
            .back_btn{
                margin-top: 20px!important;
                margin-bottom: 10px;
            }
        }
    </style>
@endsection
@section('content')
{{--    <div id="home-wrap" class="content-section fullpage-wrap row doc-bg">--}}
{{--        <div class="col-md-12 padding-leftright-null" style="background-color: #00d4a4">--}}
{{--            <!-- ————————————————————————————————————————————--}}
{{--            ———	Contact Content Start here--}}
{{--            —————————————————————————————————————————————— -->--}}
{{--            <section class="">--}}
{{--                <div class="container">--}}
{{--                    <div class="text-center" >--}}
{{--                        <h4 class="white big margin-bottom-small" style="margin-top: 10px">Video Call To a Doctor</h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div id="home-wrap" class="content-section fullpage-wrap row white">
        <div class="col-md-4 m-t-10px m-l-5">
        </div>
    <!-- ————————————————————————————————————————————
            ———	Doctor Details
            —————————————————————————————————————————————— -->
        <div class="doctor-list">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="membership-title">Choose Date & Time</h3>
                    </div>
                    <div class="col-md-12 doc-single hopspital-details">
{{--                        <div class="col-md-2 back_btn" style="margin-top: 120px" >--}}
{{--                            <a class="date-serch btn-sm btn-alt small active margin-null" onclick="history.back(-1)" {{ setActive('doctor') }}><i class="ion-reply" aria-hidden="true">Back</i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
                        <div class="col-md-12">
                            <div class="col-md-4 col-md-offset-2 padding-null">
                                <div class="doc-images">
                                    <a href="#"><img src="{!! (isset($doctor) && $doctor->image !=null) ? $doctor->image : asset('assets/img/doctor-grey.png') !!}" alt="doctor" class="img-responsive img-center"></a>
                                </div>
                            </div>
                            <div class="col-md-6 padding-sm">
                                <h4 class="doc-name">{!! $doctor->name or '' !!} </h4>
                                @if(isset($doctor->designation) && $doctor->designation != null)
                                    <p class="designation">{!! $doctor->designation or '' !!}</p>
                                @endif
                                @if(isset($doctor->qualification) && $doctor->qualification != null)
                                    <p class="designation">{!! $doctor->qualification or '' !!}</p>
                                @endif
                                <div class="address-wrap">
                                    <div class="address-left">
                                        <p class="sp-icon"><img src="{!! asset('assets/img/sp-doc-icon.png') !!}"><span>Specialist: </span><span class="specialities"> {!! $doctor->specialities or '' !!}</span> </p>
                                    </div>
                                </div>
                                @if(isset($chambers) && $chambers != null)
                                    @foreach($chambers as  $chamber)
                                        <button class="btn btn-light consultancy_fee">
                                            Consultancy Fee: <i style="color: #48C051">{{isset($chamber->fixed_new_visit_price) ? $chamber->fixed_new_visit_price : 'Not Provided'}}BDT </i>
                                        </button>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12 slot-section">
                            <div class="col-md-6">
                                {{--                <h5>{{__('find_doctor.bottom_content.book_appointment.title')}}</h5>--}}
                                <h5>Search Date Wise Time Slot</h5>
                                <form method="get" action="{!! route('frontend.tele-medicine.doctor-appointment',$doctor->doctor_id) !!}">
                                    <div class="date-picker">
                                        <div class="input">
                                            <div class="result"> <span>{!! $selected->appointment_date  !!}</span></div>
                                            <input id="dateInput" type="hidden" name="appointment_date"value="{!! $selected->appointment_date !!}"/>
                                            <a><i class="fa fa-calendar"></i></a>
                                        </div>
                                        <div class="calendar" ></div>
                                    </div>
                                    <button  class="date-serch btn-alt small active margin-null">{{__('find_doctor.button.search')}}</button>
                                </form>

                            </div>
                            <div class="col-md-6">
                                @if(isset($chambers) && $chambers != null)
                                    @foreach($chambers as $key => $chamber)
                                        <div class="panel panel-default" style="width: 95%">
                                            <div class="panel-footer" >
                                                <h4>{{__('find_doctor.time_slot')}}</h4>
                                            </div>
                                            <div class="panel-body">
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
                                            </div>
                                        </div>

                                    @endforeach
                                @else
                                    <div class="msg">
                                        <p class="no-schedule" style="  margin-left: 30px;color: grey">{{__('find_doctor.message.schedules')}}</p>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 text-center">
                <form method="post" id="scheduleDate" action="{!! route('frontend.tele-medicine.doctor-appointment-info') !!}">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <input type="hidden" name="schedule_id" id="scheduleId">
                    <input type="hidden" name="chamber" id="chamber">
                    <input type="hidden" name="date_time" id="datetime">
{{--                    <input type="hidden" name="consultancy_fee" value="{{$chamber->fixed_new_visit_price}}">--}}
{{--                    <button class="btn btn-warning"> Next</button>--}}
                </form>
            </div>
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
                    schedule.html(data);

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


            {{--var URL = "{!! url('doctor') !!}" +'/'+doctorId+'/'+scheduleId+'/dateTime/'+dateTime;--}}
            {{--window.location = URL;--}}
        });
    </script>
@endsection
