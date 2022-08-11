<div class="col-md-6 padding-null">
    {{ Form::label('hemoglobin', __('phr.cbc.label.hemoglobin')) }}
    <div class="form-inline">
        {{ Form::number('hemoglobin', old('hemoglobin'), [ 'class' =>'form-control' ,'placeholder' => __('phr.cbc.placeholder.hemoglobin'), 'step' => '.01']) }}
        {{ Form::select('hemoglobin_method',['Hematology' =>__('phr.cbc.placeholder.hematology')] , old('hemoglobin_method'),
    ['class' =>'form-control']) }}
        {{ Form::select('hemoglobin_unit',['g/dl' =>__('phr.cbc.unit.hemoglobin_unit')] , old('hemoglobin_unit'),
    ['class' =>'form-control']) }}
        <span class="help-block with-errors">{{__('phr.cbc.validation_msg.hemoglobin')}}</span>
    </div>
</div>
<div class="col-md-6 padding-null">
    {{ Form::label('esr', __('phr.cbc.label.esr')) }}
    <div class="form-inline">
        {{ Form::number('esr', old('esr'), [ 'class' =>'form-control' ,'placeholder' => __('phr.cbc.placeholder.esr'), 'step' => '.01']) }}
        {{ Form::select('esr_method',['Westergren' =>__('phr.cbc.placeholder.westergren')] , old('esr_method'),
    ['class' =>'form-control']) }}
        {{ Form::select('esr_unit',['mm/H' =>__('phr.cbc.unit.esr_unit')] , old('esr_unit'),
    ['class' =>'form-control']) }}
        <span class="help-block with-errors">{{__('phr.cbc.validation_msg.esr')}}</span>
    </div>
</div>
{{--<div class="col-sm-6 padding-null">
    {{ Form::label('total_leukocytes_count', 'Total Leukocytes Count (x10ˆ3/uL)') }}
    <div class="form-inline">
        {{ Form::number('total_leukocytes_count', old('total_leukocytes_count'), [ 'class' =>'form-control' ,'placeholder' => 'Total Leukocytes Count', 'step' => '.01']) }}
        {{ Form::select('total_leukocytes_count_method',['Hematology' =>'Hematology'] , old('total_leukocytes_count_method'),
    ['class' =>'form-control']) }}
        {{ Form::select('total_leukocytes_count_unit',['x10ˆ3/uL' =>'x10ˆ3/uL'] , old('total_leukocytes_count_unit'),
    ['class' =>'form-control']) }}

        <span class="help-block with-errors">4.4 - 11.0</span>
    </div>
</div>--}}
<div class="col-sm-6 padding-null">
    {{ Form::label('basophils',__('phr.cbc.label.basophils')) }}
    <div class="form-inline">
        {{ Form::number('basophils', old('basophils'), [ 'class' =>'form-control' ,'placeholder' => 'Basophils', 'step' => '.01']) }}
        {{ Form::select('basophils_method',['Hematology' =>__('phr.cbc.placeholder.hematology')] , old('basophils_method'),
    ['class' =>'form-control']) }}
        {{ Form::select('basophils_unit',['%' =>__('phr.cbc.unit.basophils_unit')] , old('basophils_unit'),
    ['class' =>'form-control']) }}
        <span class="help-block with-errors">{{__('phr.cbc.validation_msg.basophils')}}</span>
    </div>
</div>
<div class="col-sm-6 padding-null">
    {{ Form::label('platelets', __('phr.cbc.label.platelets')) }}
    <div class="form-inline">
        {{ Form::number('platelets', old('platelets'), [ 'class' =>'form-control' ,'placeholder' => __('phr.cbc.placeholder.platelets'), 'step' => '.01']) }}
        {{ Form::select('platelets_method',['Hematology' =>__('phr.cbc.placeholder.hematology')] , old('platelets_method'),
    ['class' =>'form-control']) }}
        {{ Form::select('platelets_unit',['x10ˆ3/uL' =>__('phr.cbc.unit.platelets_unit')] , old('platelets_unit'),
    ['class' =>'form-control']) }}
        <span class="help-block with-errors">{{__('phr.cbc.validation_msg.platelets')}}</span>
    </div>
