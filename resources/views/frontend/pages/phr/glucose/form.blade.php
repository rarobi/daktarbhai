<div class="form-group col-md-3">
    {{ Form::select('type',[''=> __('phr.glucose.placeholder.select_type'), 'glucose' => __('phr.glucose.placeholder.glucose'), 'HbA1c' => __('phr.glucose.placeholder.hbA1c')] , old('type'),[ 'required' => 'required' ]) }}
    <label for="select" class="control-label"></label><i class="bar"></i>
</div>

<div class="form-group col-md-3">
    {{ Form::select('daytime',[''=> __('phr.glucose.placeholder.select_daytime'), 'Random'=> __('phr.glucose.placeholder.random'),'Before Breakfast'=> __('phr.glucose.placeholder.before_breakfast'),'After Breakfast'=>__('phr.glucose.placeholder.after_breakfast'),
    'Before Lunch' =>__('phr.glucose.placeholder.before_lunch'),'After Lunch' =>__('phr.glucose.placeholder.after_lunch'),'Before Dinner' =>__('phr.glucose.placeholder.before_dinner'),'After Dinner' =>__('phr.glucose.placeholder.after_dinner')] , old('daytime'), [ 'required' => 'required' ]) }}
    <label for="select" class="control-label"></label><i class="bar"></i>
</div>
<div class="form-group col-md-3">
    {{ Form::number('level', old('level'),['required' => 'required', 'step' => '.01']) }}
    <label for="input" class="control-label">{{__('phr.glucose.placeholder.level')}}</label><i class="bar"></i>

</div>

<div class="form-group col-md-3">
    <div class="input-group date">
        {{ Form::text('taken_datetime', old('taken_datetime'), ['class' =>'form-control form-field phr-datepicker', 'data-date-end-date' => '0d', 'required' => 'required', 'id' => 'phr-datepicker', 'placeholder' => __('phr.common.date')]) }}
        {{--<span class="input-group-addon"><i class="fa fa-calendar"></i></span>--}}
    </div>
</div>
<div class="col-md-12">
    @if(isset($list))
        <button type="submit" class="btn-alt small active doc-btn ">{{__('phr.common.action.update')}}</button>
    @else
        <button type="submit" class="btn-alt small active doc-btn ">{{__('phr.common.action.create')}}</button>
        <button type="reset" class="btn-alt small active doc-btn reset-btn">{{__('phr.common.action.reset')}}</button>
    @endif
</div>
