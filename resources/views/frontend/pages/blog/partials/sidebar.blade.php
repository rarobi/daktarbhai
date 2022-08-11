
<aside class="sidebar">
    <div class="widget-wrapper shadow-none">
        <form method="get" action="{!! route('frontend.search.blogs') !!}" class="search-form">
            <div class="form-input">
                <input type="text" required name="search" placeholder="{{__('labels.general.search')}}">
                <span class="form-button">
                    <button type="submit">
                        <i class="icon ion-ios-search-strong"></i>
                    </button>
                </span>
            </div>
        </form>
    </div>

    @if(isset($popular_blogs))
    <div class="widget-wrapper">
        <h5>{{__('labels.general.popular_post')}}</h5>
        <ul class="recent-posts">
            @foreach($popular_blogs as $popular_blog)
                <li>
                    <a href="{!! $popular_blog->link or '#' !!}">
                        <div class="post-thumbnil">
                            <img src="{!! asset('assets/img/popular-blog.png') !!}" alt="">
                        </div>
                        <div class="post-content">
                            <p>{!! $popular_blog->title or '' !!}</p>
                            <span class="meta">
                                {!! $popular_blog->published_at or '' !!}
                            </span>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="widget-wrapper">
        {{--<h5>Subscribe to newsletter</h5>--}}
        <h5>{{__('footer.general.subscribe')}}</h5>

         {!! Form::open(['route'=>'frontend.emailsubscriber', 'class' => 'search-form', 'data-parsley-validate']) !!}
            <div class="form-input subscribe-blog">

                {!! Form::email('email', null, ['class' => 'form-field',
                                            'placeholder' => __('footer.general.email'),
                                            'data-parsley-errors-container' => '#subscribe_error',
                                            'required' => 'required',
                                            'data-parsley-required-message' => __('home.blog.email_required'),
                                            'data-parsley-pattern'          => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$',
                                            'data-parsley-trigger'          => 'change focusout',
                                            'data-parsley-type'             => 'email',
                                            'data-parsley-type-message'     => __('home.blog.email_valid')]) !!}
                <span class="form-button-new">
                 {!! Form::submit(__('footer.button.subscribe')) !!}
                </span>
            </div>
            <div id="subscribe_error">

            </div>
         {!! Form::close() !!}
                @if(Session::has('successNewsletter'))
                    <div  class="success">{{ Session::get('successNewsletter') }}</div>
                @endif
                @if(Session::has('errorNewsletter'))
                    <div  class="error">{{ Session::get('errorNewsletter') }}</div>
                @endif

    </div>


    @if(isset($categories))
    <div class="widget-wrapper">
        <h5>{{__('labels.general.categories')}}</h5>
        <ul class="widget-categories">
            @foreach($categories as $category)
                <li><a href="{{ route('frontend.category.blogs', $category->id) }}">{!! $category->name or '' !!}</a></li>
            @endforeach
        </ul>
    </div>
    @endif
</aside>
