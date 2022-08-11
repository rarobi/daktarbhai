@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'Home Pathology History| ' . app_name()  !!}
@endsection


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

                        <div class="col-md-12 padding-left-null">

                                <div class="table-responsive sub-history sub-details">
                                    <table class="table" width="50%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Sample Collection Details</th>
{{--                                            <th>Request Test</th>--}}
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>
{{--                                                {{dd($result->request_id)}}--}}
                                                @if($result->invoice_details != null)
                                                <a href="{!!  route('frontend.sample-collection.invoice-report',$result->request_id) !!}"><i class="ion-android-open"></i> Invoice Report</a>
                                                @endif
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($result))
{{--                                            {{dd($result)}}--}}
                                            <tr>
                                                <th>Tracking No.</th>
                                                <td>{!!  $result->request->tracking_no !!}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
{{--                                                <td></td>--}}
                                            </tr>
                                            <tr>
                                                <th>Test Details:</th>
                                                <td><strong>Test Name</strong></td>
                                                <td><strong>Price</strong></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                                    @foreach($result->request_details as $test)
                                                    <tr>
                                                        <td></td>
                                                    <td>
                                                    {!! $test->test_name !!}
                                                    </td>
                                                            <td>{{$test->test_price}}tk</td>
                                                            <td></td>
                                                            <td></td>
                                                    </tr>
                                                    @endforeach
                                            <tr>
                                                <td></td>
                                                <td>PPE Cost</td>
                                                <td>{!!isset($result->ppe_cost) ? $result->ppe_cost : '' !!}tk</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Sample Collection Cost</td>
                                                <td>{!!isset($result->sample_collection_cost) ? $result->sample_collection_cost : '' !!}tk</td>
                                                <td></td>
                                                <td></td>
                                            </tr>

                                           <tr>
                                                <th>Total Amount</th>
                                                <td>{!! $total_amount !!}tk</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th>Payment Status</th>
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
                                            <td><a href="{!! url('/sample-collection') !!}"> <i class="ion-ios-undo"></i> Sample Collection History</a></td>
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
