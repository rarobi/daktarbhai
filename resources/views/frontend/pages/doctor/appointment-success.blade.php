@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Appointment success | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap row white">
        <!-- ————————————————————————————————————————————
      ———	Hospital Details
      —————————————————————————————————————————————— -->
        <div class="col-md-6 col-md-offset-3">
            <div class="doc-single hopspital-details request-appointment con-mgs">
                <div class="col-md-12">
                    <div class="request-doc-info">
                        <h5>{{__('appointment.appointment_request')}}:</h5>
                        @if(isset($error) && ($error != null))
                        <p class="text-bold">{{__('appointment.sorry')}},</p>
                        <p>{{__('appointment.message.reject_request')}}
                            {{--We have <span class="text-bold"><a> not received</a></span> your appointment request. --}}
                            {{ $error or '' }} .
                            {{--Please call our agent for further information between the time <span class="text-bold">8 am to 10 pm.</span>--}}
                            {{__('appointment.message.call_agent')}}
                            <br>{{__('appointment.message.another_slot')}} <a href="{!! route('frontend.doctor.show', $doctor_id) !!}" class="text-bold"> {{__('appointment.message.from_here')}}</a>.</p>
                        @else
                        <p class="text-bold">{{__('appointment.thank_you')}}</p>
                        {{--<p>We have <span class="text-bold">received</span> your appointment request. Please expect a <span class="text-bold">call</span> from one of our patient representatives soon to confirm this appointment. Please note our agent will only call you between the time <span class="text-bold">8 am to 10 pm.</span>--}}
                            {{--No need to take any further action.  --}}
                            <p>{{__('appointment.message.received_appointment')}}
                            <br>Back to <a href="{!! route('frontend.index') !!}" class="text-bold">{{__('appointment.home_page')}}</a>.</p>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('before-scripts-end')

@endsection