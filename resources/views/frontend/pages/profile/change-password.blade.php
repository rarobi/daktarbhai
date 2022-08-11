@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'Change Password | ' . app_name()  !!}
@endsection

<style>

    .profile-update .login-form {
        background: none !important;
    }

    .login .form-field {
        border: 1px solid #36B7B4 !important;
        border-radius: 5px !important;
        height: 50px !important;
    }

    .form-control[readonly]{
        border: 1px solid #36B7B4 !important;
        border-radius: 5px !important;
        height: 50px !important;
    }

    .profile-update label {
        margin-top: 15px;
    }

</style>

@section('main-content')
    <div class="bhoechie-tab-content active">
        <h3 class="profile-title">{{__('profile.change_password.title')}}</h3>
        <div class="profile-update">
            <div class="login-form">
                {!! Form::model($user, ['route' => ['frontend.change-password'], 'method' => 'POST','class' =>'form-horizontal login', 'data-parsley-validate']) !!}
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="current_password ">{{__('profile.change_password.current_password')}} :</label>
                    </div>
                    <div class="col-md-9">
                        {!! Form::password('current_password', ['placeholder' => __('profile.change_password.current_password'),  'class' => 'form-control form-field',
                                                                'required' => 'required', 'data-parsley-required-message' => __('profile.change_password.validation_msg.current_password'),
                                                                'data-parsley-trigger'  => 'change focusout']) !!}
                        @if ($errors->has('current_password'))
                            <span class="error-text filled">{!! $errors->first('current_password') !!}  </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="new_password ">{{__('profile.change_password.new_password')}} :</label>
                    </div>
                    <div class="col-md-9">
                        {!! Form::password('new_password', ['placeholder' => __('profile.change_password.new_password'),  'id' => 'newpassword', 'class' => 'form-control form-field',
                                                            'required' => 'required', 'data-parsley-required-message' => __('profile.change_password.validation_msg.new_password'),
                                                            'data-parsley-trigger'          => 'change focusout',
                                                            'data-parsley-minlength'        => '6',
                                                            'data-parsley-maxlength'        => '20']) !!}
                        @if ($errors->has('new_password'))
                            <span class="error-text filled">{!! $errors->first('new_password') !!}  </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="confirm_password ">{{__('profile.change_password.confirm_password')}} :</label>
                    </div>
                    <div class="col-md-9">
                        {!! Form::password('confirm_password', ['placeholder' => __('profile.change_password.confirm_password'),  'id' => 'confirm_password', 'class' => 'form-control form-field',
                                                                'required' => 'required', 'data-parsley-required-message' =>__('profile.change_password.validation_msg.confirm_password') ,
                                                                'data-parsley-trigger'          => 'change focusout',
                                                                'data-parsley-equalto'          => '#newpassword',
                                                                'data-parsley-equalto-message'  => 'Not same as Password']) !!}
                        @if ($errors->has('confirm_password'))
                            <span class="error-text filled">{!! $errors->first('confirm_password') !!}  </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 col-md-offset-2">
                        <input  class="login-btn" value="{{__('profile.change_password.update_password')}}" type="submit">
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection

@push('after-scripts-end-stack')
    <script>
        var password = document.getElementById("newpassword")
            , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
@endpush
