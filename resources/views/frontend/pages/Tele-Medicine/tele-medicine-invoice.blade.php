@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'Video Call To A Doctor| ' . app_name()  !!}
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
{{--{{dd($invoice->invoice_details,1)}}--}}
                        <div class="col-md-12 padding-left-null">

                                <div class="table-responsive sub-history sub-details">
                                    <table class="table" width="50%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Video Call To A Doctor Invoice</th>
{{--                                            <th>Request Test</th>--}}
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($invoice))
                                            {{--                                            {{dd($invoice)}}--}}
                                            <tr>
                                                <th>Payment Date.</th>
                                                <td>{!!isset($invoice->invoice_details->payment_date) ? $invoice->invoice_details->payment_date : 'Not Provided' !!}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>

                                            <tr>
                                                <th>Payment Method</th>
                                                <td>{!!isset($invoice->invoice_details->payment_media) ? $invoice->invoice_details->payment_media : 'Not Provided' !!}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>

                                            </tr>
                                            <tr>
                                                <th>Transaction Price</th>
                                                <td>{!!isset($invoice->invoice_details->transaction_price) ? $invoice->invoice_details->transaction_price . 'tk' : 'Not Provided' !!}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th>Financial Transaction ID.</th>
                                                <td>{!!isset($invoice->invoice_details->internal_trx_id) ? $invoice->invoice_details->internal_trx_id : 'Not Provided' !!}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <td><a href="{!! url('tele-medicine/appointment-history') !!}"> <i class="ion-ios-undo"></i>Video Call To A Doctor History</a></td>
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
