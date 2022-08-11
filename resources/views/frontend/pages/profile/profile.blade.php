@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'Profile | ' . app_name()  !!}
@endsection

<style>
    .profile-images {
        position: relative;
        display: inline-block;
    }

    .profile-images:hover .edit {
        display: block;
    }

    .edit {
        padding-top: 5px;
        padding-right: 7px;
        position: absolute;
        right: 0;
        top: 0;
        /*display: none;*/
    }

    .fa.fa-camera.fa-2x:hover{
        cursor:pointer;
    }
    .progress{
        margin-bottom: 0 !important;
    }

    #submit-button {
        background: #43e696;
        color: #fff;
        border: 0;
        width: 100%;
        font-size: 14px;
        padding: 5px;
        font-weight: 500;
        margin-top: 10px;
    }
    .verify-btn.btn.btn-success{
        padding: 2px 5px;
        border-radius: 0;
        background-color: #36B7B4 !important;
        background-image: none;
        border-color: #36B7B4 !important;
        font-size: 12px;
    }
    .email-verify{
        margin-left: 115px;
    }
    .profile-body {
        background-color: #F5F5F5;
    }
    a.profile-update-btn {
        /*color: #00d4a4;*/
    }

    .fa-2x {
        font-size: 2em;
        position: absolute;
        right: 20px;
        top: 10px;

    }

    .country-code select {
        width: 100%;
        border-radius: 0;
        border: 1px solid #fff;
        line-height: 16px;
        margin: 0 0 15px 0;
        background: #fff;
        padding: 7px 6px;
    }
    .fa.fa-mobile {
        font-size: 25px;
        margin-top: 5px;
        margin-right: 5px;

    }
    .login-btn{

        line-height: 40px;
    }
    .for-pass {
        color: #00d4a4;
    }
    .login-card {
        margin-bottom: 50px;
    }
    a#reg {
        font-size: 12px;
    }
    a#Log {
        font-size: 12px;
    }

    .modal-content {
        margin-top: 120px;
        width: 550px;
        margin-left: 50px;
    }
    .modal-header {
        padding: 5px;
    }
    .modal-otp {
        height: 375px;
    }
    .modal-email-verify {
        height: 459px;
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
        /*height: 36px;*/
        background-color: #43e696 !important;
        color: white;
        border-radius: 4px;
        margin-left: 7px !important;
        margin-top: 10px; !important;
    }
    .modal-header .close {
        margin-top: -20px !important;
        color: #FF0000;
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
        margin-top: -10px;
    }
    input.login-btn.otp_input {
        margin-left: 0px !important;
    }
    input.code {
        border: 1px solid gray !important;
    }
    .modal-body {
         padding: 0px !important;
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
        input#login-btn {
            margin-top: -25px;
        }
        input#login-btn {
            width: 50%;
            margin-left: 80px !important;
        }
        img.otp_logo {
            margin-left: 120px;
        }
        .col-md-8.col-md-offset-2 {
            margin-left: 0px;
            margin-top: -20px !important;
        }
        .col-md-6.col-md-offset-3.otp_box {
            margin-left: 0px;
        }
        input.login-btn.otp_input {
            width: 91%;
            margin-left: 14px !important;
        }

    }
</style>

@section('main-content')

{{--    <div class="phr-alert alert alert-success" id="verifyEmail" style="display: none">--}}

