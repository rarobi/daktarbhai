@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'Discount history | ' . app_name()  !!}
@endsection

<style>
    .table {
        border-spacing: 3px;
        border-collapse: separate;
        /*background -c: linear-gradient(180deg, #F4F6F8 0%, #FFFFFF 100%);*/
        border: none !important;
    }
</style>

@section('main-content')
    <div class="bhoechie-tab-content active p">
      {{--<h3 class="profile-title">Discount History</h3>--}}
      <h3 class="profile-title">{{__('profile.discount.title')}}</h3>
            <div class="user-discount-area ">
                @if(isset($mydiscounts) && $mydiscounts != null)
                    @foreach($mydiscounts as $mydiscount)
                        @if(isset($mydiscount->provider) && $mydiscount->provider != null)
                            <div class="discount-history">
                                {{--{!! dd($mydiscount) !!}--}}
                                <h5 class="pull-left">{{ (isset($mydiscount->provider->pharmacy_name) && $mydiscount->provider->pharmacy_name != null) ? $mydiscount->provider->pharmacy_name : $mydiscount->provider->name }}</h5>
                                <table class="table" cellspacing="2">
                                    <tbody>
                                    <tr>
                                        {{--<th>Avail Date</th>--}}
                                        {{--<th>Discount Code</th>--}}
                                        {{--<th>Services Name</th>--}}
                                        {{--<th>Discount Price</th>--}}

                                        <th>{{__('profile.discount.table.title.avail_date')}}</th>
                                        <th>{{__('profile.discount.table.title.discount_code')}}</th>
                                        <th>{{__('profile.discount.table.title.services_name')}}</th>
                                        <th>{{__('profile.discount.table.title.discount_price')}}</th>

                                    </tr>

                                    @foreach($mydiscount->services as $service)
                                        <tr class="">
                                            <td>{{ $mydiscount->discount_avail_date }}</td>
                                            <td>{{ $mydiscount->discount_code or '' }}</td>
                                            <td>{{ $service->service_name or '' }}</td>
                                            <td>{{ $service->discount or '' }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    @endforeach

                    @if(isset($discountPaginator) && !($discountPaginator->total_pages == 1 || $discountPaginator->total_pages == 0))
                        <ul class="pagination">
                            @if($discountPaginator->current_page > 9)
                                <li><a href="{!! url($rootUrl, ['page' =>$discountPaginator->current_page-8 ]) !!}"> << </a></li>
                            @endif
                            @if($discountPaginator->previous_page_url != null)
                                <li><a href="{!! url($rootUrl, ['page' => $discountPaginator->current_page-1 ]) !!}"><i class="ion-ios-arrow-left"></i> {{__('pagination.previous')}}</a></li>
                            @endif
                            @for($i = 1; $i <= $discountPaginator->total_pages; $i++)
                                <li><a @if($i == $discountPaginator->current_page) class="bg-brand-color" @endif href="{!! url($rootUrl, ['page' => $i ]) !!}">{!! $i!!}</a></li>
                            @endfor
                            @if($discountPaginator->next_page_url != null)
                                <li><a href="{!! url($rootUrl, ['page' => $discountPaginator->current_page+1 ]) !!}"><i class="ion-ios-arrow-right"></i> {{__('pagination.next')}}</a></li>
                            @endif
                            @if($discountPaginator->current_page < $discountPaginator->total_pages-9 )
                                <li><a href="{!! url($rootUrl, ['page' =>$discountPaginator->current_page+8 ]) !!}"> >> </a><li>
                            @endif
                        </ul>
                    @endif

                @else
                    <div class="phr-create-img">
{{--                        <img src="{!! asset('assets/img/discount-history_1.png') !!}" alt="">--}}
                        <img src="{!! asset('assets/img/phr/no-data.png') !!}" alt="">
                    </div>
                    {{--<p class="text-center padding-sm profile-create-new">You haven't requested for any discounts Yet!. Click on get discount & enjoy discounts on our panel Hospitals.--}}
                    <p class="text-center padding-sm profile-create-new">{{__('profile.discount.msg.discount_msg')}}
                        {{--<a href="{!! route('frontend.hospital.index') !!}" class="btn-alt small active doc-btn">Get Discount</a>--}}
                        <a href="{!! route('frontend.hospital.index') !!}" class="btn-alt small active doc-btn">{{__('profile.discount.button.get_discount')}}
                            <i class="fa fa-plus-circle"></i>
                        </a>
                    </p>
                @endif
            </div>
    </div>
@endsection
