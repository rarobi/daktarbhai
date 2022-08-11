@extends('frontend.layouts.theme.master')

@section('title', $article->title . ' | ' . app_name() )

@section('page-header-class', 'header-static')

@section('after-styles')
<style>

    aside.sidebar form .form-input span.form-button {

        width: 80px;
        background-color: #36B7B4;
    }

    aside.sidebar form .form-input span.form-button-new input {

        width: 90px;
        background-color: #36B7B4;
    }

    .subscribe-blog .form-field {
        border: 0.5px solid #DCDCDC !important;
    }

    #page-content #news .single-news article span.blog-category {
        background-color: #36B7B4 !important;
    }

    aside.sidebar h5{
        color: #F7941E !important;
    }

    #page-content #news .single-news article span.read{
        background-color: #36B7B4 !important;
    }

    ._4uyl ._1cb {
        border: 1px solid #36B7B4 !important;
    }

</style>
@stop

@section('meta_description', $article->intro)

@section('meta_og_title', $article->title)
@section('meta_og_type', 'article')
@section('meta_og_url', $article->link)
@section('meta_og_image', (isset($article) && $article->featured_image !=null) ? $article->featured_image : asset('assets/img/missing-image.jpg'))
@section('meta_og_description', $article->intro)

@section('content')

<div id="fb-root"></div>

    <div id="home-wrap" class="content-section fullpage-wrap grey-background row">
            <div class="col-md-9 padding-leftright-null">
                <section id="news" class="page">
                    <div class="news-items equal two-columns">
                        <div class="single-news one-item tips">
                            <article>
                                <div class="content">
                                    @if(session('user'))
                                    <div class="visible-sm visible-xs">
                                        <span  class="bookmark" >
                                                @if(isset($article->is_favourite) && $article->is_favourite)
                                                <i class="fontchange fa fa-bookmark fa-lg"  aria-hidden="true"></i>
                                            @else
                                                <i class="fontchange fa fa-bookmark-o fa-lg" ></i>
                                            @endif
                                        </span>
                                    </div>
                                    @endif
                                    <div class="col-md-12 padding-null category-top">
                                        <div class="category">
                                            @foreach($articleCategories as $articleCategory) <a href="{!! route('frontend.category.blogs', $articleCategory->id) !!}  ">{!! $articleCategory->name or '' !!} </a>@endforeach
                                        </div>
                                    </div>
                                    <h1>{!! $article->title or '' !!}</h1>
                                    <div class="post-info col-md-12 padding-null">

                                            <span class="date"><img src="{!! asset('assets/img/date.png') !!}"/>{!! $article->published_at or '' !!}
</span>

                                        @if(isset($article->_info->total_view) && ($article->_info->total_view >= 100))

                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                            <span class="date"><img src="{!! asset('assets/img/blog-view.png') !!}"/>{!! $article->_info->total_view or '' !!} Views
</span>

                                        @endif

                                        @if(session('user'))
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                            <span class="bookmark" tooltip="Bookmark this article to read later">

                                                @if(isset($article->is_favourite) && $article->is_favourite)
                                                    <i class="fontchange fa fa-bookmark fa-lg" tool-tip-toggle="tooltip-demo" data-original-title="Camera icon" aria-hidden="true"></i>
                                                @else
                                                    <i class="fontchange fa fa-bookmark-o fa-lg" ></i>
                                                @endif

                                            </span>

                                        @endif

                                            <span class="post-share-icons" style="">
                                              <i class="fa fa-circle" aria-hidden="true"></i>
