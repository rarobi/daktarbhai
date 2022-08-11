@extends('frontend.layouts.theme.master')

@section('after-styles')
    <style>
        .display-none{
            display: none;
        }
    </style>
@endsection

@section('title')
    {!! 'Ask your question | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap ask-doc-bg">{{--{!! dd($user) !!}--}}

        {{--@if(Cookie::has('_tn') && isset($logged_in_api_user))
            --}}{{--@if($user->is_subscribed && $user->is_premium)
                  @else
                      <div class="premium-content">
                          <p>To enjoy this feature you have to enable one of our subscriptions plan.</p>
                          {{ Html::link('subscription/plan','Subscriptions Plan',['class'=>'btn-alt active shadow small margin-null purchase-plan']) }}

                      </div>
            @endif--}}{{--
        @else
            <div class="ask-a-doc-overly">
                <div class="premium-content">
                    --}}{{--<p>To enjoy this feature you have to enable one of our subscriptions plan.</p>--}}{{--
                    <p>To enjoy this feature please login to Daktarbhai.</p>

                    {{ Html::link('signin','Login',['class'=>'btn-alt active shadow small margin-null purchase-plan']) }}

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
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <!-- ————————————————————————————————————————————
                    ———	Ask a Doctor content
                    —————————————————————————————————————————————— -->
                    <div class="ask-doc-login ask-doc-login-out">
                        <!-- ————————————————————————————————————————————
                         ———	Modal start
                         —————————————————————————————————————————————— -->
                        <div class="login-area">
                            <div class="col-md-12">
                                <a class="ask-close"><i class="ion-close" data-pack="default" data-tags="delete, trash, kill, x"></i></a>
                                <h2 class="text-center padding-sm small padding-top-null">Welcome to <img src="{!! asset('assets/img/logo.png') !!}" class="login-logo" alt="logo"></h2>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab-one" aria-controls="tab-one" role="tab" data-toggle="tab" aria-expanded="false">Login</a></li>
                                    <li role="presentation"><a href="#tab-two" aria-controls="tab-two" role="tab" data-toggle="tab" aria-expanded="true">Register</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane @if(!session('activeReg')) active @endif" id="tab-one">
                                        <div class="login-form">
                                            {!! Form::open(['route' => 'frontend.post.signin', 'class' => 'form-horizontal login', 'data-parsley-validate']) !!}
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    {!! Form::input('email_phone', old('email_phone'),'', ['name'=>'email_phone','placeholder' => 'E-mail Address or Phone Number', 'required' => 'required',  'class' => 'form-control form-field email-phone',
                                                                                    'data-parsley-required-message' => 'Email or Phone Number is required',
                                                                                    'data-parsley-pattern'          => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}|(?:\+)+[1-9]+[0-9]{6,}$',
                                                                                    'data-parsley-trigger'          => 'change focusout',
                                                                                    //'data-parsley-type'             => 'email',
                                                                                    'data-parsley-type-message'     => 'Please provide with a valid email address or phone number']) !!}
                                                    @if ($errors->has('email_phone'))
                                                        <span class="error-text filled">{!! $errors->first('email_phone') !!}  </span>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    {!! Form::password('password', ['placeholder' => 'Enter your password',  'required' => 'required', 'class' => 'form-control form-field',
                                                                                    'data-parsley-required-message' => 'Password is required',
                                                                                    'data-parsley-trigger'          => 'change focusout'
                                                                                    ]) !!}
                                                    @if ($errors->has('password'))
                                                        <span class="error-text filled">{!! $errors->first('password') !!}  </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    {!! Form::submit('Login', ['class' => 'login-btn']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="checkbox">
                                                        {{--<label><input name="remember" value="1" type="checkbox"> Remember Me </label>--}}
                                                        <a href="{!! route('frontend.reset-password-form') !!}"class="for-pass" style="margin-left: 2px; float: left;">Forgot Your Password?</a>
                                                    </div>
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <button onclick="otpLogin();" class = "login-btn"><i class="fa fa-mobile" aria-hidden="true"></i>
                                                    <span class="login-mobile">Continue with mobile</span> </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane @if(session('activeReg')) active @endif" id="tab-two">
                                        <div class="login-form">
                                            {!! Form::open(['route' => 'frontend.signup', 'class' => 'form-horizontal login', 'data-parsley-validate' => '','id'=>'registerUser']) !!}

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    {!! Form::text('name', old('name'), ['placeholder' => 'Name', 'id' => 'name', 'class' => 'form-control form-field','required' => 'required',
                                                                                         'data-parsley-trigger'          => 'change focusout',
                                                                                         'data-parsley-minlength'        => '2',
                                                                                         'data-parsley-maxlength'        => '50']) !!}
                                                    @if ($errors->has('name'))
                                                        <span class="error-text filled">{!! $errors->first('name') !!}  </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    {!! Form::email('email', old('email'), ['placeholder' => 'E-mail Address',   'class' => 'form-control form-field email-reg',
                                                                                            'required' => 'required', 'data-parsley-required-message' => 'Email is required',
                                                                                            'data-parsley-pattern'          => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$',
                                                                                            'data-parsley-pattern-message'  => 'Please provide with a valid email address',
                                                                                            'data-parsley-trigger'          => 'change focusout',
                                                                                            'data-parsley-type'             => 'email',
                                                                                            'data-parsley-type-message'     => 'Please provide with a valid email address']) !!}
                                                    @if ($errors->has('email'))
                                                        <span class="error-text filled">{!! $errors->first('email') !!}  </span>
                                                    @endif
                                                    <span class="error-text email-exist"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    {!! Form::password('password', ['placeholder' => 'Password',  'id' => 'password', 'class' => 'form-control form-field',
                                                                                    'required' => 'required', 'data-parsley-required-message' => 'Password is required',
                                                                                    'data-parsley-trigger'          => 'change focusout',
                                                                                    'data-parsley-minlength'        => '6',
                                                                                    'data-parsley-maxlength'        => '20']) !!}
                                                    @if ($errors->has('password'))
                                                        <span class="error-text filled">{!! $errors->first('password') !!}  </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="checkbox">
                                                        <label><input name="checkbox" id="termsAgreed" value="1" required type="checkbox"> I agree to the <a target="_blank" href="{!! route('frontend.terms') !!}">terms and conditions</a> </label>
                                                    </div>
                                                    @if ($errors->has('checkbox'))
                                                        <span class="error-text filled">{!! $errors->first('checkbox') !!}  </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group" style="display: none">
                                                <input class="csrf" id="csrf_reg" type="hidden" name="csrf_reg" />
                                                <input class="code" id="code_reg" type="hidden" name="code_reg" />
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    {!! Form::submit('Register',['class' => 'login-btn']) !!}
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ————————————————————————————————————————————
                         ———	Modal end
                         —————————————————————————————————————————————— -->
                    </div>
                    <!-- ————————————————————————————————————————————
                                 ———	Sucess Modal start
                                 —————————————————————————————————————————————— -->
                    <div class="ask-doc-sucess ask-doc-sucess-out">
                        <div class="ask-doc-sucess-area">
                            <div class="col-md-12">
                                <a class="ask-close"><i class="ion-close" data-pack="default" data-tags="delete, trash, kill, x"></i></a>
                                <p class="sucess-img"><img src="{!! asset('assets/img/ask-a-question-sucess.png') !!}" alt=""> <span id="ask-sub-msg"></span></p>
                                <p class="error-img"><img src="{!! asset('assets/img/ask-a-questions-error.png') !!}" alt=""> <span id="ask-sub-error-msg"></span></p>
                            </div>
                        </div>
                    </div>
                    <!-- ————————————————————————————————————————————
                     ———	Sucess Modal end
                     —————————————————————————————————————————————— -->
                    <section class="ask-doc-page padding-md">
                        <h2 class="ask-title padding-top-null white margin-null text-center">
                            {{__('askDoctor.title')}}
                        </h2>
                        {{--{!! Form::open(['route'=>'frontend.post-ask-doctor','id'=>'contact-form', 'class' => "question-form from-bg", 'data-parsley-validate', 'method' => 'POST']) !!}--}}
                        {!! Form::model($askquestion,['route'=>['frontend.update-ask-doctor',$askquestion->id],'id'=>'contact-form', 'class' => "question-form from-bg", 'data-parsley-validate', 'method' => 'PUT']) !!}

                        <div class="row">

                            <div class="col-md-12 make-private">
                                {{--<div class="add-info">--}}
                                    {{--<input data-modal="#modal" id="six" class="popup" name="" value="value" type="checkbox">--}}
                                    {{--<label for="six">Additional Information</label>--}}
                                {{--</div>--}}
                                {{--{!! dd($askquestion->topics[0]->id) !!}--}}
                                <div class="col-md-12">
                                {!! Form::textarea('description', isset($askquestion) ? $askquestion->description : session('question_info')['description'], ['class' => 'form-field', 'id' => 'description', 'rows' => '4',

                                'placeholder' => __('askDoctor.placeholder'),
                                                                                   'required' => 'required',
                                                                                   'data-parsley-required-message' => __('askDoctor.provide_input'),
                                                                                   'data-parsley-trigger'          => 'change focusout',
                                                                                   'data-parsley-minlength-message' => __('askDoctor.min_input'),
                                                                                   'data-parsley-maxlength'        => '1000',
                                                                                   'onkeyup' => 'countTextAreaChar(this, 1000)']) !!}

                                <p class="charNum"><span id="charNum"></span>/{{__('askDoctor.one_thousand')}}</p>
                                <div id="errorMessageShow" ></div>
                            </div>
                            <div class="col-md-12">
                                {{--{{dd($askquestion->topics)}}--}}
                                <select name="topics" class="form-field" id="topics" required>
                                    {{--<option value="{!! isset(('question_info')['topics']) ? ('question_info')['topics'] : '' !!}" selected="selected">  {!! isset(('question_info')['topics']) && ('question_info')['topics'] != null ? ('question_info')['topics'] : 'select a topics' !!} </option>--}}

                                    @foreach($topics as $key => $topic)

                                        <option value="{!! isset($topic->title)?$topic->title:'' !!}"
                                                @if(count($askquestion->topics)>0)
                                                    @if($askquestion->topics[0]->id == $topic->id)
                                                        selected
                                                    @endif
                                                @endif>{!! isset($topic->title)?$topic->title:__('askDoctor.question_form.placeholder.select_topic')!!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <p class="ask-gendar"><span>{{__('askDoctor.gender')}} :</span>
                                    @if(Cookie::has('_tn') && isset($logged_in_api_user) && ($logged_in_api_user->gender != null))
                                        @if($logged_in_api_user->gender == 'male' ||  isset($askquestion) ? $askquestion->user_gender == 'male' : null)

                                            <input type="radio" name="gender" id="male" value="male" checked>
                                            <label for="male">{{__('find_doctor.male')}}</label>

                                            <input type="radio" name="gender" id="female" value="female" >
                                            <label for="female">{{__('find_doctor.female')}}</label>

                                            <input type="radio" name="gender" id="other" value="other" >
                                            <label for="other">{{__('askDoctor.other')}}</label>

                                        @elseif ($logged_in_api_user->gender == 'female' || isset($askquestion) ? $askquestion->user_gender == 'female' : null)

                                            <input type="radio" name="gender" id="male" value="male" >
                                            <label for="male">{{__('find_doctor.male')}}</label>

                                            <input type="radio" name="gender" id="female" value="female" checked>
                                            <label for="female">{{__('find_doctor.female')}}</label>

                                            <input type="radio" name="gender" id="other" value="other" >
                                            <label for="other">{{__('askDoctor.other')}}</label>

                                        @else

                                            <input type="radio" name="gender" id="male" value="male" >
                                            <label for="male">{{__('find_doctor.male')}}</label>

                                            <input type="radio" name="gender" id="female" value="female" >
                                            <label for="female">{{__('find_doctor.female')}}</label>

                                            <input type="radio" name="gender" id="other" value="other" checked>
                                            <label for="other">{{__('askDoctor.other')}}</label>

                                        @endif
                                    @else

                                        <input type="radio" name="gender" id="male" value="male" checked>
                                        <label for="male">{{__('find_doctor.male')}}</label>

                                        <input type="radio" name="gender" id="female" value="female">
                                        <label for="female">{{__('find_doctor.female')}}</label>

                                        <input type="radio" name="gender" id="other" value="other">
                                        <label for="other">{{__('askDoctor.other')}}</label>

                                    @endif
                                </p>
                            </div>
                            <div class="col-md-12 user-age">
                                @if(Cookie::has('_tn') && isset($logged_in_api_user) && ($logged_in_api_user->age != null))
                                {{--{!! $ageValue =  !!}--}}
                                    <input type="number" id="age" name="age" class="form-field" placeholder="{{__('askDoctor.age')}}" value="{!! isset($askquestion) ? $askquestion->user_age : $logged_in_api_user->ageValue !!}" required>
                                @else
                                    <input type="number" id="age" name="age" value="{!! isset($askquestion) ? $askquestion->user_age : null !!}" class="form-field" placeholder="{{__('askDoctor.age')}}" required>
                                @endif

                            </div>
                            {{--<div class="col-md-12 make-private">--}}
                                {{--<input type="checkbox" data-modal="#modal" id="is_private" class="popup" name="is_private" value="1"--}}
                                       {{--@if(isset(session('question_info')['is_private']) && session('question_info')['is_private'] == 1) checked @endif>--}}
                                {{--<label for="six">Make it Private</label>--}}
                            {{--</div>--}}

                            <div class="col-md-12 make-private">
                            {{--@if(isset($askquestion->additional_info))--}}
                              {{--<div class="add-info">--}}
                                {{--<input data-modal="#modal" id="six" class="popup" name="" value="value" type="checkbox" checked>--}}
                                {{--<label for="six">{{__('askDoctor.question_form.additional_information')}}</label>--}}
                              {{--</div>--}}

                                {{--<div class="col-md-12 padding-leftright-null additional-info  display-block">--}}
                                    {{--<div class="col-md-6 padding-leftright-null">--}}
                                    {{--<div class="fever-question">--}}
                                        {{--<div class="question-info">--}}
                                            {{--<label for="question">{{__('askDoctor.question_form.any_fever')}}</label>--}}
                                            {{--<input class="fever" type="radio" name="fever[status]" value="1" {{ (isset($askquestion->additional_info->fever->status) && $askquestion->additional_info->fever->status == '1') ? 'checked' : null}}>--}}
                                            {{--<label for="Yes">{{__('askDoctor.yes')}}</label>--}}

                                            {{--<input class="fever" type="radio" name="fever[status]" value="0" >--}}
                                            {{--<label for="No">{{__('askDoctor.no')}}</label>--}}

                                            {{--{!! Form::text('fever[note]', isset($askquestion->additional_info->fever->note) ? $askquestion->additional_info->fever->note : null, ['placeholder' => __('askDoctor.question_form.placeholder.fever'), 'class' => 'form-control form-field display-none note-placeholder note-fever' ]) !!}--}}
                                        {{--</div>--}}
                                        {{--<div class="btn btn-sm btn-primary question-btn">Next <i class="fa fa-angle-double-right" aria-hidden="true"></i></div>--}}
                                    {{--</div>--}}
                                    {{--<div class="fever-question">--}}
                                        {{--<div class="question-info">--}}
                                            {{--<label for="question">{{__('askDoctor.question_form.any_hypertensive')}}</label>--}}
                                            {{--<input class="hypertensive" type="radio" name="hypertensive[status]"  value="1" {{(isset($askquestion->additional_info->hypertensive->status) && $askquestion->additional_info->hypertensive->status == '1') ? 'checked' : null}}>--}}
                                            {{--<label for="Yes">{{__('askDoctor.yes')}}</label>--}}

                                            {{--<input class="hypertensive" type="radio" name="hypertensive[status]"  value="0" >--}}
                                            {{--<label for="No">{{__('askDoctor.no')}}</label>--}}

                                            {{--{!! Form::text('hypertensive[note]', isset($askquestion->additional_info->hypertensive->note) ? $askquestion->additional_info->hypertensive->note : null, ['placeholder' => '120/80',  'class' => 'form-control form-field display-none note-placeholder note-hypertensive' ]) !!}--}}
                                        {{--</div>--}}
                                        {{--<div class="btn btn-sm btn-primary question-btn">Next <i class="fa fa-angle-double-right" aria-hidden="true"></i></div>--}}
                                    {{--</div>--}}
                                    {{--<div class="fever-question">--}}
                                            {{--<div class="question-info">--}}
                                                {{--<label for="question">{{__('askDoctor.question_form.any_allergic')}}--}}
                                                {{--</label>--}}
                                                {{--<input class="allergic" type="radio" name="allergic[status]"  value="1" {{(isset($askquestion->additional_info->allergic->status) && $askquestion->additional_info->allergic->status == '1') ? 'checked' : null}}>--}}
                                                {{--<label for="Yes">{{__('askDoctor.yes')}}</label>--}}

                                                {{--<input class="allergic" type="radio" name="allergic[status]"  value="0" >--}}
                                                {{--<label for="No">{{__('askDoctor.no')}}</label>--}}

                                                {{--{!! Form::text('allergic[note]', isset($askquestion->additional_info->allergic->note) ? $askquestion->additional_info->allergic->note : null, ['placeholder' =>__('askDoctor.question_form.placeholder.allergic'),  'class' => 'form-control form-field display-none note-placeholder note-allergy-input' ]) !!}--}}
                                            {{--</div>--}}
                                            {{--<div class="btn btn-sm btn-primary question-btn">Next <i class="fa fa-angle-double-right" aria-hidden="true"></i></div>--}}
                                    {{--</div>--}}

                                    {{--<div class="fever-question">--}}
                                            {{--<div class="question-info">--}}
                                                {{--<label for="question">{{__('askDoctor.question_form.taking_drugs')}}--}}
                                                {{--</label>--}}
                                                {{--<input class="drugs" type="radio" name="drugs[status]"  value="1" {{(isset($askquestion->additional_info->drugs->status) && $askquestion->additional_info->drugs->status == '1') ? 'checked' : null}}>--}}
                                                {{--<label for="Yes">{{__('askDoctor.yes')}}</label>--}}

                                                {{--<input class="drugs" type="radio" name="drugs[status]"  value="0" >--}}
                                                {{--<label for="No">{{__('askDoctor.no')}}</label>--}}

                                                {{--{!! Form::textarea('drugs[note]', isset($askquestion->additional_info->drugs->note) ? $askquestion->additional_info->drugs->note : null, ['placeholder' => __('askDoctor.question_form.placeholder.taking_drugs'),'rows'=>'2','cols'=>'40','class' => 'form-control form-field display-none note-placeholder note-drugs' ]) !!}--}}
                                            {{--</div>--}}
                                            {{--<div class="btn btn-sm btn-primary question-btn">Next <i class="fa fa-angle-double-right" aria-hidden="true"></i></div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-6">--}}
                                    {{--<div class="fever-question">--}}
                                        {{--<div class="question-info">--}}
                                            {{--<label for="question">{{__('askDoctor.question_form.height')}}--}}
                                            {{--</label>--}}

                                            {{--<div class=" padding-leftright-null">--}}
                                                {{--<div class="form-group col-md-4 padding-leftright-null margin-bottom-null">--}}
                                                    {{--{{ Form::select('height[unit]', ['' => __('askDoctor.question_form.placeholder.choose_unit'), 'feet' => __('askDoctor.question_form.placeholder.feet'),'cm' => __('askDoctor.question_form.placeholder.cm')], isset($askquestion->additional_info->height->selected_unit) ? $askquestion->additional_info->height->selected_unit : null, ['id' =>'height','class' => 'form-control form-field note-placeholder note-allergic']) }}--}}
                                                {{--</div>--}}
{{--{{dd($askquestion->additional_info->height->selected_unit)}}--}}
                                                {{--<div class="form-group col-md-8 margin-bottom-null heightFeetToggle">--}}
                                                    {{--<div id="centimeter">--}}
                                                            {{--{{ Form::number('height[value]', isset($askquestion->additional_info->height->cm) ? $askquestion->additional_info->height->cm : null, ['placeholder' => 'Enter height in cm', 'step' => '.01','class' => 'form-control form-field note-placeholder note-allergic']) }}--}}
                                                        {{--<label for="input" class="control-label">Enter Height in Centimeter</label><i class="bar"></i>--}}
                                                    {{--</div>--}}
                                                    {{--<div id="feet" class="input-group">--}}
                                                        {{--{{ Form::number('height[value]', isset($askquestion->additional_info->height->feet->feet) ? $askquestion->additional_info->height->feet->feet : null,['placeholder' => __('askDoctor.question_form.placeholder.feet'),'class' => 'form-control form-field note-placeholder note-allergic']) }}--}}
                                                        {{--<span class="input-group-addon  "> Ft </span>--}}
                                                        {{--{{ Form::number('height[inc_value]', isset($askquestion->additional_info->height->feet->inches) ? $askquestion->additional_info->height->feet->inches : null,['placeholder' => __('askDoctor.question_form.placeholder.inches'),'class' => 'form-control form-field note-placeholder note-allergic']) }}--}}
                                                        {{--<span class="height-group-addon"> Inches </span>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                    {{--</div>--}}

                                    {{--<div class="fever-question">--}}
                                            {{--<div class="question-info">--}}
                                                {{--<label for="question">{{__('askDoctor.question_form.weight')}}--}}
                                                {{--</label>--}}
                                                {{--<div class="col-md-12 padding-leftright-null">--}}
                                                    {{--<div class="form-group col-md-5 padding-leftright-null margin-bottom-null">--}}
                                                        {{--{{ Form::select('weight[unit]',['' => __('askDoctor.question_form.placeholder.choose_unit'), 'kg' =>__('askDoctor.question_form.placeholder.kg'), 'lb' => __('askDoctor.question_form.placeholder.lb')] , isset($askquestion->additional_info->weight->unit) ? $askquestion->additional_info->weight->unit : null, ['id' =>'weight','class' => 'form-control form-field note-placeholder note-allergic']) }}--}}
                                                        {{--<label for="select" class="control-label"></label><i class="bar"></i>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="form-group col-md-7 margin-bottom-null">--}}
                                                        {{--{{ Form::number('weight[value]', isset($askquestion->additional_info->weight->weight_kg) ? $askquestion->additional_info->weight->weight_kg : null, ['placeholder' => __('askDoctor.question_form.placeholder.enter_height'), 'step' => '.01','class' => 'form-control form-field note-placeholder note-allergic']) }}--}}
                                                        {{--<label for="input" class="control-label">Enter Weight</label><i class="bar"></i>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="btn btn-sm btn-primary question-btn">Next <i class="fa fa-angle-double-right" aria-hidden="true"></i></div>--}}
                                     {{--</div>--}}
                                     {{--<div class="fever-question disease-box">--}}
                                            {{--<div class="question-info ">--}}
                                                {{--<label for="question">{{__('askDoctor.question_form.chronic')}}--}}
                                                {{--</label>--}}
                                                {{--<input class="chronic" type="radio" name="chronic[status]"  value="1" {{(isset($askquestion->additional_info->chronic->status) && $askquestion->additional_info->chronic->status == '1') ? 'checked' : null}}>--}}
                                                {{--<label for="Yes">{{__('askDoctor.yes')}}</label>--}}

                                                {{--<input class="chronic" type="radio" name="chronic[status]"  value="0" >--}}
                                                {{--<label for="No">{{__('askDoctor.no')}}</label>--}}

                                                {{--{!! Form::text('chronic[note]', isset($askquestion->additional_info->chronic->note) ? $askquestion->additional_info->chronic->note : null, ['placeholder' => __('askDoctor.question_form.placeholder.chronic'),  'class' => 'form-control form-field display-none note-placeholder note-chronic' ]) !!}--}}
                                            {{--</div>--}}
                                            {{--<div class="btn btn-sm btn-primary question-btn">Next <i class="fa fa-angle-double-right" aria-hidden="true"></i></div>--}}
                                     {{--</div>--}}

                                   {{--</div>--}}

                            {{--</div>--}}
                            {{--@else--}}
                                    {{--<div class="add-info">--}}
                                        {{--<input data-modal="#modal" id="six" class="popup" name="" value="value" type="checkbox">--}}
                                        {{--<label for="six">{{__('askDoctor.question_form.additional_information')}}</label>--}}
                                    {{--</div>--}}

                                    {{--<div class="col-md-12 padding-leftright-null additional-info  display-block">--}}
                                        {{--<div class="col-md-6 padding-leftright-null">--}}
                                            {{--<div class="fever-question">--}}
                                                {{--<div class="question-info">--}}
                                                    {{--<label for="question">{{__('askDoctor.question_form.any_fever')}}</label>--}}
                                                    {{--<input class="fever" type="radio" name="fever[status]" value="1" >--}}
                                                    {{--<label for="Yes">{{__('askDoctor.yes')}}</label>--}}

                                                    {{--<input class="fever" type="radio" name="fever[status]" value="0" >--}}
                                                    {{--<label for="No">{{__('askDoctor.no')}}</label>--}}

                                                    {{--{!! Form::text('fever', old('fever[note]'), ['placeholder' => __('askDoctor.question_form.placeholder.fever'), 'class' => 'form-control form-field display-none note-placeholder note-fever' ]) !!}--}}
                                                {{--</div>--}}
                                                {{--<div class="btn btn-sm btn-primary question-btn">Next <i class="fa fa-angle-double-right" aria-hidden="true"></i></div>--}}
                                            {{--</div>--}}
                                            {{--<div class="fever-question">--}}
                                                {{--<div class="question-info">--}}
                                                    {{--<label for="question">{{__('askDoctor.question_form.any_hypertensive')}}</label>--}}
                                                    {{--<input class="hypertensive" type="radio" name="hypertensive[status]"  value="1" >--}}
                                                    {{--<label for="Yes">{{__('askDoctor.yes')}}</label>--}}

                                                    {{--<input class="hypertensive" type="radio" name="hypertensive[status]"  value="0" >--}}
                                                    {{--<label for="No">{{__('askDoctor.no')}}</label>--}}

                                                    {{--{!! Form::text('hypertensive', old('hypertensive[note]'), ['placeholder' => __('askDoctor.question_form.placeholder.blood_pressure'),  'class' => 'form-control form-field display-none note-placeholder note-hypertensive' ]) !!}--}}
                                                {{--</div>--}}
                                                {{--<div class="btn btn-sm btn-primary question-btn">Next <i class="fa fa-angle-double-right" aria-hidden="true"></i></div>--}}
                                            {{--</div>--}}
                                            {{--<div class="fever-question">--}}
                                                {{--<div class="question-info">--}}
                                                    {{--<label for="question">{{__('askDoctor.question_form.any_allergic')}}--}}
                                                    {{--</label>--}}
                                                    {{--<input class="allergic" type="radio" name="allergic[status]"  value="1" >--}}
                                                    {{--<label for="Yes">{{__('askDoctor.yes')}}</label>--}}

                                                    {{--<input class="allergic" type="radio" name="allergic[status]"  value="0" >--}}
                                                    {{--<label for="No">{{__('askDoctor.no')}}</label>--}}

                                                    {{--{!! Form::text('allergic', old('allergic[note]'), ['placeholder' => __('askDoctor.question_form.placeholder.allergic'),  'class' => 'form-control form-field display-none note-placeholder note-allergic' ]) !!}--}}
                                                {{--</div>--}}
                                                {{--<div class="btn btn-sm btn-primary question-btn">Next <i class="fa fa-angle-double-right" aria-hidden="true"></i></div>--}}
                                            {{--</div>--}}

                                            {{--<div class="fever-question">--}}
                                                {{--<div class="question-info">--}}
                                                    {{--<label for="question">{{__('askDoctor.question_form.taking_drugs')}}--}}
                                                    {{--</label>--}}
                                                    {{--<input class="drugs" type="radio" name="drugs[status]"  value="1" >--}}
                                                    {{--<label for="Yes">{{__('askDoctor.yes')}}</label>--}}

                                                    {{--<input class="drugs" type="radio" name="drugs[status]"  value="0" >--}}
                                                    {{--<label for="No">{{__('askDoctor.no')}}</label>--}}

                                                    {{--{!! Form::textarea('drugs', old('drugs[note]'), ['placeholder' => __('askDoctor.question_form.placeholder.taking_drugs'),'rows'=>'2','cols'=>'40','class' => 'form-control form-field display-none note-placeholder note-drugs' ]) !!}--}}
                                                {{--</div>--}}
                                                {{--<div class="btn btn-sm btn-primary question-btn">Next <i class="fa fa-angle-double-right" aria-hidden="true"></i></div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-6">--}}
                                            {{--<div class="fever-question">--}}
                                                {{--<div class="question-info">--}}
                                                    {{--<label for="question">{{__('askDoctor.question_form.height')}}--}}
                                                    {{--</label>--}}

                                                    {{--<div class=" padding-leftright-null">--}}
                                                        {{--<div class="form-group col-md-4 padding-leftright-null margin-bottom-null">--}}
                                                            {{--{{ Form::select('height[unit]', ['' => __('askDoctor.question_form.placeholder.choose_unit'), 'feet' => __('askDoctor.question_form.placeholder.feet'),'cm' => __('askDoctor.question_form.placeholder.cm')], old('height[unit]'), ['id' =>'height','class' => 'form-control form-field note-placeholder note-allergic']) }}--}}
                                                        {{--</div>--}}

                                                        {{--<div class="form-group col-md-8 margin-bottom-null heightFeetToggle">--}}
                                                            {{--<div id="centimeter">--}}
                                                                {{--{{ Form::number('height[value]', old('height[value]'), ['placeholder' => __('askDoctor.question_form.height'), 'step' => '.01','class' => 'form-control form-field note-placeholder note-allergic']) }}--}}
                                                                {{--<label for="input" class="control-label">Enter Height in Centimeter</label><i class="bar"></i>--}}
                                                            {{--</div>--}}
                                                            {{--<div id="feet" class="input-group">--}}
                                                                {{--{{ Form::number('height[value]', old('height[value]'),['placeholder' =>  __('askDoctor.question_form.placeholder.feet'),'class' => 'form-control form-field note-placeholder note-allergic']) }}--}}
                                                                {{--<span class="input-group-addon  "> Ft </span>--}}
                                                                {{--{{ Form::number('height[inc_value]', old('height[inc_value]'),['placeholder' => __('askDoctor.question_form.placeholder.inches'),'class' => 'form-control form-field note-placeholder note-allergic']) }}--}}
                                                                {{--<span class="height-group-addon"> Inches </span>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}

                                            {{--</div>--}}

                                            {{--<div class="fever-question">--}}
                                                {{--<div class="question-info">--}}
                                                    {{--<label for="question">{{__('askDoctor.question_form.weight')}}--}}
                                                    {{--</label>--}}
                                                    {{--<div class="col-md-12 padding-leftright-null">--}}
                                                        {{--<div class="form-group col-md-5 padding-leftright-null margin-bottom-null">--}}
                                                            {{--{{ Form::select('weight[unit]',['' => __('askDoctor.question_form.placeholder.choose_unit'), 'kg' =>__('askDoctor.question_form.placeholder.kg'), 'lb' => __('askDoctor.question_form.placeholder.lb')] , old('weight[unit]'), ['id' =>'weight','class' => 'form-control form-field note-placeholder note-allergic']) }}--}}
                                                            {{--<label for="select" class="control-label"></label><i class="bar"></i>--}}
                                                        {{--</div>--}}

                                                        {{--<div class="form-group col-md-7 margin-bottom-null">--}}
                                                            {{--{{ Form::number('weight[value]', old('weight[value]'), ['placeholder' => __('askDoctor.question_form.placeholder.enter_weight'), 'step' => '.01','class' => 'form-control form-field note-placeholder note-allergic']) }}--}}
                                                            {{--<label for="input" class="control-label">Enter Weight</label><i class="bar"></i>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="btn btn-sm btn-primary question-btn">Next <i class="fa fa-angle-double-right" aria-hidden="true"></i></div>--}}
                                            {{--</div>--}}
                                            {{--<div class="fever-question disease-box">--}}
                                                {{--<div class="question-info ">--}}
                                                    {{--<label for="question">{{__('askDoctor.question_form.chronic')}}--}}
                                                    {{--</label>--}}
                                                    {{--<input class="chronic" type="radio" name="chronic[status]"  value="1" >--}}
                                                    {{--<label for="Yes">{{__('askDoctor.yes')}}</label>--}}

                                                    {{--<input class="chronic" type="radio" name="chronic[status]"  value="0" >--}}
                                                    {{--<label for="No">{{__('askDoctor.no')}}</label>--}}

                                                    {{--{!! Form::text('chronic', old('chronic[note]'), ['placeholder' => __('askDoctor.question_form.placeholder.chronic'),  'class' => 'form-control form-field display-none note-placeholder note-chronic' ]) !!}--}}
                                                {{--</div>--}}
                                                {{--<div class="btn btn-sm btn-primary question-btn">Next <i class="fa fa-angle-double-right" aria-hidden="true"></i></div>--}}
                                            {{--</div>--}}

                                        {{--</div>--}}

                                  {{--</div>--}}
                            {{--@endif--}}


                        </div>
                        <div class="col-md-12">
                           <input class="ask-doctor-button login-btn shadow ask-btn" value="{{__('askDoctor.button.search_btn')}}" type="submit">
                        </div>
                        </div>
                        </div>
                        {!! Form::close() !!}
                    </section>
                </div>
            </div>
        </div>
    </div>

    <div id="home-wrap" class="content-section fullpage-wrap row white">
        <div class="col-md-12 padding-leftright-null">
            <section id="news" class="page padding-md padding-bottom-null">
                <div class="row no-margin" style="margin-bottom:100px;">
                    <div class="col-md-12 services-box how-it-works">
                        <h1 class="text-center">{{__('askDoctor.how_work.title')}}</h1>
                        <div class="col-md-4">
                            <div class="margin-md-bottom text-center">
                                <img src="{!! asset('assets/img/ask-a-questions-icon.png') !!}" width="75px" alt="Search">
                                <h6 class="heading  margin-bottom-extrasmall">{{__('askDoctor.how_work.health_concern.title')}}</h6>
                                <p>{{__('askDoctor.how_work.health_concern.description')}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="margin-md-bottom text-center">
                                <img src="{!! asset('assets/img/appointment.png') !!}" width="75px" alt="Book">
                                <h6 class="heading  margin-bottom-extrasmall">{{__('askDoctor.how_work.doctors_answer.title')}}</h6>
                                <p>{{__('askDoctor.how_work.doctors_answer.description')}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="margin-md-bottom text-center">
                                <img src="{!! asset('assets/img/medical-advice.png') !!}" width="75px" alt="Get Well Soon">
                                <h6 class="heading  margin-bottom-extrasmall">{{__('askDoctor.how_work.health_query.title')}}</h6>
                                <p>{{__('askDoctor.how_work.health_query.description')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
        $(function() {
            var form = $('#contact-form');
            var formMessages = $('#ask-sub-msg');
            var formErrorMessages = $('#ask-sub-error-msg');
            $(form).submit(function(event) {
                event.preventDefault();
                if ( $(this).parsley().isValid() ) {
                    $('.ask-doctor-button').prop('disabled', true);
                    var formData = $(form).serialize();
                    $.ajax({
                        type: 'POST',
                        url: $(form).attr('action'),
                        data: formData
                    }).done(function(response) {
                        console.log(response);

                        if(response.error == "sign-in") {
                            $(".ask-doc-login").fadeIn();
                            $(".ask-close").click(function(){
                                $(".ask-doc-login-out").fadeOut();
                                $('.ask-doctor-button').prop('disabled', false);
                            });
                        }
                        else if(response.submit == '1') {
                            console.log(response);
                            document.getElementById('description').value = "";
                            document.getElementById('topics').value = "";
                            $("#is_private").prop("checked", false);
                            $(formErrorMessages).hide('');
                            $(".error-img").hide();
                            $(".sucess-img").show();
                            $(formMessages).show('');
                            $(formMessages).html('<i class="ion-checkmark-circled" data-pack="default" data-tags="complete, finished, success, on"></i> ' +response.success);
                            $(".ask-doc-sucess").fadeIn();
                            $(".ask-close").click(function(){
                                $(".ask-doc-sucess-out").fadeOut();
//                                window.location = 'http://daktarbhai.test/services/ask-a-doctor/'+response.question_id;
                                window.location = {!! config("misc.web.app_url") !!}+'services/ask-a-doctor/'+response.question_id;

                                $('.ask-doctor-button').prop('disabled', false);
                            });

//                            var description = document.getElementById('description');
//                            countTextAreaChar(description, 1000);
                        } else{
                            $(formMessages).hide('');
                            $(".sucess-img").hide();
                            $(".error-img").show();
                            $(formErrorMessages).show('');
                            if(response.error == undefined) {
                                $(formErrorMessages).html('<i class="ion-close-circled" data-pack="default" data-tags="delete, trash, kill, x"></i> Oops! An error occured and your message could not be sent.');
                            } else {
                                $(formErrorMessages).html('<i class="ion-close-circled" data-pack="default" data-tags="delete, trash, kill, x"></i> ' +response.error);
                            }
                            $(".ask-doc-sucess").fadeIn();
                            $(".ask-close").click(function(){
                                $(".ask-doc-sucess-out").fadeOut();
                                $('.ask-doctor-button').prop('disabled', false);
                            });
                        }

                    }).fail(function(data) {
                        var parsedJson = data.responseJSON;
                        var errorString = '';
                        $.each( parsedJson.description, function( key, value) {
                            errorString += '<li class="error-text filled">' + value + '</li>';
                            console.log(errorString);
                        });
                        $('#errorMessageShow').html(errorString);
                        $('.ask-doctor-button').prop('disabled', false);
                        /*$(formMessages).hide('');
                        $(formErrorMessages).show('');
                        $(formErrorMessages).text('Oops! An error occured and your message could not be sent.');
                        $(".ask-doc-sucess").fadeIn();
                        $(".ask-close").click(function(){
                            $(".ask-doc-sucess-out").fadeOut();
                        });*/
                    });
                }

            });


        });
    </script>

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

        /* to count question during ask a question*/
        var len = $('#description').val().length;
        $('#charNum').text(len);
        function countTextAreaChar(txtarea, l){
            var len = $(txtarea).val().length;
            if (len > l) $(txtarea).val($(txtarea).val().slice(0, l));
            else $('#charNum').text(len);
        }

        /*to view placeholder on age field*/
        function myFunction() {
            document.getElementById("age").placeholder = "Amount";
        }

//        $('.question-btn').click(function () {
//            var parentFever = $(this).parents('.fever-question');
//            parentFever.hide();
//            parentFever.next('.fever-question').show();
//        });

        $('.make-private .popup').on('change',function () {
            if($(this).is(':checked') == true) {
                $('.additional-info').show();
            } else {
                $('.additional-info').hide();
            }
        });

        //Radio button action for fever

        $('.fever').on('change', function () {
            var feverElement = $('input[name="fever[status]"]:checked').val();
            toggleFever(feverElement);
        });


        function toggleFever(feverElement) {
            if (feverElement == 1) {
                $('.note-fever').show();
            } else {
                $('.note-fever').hide();
            }
        }

        //Radio button action for hypertensive

        $('.hypertensive').on('change', function () {
            var hypertensiveElement = $('input[name="hypertensive[status]"]:checked').val();
            toggleHypertensive(hypertensiveElement);
        });

        function toggleHypertensive(hypertensiveElement) {
            if(hypertensiveElement== 1) {
                $('.note-hypertensive').show();
            } else {
                $('.note-hypertensive').hide();
            }

        }

 //Radio button action for allergic

        $('.allergic').on('change', function () {
            var allergicElement = $('input[name="allergic[status]"]:checked').val();
            toggleAllergic(allergicElement);
        });

        function toggleAllergic(allergicElement) {
            if(allergicElement == 1) {
                $('.note-allergy-input').show();
            } else {
                $('.note-allergy-input').hide();
            }

        }

        //Radio button action for drug
        $('.drugs').on('change', function () {
            var drugElement = $('input[name="drugs[status]"]:checked').val();
            toggleDrug(drugElement);
        });

        function toggleDrug(drugElement) {
            if(drugElement == 1) {
                $('.note-drugs').show();
            } else {
                $('.note-drugs').hide();
            }

        }

        $(".note-height").show(function() {
            //Do something
        });

        $(".note-weight").show(function() {
            //Do something
        });

//        $('.weight').on('change', function () {
//            if($(this).val() == 1) {
//                $('.note-weight').show();
//            } else {
//                $('.note-weight').hide();
//            }
//        });

 //Radio button action for Chronic

        $('.chronic').on('change', function () {
            var chronicElement = $('input[name="drugs[status]"]:checked').val();
            toggleChronic(chronicElement);
        });

        function toggleChronic(chronicElement) {
            if(chronicElement == 1) {
                $('.note-chronic').show();
            } else {
                $('.note-chronic').hide();
            }

        }



        $(document).ready(function() {
            var feetElement = $("#feet");
            var cmElement = $("#centimeter");

            getHeightElement($('#height option:selected').val(), feetElement, cmElement);

            $("#height").change(function(){
                getHeightElement($('#height option:selected').val(), feetElement, cmElement);
            });

            var feverElement = $('input[name="hypertensive[status]"]:checked').val();
            toggleFever(feverElement);

            var hypertensiveElement = $('input[name="hypertensive[status]"]:checked').val();
            toggleHypertensive(hypertensiveElement);

            var allergicElement = $('input[name="allergic[status]"]:checked').val();
            toggleAllergic(allergicElement);

            var drugElement = $('input[name="drugs[status]"]:checked').val();
            toggleDrug(drugElement);

            var chronicElement = $('input[name="drugs[status]"]:checked').val();
            toggleChronic(chronicElement);
        });

        function getHeightElement(selectedValue, feetDiv, cmDiv) {
            if (selectedValue == "cm") {
                feetDiv.remove();
                $('.heightFeetToggle').append(cmDiv);
            }
            else if (selectedValue == "feet"){
                cmDiv.remove();
                $('.heightFeetToggle').append(feetDiv);
            }
            if(selectedValue == ""){
                feetDiv.remove();
                cmDiv.remove();
            }
        }

    </script>



@endsection
