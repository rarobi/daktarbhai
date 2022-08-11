@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Video Blog | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('after-styles')
    <link rel="stylesheet" href="{!! asset('assets/css/ekko-lightbox.css') !!}">
    <style>
        .embed-responsive-16by9 {
            padding-bottom: 50.25% !important;
        }

        .video-box {
             padding: 0 !important;
            min-height: 450px;
        }

        @media screen and (min-width: 768px)and (max-width: 991px) {

            .video-box{
                margin-left: 100px;
            }
        }

        @media (max-width: 991px){

            .video-box{
                min-height: auto;
            }
        }


    </style>
@stop

@section('content')

{{--    <div class="grey-background row video-top-slide">--}}
{{--        <div class="col-md-12">--}}
{{--            <div class="col-md-12">--}}
{{--                <video class="video-box" width="1220" height="400" controls>--}}
{{--                    <source src="mov_bbb.mp4" type="video/mp4">--}}
{{--                    <source src="mov_bbb.ogg" type="video/ogg">--}}
{{--                    Your browser does not support HTML video.--}}
{{--                </video>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div><br>--}}
@if(isset($video_blogs) && $video_blogs != null)
    <div class="row margin-left-null video-list-body">
        <h3>Video Blog</h3>
{{--        <div class="col-md-12">--}}
        @foreach($video_blogs as $video_blog)
            <div class="col-md-4">
                <div class="text-center padding-md-bottom-null" style="padding: 5px;">
                    <div class="video-box">
                        <a href="{!! $video_blog->video_link !!}" data-toggle="lightbox" data-width="1200" data-height="600" data-type="youtube" >
                            <img class="video-img img-responsive" src="{{$video_blog->thumbnail_image}}" alt="Card image cap">
{{--                            <br>--}}
                            <div class="card-body">
                                <p class="video-title">{{$video_blog->title}}</p>
                                <p class="video-counter"><span><i class="fa fa-heart"> 33</i></span> <span class="m-l-5"><i class="fa fa-comment"> 35</i></span> <span class="m-l-5"> <i>123 views</i></span> </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div><br>

    <div class="row m-t-30">
        <div class="col-md-2 col-md-offset-5">
            <a href="#" class="btn btn-lg benefit-btn">Load More Videos</a>
        </div>
    </div>
@endif

@endsection

@section('before-scripts-end')
    <script src="{!! asset('assets/js/ekko-lightbox.min.js') !!}"></script>
    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true,
                backdrop: 'static',
            });

        });
    </script>
@endsection
