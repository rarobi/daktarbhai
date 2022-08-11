@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'Insurance Claim History | ' . app_name()  !!}
@endsection

@section('main-content')
    <div class="bhoechie-tab-content active subscription-status">
            <h3 class="profile-title">{{__('profile.insurance_history.title')}}</h3>
        <div class="col-md-12 padding-right-null">
            <div class="bhoechie-tab-content active">
                <div class="claim-history">
{{--                    <div class="col-md-1"></div>--}}
                    <div class="col-md-10">

                        {{--Show success message on rerouting back--}}
                        @if(Session::has('message'))
                            <div class="claim-insurance-alert alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>Success! </strong>
                                {!! session('message') !!}
                            </div>
                        @endif
                        @if(count($insuranceClaims)>0)
                            @foreach($insuranceClaims as $key => $claim)
                                <ul class="timeline">
                                    @foreach($claim as $yearWiseClaim)
                                        <li>
                                            <a href="{!! route('frontend.insurance-claim.details',['id'=>$yearWiseClaim->id]) !!}" class="claim-details">
                                                <div class="content">
                                                    <div class="" style="width: 100px">
                                                        <p><span class="claim-year">{{ $key }}</span> </p>
                                                    </div>
                                                    <div class="sub-date">
                                                        <p>{{ $yearWiseClaim->claimed_on_formatted->claimed_on_formatted_month }} <br/> {{ $yearWiseClaim->claimed_on_formatted->claimed_on_formatted_date }} </p>
                                                    </div>
                                                    <div class="sub-type">
                                                        <p>
                                                            <span>{{ $yearWiseClaim->subscription_plan_info->name }}</span> Subscription
                                                        </p>
                                                    </div>
                                                    <div class="sub-ticket">
                                                        <p><span>Ticket No</span> {{ $yearWiseClaim->claim_ticket_info->claim_ticket_no }} </p>
                                                    </div>
                                                    <div class="ins-type">
                                                        <p><span>Insurance Type</span> {{ $yearWiseClaim->insurance_type }}</p>
                                                    </div>
                                                    <div class="claim-status">
                                                        @if($yearWiseClaim->verification_info->verification_status == 'Applied')
                                                            <span class="applied">{!! 'Applied' !!}</span>
                                                        @elseif($yearWiseClaim->verification_info->verification_status == 'Approved' || $yearWiseClaim->verification_info->verification_status == 'Settled')
                                                            <span class="approved">{!! ucfirst($yearWiseClaim->verification_info->verification_status) !!}</span>
                                                        @elseif($yearWiseClaim->verification_info->verification_status == 'Rejected')
                                                            <span class="rejected">{!! 'Rejected' !!}</span>
                                                        @elseif($yearWiseClaim->verification_info->verification_status == 'Provider rejection')
                                                            <span class="rejected">{!! 'Rejected by Provider' !!}</span>
                                                        @else
                                                            <span class="in-prog">{{ ucfirst(str_replace('_', ' ', $yearWiseClaim->verification_info->verification_status)) }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="ticket-status">
                                                        @if($yearWiseClaim->claim_ticket_info->claim_ticket_status == 'Open')
                                                            <span class="open">{!! 'Open' !!}</span>
                                                        @elseif($yearWiseClaim->claim_ticket_info->claim_ticket_status == 'Close')
                                                            <span class="closed">{!! 'Close' !!}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </a>
{{--                                            <div class="timeline-badge"></div>--}}
                                        </li>
                                    @endforeach
                                </ul>
                            @endforeach
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
                        @else
                            <div class="my-prescription">
                                <div class="row">
                                    <div class="col-md-10 padding-right-null">
                                        <div class="phr-create-img">
{{--                                            <img src="{!! asset('assets/img/claim/claim-history.png') !!}" alt="">--}}
                                            <img src="{!! asset('assets/img/phr/no-data.png') !!}" alt="">
                                        </div>
                                        <p class="text-center padding-sm create-new">
                                            {{__('profile.insurance_history.msg.never_claimed')}}
                                            <a href="{!! route('frontend.insurance-claim.create') !!}" class="btn-alt small active doc-btn">{{__('profile.insurance_history.button.claim_now')}}
                                                <i class="fa fa-plus-circle"></i>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after-scripts')

@endsection
