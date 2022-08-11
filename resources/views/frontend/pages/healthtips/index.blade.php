@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Health Tips | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

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
                    @if(isset($category_id))
                        <p class="white text-center">
                            {!! $selectedCategory->name or '' !!}
                        </p>
                    @endif
                    <p class="heading white text-center">Health is a right, not a privilege. It needs to be enjoyed with equity.</p>
                </div>
            </section>
        </div>
    </div>
    <div id="home-wrap" class="content-section fullpage-wrap healtips-area">
        <div class="row margin-leftright-null">
            <div class="no-margin health-tips">
              <div class="col-md-9 padding-leftright-null">
                  @if(isset($search))
                      <div class="search-not-found">
                          <div class="search-text">
                              <h1>Search Results for: {{ $search }}</h1>
                          </div>
                      </div>
                  @endif
                      @if(isset($healthTips) && count($healthTips))
                    <div class="health-tips-content">
                        @foreach($healthTips as $healthTip)
                            <div class="healthTips col-md-6 padding-leftright-null">
                                <div class="m-b-50">
                                    <img src="{!! (isset($healthTip) && $healthTip->image_obj->web_thumbnail !=null) ? $healthTip->image_obj->web_thumbnail : (($healthTip->image !=null) ? $healthTip->image : asset('assets/img/missing-image.jpg')) !!}" class="health-tips-icon" alt="">
                                    <div class="service-content">
                                        <h6 class="heading  margin-bottom-extrasmall">{!! $healthTip->title or '' !!}</h6>
                                        <p class="margin-bottom-null">{!! $healthTip->content or '' !!}
                                            <a class="tips-read-more" data-toggle="modal" data-target="#tipsmodal{!! $healthTip->id !!}">Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                        </p>
                                        <div class="tips-meta">
                                            <i class="ion-coffee"></i> @foreach(array_slice($healthTip->categories, 0, 1) as $category) &nbsp;{!! $category->name or '' !!} @endforeach
                                            <i class="ion-clock"></i> {!! $healthTip->published_before or '' !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                <!-- ————————————————————————————————————————————
                ———	Health Tips Modal
                —————————————————————————————————————————————— -->
                            <div class="health-tips-modal modal fade" id="tipsmodal{!! $healthTip->id !!}" tabindex="-1" role="dialog" aria-labelledby="tipsmodalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <img src="{!! (isset($healthTip) && $healthTip->image_obj->web_large !=null) ? $healthTip->image_obj->web_large : (($healthTip->image !=null) ? $healthTip->image : asset('assets/img/missing-image.jpg')) !!}" class="moadal-img" alt="">
                                        </div>
                                        <div class="modal-body">
                                            <h2>{!! $healthTip->title or '' !!}</h2>

                                            <div class="tips-meta">
                                                <i class="ion-coffee"></i> @foreach(array_slice($healthTip->categories, 0, 1) as $category) &nbsp;{!! $category->name or '' !!} @endforeach &nbsp; &nbsp;
                                                <i class="ion-clock"></i> {!! $healthTip->published_before or '' !!}
                                            </div>
                                            <p>
                                                {!! $healthTip->description or '' !!}
                                            </p>
                                        </div>

                                        <div class="modal-footer">
                                            <div class="post-share-icons health-tips" style="">
                                                <ul class="info">
                                                    <li>
                                                        <a class="fb_share"  data-title="{!! $healthTip->title !!}"
                                                           data-description="{!! textshorten($healthTip->description , 420)!!}"
                                                           data-image="{!! (isset($healthTip) && $healthTip->image !=null) ? $healthTip->image : asset('assets/img/missing-image.jpg') !!}"
                                                           data-href="{!! $healthTip->link or '' !!}">
                                                            Share on  |  <i class="ion-social-facebook" data-pack="social" data-tags="like, post, share"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end healthtips modal-->
                        @endforeach
                    </div>
                      @else
                      <!-- If nothing found -->
                          <div class="search-not-found padding-bottom-null">
                              <h2>Nothing Found</h2>
                              <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
                              <aside class="sidebar">
                                  <div class="widget-wrapper shadow-none">
                                      <form method="get" action="{!! route('frontend.search.healthtips') !!}" class="search-form" data-parsley-validate="">
                                          <div class="form-input">
                                              <input type="text" required name="search" data-parsley-required-message = 'Please provide an input' placeholder="Search...">
                                              <span class="form-button">
                                    <button type="submit">
                                      <i class="icon ion-ios-search-strong"></i>
                                    </button>
                                </span>
                                          </div>
                                      </form>
                                  </div>
                              </aside>
                          </div>
                      @endif
                </div>
                <div class="col-md-3 text health-tips-sidebar">
                    @include('frontend.pages.healthtips.partials.sidebar')
                </div>



            </div>
        </div>

        <section id="nav" class="padding-top-null">
            <div class="row">
                <div class="col-xs-12">
                    @if(isset($paginator) && $paginator->total_pages != 1 && $paginator->total_pages != 0)
                        @if(isset($category_id))
                            <ul class="pagination">

                                @if($paginator->previous_page_url != null)
                                    <li>
                                        <a href="{!! route('frontend.pagination.category.healthtips', ['category' => $category_id ,'number' => $paginator->current_page -1 ]) !!}">
                                            <i class="ion-ios-arrow-left"></i> Previous</a>
                                    </li>
                                @endif

                                @for($i = 1; $i <= $paginator->total_pages; $i++)
                                    <li><a @if($i == $paginator->current_page) class="bg-brand-color" @endif href="{!! route('frontend.pagination.category.healthtips', ['category' => $category_id ,'number' => $i]) !!}">{!! $i!!}</a></li>
                                @endfor

                                @if($paginator->next_page_url != null)
                                    <li><a href="{!! route('frontend.pagination.category.healthtips', ['category' => $category_id ,'number' => $paginator->current_page +1 ]) !!}">Next <i class="ion-ios-arrow-right"></i></a></li>
                                @endif


                                @if($paginator->next_page_url != null)
                                    <li><a href="{!! route('frontend.pagination.category.healthtips', ['category' => $category_id ,'number' => $paginator->current_page +1 ]) !!}">Next <i class="ion-ios-arrow-right"></i></a></li>
                                @endif

                            </ul>
                        @elseif(isset($search))
                            <ul class="pagination">

                                @if($paginator->previous_page_url != null)
                                    <li>
                                        <a href="{!! route('frontend.pagination.search.healthtips', ['search' => $query_string ,'page' => $paginator->current_page -1 ]) !!}">
                                            <i class="ion-ios-arrow-left"></i> Previous</a>
                                    </li>
                                @endif

                                @for($i = 1; $i <= $paginator->total_pages; $i++)
                                    <li><a @if($i == $paginator->current_page) class="bg-brand-color" @endif href="{!! route('frontend.pagination.search.healthtips', ['search' => $query_string ,'page' => $i ]) !!}">{!! $i!!}</a></li>
                                @endfor

                                @if($paginator->next_page_url != null)
                                    <li><a href="{!! route('frontend.pagination.search.healthtips', ['search' => $query_string ,'page' => $paginator->current_page +1 ]) !!}">Next <i class="ion-ios-arrow-right"></i></a></li>
                                @endif

                            </ul>
                        @else
                            <ul class="pagination">
                                @if($paginator->previous_page_url != null)
                                    <li>
                                        <a href="{!! route('frontend.pagination.healthtips', ['number' => $paginator->current_page -1 ]) !!}">
                                            <i class="ion-ios-arrow-left"></i> Previous</a>
                                    </li>
                                @endif

                                @for($i = 1; $i <= $paginator->total_pages; $i++)
                                    <li><a @if($i == $paginator->current_page) class="bg-brand-color" @endif href="{!! route('frontend.pagination.healthtips', ['number' => $i]) !!}">{!! $i!!}</a></li>
                                @endfor

                                @if($paginator->next_page_url != null)
                                    <li><a href="{!! route('frontend.pagination.healthtips', ['number' => $paginator->current_page +1 ]) !!}">Next <i class="ion-ios-arrow-right"></i></a></li>
                                @endif

                            </ul>
                        @endif
                    @endif
                </div>
            </div>
        </section>


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
