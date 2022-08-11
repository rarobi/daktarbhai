<div class="row">
    <div class="col-sm-4">
        {!! Form::label('hbsag_value', "HBsAg") !!} <br>
        {!! Form::radio('hbsag_value', 'Positive') !!}+ve &nbsp;&nbsp;&nbsp;&nbsp;
        {!! Form::radio('hbsag_value', 'Negative') !!}-ve &nbsp;&nbsp;&nbsp;&nbsp;
        {!! Form::radio('hbsag_value', 'Strongly Positive') !!}+sve
    </div>
    <div class="col-sm-4">
        {!! Form::label('tpha_value', "TPHA") !!} <br>
        {!! Form::radio('tpha_value', 'Positive') !!}+ve &nbsp;&nbsp;&nbsp;&nbsp;
        {!! Form::radio('tpha_value', 'Negative') !!}-ve &nbsp;&nbsp;&nbsp;&nbsp;
        {!! Form::radio('tpha_value', 'Strongly Positive') !!}+sve
    </div>
    <div class="col-sm-4">
        {!! Form::label('ra_value', "RA") !!} <br>
        {!! Form::radio('ra_value', 'Positive') !!}+ve &nbsp;&nbsp;&nbsp;&nbsp;
        {!! Form::radio('ra_value', 'Negative') !!}-ve &nbsp;&nbsp;&nbsp;&nbsp;
        {!! Form::radio('ra_value', 'Strongly Positive') !!}+sve
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('aso_titer_value', "ASO Titer") !!}
            <div class="input-group">
                {!! Form::number('aso_titer_value', old('aso_titer_value'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => "ASO Titer Value"]) !!}
                <span class="input-group-addon">iu/ml</span>
            </div>
            <div class="help-block with-errors">{{ '100 - 600' }}</div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('widal_value', "Widal") !!}
            {!! Form::select('widal_value', ['' =>'Select', '1:40' => '1:40', '1:80' => '1:80', '1:160' => '1:160', '1:640' => '1:640'], old('widal_value'), ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('crp_value', "CRP") !!}
            <div class="input-group">
                {!! Form::number('crp_value', old('crp_value'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => "CRP Value"]) !!}
                <span class="input-group-addon">mg/l</span>
            </div>
            <div class="help-block with-errors">{{ '5 - 40' }}</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        {!! Form::label('vdrl_value', "VDRL") !!} <br>
        {!! Form::radio('vdrl_value', 'reactive') !!} Reactive &nbsp;&nbsp;&nbsp;&nbsp;
        {!! Form::radio('vdrl_value', 'nonreactive') !!} Non-reactive
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
    <div class="col-sm-4">

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