</div>
<div class="col-sm-6 padding-null">
    {{ Form::label('neutrophils',  __('phr.cbc.label.neutrophils')) }}
    <div class="form-inline">
        {{ Form::number('neutrophils', old('neutrophils'), [ 'class' =>'form-control' ,'placeholder' =>__('phr.cbc.placeholder.neutrophils'), 'step' => '.01']) }}
        {{ Form::select('neutrophils_method',['Hematology' =>__('phr.cbc.placeholder.hematology')] , old('neutrophils_method'),
    ['class' =>'form-control']) }}
        {{ Form::select('neutrophils_unit',['%' =>__('phr.cbc.unit.basophils_unit')] , old('neutrophils_unit'),
    ['class' =>'form-control']) }}
        <span class="help-block with-errors">{{__('phr.cbc.validation_msg.neutrophils')}} </span>
    </div>
</div>
<div class="col-sm-6 padding-null">
    {{ Form::label('lymphocytes',__('phr.cbc.label.lymphocytes')) }}
    <div class="form-inline">
        {{ Form::number('lymphocytes', old('lymphocytes'), [ 'class' =>'form-control' ,'placeholder' => __('phr.cbc.placeholder.lymphocytes'), 'step' => '.01']) }}
        {{ Form::select('lymphocytes_method',['Hematology' =>__('phr.cbc.placeholder.hematology')] , old('lymphocytes_method'),
    ['class' =>'form-control']) }}
        {{ Form::select('lymphocytes_unit',['%' =>__('phr.cbc.unit.basophils_unit')] , old('lymphocytes_unit'),
    ['class' =>'form-control']) }}
        <span class="help-block with-errors">{{__('phr.cbc.validation_msg.lymphocytes')}}</span>
    </div>
</div>
<div class="col-sm-6 padding-null">
    {{ Form::label('eosinophils',__('phr.cbc.label.eosinophils')) }}
    <div class="form-inline">
        {{ Form::number('eosinophils', old('eosinophils'), [ 'class' =>'form-control' ,'placeholder' => __('phr.cbc.placeholder.eosinophils'), 'step' => '.01']) }}
        {{ Form::select('eosinophils_method',['Hematology' =>__('phr.cbc.placeholder.hematology')] , old('eosinophils_method'),
    ['class' =>'form-control']) }}
        {{ Form::select('eosinophils_unit',['%' =>__('phr.cbc.unit.basophils_unit')] , old('eosinophils_unit'),
    ['class' =>'form-control']) }}
        <span class="help-block with-errors">{{__('phr.cbc.validation_msg.eosinophils')}}</span>
    </div>
</div>
<div class="col-sm-6 padding-null">
    {{ Form::label('monocytes',__('phr.cbc.label.monocytes')) }}
    <div class="form-inline">
        {{ Form::number('monocytes', old('monocytes'), [ 'class' =>'form-control' ,'placeholder' => __('phr.cbc.placeholder.monocytes'), 'step' => '.01']) }}
        {{ Form::select('monocytes_method',['Hematology' =>__('phr.cbc.placeholder.hematology')] , old('monocytes_method'),
    ['class' =>'form-control']) }}
        {{ Form::select('monocytes_unit',['%' =>__('phr.cbc.unit.basophils_unit')] , old('monocytes_unit'),
    ['class' =>'form-control']) }}
        <span class="help-block with-errors">{{__('phr.cbc.validation_msg.monocytes')}}</span>
    </div>
</div>
<div class="col-md-6 padding-null">
    {{ Form::label('taken_date',__('phr.common.taken_date')) }}
    <div class="input-group date">
        {{ Form::text('taken_datetime', old('taken_datetime'), ['class' =>'form-control form-field phr-datepicker', 'data-date-end-date' => '0d', 'required' => 'required', 'id' => 'phr-datepicker', 'placeholder' => __('phr.common.date')]) }}
        {{--<span class="input-group-addon"><i class="fa fa-calendar"></i></span>--}}
    </div>
</div>
<div class="col-sm-6 col-xs -12 padding-null margin-bottom-small">
    <a id="show-more" class="btn-alt small active doc-btn more-btn">{{__('phr.common.button.more_options')}}</a>
