@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'All question | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('content')
{{--    <div id="home-wrap" class="content-section fullpage-wrap all-questions-bg">--}}
    <div id="home-wrap" class="content-section fullpage-wrap dir-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- ————————————————————————————————————————————
                        ———	Ask a Doctor content
                        —————————————————————————————————————————————— -->
                        <section class="ask-doc-page padding-md">
                            <h2 class="text-center padding-null white margin-null">
                                {{--Ask a Doctor and Get Answers from Real Doctors.--}}
                                {{__('askDoctor.title')}}
                            </h2>
                            <p class="heading white text-center">{{__('askDoctor.have_query')}}</p>
                        </section>
                    </div>
                </div>
            </div>
    </div>
        <div id="home-wrap" class="content-section ques-area fullpage-wrap">
            <div class="row no-margin">
                <div class="col-md-12 padding-leftright-null">
                    <div class="col-md-9 padding-leftright-null">
                        <div class="popular-questions text padding-md-bottom-null">
                            @if(isset($id))
                                <h3 class="grey margin-bottom-small">{{__('askDoctor.topics')}}: <span class="brand-color">{!! $all_questions[0]->topics[0]->title !!}</span></h3>
                            @else
                                <h3 class="grey margin-bottom-small">{{__('askDoctor.all_questions')}}</h3>
                            @endif
                            <div class="panel-group">
                                @foreach($all_questions as $question)
                                    <div class="panel panel-default">
                                        <div class="panel-heading border-none">
                                            <h4 class="panel-title">
                                                <a href="{!! route('frontend.question.show', $question->id) !!}" class="questions">
                                                    <h4 class="questions-title">
                                                        {!! $question->description or '' !!}
                                                    </h4>
                                                </a>
                                            </h4>
                                            <div class="ques-meta">
                                                <div class="col-md-3"><p><span class="date"></span>{!! $question->published_at or '' !!}</p></div>
                                                <div class="col-md-2"><p><span class="view"></span> {!! $question->_info->total_view or '' !!} Views</p></div>
                                                <div class="col-md-4">@foreach(array_slice($question->topics, 0, 1) as $topic)<a href="{!! route("frontend.question.topics", $topic->id) !!}" class="tag"><p>{!! $topic->title !!}</p></a>@endforeach</div>
                                                <div class="col-md-3"><a href="{!! route('frontend.question.show', $question->id) !!}" class="doc-ans"><p>Answers ({!! $question->_info->total_answer !!})</p></a></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                                @if(isset($paginator) && $paginator->total_pages != 1)
                                    @if(isset($id) && $id != null)
                                        <ul class="pagination">
{{--                                            @if($paginator->current_page > 9)--}}
{{--                                                <li><a href="{!! route('frontend.pagination.question.topics', ['id' => $id,'page' =>$paginator->current_page-8 ]) !!}"> << </a></li>--}}
{{--                                            @endif--}}
                                            @if(isset($first_page) && $paginator->current_page != 1 && $paginator->current_page>5)
                                                <li><a href="{!! route('frontend.pagination.question.topics', ['id' => $id,'page' =>$first_page ]) !!}"> {{__('pagination.first')}} </a></li>
                                            @endif
                                            @if($paginator->previous_page_url != null)
                                                <li>
                                                    <a href="{!! route('frontend.pagination.question.topics', ['id' => $id,'page' =>$paginator->current_page-1 ]) !!}">
                                                        <i class="ion-ios-arrow-left"></i> {{__('pagination.previous')}}</a>
                                                </li>
                                            @endif

                                            @for($i = max(1,$paginator->current_page-5); $i <=  min($paginator->current_page+5, $paginator->total_pages);  $i++)
                                                <li><a @if($i == $paginator->current_page) class="bg-brand-color" @endif href="{!! route('frontend.pagination.question.topics', ['id' => $id,'page' =>$i ]) !!}">{!! $i!!}</a></li>
                                            @endfor

                                            @if($paginator->next_page_url != null)
                                                <li><a href="{!! route('frontend.pagination.question.topics', ['id' => $id,'page' =>$paginator->current_page+1 ]) !!}">{{__('pagination.next')}} <i class="ion-ios-arrow-right"></i></a></li>
                                            @endif
{{--                                            @if($paginator->current_page < $paginator->total_pages-9 )--}}
{{--                                                <li><a href="{!! route('frontend.pagination.question.topics', ['id' => $id,'page' =>$paginator->current_page+8 ]) !!}"> >> </a><li>--}}
{{--                                            @endif--}}
                                            @if($paginator->current_page != $paginator->total_pages && $paginator->current_page < $paginator->total_pages-5)
                                                <li><a href="{!! route('frontend.pagination.question.topics', ['id' => $id,'page' =>$paginator->total_pages ]) !!}"> {{__('pagination.last')}} </a><li>
                                            @endif

                                        </ul>
                                        @else
                                        <ul class="pagination">
{{--                                            @if($paginator->current_page > 9)--}}
{{--                                                <li><a href="{!! route('frontend.all_questions.pagination', ['page' =>$paginator->current_page-8 ]) !!}"> << </a></li>--}}
{{--                                            @endif--}}
                                            @if(isset($first_page) && $paginator->current_page != 1 && $paginator->current_page>5)
                                                <li><a href="{!! route('frontend.all_questions.pagination', ['page' =>$first_page ]) !!}"> {{__('pagination.first')}} </a></li>
                                            @endif
                                            @if($paginator->previous_page_url != null)
                                                <li>
                                                    <a href="{!! route('frontend.all_questions.pagination', ['page' =>$paginator->current_page-1 ]) !!}">
                                                        <i class="ion-ios-arrow-left"></i> {{__('pagination.previous')}}</a>
                                                </li>
                                            @endif

                                            @for($i = max(1,$paginator->current_page-5); $i <=  min($paginator->current_page+5, $paginator->total_pages);  $i++)
                                                <li><a @if($i == $paginator->current_page) class="bg-brand-color" @endif href="{!! route('frontend.all_questions.pagination', ['page' =>$i ]) !!}">{!! $i!!}</a></li>
                                            @endfor

                                            @if($paginator->next_page_url != null)
                                                <li><a href="{!! route('frontend.all_questions.pagination', ['page' =>$paginator->current_page+1 ]) !!}">{{__('pagination.next')}} <i class="ion-ios-arrow-right"></i></a></li>
                                            @endif
{{--                                            @if($paginator->current_page < $paginator->total_pages-9 )--}}
{{--                                                <li><a href="{!! route('frontend.all_questions.pagination', ['page' =>$paginator->current_page+8 ]) !!}"> >> </a><li>--}}
{{--                                            @endif--}}
                                            @if($paginator->current_page != $paginator->total_pages && $paginator->current_page < $paginator->total_pages-5)
                                                <li><a href="{!! route('frontend.all_questions.pagination', ['page' =>$paginator->total_pages ]) !!}"> {{__('pagination.last')}} </a><li>
                                            @endif

                                        </ul>
                                        @endif
                                    @endif
                        </div>
                    </div>
                    <div class="col-md-3 padding-leftright-null">
                        <div class="ask-doc-sidebar">
                            <div class="widget-wrapper">
                                <h5>{{__('askDoctor.topics')}}</h5>
                                @foreach($questionTopics as $topic)
                                    <a href="{!! route("frontend.question.topics", $topic->id) !!}" alt="" class="topic">{!! $topic->title or '' !!}</a>
                                @endforeach
                            </div>
                            <div class="widget-wrapper">
                                <h5>{{__('askDoctor.featured_questions')}}</h5>
                                <ul class="featured-ques">
                                    @foreach(array_slice($featured_questions, 0, 2) as $featured_question)
                                        <li><a href="{!! route('frontend.question.show', $featured_question->id) !!}" class="questions">{!! $featured_question->description or '' !!} </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <ul class="featured-ques" id="exp">
                                    @foreach(array_slice($featured_questions, 2, 3) as $featured_question)
                                        <li><a href="{!! route('frontend.question.show', $featured_question->id) !!}" class="questions">{!! $featured_question->description or '' !!} </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div id="close-panel">
                                    <i class="ion-ios-arrow-down active"></i>
                                </div>
                            </div>
                            <div class="widget-wrapper">
                              <div class="fixed-top">
                                  <div class="fixed-images">
                                  </div>
                                  <div class="fixed-content">
                                      {{--<h4>Worried about your health?</h4>--}}
                                      <h4>{{__('askDoctor.side_content.title')}}</h4>
                                      {{--<p>Ask a verified doctor and get a quick response.</p>--}}
                                      <p>{{__('askDoctor.side_content.description')}}</p>
                                      {{--<a href="{{ route('frontend.questionform') }}" class="btn-alt small active doc-btn">Ask a Doctor</a>--}}
                                      <a href="{{ route('frontend.questionform') }}" class="btn-alt small active doc-btn">{{__('askDoctor.button.search_btn')}}</a>
                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection

@section('before-scripts-end')

@endsection
