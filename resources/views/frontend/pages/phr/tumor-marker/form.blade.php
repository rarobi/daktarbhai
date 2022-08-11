<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('ca15_value', "Ca15 Value") !!}
            <div class="input-group">
                {!! Form::number('ca15_value', old('ca15_value'), ['class' => 'form-control', 'step' => 'any', 'required' => 'required', 'placeholder' => "Ca15 Value", "aria-describedby" => "ca15_value", 'data-error' => 'Please Enter A Numeric Value For Ca15']) !!}
                <span class="input-group-addon" id="ca15_value_unit">u/ml</span>
            </div>
            <div class="help-block with-errors"> 0.0 - 30.0 </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('ca125_value', "Ca125 Value") !!}
            <div class="input-group">
                {!! Form::number('ca125_value', old('ca125_value') , ['class' => 'form-control', 'step' => 'any', 'required' => 'required', 'placeholder' => "Ca125 Value", "aria-describedby" => "ca125_value", 'data-error' => 'Please Enter A Numeric Value For Ca125']) !!}
                <span class="input-group-addon" id="ca125_value_unit">u/ml</span>
            </div>
            <div class="help-block with-errors"> 0.0 - 35.0 </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('alpha_value', "Alpha Fetoprotein") !!}
            <div class="input-group">
                {!! Form::number('alpha_value', old('alpha_value'), ['class' => 'form-control', 'step' => 'any', 'required' => 'required', 'placeholder' => "Alpha Value",  "aria-describedby" => "alpha_value", 'data-error' => 'Please Enter A Numeric Value For Alpha']) !!}
                <span class="input-group-addon" id="alpha_value_unit">µl/l</span>
            </div>
            <div class="help-block with-errors"> 0.0 - 8.0 </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('carcino_value', "Carcinoembryonic Antigen (CEA)") !!}
            <div class="input-group">
                {!! Form::number('carcino_value', old('carcino_value'), ['class' => 'form-control',  'step' => 'any', 'required' => 'required','placeholder' => "Carcino Value",  "aria-describedby" => "carcino_value", 'data-error' => 'Please Enter A Numeric Value For Carcino']) !!}
                <span class="input-group-addon" id="carcino_value_unit">ng/ml</span>
            </div>
            <div class="help-block with-errors"> 0.0 - 2.5 </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('prostate_value', "Prostate Specific Antigen (PSA)") !!}
            <div class="input-group">
                {!! Form::number('prostate_value', old('prostate_value'), ['class' => 'form-control', 'step' => 'any', 'required' => 'required', 'placeholder' => "Prostate Value",  "aria-describedby" => "prostate_value", 'data-error' => 'Please Enter A Numeric Value For Prostate']) !!}
                <span class="input-group-addon" id="prostate_value_unit">ng/ml</span>
            </div>
            <div class="help-block with-errors"> 0.0 - 4.0 </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('taken_datetime', "Taken Date") !!}
            <div class="input-group date">
{{--                <div class="input-group-addon">--}}
{{--                    <i class="fa fa-calendar"></i>--}}
{{--                </div>--}}
                {!! Form::text('taken_datetime', old('taken_datetime'), ['class' => 'form-control pull-right taken-datetime', 'required' => 'required', 'id' => 'taken-datetime', 'data-date-end-date' => '0d', 'placeholder' => "YYYY-MM-DD", 'data-error' => 'Please Select Date']) !!}
            </div>
            <div class="help-block with-errors"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            {!! Form::label('advice', "Advice") !!}
            {!! Form::textarea('advice', old('advice'), ['class' => 'form-control', 'placeholder' => "Write some notes...", 'rows' => '1']) !!}
        </div>
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