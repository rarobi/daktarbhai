<div class="claim-from">
    <div class="col-md-12 padding-leftright-null" style="box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);">
        <div class="claim-info">
            @if(!(isset($user->name)) || $user->name == null || !(isset($user->date_of_birth)))
                <div class="profile-complete">
                    <p>{{ $complete_profile_message }}</p>
                    <a href="{{ route('frontend.profile') }}">{{__('claim_insurance.form.msg_1')}}</a>
                </div>
            @elseif(count($user_subscriptions) == 0)
                <div class="profile-complete">
                    <p>{{ $subscription_package_message }}</p>
                    <a href="{{ route('frontend.subscription.plan') }}">{{__('claim_insurance.form.msg_2')}}</a>
                </div>
            @endif
            <div class="login-form">
                <div class="col-md-12">
                    <h6 class="claim-title">
                        <strong>{{__('claim_insurance.form.title_1')}}
                            {{--Insurance Information--}}
                        </strong>
                    </h6>
                    <hr>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="insurance_type">{{__('claim_insurance.form.label_1')}}
                            {{--Insurance Type--}}
                        </label>
                        {!! Form::select('insurance_type', $insurance_type, null, ['class' => 'form-control', 'id' => 'insurance_type', 'onchange' => 'selectInsurance(this)' ]) !!}
                    </div>
                </div>
                <div class="col-md-12">
                    <h6 class="claim-title"><strong>{{__('claim_insurance.form.title_2')}}
                            {{--Claimer Information--}}
                        </strong></h6>
                    <hr>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="claimer_name">{{__('claim_insurance.form.label_2')}}
                            {{--Full Name--}}
                        </label>
                        {!! Form::text('claimer_name', (isset($user->name) ? $user->name : old('claimer_name')), ['class' =>'form-control form-field', 'id' => 'claimer_name', 'placeholder' => __('claim_insurance.form.placeholder_1'), 'readonly' => 'true']) !!}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group profile-date">
                        <label for="claimer_age_in_years">{{__('claim_insurance.form.label_3')}}
                            {{--Age--}}
                        </label>
                        <div class="input-group">
                            {!! Form::number('claimer_age_in_years', (isset($claimer_age_in_years) ? $claimer_age_in_years : '') , ['class' => 'claimer_age_in_years form-control form-field',  'id' => 'claimer_age_in_years', 'placeholder' =>__('claim_insurance.form.placeholder_2'), 'readonly' => 'true'])!!}
                            <div class="input-group-addon">{{__('claim_insurance.form.unit_1')}}
                                {{--years--}}
                            </div>
                            @if(isset($user->date_of_birth))
                                {{ Form::hidden('claimer_date_of_birth', $user->date_of_birth) }}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="claimer_phone">{{__('claim_insurance.form.label_4')}}
                            {{--Phone--}}
                        </label>
                        {!! Form::text('claimer_phone', (isset($user->mobile) ? $user->mobile : ''), ['class' =>'form-control form-field', 'id' => 'claimer_phone', 'placeholder' =>  __('claim_insurance.form.placeholder_3'), 'onkeypress' => 'validate(event)' ]) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="claimer_gender">{{__('claim_insurance.form.label_5')}}
                        {{--Gender--}}
                    </label>
                    <div class="form-group">
                        {!! Form::radio('claimer_gender', 'male', isset($user->gender)? $user->gender == 'male' : false) !!} {{__('claim_insurance.form.label_6')}}
                        {{--Male--}}
                        {!! Form::radio('claimer_gender', 'female', isset($user->gender)? $user->gender == 'female' : false) !!}{{__('claim_insurance.form.label_7')}}
                        {{--Female--}}
                    </div>
                </div>
                <div id="hospitalInfo">
                    <div class="col-md-12">
                        <h6 class="claim-title"><strong>{{__('claim_insurance.form.title_3')}}
                                {{--Hospital Information--}}
                            </strong></h6>
                        <hr>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="hospital_name">{{__('claim_insurance.form.label_8')}}
                                {{--Hospital Name--}}
                            </label>
                            {!! Form::text('hospital_name', old('hospital_name'), ['class' =>'form-control form-field', 'id' => 'hospital_name', 'placeholder' =>  __('claim_insurance.form.placeholder_4') ]) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group profile-date">
                            <label for="admission_date">{{__('claim_insurance.form.label_9')}}
                                {{--Admission Date--}}
                            </label>
                            {!! Form::text('admission_date', old('admission_date'), ['class' =>'datepicker form-control form-field', 'id' => 'datepicker', 'placeholder' => __('claim_insurance.form.label_9')]) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group profile-date">
                            <label for="discharge_date">{{__('claim_insurance.form.label_10')}}
                                {{--Discharge Date--}}
                            </label>
                            {!! Form::text('discharge_date', old('discharge_date'), ['class' =>'datepicker form-control form-field', 'id' => 'datepicker', 'placeholder' => __('claim_insurance.form.label_10')]) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h6 class="claim-title"><strong>{{__('claim_insurance.form.title_4')}}
                            {{--Payment Information--}}
                        </strong></h6>
                    <hr>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="payment_method">{{__('claim_insurance.form.label_11')}}
                            {{--Payment Method--}}
                        </label>
                        {!! Form::select('payment_method', ['' => 'Select One', 'BKASH' => 'bKash', 'ROCKET' => 'Rocket',
                        'BANK_TRANSFER' => 'Bank Transfer'], null, ['class' => 'form-control', 'id' => 'payment_method', 'onchange' => 'selectPaymentMethod(this)' ]) !!}
                    </div>
                </div>
                <div class="col-md-6" id="payment_number">
                    <div class="form-group">
                        <label for="payment_number">{{__('claim_insurance.form.label_12')}}
                            {{--Payment Number--}}
                        </label>
                        {!! Form::text('payment_number', old('payment_number'), ['class' =>'form-control form-field', 'id' => 'payment_number', 'placeholder' => __('claim_insurance.form.label_12'), 'onkeypress' => 'validate(event)' ]) !!}
                    </div>
                </div>

                <div id="bankInfo">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bank_acc_holder_name">{{__('claim_insurance.form.label_13')}}
                                {{--Account Holder Name--}}
                            </label>
                            {!! Form::text('bank_acc_holder_name', old('bank_acc_holder_name'), ['class' =>'form-control form-field bank_acc_holder_name', 'placeholder' => __('claim_insurance.form.placeholder_5') ]) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="bank_name">{{__('claim_insurance.form.label_14')}}
                                {{--Bank Name--}}
                            </label>
                            {!! Form::text('bank_name', old('bank_name'), ['class' =>'form-control form-field bank_name', 'placeholder' => __('claim_insurance.form.placeholder_6')]) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="bank_acc_branch">{{__('claim_insurance.form.branch_name')}}
                                {{--Bank Name--}}
                            </label>
                            {!! Form::text('bank_acc_branch', old('bank_acc_branch'), ['class' =>'form-control form-field bank_acc_branch', 'placeholder' => __('claim_insurance.form.placeholder_bank_branch')]) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="bank_acc_no">{{__('claim_insurance.form.label_15')}}
                                {{--Account No.--}}
                            </label>
                            {!! Form::text('bank_acc_no', old('bank_acc_no'), ['class' =>'form-control form-field bank_acc_no', 'placeholder' => __('claim_insurance.form.placeholder_7')]) !!}
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <h6 class="claim-title"><strong>{{__('claim_insurance.form.title_5')}}
                            {{--Subscription Information--}}
                        </strong></h6>
                    <hr>
                </div>
                @if(isset($insurance_details_formatted->subscription_plan_name))
                    <div class="col-md-4 ma">
                        <div class="form-group">
                            <label for="subscription_plan_id">{{__('claim_insurance.form.label_16')}}
                                {{--Subscription Plan--}}
                            </label>
                            {!! Form::text('subscription_plan_name', $insurance_details_formatted->subscription_plan_name, ['class' =>'form-control form-field', 'placeholder' =>__('claim_insurance.form.placeholder_8') , 'readonly' => 'true']) !!}
                            {!! Form::text('subscription_plan_id', $insurance_details_formatted->subscription_plan_id, ['class' =>'form-control form-field', 'hidden' => 'true']) !!}
                        </div>
                    </div>
                @elseif(count($user_subscriptions) > 1)
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="subscription_plan_id">{{__('claim_insurance.form.label_16')}}
                                {{--Subscription Plan--}}
                            </label>
                            {!! Form::select('subscription_plan_id', ['' => 'Choose Subscription Plan'] + $user_subscriptions, null, ['class' => 'form-control', 'id' => 'subscription_plan_id' ]) !!}
                        </div>
                    </div>
                @else
                    <div class="form-group">
                        <div class="col-md-4">
                            <label for="subscription_plan_id">{{__('claim_insurance.form.label_16')}}
                                {{--Subscription Plan--}}
                            </label>
                            {!! Form::select('subscription_plan_id', $user_subscriptions, null, ['class' => 'form-control', 'id' => 'subscription_plan_id' ]) !!}
                        </div>
                    </div>
                @endif
                @if(((isset($user->name)) && (isset($user->date_of_birth))) && count($user_subscriptions) != 0)
                    <div class="col-md-12 padding-leftright-null" style="margin-top: 10px">
                        <div class="form-group">
                            <div class="col-md-2 margin-bottom-small">
                                <input id="submit-contact" class="login-btn" value="{{__('claim_insurance.form.button')}}" type="submit">
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>