@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Confirm Appointment | ' . app_name()  !!}
@endsection

@section('after-styles')
    <style>
        .confirm_btn{
            background-color: #36B7B4 !important;
            color: white;
            margin-bottom: 10px;
            width: 85%;
        }
        .apply_btn{
            width: 25%;
        }

        .confirm_btn:hover{
            background-color: #FF6D00 !important;
            color: #f0f0f0;
        }
        /*@media screen and (min-width: 400px) {*/
        /*    .confirm_btn {*/
        /*        width: 30%;*/
        /*    }*/
        /*}*/

        .req-app-form {
            margin-bottom: 30px !important;
        }
        @media screen and (max-width: 1000px) {
            .back_btn{
                margin-top: 20px!important;
                margin-bottom: 10px;
            }
        }

        @media screen and (max-width: 1000px) {
            .consultancy_fee{
                margin-top: 20px!important;
                margin-bottom: 10px;
            }
        }
        .promo_msg{
           /*font-weight: 500;*/
            color: #FF6D00 ;
        }
    </style>
@endsection

@section('page-header-class', 'header-static')

@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap row">
        <div class="section-padding">
            <div class="col-md-12">
                <h4 class="white big margin-bottom-small" style="margin-top: 10px;color:#000000!important;">Video Call To a Doctor</h4>
            </div>
        </div>
        <div class="col-md-12 padding-leftright-null" >
            <div class="doctor-list">
                <div class="col-md-12" style="background: linear-gradient(180deg, #F4F6F8 45.21%, #FFFFFF 100%);" >
                         <div class=" doc-single">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
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
                                            <p class="sp-icon"><span>Specialist: </span><span class="specialities"> {!! $doctor->specialities or '' !!}</span> </p>
                                        </div>
                                    </div>
                                    <p class="m-t-10px" style="color: #005B60;">   {!! $booking_time !!} | {!! date(' d F, Y', strtotime($booking_date))  !!}</p>
                                    @if(isset($chamber) && $chamber != null)
                                        <button class="btn btn-light consultancy_fee">
                                            Consultancy Fee: <span style="color: #48C051; font-weight: 500">{{ $chamber->fixed_new_visit_price}}BDT</span>
                                        </button><br>
                                    @endif

                                    @if(isset($result) && $result->status_code == 200)
                                        <button class="btn btn-light consultancy_fee">
                                            Consultancy Fee: <del>{{ $amount}} BDT</del> | {{ $result->promocode_info->amount}} BDT
                                        </button><br><br>
                                        <button class="btn btn-success">
                                            Discount Amount: {{ $result->promocode_info->discount_amount}} BDT
                                        </button><br>
                                    @endif
                                    @if(isset($result) && $result->status_code == 400)
                                        <button class="btn btn-light consultancy_fee">
                                            Consultancy Fee: {{ $amount}} BDT
                                        </button>
                                    @endif
                                </div>

                            </div>
                            <div class="col-md-3"></div>
                        </div>
                </div>
                <div class="col-md-7">
                    <div class="doc-single request-appointment">
                        <div class= 'req-app-form user-info-form'>
                            <div class="m-t-10px">
                                <p class="promo-title">Apply Promo Code For Discount</p>
                            </div>
                            {!! Form::open(['route' => 'frontend.tele-medicine.promo-code','method' => 'POST',  'data-parsley-validate','class'=>'book-an-appointment']) !!}

                            <div class="col-md-12 form-group country-code-n " >
                                <div class="row">
                                    <p class="text-bold">Promo Code</p>
                                    <div class="col-md-8 padding-right-null margin-bottom-small">
                                        {{--                            <span class="input-group-addon" id="basic-addon1"></span>--}}
                                        {!! Form::text('promo_code', null, ['placeholder' => 'Enter Your Promo Code',   'class' => 'form-control mob-num  promo-code']) !!}
                                    </div>
                                    @if(isset($chamber) && $chamber != null)
                                        <input type="hidden"  name="amount" value="{!! $chamber->fixed_new_visit_price !!}">
                                    @endif
                                    @if(isset($amount) && $amount != null)
                                        <input type="hidden"  name="amount" value="{!! $amount !!}">
                                    @endif
                                    <input type="hidden"  name="doctor_schedule_id" value="{!! $doctor_schedule_id !!}">
                                    <input type="hidden"  name="datetime" value="{!! $dateTime !!}">
                                    <input type="hidden"  name="doctor_info" value="{{ json_encode($doctor) }}">
                                    <input type="hidden"  name="booking_time" value="{!! $booking_time !!}">
                                    <input type="hidden"  name="booking_date" value="{!! $booking_date !!}">

                                    <div class="col-md-12">
                                        <button class="btn confirm_btn apply_btn">Apply</button>
                                    </div>
                                    @if(isset($result) && $result->status_code == 400 && $result->status == 'error')
                                        <div id="invalid_promo_msg" >
                                            <p class="promo_msg">{{$result->message}}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="doc-single request-appointment">
                        <div class= 'req-app-form user-info-form'>
                            <div class="m-t-10px">
                                <p class="promo-title">Patient Details</p>
                            </div>
                            {!! Form::open(['route' => 'frontend.tele-medicine.confirm-appointment', 'method' => 'POST', 'data-parsley-validate','class'=>'book-an-appointment']) !!}
                            <input type="hidden" value="{!! csrf_token() !!}" name="_token">
                            <input type="hidden"  name="doctor_info" value="{{json_encode($doctor)}}">
                            @if(isset($result) && $result->status_code == 200)
                                <input type="hidden"  name="discount_amount" value="{{ $result->promocode_info->amount}}">
                            @endif
                            <input type="hidden"  name="doctor_schedule_id" value="{!! $doctor_schedule_id !!}">
                            <input type="hidden"  name="datetime" value="{!! $dateTime !!}">
                            <input type="hidden"  name="booking_time" value="{!! $booking_time !!}">
                            <input type="hidden"  name="booking_date" value="{!! $booking_date !!}">
                            <input type="hidden" id="promocode" name="promocode" value="">

                            <div class="form-group country-code-n" >
                                <p class="text-bold">Full Name</p>
                                <div class="form-inline">
                                    {!! Form::text('user', isset($user->name) ? $user->name: '', ['placeholder' => 'Enter Your Name',   'class' => 'form-control']) !!}
                                </div>

                            </div>
                            <div class="form-group country-code-n" >
                                <p class="text-bold">Gender</p>
                                <div class="form-inline padding-leftright-10">
                                    {!! Form::text('gender', isset($user->gender) ? $user->gender: '', ['aria-describedby' => "basic-addon1",'required' => 'required',
                                                                                      'placeholder' => 'Enter Your Gender',   'class' => 'form-control',
                                      ]) !!}
                                </div>

                            </div>
                            <div class="form-group country-code-n" >
                                <p class="text-bold">Age</p>
                                <div class="form-inline">
                                    {!! Form::number('age', isset($claimer_age_in_years) ? $claimer_age_in_years: '', ['aria-describedby' => "basic-addon1",'required' ,
                                                                                      'placeholder' => 'Enter Your Age',   'class' => 'form-control','oninput'=>"validity.valid||(value='')",'min'=>'1'
                                      ]) !!}
                                </div>

                            </div>

                            <div class="form-group country-code-n" >
                                <p class="text-bold">{{__('find_doctor.appointment.contact_number')}}</p>
                                <div class="form-inline">
                                    {!! Form::text('contact_number', $contactNumber, ['aria-describedby' => "basic-addon1",
                                                                                      'placeholder' => __('find_doctor.appointment.placeholder.mobile'),   'class' => 'form-control',
                                                                                      'required' => 'required', 'data-parsley-required-message' => __('find_doctor.appointment.message.mobile_number'),
                                                                                         //'data-parsley-pattern'          => '^(?:\+?88)?01[15-9]\d{8}$',
                                                                                      'data-parsley-pattern'          => '^[1-9][0-9]{0,10}$',
    'data-parsley-length' =>'[10, 10]',
                                                                                      'data-parsley-pattern-message' => __('find_doctor.appointment.message.valid_number'),

    'data-parsley-length-message' =>'mobile number should be valid',
                                                                                      'data-parsley-errors-container' => '#contactError',
                                                                                      'data-parsley-trigger'          => 'change focusout']) !!}
                                </div>

                            </div>
                            <div class="col-md-12">
                                <button class="btn confirm_btn">Confirm</button>
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                    {{--            </div>--}}
                </div>
            </div>
        </div>
@endsection
@section('before-scripts-end')
    <script>
        $(document).ready(function(){
            $("#invalid_promo_msg").fadeIn(4000).delay(2000).fadeOut("slow");
            var promocode =  $(".promocode").val();
            $("#promocode").val(promocode);
        });
    </script>
@endsection
