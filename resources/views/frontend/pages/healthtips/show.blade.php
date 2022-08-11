@extends('frontend.layouts.theme.master')

@section('title', $healthTip->title . ' - Daktarbhai')

@php
$image =(isset($healthTip) && $healthTip->image_obj->web_large !=null) ? $healthTip->image_obj->web_large : (($healthTip->image !=null) ? $healthTip->image : asset('assets/img/missing-image.jpg'));
@endphp

@section('page-header-class', 'header-static')
@section('meta_description', $healthTip->title)

@section('meta_og_title', $healthTip->title)
@section('meta_og_type', 'article')
@section('meta_og_url', $healthTip->link)
@section('meta_og_image', $image)
@section('meta_og_description', $healthTip->content)

@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap health-tips-bg">
        <div class="row margin-leftright-null">
            <!-- ————————————————————————————————————————————
            ———	Medical Tourism content
            —————————————————————————————————————————————— -->
            <section class="doctor page padding-md">
                <div class="container">
                    <h2 class="text-center padding-top-null white">
                        Health Tips
                    </h2>
                    <p class="heading white text-center">Health is a right, not a privilege. It needs to be enjoyed with equity.</p>
                </div>
            </section>
        </div>
    </div>
    <div id="home-wrap" class="content-section fullpage-wrap healtips-area">
        <div class="row margin-leftright-null">
            <div class="no-margin health-tips">
              <div class="col-md-9 padding-leftright-null">
                    <div class="health-tips-content">
                <!-- ————————————————————————————————————————————
                ———	Health Tips Modal
                —————————————————————————————————————————————— -->
                                <div class="modal-dialog">
                                    <div class="modal-content single-health-tips">
                                        <div class="modal-header">
                                            <img src="{!! $image !!}" class="moadal-img" alt="">
                                        </div>
                                        <div class="modal-body">
                                            <h2>{!! $healthTip->title or '' !!}</h2>
                                            {{--<a class="fb_share"  data-title="{!! $healthTip->title !!} " data-description="{!! textshorten($healthTip->description , 420)!!}"--}}
                                               {{--data-image="{!! (isset($healthTip) && $healthTip->image !=null) ? $healthTip->image : asset('assets/img/missing-image.jpg') !!}"  data-href="{!! $healthTip->link or '' !!}">Share on  |  <i class="ion-social-facebook" data-pack="social" data-tags="like, post, share"></i></a>--}}
                                            <div class="tips-meta">
                                                <i class="ion-coffee"></i> @foreach(array_slice($healthTip->categories, 0, 1) as $category) &nbsp;{!! $category->name or '' !!} @endforeach &nbsp; &nbsp;
                                                <i class="ion-clock"></i> {!! $healthTip->published_before or '' !!}
                                            </div>
                                            <div class="post-share-icons">
                                                <ul class="info">
                                                    <li> <a class="fb_share"  data-title="{!! $healthTip->title !!} " data-description="{!! textshorten($healthTip->description , 420)!!}"
                                                            data-image="{!! $image !!}"  data-href="{!! $healthTip->link or '' !!}">Share on  |  <i class="ion-social-facebook" data-pack="social" data-tags="like, post, share"></i></a></li>
                                                </ul>
                                            </div>
                                            <p class="tips-content-block">
                                                {!! $healthTip->description or '' !!}
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{!! url('healthtips') !!}" class="back-btn"><i class="ion-ios-arrow-back"></i> Back to health tips</a>
                                        </div>
                                    </div>
                                </div>

                            <!-- end healthtips modal-->

                    </div>
                </div>
                <div class="col-md-3 text health-tips-sidebar">
                    @include('frontend.pages.healthtips.partials.sidebar')
                </div>


            </div>
        </div>


    </div>
@endsection

@section('before-scripts-end')

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
    </script>
@endsection

@push('after-scripts-end-stack')
<script>
    $(".tips-read-more").click(function(){
        var targetVal   = $(this).attr("data-target");
        var tipsId  =   targetVal.replace('#tipsmodal','');

        //location.hash = +'/'+tipsId;
//        this.href=  this.href+'/'+tipsId;
//        e.preventDefault();
//        history.pushState({}, "", this.href+'/'+tipsId);
        var currentUrl  = window.location.href.split('#')[0];

        var newurl  =   currentUrl+'#'+tipsId;
        window.history.pushState({path:currentUrl},'',newurl);

    });
</script>

@endpush
