@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Question Details | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap all-questions-bg">
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <!-- ————————————————————————————————————————————--}}
{{--                    ———	Ask a Doctor content--}}
{{--                    —————————————————————————————————————————————— -->--}}
{{--                    <section class="ask-doc-page padding-md">--}}
{{--                        <h2 class="text-center padding-null white margin-null"> {{__('askDoctor.title')}}--}}
{{--                            --}}{{--Ask a Doctor and Get Answers from Real Doctors.--}}
{{--                        </h2>--}}
{{--                        <p class="heading white text-center">{{__('askDoctor.have_query')}}--}}
{{--                            --}}{{--Have a query? Ask our doctors and get a professional opinion immediately...--}}
{{--                        </p>--}}
{{--                    </section>--}}
{{--                </div>--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="col-md-4 col-sm-12 speciality-title-section">--}}
{{--                        <h2 class="margin-bottom">"Ask a Doctor and Get Answers from Real Doctors.</h2>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-7 col-md-offset-1 col-sm-12 img-section">--}}
{{--                        <img src="{!! asset('assets/img/ask_doctor.png') !!}" class="facility-slider-img" alt="" style="width: -webkit-fill-available;">--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="row slider-section section-padding" style="height: 390px">
            <div class="col-md-12">
                <div class="col-md-4 col-sm-12 speciality-title-section">
                    <h2 class="margin-bottom">Ask a Doctor and Get Answers from Real Doctors.</h2>
                    <p class="asd-doctor-para">Have a query? Ask our doctors and get a professional opinion immediately...</p>
                </div>
                <div class="col-md-7 col-md-offset-1 col-sm-12 img-section">
                    <img src="{!! asset('assets/img/ask_doctor2.png') !!}" class="facility-slider-img" alt="" style="width: -webkit-fill-available;">
                </div>

            </div>
        </div>
    </div>
    <div id="home-wrap" class="content-section ques-area fullpage-wrap">
        <div class="row no-margin">
            <div class="col-md-12 padding-leftright-null">
                <div class="col-md-9 padding-leftright-null">
                    <div class="popular-questions text padding-md-bottom-null m-t-30">
                        <!--<h3 class="grey margin-bottom-small">Popular <span class="brand-color">Questions</span></h3>-->
                        <h3 class="grey margin-bottom-small">{{__('askDoctor.popular')}}  {{__('askDoctor.questions')}}</h3>
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="">
                                    <div class="panel-heading border-none">
                                        <h4 class="panel-title">
                                            <a href="" class="questions">
                                                <h4 class="questions-title">{!! strip_tags($askquestion->description)  !!}
                                                </h4>
                                            </a>
                                        </h4><br>
                                    <div class="ques-meta details-meta">
                                        <div class="col-md-3"><p><span class="date"></span>{!! $askquestion->published_at or '' !!}</p></div>
                                        <div class="col-md-2"><p><span class="view"></span> {!! $askquestion->_info->total_view or '' !!} </p></div>
                                        <div class="col-md-2"><a href="#" class="doc-ans active"><p> {!! $askquestion->_info->total_answer or '' !!}</p></a></div>
                                        <div class="col-md-5">@foreach(array_slice($askquestion->topics, 0, 1) as $topic)<a href="{!! route("frontend.question.topics", $topic->id) !!}" class="tag"><p>{!! $topic->title !!}</p></a>@endforeach</div>
                                    </div>
                                    </div>
                                </div>

                                @if(isset($askquestion->answers) && $askquestion->answers != null)
                                    @foreach($askquestion->answers as $answer)
                                <div class="panel-body">
                                    <div class="">
                                        <div class="ans-info">
                                            <h4 class="questions-title"> <i class="fa fa-edit"></i> <strong> Answer</strong> </h4>
                                            <p>{!! $answer->answer_details or '' !!}</p>
                                            <div class="info-img">
                                                <img src="{!! asset('assets/img/doctor-grey.png') !!}">
                                            </div>
                                            <div class="info-dis">
                                                <h3>{!! $answer->doctor->name or 'Daktarbhai' !!}</h3>
                                                <p>{!! $answer->doctor->qualification or '' !!}</p>
                                            </div>
                                        </div>

                                        @if(session('user'))
                                        <div class="user-feed-back">
                                            {{--<div class="current">--}}
                                                {{--<span class="count">{!! $answer->_info->vote_up !!}</span>/{!! $answer->_info->total_reaction !!} people found this helpful--}}
                                            {{--</div>--}}
                                            <div class="feedback-action">

                                                <div class="col-md-8">
                                                    <span class="pull-right">

                                                        @if($answer->user_reaction == null)
                                                            {{__('askDoctor.was_helpful')}}
                                                        @elseif($answer->user_reaction == 'downvoted')
                                                            <i class="fa fa-flag"></i> {{__('askDoctor.answer_unhelpful')}}
                                                        @else
                                                            <i class="fa fa-flag"></i> {{__('askDoctor.answer_helpful')}}
                                                        @endif
                                                    </span>
                                                </div>
    {{--                                            {!! $answer->user_reaction == null !!}--}}
                                                @if($answer->user_reaction == null)
                                                    {{--{!! dd($answer->user_reaction) !!}--}}
                                                <div class="col-md-4">
                                                    <div class="actions">
                                                        <a href="{!! route('frontend.user.reaction.answers', [$answer->id, 'downvoted']) !!}" class="btn-alt small active doc-btn" style="background-color: #36B7B4;border: 1px solid #36B7B4">{{__('askDoctor.no')}}</a>
                                                        <a href="{!! route('frontend.user.reaction.answers', [$answer->id, 'upvoted']) !!}" class="btn-alt small active doc-btn" style="background-color: #36B7B4;border: 1px solid #36B7B4">{{__('askDoctor.yes')}}</a>
                                                    </div>
                                                </div>
                                                @endif

                                            </div>
                                        </div>
                                            @endif
                                    </div>

                                </div>
                                    @endforeach
                                @endif
                                @if($askquestion->_info->total_answer == 0)
                                <div class="panel panel-default">
                                        <div class="panel-body">
                                            <p class="text-center" style="float:left;">{{__('askDoctor.message.sorry_msg')}}
                                                <a href="{!! route('frontend.all_questions') !!}" class="btn-alt small active shadow margin-null more-qs"><span>{{__('askDoctor.button.question_btn')}}</span></a>
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 padding-leftright-null">
                    <div class="ask-doc-sidebar panel-group">
                        <div class="widget-wrapper panel panel-default">
                            <h5>{{__('askDoctor.topics')}}</h5>
                            @foreach($questionTopics as $topic)
                                <a href="{!! route("frontend.question.topics", $topic->id) !!}" alt="" class="topic">{!! $topic->title or '' !!}</a>
                            @endforeach
                        </div>
                        <div class="widget-wrapper">
                            <ul class="featured-ques">
                                <li>
                                    <h5>{{__('askDoctor.featured_questions')}}</h5>
                                    @foreach(array_slice($featured_questions, 0, 2) as $featured_question)
                                        <a href="{!! route('frontend.question.show', $featured_question->id) !!}" class="questions">{!! $featured_question->description or '' !!} </a>
                                        <hr style="background-color: #36B7B4; height: 1px">
                                    @endforeach
                                </li>
                            </ul>
{{--                            <ul class="featured-ques" id="exp">--}}
{{--                                @foreach(array_slice($featured_questions, 2, 3) as $featured_question)--}}
{{--                                    <li><a href="{!! route('frontend.question.show', $featured_question->id) !!}" class="questions">{!! $featured_question->description or '' !!} </a>--}}
{{--                                    </li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
                            <div id="close-panel">
                                <i class="ion-ios-arrow-down active"></i>
                            </div>
                        </div>
                        <div class="widget-wrapper">
                            <div class="fixed-top">
                                <div class="fixed-images">
                                </div>
                                <div class="fixed-content">
                                    <h4>{{__('askDoctor.side_content.title')}}</h4>
                                    <p>{{__('askDoctor.side_content.description')}}</p>
{{--                                    <a href="{{ route('frontend.questionform') }}" class="btn-alt small active doc-btn">{{__('askDoctor.button.search_btn')}}</a>--}}
                                    <a target="_blank" href="{{ config('misc.app.android-native.app_url') }}"><img src="{!! asset('assets/img/play-store 1.png') !!}" class="google-icon" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
