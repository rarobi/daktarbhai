@extends('frontend.layouts.theme.master')
@section('title')
    {!! 'Health Directory | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('after-styles')
    <style>

        .list {
            height: 300px;
            overflow-y: scroll !important;
        }

        @media screen and (min-width: 320px)and (max-width: 1000px) {
            .white{
                margin-top: 60px;
            }
        }

    </style>
<link rel="stylesheet" href="{!! asset('assets/css/nice-select.min.css') !!}">


@endsection

@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap row dir-bg">
        <div class="col-md-12 padding-leftright-null">
            <!-- ————————————————————————————————————————————
            ———	Find Doctor Start here
            —————————————————————————————————————————————— -->
            <section class="health-directory-page doctor page padding-md doctor-pd">
                <div class="container">
                    <h2 class="text-center padding-sm padding-top-null white">
                        {{--Health <span> Directory</span>--}}
                        {{__('search.heading')}}
                        <p class="dir-des">{{__('search.header_text')}}</p>
                    </h2>
                    <div class="directory-search doc-search" style="margin-bottom: 0">
                        <div class="search-form">
                            @include('frontend.pages.health-directory.search')
                        </div>
                    </div>
{{--                    <div class="directory-cat">--}}
{{--                        <ul>--}}
{{--                            <li><a href="{!! route('frontend.health_directory.type',['ambulance']) !!}"><div class="dir-icon"><img src="{!! asset('assets/img/ambulance.png') !!}" alt="ambulance"></div><span>{{__('search.ambulance')}}</span></a></li>--}}
{{--                            <li><a href="{!! route('frontend.health_directory.type',['hospital']) !!}"><div class="dir-icon"><img src="{!! asset('assets/img/hospital1.png') !!}" alt="Hospital"></div><span>{{__('search.hospital')}}</span></a></li>--}}
{{--                            <li><a href="{!! route('frontend.health_directory.type',['pharmacy']) !!}"><div class="dir-icon"><img src="{!! asset('assets/img/medicine.png') !!}" alt="medicine"></div><span>{{__('search.pharmacy')}}</span></a></li>--}}
{{--                            <li><a href="{!! route('frontend.health_directory.type',['blood-bank']) !!}"><div class="dir-icon"><img src="{!! asset('assets/img/blood.png') !!}" alt="blood"></div><span>{{__('search.blood_bank')}}</span></a></li>--}}
{{--                            <!-- <li><a href="#"><div class="dir-icon"><img src="{!! asset('assets/img/shop.png') !!}" alt="shop"></div><span>Healthy Shop</span></a></li>--}}
{{--                            <li><a href="#"><div class="dir-icon"><img src="{!! asset('assets/img/food.png') !!}" alt="food"></div><span>Healthy Food</span></a></li> -->--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </div>
            </section>
        </div>
    </div>
    <div id="home-wrap" class="content-section fullpage-wrap row white">
        <div class="col-md-12 padding-leftright-null">
        <section  class="page padding-md padding-bottom-null">
            <div class="row no-margin">
                <div class="col-md-12 services-box specialty">
                    <div class="col-md-2 col-md-offset-2">
                        <a href="{!! route('frontend.health_directory.type',['ambulance']) !!}">
                            <div class="alt-services text-center">
                                <img src="{!! asset('assets/img/directory-ambulance.png') !!}" alt="Hospital">
                                <div class="service">
                                    <h6 class="heading margin-bottom-extrasmall">{{__('navs.general.ambulance')}}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
{{--                        <a href="{!! route('frontend.hospital.all') !!}">--}}
                        <a href="{!! route('frontend.health_directory.type',['hospital']) !!}">
                            <div class="alt-services text-center">
                                <img src="{!! asset('assets/img/directory-hospital.png') !!}" alt="Hospital">
                                <div class="service">
                                    <h6 class="heading margin-bottom-extrasmall">{{__('navs.general.hospital')}}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{!! route('frontend.health_directory.type',['pharmacy']) !!}">
                            <div class="alt-services text-center">
                                <img src="{!! asset('assets/img/directory-pharmacy.png') !!}" alt="Pharmacy">
                                <div class="service">
                                    <h6 class="heading margin-bottom-extrasmall">{{__('find_hospital.pharmacy')}}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{!! route('frontend.health_directory.type',['blood-bank']) !!}">
                            <div class="alt-services text-center">
                                <img src="{!! asset('assets/img/directory-blood-bank.png') !!}" alt="Blood Bank Center">
                                <div class="service">
                                    <h6 class="heading margin-bottom-extrasmall">{{__('find_hospital.blood_bank')}}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>

@endsection
@section('before-scripts')
  <script src="{!! asset('assets/js/typeahead.bundle.js') !!}"></script>
  <script src="{!! asset('assets/js/jquery.nice-select.min.js')!!}"></script>
  <!-- <script src='//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script> -->
@endsection
@section('before-scripts-end')
    <script>
        /*Nice select Active*/
        $('select').niceSelect();
    </script>
    <script>
        $(function(){
            var substringMatcher = function(strs) {
                return function findMatches(q, cb) {
                    var matches, substrRegex;


                    // an array that will be populated with substring matches
                    matches = [];

                    // regex used to determine if a string contains the substring `q`
                    substrRegex = new RegExp(q, 'i');

                    // iterate through the pool of strings and for any string that
                    // contains the substring `q`, add it to the `matches` array
                    $.each(strs, function(i, str) {

                        if (substrRegex.test(str.name)) {

                            // the typeahead jQuery plugin expects suggestions to a
                            // JavaScript object, refer to typeahead docs for more info
                            matches.push({ value: str.name, id:str.id, type:str.type  });
                        }
                    });

                    cb(matches);
                };
            };


            var districts = JSON.parse('{!! $districts !!}');

            $('.typeahead').typeahead({
                    hint: true,
                    highlight: true,
                    minLength: 0
                },
                {
                    name: 'Districts',
                    displayKey: 'value',
                    source: substringMatcher(districts),
                    limit: 40,
//                    templates: {
//                        header: '<h3 class="league-name">Districts</h3>'
//                    }
                });
            $('.typeahead').on( 'focus', function() {
                if($(this).val() === '') // you can also check for minLength
                    $(this).data().ttTypeahead.input.trigger('queryChanged', '');
            });

            $('#scrollable-dropdown-menu .typeahead').bind('typeahead:select', function(ev, suggestion) {
                if(suggestion.type == 'spt') {
                    $('#typeSelecctedVal').val(suggestion.id);
//                $("#doctorName").prop('disabled', true);

                } else {
                    $('#typeSelecctedVal').prop('disabled', true);

                }

            });
        });
    </script>
@endsection
