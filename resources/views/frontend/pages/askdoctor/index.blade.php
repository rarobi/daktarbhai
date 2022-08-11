@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Ask your question | ' . app_name()  !!}
@endsection

<style>

</style>

@section('page-header-class', 'header-static')

@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap">
    {{--@if(isset($user))
        @if($user->is_subscribed && $user->is_premium)
              @else
                  <div class="premium-content">
                      <p>To enjoy this feature you have to enable one of our subscriptions plan.</p>
                      {{ Html::link('subscription/plan','Subscriptions Plan',['class'=>'btn-alt active shadow small margin-null purchase-plan']) }}

                  </div>
        @endif
    @else
        <div class="ask-a-doc-overly ask-main">
          <div class="premium-content">
              <p>To enjoy this feature you have to enable one of our subscriptions plan.</p>
              {{ Html::link('subscription/plan','Subscriptions Plan',['class'=>'btn-alt active shadow small margin-null purchase-plan']) }}
              <p>To enjoy this feature please login to Daktarbhai.</p>
              {{ Html::link('/signin','Login',['class'=>'btn-alt active shadow small margin-null purchase-plan']) }}

          </div>
        </div>
    @endif--}}


 <?php
 if(session('backUrl'))
 {
     Session::forget('backUrl');
 }
 Session::put('backUrl', Request::url());
 ?>
{{-- <div class="container">--}}
{{--     <div class="row">--}}
{{--         <div class="col-md-6">--}}
{{--             <!-- ————————————————————————————————————————————--}}
{{--             ———	Ask a Doctor content--}}
{{--             —————————————————————————————————————————————— -->--}}


{{--             <section class="ask-doc-page padding-md">--}}

{{--                 <h2 class="padding-top-null white">--}}
{{--                     {{__('askDoctor.title')}}--}}
{{--                 </h2>--}}
{{--                     {!! Form::open(['route'=>'frontend.ask_doctor1','id'=>'contact-form', 'class' => "question-form", 'data-parsley-validate', 'method' => 'POST']) !!}--}}

{{--                     <div class="row">--}}
{{--                         <div class="col-md-12">--}}
{{--                             --}}{{--{!! Form::textarea('description', session('question_info')['description'], array('id' => 'description', 'maxlength' => '1000','minlength' => '40', 'rows' => '4','required' => 'required','placeholder' => 'your question' ,'class' => 'form-field')) !!}--}}
{{--                             {!! Form::textarea('description', old('description'), ['class' => 'form-field', 'id' => 'description', 'rows' => '4',--}}
{{--                                                                                'placeholder' => __('askDoctor.placeholder'),--}}
{{--                                                                                'required' => 'required',--}}
{{--                                                                                'data-parsley-required-message' =>  __('askDoctor.question_form.placeholder.input_query'),--}}
{{--                                                                                'data-parsley-trigger'          => 'change focusout',--}}
{{--                                                                                'data-parsley-maxlength'        => '1000']) !!}--}}
{{--                         </div>--}}
{{--                         <div class="col-md-12 make-private">--}}
{{--                             <button id="#" class="ask-login login-btn shadow"> {{__('askDoctor.button.search_btn')}}</button>--}}
{{--                         </div>--}}


{{--                     </div>--}}
{{--                 {!! Form::close() !!}--}}
{{--             </section>--}}
{{--         </div>--}}
{{--     </div>--}}
{{-- </div>--}}

<div class="row slider-section section-padding" style="height: 410px">
    <div class="col-md-12">
        <div class="col-md-4 col-sm-12 speciality-title-section">
            <h2 class="margin-bottom">Ask a Doctor and Get Answers from Real Doctors.</h2>
        </div>
        <div class="col-md-7 col-md-offset-1 col-sm-12 img-section">
            <img src="{!! asset('assets/img/ask_doctor.png') !!}" class="facility-slider-img" alt="" style="width: -webkit-fill-available;">
        </div>
    </div>
</div>
<div class="row">
    {!! Form::open(['route'=>'frontend.ask_doctor1','id'=>'contact-form', 'class' => "question-form", 'data-parsley-validate', 'method' => 'POST']) !!}
    <div class="col-md-10 col-md-offset-1 ask_doctor_btn_box">
        <div class="col-md-8">
         {!! Form::textarea('description', old('description'), ['class' => 'form-field ask-doctor-description', 'rows' => '2',
                                                            'placeholder' => __('askDoctor.placeholder'),
                                                            'required' => 'required',
                                                            'data-parsley-required-message' =>  __('askDoctor.question_form.placeholder.input_query'),
                                                            'data-parsley-trigger'          => 'change focusout',
                                                            'data-parsley-maxlength'        => '1000']) !!}
        </div>
        <div class="col-md-4">
            <button id="#" class="ask-login login-btn shadow text-center"> {{__('askDoctor.button.search_btn')}}</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>