</div>
<div id="more_options">

    <div class="col-sm-6 padding-null">
        {{ Form::label('pcv',__('phr.cbc.label.pcv')) }}
        <div class="form-inline">
            {{ Form::number('pcv', old('pcv'), [ 'class' =>'form-control' ,'placeholder' =>  __('phr.cbc.placeholder.pcv'), 'step' => '.01']) }}
            {{ Form::select('pcv_method',['Hematology' =>__('phr.cbc.placeholder.hematology')] , old('pcv_method'),
        ['class' =>'form-control']) }}
            {{ Form::select('pcv_unit',['%' =>__('phr.cbc.unit.basophils_unit')] , old('pcv_unit'),
        ['class' =>'form-control']) }}
            <span class="help-block with-errors">{{__('phr.cbc.validation_msg.pcv')}}</span>
        </div>
    </div>

    <div class="col-sm-6 padding-null">
        {{ Form::label('mcv',__('phr.cbc.label.mcv')) }}
        <div class="form-inline">
            {{ Form::number('mcv', old('mcv'), [ 'class' =>'form-control' ,'placeholder' => __('phr.cbc.placeholder.mcv'), 'step' => '.01']) }}
            {{ Form::select('mcv_method',['Hematology' =>__('phr.cbc.placeholder.hematology')] , old('mcv_method'),
        ['class' =>'form-control']) }}
            {{ Form::select('mcv_unit',['%' =>__('phr.cbc.unit.basophils_unit')] , old('mcv_unit'),
        ['class' =>'form-control']) }}
            <span class="help-block with-errors">{{__('phr.cbc.validation_msg.mcv')}}</span>
        </div>

    </div>
    <div class="col-sm-6 padding-null">
        {{ Form::label('mch',__('phr.cbc.label.mch')) }}
        <div class="form-inline">
            {{ Form::number('mch', old('mch'), [ 'class' =>'form-control' ,'placeholder' =>  __('phr.cbc.placeholder.mch'), 'step' => '.01']) }}
            {{ Form::select('mch_method',['Hematology' =>__('phr.cbc.placeholder.hematology')] , old('mch_method'),
        ['class' =>'form-control']) }}
            {{ Form::select('mch_unit',['%' =>__('phr.cbc.unit.basophils_unit')] , old('mch_unit'),
        ['class' =>'form-control']) }}
            <span class="help-block with-errors">{{__('phr.cbc.validation_msg.mch')}}</span>
        </div>

    </div>
    <div class="col-sm-6 padding-null">
        {{ Form::label('mchc',__('phr.cbc.label.mchc')) }}
        <div class="form-inline">
            {{ Form::number('mchc', old('mchc'), [ 'class' =>'form-control' ,'placeholder' => __('phr.cbc.placeholder.mchc'), 'step' => '.01']) }}
            {{ Form::select('mchc_method',['Hematology' =>__('phr.cbc.placeholder.hematology')] , old('mchc_method'),
        ['class' =>'form-control']) }}
            {{ Form::select('mchc_unit',['g/dL' =>__('phr.cbc.unit.hemoglobin_unit')] , old('mchc_unit'),
        ['class' =>'form-control']) }}
            <span class="help-block with-errors">{{__('phr.cbc.validation_msg.mchc')}}</span>
        </div>
    </div>
    <div class="col-sm-6 padding-null">
        {{ Form::label('rwd',__('phr.cbc.label.rwd')) }}
        <div class="form-inline">
            {{ Form::number('rwd', old('rwd'), [ 'class' =>'form-control' ,'placeholder' => __('phr.cbc.placeholder.rwd'), 'step' => '.01']) }}
            {{ Form::select('rwd_method',['Hematology' =>__('phr.cbc.placeholder.hematology')] , old('rwd_method'),
        ['class' =>'form-control']) }}
            {{ Form::select('rwd_unit',['%' =>__('phr.cbc.unit.basophils_unit')] , old('rwd_unit'),
        ['class' =>'form-control']) }}
            <span class="help-block with-errors">{{__('phr.cbc.validation_msg.rwd')}}</span>
        </div>
    </div>
    <div class="col-sm-6 padding-null">
        {{ Form::label('rbc',__('phr.cbc.label.rbc'))}}
        <div class="form-inline">
            {{ Form::number('rbc', old('rbc'), [ 'class' =>'form-control' ,'placeholder' =>__('phr.cbc.placeholder.rbc'), 'step' => '.01']) }}
            {{ Form::select('rbc_method',['Hematology' =>__('phr.cbc.placeholder.hematology')] , old('rbc_method'),
        ['class' =>'form-control']) }}
            {{ Form::select('rbc_unit',['x10ˆ3/uL' =>__('phr.cbc.unit.platelets_unit')] , old('rbc_unit'),
        ['class' =>'form-control']) }}
            <span class="help-block">{{__('phr.cbc.validation_msg.rbc')}}</span>
        </div>
    </div>
    <div class="col-sm-6 padding-null">
        {{ Form::label('white_cell_count',__('phr.cbc.label.white_cell_count')) }}
        <div class="form-inline">
            {{ Form::number('white_cell_count', old('white_cell_count'), [ 'class' =>'form-control' ,'placeholder' =>__('phr.cbc.placeholder.white_cell_count'), 'step' => '.01']) }}
            {{ Form::select('white_cell_count_method',['Hematology' =>__('phr.cbc.placeholder.hematology')] , old('white_cell_count_method'),
        ['class' =>'form-control']) }}
            {{ Form::select('white_cell_count_unit',['x10⁹/L' =>__('phr.cbc.unit.white_cell_count_unit')] , old('white_cell_count_unit'),
        ['class' =>'form-control']) }}
            <span class="help-block">{{__('phr.cbc.validation_msg.white_cell_count')}}</span>
        </div>
    </div>
    {{--<div class="col-sm-6 padding-null">--}}
        {{--{{ Form::label('immature_granulocyte_percent', 'Immature Granulocyte (%)') }}--}}
        {{--<div class="form-inline">--}}
            {{--{{ Form::number('immature_granulocyte_percent', old('immature_granulocyte_percent'), [ 'class' =>'form-control' ,'placeholder' => 'Immature Granulocyte', 'step' => '.01']) }}--}}
            {{--{{ Form::select('immature_granulocyte_percent_method',['Hematology' =>'Hematology'] , old('immature_granulocyte_percent_method'),--}}
        {{--['class' =>'form-control']) }}--}}
            {{--{{ Form::select('immature_granulocyte_percent_unit',['%' =>'%'] , old('immature_granulocyte_percent_unit'),--}}
        {{--['class' =>'form-control']) }}--}}
            {{--<span class="help-block with-errors">0.0 - 0.5</span>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="col-sm-6 padding-null">
        {{ Form::label('total_wbc',__('phr.cbc.label.total_wbc')) }}
        <div class="form-inline">
            {{ Form::number('total_wbc', old('total_wbc'), [ 'class' =>'form-control' ,'placeholder' =>__('phr.cbc.placeholder.total_wbc'), 'step' => '.01']) }}
            {{ Form::select('total_wbc_method',['Hematology' =>__('phr.cbc.placeholder.hematology')] , old('total_wbc_method'),
        ['class' =>'form-control']) }}
            {{ Form::select('total_wbc_unit',['x10ˆ3/uL' =>__('phr.cbc.unit.platelets_unit')] , old('total_wbc_unit'),
        ['class' =>'form-control']) }}
            <span class="help-block with-errors">{{__('phr.cbc.validation_msg.total_wbc')}}</span>
        </div>
    </div>
    {{--<div class="col-sm-6 padding-null">--}}
        {{--{{ Form::label('neutrophils_absolute_count', 'Neutrophils Absolute Count (x10ˆ3/uL)') }}--}}
        {{--<div class="form-inline">--}}
            {{--{{ Form::number('neutrophils_absolute_count', old('neutrophils_absolute_count'), [ 'class' =>'form-control' ,'placeholder' => 'Neutrophils Absolute Count (x10ˆ3/uL)', 'step' => '.01']) }}--}}
            {{--{{ Form::select('neutrophils_absolute_count_method',['Hematology' =>'Hematology'] , old('neutrophils_absolute_count_method'),--}}
        {{--['class' =>'form-control']) }}--}}
            {{--{{ Form::select('neutrophils_absolute_count_unit',['x10ˆ3/uL' =>'x10ˆ3/uL'] , old('neutrophils_absolute_count_unit'),--}}
        {{--['class' =>'form-control']) }}--}}
            {{--<span class="help-block">2.0 - 7.0</span>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-sm-6 padding-null">--}}
        {{--{{ Form::label('lymphocytes_absolute_count', 'Lymphocytes Absolute Count (x10ˆ3/uL)') }}--}}
        {{--<div class="form-inline">--}}
            {{--{{ Form::number('lymphocytes_absolute_count', old('lymphocytes_absolute_count'), [ 'class' =>'form-control' ,'placeholder' => 'Lymphocytes Absolute Count (x10ˆ3/uL)', 'step' => '.01']) }}--}}
            {{--{{ Form::select('lymphocytes_absolute_count_method',['Hematology' =>'Hematology'] , old('lymphocytes_absolute_count_method'),--}}
        {{--['class' =>'form-control']) }}--}}
            {{--{{ Form::select('lymphocytes_absolute_count_unit',['x10ˆ3/uL' =>'x10ˆ3/uL'] , old('lymphocytes_absolute_count_unit'),--}}
        {{--['class' =>'form-control']) }}--}}
            {{--<span class="help-block">1.0 - 3.0</span>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-sm-6 padding-null">--}}
        {{--{{ Form::label('monocytes_absolute_count', 'Monocytes Absolute Count (x10ˆ3/uL)') }}--}}
        {{--<div class="form-inline">--}}
            {{--{{ Form::number('monocytes_absolute_count', old('monocytes_absolute_count'), [ 'class' =>'form-control' ,'placeholder' => 'Monocyte Absolute Count (x10ˆ3/uL)', 'step' => '.01']) }}--}}
            {{--{{ Form::select('monocytes_absolute_count_method',['Hematology' =>'Hematology'] , old('monocytes_absolute_count_method'),--}}
        {{--['class' =>'form-control', 'id' => 'monocytes_absolute_count']) }}--}}
            {{--{{ Form::select('monocytes_absolute_count_unit',['x10ˆ3/uL' =>'x10ˆ3/uL'] , old('monocytes_absolute_count_unit'),--}}
        {{--['class' =>'form-control']) }}--}}
            {{--<span class="help-block">0.20 - 1.00</span>--}}
        {{--</div>--}}

    {{--</div>--}}
    {{--<div class="col-sm-6 padding-null">--}}
        {{--{{ Form::label('basophils_absolute_count', 'Basophils Absolute Count (x10ˆ3/uL)') }}--}}
        {{--<div class="form-inline">--}}
            {{--{{ Form::number('basophils_absolute_count', old('basophils_absolute_count'), [ 'id' => 'basophils_absolute_count','class' =>'form-control' ,'placeholder' => 'Basophils Absolute Count (x10ˆ3/uL)', 'step' => '.01']) }}--}}
            {{--{{ Form::select('basophils_absolute_count_method',['Hematology' =>'Hematology'] , old('basophils_absolute_count_method'),--}}
        {{--['class' =>'form-control']) }}--}}
            {{--{{ Form::select('basophils_absolute_count_unit',['x10ˆ3/uL' =>'x10ˆ3/uL'] , old('basophils_absolute_count_unit'),--}}
        {{--['class' =>'form-control']) }}--}}
            {{--<span class="help-block">0.02 - 0.1</span>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-sm-6 padding-null">--}}
        {{--{{ Form::label('eosinophils_absolute_count', 'Eosinophils Absolute Count (x10ˆ3/uL)') }}--}}
        {{--<div class="form-inline">--}}
            {{--{{ Form::number('eosinophils_absolute_count', old('eosinophils_absolute_count'), [ 'class' =>'form-control' ,'placeholder' => 'Eosinophils Absolute Count (x10ˆ3/uL)', 'step' => '.01']) }}--}}
            {{--{{ Form::select('eosinophils_absolute_count_method',['Hematology' =>'Hematology'] , old('eosinophils_absolute_count_method'),--}}
        {{--['class' =>'form-control']) }}--}}
            {{--{{ Form::select('eosinophils_absolute_count_unit',['%' =>'%'] , old('eosinophils_absolute_count_unit'),--}}
        {{--['class' =>'form-control']) }}--}}
            {{--<span class="help-block with-errors">0.02 - 0.50</span>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-sm-6 padding-null">--}}
        {{--{{ Form::label('immature_granulocyte_count', 'Immature Granulocyte Count (x10ˆ3/uL)') }}--}}
        {{--<div class="form-inline">--}}
            {{--{{ Form::number('immature_granulocyte_count', old('immature_granulocyte_count'), [ 'class' =>'form-control' ,'placeholder' => 'Immature Granulocyte Count (x10ˆ3/uL)', 'step' => '.01']) }}--}}
            {{--{{ Form::select('immature_granulocyte_count_method',['Hematology' =>'Hematology'] , old('immature_granulocyte_count_method'),--}}
        {{--['class' =>'form-control']) }}--}}
            {{--{{ Form::select('immature_granulocyte_count_unit',['x10ˆ3/uL' =>'x10ˆ3/uL'] , old('immature_granulocyte_count_unit'),--}}
        {{--['class' =>'form-control']) }}--}}
            {{--<span class="help-block">0.0 - 0.3</span>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-sm-6 padding-null">--}}
        {{--{{ Form::label('nucleated_red_blood_cell_count', 'Nucleated RBC Count (x10ˆ3/uL)') }}--}}
        {{--<div class="form-inline">--}}
            {{--{{ Form::number('nucleated_red_blood_cell_count', old('nucleated_red_blood_cell_count'), [ 'class' =>'form-control' ,'placeholder' => 'Nucleated RBC Count (x10ˆ3/uL)', 'step' => '.01']) }}--}}
            {{--{{ Form::select('nucleated_red_blood_cell_count_method',['Hematology' =>'Hematology'] , old('nucleated_red_blood_cell_count_method'),--}}
        {{--['class' =>'form-control']) }}--}}
            {{--{{ Form::select('nucleated_red_blood_cell_count_unit',['x10ˆ3/uL' =>'x10ˆ3/uL'] , old('nucleated_red_blood_cell_count_unit'),--}}
        {{--['class' =>'form-control']) }}--}}
            {{--<span class="help-block">Nil in Adult</span>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-sm-6 padding-null">--}}
        {{--{{ Form::label('nucleated_red_blood_cell_percent', 'Nucleated RBC Percent (%)') }}--}}
        {{--<div class="form-inline">--}}
            {{--{{ Form::number('nucleated_red_blood_cell_percent', old('nucleated_red_blood_cell_percent'), [ 'class' =>'form-control' ,'placeholder' => 'Nucleated RBC Percent (%)', 'step' => '.01']) }}--}}
            {{--{{ Form::select('nucleated_red_blood_cell_percent_method',['Hematology' =>'Hematology'] , old('nucleated_red_blood_cell_percent_method'),--}}
        {{--['class' =>'form-control']) }}--}}
            {{--{{ Form::select('nucleated_red_blood_cell_percent_unit',['%' =>'%'] , old('nucleated_red_blood_cell_percent_unit'),--}}
        {{--['class' =>'form-control']) }}--}}
            {{--<span class="help-block">Nil in Adult</span>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-sm-6 padding-null">--}}
        {{--{{ Form::label('red_cell_distribution_count', 'Red Cell Distribution Width (fL)') }}--}}
        {{--<div class="form-inline">--}}
            {{--{{ Form::number('red_cell_distribution_count', old('red_cell_distribution_count'), [ 'class' =>'form-control' ,'placeholder' => 'Red Cell Distribution Width (fL)', 'step' => '.01']) }}--}}
            {{--{{ Form::select('red_cell_distribution_count_method',['Hematology' =>'Hematology'] , old('red_cell_distribution_count_method'),--}}
        {{--['class' =>'form-control']) }}--}}
            {{--{{ Form::select('red_cell_distribution_count_unit',['fL' =>'fL'] , old('red_cell_distribution_count_unit'),--}}
        {{--['class' =>'form-control']) }}--}}
            {{--<span class="help-block with-errors">39 - 46</span>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-sm-6 padding-null">--}}
        {{--{{ Form::label('platelet_distribution_width', 'Platelet Distribution Width (fL)') }}--}}
        {{--<div class="form-inline">--}}
            {{--{{ Form::number('platelet_distribution_width', old('platelet_distribution_width'), [ 'class' =>'form-control' ,'placeholder' => 'Platelet Distribution Width (fL)', 'step' => '.01']) }}--}}
            {{--{{ Form::select('platelet_distribution_width_method',['Hematology' =>'Hematology'] , old('platelet_distribution_width_method'),--}}
        {{--['class' =>'form-control']) }}--}}
            {{--{{ Form::select('platelet_distribution_width_unit',['fL' =>'fL'] , old('platelet_distribution_width_unit'),--}}
        {{--['class' =>'form-control']) }}--}}
            {{--<span class="help-block">9.6 - 15.2</span>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-sm-6 padding-null">--}}
        {{--{{ Form::label('mean_platelet_volume', 'Mean Platelet Volume (fL)') }}--}}
        {{--<div class="form-inline">--}}
            {{--{{ Form::number('mean_platelet_volume', old('mean_platelet_volume'), [ 'class' =>'form-control' ,'placeholder' => 'Mean Platelet Volume (fL)', 'step' => '.01']) }}--}}
            {{--{{ Form::select('mean_platelet_volume_method',['Hematology' =>'Hematology'] , old('mean_platelet_volume_method'),--}}
        {{--['class' =>'form-control']) }}--}}
            {{--{{ Form::select('mean_platelet_volume_unit',['fL' =>'fL'] , old('mean_platelet_volume_unit'),--}}
        {{--['class' =>'form-control']) }}--}}
            {{--<span class="help-block">6.5 - 12.0</span>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-sm-6 padding-null">--}}
        {{--{{ Form::label('platelet_large_cell_ratio', 'Platelet Large Cell Ratio (%)') }}--}}
        {{--<div class="form-inline">--}}
            {{--{{ Form::number('platelet_large_cell_ratio', old('platelet_large_cell_ratio'), [ 'class' =>'form-control' ,'placeholder' => 'Platelet Large Cell Ratio (%)', 'step' => '.01']) }}--}}
            {{--{{ Form::select('platelet_large_cell_ratio_method',['Hematology' =>'Hematology'] , old('platelet_large_cell_ratio_method'),--}}
        {{--['class' =>'form-control']) }}--}}
            {{--{{ Form::select('platelet_large_cell_ratio_unit',['%' =>'%'] , old('platelet_large_cell_ratio_unit'),--}}
        {{--['class' =>'form-control']) }}--}}
            {{--<span class="help-block with-errors">19.7 - 42.4</span>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="col-sm-6 padding-null">
        {{ Form::label('plateletcript',__('phr.cbc.label.plateletcript')) }}
        <div class="form-inline">
            {{ Form::number('plateletcript', old('plateletcript'), [ 'class' =>'form-control' ,'placeholder' => __('phr.cbc.placeholder.plateletcript'), 'step' => '.01']) }}
            {{ Form::select('plateletcript_method',['Hematology' =>__('phr.cbc.placeholder.hematology')] , old('plateletcript_method'),
        ['class' =>'form-control']) }}
            {{ Form::select('plateletcript_unit',['%' =>__('phr.cbc.unit.basophils_unit')] , old('plateletcript_unit'),
        ['class' =>'form-control']) }}
            <span class="help-block">{{__('phr.cbc.validation_msg.plateletcript')}}</span>
        </div>
    </div>
</div>
<div class="col-md-12 col-xs-12 padding-null m-t-10px">
    @if(isset($list))
        <button type="submit" class="btn-alt small active doc-btn ">{{__('phr.common.action.update')}}</button>
    @else
        <button type="submit" class="btn-alt small active doc-btn ">{{__('phr.common.action.create')}}</button>
        <button type="reset" class="btn-alt small active doc-btn reset-btn">{{__('phr.common.action.reset')}}</button>
    @endif
</div>
