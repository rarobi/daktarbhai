<div class="col-md-6 padding-null">
    {{ Form::label('High Density Lipoprotein (mg/dL)', 'High Density Lipoprotein (mg/dL)') }}
    <div class="form-inline">
        {{ Form::number('hdl', old('hdl'), ['class' => 'form-control', 'placeholder' => 'HDL', 'step' => '.01', 'required' => 'required']) }}
        {{ Form::select('unit', ['mg/dL' => 'mg/dL'], old('unit'), ['class' => 'form-control']) }}
        {{--<span class="help-block with-errors">13.5 - 17.5(Male), &nbsp; 12.0 - 15.5(Female)</span>--}}
    </div>
</div>

<div class="col-md-6 padding-null">
    {{ Form::label('Low Density Lipoprotein (mg/dL)', 'Low Density Lipoprotein (mg/dL)') }}
    <div class="form-inline">
        {{ Form::number('ldl', old('ldl'), ['class' => 'form-control', 'placeholder' => 'LDL', 'step' => '.01', 'required' => 'required']) }}
        {{ Form::select('unit', ['mg/dL' => 'mg/dL'], old('unit'), ['class' => 'form-control']) }}
        {{--<span class="help-block with-errors">13.5 - 17.5(Male), &nbsp; 12.0 - 15.5(Female)</span>--}}
    </div>
</div>

<div class="col-md-6 padding-null">
    {{ Form::label('Triglyceride (mg/dL)', 'Triglyceride (mg/dL)') }}
    <div class="form-inline">
        {{ Form::number('triglycerides', old('triglycerides'), ['class' => 'form-control', 'placeholder' => 'Triglyceride', 'step' => '.01', 'required' => 'required']) }}
        {{ Form::select('unit', ['mg/dL' => 'mg/dL'], old('unit'), ['class' => 'form-control']) }}
        {{--<span class="help-block with-errors">13.5 - 17.5(Male), &nbsp; 12.0 - 15.5(Female)</span>--}}
    </div>
</div>

<div class="col-md-6 padding-null">
    {{ Form::label('Total Cholesterol (mg/dL)', 'Total Cholesterol (mg/dL)') }}
    <div class="form-inline">
        {{ Form::number('total_cholesterol', old('total_cholesterol'), ['class' => 'form-control', 'placeholder' => 'Total Cholesterol', 'step' => '.01', 'required' => 'required']) }}
        {{ Form::select('unit', ['mg/dL' =>'mg/dL'], old('unit'), ['class' =>'form-control']) }}
        {{--<span class="help-block with-errors">13.5 - 17.5(Male), &nbsp; 12.0 - 15.5(Female)</span>--}}
    </div>
</div>

<div class="col-md-6 padding-null">
    {{ Form::label('taken_date', __('phr.common.taken_date')) }}
    <div class="input-group date">
        {{ Form::text('taken_datetime', old('taken_datetime'), ['class' => 'form-control form-field phr-datepicker', 'data-date-end-date' => '0d', 'required' => 'required', 'id' => 'phr-datepicker', 'placeholder' => 'Date']) }}
        {{--<span class="input-group-addon"><i class="fa fa-calendar"></i></span>--}}
    </div>
</div>

<div class="col-md-10 padding-null">
    {{ Form::label('Notes', 'Notes') }}
    <div class="input-group">
        {{ Form::textarea('additional_notes', old('additional_notes'), ['class' => 'form-control form-field',  'placeholder' => 'Notes']) }}
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
