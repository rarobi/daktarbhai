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
        padding-top: 7px;
        padding-right: 7px;
        position: absolute;
        right: 0;
        top: 0;
        display: none;
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
        background-color: #00d4a4 !important;
        background-image: none;
        font-size: 11px;
    }
    .email-verify{
        margin-left: 115px;
    }
    .profile-body {
        background-color: #F5F5F5;
    }
    a.profile-update-btn {
        color: #00d4a4;

    }
    .submit-email {
        background-color: #00d4a4;
        color:#fff;
    }
    .submit-email:hover {
        background-color: #fff;
        color: #00d4a4 !important;
        border-color: #00d4a4;
    }
    .email-field {
        background-color: #f5f5f5;
        padding: 30px;
    }
    .email-submit{
        padding-right: 0 !important;
    }
</style>

@section('main-content')

    <div class="phr-alert alert alert-success" id="verifyEmail" style="display: none">

    </div>
        <div class="bhoechie-tab-content active">
            <div class="col-md-12 ">
                <div class="user-profile" >
                    {{--<h2>{!! (isset($user->name) && ($user->name != ''))?$user->name:'<span class="text-info">(name not provided)</span>' !!} </h2><br>--}}

                    <div class="col-md-12 email-field">
                        {!! Form::open(['url'=>'verify/email','method'=>'post']) !!}
                        <div class="form-group">
                            {!! Form::label('email','Enter Your Email Here') !!}
                            {!! Form::text('email','',['class'=>'form-control', 'required'=> 'required']) !!}
                        </div>
                        <div class="form-group col-md-6 pull-right email-submit">
                            <button type="submit" class="btn btn-block submit-email">Verify</button>
                        </div>
                        {!! Form::close() !!}

                    </div>

                </div>
            </div>
        </div>

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

        function otpLogin(type) {

            $('#infoType').val(type);
            AccountKit.login(
                    'PHONE',
                    {countryCode: '+880', phoneNumber: ''}, // will use default values if not specified
                    loginCallback
            );
        }
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
@endsection
