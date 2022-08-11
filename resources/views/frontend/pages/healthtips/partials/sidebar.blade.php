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

    @if(isset($sectionQuestionForm))
    <div class="widget-wrapper ask-bg">
        <div class="">
            <h5>Ask a FREE <span>Question</span></h5>
            <p class="margin-null">Get FREE multiple opinions from Doctors</p>
        </div>

        {!! Form::open(['route'=>'frontend.ask_doctor1', 'data-parsley-validate', 'method' => 'POST']) !!}

        {!! Form::textarea('description', old('description'), ['class' => 'sidebar-ask', 'id' => 'description', 'rows' => '4',
                                                               'placeholder' => 'Your question will be posted anonymously and answered within 24-48 hours.',
                                                               'required' => 'required',
                                                               'data-parsley-required-message' => 'Please provide an input',
                                                               'data-parsley-trigger'          => 'change focusout',
                                                               'data-parsley-maxlength'        => '1000']) !!}

        <button id="#" class="ask-login login-btn shadow">Ask a Doctor</button>

        {!! Form::close() !!}

    </div>
    @endif

    @if(isset($categories) && $categories != null)
        <div class="widget-wrapper">
            <h5>Tips <span>Categories</span></h5>
            <ul class="widget-categories">
                @foreach($categories as $category)
                    <li>
                        <a href="{{ route('frontend.category.healthtips', $category->id) }}">
                            <i class="ion-ios-pricetag-outline"></i> {!! $category->name or '' !!}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(isset($recent_healthTips) && $recent_healthTips != null)
    <div class="widget-wrapper">
        <h5><span>Recent </span>Health Tips</h5>
        <ul class="recent-posts">
            @foreach($recent_healthTips as $recent_healthTip)
            <li>
                <a href="{{ route('frontend.healthtips.show', $recent_healthTip->id) }}">
                    <div class="post-thumbnil">
                        @php
                            $image_src = (isset($recent_healthTip) && $recent_healthTip->image_obj->web_thumbnail !=null) ? $recent_healthTip->image_obj->web_thumbnail : ($recent_healthTip->image_obj->web_large !=null) ? $recent_healthTip->image_obj->web_large : (($recent_healthTip->image !=null) ? $recent_healthTip->image : asset('assets/img/missing-image.jpg'))
                        @endphp
                    <img src="{!! $image_src !!}" alt="">
                    </div>
                    <div class="post-content">
                        <p>{!! $recent_healthTip->title or '' !!}</p>
                        <span class="meta">
                             {!! $recent_healthTip->published_at or '' !!}
                        </span>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    @endif
</aside>
