@extends('frontend.layouts.theme.master')

@section('page-header-class', 'header-static')
<style>
    #scrollable-dropdown-menu .tt-menu {
        max-height: 350px;
        overflow-y: auto;
        background-color: white;
        /*padding: 20px;*/
        /*font-size: 12px;*/
        /*line-height: 20px;*/
    }
</style>
@section('content')

    <div id="home-wrap" class="content-section fullpage-wrap row doc-bg">
        <div class="col-md-12 padding-leftright-null">
            <!-- ————————————————————————————————————————————
            ———	Find Doctor Start here
            —————————————————————————————————————————————— -->
            <section class="doctor page padding-md">
                <div class="container">
                    <h2 class="text-center padding-sm padding-top-null white">
                        Find Your <span>Doctor</span>
                    </h2>
                    <div class="doc-search">
                        <div class="search-form">
                            <form method="get" action="{!! route('frontend.doctor.index') !!}" class="doctor-search-form">
                                <div class="col-md-3 search-form-left">
                                    <div class="form-group">
                                        <select class="division-list form-control location-search custom-select select2-hidden-accessible" data-placeholder="Location" name="division_name" tabindex="-1" aria-hidden="true">
                                            <option value="" selected="selected">Search by Division</option>
                                            @foreach($divisions as $division)
                                                <option value="{!! $division->division_name  !!}" >{!! $division->division_name or '' !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 search-form-left">
                                    <div class="form-group">
                                        <select class="district-list form-control location-search custom-select select2-hidden-accessible" data-placeholder="Location" name="district_name" tabindex="-1" aria-hidden="true"><option value="" selected="selected"></option>
                                            <option value="" selected="selected">Search by District</option>
                                            @foreach($districts as $districts)
                                                <option value="{!! $districts->district_name  !!}" >{!! $districts->district_name or '' !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 search-form-left" id="scrollable-dropdown-menu">
                                    {{--<input type="text" class="form-control " placeholder="Search by Doctor name..." name="doctor_name" value="">--}}
                                    <input  list="browsers" class="typeahead form-control" id="doctorName" type="text " name="doctor_name" value="" placeholder="Search by Doctor name or specialty...">
                                    <input type="hidden" id="typeSelecctedVal" name="search_id">
                                    {{--<datalist id="browsers">--}}
                                    {{--<option value="Internet Explorer">--}}
                                    {{--<option value="Firefox">--}}
                                    {{--<option value="Chrome">--}}
                                    {{--<option value="Opera">--}}
                                    {{--<option value="Safari">--}}
                                    {{--</datalist>--}}
                                </div>
                                <div class="col-md-2 search-form-left">
                                    <input type="submit" class="f-button btn-alt small active margin-null" value="Find Doctor">
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
        @if(isset($doctors))
            @if($doctors != null)

                <div class="doctor-list">
                    <div class="col-md-9">
                        @foreach($doctors as $doctor)
                            <div class="doc-single search-list">
                                <div class="col-md-4 padding-null">
                                    <div class="doc-images">
                                        <a href="{!! route('frontend.doctor.show', $doctor->doctor_id) !!}"><img src="{!! (isset($doctor) && $doctor->image !=null) ? url('/').$doctor->image : asset('assets/img/doctor-grey.png') !!}" alt="doctor" class="img-responsive img-center"></a>
                                    </div>
                                </div>
                                <div class="col-md-8 padding-sm">
                                    <a href="{!! route('frontend.doctor.show', $doctor->doctor_id) !!}"><h4>{!! $doctor->name or '' !!}</h4></a>
                                    <p class="designation margin-bottom-null">{!! $doctor->qualification or '' !!}</p>
                                    @if(isset($doctor->specialities) && $doctor->specialities != null)
                                        <div class="address-wrap">
                                            <div class="address-left">
                                                <p class="sp-icon margin-bottom-null"><img src="assets/img/sp-doc-icon.png"><span>Specialist</span></p>
                                                <ul class="doc-specil">
                                                    <li>{!! $doctor->specialities or '' !!}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                    @if($doctor->chambers != null && count($doctor->chambers))
                                        @php
                                            $chamber = $doctor->chambers[0]
                                        @endphp
                                        <div class="address-wrap">
                                            <div class="address-left">
                                                <p class="location"><i class="ion-ios-location-outline"></i> <span>Chamber</span><br>
                                                    {!! $chamber->chamber_name or '' !!}, {!! $chamber->chamber_address or '' !!}
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                    <a href="{!! route('frontend.doctor.show', $doctor->doctor_id) !!}" class="btn-alt small active doc-btn margin-null">Details</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-3 padding-null">
                    <div class="doctor-sidebar">
                        <div class="gendar">
                            <h5>Search By Location</h5>
                            <div class="form-group">
                                <select class="form-control location-search custom-select select2-hidden-accessible" id="selectBox" onchange="loadAreaList();" data-placeholder="Location" name="location" tabindex="-1" aria-hidden="true"><option value="" selected="selected"></option>
                                    <option value="" selected="selected">Search by Location</option>
                                    @foreach($areas as $areas)
                                        <option value="{!! trim($areas->area_name)  !!}" name="area">{!! $areas->area_name or '' .'</br>' !!}</option>
                                    @endforeach
                                    {{--<option>Gulshan</option>--}}
                                    {{--<option>Mirpur</option>--}}
                                    {{--<option>Mohakhali</option>--}}
                                    {{--<option>Dhanmondi</option>--}}
                                </select>
                            </div>
                        </div>

                        <div class="gendar">
                            <h5>Doctor Gender</h5>
                            <form method="get" action="{!! route('frontend.doctor.index') !!}">
                                <div class="checkbox">
                                    <label class="col-md-4"><input type="checkbox" name="gender" id="male"  value="male" class="gender" > Male</label>
                                    <label class="col-md-4"><input type="checkbox" name="gender" id="female"  value="female" class="gender"> Female</label>
                                    <label class="col-md-4"><input type="checkbox" name="gender" id="any" value="any" class="gender"> Any</label>
                                </div>
                            </form>
                        </div>
                        {{--<div class="gendar">--}}
                        {{--<h5>Consultation Fee</h5>--}}
                        {{--<p class="padding-onlytop-sm">--}}
                        {{--<label for="amount">Price range:</label>--}}
                        {{--<input type="text" id="amount" readonly style="border:0; color:#666; font-weight:bold; background-color:transparent;">--}}
                        {{--</p>--}}

                        {{--<div id="slider-range"></div>--}}
                        {{--</div>--}}
                        <div class="gendar">
                            <h5>Availability</h5>
                            <form action="">
                                <div class="checkbox">
                                    <label class="col-md-6"><input type="checkbox" id="today" name="filter" value="tomorrow" class="schedule"> Tomorrow</label>
                                    <label class="col-md-6"><input type="checkbox" id="nextday" name="filter" value="next_3_days" class="schedule"> Next 3 day</label>
                                    <label class="col-md-6"><input type="checkbox" id="next15day" name="filter" value="next_15_days" class="schedule"> Next 15 day</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            @else
                <div class="doctor-list">
                    <div class="doc-single search-list">
                        <h6 class="text-center">We have not found any <span>Doctors</span> that match your search criteria.</h6>
                    </div>
                    {{--</div>--}}
                </div>
            @endif
        @endif
    <!-- ————————————————————————————————————————————
            ———	Single Doctor list
            —————————————————————————————————————————————— -->
        <!-- <div class="doctor-list">
          <div class="col-md-12">
            <div class="doc-single">
                <div class="col-md-9">
                    <div class="col-md-3 padding-null">
                      <div class="doc-images">
                        <a href="#"><img src="assets/img/doctor-grey.png" class="img-responsive img-center"></a>
                      </div>
                    </div>
                    <div class="col-md-9 padding-sm">
                        <a href="#"><h4>Dr.Amir Ali</h4></a>
                        <p class="designation">BDS, PGT (Children Preventive and Community dentistry), RCT Consultant Dental Surgeon, <br>Avenue Dental Care, Dhaka</p>
                        <div class="address-wrap">
                            <div class="address-left">
                                <p class="location"><i class="ion-ios-location-outline"></i><span>Chamber</span><br>
                                Bright Smile Dental Care, House 71, Road 9/A, Dhanmondi, Dhaka-1209, Dhanmondi, Dhaka</p>
                            </div>
                        </div>
                    </div>
                </div>
              <div class="col-md-3 padding-md">
                <a href ="doctor-details.html" class="btn-alt small active doc-btn">Details</a>
              </div>
            </div>
          </div>
        </div> -->
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
                                            <i class="ion-ios-arrow-left"></i> Previous</a>
                                    </li>
                                @endif

                                @for($i = max(1,$paginator->current_page-9); $i <=  min($paginator->current_page+9, $paginator->total_pages);  $i++)
                                    <li><a @if($i == $paginator->current_page) class="bg-brand-color" @endif href="{!! route('frontend.pagination.doctor.category', ['category' => $specialityId,'page' =>$i ]) !!}">{!! $i!!}</a></li>
                                @endfor

                                @if($paginator->next_page_url != null)
                                    <li><a href="{!! route('frontend.pagination.doctor.category', ['category' => $specialityId,'page' =>$paginator->current_page+1 ]) !!}">Next <i class="ion-ios-arrow-right"></i></a></li>
                                @endif
                                @if($paginator->current_page < $paginator->total_pages-9 )
                                    <li><a href="{!! route('frontend.pagination.doctor.category', ['category' => $specialityId,'page' =>$paginator->current_page+8 ]) !!}"> >> </a><li>
                                @endif
                            </ul>
                        @else

                            <ul class="pagination">
                                @if($paginator->current_page > 9)
                                    <li><a href="{!! route('frontend.pagination.doctor', ['request' => $query_string,'page' =>$paginator->current_page-8 ]) !!}"> << </a></li>
                                @endif
                                @if($paginator->previous_page_url != null)
                                    <li>
                                        <a href="{!! route('frontend.pagination.doctor', ['request' => $query_string,'page' =>$paginator->current_page-1 ]) !!}">
                                            <i class="ion-ios-arrow-left"></i> Previous</a>
                                    </li>
                                @endif

                                @for($i = max(1,$paginator->current_page-9); $i <=  min($paginator->current_page+9, $paginator->total_pages);  $i++)
                                    <li><a @if($i == $paginator->current_page) class="bg-brand-color" @endif href="{!! route('frontend.pagination.doctor', ['request' => $query_string,'page' =>$i ]) !!}">{!! $i!!}</a></li>
                                @endfor

                                @if($paginator->next_page_url != null)
                                    <li><a href="{!! route('frontend.pagination.doctor', ['request' => $query_string,'page' =>$paginator->current_page+1 ]) !!}">Next <i class="ion-ios-arrow-right"></i></a></li>
                                @endif
                                @if($paginator->current_page < $paginator->total_pages-9 )
                                    <li><a href="{!! route('frontend.pagination.doctor', ['request' => $query_string,'page' =>$paginator->current_page+8 ]) !!}"> >> </a><li>
                                @endif

                            </ul>

                        @endif
                    </div>
                </div>
            </section>
    @endif
    <!-- ————————————————————————————————————————————
                    ———	specialist Doctor search here
                    —————————————————————————————————————————————— -->
        <div class="col-md-12 padding-leftright-null">
            <section  class="page padding-md padding-bottom-null @if($default == 0) padding-top-null @endif">
                <div class="row no-margin">
                    <div class="col-md-12 services-box specialty">
                        @if(isset($specialities))
                            @foreach($specialities as $speciality)
                                <div class="col-md-2">
                                    <a href="{!! route('frontend.doctor.speciality', $speciality->id) !!}">
                                        <div class="alt-services text-center">
                                            <i class="icon ion-ios-pulse service big color"></i>
                                            <div class="service">
                                                <h6 class="heading margin-bottom-extrasmall">{!! $speciality->name or '' !!}</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </div>



@endsection

@section('before-scripts-end')
    @include('frontend.pages.doctor.scripts')
@endsection
