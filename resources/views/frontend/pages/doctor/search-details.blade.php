@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Search Doctor | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')
@section('after-styles')
<link rel="stylesheet" href="{!! asset('assets/css/nice-select.min.css') !!}">
@endsection
<style>
    option {
        background: white;
        width: 110%;
        margin-left: -5%;
        padding: 0 20px;
    }
    .loader {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('{!! asset('assets/img/loader.gif') !!}') 50% 50% no-repeat rgb(249,249,249);
        background-size: 70px;
    }

    .list {
        height: 300px;
        overflow-y: scroll !important;
    }


    @media screen and (min-width: 320px)and (max-width: 1000px) {
        .white {
            margin-top: 150px;
        }
    }

    .doc-images img {
        width: 50% !important;
        height: 200px !important;
        border-radius: 100px !important;
    }

    @media (max-width: 768px){
        .single-doctor-box {
            display: flex;
            height: auto;
        }

        .doc-btn {
            margin-bottom: 10px !important;
            margin-left: 30px !important;
        }

        .doc-images img {
            width: 50% !important;
            height: 200px !important;
            margin-left: 10px !important;

        }
    }

    @media screen and (min-width: 991px)and (max-width: 1024px) {

        .btn-alt.small.active.doc-btn {
            width: 155px !important;

        }
    }


