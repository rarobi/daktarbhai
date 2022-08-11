@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'Change Password | ' . app_name()  !!}
@endsection

@section('main-content')
    <div class="bhoechie-tab-content active">
        <h3 class="profile-title">{{__('profile.change_password.set_password')}}</h3>
        <div class="profile-update">
            <div class="login-form">
                {!! Form::model($user, ['route' => ['frontend.add-password'], 'method' => 'POST','class' =>'form-horizontal login', 'data-parsley-validate']) !!}
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="current_password ">{{__('profile.change_password.new_password')}} :</label>
                    </div>
                    <div class="col-md-9">
                        {!! Form::password('new_password', ['placeholder' => 'New Password',  'id' => 'newpassword', 'class' => 'form-control form-field',
                                                            'required' => 'required', 'data-parsley-required-message' => __('profile.change_password.validation_msg.new_password'),
                                                            'data-parsley-trigger'          => 'change focusout',
                                                            'data-parsley-minlength'        => '6',
                                                            'data-parsley-minlength-message'=> __('login.validation.min_length'),
                                                            'data-parsley-maxlength'        => '20']) !!}
                        @if ($errors->has('new_password'))
                            <span class="error-text filled">{!! $errors->first('new_password') !!}  </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="current_password ">{{__('profile.change_password.confirm_password')}} :</label>
                    </div>
                    <div class="col-md-9">
                        {!! Form::password('confirm_password', ['placeholder' => 'Confirm Password',  'id' => 'confirm_password', 'class' => 'form-control form-field',
                                                                'required' => 'required', 'data-parsley-required-message' => __('profile.change_password.validation_msg.confirm_password'),
                                                                'data-parsley-trigger'          => 'change focusout',
                                                                'data-parsley-equalto'          => '#newpassword',
                                                                'data-parsley-equalto-message'  => __('login.validation.not_match_password')]) !!}
                        @if ($errors->has('confirm_password'))
                            <span class="error-text filled">{!! $errors->first('confirm_password') !!}  </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 col-md-offset-8">
                        <input  class="login-btn" value="{{__('profile.change_password.set_password')}}" type="submit">
                    </div>
                    {{--<div class="col-md-12">--}}
                    {{--<input  class="login-btn" value="Add Password" type="submit">--}}
                    {{--</div>--}}
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