</div>

<div id="home-wrap" class="content-section ques-area fullpage-wrap">
     <div class="row no-margin">
         <div class="col-md-12 padding-leftright-null">
             <div class="col-md-9 padding-leftright-null">
                 <div class="popular-questions text padding-md-bottom-null">
                     <h3 class="grey margin-bottom-small">{{__('askDoctor.popular')}}  {{__('askDoctor.questions')}}</h3>
                     <div class="panel-group">
                         @foreach($questions as $question)
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
                                         <div class="col-md-2"><p><span class="view"></span> {!! $question->_info->total_view or '' !!} </p></div>
                                         <div class="col-md-2"><a href="{!! route('frontend.question.show', $question->id) !!}" class="doc-ans"><p> {!! $question->_info->total_answer !!}</p></a></div>
                                         <div class="col-md-5">@foreach(array_slice($question->topics, 0, 1) as $topic)<a href="{!! route("frontend.question.topics", $topic->id) !!}" class="tag"><p>{!! $topic->title !!}</p></a>@endforeach</div>
                                     </div>
                                 </div>
                             </div>
                             @endforeach
                             <a href="{!! route('frontend.all_questions') !!}" class="btn-alt small active shadow margin-null more-qs">
                                 <span>{{__('askDoctor.button.question_btn')}}</span></a>
                     </div>
                 </div>
             </div>
             <div class="col-md-3 padding-leftright-null ">
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
{{--                         <ul class="featured-ques" id="exp">--}}
{{--                             @foreach(array_slice($featured_questions, 2, 3) as $featured_question)--}}
{{--                                 <li><a href="{!! route('frontend.question.show', $featured_question->id) !!}" class="questions">{!! $featured_question->description or '' !!} </a>--}}
{{--                                 </li>--}}
{{--                             @endforeach--}}
{{--                         </ul>--}}
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
                               <!-- <a target="_blank" href="{{ config('misc.app.android-native.app_url') }}" class="btn-alt small active doc-btn"><i class="fa fa-android" aria-hidden="true"></i> -->
<!-- Download our app</a> -->
{{--                               <a target="_blank" href="{{ config('misc.app.android-native.app_url') }}" class="app-btn promotion"><i class="fa fa-android" aria-hidden="true"></i> {{__('askDoctor.button.google_btn')}}</a>--}}
                               <a target="_blank" href="{{ config('misc.app.android-native.app_url') }}"><img src="{!! asset('assets/img/play-store 1.png') !!}" class="google-icon" alt=""></a>
                               {{--<a target="_blank" href="{{ config('misc.app.ios.app_url') }}" class="app-btn promotion"><i class="fa fa-apple" aria-hidden="true"></i> {{__('askDoctor.button.app_btn')}}--}}
</a>
                           </div>
                       </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

<form id="login_success" method="post" action="{{ route('frontend.login.facebook') }}">
 <input id="csrf" type="hidden" name="csrf" />
 <input id="csrf_token" value="{{ csrf_token() }}" type="hidden" name="_token" />
 <input id="code" type="hidden" name="code" />
</form>

@endsection

@section('header-scripts')
<!-- HTTPS required. HTTP will give a 403 forbidden response -->
<script src="https://sdk.accountkit.com/en_US/sdk.js"></script>
@stop

@section('before-scripts-end')



<script>
 // initialize Account Kit with CSRF protection
 AccountKit_OnInteractive = function(){
     AccountKit.init(
             {
                 appId:"{!! config("misc.web.facebook_app_id") !!}",
                 state:"{{ csrf_token() }}",
                 version:"{{ config("misc.web.fb_account_kit_version") }}",
                 fbAppEventsEnabled:true,
                 Redirect:"{{ config("misc.web.fb_account_kit_redirect") }}"

             }
     );
 };

 function otpLogin() {
     AccountKit.login(
             'PHONE',
             {countryCode: '+880', phoneNumber: ''}, // will use default values if not specified
             loginCallback
     );
 }

</script>

<script>
 function loginCallback(response) {

     if (response.status === "PARTIALLY_AUTHENTICATED") {
         document.getElementById("code").value = response.code;
         document.getElementById("csrf").value = response.state;
         document.getElementById("login_success").submit();
     }
 }
</script>


@endsection
