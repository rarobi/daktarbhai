@extends('frontend.layouts.emails.master')

@section('title', 'Book appointment Confirmation')

@section('after-styles-end')
    <style>

    </style>
@endsection

@section('content')
    <table class="spacer" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="16px" style="font-size: 16px; line-height: 16px; word-wrap: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; mso-line-height-rule: exactly; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; margin: 0; padding: 0;" align="left" valign="top"> </td>
        </tr></tbody></table><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: table; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th class="small-12 large-12 columns first last" style="width: 564px; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 auto; padding: 0 16px 16px;" align="left">
                <table style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0; padding: 0;" align="left">
                            <h6 style="color: #666666; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 500; text-align: left; line-height: 1.3; word-wrap: normal; font-size: 14px; margin: 0 0 0 20px; padding: 5px 10px 5px 0;" align="left">{!! $confirmation !!}</h6>
                        </th>
                        <th class="expander" style="visibility: hidden; width: 0; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0; padding: 0;" align="left"></th>
                    </tr></table></th>
        </tr></tbody></table><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: table; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th class="small-12 large-4 columns first" style="width: 177.33333px; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 auto; padding: 0 20px;" align="left">
                <h6 style="color: #666666; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 500; text-align: left; line-height: 1.3; word-wrap: normal; font-size: 14px; margin: 0 0 0 20px; padding: 5px 10px 5px 0;" align="left">Check Below for your Appointment Details:
                </h6>
                <table class="callout" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; margin-bottom: 16px; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0 50px;" align="left"><th class="callout-inner secondary" style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; width: 100%; background: #fff; margin: 0; padding: 20px; border: 1px none #444444;" align="left" bgcolor="#fff">
                            <table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: table; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th class="small-12 large-4 columns first" style="width: 33.33333%; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 auto; padding: 0;" align="left">
                                        <table style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0; padding: 0;" align="left">
                                                    <p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; background: #f2f2f2; margin: 1px; padding: 7px 10px;" align="left"><strong>Booking Status</strong><span style="font-weight: 700; padding: 0 10px;">:</span>
                                                        @if($booking_status== 'cancel')
                                                        <strong style="color: #ac050b; font-weight: 700;">{{ ('Canceled') }}</strong>
                                                        @else
                                                        <strong style="color: #4F8A10; font-weight: 700;">{{ ('Approved') }}</strong>
                                                        @endif
                                                    </p>
                                                    <p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; background: #f2f2f2; margin: 1px; padding: 7px 10px;" align="left"> <strong>User Name</strong><span style="font-weight: 700; padding: 0 10px;">:</span><strong>{{ ucwords($name) }}</strong></p>
                                                    <p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; background: #f2f2f2; margin: 1px; padding: 7px 10px;" align="left"> <strong>Contact Number</strong><span style="font-weight: 700; padding: 0 10px;">:</span><strong>{{ $contact_number }}</strong></p>
                                                    <p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; background: #f2f2f2; margin: 1px; padding: 7px 10px;" align="left"> <strong>Doctor Name</strong><span style="font-weight: 700; padding: 0 10px;">:</span><strong>{{ $doctorname }}</strong></p>
                                                    <p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; background: #f2f2f2; margin: 1px; padding: 7px 10px;" align="left"> <strong>Doctor Qualification</strong><span style="font-weight: 700; padding: 0 10px;">:</span>{{ $doctor_qualification }}</p>
                                                    @if($designation)
                                                        <p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; background: #f2f2f2; margin: 1px; padding: 7px 10px;" align="left"> <strong>Designation</strong><span style="font-weight: 700; padding: 0 10px;">:</span>
                                                            {{ $designation }}
                                                        </p>
                                                    @else
                                                    @endif
                                                    <p style="color: #ac050b; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; background: #f2f2f2; margin: 1px; padding: 7px 10px;" align="left"> <strong>Appoinment Time</strong><span style="font-weight: 700; padding: 0 10px;">:</span>{{ $booking_time }}
                                                        @if($previous_booking_time)
                                                            (<span style="color: #9c0033; font-weight:bold ">Rescheduled</span>)
                                                        @endif
                                                    </p>
                                                    <p style="color: #ac050b; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; background: #f2f2f2; margin: 1px; padding: 7px 10px;" align="left"> <strong>Appointment Date</strong><span style="font-weight: 700; padding: 0 10px;">:</span>{{ $booking_date }}</p>
                                                    <p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; background: #f2f2f2; margin: 1px; padding: 7px 10px;" align="left"> <strong>Appointment For</strong><span style="font-weight: 700; padding: 0 10px;">:</span>{{ $appointment_for }}</p>
                                                    <p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; background: #f2f2f2; margin: 1px; padding: 7px 10px;" align="left"> <strong>Chamber Name</strong><span style="font-weight: 700; padding: 0 10px;">:</span><strong>{{ $chamber_name }}</strong></p>
                                                </th>
                                            </tr></tbody></table></th>
                                </tr></tbody></table></th>
                        <th class="expander" style="visibility: hidden; width: 0; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0; padding: 0;" align="left"></th>
                    </tr></tbody></table></th>
        </tr></tbody></table>
    <p style="font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 0 10px 20px; padding: 0px 20px;" align="left">For Further Inquiry Contact Us at: <span style="color: #ed1c24 ;"> 16643</span></p><br><br>
    <p style="font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 0 10px 20px; padding: 0px 20px;" align="left">Thank you for using <span style="color: #ac050b;">Daktarbhai</span></p>
    <p style="font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 0 10px 20px; padding: 0px 20px;" align="left">The <span style="color: #ac050b;">Daktarbhai</span> Team</p>
@endsection