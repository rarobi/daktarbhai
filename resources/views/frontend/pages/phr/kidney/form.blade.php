<div class="col-md-6 padding-null">
    {{ Form::label('Urea', 'Urea') }}
    <div class="form-inline">
        {{ Form::number('serum_urea_level', old('serum_urea_level'), ['class' => 'form-control', 'placeholder' => 'Urea', 'step' => '.01', 'required' => 'required']) }}
        {{ Form::select('unit',['mg/dL' => 'mg/dL'], old('unit'), ['class' =>'form-control']) }}
        {{--<span class="help-block with-errors">13.5 - 17.5(Male), &nbsp; 12.0 - 15.5(Female)</span>--}}
    </div>
</div>

<div class="col-md-6 padding-null">
    {{ Form::label('Creatinine', 'Creatinine') }}
    <div class="form-inline">
        {{ Form::number('serum_creatinine', old('serum_creatinine'), ['class' => 'form-control' ,'placeholder' => 'Creatinine', 'step' => '.01', 'required' => 'required']) }}
        {{ Form::select('unit', ['mg/dL' => 'mg/dL'], old('unit'), ['class' => 'form-control']) }}
        {{--<span class="help-block with-errors">13.5 - 17.5(Male), &nbsp; 12.0 - 15.5(Female)</span>--}}
    </div>
</div>

<div class="col-md-6 padding-null">
    {{ Form::label('Uric Acid', 'Uric Acid') }}
    <div class="form-inline">
        {{ Form::number('serum_uric_acid', old('serum_uric_acid'), ['class' => 'form-control', 'placeholder' => 'Uric Acid', 'step' => '.01', 'required' => 'required']) }}
        {{ Form::select('unit', ['mg/dL' => 'mg/dL'], old('unit'), ['class' => 'form-control']) }}
        {{--<span class="help-block with-errors">13.5 - 17.5(Male), &nbsp; 12.0 - 15.5(Female)</span>--}}
    </div>
</div>

<div class="col-md-6 padding-null">
    {{ Form::label('Calcium', 'Calcium') }}
    <div class="form-inline">
        {{ Form::number('serum_calcium', old('serum_calcium'), ['class' => 'form-control', 'placeholder' => 'Calcium', 'step' => '.01', 'required' => 'required']) }}
        {{ Form::select('unit', ['mg/dL' => 'mg/dL'], old('unit'), ['class' => 'form-control']) }}
        {{--<span class="help-block with-errors">13.5 - 17.5(Male), &nbsp; 12.0 - 15.5(Female)</span>--}}
    </div>
</div>

<div class="col-md-6 padding-null">
    {{ Form::label('Phosphate', 'Phosphate') }}
    <div class="form-inline">
        {{ Form::number('serum_phosphate', old('serum_phosphate'), ['class' => 'form-control', 'placeholder' => 'Phosphate', 'step' => '.01', 'required' => 'required']) }}
        {{ Form::select('unit', ['mg/dL' => 'mg/dL'], old('unit'), ['class' =>'form-control']) }}
        {{--<span class="help-block with-errors">13.5 - 17.5(Male), &nbsp; 12.0 - 15.5(Female)</span>--}}
    </div>
</div>

<div class="col-md-6 padding-null">
    {{ Form::label('Nitrogen', 'Nitrogen') }}
    <div class="form-inline">
        {{ Form::number('serum_urea_nitrogen', old('serum_urea_nitrogen'), ['class' =>'form-control', 'placeholder' => 'Nitrogen', 'step' => '.01', 'required' => 'required']) }}
        {{ Form::select('unit', ['mg/dL' => 'mg/dL'], old('unit'), ['class' => 'form-control']) }}
        {{--<span class="help-block with-errors">13.5 - 17.5(Male), &nbsp; 12.0 - 15.5(Female)</span>--}}
    </div>
</div>

<div class="col-md-6 padding-null">
    {{ Form::label('eGFR', 'eGFR') }}
    <div class="form-inline">
        {{ Form::number('eGFR', old('eGFR'), ['class' =>'form-control', 'placeholder' => 'eGFR', 'step' => '.01', 'required' => 'required']) }}
        {{ Form::select('unit', ['mL/min' => 'mL/min'], old('unit'), ['class' => 'form-control']) }}
        {{--<span class="help-block with-errors">13.5 - 17.5(Male), &nbsp; 12.0 - 15.5(Female)</span>--}}
    </div>
</div>

<div class="col-md-6 padding-null">
    {{ Form::label('taken_date', 'Taken Date') }}
    <div class="input-group date">
        {{ Form::text('taken_datetime', old('taken_datetime'), ['class' =>'form-control form-field phr-datepicker', 'data-date-end-date' => '0d', 'required' => 'required', 'id' => 'phr-datepicker', 'placeholder' => 'Date']) }}
        {{--<span class="input-group-addon"><i class="fa fa-calendar"></i></span>--}}
    </div>
</div>

<div class="col-md-10 padding-null">
    {{ Form::label('Notes', 'Notes') }}
    <div class="input-group">
        {{ Form::textarea('additional_notes', old('additional_notes'), ['class' => 'form-control form-field', 'placeholder' => 'Notes']) }}
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
