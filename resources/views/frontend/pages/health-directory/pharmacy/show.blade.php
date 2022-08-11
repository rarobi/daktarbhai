@extends('frontend.layouts.theme.master')

@section('title', $pharmacy->name . ' - Daktarbhai')

@section('page-header-class', 'header-static')

@section('after-styles')
    <link rel="stylesheet" href="{!! asset('assets/css/theme/doctor-modal.css') !!}">

    <style>
        .service-info, .discount-info {
            padding: 8px 10px;
            margin-bottom: 2px;
            border: 1px solid #36B7B4;
            /*border-radius: 5px 0 0 5px;*/
            /*margin-right: 5px;*/
        }
        .service-info{
            border-radius: 5px 0 0 5px;
            border-right: none !important;
        }
        .discount-info{
            border-radius: 0 5px 5px 0;
        }

        a.btn-alt.small.active {
            background-color: #36B7B4 !important;
            color: #fff;
            border: 1px solid #36B7B4 !important;
        }

        .tab-area{
            background: #36B7B4;
            padding: 15px 10px;
        }

        .nav-tabs li.active a {
            color: #F7941E;
            background-color: #FFFFFF;
            border: 1px solid #F7941E;
            border-radius: 10px;
            margin-right: 5px;
            margin-left: 5px;
        }

        .nav-tabs li.active a:hover {
            color: #F7941E;
            background-color: #FFFFFF;
            border: 1px solid #F7941E;
            border-radius: 10px;
            margin-right: 5px;
        }
        .nav-tabs li a{
            color: #FFFFFF;
            border: 1px solid #FFFFFF;
            border-radius: 10px;
        }

        .hopspital-details .tab-content .tab-pane {
            margin-top: 0 !important;

        }

        .tab-content {
            border: 0.5px solid #DCDCDC;
            box-shadow: 2px 5px 15px rgba(220, 220, 220, 0.5);
        }
        i{
            color: #FFC445;
        }
        .doc-images {
            margin-top: 10px !important;
            margin-bottom: 10px !important;
        }

        .doc-images img {
            border-radius: 0 !important;

        }
    </style>
@endsection

