@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'Appointment history | ' . app_name()  !!}
@endsection

<style>
    .modal-content{
        top: 100px !important;
    }
    .modal-body {
        height: 180px;
    }

    .modal-header{
        background: #f9f9f9;
        /*background: #e6fff9;*/
    }

    .modal-header .close {
        margin-top: -23px !important;
        color: #FF6D00!important;
        opacity: 2!important;
    }

    .from-bg{
        background: none !important;
        border-radius: 0!important;
        margin-top: 0!important;
    }

    .feedback{
        display: none;
    }

    .feedback-btn {
        margin-top: 15px;
    }

    .text_style{
        font-size: 15px!important;
        font-weight: 500!important;
        font-family: "Poppins", "SolaimanLipi", sans-serif!important;
        margin-bottom: 10px;
    }

    .form-control {
        /*padding: 0 !important;*/
        color: #555 !important;
        border: 1px solid #ccc !important;
        border-radius: 5px !important;
        width: 100% !important;
    }

    span.confirm{
        color: #36B7B4 !important;
    }

    span.confirm a{
        color: #36B7B4 !important;
    }

    .appoinment-date p, h6{
        color: #1B1B1B;
    }

    .doc-images img {
        width: 50% !important;
        /* padding: 15px 25px 15px 0; */
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
    <div class="bhoechie-tab-content active profole-content">
        <h3 class="profile-title appoinment">{{__('profile.appointment_history.title')}}</h3>
        <div class="appoinment-history">
            @if(session('data'))
                <div class="doc-single bg-sucess alert" id="success-alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <div class="col-md-2">
                        <img src="{!! asset('assets/img/confirm-appoinment.png') !!}" class="appoinment-con-img" alt="">
                    </div>
                    <div class="col-md-10 con-content">
                        <strong>{{__('profile.appointment_history.thank_you')}} </strong>
                        {{--<p>We have <span class="text-bold">received</span> your appointment request. Please expect a <span class="text-bold">call</span> from one of our patient representatives soon to confirm this appointment.--}}
                        <p>{{__('profile.appointment_history.msg.received_request')}}
                            {{--<br>Please note our agent will only call you between the time <span class="text-bold">8 am to 10 pm.</span>--}}
                            <br>{{__('profile.appointment_history.msg.agent_call')}}
                            {{__('profile.appointment_history.msg.further_action')}}
                        </p>
                    </div>
                </div>
            @endif
            @if(isset($appointments) && $appointments != null)
                {{--                {{dd($appointments)}}--}}
                @foreach($appointments as $appointment)
                    <div class="col-md-5 padding-left-null">
                        <div class="doc-single search-list " style="background-color: #ffffff">
                            <div class="col-md-12 padding-sm">
                                <div class="doc-images text-center">
                                    <a href="">
                                        <img src="{{ (isset($appointment) && isset($appointment->doctor->image) && $appointment->doctor->image !=null) ? url('/').$appointment->doctor->image : asset('assets/img/doctor-grey.png') }}" class="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12 text-center margin-bottom-small">
                                <div class="doctor-info">
                                    <h4 class="margin-bottom-small">
                                        <h4>{{ (isset($appointment->doctor->name)) ? $appointment->doctor->name : 'DAKTARBHAI'  }}</h4>
                                    </h4>
                                    @if(isset($doctor->specialities) && $doctor->specialities != null)
                                        <div class="address-wrap">
                                            <div class="address-left">
                                                <ul class="doc-specil">
                                                    <li>
                                                        {!! $doctor->specialities or '' !!}
                                                        {{ \Illuminate\Support\Str::limit($doctor->specialities, 140, $end='...') }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                    {{--                                          <p class="designation margin-bottom-null">{!! $doctor->qualification or '' !!}</p>--}}
                                    <p class="location margin-null"><i class="ion-ios-location-outline"></i> <span>Chamber</span><br>
                                        {{ isset($appointment->onChamber->chamber_name) ? $appointment->onChamber->chamber_name : 'DAKTARBHAI PANEL HOSPITAL' }}, {{ isset($appointment->onChamber->chamber_address) ? $appointment->onChamber->chamber_address : 'DAKTARBHAI PANEL HOSPITAL' }}</p>

                                    <div class="appoinment-date">
                                        <p class="margin-bottom-null">{{__('profile.appointment_history.appointment_date')}}</p>
                                        <h6>{{ $appointment->booking_date }} {{ $appointment->booking_time }}</h6>
                                    </div>
                                    @if($appointment->is_visit == 1)
                                        <p class="location margin-null"> <span>Doctor visit status:</span>
                                        {{ ($appointment->is_visit && $appointment->is_visit == 1) ? 'Yes' : 'No'  }}
                                        <p class="location margin-null"><i class="fa fa-comment-o"></i> <span>Feedback:</span>
                                        {{$appointment->customer_feedback}}
                                    @else
                                        <p class="location margin-null"><i class="fa fa-user"></i> <span>Doctor visit status:</span>
                                            No
                                    @endif
                                    <div class="">
                                        <div class="col-md-2"></div>
                                            @if($appointment->booking_status == 'Approved')
                                                <div class="col-md-4 text_style">
                                                    <span class="confirm"><i class="ion-checkmark-circled"></i> {{ $appointment->booking_status or '' }} </span>&nbsp;
                                                </div>
                                            @elseif($appointment->booking_status == 'Pending')
                                                <div class="col-md-4">
                                                    <span class="pending"><i class="ion-ios-refresh"></i> {{ $appointment->booking_status or '' }}</span>
                                                </div>
                                            @else
                                                <div class="col-md-4">
                                                    <span class="cancel"><i class="ion-ios-close"></i> {{ $appointment->booking_status or '' }}</span>
                                                </div>
                                            @endif
                                            @if($appointment->is_visit == 1)
                                            </span>
                                                @else
                                                    <div class="col-md-4">
                                                        <span class="confirm">
                                                            <a href="#" data-toggle="modal" data-target="#feedback_modal" data-appointment-id="{{$appointment->appointment_id}}"><i class="fa fa-comment"></i> Feedback</a>
                                                        </span>
                                                    </div>
                                                @endif
                                            <div class="col-md-2"></div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                @endforeach
                @if(isset($appointmentPaginator) && !($appointmentPaginator->total_pages == 1 || $appointmentPaginator->total_pages == 0))
                    <ul class="pagination">
                        @if($appointmentPaginator->current_page > 9)
                            <li><a href="{!! url($rootUrl, ['page' =>$appointmentPaginator->current_page-8 ]) !!}"> << </a></li>
                        @endif
                        @if($appointmentPaginator->previous_page_url != null)
                            <li><a href="{!! url($rootUrl, ['page' => $appointmentPaginator->current_page-1 ]) !!}"><i class="ion-ios-arrow-left"></i> {{__('pagination.previous')}}</a></li>
                        @endif
                        @for($i = 1; $i <= $appointmentPaginator->total_pages; $i++)
                            <li><a @if($i == $appointmentPaginator->current_page) class="bg-brand-color" @endif href="{!! url($rootUrl, ['page' => $i ]) !!}">{!! $i!!}</a></li>
                        @endfor
                        @if($appointmentPaginator->next_page_url != null)
                            <li><a href="{!! url($rootUrl, ['page' => $appointmentPaginator->current_page+1 ]) !!}"><i class="ion-ios-arrow-right"></i> {{__('pagination.next')}}</a></li>
                        @endif
                        @if($appointmentPaginator->current_page < $appointmentPaginator->total_pages-9 )
                            <li><a href="{!! url($rootUrl, ['page' =>$appointmentPaginator->current_page+8 ]) !!}"> >> </a><li>
                        @endif
                    </ul>
                @endif
            @else
                <div class="phr-create-img">
{{--                    <img src="{!! asset('assets/img/appoinment.png') !!}" alt="">--}}
                    <img src="{!! asset('assets/img/phr/no-data.png') !!}" alt="">
                </div>
                <p class="text-center padding-sm profile-create-new">{{__('profile.appointment_history.msg.book_appointment')}}
                    <a href="{!! route('frontend.doctor.index') !!}" class="btn-alt small active doc-btn">{{__('profile.appointment_history.button.book_appointment')}}
                        <i class="fa fa-plus-circle"></i>
                    </a>
                </p>
            @endif
        </div>

        {{--        <div class="modal" id="feedback_modal" role="dialog" tabindex="-1" role="dialog">--}}
        <div class="modal fade" id="feedback_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center">Feedback</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['route'=>'frontend.appointment.feedback', 'class' => "question-form from-bg", 'id'=>'feedback_form', 'method' => 'GET']) !!}
                    <div class="modal-body">
                        {{--                        <p>Modal body text goes here.</p>--}}
                        <div class="form-check form-check-inline">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="text_style" for="Yes">Did you shown the doctor?</label><br>
                                    <label class="text_style"for="form-check-label">{{__('askDoctor.yes')}}</label>
                                    <input class="form-check-input" type="radio" name="is_visit" id="vist_status" value="1" >

                                    <label class="text_style"for="form-check-label">{{__('askDoctor.no')}}</label>
                                    <input class="form-check-input" type="radio" id="vist_status" name="is_visit" value="0" >

                                    <input type="hidden" id="appointment_id" name="appointment_id">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-check form-check-inline feedback">
                            <label class="text_style"for="form-check-label">Are you satisfied?</label><br>
                            {!! Form::select('customer_feedback',[''=>'Select','satisfied' => 'Satisfied', 'dissatisfied' => 'Dissatisfied'],old('customer_feedback'), ['class' => 'form-control customer_feedback form-check-input']) !!}

                        </div>
                        <div class="feedback-btn pull-right">

                            {!! Form::submit("Submit",["class"=>"btn premium-btn"])!!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('before-scripts-end')

    <script>
        $(document).ready(function() {
            $('#feedback_modal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var appointment_id = button.data('appointment-id') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this);
                modal.find('#appointment_id').val(appointment_id);
            })
        });

        $('#feedback_form').on('submit', function(e){
            // console.log('yes');
            e.preventDefault();
            var $form = $( this );
            var redirectURL = "{{ url('profile/appointment-history') }}";
            method = $form.attr( "method" );
            var appointmentId = $form.find('#appointment_id').val();
            var visitStatus = $("input[name='is_visit']:checked").val();
            var customerFeedback = $form.find('.customer_feedback').val();
            // console.log(customerFeedback)
            $.ajax({
                url: "{{route('frontend.appointment.feedback')}}",
                dataType: "json",
                type:"GET",
                data: {
                    appointment_id: appointmentId,
                    visit_status: visitStatus,
                    customer_feedback: customerFeedback,
                },
                success: function (data) {
                    console.log(data);
                    // $('#feedback_modal').hide();

                    $('#feedback_modal').modal('hide');

                    window.location.href = redirectURL;
                }

            });

        });

        $("input[type='radio']").click(function () {
            var value = $("input[name='is_visit']:checked").val();

            if(value == 1){
                $('.feedback').show();
            }
            else {
                $('.feedback').hide();
            }


        })
    </script>

@endsection
