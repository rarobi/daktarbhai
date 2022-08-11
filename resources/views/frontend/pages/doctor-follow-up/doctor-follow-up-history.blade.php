@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'Doctor Follow Up History| ' . app_name()  !!}
@endsection
<style>
    .phr-alert.alert.alert-success {
        background-color: #fff;
    }
    .phr-alert.alert.alert-danger {
        background-color: #fff;
    }

    .sub-history th {
        color: #F7941E !important;
    }
</style>

@section('main-content')
    <div class="bhoechie-tab-content active subscription-status">

        @if(isset($status))
            <div class="phr-alert alert alert-success subscription-done" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {!! $status !!}
            </div>
        @endif
        @if(isset($success))
            <div class="phr-alert alert alert-success subscription-done" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {!! $success !!}
            </div>
        @endif
        @if(isset($error))
            <div class="phr-alert alert alert-danger subscription-done" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {!! $error !!}
            </div>
        @endif

        <div class="subscriptions-history my-questions">
            <div class="col-md-12 padding-leftright-null">
                <div class="bhoechie-tab-content active">
                    <div class="subscriptions-history my-questions">

                        </div>

                        <div class="col-md-12 padding-left-null">

                            <div class="table-responsive sub-history">
{{--                                {{dd($follow_up_requests)}}--}}
                                @if(count($follow_up_requests)>0)
                                    <div class="user-profile">
                                        <h2 class="profile-title">{{__('profile.doctor_followup.title')}}</h2><br>
                                    </div>
                                    <table class="table" width="50%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>User Mobile</th>
                                            <th>Email</th>
                                            <th>Sample Provide Date</th>
                                            <th>Status</th>
                                            <th>Payment Status</th>
                                            <th>Payment Amount</th>
                                            <th colspan="2">Action</th>
{{--                                            <th>{{__('profile.subscription_history.table.header.status')}}</th>--}}
                                        </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($follow_up_requests as $follow_up_request)
{{--                                                {{dd($sample_collection_request)}}--}}
                                                <tr>
                                                    <td>{!! $follow_up_request->mobile !!}</td>
                                                    <td>{!! $follow_up_request->email !!}</td>
                                                    <td>{!! date(' d F, Y', strtotime($follow_up_request->sample_provide_date))  !!}</td>
                                                    <td>{!! ucfirst($follow_up_request->request_status) !!}</td>
                                                    <td>
                                                        @if($follow_up_request->payment_status == true)
                                                            <span class="applied">{!! 'Paid' !!}</span>
                                                        @else
                                                            <span class="applied">{!! 'Unpaid' !!}</span>
                                                            @if($follow_up_request->request_status == 'pending' && $follow_up_request->payment_status == false)
                                                                    {!! Form::open( ['route' => ['frontend.doctor-follow-up.payment-info'], 'method' => 'GET','class' =>'form-horizontal login', 'data-parsley-validate']) !!}
                                                                    <input type="hidden" name="request_id" value="{{$follow_up_request->id}}">
                                                                    <input type="hidden" name="payment_amount" value="{{$follow_up_request->payment_amount}}">
                                                                    <button class="btn btn-sm btn-warning">
                                                                        Pay Now
                                                                    </button>
                                                                    {!! Form::close() !!}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>{!! $follow_up_request->payment_amount !!}</td>
                                                    <td>
                                                        {!! Form::open( ['route' => ['frontend.doctor-follow-up.request-details'], 'method' => 'GET','class' =>'form-horizontal login', 'data-parsley-validate']) !!}
                                                        <input type="hidden" name="details" value="details">
                                                        <input type="hidden" name="request_id" value="{{$follow_up_request->id}}">
                                                        <button class="sample_details btn btn-info" style="color: white">
                                                           {{__('profile.subscription_history.table.header.details')}}
                                                        </button>
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                @else
                                    <div class="bhoechie-tab-content active subscription-status">
                                        <h2 class="profile-title" style="line-height: 34px">{{__('profile.doctor_followup.title')}}</h2><br>
                                        <div class="phr-create-img">
{{--                                            <img src="{!! asset('assets/img/not-subscribe.png') !!}" alt="" width="80px">--}}
                                            <img src="{!! asset('assets/img/phr/no-data.png') !!}" alt="">
                                        </div>
                                        <p class="text-center padding-sm create-new">
{{--                                            Looks like you have no Doctor Follow Up Requests! Why not give it a try?--}}
                                            {{__('profile.doctor_followup.msg.never_claimed')}}
                                            <a href='{!! url("doctor-follow-up/packages") !!}'  class="btn-alt small active doc-btn">{{__('profile.subscription_history.button.try_it')}}
                                                <i class="fa fa-plus-circle"></i>
                                            </a>
                                        </p>
                                    </div>
                                @endif





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
