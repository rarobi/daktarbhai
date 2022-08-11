<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('alkaline_phosphate_value', "Alkaline Phosphate") !!}
            <div class="input-group">
                {!! Form::number('alkaline_phosphate_value', old('alkaline_phosphate_value'), ['class' => 'form-control', 'required' => 'required', 'step' => '.01', 'placeholder' => "Alkaline Phosphate"]) !!}
                <span class="input-group-addon" id="alkaline_phosphate_value_unit">U/L</span>
            </div>
            <div class="help-block with-errors">{{ '30 - 140' }}</div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('total_bilirubin_value', "Total Bilirubin") !!}
            <div class="input-group">
                {!! Form::number('total_bilirubin_value', old('total_bilirubin_value'), ['class' => 'form-control', 'required' => 'required', 'step' => '.01', 'placeholder' => "Total Bilirubin"]) !!}
                <span class="input-group-addon" id="total_bilirubin_value_unit">g/dL</span>
            </div>
            <div class="help-block with-errors">{{ '0.3 - 3.0' }}</div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('sgpt', "ALT(SGPT)") !!}
            <div class="input-group">
                {!! Form::number('sgpt', old('sgpt'), ['class' => 'form-control', 'required' => 'required', 'step' => '.01', 'placeholder' => "ALT Value"]) !!}
                <span class="input-group-addon" id="sgpt_unit">U/L</span>
            </div>
            <div class="help-block with-errors">{{ '10 - 50' }}</div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('sgot', "AST(SGOT)") !!}
            <div class="input-group">
                {!! Form::number('sgot', old('sgot'), ['class' => 'form-control', 'required' => 'required', 'step' => '.01', 'placeholder' => "AST Value"]) !!}
                <span class="input-group-addon" id="sgot_unit">U/L</span>
            </div>
            <div class="help-block with-errors">{{ '10 - 50' }}</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-9">
        <div class="form-group">
            {!! Form::label('advice', "Advice") !!}
            {!! Form::textarea('advice', old('advice'), ['class' => 'form-control', 'placeholder' => "Write some notes...", 'rows' => '1']) !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('taken_datetime', "Taken Date") !!}
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                {!! Form::text('taken_datetime', old('taken_datetime') , ['class' => 'form-control pull-right taken-datetime', 'id' => 'taken-datetime', 'data-date-end-date' => '0d', 'required' => 'required', 'placeholder' => "YYYY-DD-MM"]) !!}
            </div>
            <div class="help-block with-errors"></div>
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