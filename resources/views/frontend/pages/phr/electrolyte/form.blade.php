<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('sodium', "Sodium (Na+)") !!}
            <div class="input-group">
                {!! Form::number('sodium', old('sodium'), ['class' => 'form-control', 'step' => 'any', 'required' => 'required', 'placeholder' => "Sodium (NA)", "aria-describedby" => "sodium", 'data-error' => 'Sodiam Value Must be Numeric']) !!}
                <span class="input-group-addon" id="sodium_unit">mmol/L</span>
            </div>
            <span class="help-block with-errors">136 - 145</span>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('potassium', "Potassium (K)") !!}
            <div class="input-group">
                {!! Form::number('potassium', old('potassium'), ['class' => 'form-control', 'step' => 'any', 'required' => 'required', 'placeholder' => "Potassium (K)", "aria-describedby" => "potassium", 'data-error' => 'Potassium Value Must be Numeric']) !!}
                <span class="input-group-addon" id="potassium_unit">mmol/L</span>
            </div>
            <span class="help-block with-errors">3.5 - 5.1</span>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('chloride', "Chloride (Cl)") !!}
            <div class="input-group">
                {!! Form::number('chloride', old('chloride'), ['class' => 'form-control', 'step' => 'any', 'required' => 'required', 'placeholder' => "Chloride (Cl)"]) !!}
                <span class="input-group-addon" id="chloride_unit">mmol/L</span>
            </div>
            <span class="help-block with-errors">98 - 107</span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('bicarbonate', "Bicarbonate") !!}
            <div class="input-group">
                {!! Form::number('bicarbonate', old('bicarbonate'), ['class' => 'form-control', 'step' => 'any', 'placeholder' => "Bicarbonate(HCO3)"]) !!}
                <span class="input-group-addon">mmol/L</span>
            </div>
            <span class="help-block with-errors">18 - 29</span>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('pH', "pH Value") !!}
            <div class="input-group">
                {!! Form::number('pH', old('pH'), ['class' => 'form-control', 'step' => 'any', 'placeholder' => "pH Value"]) !!}
                <span class="input-group-addon"></span>
            </div>
            <span class="help-block with-errors"></span>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('taken_datetime', "Taken Date") !!}
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                {!! Form::text('taken_datetime', old('taken_datetime'), ['class' => 'form-control pull-right taken-datetime', 'data-date-end-date' => '0d', 'id' => 'taken-datetime', 'placeholder' => "YYYY-MM-DD"]) !!}
            </div>
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
        <button type="reset" class="btn-alt small active doc-btn reset-btn">{{__('phr.common.action.reset')}} </button>
    @endif
</div>