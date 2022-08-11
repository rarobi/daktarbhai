@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'Home Pathology History| ' . app_name()  !!}
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
                                @if(count($sample_collection_requests)>0)
                                    <div class="user-profile">
                                        <h2 class="profile-title">Home Pathology History</h2><br>
                                    </div>
                                    <table class="table" width="50%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Tracking No.</th>
                                            <th>Address</th>
                                            <th>Vendor</th>
                                            <th>Collection Date & Time</th>
                                            <th>Status</th>
                                            <th>Payment Status</th>
                                            <th colspan="2">Action</th>
{{--                                            <th>{{__('profile.subscription_history.table.header.status')}}</th>--}}
                                        </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($sample_collection_requests as $sample_collection_request)
{{--                                                {{dd($sample_collection_request)}}--}}
                                                <tr>
                                                    <td>{!! $sample_collection_request->tracking_no !!}</td>
                                                    <td>{!! $sample_collection_request->address !!}</td>
                                                    <td>{!! $sample_collection_request->partner_name !!}</td>
                                                    <td>{!! date(' d F, Y', strtotime($sample_collection_request->request_date))  !!},
                                                        {!! $sample_collection_request->request_time !!}
                                                    </td>
                                                    <td>{!! ucfirst($sample_collection_request->request_status) !!}</td>
                                                    <td>
                                                        @if($sample_collection_request->payment_status == true)
                                                            <span class="applied">{!! 'Paid' !!}</span>
                                                        @else
                                                            <span class="applied">{!! 'Unpaid' !!}</span>
                                                            @if($sample_collection_request->request_status == 'pending' && $sample_collection_request->payment_status == false)
                                                                {{--                                                            {{dd($sample_collection_request->request_status,$sample_collection_request->payment_status)}}--}}

                                                                    {!! Form::open( ['route' => ['frontend.sample-collection.details'], 'method' => 'GET','class' =>'form-horizontal login', 'data-parsley-validate']) !!}
                                                                    <input type="hidden" name="request_id" value="{{$sample_collection_request->id}}">
                                                                    <button class="btn btn-sm btn-warning">
                                                                        Pay Now
                                                                    </button>
                                                                    {!! Form::close() !!}

                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {!! Form::open( ['route' => ['frontend.sample-collection.details'], 'method' => 'GET','class' =>'form-horizontal login', 'data-parsley-validate']) !!}
                                                        <input type="hidden" name="details" value="details">
                                                        <input type="hidden" name="request_id" value="{{$sample_collection_request->id}}">
                                                        <button class="sample_details btn btn-info" style="color: white">
                                                           <i class="fa fa-files-o"> {{__('profile.subscription_history.table.header.details')}}</i>
                                                        </button>
                                                        {!! Form::close() !!}

{{--                                                             <a class="subDetails" href="" >{{__('profile.subscription_history.table.header.details')}}</a>--}}


                                                    </td>


                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                @else
                                    <div class="bhoechie-tab-content active subscription-status">
                                        <h2 class="profile-title" style="line-height: 34px">Home Pathology History</h2><br>
                                        <div class="phr-create-img">
{{--                                            <img src="{!! asset('assets/img/not-subscribe.png') !!}" alt="" width="80px">--}}
                                            <img src="{!! asset('assets/img/phr/no-data.png') !!}" alt="">

                                        </div>
                                        <p class="text-center padding-sm create-new">
{{--                                            {{__('profile.subscription_history.msg.subscription_msg')}}--}}
                                            Looks like you have no Home Pathology tests! Why not give it a try?
                                            <a href='{!! url("sample-collection/create") !!}'  class="btn-alt small active doc-btn">{{__('profile.subscription_history.button.try_it')}}
                                                <i class="fa fa-plus-circle"></i>
                                            </a>
                                        </p>

                                    </div>
                                    {{--@if(Cookie::has('_tn') && isset($user))
                                        <p class="text-center padding-sm create-new">
                                            Looks like you have no expired subscription history

                                        </p>
                                    @endif--}}
                                @endif

{{--                                @if(isset($subPaginator) && !($subPaginator->total_pages == 1 || $subPaginator->total_pages == 0))--}}
{{--                                    <ul class="pagination">--}}
{{--                                        @if($subPaginator->current_page > 9)--}}
{{--                                            <li><a href="{!! url($rootUrl, ['page' =>$subPaginator->current_page-8 ]) !!}"> << </a></li>--}}
{{--                                        @endif--}}
{{--                                        @if($subPaginator->previous_page_url != null)--}}
{{--                                            <li><a href="{!! url($rootUrl, ['page' => $subPaginator->current_page-1 ]) !!}"><i class="ion-ios-arrow-left"></i> {{__('pagination.previous')}}</a></li>--}}
{{--                                        @endif--}}
{{--                                        @for($i = 1; $i <= $subPaginator->total_pages; $i++)--}}
{{--                                            <li><a @if($i == $subPaginator->current_page) class="bg-brand-color" @endif href="{!! url($rootUrl, ['page' => $i ]) !!}">{!! $i!!}</a></li>--}}
{{--                                        @endfor--}}
{{--                                        @if($subPaginator->next_page_url != null)--}}
{{--                                            <li><a href="{!! url($rootUrl, ['page' => $subPaginator->current_page+1 ]) !!}"><i class="ion-ios-arrow-right"></i> {{__('pagination.next')}}</a></li>--}}
{{--                                        @endif--}}
{{--                                        @if($subPaginator->current_page < $subPaginator->total_pages-9 )--}}
{{--                                            <li><a href="{!! url($rootUrl, ['page' =>$subPaginator->current_page+8 ]) !!}"> >> </a><li>--}}
{{--                                        @endif--}}
{{--                                    </ul>--}}
{{--                                @endif--}}



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
