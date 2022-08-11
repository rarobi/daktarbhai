@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'Saved Blogs | ' . app_name()  !!}
@endsection

<style>
    .bookmark.recent-posts .post-thumbnil{
        width:200px;
    }
    .bookmark.recent-posts .post-thumbnil img{
        width:250px;
        height: auto;
    }
    .bookmark.recent-posts li {
        background: #fff;
        float: left;
        width: 100%;
        margin-bottom: 15px;
        font-family: 'Georgia', 'SolaimanLipi', sans-serif !important;
    }
    .bookmark.recent-posts .post-content {
        margin-left: 250px;
        padding: 15px;
        font-family: 'Georgia', 'SolaimanLipi', sans-serif !important;
    }
    .bookmark.recent-posts .post-content p {
        padding-left: 0px;
        margin-bottom: 10px !important;
        font-family: 'Georgia', 'SolaimanLipi', sans-serif !important;
    }
    .bookmark.recent-posts .post-content h3 {
        font-size: 18px;
        line-height: 24px;
        margin: 0 0 10px 0;
        font-family: 'Georgia', 'SolaimanLipi', sans-serif !important;
    }
</style>
@section('main-content')
    <div class="bhoechie-tab-content active">
        <h3 class="profile-title"> {{__('profile.blog.title')}}</h3>
        <div class="my-questions">
            @if(isset($savedBlogs) && $savedBlogs != null)
                @foreach($savedBlogs as $blog)
                    <ul class="bookmark recent-posts">
                        <li>
                            <a href="{!! $blog->link !!}">
                                <div class="post-thumbnil">
                                    <img src="{!! (isset($blog) && $blog->featured_image !=null) ? $blog->featured_image : asset('assets/img/missing-image.jpg') !!}" alt="">
                                </div>
                                <div class="post-content">
                                    <h3>{{ $blog->title or '' }} </h3>
                                    <p>{!! textshorten($blog->intro , 420)!!}...</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                @endforeach
            @else
                <div class="phr-create-img">
{{--                    <img src="{!! asset('assets/img/saved_bookmark.png') !!}" alt="">--}}
                    <img src="{!! asset('assets/img/phr/no-data.png') !!}" alt="">
                </div>
                <p class="text-center padding-sm profile-create-new">
                    {{__('profile.blog.msg.blog_msg')}}
                    <a href="{!! route('frontend.blog.index') !!}" class="btn-alt small active doc-btn">{{__('profile.blog.button.go_blog')}}
                        <i class="fa fa-plus-circle"></i>
                    </a>
                </p>
            @endif
        </div>
    </div>
@endsection
