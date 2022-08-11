<div class="col-sm-4 padding-left-null">
    <div class="form-group">
        <label for="systolic_value">{{__('phr.bp.label.systolic')}}</label>
        {{--<input class="form-control" required="required" placeholder="Systolic Value" name="systolic_value" type="number">--}}
        {{ Form::number('systolic', old('systolic'),['required' => 'required', 'class' => 'form-control', 'placeholder' => __('phr.bp.table.title.systolic_value'), 'step' => '.01']) }}
        <span class="help-block">{{__('phr.bp.validation_msg.systolic')}}</span>
    </div>
</div>
<div class="col-sm-4">
    <div class="form-group">
        <label for="diastolic_value">{{__('phr.bp.label.diastolic')}}</label>
        {{--<input class="form-control" required="required" placeholder="Diastolic Value" name="diastolic_value" type="number">--}}
        {{ Form::number('diastolic', old('diastolic'),['required' => 'required', 'class' => 'form-control', 'placeholder' => __('phr.bp.table.title.diastolic_value'), 'step' => '.01']) }}
        <span class="help-block">{{__('phr.bp.validation_msg.diastolic')}}</span>
    </div>
</div>
<div class="col-sm-4">
    <label for="taken_date">{{__('phr.common.taken_date')}}</label>
    <div class="input-group date">
        {{ Form::text('taken_datetime', old('taken_datetime'), ['class' =>'form-control form-field phr-datepicker', 'data-date-end-date' => '0d', 'required' => 'required', 'id' => 'phr-datepicker', 'placeholder' => __('phr.common.date')]) }}
        {{--<span class="input-group-addon"><i class="fa fa-calendar"></i></span>--}}
    </div>
</div>
<div class="col-md-12 padding-null m-t-10px">
    @if(isset($list))
        <button type="submit" class="btn-alt small active doc-btn ">{{__('phr.common.action.update')}}</button>
    @else
        <button type="submit" class="btn-alt small active doc-btn ">{{__('phr.common.action.create')}}</button>
        <button type="reset" class="btn-alt small active doc-btn reset-btn">{{__('phr.common.action.reset')}}</button>
    @endif
</div>
