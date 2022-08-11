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
{{--        {{dd($invoice)}}--}}
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
                                            <th>Sample Collection Invoice</th>
{{--                                            <th>Request Test</th>--}}
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($invoice))
{{--                                            {{dd($invoice)}}--}}
                                            <tr>
                                                <th>Payment Date.</th>
                                                <td>{!!isset($invoice->payment_date) ? $invoice->payment_date : 'Not Provided' !!}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
{{--                                                <td></td>--}}
                                            </tr>

                                            <tr>
{{--                                                <td></td>--}}
                                                <th>Payment Method</th>
                                                <td>{!!isset($invoice->payment_method) ? $invoice->payment_method : 'Not Provided' !!}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>

                                            </tr>
                                            <tr>
{{--                                                <td></td>--}}
                                                <th>Payment By</th>
                                                <td>{!!isset($invoice->payment_media) ? $invoice->payment_media : 'Not Provided' !!}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>

                                            <tr>
                                                <th>Transaction Price</th>
                                                <td>{!!isset($invoice->transaction_price) ? $invoice->transaction_price : 'Not Provided' !!}tk</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th>Financial Transaction ID.</th>
                                                <td>{!!isset($invoice->internal_trx_id) ? $invoice->internal_trx_id : 'Not Provided' !!}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
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
