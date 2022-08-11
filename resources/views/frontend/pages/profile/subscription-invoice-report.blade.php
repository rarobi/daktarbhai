@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'Subscription history | ' . app_name()  !!}
@endsection

@section('main-content')
    {{--{!! dd($subscriptionHistory) !!}--}}
    <div class="bhoechie-tab-content active subscription-status">
            {{-- Subscription details --}}
            <div class="col-md-10 padding-leftright-null">
                <div class="bhoechie-tab-content active">
                    <div class="subscriptions-history my-questions">
                        <div class="col-md-10 padding-left-null">
                            <!-- <div class="user-profile">
                              <h2>Subscriptions Details</h2><br>
                            </div> -->
{{--                            {{dd($invoiceInformation)}}--}}
                            <div class="table-responsive sub-history sub-details">
                                <table class="table" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Subscription Invoice</th>
                                        <th></th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($invoiceInformation))
                                        <tr>
                                            <th>Payment Date</th>
                                            <td>{!!isset($invoiceInformation->payment_date) ? $invoiceInformation->payment_date : 'Not Provided' !!}</td>

                                        </tr>

                                        <tr>
                                            <th>Payment Method</th>
                                            <td>{!!isset($invoiceInformation->payment_method) ? $invoiceInformation->payment_method : 'Not Provided' !!}</td>


                                        </tr>
{{--                                        <tr>--}}
{{--                                            --}}{{--                                                <td></td>--}}
{{--                                            <th>Payment Media</th>--}}
{{--                                            <td>{!!isset($invoiceInformation->payment_media) ? $invoiceInformation->payment_media : 'Not Provided' !!}</td>--}}
{{--                                            <td>--}}
{{--                                            @if($invoiceInformation->payment_method == 'Bkash' || $invoiceInformation->payment_method == 'SSL-Commerz')--}}
{{--                                                {{'Digital Media'}}--}}
{{--                                            @else--}}
{{--                                                {{'Cash'}}--}}
{{--                                            @endif--}}
{{--                                            </td>--}}

{{--                                        </tr>--}}

                                        <tr>
                                            <th>Transaction Price</th>
                                            <td>{!!isset($invoiceInformation->transaction_price) ? $invoiceInformation->transaction_price : 'Not Provided' !!}tk</td>

                                        </tr>
                                        <tr>
                                        <tr>
                                            <th>Financial Transaction ID</th>
                                            <td>{!!isset($invoiceInformation->internal_trx_id) ? $invoiceInformation->internal_trx_id : 'Not Provided' !!}</td>

                                        </tr>
                                        <td><a href="{!! url('profile/subscription-history') !!}"> <i class="ion-ios-undo"></i> Subscription History</a></td>
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
@endsection

@section('after-scripts')

    <script>
        function userUnsubscribe(subHisId, provider, planId){

            swal({
                title: "Are you sure?",
                text: "Your subscription plan will be disable",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#ed1c24',
                confirmButtonText: 'Yes, I am sure!',
                cancelButtonText: "No, cancel it!",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(function(isConfirm) {

                if(isConfirm) {
                    var response    =   $.post("{!! route("frontend.subscription.disable") !!}",{'history_id':parseInt(subHisId),'provider':provider,'plan_id':planId,'_token':'{!! csrf_token() !!}'});
                    response.done(function( data ) {

                        if(data.status_code == 200) {
                            $('.disable').remove();
                            swal({
                                text: "Successfully unsubscribe Daktarbhai",
                                type: "success",
                                confirmButtonColor: '#2ab5e7',
                                confirmButtonText: 'Ok',
                                showCancelButton: false,
                            })

                        } else {
                            swal(data.status);
                        }
                    });
                    response.fail(function(data){
                        console.log('failed to unsubscribe');
                    });
                }

            });
        }



        function blinkUserUnsubscribe(membershipId, mobile, planSlug){
            swal({
                title: "Are you sure?",
                text: "Your subscription plan will be disable",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#ed1c24',
                confirmButtonText: 'Yes, I am sure!',
                cancelButtonText: "No, cancel it!",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(function(isConfirm) {

                if(isConfirm) {
                    var response    =   $.post("{!! route("frontend.blink-subscription.disable") !!}",{'customer_membership_id':membershipId,'customer_mobile':mobile,'plan_slug':planSlug,'_token':'{!! csrf_token() !!}'});
                    response.done(function( data ) {

                        if(data.status_code == 200) {
                            $('.disable').remove();
                            swal({
                                text: "Successfully unsubscribe Daktarbhai",
                                type: "success",
                                confirmButtonColor: '#2ab5e7',
                                confirmButtonText: 'Ok',
                                showCancelButton: false,
                            })

                        } else {
                            swal(data.status);
                        }
                    });
                    response.fail(function(data){
                        console.log('failed to unsubscribe');
                    });
                }

            });
        }
    </script>

@endsection
