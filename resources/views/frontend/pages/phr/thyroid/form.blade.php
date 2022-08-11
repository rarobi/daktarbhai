<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('tsh', "TSH") !!}
            <div class="input-group">
                {!! Form::number('tsh', old('tsh'), ['class' => 'form-control', 'step' => 'any', 'required' => 'required', 'placeholder' => "TSH Value"]) !!}
                <span class="input-group-addon">{{ 'pg/ml' }}</span>
            </div>
            <div class="help-block with-errors">{{ '0.7 - 7.0' }}</div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('tt4', "TT4") !!}
            <div class="input-group">
                {!! Form::number('tt4', old('tt4'), ['class' => 'form-control', 'step' => 'any', 'required' => 'required', 'placeholder' => "TT4 Value"]) !!}
                <span class="input-group-addon">{{ 'ug/dl' }}</span>
            </div>
            <div class="help-block with-errors">{{ '2.0 - 17.0' }}</div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('ft4', "FT4") !!}
            <div class="input-group">
                {!! Form::number('ft4', old('ft4'), ['class' => 'form-control', 'step' => 'any', 'required' => 'required', 'placeholder' => "FT4 Value"]) !!}
                <span class="input-group-addon">{{ 'µl/ml' }}</span>
            </div>
            <div class="help-block with-errors">{{ '0.2 - 3.0' }}</div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('ft3', "FT3") !!}
            <div class="input-group">
                {!! Form::number('ft3', old('ft3'), ['class' => 'form-control', 'step' => 'any', 'required' => 'required', 'placeholder' => "FT3 Value"]) !!}
                <span class="input-group-addon">{{ 'ng/dl' }}</span>
            </div>
            <div class="help-block with-errors">{{ '0.5 - 7.0' }}</div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('total_t3', "Total T3") !!}
            <div class="input-group">
                {!! Form::number('total_t3', old('total_t3'), ['class' => 'form-control', 'required' => 'required', 'step' => 'any', 'placeholder' => "Total T3"]) !!}
                <span class="input-group-addon">{{ 'ng/dl' }}</span>
            </div>
            <div class="help-block with-errors">{{ '30 - 220' }}</div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('taken_datetime', "Taken Date") !!}
            <div class="input-group date">
{{--                <div class="input-group-addon">--}}
{{--                    <i class="fa fa-calendar"></i>--}}
{{--                </div>--}}
                {!! Form::text('taken_datetime', old('taken_datetime') , ['class' => 'form-control pull-right taken-datetime', 'id' => 'taken-datetime', 'required' => 'required', 'placeholder' => "YYYY-MM-DD"]) !!}
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