{{--    </div>--}}
        <div class="bhoechie-tab-content profile-info active">
            {{--<div class="col-md-12">--}}
                <div class="user-profile">
                    <div class="">
                        <h3 class="profile-title">{!! (isset($user->name) && ($user->name != ''))?$user->name:'<span class="text-info">(name not provided)</span>' !!} </h3>
                        <a href="{{ url('profile/edit') }}" class="profile-update-btn"> <span class="ion-ios-compose-outline"></span> {{__('profile.update_profile')}}</a>
                    </div>

                    <div class="user-info">
                        <div class="col-md-9">
                            <p><span>{{__('profile.gender')}}</span> :&nbsp; {!! isset($user->gender)?ucfirst($user->gender) :__('profile.msg') !!}</p>
                            <p><span>{{__('profile.age')}}</span> : &nbsp;{!! isset($user->age)?$user->age :__('profile.msg') !!} </p>
                            <p><span>{{__('profile.membership_id')}}</span> :&nbsp; {!! isset($user->username)?$user->username :__('profile.msg') !!} </p>
                            <p><span>{{__('profile.birth_date')}}</span> : &nbsp;{!! isset($user->date_of_birth)?$user->date_of_birth :__('profile.msg') !!} </p>
                            <p><span>{{__('profile.city')}}</span> : &nbsp;{!! isset($user->division_name)?$user->division_name :__('profile.msg') !!}</p>
                            {{--<p><span>Mobile Number</span> : &nbsp;{!! isset($user->mobile)?$user->mobile :'<button class="btn btn-success account-kit" onclick="otpLogin();">Verify</button>' !!}--}}
                            <p><span>{{__('profile.mobile_number')}}</span> : &nbsp;
                                @if(isset($user->mobile ) && !is_null($user->mobile) && $user->mobile !='')
                                    @if($user->mobile_verified)
                                        {!! $user->mobile !!} &nbsp;&nbsp;<span style="color: #36B7B4;" ><i class="ion-checkmark-circled"></i> {{__('profile.verified')}} </span>
                                    @else
                                        {{--{!! $user->mobile !!} &nbsp;<button class="verify-btn btn btn-success account-kit" onclick="otpLogin('verify');">{{__('profile.verify_mobile')}}</button>--}}
                                       <span id="user_mobile" style="color:#36B7B4;"> {!! $user->mobile !!} </span> &nbsp;<button id="verify_mobile" class="verify-btn btn btn-success account-kit" data-toggle="modal" data-target="#otp_modal">{{__('profile.verify_mobile')}}</button>
                                    @endif
                                @else
                                    {{--<button class="verify-btn btn btn-success account-kit" onclick="otpLogin('add');"><i class="ion-plus"></i> {{__('profile.add_mobile')}}</button>--}}
                                    <button class="verify-btn btn btn-success account-kit" data-toggle="modal" data-target="#login_modal"><i class="ion-plus"></i> {{__('profile.add_mobile')}}</button>
                                @endif
                            </p>
                            {{--<p><span>Email</span> : &nbsp;{!! isset($user->email)?$user->email :__('profile.msg') !!}</p>--}}
                            <p><span>{{__('profile.email')}}</span> : &nbsp;
                                @if(isset($user->email) && !is_null($user->email) && !empty($user->email))
                                    @if($user->email_verified)
                                        {!! $user->email !!} &nbsp;<span style="color: #36B7B4;"> <i class="ion-checkmark-circled "></i>{{__('profile.verified')}} </span>
                                    @else
                                        {!! $user->email !!}<button class="verify-btn btn btn-success account-kit email-verify"  onclick="verifyEmailAddress();"> <i class="ion-checkmark-round"></i> {{__('profile.verify_email')}}</button>
                                    @endif
                                @else
                                    {{--<button class="btn btn-success account-kit" onclick="addEmailAddress();">Add Email Address</button>--}}
                                    {{--<a href="{{ route('frontend.add.email') }}" class="">--}}
                                        {{--<button class="verify-btn btn btn-success add-email" ><i class="ion-plus"></i>  {{__('profile.add_email')}}</button>--}}
                                        <button class="verify-btn btn btn-success add-email" data-toggle="modal" data-target="#email_modal"><i class="ion-plus"></i>  {{__('profile.add_email')}}</button>
                                    {{--</a>--}}
                                @endif
                            </p>

                            <p><span>{{__('profile.blood_type')}}</span> : &nbsp;{!! isset($user->blood_group)?strtoupper($user->blood_group) :__('profile.msg') !!}</p>
                            <p><span>{{__('profile.national_id')}}</span> : &nbsp;{!! isset($user->nid)?$user->nid :__('profile.msg') !!}</p>

                            @if($user->user_nominee_info)
                                <p><span>{{__('profile.nominee_name')}}</span> : &nbsp;{!! isset($user->user_nominee_info)?ucwords($user->user_nominee_info->nominee_name) :__('profile.msg') !!}</p>
                                <p><span>{{__('profile.nominee_relation')}}</span> : &nbsp;{!! isset($user->user_nominee_info)?ucwords($user->user_nominee_info->relation) :__('profile.msg') !!}</p>
                            @endif

                        </div>

                        <div class="col-md-3">
                            <div class="profile-images center-block">
                                <form id="uploadimage" method="post"  enctype="multipart/form-data">
                                    <!-- TODO: Need to change the Image URL -->
                                    <img src="{{  asset('assets/img/user.png') }}" class="img-responsive img-center thumbnail-image">
                                    <div class="edit">
                                        <label for="user-profile-image">
                                            <input type="file" name="image_path" class="file thumbnail-file" id="user-profile-image" accept="image/*" style="display: none;">
                                            <i class="fa fa-camera fa-2x highlighted" title="Change your image"></i>
                                        </label>
                                    </div>
                                    <input type="submit" value="Submit" id="submit-button" style="display: none;">

                                    <div id="progress" class="progress" style="display: none;">
                                        <div class="progress-bar progress-bar-success"></div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            {{--</div>--}}
        </div>

    <!--First Modal -->
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="modal fade" id="login_modal" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Enter Your Mobile</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <img class="modal_logo" src="{!! asset('assets/img/daktarbhai_logo.png') !!}">
                                    </div>
                                </div><br>
                                <form action="{{ route('frontend.otp_generate') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group mobile_box">
                                        <div class="col-md-2 col-md-offset-3" style="margin-top: 40px" >
                                            {{--<span class="input-group-addon" id="basic-addon1">+88 </span>--}}
                                            <input  class="code" type="text" value="+88" class="form-control" disabled style="padding: 4px 10px">

                                        </div>
                                        <div class="col-md-5 mobile" style="margin-top: 40px">
                                            <input type="text" id="mobile" name="mobile" class="form-control code" placeholder="Mobile (Ex.01431234567)" required/>
                                            <span class="text-danger" id="mobileErrMsg"></span>
                                        </div>
                                    </div><br><br>
                                    <div class="form-group submit">
                                        <div class="col-md-4 col-md-offset-4">
                                            <input   id="login-btn" class="login-btn" data-toggle="modal" data-target="#otp_modal" value="NEXT" type="submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{--<div class="modal-footer">--}}
                            {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                            {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>

        </div>
    </div>
    <!--First Modal Close-->

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
                    <form action="{{ route('frontend.mobile-otp-verify') }}" method="post">
                        <input id="mobile_number" name="mobile_number" type="hidden" value="">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-5">
                                <img class="otp_logo" src="{!! asset('assets/img/ic_otp_vefification_.png') !!}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2" style="margin-top:0px">
                                <p>We have sent an OTP via SMS to <span id="showMobile"></span></p>
                            </div>
                        </div>
                        <div class="form-group mobile_box">
                            <div class="col-md-6 col-md-offset-3 otp_box">
                                <div class="col-md-12">
                                    <input class="form-control otp_input_field code" type="text" name="otp"/>
                                </div>

                            </div>
                        </div>
                        <div class="form-group submit">
                            <div class="col-md-4 col-md-offset-4">
                                <input  class="login-btn otp_input" value="Submit" type="submit">
                            </div>
                        </div>
                        <div class="form-group submit">
                            <div class="col-md-12 text-center" style="margin-top: 5px">
                                <p>Didn't get OTP? <label id="resend" class="btn btn-warning btn-xs">Resend OTP</label></p>
                                {{--<input id="resend" class="resend" data-toggle="modal" data-target="#otp_modal" value="Resend" type="submit">--}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--First Modal Close-->

    <!--Modal for Email -->
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="modal fade" id="email_modal" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Enter Your Email </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <img class="modal_logo" src="{!! asset('assets/img/daktarbhai_logo.png') !!}">
                                    </div>
                                </div><br>
                                <form action="" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group mobile_box">
                                        <div class="col-md-7 col-md-offset-3" style="margin-top: 40px" >
                                            <input id="email" class="code" type="email" name="email" class="form-control" placeholder="Enter a valid email" required="required">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3 text-danger" id="duplicate_email_error">

                                        </div>
                                    </div>
                                    <div class="form-group submit">
                                        <div class="col-md-4 col-md-offset-4">
                                            <input   id="email-btn" class="login-btn" value="Verify" type="submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{--<div class="modal-footer">--}}
                            {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                            {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>

        </div>
    </div>
    <!--Modal Close-->

    <!--Modal for Email -->
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="modal fade" id="change_password" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content modal-email-verify">
                            <div class="modal-header">
                                <h5 class="modal-title">Verify Email With OTP</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="padding: -1px;">
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <img class="modal_logo" src="{!! asset('assets/img/daktarbhai_logo.png') !!}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3 text-danger" id="email_validation_error">

                                    </div>
                                </div>
                                <form action="" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group mobile_box">
                                        <div class="col-md-7 col-md-offset-3">
                                            {{--<span class="input-group-addon" id="basic-addon1">+88 </span>--}}
                                            <input id="verification_code" class="code" type="text" name="email_verification_code" class="form-control" placeholder="Enter your varification code" required="required"><br>
                                            <input id="verify_email" class="code" type="email" name="email" class="form-control" value="" disabled><br>
                                            <input id="password" class="code" type="password" name="new_password" class="form-control" placeholder="Enter a password" required="required"><br>
                                            <input id="confirm_password" class="code" type="password" name="confirm_password" class="form-control" placeholder="Confirm password" required="required">
                                            <span id='message'></span>
                                        </div>
                                    </div>
                                    <div class="form-group submit">
                                        <div class="col-md-4 col-md-offset-4">
                                            <input   id="verify-btn" class="login-btn" value="Verify" type="submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{--<div class="modal-footer">--}}
                            {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                            {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>

        </div>
    </div>
    <!--Modal Close-->

    <form id="login_success" style="display: none" method="post" action="{{ route('frontend.mobile.verification') }}">
            <input id="csrf" type="hidden" name="csrf" />
            <input id="csrf_token" value="{{ csrf_token() }}" type="hidden" name="_token" />
            <input id="code" type="hidden" name="code" />
            <input id="infoType" type="hidden" name="mbl_verification" />

        </form>

@endsection

@section('header-scripts')
    <!-- HTTPS required. HTTP will give a 403 forbidden response -->
    <script src="https://sdk.accountkit.com/en_US/sdk.js"></script>
@stop

@section('after-scripts')
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

        // OTP with facebook kit
//        function otpLogin(type) {
//
//            $('#infoType').val(type);
//            AccountKit.login(
//                    'PHONE',
//                    {countryCode: '+880', phoneNumber: ''}, // will use default values if not specified
//                    loginCallback
//            );
//        }

    </script>

    <script type="text/javascript" >

        $('.thumbnail-file').change(function () {
            readURL(this);
            $('#submit-button').show();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.thumbnail-image')
                        .attr('src', e.target.result)
                        .width(220)
                        .height(220);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        var URL = "{{ route('frontend.profile.change-image') }}";
        $("#uploadimage").on('submit', (function (e) {
            e.preventDefault();
            $.ajax({
                url: URL,
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $('#submit-button').hide();
                    $('#progress').show();
                    var progress = parseInt(100, 0);
                    $('#progress .progress-bar').css('width', progress + '%');

                   $('#progress').delay(800).queue(function(n) {
                      $(this).fadeOut(); n();
                   });
                }
            });
        }));

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
    {{--<script>--}}
        {{--$(document).ready(function(){--}}
            {{--$('#success-alert').fadeIn().delay(5000).fadeOut();--}}
        {{--});--}}
    {{--</script>--}}

    <script>
        function addEmailAddress(){
            //profile.verify.email

            var getEmailValidation    =   $.post('{!! route("frontend.pre.email.validation") !!}',{ email: reqEmail, '_token': '{!! csrf_token() !!}' } );
            getEmailValidation.done(function(data){

                if(data == true) {
                    $('.email-exist').text('');
                    document.getElementById("registerUser").submit();
                } else {
                    $('.email-exist').text('User already exists with this email');
                }
            });
        }

        function verifyEmailAddress(){
            //profile.verify.email

            var sentEmailVerifyLink    =   $.get('{!! route("frontend.profile.verify.email") !!}');
            sentEmailVerifyLink.done(function(data){
                console.log(data);
                    $('#verifyEmail').css('display','visible');
                    $('#verifyEmail').append('<p style="color: green; height: 15px; font-weight: bolder">'+data.msg+'</p>');
                $('#verifyEmail').fadeIn().delay(4000).fadeOut();

            });
            sentEmailVerifyLink.fail(function(){
                $('#verifyEmail').css('display','visible');
                $('#verifyEmail').append('<p style="color: green; height: 15px; font-weight: bolder">'+data.msg+'</p>');
                $('#verifyEmail').fadeIn().delay(4000).fadeOut();
            });
            $('#verifyEmail').empty();
        }
    </script>

    <script>

        // OTP send for mobile number verification by using modal

//        var btn = {
//            btn1: '#login-btn',
//            btn2: '#verify_mobile'
//        };
        var mobile = '';
        $('#login-btn').click(function(event) {
            event.preventDefault();

            mobile = $('#mobile').val();
//            console.log(mobile);
            if(mobile==null || mobile == ''){
                $('#mobile').addClass('error');
                return false;
            }

            $('#mobileErrMsg').html('');
            var mobileValidation = mobile.match(/(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/ig);
            if(mobileValidation == null){
                $('#mobileErrMsg').html('Please provide valid number');
                return false;
            }

            $.ajax({
                type: "POST",
                url: "{{ url('add-mobile') }}",
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

            $('#mobile_number').val(mobile);
            $('#showMobile').html(mobile);
            $('#login_modal').modal('hide');
        });

        $('.otp_input').click(function() {
            var otp = $('.otp_input_field').val();
            if(otp == null || otp == ''){
                $('.otp_input_field').addClass('error');
                return false;
            }
        });

        // Resend OTP for mobile number verification by using modal

        $('#resend').click(function() {
            $.ajax({
                type: "POST",
                url: "{{ url('add-mobile') }}",
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

        // OTP send for mobile number verification if number is not verified yet by using modal

        $('#verify_mobile').click(function(event) {
            event.preventDefault();

            mobile = $('#user_mobile').html();
//            alert(mobile);
            $.ajax({
                type: "POST",
                url: "{{ url('add-mobile') }}",
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
            $('#mobile_number').val(mobile);
            $('#showMobile').html(mobile);
        });

        // OTP send for email varification by using modal

        var email = '';
        $('#email-btn').click(function(event) {
            event.preventDefault();

           var email = $('#email').val();
            $.ajax({
                type: "POST",
                url: "{{ url('verify/email') }}",
                data: {
                    email:email
                },
                success: function(data){
                    console.dir(data);
                    if(data.status_code == 200){
                        $('#email_modal').modal('hide');
                        $('#change_password').modal('show');
                        $('#verify_email').val(email);

                    } else{
                        $('#duplicate_email_error').html(data.message);
                    }
                    return false;
                },
                error:function(e){
                    console.log(e);
                }
            });

        });

        // confirm password check in modal
        $('#password, #confirm_password').on('keyup', function () {
            if ($('#password').val() == $('#confirm_password').val()) {
                $('#message').html('Matching').css('color', 'green');
            } else
                $('#message').html('Not Matching').css('color', 'red');
        });

        // OTP verification check for email by using modal

        var code = '';
        var password = '';
        $('#verify-btn').click(function(event) {
            event.preventDefault();

           var verificationCode = $('#verification_code').val();
           var email = $('#verify_email').val();
           var password = $('#password').val();
           var confirm_password = $('#confirm_password').val();
            $.ajax({
                type: "POST",
                url: "{{ url('update/email-password') }}",
                data: {
                    email_verification_code:verificationCode,
                    email:email,
                    new_password:password,
                    confirm_password:confirm_password
                },
                success: function(data){
                    console.dir(data);
                    if(data.status_code == 200){
                        $('#change_password').modal('hide');
                         window.location.href = "/profile";

                    } else{
                        $('#email_validation_error').html(data.message);
                    }
                    return false;
                },
                error:function(e){
                    console.log(e);
                }
            });

        });

    </script>
@endsection
