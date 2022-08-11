@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'Profile update | ' . app_name()  !!}
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

    .profile-update .login-btn {
        margin-left: 10px;
        margin-top: 15px;
    }
</style>

@section('main-content')

    {{-- TODO: password field not updated. If we want to updated user's password, then need decision and also change "user profile update" Api in backend--}}
    <div class="bhoechie-tab-content active">
        <h3 class="profile-title">{{__('profile.update_profile')}}</h3>
        <div class="profile-update">
            <div class="login-form">
                {!! Form::model($user, ['route' => ['frontend.update-profile'], 'method' => 'POST','class' =>'form-horizontal login', 'data-parsley-validate']) !!}
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="name">{{__('profile.profile_update.name')}}:</label>
                    </div>
                    <div class="col-md-9">
                        {{ Form::text('name', old('name'), [ 'placeholder' => 'Name','id' => 'name','class' =>'form-control form-field', 'required' => 'required',
                                                             'data-parsley-required-message' => ' Name is required',
                                                             'data-parsley-trigger'          => 'change focusout',
                                                             'data-parsley-minlength'        => '2',
                                                             'data-parsley-maxlength'        => '32']) }}
                        @if ($errors->has('name'))
                            <span class="error-text filled">{!! $errors->first('name') !!}  </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="gender">{{__('profile.profile_update.gender')}}:</label>
                    </div>
                    <div class="col-md-9">
                        {{ Form::select('gender', ['' => 'select a  gender','male' => 'Male','female' => 'Female'] , old('gender'),
                            ['class' => 'form-control form-field']) }}
                        @if ($errors->has('gender'))
                            <span class="error-text filled">{!! $errors->first('gender') !!}  </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-2">
                        <label for="city">{{__('profile.profile_update.city')}}:</label>
                    </div>
                    <div class="col-md-9">
                        {{ Form::select('division_name', ['' => 'Select City','Dhaka' => 'Dhaka','Chittagong' => 'Chittagong','Barisal' => 'Barisal','Khulna' => 'Khulna','Rajshahi' => 'Rajshahi','Sylhet' => 'Sylhet'] , old('division_name'),
                        ['class' => 'form-control form-field']) }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="blood_group">{{__('profile.profile_update.blood_group')}}:</label>
                    </div>
                    <div class="col-md-9">
                        {{ Form::select('blood_group', ['' => 'Select blood group','O+' => 'O+','A+' => 'A+','B+' => 'B+','AB+' => 'AB+','O-' => 'O-','A-' => 'A-','B-' => 'B-','AB-' => 'AB-'] , old('blood_group'),
                        ['class' => 'form-control form-field']) }}
                        @if ($errors->has('blood_group'))
                            <span class="error-text filled">{!! $errors->first('blood_group') !!}  </span>
                        @endif
                    </div>
                </div>
                <div class="form-group profile-date">
                    <div class="col-md-2">
                        <label for="date_of_birth">{{__('profile.profile_update.dob')}}:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="date_of_birth" placeholder="Date of Birth" id="dateOfBirth" value="{!! $user->date_of_birth or '' !!}" class="form-control form-field birthDate">
                    </div>
                </div>
                <div class="form-group profile-date">
                    <div class="col-md-2">
                        <label for="date_of_birth">{{__('profile.mobile_number')}}:</label>
                    </div>
                    <div class="col-md-9">
                        @if(is_null($user->mobile))
                            <input placeholder="Mobile No." name="mobile" id="" class="form-control form-field" disabled>
                        @else
                            <input type="text" name="mobile" placeholder="Mobile" id="" value="{!! $user->mobile !!}" class="form-control" readonly>
                        @endif
                    </div>
                </div>
{{--                {!! dd($user) !!}--}}
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="nid">{{__('profile.profile_update.NID')}}:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" placeholder="National ID" name="nid" id="nid" class="form-control form-field" value="{!! $user->nid != null ? $user->nid : '' !!}">
                    </div>
                </div>
                <div class="form-group margin-bottom-small" >
                    <div class="col-md-2">
                        <label for="nid">{{__('profile.email')}}:</label>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                @if(is_null($user->email))
                                    <input type="email" placeholder="Email" name="email" id="" class="form-control form-field">
                                @else
                                    <input placeholder="Email" name="email" id="" class="form-control form-field" value="{!! $user->email or '' !!}" readonly>
                                @endif
                            </div>
                            <div class="col-md-3">
                                @if($user->is_password_set == false)
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="password" placeholder="Password" name="password" id="password" class="form-control form-field">
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="password" placeholder="Confirm Password" name="password" id="confirm-password" class="form-control form-field" value="">
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 col-md-offset-2">
                        <input  class="login-btn margin-left-null" value="{{__('profile.update_profile_btn')}}" type="submit">
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
