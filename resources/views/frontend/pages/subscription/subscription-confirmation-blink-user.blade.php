@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'Subscription Confirmation | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('content')

<style>
    fieldset.scheduler-border {
        border: 1px solid #36B7B4 !important;
        padding: .5em .5em .5em .5em !important;
        margin: 0 0 1.5em 0 !important;
        -webkit-box-shadow:  0 0 0 0 #000;
        box-shadow:  0 0 0 0 #000;
        height: 60px;
    }

    legend.scheduler-border {
        font-size: .9em !important;
        font-weight: bold !important;
        text-align: left !important;
        width:auto;
        padding:0 5px;
        border-bottom:none;
    }
    .gender-radio label{
        float: left;
        margin-left: 0;
        padding-left: 15px;
    }

    .modal-content {
        margin-top: 120px;
        width: 600px;
        margin-left: 50px;
    }
    .modal-otp {
        height: 355px;
    }
    h5.modal-title {
        text-align: center;
    }
    .modal-body {
        height: 220px;
        padding:0px;
    }
    .modal_logo {
        width: 150px;
        height: auto;
        margin-left: 60px;
    }
    .form-group.mobile_box {
        margin-top: 35px;
    }
    .form-group.submit {
        margin-top: 25px;
    }
    .login-btn {
        border-radius: 4px;
        /*margin-left: 7px !important;*/
        margin-top: 10px; !important;
    }
    .modal-header .close {
        margin-top: -20px;
        color: #00d4a4;
        opacity: 1;
    }
    .otp_input {
        margin-top: 10px;
    }
    span#mobileErrMsg {
        font-size: 12px;
    }
    .error {
        margin-bottom: 0px;
    }
    .col-md-offset-3 {
        margin-left: 25%;
        margin-top: 14px;
    }
    .col-md-5.mobile {
        margin-top: 14px;
        margin-left: -27px;
    }
    .col-md-6.col-md-offset-3.otp_box {
        /*margin-top: -10px;*/
    }
    input.login-btn.otp_input {
        margin-left: 0px !important;
    }

    .otp_input_field{
        border: 1px solid darkgray !important;
    }
    .subscribe-btn {
        width: 100%;
        background: #36B7B4 !important;
        color: #fff !important;
    }

    .terms{
        color: #36B7B4 !important;
    }

    @media screen and (max-width: 450px) {
        .form-group.mobile_box {
            margin-top: 0px;
        }
        .form-group.submit {
            margin-top: 0px;
        }
        .modal_logo {
            margin-left: 45px;
        }
        .col-md-2 {
            width: 25.333333%;
            float: left;
            margin-left: 35px;
            margin-top: 0px !important;
        }
        .modal-content {
            margin-top: 120px;
            width: 340px;
            margin-left: 0px;
        }
        .modal_logo {
            height: auto;
            margin-left:0px;
        }
        input#mobile {
            width: 50%;
        }
        button#login-btn {
            margin-top: -25px;
        }
        button#login-btn {
            width: 50%;
            margin-left: 80px !important;
        }
        img.otp_logo {
            margin-left: 120px;
        }
        .col-md-8.col-md-offset-2 {
            margin-left: 0px;
            /* margin-top: -20px !important; */
        }
        .col-md-6.col-md-offset-3.otp_box {
            margin-left: 0px;
        }
        input.login-btn.otp_input {
            width: 91%;
            margin-left: 14px !important;
        }