@section('content')

    <div id="home-wrap" class="content-section fullpage-wrap row hospital-bg" style="background: linear-gradient(180deg, #F4F6F8 45.21%, #FFFFFF 100%);">
        <!-- ————————————————————————————————————————————
        ———	Hospital Details
        —————————————————————————————————————————————— -->
{{--        <div class="doctor-list">--}}
        <div class="col-md-12">
                <div class="doc-single hopspital-details">
                    <div class="col-md-8 padding-null">
                        <div class="hospital-info-area margin-bottom-small">
                            <div class="col-md-5 padding-null">
                                <div class="doc-images">
                                    <a href="#"><img src="{!! (isset($pharmacy) && $pharmacy->image_path !=null) ? $pharmacy->image_path : asset('assets/img/directory/pharmacy-dir.png') !!}" class="img-responsive img-center"></a>
                                </div>
                            </div>
                            <div class="col-md-7 padding-10">
                                <h2 class="hos-name">{!! $pharmacy->name or '' !!}</h2>
                                <!-- <p class="designation">BDS Consultant, Prime General Hospital</p> -->
                                <div class="address-wrap">
                                    <div class="address-left">
                                        @if(isset($pharmacy->address))
{{--                                            <p class="location"><i class="ion-ios-location-outline"></i> <span>{{__('find_hospital.address')}}</span><br>--}}
                                            <p class="location"> <i><img src="{!! asset('assets/img/directory-location.png') !!}" alt=""></i>
                                                {!! $pharmacy->address or '' !!}
                                            </p>
                                        @endif
                                        @if(isset($pharmacy->email))
                                            <p class="location">
{{--                                                <i class="ion-ios-email-outline"></i> <span>{{__('find_hospital.mail')}}</span><br>--}}
                                                <i class="ion-ios-email-outline"></i>
                                                {!! $pharmacy->email or '' !!}
                                            </p>
                                        @endif

                                        @if(! isEmptyOrNull($pharmacy->landphone ) || ! isEmptyOrNull($pharmacy->landphone_2) )
                                            <p class="location">
{{--                                                <i class="ion-ios-telephone-outline"></i>--}}
{{--                                                <span>{{__('find_hospital.phone')}}</span><br>--}}
                                                <i><img src="{!! asset('assets/img/directory-landphone.png') !!}" alt=""></i>
                                                <a data-tel="{!! $pharmacy->landphone or '' !!}">
                                                    {!! $pharmacy->landphone or '' !!}
                                                </a>
                                                @if(! isEmptyOrNull($pharmacy->landphone_2) ) ,
                                                <a data-tel="{!! $pharmacy->landphone_2 or '' !!}">
                                                    {!! $pharmacy->landphone_2 or '' !!}
                                                </a>
                                                @endif
                                            </p>
                                        @endif

                                        @if(! isEmptyOrNull($pharmacy->mobile) || ! isEmptyOrNull($pharmacy->mobile_2))
                                            <p class="location">
{{--                                                <i class="fa fa-mobile"></i>--}}
{{--                                                <span>{{__('find_hospital.mobile')}}</span><br>--}}
                                                <i><img src="{!! asset('assets/img/directory-mobile.png') !!}"></i>
                                                <a data-tel="{!! $pharmacy->mobile or '' !!}">
                                                    {!! $pharmacy->mobile or '' !!}
                                                </a>
                                                @if(! isEmptyOrNull($pharmacy->mobile_2) )
                                                    ,
                                                    <a data-tel="{!! $pharmacy->mobile_2 or '' !!}">
                                                        {!! $pharmacy->mobile_2 or '' !!}
                                                    </a>
                                                @endif
                                            </p>
                                        @endif

                                        {{--<p class="location"><i class="ion-ios-telephone-outline"></i> <span>Phone</span><br>
                                            09612316643 , +8801819282626 </p>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hospital-tab-area" style="margin-top: 0; background: #fff;">
                            <div class="tab-area">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab-one" aria-controls="tab-one" role="tab" data-toggle="tab">{{__('find_hospital.membership_benefit')}}</a></li>
                                    <li role="presentation"><a href="#tab-three" aria-controls="tab-three" role="tab" data-toggle="tab">{{__('find_hospital.overview')}}</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="tab-one">


                                    <div class="discount-list">
                                        @if(is_null($is_subscribed))
                                            {{--<div class="doc-overly">--}}
                                            {{--<div class="premium-content">--}}
                                            {{--<p>To enjoy this feature please login to Daktarbhai.</p>--}}
                                            {{--{{ Html::link('/signin','Login',['class'=>'btn-alt active shadow small margin-null purchase-plan']) }}--}}

                                            {{--</div>--}}
                                            {{--</div>--}}
                                        @else
                                            @if(!$is_subscribed)
                                                <div class="doc-overly">
                                                    <div class="premium-content">
                                                        <p>{{__('find_hospital.msg_1')}}</p>
                                                        {{ Html::link('subscription/plan',__('find_hospital.buttons.subscription_btn'),['class'=>'btn-alt active shadow small margin-null purchase-plan']) }}

                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                        @if(Cookie::has('_tn'))
                                            <h6>{{__('find_hospital.service_details')}}</h6>
                                            @if(isset($services) && ($services != null))
                                                <div class="table-responsive">
{{--                                                    <table class="table">--}}
{{--                                                        <tbody>--}}
                                                        @foreach($services as $service)
{{--                                                            <tr>--}}
{{--                                                                <td>{!! $service->service_name !!}</td>--}}
{{--                                                                <td>{!! $service->discount !!}</td>--}}
    {{--                                                            </tr>--}}
                                                            <div class="col-md-8 col-sm-8 service-info">
                                                                {!! $service->service_name !!}
                                                            </div>
                                                            <div class="col-md-3 col-sm-3  discount-info text-center">
                                                                {!! $service->discount !!}
                                                            </div>
                                                        @endforeach
{{--                                                        </tbody>--}}
{{--                                                    </table>--}}
                                                    <div class="col-md-12">
                                                        <p class="text-left justi">{{__('find_hospital.msg_11')}}
                                                        </p>
                                                    </div>
                                                    @if(!$is_subscribed && (!is_null($is_subscribed)))
{{--                                                    <a id="avail_discount" href="" data-modal="#modal" class="modal__trigger btn-alt small active margin-null">{{__('find_hospital.buttons.avail_discount')}}</a>--}}
                                                    @else
                                                    <a id="avail_discount" href="" data-modal="#modal" class="modal__trigger btn-alt small active margin-null">{{__('find_hospital.buttons.avail_discount')}}</a>
                                                    {{--<button id="avail_discount" class="btn btn-default">Avail discount</button>--}}
                                                    @endif
                                                </div>
                                            @else
                                                <p>
                                                    {{__('find_hospital.msg_4')}}
                                                </p>
                                            @endif
                                        @else
                                            <div class="dis-login">
                                                <p class="text-left">{{__('find_hospital.request_login')}} </p>
                                                <a href="{!! route('frontend.signin') !!}" class="btn-alt small active margin-null">{{__('find_hospital.login/register')}}</a>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                                <div role="tabpanel" class="tab-pane" id="tab-three">
                                    {!! (isset($pharmacy->description) && $pharmacy->description !=null) ? $pharmacy->description  : __('find_hospital.isPanel_pharmacy')  !!}
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4 left-border">
                        <div class="location-area">
                            <h4>{{__('find_hospital.location_map')}} :</h4>
                            <div class="ad-map">
                                {{-- <img src="{!! asset('assets/img/hospital-locations.png') !!}">--}}
                                <div  id="map-canvas" style="float:left;height: 300px; width: 90%; border: 1px solid #ddd;">
                                </div>
                            </div>

                            {{--<div class="widget-wrapper">--}}
                                {{--<div class="fixed-top">--}}
                                    {{--<div class="hos-side-images">--}}
                                    {{--</div>--}}
                                    {{--<div class="fixed-content">--}}
                                        {{--<!-- <h4>Worried about your health?</h4> -->--}}
                                        {{--<p>{{__('find_hospital.sidebar_content.title')}} </p>--}}
                                        {{--<a href="{!! route('frontend.health_directory') !!}" class="btn-alt small active doc-btn">{{__('find_hospital.sidebar_content.button.find')}}</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                    <!-- Tabs  -->

                    <!--  END Accordion and Tabs  -->
                </div>
            </div>
{{--        </div>--}}
        <!-- ————————————————————————————————————————————
         ———	Avail Discount Modal
         —————————————————————————————————————————————— -->
        <div id="modal" class="modal modal__bg" role="dialog" aria-hidden="true">
            <div class="modal__dialog">
                <div class="modal__content">
                    <h4 style="color:#ed1c24"> {{__('find_hospital.email_title')}}</h4>
                    <br>
                    <p class="modal_message"></p>
                    <p > {{__('find_hospital.email_msg')}}</p>
                    <!-- modal close button -->
                    <a href="" class="modal__close demo-close">
                        <svg class="" viewBox="0 0 24 24"><path d="M19 6.41l-1.41-1.41-5.59 5.59-5.59-5.59-1.41 1.41 5.59 5.59-5.59 5.59 1.41 1.41 5.59-5.59 5.59 5.59 1.41-1.41-5.59-5.59z"/><path d="M0 0h24v24h-24z" fill="none"/></svg>
                    </a>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('before-scripts-end')
    <script src="//maps.googleapis.com/maps/api/js?key={!! config("misc.web.google_map_key") !!}"></script>
    <script type="text/javascript">

        google.maps.event.addDomListener(window, 'load', initMap);
        function initMap() {
            var latitude = '{!! $pharmacy->latitude  !!}';
            var longitude = '{!! $pharmacy->longitude !!}';

            var name = "{!! $pharmacy->name  !!}";
            var myLatLng =  new google.maps.LatLng(latitude, longitude);
            var map = new google.maps.Map(document.getElementById('map-canvas'), {
                zoom: 14,
                center: myLatLng
            });
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: name,
                icon:'//maps.google.com/mapfiles/ms/icons/green-dot.png',
            });

        }
        $(document).ready(function(){
            $("#tab-three").bind('onClick', function() {
                google.maps.event.trigger(map, 'resize');
                $("#map-canvas").css("height","100%");
            });
        });
        $(document).ready(function () {
            @if($is_subscribed)
            $("#avail_discount").on('click',function () {
                /*$(this).disabled = true;*/
                var id = '{!! $pharmacy->id !!}';
                var type = 'pharmacy';
                var url = "{{ url('directory-avail-discount') }}"+'/' + type + '/' + id;
                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function(result) {
                        if(result.status_code == 200) {
                            $('.modal_message').text('{{__('find_hospital.modal.message.request_received')}} ');
                        } else {
                            $('.modal_message').text('{{__('find_hospital.modal.message.error_message')}}');
                        }
                    }
                }).fail(function(data) {
                    $('.modal_message').text('{{__('find_hospital.modal.message.error_message')}}');
                });
            });
            @endif

            $(function(){
                if(navigator.userAgent.match(/(iPhone|Android.*Mobile)/i))
                {
                    $('a[data-tel]').each(function(){
                        $(this).prop('href', 'tel:' + $(this).data('tel'));
                    });
                }
            })

        })
    </script>
@endsection
