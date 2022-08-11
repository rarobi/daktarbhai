<div class="recent-articles-body m-t-30">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4 article-left-section">
                <h3 class="recent-article-title"> {{__('home.recent_article.title')}}</h3>
                <p class="recent-article-sub-title">{{__('home.recent_article.sub_title')}}</p>
                <div class="padding-left-null">
                    <a href="{!! route('frontend.blog.index') !!}" class="btn btn-lg article-btn">{{__('home.recent_article.all_btn')}}</a>
                </div>
            </div>
            <div class="col-md-7">
                <div class="row no-margin">
                    <div class="col-md-12 padding-leftright-null recent-artilce">
                        @if(isset($articles))
                            @foreach($articles as $article)
                                <div class="col-sm-12 padding-leftright-null item">
                                    <div class="padding-md-bottom-null">
                                        <a href="{!! $article->link or '' !!}">
                                            <div class="top-cart">
                                                @if(($article) && $article->featured_image !=null)
                                                <img src="{!! $article->featured_image !!}" class="article-img"/>
                                                @else
                                                 <img src="{!! asset('assets/img/missing-image.jpg') !!}">
                                                @endif
                                                <div>
                                                    <p class="article-title">
                                                        {{ $article->title or '' }}
                                                    </p>
                                                    <p class="article-type">
                                                        {{ $article->categories or '' }}  <span> <i class="fa fa-calendar article-date"> {{ $article->published_at or '' }}</i></span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


