@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'Video Call To A Doctor| ' . app_name()  !!}
@endsection

<style>
    .table {
        border: none !important;
    }
    .sub-history th {

         color: #2F2F2F !important;
         padding: 0 !important;
         border-bottom: 1px solid #36B7B4 !important;
    }

    .sub-history table td {

        /*border-bottom: 1px solid #36B7B4 !important;*/

    }
</style>


@section('main-content')
    <div class="bhoechie-tab-content active subscription-status">

{{--        @if(isset($status))--}}
{{--            <div class="phr-alert alert alert-success subscription-done" id="success-alert">--}}
{{--                <button type="button" class="close" data-dismiss="alert">x</button>--}}
{{--                {!! $status !!}--}}
{{--            </div>--}}
{{--        @endif--}}
        <div class="subscriptions-history my-questions">
            <div class="col-md-12 padding-leftright-null">
                <div class="bhoechie-tab-content active">
                    <div class="subscriptions-history my-questions">

                        </div>
                        <div class="col-md-8 padding-left-null">

                                <div class="table-responsive sub-history sub-details">
                                    <table class="table" width="50%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th style="padding: 20px; border-right: 1px solid #36B7B4 ">Video Call To A Doctor Details</th>
{{--                                            <th>Request Test</th>--}}
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>
{{--                                                {{dd($result->request_id)}}--}}
                                                @if($telemedicine->payment_status == true)
                                                    <a href="{!!  route('frontend.tele-medicine.invoice-report',$telemedicine->id) !!}"><i class="ion-android-open"></i> Invoice Report</a>
                                                @endif
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($telemedicine))
{{--                                            {{dd($telemedicine)}}--}}
                                            <tr>
                                                <th style="padding: 20px; border-right: 1px solid #36B7B4">Customer name</th>
                                                <td>{!!isset($telemedicine->customer_name) ? $telemedicine->customer_name : '' !!}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
{{--                                                <td></td>--}}
                                            </tr>
                                            <tr>
                                                <th style="padding: 20px; border-right: 1px solid #36B7B4 ">Booking Date</th>
                                                <td>{!!isset($telemedicine->booking_date) ? $telemedicine->booking_date : '' !!}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                {{--                                                <td></td>--}}
                                            </tr>
                                            <tr>
                                                <th style="padding: 20px; border-right: 1px solid #36B7B4 ">Booking Time</th>
                                                <td>{!!isset($telemedicine->booking_time) ? $telemedicine->booking_time : '' !!}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                {{--                                                <td></td>--}}
                                            </tr>
                                            <tr>
                                                <th style="padding: 20px; border-right: 1px solid #36B7B4">Doctor Name:</th>
                                                <td>{!!isset($telemedicine->doctor_name) ? $telemedicine->doctor_name : '' !!}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>

                                            <tr>
                                                    <th style="padding: 20px; border-right: 1px solid #36B7B4">Speciality</th>
                                                    <td>{!!isset($telemedicine->speciality) ? $telemedicine->speciality : '' !!}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                            </tr>

                                            <tr>
                                                <th style="padding: 20px; border-right: 1px solid #36B7B4;">Booking Status</th>
                                                <td>{!!isset($telemedicine->booking_status) ? ucfirst($telemedicine->booking_status) : '' !!}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th style="padding: 20px; border-right: 1px solid #36B7B4;">Current Status</th>
                                                <td>{!!isset($telemedicine->current_status) ? ucfirst($telemedicine->current_status) : '' !!}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th style="padding: 20px !important; border-right: 1px solid #36B7B4 ">Payment Status</th>
                                                <td>
{{--                                                    {!!isset($telemedicine->payment_status) ? ucfirst($telemedicine->payment_status)  : '' !!}--}}
                                                    @if(isset($telemedicine->payment_status))
                                                        @if($telemedicine->payment_status == true)
                                                            {{'Paid'}}
                                                        @else
                                                            {{'Unpaid'}}
                                                        @endif
                                                    @endif
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 20px !important; border-right: 1px solid #36B7B4 "><a href="{!! url('tele-medicine/appointment-history') !!}"> <i class="ion-ios-undo"></i> Video Call To A Doctor History</a></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>

                                </div>


                            </div>


                    </div>
                </div>
            </div>
    </div>

  </div>
@endsection

@section('after-scripts')

@endsection