</style>
@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap row doc-bg m-b-15px">
        <div class="col-md-12 padding-leftright-null">
            <!-- ————————————————————————————————————————————
            ———	Find Doctor Start here
            —————————————————————————————————————————————— -->
            <section class="doctor page inner-search">
                <div class="container">
                    <div class="doc-search">
                        <div class="search-form">
                            <form method="get" action="{!! route('frontend.doctor.details-info-search') !!}" class="doctor-search-form">
                                <div class="col-md-3 search-form-left">
                                    <div class="form-group">
                                        <select class="division-list form-control location-search custom-select select2-hidden-accessible" data-placeholder="Location" name="division_name" tabindex="-1" aria-hidden="true">
                                            <option value="" selected="selected">{{__('find_doctor.placeholder.search_division')}}</option>
                                            {{--@foreach($divisions as $division)--}}
                                                {{--<option value="{!! $division->division_name  !!}" @if($division->division_name == $div_name) selected @endif >{!! $division->division_name or '' !!}</option>--}}
                                            {{--@endforeach--}}
                                            @if(Lang::locale() == 'bn')
                                                @if(isset($divisions))
                                                    @foreach($divisions as $division)
                                                        <option value="{!! $division->division_name  !!}" @if($division->division_bn_name == $div_name) selected @endif >{!! $division->division_bn_name or '' !!}</option>
                                                    @endforeach
                                                @endif
                                            @endif

                                            @if(Lang::locale() == 'en')
                                                @if(isset($divisions))
                                                    @foreach($divisions as $division)
                                                        <option value="{!! $division->division_name  !!}" @if($division->division_name == $div_name) selected @endif >{!! $division->division_name or '' !!}</option>
                                                    @endforeach
                                                @endif
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 search-form-left">
                                    <div class="form-group">
                                        <select class="district-list form-control location-search custom-select select2-hidden-accessible" data-placeholder="Location" name="district_name" tabindex="-1" aria-hidden="true">
                                            <option value="" selected="selected"> {{__('find_doctor.placeholder.search_district')}} </option>

                                            @foreach($districts as $district)
                                                @if(Lang::locale() == 'bn')
                                                  <option value="{!! $district->district_name  !!}" @if( trim($district->district_bn_name) == trim($dist_name)) selected @endif >{!! $district->district_bn_name or '' !!}</option>
                                                @elseif(Lang::locale() == 'en')
                                                  <option value="{!! $district->district_name  !!}" @if( trim($district->district_name) == trim($dist_name)) selected @endif >{!! $district->district_name or '' !!}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5 search-form-left" id="scrollable-dropdown-menu">
                                    {{--<input type="text" class="form-control " placeholder="Search by Doctor name..." name="doctor_name" value="">--}}
                                    <input  list="browsers" class="typeahead form-control" id="doctorName" type="text " name="doctor_name" value="{!! $doc_name !!}" placeholder="{{__('find_doctor.placeholder.search_doctor')}}">
                                    <input type="hidden" id="typeSelecctedVal" name="search_id">
                                </div>
                                <div class="col-md-1 search-form-left">
                                    <input type="submit" class="f-button btn-alt small active margin-null" value="{{__('find_doctor.button.search')}}">
                                    {{--<a class="f-button btn-alt small active margin-null" type="submit" value="Find Doctor">Find Doctor</a>--}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div id="home-wrap" class="content-section fullpage-wrap row white">
        <!-- ————————————————————————————————————————————
        ———	Single Doctor list
        —————————————————————————————————————————————— -->
        <div class="doctor-list">
            <div class="col-md-9">
                <div class="loader"></div>
                @if(isset($doctors))
                    @if($doctors != null)
                        @foreach($doctors as $doctor)
                            <div class="col-md-4 col-sm-6 margin-bottom-small">
                                <div class="single-doctor-box margin-bottom-small">
                                    <div class="doc-single search-list " style="background-color: #ffffff">
                                        <div class="col-md-12 padding-sm">
                                            <div class="doc-images text-center">
                                                <a href=""><img src="{!! (isset($doctor) && $doctor->image !=null) ? $doctor->image : asset('assets/img/doctor-grey.png') !!}" alt="doctor" class=""></a>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center doctor-profile-btn">
                                            <div class="doctor-info">
                                                <h4 class="margin-bottom-small">{!! $doctor->name or '' !!}</h4>
                                                {{--                                          <p class="designation margin-bottom-null">{!! $doctor->qualification or '' !!}</p>--}}
                                                @if(isset($doctor->specialities) && $doctor->specialities != null)
                                                    <div class="address-wrap">
                                                        <div class="address-left">
                                                            <ul class="doc-specil">
                                                                <li>
                                                                    {!! $doctor->specialities or '' !!}
                                                                    {{--                                                                    {{ \Illuminate\Support\Str::limit($doctor->specialities, 140, $end='...') }}--}}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3 padding-top-null margin-bottom-small">
{{--                                            <a href="{!! route('frontend.tele-medicine.doctor-appointment',$doctor->doctor_id ) !!}" class="btn-alt small active doc-btn">View Profile</a>--}}
                                            <a href="{!! route('frontend.doctor.show', $doctor->doctor_id.'?utm_source=DSP') !!}" class="btn-alt small active doc-btn">{{__('find_doctor.button.view_profile')}}</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @else
                        <div class="doc-single padding-sm doctor-not-found">
                            <img src="{!! asset('assets/img/doctor-not-found1.png') !!}" alt="">
                            <h6 class="text-center" style="color: #000;">{{__('find_doctor.message.search_doctor')}}
                                {{--We have not found any <span>Doctors</span> that match your search criteria.--}}
                            </h6>
                        </div>
                    @endif
                @endif
            </div>
        </div>

        <div class="col-md-3 padding-null">
            <div class="doctor-sidebar">
                <div class="gendar">
                    <h5>{{__('find_doctor.availability')}}
                    </h5>
                    <form action="">
                        <div class="checkbox">
                            <label class="col-md-6"><input type="checkbox" id="today" name="filter" value="tomorrow" class="schedule" @if($schedule == 'tomorrow') checked @endif> {{__('find_doctor.tomorrow')}}</label>
                            <label class="col-md-6"><input type="checkbox" id="nextday" name="filter" value="next_3_days" class="schedule" @if($schedule == 'next_3_days') checked @endif> {{__('find_doctor.next_three_day')}}</label>
                            <label class="col-md-6"><input type="checkbox" id="next15day" name="filter" value="next_15_days" class="schedule" @if($schedule == 'next_15_days') checked @endif> {{__('find_doctor.next_fifteen_day')}}</label>
                        </div>
                    </form>
                    <br>
                    @if(($div_name || $dist_name != "") && $areas != null)
                        <div class="gendar1 m-t-30">
                            <h5>{{__('find_doctor.search_location')}}
                                {{--Search By Location--}}
                            </h5>
                            <div class="form-group">
                                <select class="form-control location-search custom-select select2-hidden-accessible" id="selectBox" onchange="loadAreaList();" data-placeholder="Location" name="location" tabindex="-1" aria-hidden="true"><option value="" selected="selected"></option>
                                    <option value="" selected="selected">{{__('find_doctor.search_location')}}</option>
                                    {{--@foreach($areas as $areas)--}}
                                    {{--<option value="{!! trim($areas->area_name)  !!}" name="area">{!! $areas->area_name or '' .'</br>' !!}</option>--}}
                                    {{--@endforeach--}}
                                    @if(Lang::locale() == 'bn')
                                        @foreach($areas as $areas)
                                            <option value="{!! trim($areas->area_name)  !!}" name="area">{!! $areas->area_bn_name or '' .'</br>' !!}</option>
                                        @endforeach
                                    @endif

                                    @if(Lang::locale() == 'en')
                                        @foreach($areas as $areas)
                                            <option value="{!! trim($areas->area_name)  !!}" name="area">{!! $areas->area_name or '' .'</br>' !!}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    @endif
                    <br>
                    <div class="gendar1 m-t-30">
                        <h5>{{__('find_doctor.doctor_gender')}}
                            {{--Doctor Gender--}}
                        </h5>
                        <form method="get" action="{!! route('frontend.doctor.index') !!}">
                            <div class="checkbox">
                                <label class="col-md-4"><input type="checkbox" name="gender" id="male"  value="male" class="gender" @if($gender == 'male') checked @endif> {{__('find_doctor.male')}}</label>
                                <label class="col-md-4"><input type="checkbox" name="gender" id="female"  value="female" class="gender" @if($gender == 'female') checked @endif> {{__('find_doctor.female')}}</label>
                                <label class="col-md-4"><input type="checkbox" name="gender" id="any" value="any" class="gender" @if($gender == 'any') checked @endif> {{__('find_doctor.any')}}</label>
                            </div>
                        </form>
                    </div>
                </div>

                {{--<div class="gendar">--}}
                {{--<h5>Consultation Fee</h5>--}}
                {{--<p class="padding-onlytop-sm">--}}
                {{--<label for="amount">Price range:</label>--}}
                {{--<input type="text" id="amount" readonly style="border:0; color:#666; font-weight:bold; background-color:transparent;">--}}
                {{--</p>--}}

                {{--<div id="slider-range"></div>--}}
                {{--</div>--}}

            </div>
        </div>

        <!-- ————————————————————————————————————————————
        ———	specialist Doctor search here
        —————————————————————————————————————————————— -->
        @if(isset($paginator) && $paginator->total_pages != 1 && $paginator->total_pages != 0)
            <section id="nav" class="padding-top-null" >
                <div class="row">
                    <div class="col-xs-12">
                        @if(isset($specialityId))
                            <ul class="pagination">
                                @if($paginator->current_page > 9)
                                    <li><a href="{!! route('frontend.pagination.doctor.category', ['category' => $specialityId,'page' =>$paginator->current_page-8 ]) !!}"> << </a></li>
                                @endif
                                @if($paginator->previous_page_url != null)
                                    <li>
                                        <a href="{!! route('frontend.pagination.doctor.category', ['category' => $specialityId,'page' =>$paginator->current_page-1 ]) !!}">
                                            <i class="ion-ios-arrow-left"></i> {{__('pagination.previous')}}</a>
                                    </li>
                                @endif

                                @for($i = max(1,$paginator->current_page-9); $i <=  min($paginator->current_page+9, $paginator->total_pages);  $i++)
                                    <li><a @if($i == $paginator->current_page) class="bg-brand-color" @endif href="{!! route('frontend.pagination.doctor.category', ['category' => $specialityId,'page' =>$i ]) !!}">{!! $i!!}</a></li>
                                @endfor

                                @if($paginator->next_page_url != null)
                                    <li><a href="{!! route('frontend.pagination.doctor.category', ['category' => $specialityId,'page' =>$paginator->current_page+1 ]) !!}">{{__('pagination.next')}} <i class="ion-ios-arrow-right"></i></a></li>
                                @endif
                                @if($paginator->current_page < $paginator->total_pages-9 )
                                    <li><a href="{!! route('frontend.pagination.doctor.category', ['category' => $specialityId,'page' =>$paginator->current_page+8 ]) !!}"> >> </a><li>
                                @endif
                            </ul>
                        @else

                            <ul class="pagination">
{{--                                @if($paginator->current_page > 9)--}}
{{--                                    <li><a href="{!! route('frontend.pagination.doctor', ['request' => $query_string,'page' =>$paginator->current_page-8 ]) !!}"> << </a></li>--}}
{{--                                @endif--}}

                                @if(isset($first_page) && $paginator->current_page != 1 && $paginator->current_page>5)
                                    <li><a href="{!! route('frontend.pagination.doctor', ['request' => $query_string,'page' =>$first_page ]) !!}"> {{__('pagination.first')}} </a></li>
                                @endif
                                @if($paginator->previous_page_url != null)
                                    <li>
                                        <a href="{!! route('frontend.pagination.doctor', ['request' => $query_string,'page' =>$paginator->current_page-1 ]) !!}">
                                            <i class="ion-ios-arrow-left"></i> {{__('pagination.previous')}}</a>
                                    </li>
                                @endif

                                @for($i = max(1,$paginator->current_page-5); $i <=  min($paginator->current_page+5, $paginator->total_pages);  $i++)
                                    <li><a @if($i == $paginator->current_page) class="bg-brand-color" @endif href="{!! route('frontend.pagination.doctor', ['request' => $query_string,'page' =>$i ]) !!}">{!! $i!!}</a></li>
                                @endfor

                                @if($paginator->next_page_url != null)
                                    <li><a href="{!! route('frontend.pagination.doctor', ['request' => $query_string,'page' =>$paginator->current_page+1 ]) !!}">{{__('pagination.next')}} <i class="ion-ios-arrow-right"></i></a></li>
                                @endif
{{--                                @if($paginator->current_page < $paginator->total_pages-9 )--}}
{{--                                    <li><a href="{!! route('frontend.pagination.doctor', ['request' => $query_string,'page' =>$paginator->current_page+8 ]) !!}"> >> </a><li>--}}
{{--                                @endif--}}

                                @if($paginator->current_page != $paginator->total_pages && $paginator->current_page < $paginator->total_pages-5)
                                    <li><a href="{!! route('frontend.pagination.doctor', ['request' => $query_string,'page' =>$paginator->total_pages ]) !!}"> {{__('pagination.last')}} </a><li>
                                @endif
                            </ul>

                        @endif
                    </div>
                </div>
            </section>
        @endif
    </div>


@endsection
@section('before-scripts')
  <script src="{!! asset('assets/js/typeahead.bundle.js') !!}"></script>
  <script src="{!! asset('assets/js/jquery.nice-select.min.js') !!}"></script>
  <!-- <script src='//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script> -->
@endsection
@section('before-scripts-end')
    @include('frontend.pages.doctor.scripts')
@endsection
