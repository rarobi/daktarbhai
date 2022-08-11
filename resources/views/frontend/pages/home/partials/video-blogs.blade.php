@section('header-script')
<style type="text/css">


    .our-partner-hospital .top-cart {

        border-radius: 10px !important;
        /*background-color: #ffffff !important;*/
    }
    .card-img-top{
        border-radius: 10px!important;
    }
</style>
@endsection

@if(isset($video_blogs) && $video_blogs != null)
<div class="row margin-leftright-null our-partner-hospital grey-background">
    <div class="col-md-12 padding-leftright-null">
        <div data-responsive="parent-height" data-responsive-id="mission" class="text">
            <h3 class="title text-center grey big margin-bottom-small home-title"> Video <span> Blog </span>   </h3>
        </div>
    </div>

    <div class="row no-margin text partner-hospitals">
        <div class="col-md-12 padding-leftright-null">
            <div class="col-md-12 padding-leftright-null partner-hospital">
                @foreach($video_blogs as $video_blog)
                <div class="col-sm-12 padding-leftright-null partner-hospital-margin item">
                    <div class="text text-center padding-md-bottom-null hospital_logo" style="padding: 50px;">
                        <div class="top-cart white">
                            <a href="{!! $video_blog->video_link !!}" data-toggle="lightbox" data-width="1200" data-height="600" data-type="youtube" >
                                <img class="card-img-top" src="{{$video_blog->thumbnail_image}}" alt="Card image cap"><br>
                                <div class="card-body">
                                    <p class="card-text">{{$video_blog->title}}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
    @endif

