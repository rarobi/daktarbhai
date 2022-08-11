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
                            <div class="table-responsive sub-history sub-details">
                                <table class="table" width="50%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th style="border-right: 1px solid #36B7B4">Subscription Details</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>
                                            <a href="{!! route('frontend.user.invoice-report', $subHisId) !!}"><i class="ion-android-open"></i> Invoice Report</a>
                                        </th>
                                        <th>
{{--                                            <a href="{!! route('frontend.download.user.single.invoice', $subHisId) !!}"><i class="ion-android-open"></i> Invoice</a>--}}
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($subscriptionHistory))
                                    <tr>
                                        <td style="border-right: 1px solid #36B7B4">User Name</td>
                                        <td>{!! isset($user->name) ? $user->name : 'Not Provided' !!}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #36B7B4">Plan Name</td>
                                        <td>{!! isset($subscriptionHistory->plan_name)?$subscriptionHistory->plan_name:'Not Provided' !!}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #36B7B4">Plan duration</td>
                                        <td>{!! isset($subscriptionHistory->plan_duration)?$subscriptionHistory->plan_duration:'Not Provided' !!} days </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #36B7B4">Provider name</td>
                                        <td>{!! isset($subscriptionHistory->provider_name)?$subscriptionHistory->provider_name:'Not Provided' !!}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #36B7B4">Payment method</td>
                                        <td>{!! isset($subscriptionHistory->payment_method) ? $subscriptionHistory->payment_method : 'Not Provided' !!}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #36B7B4">Transaction number</td>
                                        <td>{!! isset($subscriptionHistory->transaction_id) ? $subscriptionHistory->transaction_id : 'Not Provided' !!}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #36B7B4">Plan Original Price</td>
                                        <td>{!! isset($subscriptionHistory->plan_original_price) ? 'BDT '.$subscriptionHistory->plan_original_price : 'Not Provided' !!}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #36B7B4">Transaction Price</td>
                                        <td>{!! isset($subscriptionHistory->transaction_price) ? 'BDT '.$subscriptionHistory->transaction_price : 'Not Provided' !!}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #36B7B4">Discount Amount</td>
                                        <td>{!! isset($subscriptionHistory->discount_amount) ? 'BDT '.$subscriptionHistory->discount_amount : 'Not Provided' !!}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #36B7B4">Discount Percentage</td>
                                        <td>{!! isset($subscriptionHistory->discount_in_percentage) ? $subscriptionHistory->discount_in_percentage.'%': 'Not Provided' !!}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td style="border-right: 1px solid #36B7B4">Purchased Date</td>
                                        <td>{!! isset($subscriptionHistory->purchased_date)?$subscriptionHistory->purchased_date:'Not Provided' !!}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #36B7B4">Activation Date</td>
                                        <td>{!! isset($subscriptionHistory->activation_date)?$subscriptionHistory->activation_date:'Not Provided' !!} </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #36B7B4">Expire Date</td>
                                        <td>{!! isset($subscriptionHistory->expire_date)?$subscriptionHistory->expire_date:'Not Provided' !!} </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    @if(isset($subscriptionHistory->agent_code) && isset($subscriptionHistory->agent_name))
                                        <tr>
                                            <td style="border-right: 1px solid #36B7B4">Agent Code</td>
                                            <td>{!! isset($subscriptionHistory->agent_code)?$subscriptionHistory->agent_code:'Not Provided' !!} </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="border-right: 1px solid #36B7B4">Agent Name</td>
                                            <td>{!! isset($subscriptionHistory->agent_name)?$subscriptionHistory->agent_name:'Not Provided' !!} </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td style="border-right: 1px solid #36B7B4"><a href="{!! url('profile/subscription-history') !!}"> <i class="ion-ios-undo"></i> Subscription History</a></td>
                                        @if($subscriptionHistory->sub_status)
                                            @if(preg_match("/bl/", $subscriptionHistory->plan_slug))
                                                <td><a href="#"  class="disable" onclick = blinkUserUnsubscribe('{!! $user->username !!}','{!! $user->mobile !!}','{!! $subscriptionHistory->plan_slug !!}')> <i class="ion-android-remove-circle"></i> Disable Subscription</a> </td>
                                            @else
                                            <td><a href="#"  class="disable" onclick = userUnsubscribe('{!! $subscriptionHistory->id !!}','{!! $subscriptionHistory->provider_name !!}','{!! $subscriptionHistory->plan_id !!}')> <i class="ion-android-remove-circle"></i> Disable Subscription</a> </td>
                                            @endif

                                        @else
                                            <td></td>
                                        @endif

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
