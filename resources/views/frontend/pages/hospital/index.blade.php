@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Find Hospital | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')
@section('after-styles')
    <style>
    #map-canvas {min-width: 400px; width: 100%;min-height: 400px; height: 80%;}
    .select-style {padding: 0; margin: 0;border-radius: 5px;overflow: hidden;background-color: #fff;border: 0px solid #ffff !important;background: #fff url("assets/img/down-arrow.png") no-repeat 97% 45%;box-shadow: 2px -4px 20px rgba(0, 0, 0, 0.25);}
    .select-style select {border: none;box-shadow: none;background-color: transparent;background-image: none;-webkit-appearance: none;-moz-appearance: none;appearance: none;}
    .select-style select:focus {outline: none !important;}
    .select-style select option {padding: 10px !important;}
    .doctor-search-form .form-control {border-radius: 3px; border: 0px;}
    .search-form {background: rgba(255,255,255, 0.2);float: left;	width: 100%;padding: 15px;border-radius: 5px;}
    .search-form .form-group {margin-bottom: 0px;box-shadow: 2px -4px 20px rgba(0, 0, 0, 0.25);border-radius: 5px;}
    .doctor-search-form .btn-alt.small.active.margin-null {border-radius: 10px;}

    .district-list option {
        max-height: 100px !important;
        overflow-y: auto;
    }

    .doc-search{
        margin-top: 275px;
        height: 100px !important;
    }
    .search-form{
        margin-top: 10px !important;
    }

    .doctor h2 {
        font-size: 40px;
        font-weight: 800;
        width: 39%;
        position: relative;
        top: 120px;
        line-height: 50px;
        left: -30px;
    }

    .specialty img {
        margin: 20px 0;
        height: 100px;
    }

    .specialty .alt-services {
        padding: 30px;
    }
    .services-box .alt-services {
        min-height: 270px;
    }

    h4 {
        font-size: 20px;
        line-height: 30px;
    }

    /*@media screen and (min-width: 300px)and (max-width: 991px){*/
    /*    .specialty{*/
    /*        margin-top: 0px*/
    /*    }*/
    /*}*/

    @media (max-width: 480px) {
        .doctor h2 {
            left: 0;
        }
    }
    @media (max-width: 768px) {
        .directory-list-page .sin-button-area {
            bottom: -10px;
        }
    }

    </style>
@stop
@section('content')

        <div id="home-wrap" class="content-section fullpage-wrap row find-hospital-bg">
            <div class="col-md-12 padding-leftright-null">
                <!-- ————————————————————————————————————————————
                ———	Find Hospital Start here
                —————————————————————————————————————————————— -->
                {{--{!! dd($query_string) !!}--}}
                <section class="doctor page padding-md">
                    <div class="container">
                        <h2 class="text-center padding-sm padding-top-null white">
                            {{--Find <span>Hospitals</span>--}}
                            {{__('find_hospital.title')}}
                        </h2>
                        <div class="doc-search">
                            <div class="search-form">
                                <form method="get" action="{!! route('frontend.hospital.index') !!}" class="doctor-search-form">
                                    <div class="col-md-2 search-form-left">
                                        <div class="form-group select-style">
                                            <select class="division-list form-control location-search custom-select select2-hidden-accessible" data-placeholder="Location" name="division_name" tabindex="-1" aria-hidden="true">
                                                <option value="" selected="selected">{{__('find_doctor.placeholder.search_division')}}</option>

                                                @if(Lang::locale() == 'bn')
                                                    @if(isset($divisions))
                                                        @foreach($divisions as $division)
                                                            <option class="selectedOption" value="{!! $division->division_name  !!}" >{!! $division->division_bn_name or '' !!}</option>
                                                        @endforeach
                                                    @endif
                                                @endif

                                                @if(Lang::locale() == 'en')
                                                    @if(isset($divisions))
                                                        @foreach($divisions as $division)
                                                            <option class="selectedOption" value="{!! $division->division_name  !!}" >{!! $division->division_name or '' !!}</option>
                                                        @endforeach
                                                    @endif
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2 search-form-left">
                                        <div class="form-group select-style">
                                            <select class="district-list list form-control location-search custom-select select2-hidden-accessible" data-placeholder="Location" name="district_name" tabindex="-1" aria-hidden="true">
                                                <option value="" selected="selected">{{__('find_doctor.placeholder.search_district')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--<div class="col-md-2 search-form-left">--}}
                                        {{--<div class="form-group select-style">--}}
                                            {{--<select class="form-control select2-hidden-accessible" data-placeholder="Location" name="locality" tabindex="-1" aria-hidden="true">--}}
                                                {{--<option value="" selected="selected">{{__('find_hospital.placeholder.select_locality')}}</option>--}}

                                                {{--<option value="local">{{__('find_hospital.placeholder.local')}}</option>--}}
                                                {{--<option value="international">{{__('find_hospital.placeholder.international')}}</option>--}}
                                            {{--</select>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    <div class="col-md-3 search-form-left">
                                        <div class="form-group select-style">
                                            <select class="form-control select2-hidden-accessible" data-placeholder="Location" name="type" tabindex="-1" aria-hidden="true">
                                                <option value="" selected="selected">{{__('find_hospital.placeholder.select_type')}}</option>

                                                <option value="hospital">{{__('find_hospital.placeholder.hospital')}}</option>
                                                <option value="clinic">{{__('find_hospital.placeholder.clinic')}}</option>
                                                <option value="trauma">{{__('find_hospital.placeholder.trauma')}}</option>
                                                <option value="diagnostic center">{{__('find_hospital.placeholder.diagnostic_center')}}</option>
                                                <option value="nursing home">{{__('find_hospital.placeholder.nursing_home')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 search-form-left">
                                        <div class="form-group">
                                            <input type="text" class="form-control " placeholder="{{__('find_hospital.placeholder_3')}}..." name="hospital_name" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-2 search-form-left">
                                        <input type="submit" class="f-button btn-alt small active margin-null" value="{{__('find_hospital.buttons.search_btn')}}">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div id="home-wrap" class="content-section fullpage-wrap row white" style="min-height: 500px">
            <!-- ————————————————————————————————————————————
            ———	Single Hospital list
            —————————————————————————————————————————————— -->
            @if(isset($hospitals))

                @if($hospitals != null)


{{--            <div class="doctor-list">--}}
{{--              <div class="col-md-12">--}}
{{--                <div class="doc-single">--}}
{{--                    <div class="col-md-9">--}}
{{--                        <div class="col-md-3 padding-null">--}}
{{--                          <div class="doc-images">--}}
{{--                            <a href="{!! route('frontend.hospital.show', $hospital->id) !!}">--}}
{{--                                <img src="{!! (isset($hospital) && $hospital->image != null) ? $hospital->image : asset('assets/img/hospital12.png') !!}" alt="hospital" class="img-responsive img-center"></a>--}}
{{--                          </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-9 padding-sm">--}}
{{--                            <a href="{!! route('frontend.hospital.show', $hospital->id) !!}"><h4>{!! $hospital->name or '' !!}</h4></a>--}}
{{--                            <p class="designation">{!! $hospital->type or '' !!}</p>--}}
{{--                            <p class="designation">{!! $hospital->description or '' !!}</p>--}}
{{--                            <div class="address-wrap">--}}
{{--                                <div class="address-left">--}}
{{--                                    <p class="location"><i class="ion-ios-location-outline"></i> <span>{{__('find_hospital.address')}}</span><br>--}}
{{--                                    {!! $hospital->address or '' !!}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                  <div class="col-md-3 padding-md">--}}
{{--                    <a href="{!! route('frontend.hospital.show', $hospital->id) !!}" class="btn-alt small active doc-btn">{{__('find_hospital.details')}}</a>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
                        <div class="directory-list-page row no-margin text m-t-30">
                            <div class="col-md-12 padding-leftright-null">
                                <div class="col-md-12">
                                </div>
                                @foreach($hospitals as $hospital)
                                    <div class="col-md-3">
                                        <div class="card-title text-center">
                                            <p><span class="">Hospital</span></p>
                                        </div>
                                        <div class="thumbnail hospitals">
                                            <div class="panel-hos">
                                                <img src="{!! (isset($hospital) && $hospital->image != null) ? $hospital->image : asset('assets/img/directory/hospital-dir.png') !!}" alt="...">
                                                @if($hospital->discount_availability)
                                                    <span>Panel Hospital</span>
                                                @endif
                                            </div>
                                            <div class="caption text-center directory-info-box">
                                                <h3>{!! $hospital->name or '' !!}</h3>
                                                <p style="margin-bottom: 0;">
                                                    @if(! isEmptyOrNull($hospital->district_name))
                                                        <i class="fa fa-map-marker"></i> {!! $hospital->district_name or '' !!} </p>
                                                @endif
                                                <hr class="separator" style="margin-bottom: 0">
                                            </div>
                                            <div class="caption">
                                                @if(! isEmptyOrNull($hospital->address))
                                                    {{--                                        <p><i class="fa fa-home"></i> <span> {!! $hospital->address or '' !!}</span></p>--}}
                                                    <p><i><img src="{!! asset('assets/img/directory-location.png') !!}" alt=""></i> <span>
                                                {!! $hospital->address or '' !!}</span></p>
                                                @endif

                                                @if(! isEmptyOrNull($hospital->email))
                                                    <p><i class="fa fa-envelope-o"></i> {!! $hospital->email or '' !!}</p>
                                                @endif

                                                @if(! isEmptyOrNull($hospital->landphone ) || ! isEmptyOrNull($hospital->landphone_2) )
                                                    <p class="landphone-address">
                                                        {{--                                            <i class="fa fa-phone"></i>--}}
                                                        <i ><img src="{!! asset('assets/img/directory-landphone.png') !!}" alt=""></i>
                                                        <span>
                                        <a data-tel="{!! $hospital->landphone or '' !!}">
                                            {!! $hospital->landphone or '' !!}
                                        </a>
                                                @if(! isEmptyOrNull($hospital->landphone_2) ) ,
                                                            <a data-tel="{!! $hospital->landphone_2 or '' !!}">
                                            {!! $hospital->landphone_2 or '' !!}
                                        </a>
                                                            @endif
                                            </span>
                                                    </p>
                                                @endif

                                                @if(! isEmptyOrNull($hospital->mobile) || ! isEmptyOrNull($hospital->mobile_2))
                                                    <p class="mobile-no">
                                                        {{--                                            <i class="fa fa-mobile"></i>--}}
                                                        <i><img src="{!! asset('assets/img/directory-mobile.png') !!}" alt=""></i>
                                                        <span>
                                                <a data-tel="{!! $hospital->mobile or '' !!}">
                                                    {!! $hospital->mobile or '' !!}
                                                </a>
                                                @if(! isEmptyOrNull($hospital->mobile_2) )
                                                                ,
                                                                <a data-tel="{!! $hospital->mobile_2 or '' !!}">
                                                    {!! $hospital->mobile_2 or '' !!}
                                                </a>
                                                            @endif
                                            </span>
                                                    </p>
                                                @endif

                                                @if($hospital->discount_availability)
                                                    <div class="dir-button-area">
                                                        {{--<a href="{!! route('frontend.hospital.show', $hospital->id) !!}" class="btn-alt active shadow small margin-null" ><i class="fa fa-hand-o-up" ></i> Get Discount</a>--}}
                                                        <a href="{!! route('frontend.hospital.show', $hospital->id) !!}" class="btn-alt active shadow small margin-null discount-btn" ><i class="fa fa-hand-o-up" ></i> {{__('find_hospital.buttons.get_discount')}}</a>
                                                        {{--<a href="#" class="btn-alt active shadow small margin-null" data-toggle="modal" data-target="#tipsmodal"><i class="fa fa-map-marker"></i> Show on Map</a>--}}
                                                        <a class=" btn-alt active shadow small margin-null btnShow"
                                                           data-title="{!! $hospital->name or '' !!}"
                                                           data-latitude="{!! $hospital->latitude or '' !!}"
                                                           data-longitude="{!! $hospital->longitude or '' !!}" type="button">
                                                            {{--<i class="fa fa-map-marker"></i>  Show On Map</a>--}}
                                                            <i><img src="{!! asset('assets/img/map_icon.png') !!}" alt=""></i>
                                                            {{__('buttons.show_map')}}</a>
                                                    </div>
                                                @else
                                                    <div class="sin-button-area">
                                                        <a class=" btn-alt active margin-null btnShow"
                                                           data-title="{!! $hospital->name or '' !!}"
                                                           data-latitude="{!! $hospital->latitude or '' !!}"
                                                           data-longitude="{!! $hospital->longitude or '' !!}" type="button">
                                                            {{--<i class="fa fa-map-marker"></i> Show On Map</a>--}}
                                                            <i><img src="{!! asset('assets/img/map_icon.png') !!}" alt=""></i>
                                                            {{__('buttons.show_map')}}</a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

{{--                    @endforeach--}}

                @else
                    <div class="doctor-list">
                        <div class="col-md-12">
                            <div class="doc-single padding-sm not-found">
                                <h6 class="text-center">{{__('find_hospital.msg_10')}}</h6>
                            </div>
                        </div>
                    </div>
                @endif

            @endif

            @if(isset($paginator) && $paginator->total_pages != 1 && $paginator->total_pages != 0)
                <section id="nav" class="padding-top-null ">
                    <div class="row">
                        <div class="col-xs-12">
                            @if(isset($type))
                                <ul class="pagination">
{{--                                    @if($paginator->current_page > 9)--}}
{{--                                        <li><a href="{!! route('frontend.pagination.hospital.type', ['type' => $type,'page' =>$paginator->current_page-8 ]) !!}"> << </a></li>--}}
{{--                                    @endif--}}

                                    @if(isset($first_page) && $paginator->current_page != 1 && $paginator->current_page>5)
                                        <li><a href="{!! route('frontend.pagination.hospital.type', ['type' => $type,'page' =>$first_page ]) !!}"> {{__('pagination.first')}} </a></li>
                                    @endif
                                    @if($paginator->previous_page_url != null)
                                        <li>
                                            <a href="{!! route('frontend.pagination.hospital.type', ['type' => $type,'page' =>$paginator->current_page-1 ]) !!}">
                                                <i class="ion-ios-arrow-left"></i> {{__('pagination.previous')}}</a>
                                        </li>
                                    @endif

                                    @for($i = max(1,$paginator->current_page-5); $i <=  min($paginator->current_page+5, $paginator->total_pages);  $i++)
                                        <li><a @if($i == $paginator->current_page) class="bg-brand-color" @endif href="{!! route('frontend.pagination.hospital.type', ['request' => $type,'page' =>$i ]) !!}">{!! $i!!}</a></li>
                                    @endfor

                                    @if($paginator->next_page_url != null)
                                        <li><a href="{!! route('frontend.pagination.hospital.type', ['type' => $type,'page' =>$paginator->current_page+1 ]) !!}">{{__('pagination.next')}} <i class="ion-ios-arrow-right"></i></a></li>
                                    @endif
{{--                                    @if($paginator->current_page < $paginator->total_pages-9 )--}}
{{--                                        <li><a href="{!! route('frontend.pagination.hospital.type', ['type' => $type,'page' =>$paginator->current_page+8 ]) !!}"> >> </a><li>--}}
{{--                                    @endif--}}

                                    @if($paginator->current_page != $paginator->total_pages && $paginator->current_page < $paginator->total_pages-5)
                                        <li><a href="{!! route('frontend.pagination.hospital.type', ['type' => $type,'page' =>$paginator->total_pages ]) !!}"> {{__('pagination.last')}} </a><li>
                                    @endif
                                </ul>
                            @else

                                <ul class="pagination">
{{--                                    @if($paginator->current_page > 9)--}}
{{--                                        <li><a href="{!! route('frontend.pagination.hospital', ['request' => $query_string,'page' =>$paginator->current_page-8 ]) !!}"> << </a></li>--}}
{{--                                    @endif--}}

                                    @if(isset($first_page) && $paginator->current_page != 1 && $paginator->current_page>5)
                                        <li><a href="{!! route('frontend.pagination.hospital', ['request' => $query_string,'page' =>$first_page ]) !!}"> {{__('pagination.first')}} </a></li>
                                    @endif
                                    @if($paginator->previous_page_url != null)
                                        <li>
                                            <a href="{!! route('frontend.pagination.hospital', ['request' => $query_string,'page' =>$paginator->current_page-1 ]) !!}">
                                                <i class="ion-ios-arrow-left"></i> {{__('pagination.previous')}} </a>
                                        </li>
                                    @endif

                                    @for($i = max(1,$paginator->current_page-5); $i <=  min($paginator->current_page+5, $paginator->total_pages);  $i++)
                                        <li><a @if($i == $paginator->current_page) class="bg-brand-color" @endif href="{!! route('frontend.pagination.hospital', ['request' => $query_string,'page' =>$i ]) !!}">{!! $i!!}</a></li>
                                    @endfor
                                    {{--{!! dd($query_string) !!}--}}

                                    @if($paginator->next_page_url != null)
                                        <li><a href="{!! route('frontend.pagination.hospital', ['request' => $query_string,'page' =>$paginator->current_page+1 ]) !!}">{{__('pagination.next')}} <i class="ion-ios-arrow-right"></i></a></li>
                                    @endif
{{--                                    @if($paginator->current_page < $paginator->total_pages-9 )--}}
{{--                                        <li><a href="{!! route('frontend.pagination.hospital', ['request' => $query_string,'page' =>$paginator->current_page+8 ]) !!}"> >> </a><li>--}}
{{--                                    @endif--}}

                                    @if($paginator->current_page != $paginator->total_pages && $paginator->current_page < $paginator->total_pages-5)
                                        <li><a href="{!! route('frontend.pagination.hospital', ['request' => $query_string,'page' =>$paginator->total_pages ]) !!}"> {{__('pagination.last')}}  </a><li>
                                    @endif

                                </ul>

                            @endif
                        </div>
                    </div>
                </section>
            @endif
            <div class="col-md-12 padding-leftright-null">
                <section  class="page padding-md padding-bottom-null @if($default == 0) padding-top-null @endif">
                    <div class="row no-margin">
                        <div class="col-md-12 services-box specialty">
                            <div class="col-md-3 ">
                                <a href="{!! route('frontend.hospital.all') !!}">
                                    <div class="alt-services text-center">
{{--                                        <img src="{!! asset('assets/img/specialist/hospital.png') !!}" alt="Hospital">--}}
                                        <img src="{!! asset('assets/img/directory-hospital.png') !!}" alt="Hospital">

                                        <div class="service">
                                            <h4 class="heading margin-bottom-extrasmall">{{__('find_hospital.hospital_clinic_diagnostic')}}</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{!! route('frontend.health_directory.type',['pharmacy']) !!}">
                                    <div class="alt-services text-center">
{{--                                        <img src="{!! asset('assets/img/Pharmacy1.png') !!}" alt="Pharmacy">--}}
                                        <img src="{!! asset('assets/img/directory-pharmacy.png') !!}" alt="Pharmacy">
                                        <div class="service">
                                            <h4 class="heading margin-bottom-extrasmall">{{__('find_hospital.pharmacy')}}</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- <div class="col-md-2">
                                <a href="{!! route('frontend.hospital.type', 'trauma') !!}">
                                    <div class="alt-services text-center">
                                        <img src="{!! asset('assets/img/specialist/trauma.png') !!}" alt="Trauma">
                                        <div class="service">
                                            <h6 class="heading margin-bottom-extrasmall">Trauma Center</h6>
                                        </div>
                                    </div>
                                </a>
                            </div> -->
                            <div class="col-md-3">
                                <a href="{!! route('frontend.health_directory.type',['blood-bank']) !!}">
                                    <div class="alt-services text-center">
{{--                                        <img src="{!! asset('assets/img/blood_bank.png') !!}" alt="Blood Bank Center">--}}
                                        <img src="{!! asset('assets/img/directory-blood-bank.png') !!}" alt="Blood Bank Center">
                                        <div class="service">
                                            <h4 class="heading margin-bottom-extrasmall">{{__('find_hospital.blood_bank')}}</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- <div class="col-md-2">
                                <a href="{!! route('frontend.hospital.type', 'nursing home') !!}">
                                    <div class="alt-services text-center">
                                        <img src="{!! asset('assets/img/specialist/nursing-home.png') !!}" alt="Nursing Home">
                                        <div class="service">
                                            <h6 class="heading margin-bottom-extrasmall">Nursing Home</h6>
                                        </div>
                                    </div>
                                </a>
                            </div> -->
                            <div class="col-md-3">
                                <a href="{!! route('frontend.health_directory.type',['healthy-living']) !!}">
                                    <div class="alt-services text-center">
                                        <img src="{!! asset('assets/img/healthy-living-outlet.png') !!}" alt="Others">
                                        <div class="service">
                                            <h4 class="heading margin-bottom-extrasmall">{{__('find_hospital.healthy_lifestyle')}}</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            {{--<div class="col-md-12 padding-leftright-null">--}}
                {{--<section class="near-by">--}}
                    {{--<div class="row no-margin">--}}
                        {{--<div class="col-md-12">--}}
                            {{--<a href="#map-show" id="find-hospital" class="near-map btn-alt small margin-null">Near by hospital</a>--}}
                        {{--</div>--}}
                        {{--<!-- ————————————————————————————————————————————--}}
                         {{--———	Map--}}
                         {{--—————————————————————————————————————————————— -->--}}

                        {{--<div id="map-show"  class=" padding-leftright-null">--}}
                            {{--<section class="doctor page padding-md">--}}
                                {{--<div class="container">--}}
                                    {{--<div class="col-md-12">--}}
                                        {{--<div id="map-canvas"></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</section>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</section>--}}
            {{--</div>--}}
        </div>


@endsection

@section('before-scripts-end')
    <script>
        $(".selectedOption").on("mouseover", function () {
            console.log("hi");
        });
    </script>
    <script>
        $('.division-list').change(function() {
            var divisionName = $(this).val();
            console.log();
            var URL = "{{ url('pages/district') }}" +'/'+ divisionName;
            $.ajax({
                type: "GET",
                url: URL,
                success: function(data) {
                    console.log(data);
                    var options = $(".district-list");
                    options.empty();

                    @if(Lang::locale() == 'en')
                    options.append('<option selected="selected" value="">Select a district</option>');
                    @elseif(Lang::locale() == 'bn')
                    options.append('<option selected="selected" value="">জেলা নির্বাচন করুন</option>');
                    @endif

                    $.each(data, function(key, value) {
                        options.append($("<option />").val(key).text(value));
                    });
                }
            });
        });
    </script>
    <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDAvjHPEzn8WlgWOUrG86rQMWyEYUw5zaE"></script>
    <script type="text/javascript">
        $('#find-hospital').on('click', function () {
            // geo location error handling
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var lat = position.coords.latitude;
                    var lon =  position.coords.longitude;
                    var i = 0;
                    var url = "{{ url('nearby-hospital/') }}"+'/' + lat + '/' + lon;
                    nearbyHospital(url);
                    Marker(lat,lon);
                });
                $("#map-show").fadeIn(100) ;
                $(".near-map").fadeOut(100);
                google.maps.event.trigger(map, 'resize');
            }
            marker.setMap(map);
            map.setCenter(marker.getPosition());
        });

        function geolocFail() {
            console.log('geo location failed');
        }

        google.maps.event.addDomListener(window, 'load', initMap);

        //
        function initMap() {
            var mapOptions = {
                center: new google.maps.LatLng(22.86382, 88.15638),
                zoom: 6,
                mapTypeId: google.maps.MapTypeId.ROADMAP,

            };
            /*if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;
                    Marker(latitude, longitude);
                })
            };*/

            map = new google.maps.Map(document.getElementById("map-canvas"),
                    mapOptions);

        }
        function addMarker(myLocation) {
            marker = new google.maps.Marker({
                position: myLocation,
                icon:'//maps.google.com/mapfiles/ms/icons/green-dot.png',
                map: map
            });
        }
        function Marker(latitude, longitude) {
            var  myLocation = new google.maps.LatLng(latitude, longitude);
            addMarker(myLocation);
        }
        function nearbyHospital(url) {
            $.ajax({
                url: url,
                type: 'GET',
                success: function(result) {
                    bounds  = new google.maps.LatLngBounds();
                    $.each(result,function(index,value){
                        var id = value.id;
                        var url = '{!! url("hospital") !!}'+'/'+value.id;
                        var latLong = new google.maps.LatLng(value.latitude, value.longitude);

                        var title = value.name;
                        var url = '{!! url("hospital") !!}'+'/'+value.id;
                        /*var url  = "hospitals"+'/'+ value.id;*/
                        bounds.extend(latLong);

                        var marker = new google.maps.Marker({
                            position: latLong,
                            map: map,
                            title: title,
                            url :url,
                            animation: google.maps.Animation.DROP,
                        });
                        google.maps.event.addListener(marker, 'click', function() {
                            window.location.href = marker.url;
                        });
                        map.fitBounds(bounds);
                        map.panToBounds(bounds);
                    });
                }});
        }
    </script>

@endsection
