@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'Subscription history | ' . app_name()  !!}
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
{{--                        <div class="col-md-12">--}}

{{--                            @if(isset($subscriptionHistory['active']) && count(($subscriptionHistory['active']))>0)--}}
{{--                                {!! dd($subscriptionHistory['active']) !!}--}}
{{--                                <div class="user-profile">--}}
{{--                                    <h2 class="profile-title">{{__('profile.subscription_history.title')}} </h2><br>--}}
{{--                                </div>--}}
{{--                                @foreach($subscriptionHistory['active'] as $key=>$history)--}}
{{--                                    <div class="col-md-4" style="padding-left: 0">--}}
{{--                                        <a class="subDetails plan-card" href="{!! route('frontend.subscription.invoice.details',['id'=>$history->id]) !!}" >--}}
{{--                                            <div class="panel panel-default">--}}
{{--                                                <div class="panel-heading border-none">--}}
{{--                                                    <div class="ques-meta">--}}
{{--                                                        <div class="sbu-icon">--}}
{{--                                                            <img src="{!! asset('assets/img/'.strtolower($history->plan_name).'.png') !!}" alt="">--}}
{{--                                                        </div>--}}
{{--                                                        <h3>{!! ucfirst($history->plan_name) !!} <span class="plan-price">{!! $history->transaction_price !!} tk</span></h3>--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            @else--}}
{{--                                @if(Cookie::has('_tn') && isset($user) && $user->is_trial_user)--}}
{{--                                    <p style="color: green">{!! 'You are enjoying trial subscription' !!}</p>--}}
{{--                                    <a href='{!! url("subscription/plan") !!}' >Enable Subscription</a>--}}
{{--                                @elseif(Cookie::has('_tn') && isset($user) && !($user->is_subscribed))--}}

{{--                                    <!-- <div class="phr-create-img">--}}
{{--                                        <img src="{!! asset('assets/img/not-subscribe.png') !!}" alt="">--}}
{{--                                    </div> -->--}}
{{--                                    <div class="user-profile">--}}
{{--                                    <h2 class="">{{__('profile.subscription_history.title')}} </h2><br>--}}
{{--                                    </div>--}}
{{--                                    <div class="phr-create-img">--}}
{{--                                      <img src="{!! asset('assets/img/not-subscribe.png') !!}" alt="" width="80px">--}}
{{--                                    </div>--}}
{{--                                    <p class="text-center padding-sm create-new">--}}
{{--                                        {{__('profile.subscription_history.msg.subscription_msg')}}--}}
{{--                                    </p>--}}
{{--                                    <a href='{!! url("subscription/plan") !!}'  class="btn-alt small active doc-btn">{{__('profile.subscription_history.button.try_it')}}</a><br><br>--}}
{{--                                @endif--}}
{{--                            @endif--}}
                        </div>

                        <div class="col-md-12 padding-left-null">

                            <div class="table-responsive sub-history">
                                @if(isset($subscriptionHistory['all']) && count(($subscriptionHistory['all']))>0)
                                    <div class="user-profile">
                                        <h2 class="profile-title">{{__('profile.subscription_history.table.title')}}</h2><br>
                                    </div>
                                    <table class="table" width="50%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>{{__('profile.subscription_history.table.header.activation_date')}}</th>
                                            <th>{{__('profile.subscription_history.table.header.expire_date')}}</th>
                                            <th>{{__('profile.subscription_history.table.header.plan_name')}}</th>
                                            <th>{{__('profile.subscription_history.table.header.amount')}}</th>
                                            <th>{{__('profile.subscription_history.table.header.status')}}</th>
                                            <th>{{__('profile.subscription_history.table.header.action')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($subscriptionHistory['all'] as $key=>$history)
                                                <tr>
                                                    <td>{!! $history->activation_date !!}</td>
                                                    <td>{!! $history->expire_date !!}</td>
                                                    <td>{!! $history->plan_name !!}</td>
                                                    <td>{!! $history->transaction_price !!} tk</td>
                                                    <td>
                                                        @if($history->sub_status == 1)
                                                            <label class="btn btn-xs btn-success">Active</label>
                                                        @else
                                                            <label class="btn btn-xs btn-danger">Inactive</label>
                                                        @endif
                                                    </td>
                                                    {{--<td><a class="subDetails" href="#" onclick="getSubDetails({!! $history->id !!})" >Details</a></td>--}}
                                                    <td><a class="subDetails  btn-sm btn-info sample_details" href="{!! route('frontend.subscription.invoice.details',['id'=>$history->id]) !!}" style="color: white" ><i class="fa fa-files-o"> {{__('profile.subscription_history.table.header.details')}}</i></a></td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                @else
                                    <div class="bhoechie-tab-content active subscription-status">
                                        <h2 class="profile-title" style="line-height: 34px">{{__('profile.subscription_history.title')}} </h2><br>
                                        <div class="phr-create-img">
{{--                                            <img src="{!! asset('assets/img/not-subscribe.png') !!}" alt="" width="80px">--}}
                                            <img src="{!! asset('assets/img/phr/no-data.png') !!}" alt="">
                                        </div>
                                        <p class="text-center padding-sm create-new">
                                            {{__('profile.subscription_history.msg.subscription_msg')}}
                                        </p>
                                        <a href='{!! url("subscription/plan") !!}'  class="btn-alt small active doc-btn">{{__('profile.subscription_history.button.try_it')}}
                                            <i class="fa fa-plus-circle"></i>
                                        </a><br><br>
                                    </div>
                                    {{--@if(Cookie::has('_tn') && isset($user))
                                        <p class="text-center padding-sm create-new">
                                            Looks like you have no expired subscription history

                                        </p>
                                    @endif--}}
                                @endif

                                @if(isset($subPaginator) && !($subPaginator->total_pages == 1 || $subPaginator->total_pages == 0))
                                    <ul class="pagination">
                                        @if($subPaginator->current_page > 9)
                                            <li><a href="{!! url($rootUrl, ['page' =>$subPaginator->current_page-8 ]) !!}"> << </a></li>
                                        @endif
                                        @if($subPaginator->previous_page_url != null)
                                            <li><a href="{!! url($rootUrl, ['page' => $subPaginator->current_page-1 ]) !!}"><i class="ion-ios-arrow-left"></i> {{__('pagination.previous')}}</a></li>
                                        @endif
                                        @for($i = 1; $i <= $subPaginator->total_pages; $i++)
                                            <li><a @if($i == $subPaginator->current_page) class="bg-brand-color" @endif href="{!! url($rootUrl, ['page' => $i ]) !!}">{!! $i!!}</a></li>
                                        @endfor
                                        @if($subPaginator->next_page_url != null)
                                            <li><a href="{!! url($rootUrl, ['page' => $subPaginator->current_page+1 ]) !!}"><i class="ion-ios-arrow-right"></i> {{__('pagination.next')}}</a></li>
                                        @endif
                                        @if($subPaginator->current_page < $subPaginator->total_pages-9 )
                                            <li><a href="{!! url($rootUrl, ['page' =>$subPaginator->current_page+8 ]) !!}"> >> </a><li>
                                        @endif
                                    </ul>
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