</style>
    <!--  Page Content, class footer-fixed if footer is fixed  -->
    <div id="page-content" class="header-static footer-fixed">
        <div class="row">
{{--            <div id="home-wrap" class="content-section fullpage-wrap row">--}}
{{--                <div class="col-md-12 padding-leftright-null">--}}
{{--                    <!-- ————————————————————————————————————————————--}}
{{--                    ———	Contact Content Start here--}}
{{--                    —————————————————————————————————————————————— -->--}}
{{--                    <div class="row">--}}
{{--                        <section class="doctor page padding-md">--}}
{{--                            <div class="container">--}}
{{--                                <div class="text-center">--}}
{{--                                    <h3 class="grey big margin-bottom-small">Confirm Subscription</h3>--}}
{{--                                    <p class="heading grey text-center">Subscribe to Daktarbhai and take charge of your own health. Live a healthy and happy life.  </p>--}}
{{--                                    @if(isset($plan) && $plan == 'trial')--}}
{{--                                        <div class="col-md-12 padding-leftright-null trail-sub">--}}
{{--                                            <div class="row">--}}
{{--                                                <section id="pricing">--}}
{{--                                                    <div class="col-md-6 col-md-offset-3 price trial free padding-leftright-null">--}}
{{--                                                        <div class="price-header one">--}}
{{--                                                            <div class="icon-img trial">--}}
{{--                                                                <img class="trial" src="{!! asset('assets/img/trial.png') !!}" alt="">--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <ul>--}}
{{--                                                            <li>Your Phone Number : <strong>@if($user){!! isset($user->mobile)?$user->mobile:'<i>(not provided)</i>' !!}@endif</strong></li>--}}
{{--                                                            <li>Your Package : <strong>{!! 'Trial' !!}</strong></li>--}}
{{--                                                            <li>Payment Amount : <strong>{!! '0' !!} tk</strong></li>--}}
{{--                                                            <li>Subscription Duration : <strong>{!! 7 !!} days</strong></li>--}}
{{--                                                            <li class="tr-check">--}}
{{--                                                                <label><input id="checkbox" type="checkbox" > I have read and agreed to the Terms and Conditions</label>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                        <a class="btn-alt active shadow small margin-null" href="{!! route('frontend.subscription.purchase', ['trial'] ) !!}" id="subscribe">Get Free Trial</a>--}}
{{--                                                    </div>--}}
{{--                                                </section>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </section>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div id="home-wrap" class="content-section fullpage-wrap row dir-bg margin-bottom-small">
                <div class="col-md-12 padding-leftright-null">
                    <!-- ————————————————————————————————————————————
                    ———	Find Doctor Start here
                    —————————————————————————————————————————————— -->
                    <section class="health-directory-page doctor page padding-md doctor-pd" style="padding: 130px 0 100px 0 !important;">
                        <div class="container">
                            <div class="text-center package-header">
                                <h3 class="big margin-bottom-small">Subscription Form</h3>
                                <p class="heading margin-bottom text-center">
                                    {{__('packages.header_text')}}
                                </p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            @if(isset($plan) && $plan != 'trial')
                <div id="home-wrap" class="confirm-subscriptions content-section fullpage-wrap">
                    <section id="pricing">
                        <div class="col-md-8 col-md-offset-2 price active standard padding-leftright-null" style="border-top: #C4D9CA 1px solid">
                            @include('message')
                            <div class="price-title margin-bottom-small">Subscription Information</div>
{{--                            <span style="color: red">*</span> = Required Field--}}
                            {!! Form::open(['route'=>'frontend.subscription.blink', 'id' => 'make-payment-form','method'=>'post']) !!}
{{--                            {!! Form::open(['route'=>'frontend.subscription.blink.otp_generate', 'method'=>'post']) !!}--}}
                            {!! Form::hidden('plan_slug',$plan->plan_slug,['id'=>'plan_slug']) !!}
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Membership Id<span style="color: red">*</span></legend>
                                        <div class="control-group text-left {{$errors->has('membership_id')?'has-error':''}}">
                                            @if(isset($user->username))
                                                <span style="padding: 5px;">{{ $user->username }}</span>
                                                {!! Form::hidden('membership_id',$user->username,['id'=>'membership_id']) !!}
                                            @else
                                                {!! Form::text('membership_id','',['class'=>'form-control input-sm','id'=>'membership_id','placeholder'=>'Membership Id']) !!}
                                                {!!$errors->first('membership_id','<span class="help-block">:message</span>')!!}
                                            @endif
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-8 col-md-offset-2">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Customer Name<span style="color: red">*</span></legend>
                                        <div class="control-group text-left {{$errors->has('customer_name')?'has-error':''}}">
                                            @if(isset($user->name) && !empty($user->name))
                                                <span style="padding: 5px;">{{ ucfirst($user->name) }}</span>
                                                {!! Form::hidden('customer_name',$user->name, ['id'=>'customer_name']) !!}
                                            @else
                                                {!! Form::text('customer_name','',['class'=>'form-control input-sm','id'=>'customer_name','placeholder'=>'Customer Name']) !!}
                                                {!!$errors->first('customer_name','<span class="help-block">:message</span>')!!}
                                            @endif
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-8 col-md-offset-2">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Date Of Birth<span style="color: red">*</span></legend>
                                        <div class="control-group text-left {{$errors->has('date_of_birth')?'has-error':''}}">
                                            @if(isset($user->date_of_birth))
                                                <span style="padding: 5px;">{{ ucfirst($user->date_of_birth) }}</span>
                                                {!! Form::hidden('date_of_birth',$user->date_of_birth,['id'=>'birthDate']) !!}
                                            @else
                                                {!! Form::text('date_of_birth','',['class'=>'form-control input-sm','placeholder'=>'Date Of Birth','id'=>'birthDate','autocomplete'=>'off']) !!}
                                                {!!$errors->first('date_of_birth','<span class="help-block">:message</span>')!!}
                                            @endif
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-8 col-md-offset-2">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Gender<span style="color: red">*</span></legend>
                                        <div class="control-group text-left {{$errors->has('gender')?'has-error':''}}">
                                            @if(isset($user->gender))
                                                <span style="padding: 5px;">{{ ucfirst($user->gender) }}</span>
                                                {!! Form::hidden('gender',$user->gender,['id'=>'gender']) !!}
                                            @else
{{--                                            {!! Form::text('gender','',['class'=>'form-control input-sm','placeholder'=>'Gender']) !!}--}}
                                                <div class="gender-radio">
                                                    <label>{{ Form::radio('gender', 'male' , true,['id'=>'gender']) }} Male</label>
                                                    <label>{{ Form::radio('gender', 'female' , false,['id'=>'gender']) }} Female</label>
                                                    <label>{{ Form::radio('gender', 'other' , false,['id'=>'gender']) }} Other</label>
                                                </div>
                                            @endif
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-8 col-md-offset-2">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Mobile Number<span style="color: red">*</span></legend>
                                        <div class="control-group text-left {{$errors->has('mobile_number')?'has-error':''}}">
                                            @if(!empty($user->mobile))
                                                <span style="padding: 5px;">{{ $user->mobile }}</span>
                                                {!! Form::hidden('mobile_number',$user->mobile,['id'=>'mobile_no']) !!}
                                            @else
                                                {!! Form::text('mobile_number','',['class'=>'form-control input-sm','id'=>'mobile_no','placeholder'=>'Mobile Number']) !!}
                                                {!!$errors->first('mobile_number','<span class="help-block">:message</span>')!!}
                                            @endif
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-8 col-md-offset-2">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Nominee Name<span style="color: red">*</span></legend>
                                        <div class="control-group text-left {{$errors->has('nominee_name')?'has-error':''}}">
                                            @if($user->user_nominee_info)
                                                <span style="padding: 5px;">{{ ucfirst($user->user_nominee_info->nominee_name) }}</span>
                                                {!! Form::hidden('nominee_name',$user->user_nominee_info->nominee_name,['id'=>'nominee_name']) !!}
                                            @else
                                                {!! Form::text('nominee_name','',['class'=>'form-control input-sm required','id'=>'nominee_name','placeholder'=>'Nominee Name','required'=>'required']) !!}
                                                {!!$errors->first('nominee_name','<span class="help-block">:message</span>')!!}
                                            @endif
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-8 col-md-offset-2">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Nominee Relation <span style="color: red">*</span></legend>
                                        <div class="control-group text-left {{$errors->has('nominee_relation')?'has-error':''}}">
                                            @if($user->user_nominee_info)
                                                <span style="padding: 5px;">{{ ucfirst($user->user_nominee_info->relation) }}</span>
                                                {!! Form::hidden('nominee_relation',$user->user_nominee_info->relation,['id'=>'nominee_relation']) !!}
                                            @else
                                                {!! Form::select('nominee_relation',$nomineeRelations,'',['class'=>'form-control input-sm','id'=>'nominee_relation','placeholder'=>'Select one','required'=>'required']) !!}
                                                {!!$errors->first('nominee_relation','<span class="help-block">:message</span>')!!}
                                            @endif
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-8 col-md-offset-2 margin-bottom-small" >
                                    <label class="pull-left" style="margin-left: 0;"><input id="checkbox" type="checkbox" name="terms_condition" checked> I have read and agreed to the <a href="{!! route('frontend.terms') !!}" class="terms" target="_blank"><u>Terms and Conditions</u></a></label>
                                </div>
                                <div class="col-md-8 col-md-offset-2">
                                    <button type="submit" class="btn-alt active btn-lg btn-primary subscribe-btn">Subscribe </button>
{{--                                    <button type="submit" class="btn-alt active btn-lg btn-primary" data-toggle="modal" data-target="#otp_modal" href="#" id="subscribe">Subscribe </button>--}}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </section>
                </div>
            @elseif(!$plan)
                <div id="home-wrap" class="confirm-subscriptions content-section fullpage-wrap ">
                <div class="row">
                    <div class="col-md-12 padding-leftright-null">
                        <div class="col-md-8 col-md-offset-2 sucess-subscribe">
                            <div class="text padding-bottom-sm ">
                                <img src="{!! asset('assets/img/error.png') !!}">
                            </div>
                            <div>
                                <h1>{!! 'Subscription plan not found' !!}</h1>
                                <a href="{!! route('frontend.subscription.plan') !!}" class="btn-alt small active doc-btn">Subscription Plans</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        <!--OTP Modal -->
            <div class="modal fade" id="otp_modal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-otp">
                        <div class="modal-header">
                            <h5 class="modal-title">Enter OTP</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
{{--                            <form action="{{ route('frontend.otp_verify') }}" method="post">--}}
                                {!! Form::open(['route'=>'frontend.subscription.blink', 'id' => 'make-payment-form','method'=>'post']) !!}

                                <input id="mobile_number" name="mobile_number" type="hidden" value="">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-5">
                                        <img class="otp_logo" src="{!! asset('assets/img/ic_otp_vefification_.png') !!}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-2" style="margin-top:0px">
                                        <p>We have sent an OTP via SMS to {{isset($user->mobile) ? $user->mobile : ''}}</p>
                                        <span class="response_msg" style="color: red"></span>
                                    </div>
                                </div>
                            <br>
                                <div class="form-group mobile_box">
                                    <div class="col-md-6 col-md-offset-3 otp_box">
                                        <div class="col-md-12">
                                            <input class="form-control otp_input_field" type="number" name="otp"/>
                                        </div>

                                    </div>
                                </div>
                            {!! Form::hidden('mobile_number','',['id'=>'otp_mobile_number']) !!}
                            {!! Form::hidden('plan_slug','',['id'=>'otp_plan_slug']) !!}
                            {!! Form::hidden('membership_id','',['id'=>'otp_membership_id']) !!}
                            {!! Form::hidden('customer_name','',['id'=>'otp_customer_name']) !!}
                            {!! Form::hidden('date_of_birth','',['id'=>'otp_birth_date']) !!}
                            {!! Form::hidden('gender','',['id'=>'otp_gender']) !!}
                            {!! Form::hidden('nominee_name','',['id'=>'otp_nominee_name']) !!}
                            {!! Form::hidden('nominee_relation','',['id'=>'otp_nominee_relation']) !!}

                            <div class="form-group submit">
                                    <div class="col-md-4 col-md-offset-4">
                                        <button class="login-btn otp_input" type="submit">Submit</button>
                                    </div>
                                </div>
                                <div class="form-group submit">
                                    <div class="col-md-12 text-center" style="margin-top: 5px">
                                        <p>Didn't get OTP? <label id="resend" class="btn btn-warning btn-xs">Resend OTP</label></p>
                                        {{--<input id="resend" class="resend" data-toggle="modal" data-target="#otp_modal" value="Resend" type="submit">--}}
                                    </div>
                                </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <!--OTP Modal Close-->
        </div>
    </div>
@endsection

@section('after-scripts')
    <script>
        var isAgree = false;
        // var providerSelected = false;

        $("#checkbox").change(function() {
            if(this.checked) {
                isAgree = true;
            } else {
                isAgree = false;
            }
        });


        $(document).ready(function() {
            $('#subscribe').click(function(event) {
                // only required when user have to choose a provider
                event.preventDefault();
                if(!isAgree){
                        swal('Please accept the terms and condition!');
                        return false;
                }
            });

            $("#birthDate").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                changeMonth: true,
                changeYear:true,
                orientation: 'bottom',
                defaultDate: new Date(),
                maxDate: new Date('yyyy-mm-dd')
            });



            $("#make-payment-form").validate({
                rules: {
                    membership_id: "required",
                    customer_name: "required",
                    date_of_birth: "required",
                    gender: "required",
                    mobile_number: "required",
                    nominee_name: "required",
                    nominee_relation: "required"
                },
                errorPlacement: function() {
                    return false;
                }
            });

            var mobile = '+880'+{!! substr($user->mobile, -10, 10) !!};

            $('#subscribe').click(function(event) {
                event.preventDefault();

                var plan_slug = $('#plan_slug').val();
                var membership_id = $('#membership_id').val();
                var customer_name = $('#customer_name').val();
                var birth_date = $('#birthDate').val();
                var gender = $('#gender').val();
                var nominee_name = $('#nominee_name').val();
                var nominee_relation = $('#nominee_relation').val();

                $('#otp_mobile_number').val(mobile);
                $('#otp_plan_slug').val(plan_slug);
                $('#otp_membership_id').val(membership_id);
                $('#otp_customer_name').val(customer_name);
                $('#otp_birth_date').val(birth_date);
                $('#otp_gender').val(gender);
                $('#otp_nominee_name').val(nominee_name);
                $('#otp_nominee_relation').val(nominee_relation);

                $.ajax({
                    type: "POST",
                    url: "{{ url('subscription/blink/generate-otp') }}",
                    data: {
                        mobile:mobile
                    },
                    success: function(data){
                        // TODO:: otp input modal  open based on status code
                        console.log(data);
                    },
                    // error:function(e){
                    //     console.dir(e);
                    // }
                });
            });
            $('.otp_input').click(function() {
                var otp = $('.otp_input_field').val();
                if(otp == null || otp == ''){
                    // $('.otp_input_field').addClass('error');
                    swal('Please Enter Otp Number!');
                    return false;
                }
            });

            $('#resend').click(function() {
                $.ajax({
                    type: "POST",
                    url: "{{ url('subscription/blink/generate-otp') }}",
                    data: {
                        mobile:mobile
                    },
                    success: function(data){
                        console.dir(data);
                    },
                    error:function(e){
                        console.dir(e);
                    }
                });
                return false;
            });
        });

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js" type="text/javascript"></script>

@endsection
