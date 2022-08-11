@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'Doctor Follow Up Details| ' . app_name()  !!}
@endsection
<style>
    .sub-history th {
        border-bottom: 1px solid #36B7B4 !important;;
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
                                            <th style="border-right: 1px solid #36B7B4">Doctor Follow Up Details</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>
{{--                                                {{dd($result)}}--}}
{{--                                                @if($result->invoice_details != null)--}}
{{--                                                <a href="{!!  route('frontend.sample-collection.invoice-report',$result->request_id) !!}"><i class="ion-android-open"></i> Invoice Report</a>--}}
{{--                                                @endif--}}
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($result))
{{--                                            {{dd($result)}}--}}
                                            <tr>
                                                <th style="border-right: 1px solid #36B7B4">Patient Mobile</th>
                                                <td>{!! isset($result->request->mobile) ? $result->request->mobile : ''  !!}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th style="border-right: 1px solid #36B7B4">Patient Email:</th>
                                                <td>{!!  isset($result->request->email) ? $result->request->email : ''  !!}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th style="border-right: 1px solid #36B7B4">Address:</th>
                                                <td>{!! isset($result->request->address) ? $result->request->address : ''  !!},
                                                    {!! isset($result->request->area) ? $result->request->area : '' !!},
                                                    {!! isset($result->request->district) ? $result->request->district : '' !!},
                                                    {!! isset($result->request->division) ? $result->request->division : '' !!}
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>

                                            <tr>
                                            <tr>
                                                <th style="border-right: 1px solid #36B7B4">Sample Provide Place:</th>
                                                <td>{!!isset($result->request->sample_provide_place) ? $result->request->sample_provide_place : '' !!}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>

                                           <tr>
                                                <th style="border-right: 1px solid #36B7B4">Sample Provide Date:</th>
                                                <td>{!!isset($result->request->sample_provide_date) ?  date(' d F, Y', strtotime($result->request->sample_provide_date)) : '' !!}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th style="border-right: 1px solid #36B7B4">Request Status:</th>
                                                <td>{!!isset($result->request->request_status) ? ucfirst($result->request->request_status) : '' !!}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th style="border-right: 1px solid #36B7B4">Package</th>
                                                <td>{!!isset($result->request->package_name) ? $result->request->package_name : '' !!}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th style="border-right: 1px solid #36B7B4">Tested By:</th>
                                                <td>{!!isset($result->request->tested_by) ? $result->request->tested_by : '' !!}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th style="border-right: 1px solid #36B7B4">Test Result Date:</th>
                                                <td>{!!isset($result->request->test_result_date) ? date(' d F, Y', strtotime($result->request->test_result_date))  : '' !!}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th style="border-right: 1px solid #36B7B4">Test Result:</th>
                                                <td>{!!isset($result->request->test_result) ? ucfirst($result->request->test_result) : '' !!}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th style="border-right: 1px solid #36B7B4">Vaccine Taken:</th>
                                                <td>
                                                    @if(isset($result->request->is_vaccine_taken))
                                                        @if($result->request->is_vaccine_taken == true)
                                                            {{'Yes'}}
                                                        @else
                                                            {{'No'}}
                                                        @endif
                                                    @endif
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            @if($result->request->is_vaccine_taken == true)
                                                <tr>
                                                    <th style="border-right: 1px solid #36B7B4">First Vaccination:</th>
                                                    <td>{!!isset($result->request->vaccination_date_one) ? date(' d F, Y', strtotime($result->request->vaccination_date_one)) : '' !!}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th style="border-right: 1px solid #36B7B4">Second Vaccination:</th>
                                                    <td>{!!isset($result->request->vaccination_date_two) ? date(' d F, Y', strtotime($result->request->vaccination_date_two)) : '' !!}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <th style="border-right: 1px solid #36B7B4">Payment Status</th>
                                                <td>
                                                    @if(isset($result->request->payment_status))
                                                        @if($result->request->payment_status == true)
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
                                                <th style="border-right: 1px solid #36B7B4">Payment Amount:</th>
                                                <td>{!!isset($result->request->payment_amount) ? $result->request->payment_amount : '' !!} BDT</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th style="border-right: 1px solid #36B7B4">Sample Provided:</th>
                                                <td>
                                                    @if(isset($result->request->is_sample_provided))
                                                        @if($result->request->is_sample_provided == true)
                                                            {{'Yes'}}
                                                        @else
                                                            {{'No'}}
                                                        @endif
                                                    @endif
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                            <td style="border-right: 1px solid #36B7B4"><a href="{!! url('/doctor-follow-up/request-list') !!}"> <i class="ion-ios-undo"></i> Doctor Follow Up History</a></td>
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
