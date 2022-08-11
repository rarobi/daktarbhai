
@extends('frontend.layouts.theme.master')

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
                <div class="col-md-6 col-md-offset-3">
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
                            Ask a Doctor and Get Answers from Real Doctors.
                        </h2>
                        @if(isset($id))
                            {!! Form::model($askquestion, ['route' => ['frontend.update-ask-doctor',$askquestion->id], 'method' => 'POST','id'=>'contact-form', 'class' => "question-form from-bg", 'data-parsley-validate', 'files' => true]) !!}
                        @else
                            {!! Form::open(['route'=>'frontend.post-ask-doctor','id'=>'contact-form', 'class' => "question-form from-bg", 'data-parsley-validate', 'method' => 'POST']) !!}
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::textarea('description', isset($askquestion) ? $askquestion->description : session('question_info')['description'], ['class' => 'form-field', 'id' => 'description', 'rows' => '4',
                                'placeholder' => "Explain your problem in detail. For e.g. My diabetes is very low , & I'm taking Linaglip once a day ( your question will be posted annonymously and answered within 24-48 hours. )",
                                'required' => 'required',
                                'data-parsley-required-message' => 'Please provide an input',
                                'data-parsley-trigger'          => 'change focusout',
                                'data-parsley-minlength'        => '40',
                                'data-parsley-maxlength'        => '1000',
                                'onkeyup' => 'countTextAreaChar(this, 1000)']) !!}

                                <p class="charNum"><span id="charNum"></span>/1000</p>
                                <div id="errorMessageShow" ></div>
                            </div>
                            <div class="col-md-12">
                                <select name="topics" class="form-field" id="topics" required>
                                    <option value="{!! isset(session('question_info')['topics']) ? session('question_info')['topics'] : '' !!}" selected="selected">  {!! isset(session('question_info')['topics']) && session('question_info')['topics'] != null ? session('question_info')['topics'] : 'select a topics' !!} </option>
                                    @foreach($topics as $topic)
                                        <option value="{!! $topic->title !!}" >{!! $topic->title or '' !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <p class="ask-gendar"><span>Gender :</span>
                                    @if(Cookie::has('_tn') && isset($logged_in_api_user) && ($logged_in_api_user->gender != null))
                                        @if($logged_in_api_user->gender == 'male' ||  isset($askquestion) ? $askquestion->user_gender == 'male' : null)

                                            <input type="radio" name="gender" id="male" value="male" checked>
                                            <label for="male">Male</label>

                                            <input type="radio" name="gender" id="female" value="female" >
                                            <label for="female">Female</label>

                                            <input type="radio" name="gender" id="other" value="other" >
                                            <label for="other">Other</label>

                                        @elseif ($logged_in_api_user->gender == 'female' || isset($askquestion) ? $askquestion->user_gender == 'female' : null)

                                            <input type="radio" name="gender" id="male" value="male" >
                                            <label for="male">Male</label>

                                            <input type="radio" name="gender" id="female" value="female" checked>
                                            <label for="female">Female</label>

                                            <input type="radio" name="gender" id="other" value="other" >
                                            <label for="other">Other</label>

                                        @else

                                            <input type="radio" name="gender" id="male" value="male" >
                                            <label for="male">Male</label>

                                            <input type="radio" name="gender" id="female" value="female" >
                                            <label for="female">Female</label>

                                            <input type="radio" name="gender" id="other" value="other" checked>
                                            <label for="other">Other</label>

                                        @endif
                                    @else

                                        <input type="radio" name="gender" id="male" value="male" checked>
                                        <label for="male">Male</label>

                                        <input type="radio" name="gender" id="female" value="female">
                                        <label for="female">Female</label>

                                        <input type="radio" name="gender" id="other" value="other">
                                        <label for="other">Other</label>

                                    @endif
                                </p>
                            </div>
                            <div class="col-md-12 user-age">
                                @if(Cookie::has('_tn') && isset($logged_in_api_user) && ($logged_in_api_user->age != null))
                                    {{--{!! $ageValue =  !!}--}}
                                    <input type="number" id="age" name="age" class="form-field" placeholder="Age" value="{!! isset($askquestion) ? $askquestion->user_age : $logged_in_api_user->ageValue !!}" required>
                                @else
                                    <input type="number" id="age" name="age" value="{!! isset($askquestion) ? $askquestion->user_age : null !!}" class="form-field" placeholder="Age" required>
                                @endif

                            </div>
                            {{--<div class="col-md-12 make-private">--}}
                            {{--<input type="checkbox" data-modal="#modal" id="is_private" class="popup" name="is_private" value="1"--}}
                            {{--@if(isset(session('question_info')['is_private']) && session('question_info')['is_private'] == 1) checked @endif>--}}
                            {{--<label for="six">Make it Private</label>--}}
                            {{--</div>--}}

                            <div class="col-md-12 make-private">
                                <input class="ask-doctor-button login-btn shadow" value="Ask a Doctor" type="submit">

                                {{--@if(isset($logged_in_api_user))
                                <button id="#" class="ask-login login-btn shadow">Ask a Doctor</button>
                                --}}{{--@if($logged_in_api_user->is_subscribed && $logged_in_api_user->is_premium)
                                --}}{{----}}{{--{!! Form::submit('Submit',['class' => 'login-btn']) !!}--}}{{----}}{{--
                                <button id="#" class="ask-login login-btn shadow">Ask a Doctor</button>
                                @else
                                <a class="ask-login login-btn shadow text-center"  data-toggle="modal" data-target="#primiummodal">Subscribe Now </a>
                                <div class="primium-modal health-tips-modal modal fade" id="primiummodal" tabindex="-1" role="dialog" aria-labelledby="tipsmodalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="ion-close-round"></i></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>To enjoy this feature you have to enable one of our subscriptions plan.</p><br>

                                                {{ Html::link('subscription/plan','Subscriptions Plan',['class'=>'btn-alt active shadow small margin-null purchase-plan']) }}
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                @endif--}}{{--
                                @else
                                <a class=" login-btn shadow text-center btn-lg login-btn purchase-plan"  data-toggle="modal" data-target="#primiummodal">Subscribe Now </a>
                                <div class="primium-modal health-tips-modal modal fade" id="primiummodal" tabindex="-1" role="dialog" aria-labelledby="tipsmodalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="ion-close-round"></i></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>To enjoy this feature you have to enable one of our subscriptions plan.</p><br>

                                                {{ Html::link('subscription/plan','Subscriptions Plan',['class'=>'btn-alt active shadow small margin-null purchase-plan']) }}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endif--}}

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
                        <h1 class="text-center">How it Works</h1>
                        <div class="col-md-4">
                            <div class="margin-md-bottom text-center">
                                <img src="{!! asset('assets/img/ask-a-questions-icon.png') !!}" width="75px" alt="Search">
                                <h6 class="heading  margin-bottom-extrasmall">Explain your health concern</h6>
                                <p>You can write about any of your health related queries in details, and not hold back.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="margin-md-bottom text-center">
                                <img src="{!! asset('assets/img/appointment.png') !!}" width="75px" alt="Book">
                                <h6 class="heading  margin-bottom-extrasmall">Answered by certified doctors</h6>
                                <p>You will get your answer within 48 hours by a certified doctor.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="margin-md-bottom text-center">
                                <img src="{!! asset('assets/img/medical-advice.png') !!}" width="75px" alt="Get Well Soon">
                                <h6 class="heading  margin-bottom-extrasmall">Quick Response of health query</h6>
                                <p>As soon as the doctor replies your query, you will be notified through Email.</p>
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
//                        console.log(response);
                        if(response.error == "sign-in") {
                            $(".ask-doc-login").fadeIn();
                            $(".ask-close").click(function(){
                                $(".ask-doc-login-out").fadeOut();
                                $('.ask-doctor-button').prop('disabled', false);
                            });
                        }
                        else if(response.submit == '1') {
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
                                $('.ask-doctor-button').prop('disabled', false);
                            });
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

    </script>


@endsection