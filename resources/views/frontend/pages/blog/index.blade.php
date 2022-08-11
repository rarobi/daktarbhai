@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Blog | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('after-styles')
    <style>
        /*.bg-brand-color {*/
        /*    background-color: #43e696 !important;*/
        /*    color: #ffffff !important;*/
        /*}*/

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

    </style>
@stop

@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap row margin-bottom-small">
        @if(isset($category_id) && $category_id != null)
            <div id="home-wrap" class="content-section fullpage-wrap row dir-bg">
                <div class="col-md-12 padding-leftright-null">
                    <section class="doctor page padding-md">
                        <div class="container">
                            <h2 class="text-center padding-top-null white">
                                {!! $selectedCategory->name or '' !!}                            </h2>
                        </div>
                    </section>
                </div>
            </div>
        @else
        <div id="home-wrap" class="content-section fullpage-wrap row dir-bg">
            <div class="col-md-12 padding-leftright-null">
                <section class="doctor page padding-md">
                    <div class="container">
                        <h2 class="text-center padding-top-null white">
                            Blog
                        </h2>
                    </div>
                </section>
            </div>
        </div>
        @endif
    </div>

    <div id="home-wrap" class="content-section fullpage-wrap grey-background row">
{{--        @if(isset($category_id) && $category_id != null)--}}
{{--        <div class="col-md-12 padding-leftright-null">--}}
{{--                      <div class="blog-cat text" style="background-image: url({!! asset('assets/img/blog-cat.jpg') !!});">--}}
{{--                          <h1 class="text-center">{!! $selectedCategory->name or '' !!}</h1>--}}
{{--                      </div>--}}
{{--                  </div>--}}
{{--        @endif--}}
            <div class="col-md-9 padding-leftright-null">
                <!-- ————————————————————————————————————————————
                ———	Blog Start Here
                —————————————————————————————————————————————— -->
                <section id="news" class="page">

                  @if(isset($search))
                  <div class="search-not-found">
                      <div class="search-text">
                        <h1>Search Results for: {{ $search }}</h1>
                      </div>
                  </div>
                  @endif

                    @if(isset($articles) && count($articles))

                    <div class="news-items equal two-columns">
                        <!-- ————————————————————————————————————————————
                        ———	single blog post - start
                        —————————————————————————————————————————————— -->
                        @foreach($articles as  $article)
                        <div class="single-news one-item">
                            <article>
                                <img src="{!! (isset($article) && $article->featured_image !=null) ? $article->featured_image : asset('assets/img/missing-image.jpg') !!}" alt="">
                                <div class="content">
                                            <span class="read">
                                                <i class="material-icons">subject</i>
                                            </span>
                                    <h1>{{ $article->title or '' }}</h1>
                                    @foreach($article->category_details as $articleCategory) <span class="blog-category">{!! $articleCategory->name or '' !!} </span>@endforeach
                                    {{--<span class="category">Social</span>--}}
                                    <span class="date m-l-5"><img src="{{ asset('assets/img/date.png') }}"/>{{ $article->published_at or '' }}</span>
                                    {{--substr($text, 0, strrpos($text, ' '))--}}
                                    <p>{!! textshorten($article->intro , 420)!!}</p>
                                </div>
                                <a href="{!! $article->link or '' !!}" class="link"></a>
                            </article>
                        </div>
                        @endforeach
                    </div>

                    <!-- ————————————————————————————————————————————
                    ———	single blog post - end
                    —————————————————————————————————————————————— -->

                    @else
                      <!-- If nothing found -->
                      <div class="search-not-found padding-bottom-null">
                        <h2>Nothing Found</h2>
                        <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
                        <aside class="sidebar">
                          <div class="widget-wrapper shadow-none">
                            <form method="get" action="{!! route('frontend.search.blogs') !!}" class="search-form" data-parsley-validate="">
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
                </section>
                <!-- ————————————————————————————————————————————
                ———	Navigation
                —————————————————————————————————————————————— -->
                <section id="nav" class="padding-top-null grey-background">
                    <div class="row">
                        <div class="col-xs-12">

                            @if(isset($paginator) && $paginator->total_pages != 1 && $paginator->total_pages != 0)
                                @if(isset($category_id))

                                    <ul class="pagination">

                                        @if($paginator->previous_page_url != null)
                                        <li>
                                            <a href="{!! route('frontend.pagination.category.blogs', ['category' => $category_id ,'number' => $paginator->current_page -1 ]) !!}">
                                                <i class="ion-ios-arrow-left"></i> {{__('pagination.previous')}}</a>
                                        </li>
                                        @endif

                                        @for($i = 1; $i <= $paginator->total_pages; $i++)
                                                <li><a @if($i == $paginator->current_page) class="bg-brand-color" @endif href="{!! route('frontend.pagination.category.blogs', ['category' => $category_id ,'number' => $i]) !!}">{!! $i!!}</a></li>
                                        @endfor

                                        @if($paginator->next_page_url != null)
                                                <li><a href="{!! route('frontend.pagination.category.blogs', ['category' => $category_id ,'number' => $paginator->current_page +1 ]) !!}">{{__('pagination.next')}} <i class="ion-ios-arrow-right"></i></a></li>
                                        @endif

                                    </ul>
                                @elseif(isset($search))
                                    <ul class="pagination">
                                        @if($paginator->previous_page_url != null)
                                            <li>
                                                <a href="{!! route('frontend.pagination.search.blogs', ['search' => $query_string ,'page' => $paginator->current_page -1 ]) !!}">
                                                    <i class="ion-ios-arrow-left"></i> {{__('pagination.previous')}}</a>
                                            </li>
                                        @endif
                                        @for($i = max(1,$paginator->current_page-9); $i <= min($paginator->current_page+9, $paginator->total_pages); $i++)

                                                <li><a @if($i == $paginator->current_page) class="bg-brand-color" @endif href="{!! route('frontend.pagination.search.blogs', ['search' => $query_string ,'page' => $i ]) !!}">{!! $i!!}</a></li>
                                        @endfor

                                        @if($paginator->next_page_url != null)
                                            <li><a href="{!! route('frontend.pagination.search.blogs', ['search' => $query_string ,'page' => $paginator->current_page +1 ]) !!}">{{__('pagination.next')}} <i class="ion-ios-arrow-right"></i></a></li>
                                        @endif

                                    </ul>
                                @else

                                    <ul class="pagination">
                                        @if($paginator->previous_page_url != null)
                                            <li>
                                                <a href="{!! route('frontend.pagination.blogs', ['number' => $paginator->current_page -1 ]) !!}">
                                                    <i class="ion-ios-arrow-left"></i> {{__('pagination.previous')}}</a>
                                            </li>
                                        @endif

                                        @for($i = max(1,$paginator->current_page-9); $i <= min($paginator->current_page+9, $paginator->total_pages); $i++)
                                                <li><a @if($i == $paginator->current_page) class="bg-brand-color" @endif href="{!! route('frontend.pagination.blogs', ['number' => $i]) !!}">{!! $i!!}</a></li>
                                        @endfor

                                        @if($paginator->next_page_url != null)
                                                <li><a href="{!! route('frontend.pagination.blogs', ['number' => $paginator->current_page +1 ]) !!}">{{__('pagination.next')}} <i class="ion-ios-arrow-right"></i></a></li>
                                        @endif

                                    </ul>

                                @endif

                            @endif
                        </div>
                    </div>
                </section>
                <!-- ————————————————————————————————————————————
                ———	END Navigation
                —————————————————————————————————————————————— -->
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
        </div>

@endsection

@section('before-scripts-end')

@endsection
