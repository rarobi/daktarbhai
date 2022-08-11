@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Your Health, Take Care | ' . app_name()  !!}
@endsection

@section('after-styles')
    <link rel="stylesheet" href="{!! asset('assets/css/ekko-lightbox.css') !!}">


    <style type="text/css">
        .our-partner-hospital .top-cart {

            border-radius: 10px !important;
            background-color: #ffffff !important;
        }

        .card-title{
            height: auto !important;
            padding: 0 !important;
        }

        img.speciality-img {
             margin: 0 !important;
        }

        @media screen and (min-width: 320px)and (max-width: 767px) {

            .corona-service-btn {
                line-height: 25px !important;
            }
        }

        @media screen and (min-width: 320px)and (max-width: 400px) {

            .home-pathology-btn {
                line-height: 25px !important;
            }
        }
        @media screen and (min-width: 320px)and (max-width: 330px) {

            .tall-to-doctor-btn,.video-call-btn {
                line-height: 25px !important;
            }

            .service-text {
                font-size: 15px;
            }
        }
    </style>

@endsection

        @section('content')
{{--            @include('frontend.pages.home.slider')--}}

<div id="home-wrap" class="content-section fullpage-wrap">

        @include('frontend.pages.home.partials.search')
        @include('frontend.pages.home.slider')
        <!-- ————————————————————————————————————————————
        ———	Why Choose Us Start Here
        —————————————————————————————————————————————— -->
{{--        @include('frontend.pages.home.partials.why-choose-us')--}}
        <!-- ————————————————————————————————————————————
        ———	Why Choose Us End
        —————————————————————————————————————————————— -->
            <!-- ————————————————————————————————————————————
  ———	Services Start Here
  —————————————————————————————————————————————— -->
        @include('frontend.pages.home.partials.services-promo')
        <!-- ————————————————————————————————————————————
        ———	Video Blog Start Here
        —————————————————————————————————————————————— -->
        {{--@include('frontend.pages.home.partials.video-blogs')--}}
        <!-- ————————————————————————————————————————————

        ———	Video Blog End
        —————————————————————————————————————————————— -->
<!-- ————————————————————————————————————————————

    ———	Video Blog Start Here
    —————————————————————————————————————————————— -->

        @include('frontend.pages.home.partials.new-feature')

<!-- ————————————————————————————————————————————
———	Video Blog End
—————————————————————————————————————————————— -->

        <!-- ————————————————————————————————————————————
        ———	Services Start Here
        —————————————————————————————————————————————— -->
        @include('frontend.pages.home.partials.speciality')
{{--        @include('frontend.pages.home.partials.services-promo')--}}


    <!-- ————————————————————————————————————————————
        ———	Partner Hospitals Start Here
        —————————————————————————————————————————————— -->
{{--    @include('frontend.pages.home.partials.partner-hospitals')--}}

    <!-- ————————————————————————————————————————————
        ———	Discount Partners Start Here
        —————————————————————————————————————————————— -->
{{--    @include('frontend.pages.home.partials.discount-partners')--}}

        <!-- ————————————————————————————————————————————
        ———	Health Tips start Here
        —————————————————————————————————————————————— -->
        {{--@include('frontend.pages.home.partials.health-tips')--}}

        <!-- ————————————————————————————————————————————
        ———	Health Questions Start Here
        —————————————————————————————————————————————— -->
        {{--@include('frontend.pages.home.partials.health-questions')--}}


        <!-- ————————————————————————————————————————————
        ———	User Feedback End
        —————————————————————————————————————————————— -->
        <!-- ————————————————————————————————————————————
        ———	Daktarbhai Corporate start
        —————————————————————————————————————————————— -->
        @include('frontend.pages.home.partials.membership-benifit')
        {{--@include('frontend.pages.home.partials.corporate-promo')--}}

        <!-- ————————————————————————————————————————————
        ———	Tekedaktar Corporate End
        —————————————————————————————————————————————— -->

        <!-- ————————————————————————————————————————————
        ———	Blog Start Here
        —————————————————————————————————————————————— -->
        @include('frontend.pages.home.partials.recent-articles')

        <!-- ————————————————————————————————————————————
        ———	Blog End

{{--        <!-- ————————————————————————————————————————————--}}

            ———	download-app Start Here
            —————————————————————————————————————————————— -->
{{--        @include('frontend.pages.home.partials.counter')--}}
        @include('frontend.pages.home.partials.download-app')

        <!-- ————————————————————————————————————————————
                    ———	download-appEnd
            —————————————————————————————————————————————— -->
        <!-- ————————————————————————————————————————————
            ———	Testimonial Start Here
            —————————————————————————————————————————————— -->
        @include('frontend.pages.home.partials.testimonial')

        <!-- ————————————————————————————————————————————
            ———	Testimonial End
            —————————————————————————————————————————————— -->
        <!-- ————————————————————————————————————————————
         ———	User Feedback Start
         —————————————————————————————————————————————— -->
{{--        @include('frontend.pages.home.partials.feedbacks')--}}

        <!-- ————————————————————————————————————————————
        ———	Clients Logo Start Here
        —————————————————————————————————————————————— -->
{{--        @include('frontend.pages.home.partials.clients')--}}
        <!-- ————————————————————————————————————————————
        ———	Clients Logo End
        —————————————————————————————————————————————— -->
    </div>