<a class="fb_share1"  data-title="{!! $article->title !!} " data-description="{!! textshorten($article->intro , 420)!!}"
                                                           data-image="{!! (isset($article) && $article->featured_image !=null) ? $article->featured_image : asset('assets/img/missing-image.jpg') !!}"  href="{!! $article->link !!}">
                                                            Share on  |   <i class="ion-social-facebook" data-pack="social" data-tags="like, post, share"></i></a>

                                            </span>

                                    </div>
                                    <img src="{!! (isset($article) && $article->featured_image_app !=null) ? $article->featured_image_app : asset('assets/img/missing-image.jpg') !!}" alt="">
                                        <p>{!! $article->intro or '' !!}</p>
                                        <p>{!! $article->description or '' !!}</p>
                                    <br>
                                    <ul class="social-blog-post">
                                      <li>শেয়ার করুন:</li>
                                      <li><a class="facebook-share-button" data-href="{!! $article->link !!}"  href="#" ><img src="{!! asset('assets/img/fb.png') !!}"></a>
                                              </li>
                                        <li><a class="twitter-share-button" data-title="{!! $article->title or '' !!}"  href="#"  alt=""><img src="{!! asset('assets/img/twitter.png') !!}"></a>

                                        </li>

                                        {{--<li><a class="googleplus-share-button" data-href="{!! $article->link !!}"--}}
                                                {{--alt="" href="#"><img src="{!! asset('assets/img/google-plus.png') !!}"></a></li>--}}
                                      <li><a class="messenger1"  href="{!! $article->link !!}" alt=""><img src="{!! asset('assets/img/lindien.png') !!}"></a></li>
                                    </ul>
                                </div>
                            </article>
                        </div>

                    </div>
                    <div class="fb-comments-area">
                      <div class="fb-comments" data-href="{!! $article->link !!}" data-width="100%" data-numposts="5"></div>
                    </div>

                </section>

                @if(isset($relatedBlogs) && $relatedBlogs != null)
                <section id="news" class="page">
                    <h3 class="related-post"><span>Related</span> Articles</h3>
                    <div class="news-items equal two-columns">
                        <!-- ————————————————————————————————————————————
                        ———	single blog post
                        —————————————————————————————————————————————— -->
                        @foreach($relatedBlogs as $blog)
                        <div class="single-news one-item">
                            <article>
                                <img src="{!! (isset($blog) && $blog->featured_image !=null) ? $blog->featured_image : asset('assets/img/missing-image.jpg') !!}" alt="">
                                <div class="content">
                                            <span class="read">
                                                <i class="material-icons">subject</i>
                                            </span>
                                    <h1>{{ $blog->title or '' }}</h1>
                                    @foreach($blog->category_details as $blogCategory) <span class="blog-category">{!! $blogCategory->name or '' !!} </span>@endforeach
                                    {{--<span class="category">Social</span>--}}
                                    <span class="date m-l-5"><img src="{{ asset('assets/img/date.png') }}"/>{{ $blog->published_at or '' }}</span>
                                    {{--substr($text, 0, strrpos($text, ' '))--}}
                                    <p>{!! textshorten($blog->intro , 420)!!}</p>
                                </div>
                                <a href="{!! $blog->link or '' !!}" class="link"></a>
                            </article>
                        </div>
                        @endforeach
                        <!-- ————————————————————————————————————————————
                        ———	single blog post
                        —————————————————————————————————————————————— -->
                    </div>
                </section>
                @endif
            </div>

            <!-- ————————————————————————————————————————————
            ———	Right Sidebar
            —————————————————————————————————————————————— -->
            <div class="col-md-3 text blog-sidebar">
                @include('frontend.pages.blog.partials.sidebar')
            </div>
            <!-- ————————————————————————————————————————————
            ———	END Right Sidebar
            —————————————————————————————————————————————— -->
            <!-- <g:plus action="share"></g:plus> -->
        </div>

@endsection

@section('before-scripts-end')
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId: "{!!  config("misc.web.facebook_app_id") !!}",
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
                    js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8&appId="+"{!!  config("misc.web.facebook_app_id") !!}";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));

        function postToFeed(title, url, image, description) {
            var obj = {method: 'feed', link: url, name: title, picture: image, description: description, display: 'popup'};
            function callback(response) {
                location.reload();
            }
            FB.ui(obj, callback);
        }

        var fbShareBtn1 = document.querySelector('.fb_share1');
        fbShareBtn1.addEventListener('click', function(e) {
            e.preventDefault();
            var title = fbShareBtn1.getAttribute('data-title'),
                    image = fbShareBtn1.getAttribute('data-image'),
                    description = fbShareBtn1.getAttribute('data-description'),
                    url = fbShareBtn1.getAttribute('href');
            postToFeed(title, url, image, description);

            return false;
        });

        function facebook_send_message(link) {
            FB.ui({
                app_id:"{!! config("misc.web.facebook_app_id") !!}",
                method: 'send',
                name: "name",
                link: link,
            });
        }
        var messenger1 = document.querySelector('.messenger1');
        messenger1.addEventListener('click', function(e) {
            e.preventDefault();
           var url = fbShareBtn1.getAttribute('href');
            facebook_send_message(url);

            return false;
        });

        var twitter = document.querySelector('.twitter-share-button');
        $('.twitter-share-button').on('click', function(e){
           e.preventDefault();
           var title = twitter.getAttribute('data-title');
            window.open('https://twitter.com/share?text='+title, 'twitter-sahre-dialog', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
        });

        var facebook = document.querySelector('.facebook-share-button');
        $('.facebook-share-button').on('click', function(e){
            e.preventDefault();
            var href = 'https://www.facebook.com/sharer/sharer.php?u='+facebook.getAttribute('data-href');
            window.open(href, '', 'facebook-share-dialog', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
        });

        var googleplus = document.querySelector('.googleplus-share-button');
        $('.googleplus-share-button').on('click', function(e){
            e.preventDefault();
            var href = 'https://plus.google.com/share?url='+googleplus.getAttribute('data-href');
            window.open(href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');

        });

    </script>



@endsection

@section('after-scripts')

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <!-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59db41dfd1660d3e"></script> -->
    <script>
        $('.bookmark').click(function () {
            var url = '{!! route('frontend.user.reaction', ['blog', $article->id]) !!}';
            $.ajax({
                type: "POST",
                url: url,
            }).done(function (response) {
                console.log(response);
                $('.fontchange').toggleClass('fa fa-bookmark fa fa-bookmark-o');
            }).fail(function (response) {
//                console.log(response);
            });
        });


    </script>


<script src="https://apis.google.com/js/platform.js" async defer></script>
   <!-- <g:plus action="share"></g:plus> -->
@endsection
