@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'Tele Medicine Appointment History'!!}
@endsection

    <style>
        .btn-alt.small.active {
            font-weight:  600!important;

        }
        .btn-alt.small.active:hover {
            background-color: #FF6D00 !important;
            color: #ffffff !important;

        }
        .phr-action {
            margin-top: 15px;
        }

        .phr-action a {

            font-size: 15px !important;
        }
        .appoinment-status{
            background: #ffffff!important;
            border-bottom: none !important;
        }
        .appoinment-top{
            height: 35px!important;
        }
        .join-btn{
            background-color: #00a65a !important;

        }
        .phr-alert.alert.alert-success {
            background-color: #fff;
        }
        .phr-alert.alert.alert-danger {
            background-color: #fff;
        }

        a.btn-alt.small.active {
            border-radius: 5px !important;
            border: 1px solid #36B7B4 !important;
        }

        .appoinment-top span {
            color: #efb300 !important;

        }

        button.btn.btn-sm.btn-alt.small.active.doc-btn.pay-now{
            background: #F7941E !important;
            border: 1px solid #F7941E !important;

        }

        .appoinment-date p, h6{
            color: #1B1B1B;
        }

        .doc-images img {
            width: 50% !important;
            border-radius: 100px !important;
            height: 200px !important;
        }

        @media screen and (min-width: 481px)and (max-width: 776px){
            .profole-content {
                margin-top: 160px;
            }
        }

        @media (max-width: 768px){
            .doc-images img {
                width: 60% !important;
                margin-left: -10px !important;
                height: 225px !important;
            }
        }

    </style>

@section('main-content')
{{--    {!! dd(session('success')) !!}--}}
        <div class="bhoechie-tab-content active profole-content">
            @if(isset($status))
                <div class="phr-alert alert alert-success" id="success-alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>Success! </strong>
                    {!! $status !!}
                </div>
            @endif
            @if(isset($success))
                <div class="phr-alert alert alert-success subscription-done" id="success-alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {!! $success !!}
                </div>
            @endif
            @if(isset($error))
                <div class="phr-alert alert alert-danger subscription-done" id="success-alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {!! $error !!}
                </div>
            @endif
            @if(count($user_telemedicine_history)>0)
            <div class="col-md-3 phr-action pull-right">
                <a href="{!! url('tele-medicine/doctor-specialities') !!}"><i class="ion-compose"></i> Create Appointment</a>
            </div>
            @endif
            <h3 class="profile-title appoinment">Video Call To a Doctor History</h3>


            <div class="appoinment-history">
                @if(count($user_telemedicine_history)>0)
                    @foreach($user_telemedicine_history as $history)
                    <div class="col-md-6">
                        <div class="doc-single search-list " style="background-color: #ffffff">
                            <div class="col-md-12 padding-sm">
                                <div class="doc-images text-center">
                                    <a href="">
                                        <img src="{{ (isset($history) && isset($history->doctor->image) && $history->doctor->image !=null) ? url('/').$appointment->doctor->image : asset('assets/img/doctor-grey.png') }}" class="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="doctor-info">
                                    <h4 class="margin-bottom-small">
                                        <h4>{{ (isset($history->doctor_name)) ? $history->doctor_name : ''  }}</h4><br>
                                        <h6>{{ (isset($history->speciality)) ? $history->speciality :     ''  }}</h6>
                                    </h4>
                                    <div class="appoinment-date">
                                        <p class="margin-bottom-null">{{__('profile.appointment_history.appointment_date')}}</p>
                                        <h6>{{ $history->booking_date }} {{ $history->booking_time }}</h6>
                                    </div>
                                    <div class="margin-bottom-small">
                                        {{--                                        <div class="col-md-2"></div>--}}
                                        @if($history->booking_status == 'approved')
                                            <div class="appoinment-top appoinment-status appoinment-date">
                                                <p class="margin-bottom-null">Booking Status:
                                                    <span class="">{!! ucfirst($history->booking_status)  !!} </span>&nbsp;
                                                </p>
                                            </div>
                                        @elseif($history->booking_status == 'pending')
                                            <div class="appoinment-top appoinment-status  appoinment-date">
                                                <p class="margin-bottom-null">Booking Status:
                                                    <span class="">{!! ucfirst($history->booking_status)  !!} </span>
                                                </p>
                                            </div>
                                        @else
                                            <div class="appoinment-top appoinment-status  appoinment-date">
                                                <p class="margin-bottom-null">Booking Status:
                                                    <span class="">{!! ucfirst($history->booking_status)   !!} </span>
                                                </p>
                                            </div>
                                        @endif
                                        {{--                                            <div class="col-md-2"></div>--}}

                                    </div>
                                    @if($history->payment_status == true)
                                        <div class="appoinment-top appoinment-status  appoinment-date">
                                            <p class="margin-bottom-null">Payment Status:
                                                <span class="">{{ 'Paid'}} </span>&nbsp;
                                            </p>
                                        </div>
                                    @else
                                        <div class="appoinment-top appoinment-status  appoinment-date">
                                            <p class="margin-bottom-null">Payment Status:
                                                <span class="">{{ 'Unpaid' }}</span>
                                            </p>
                                        </div>
                                    @endif
{{--                                    <div class="col-md-12">--}}
                                        <div class="col-md-6 col-md-offset-3 margin-bottom-small">
{{--                                            <div class="col-md-4"> </div>--}}
{{--                                            <div class="col-md-4">--}}
                                                @if($history->booking_status == 'pending' && $history->payment_status == false)
                                                    {!! Form::open( ['route' => ['frontend.tele-medicine.payment-info'], 'method' => 'GET','class' =>'form-horizontal login', 'data-parsley-validate']) !!}
                                                    <input type="hidden" name="consultancy_fee" value="{!! $history->chamber_visit_price_fee !!}">
                                                    <input type="hidden" name="params" value="{{json_encode($history)}}">
                                                    <button class="btn btn-sm btn-alt small active doc-btn pay-now" style="float: none">Pay Now</button>
                                                    {!! Form::close() !!}
                                                @endif
                                                @if($history->booking_status == 'approved' && $history->payment_status == true && !is_null($history->meeting_url))
                                                    <a href="{!! $history->meeting_url !!}" class="btn btn-sm btn-alt small active doc-btn join-btn" style="float: none">Join</a>
                                                @endif
{{--                                            </div>--}}
{{--                                            <div class="col-md-4"> </div>--}}

                                        </div>


{{--                                    </div>--}}
                                    <div class="col-md-6 col-md-offset-3 margin-bottom-small">
                                        <a href="{!! route('frontend.tele-medicine.request-details',$history->id) !!}" class="btn btn-sm btn-alt small active doc-btn" style="float: none">Details</a>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                    @endforeach
                @else
                    <div class="phr-create-img">
{{--                        <img src="{!! asset('assets/img/appoinment.png') !!}" alt="">--}}
                        <img src="{!! asset('assets/img/phr/no-data.png') !!}" alt="">
                    </div>
                    <p class="text-center padding-sm profile-create-new">{{__('profile.appointment_history.msg.book_appointment')}}
                        <a href="{!!  url('tele-medicine/doctor-specialities') !!}" class="btn-alt small active doc-btn">Book a Video Call Appointment
                            <i class="fa fa-plus-circle"></i>
                        </a>
                    </p>
                @endif
            </div>

        </div>
{{--    </div>--}}

{{--  </div>--}}
@endsection

@section('after-scripts')

@endsection