@endsection

@section('before-scripts-end')
    <script src="{!! asset('assets/js/ekko-lightbox.min.js') !!}"></script>

    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId: "{!! config("misc.web.facebook_app_id") !!}",
                status: true,
                cookie: true,
                xfbml: true,
                version: 'v2.8'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8&appId="+"{!! config("misc.web.facebook_app_id") !!}";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        function postToFeed(title, url, image, description) {
            var obj = {method: 'feed', link: url, name: title, picture: image, description: description, display: 'popup'};
            function callback(response) {
                location.reload();
            }
            FB.ui(obj, callback);
        }

        $(document).on('click', '.fb_share', function(e){
            e.preventDefault();

            var tips = $(this);
            var title = tips.data('title'),
                image = tips.data('image'),
                description = tips.data('description'),
                url = tips.data('href');
            console.log(url +title + description);
            postToFeed(title, url, image, description);

            return false;
        })

        $(document).ready(function(){
            $(".testimonial-quote").owlCarousel({
                loop:true,
                autoplay:true,
                slideshowSpeed:1000,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:false,
                        loop:true
                    },
                }
            });

            $(".recent-artilce").owlCarousel({
                loop:true,
                autoplay:true,
                slideshowSpeed:1000,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:false,
                    },
                    600:{
                        items:2,
                        nav:false,
                        loop:true
                    },
                }
            });

            $(".membership-benefit").owlCarousel({
                loop:true,
                autoplay:true,
                slideshowSpeed:1000,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:false,
                    },
                    600:{
                        items:2,
                        nav:false,
                    },
                    1000:{
                        items:3,
                        nav:false,
                        loop:true
                    },
                }
            });

            //Search data for advice
            $( function() {
                var sourceURL = "{!! route('frontend.tele-medicine.speciality-list-search') !!}";

                $( "#speciality" ).autocomplete({
                    source: sourceURL,
                    appendTo: "#specialist-holder",
                    minlength:1,
                    autofocus:true,
                    select:function(event, ui){
                       console.log(3);
                        $("#speciality_id").attr('value', ui.item.id);
                        // var $results = $('.specialist-holder').find('*').filter(function() {
                        //     return $(this).text() === ui.item.name;
                        // });

                        if($results.length == 0){
                            $('.advice-suggestion').append(
                                '<li style="display: none;">' +
                                '<a class="practitioner-advice-text"  data-advice-record="' + ui.item.id + '">' + ui.item.name +
                                '</a>' +
                                '</li>'
                            );
                            getAdvices($('.advice-suggestion').children().last().find('a'));
                        }
                    }
                });
            } );

            {{--$('#speciality').change(function() {--}}
            {{--    var specialityId = $('#speciality').val();--}}
            {{--    var url ='tele-medicine/speciality-wise-doctor?speciality_id='+specialityId;--}}
            {{--    window.location.href = url;--}}
            {{--});--}}

            {{--$('#location').change(function() {--}}
            {{--    var districtId = $('#location').val();--}}
            {{--    var URL = "{{ route('frontend.index') }}";--}}

            {{--    $.ajax({--}}
            {{--        type: "GET",--}}
            {{--        url: URL,--}}
            {{--        data:{ district_id : districtId },--}}
            {{--        success: function(data) {--}}
            {{--            console.log(data);--}}
            {{--            return false;--}}
            {{--        }--}}
            {{--    });--}}
            {{--    window.location.href = url;--}}
            {{--});--}}

            //
            // $(".video_link").click(function() {
            //     var video_link;
            //     video_link = $(this).attr("href");
            //     alert(video_link);
            //     return false;
            // });
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                // $(this).ekkoLightbox();
                $(this).ekkoLightbox({
                    alwaysShowClose: true,
                    backdrop: 'static',
                });

            });
            // });

            $('#talk-to-doctor').on('click', function () {
                var is_subscribed    = "{{ $isSubscribed }}";
                var is_authenticated = "{{ session('user') }}";

                if(is_authenticated) {
                    if(is_subscribed){
                        swal({
                            text: 'Please call 16643 to make an appointment',
                            showCloseButton: true,
                            confirmButtonColor: '#00d4a4',
                        });
                    } else {
                        swal({
                            text: 'Sorry! You have to subscribed one of daktarbhai package',
                            showCloseButton: true,
                            confirmButtonColor: '#00d4a4',
                        });
                    }
                } else {
                    window.location.href = '/signin';
                }


            });

        });
    </script>

@endsection