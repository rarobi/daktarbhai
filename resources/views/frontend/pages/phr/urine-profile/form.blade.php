<div class="col-sm-12">

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('color', 'Colour') !!}
                {!! Form::select('color', [
                    '' => 'Select Colour',
                    'Straw'                 => 'Straw',
                    'Brown'                 => 'Brown',
                    'Orange'                => 'Orange',
                    'Purple'                => 'Purple',
                    'Yellow'                => 'Yellow',
                    'Transparent'           => 'Transparent',
                    'Dark Yellow'           => 'Dark Yellow',
                    'Blue or Green'         => 'Blue or Green',
                    'Amber or Honey'        => 'Amber or Honey',
                    'Transparent Yellow'    => 'Transparent Yellow',
                    ], old('color'), ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('appearance', 'Appearance') !!}
                {!! Form::select('appearance', [
                    ''          => 'Select Appearance',
                    'Clear'     => 'Clear',
                    'Turbid'    => 'Turbid',
                    'Cloudy'    => 'Cloudy',
                    'Hazy'      => 'Hazy',
                    'Deep Hazy' => 'Deep Hazy'], old('appearance'), ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('sediment', 'Sediment') !!}
                {!! Form::select('sediment', [
                ''       => 'Select an Option',
                'nil'    => 'Nil',
                'trace'  => 'Trace',
                '(+)'    => '(+)',
                '(++)'   => '(++)',
                '(+++)'  => '(+++)',
                'plenty' => 'Plenty'
                ], old('sediment'), ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('reaction', "Reaction") !!}
                {!! Form::select('reaction', ['' => 'Select Reaction', 'Acidic' => 'Acidic', 'Alkaline' => 'Alkaline'], old('reaction'), ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('phosphate', 'Phosphate') !!}
                {!! Form::select('phosphate', [
                ''       => 'Select an Option',
                'nil'    => 'Nil',
                'trace'  => 'Trace',
                '(+)'    => '(+)',
                '(++)'   => '(++)',
                '(+++)'  => '(+++)',
                'plenty' => 'Plenty'
                ], old('phosphate'), ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('glucose', 'Glucose [Sugar]') !!}
                {!! Form::select('glucose', [
                ''       => 'Select an Option',
                'nil'    => 'Nil',
                'trace'  => 'Trace',
                '(+)'    => '(+)',
                '(++)'   => '(++)',
                '(+++)'  => '(+++)',
                'plenty' => 'Plenty'
                ], old('glucose'), ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('albumin', 'Albumin') !!}
                {!! Form::select('albumin', [
                ''       => 'Select an Option',
                'nil'    => 'Nil',
                'trace'  => 'Trace',
                '(+)'    => '(+)',
                '(++)'   => '(++)',
                '(+++)'  => '(+++)',
                'plenty' => 'Plenty'
                ], old('albumin'), ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('rbc_value', "Red Blood Cell") !!}
                {!! Form::select('rbc_value', [
                ''       => 'Select an Option',
                'nil'    => 'Nil',
                'trace'  => 'Trace',
                '(+)'    => '(+)',
                '(++)'   => '(++)',
                '(+++)'  => '(+++)',
                'plenty' => 'Plenty'
                ], old('rbc_value'), ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('casts_value', "Casts") !!}
                {!! Form::select('casts_value', [
                ''       => 'Select an Option',
                'nil'    => 'Nil',
                'trace'  => 'Trace',
                '(+)'    => '(+)',
                '(++)'   => '(++)',
                '(+++)'  => '(+++)',
                'plenty' => 'Plenty'
                ], old('casts_value'), ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('crystals', "Crystals") !!}
                {!! Form::select('crystals', [
                ''       => 'Select an Option',
                'nil'    => 'Nil',
                'trace'  => 'Trace',
                '(+)'    => '(+)',
                '(++)'   => '(++)',
                '(+++)'  => '(+++)',
                'plenty' => 'Plenty'
                ], old('crystals'), ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('taken_datetime', "Taken Date") !!}
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    {!! Form::text('taken_datetime', old('taken_datetime'), ['class' => 'form-control pull-right datepicker', 'data-date-end-date' => '0d', 'id' => 'taken_datetime', 'placeholder' => "YYYY-MM-DD", 'required' => 'required']) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('epithelial_cell_min', "Epithelial Cell") !!}
                <div class="input-group">
                    {!! Form::number('epithelial_cell_min', old('epithelial_cell_min'), ['class' => 'form-control epithelial_cell', 'id' => 'epithelial_cell_min', 'placeholder' => "Min"]) !!}
                    <span class="input-group-addon"> - </span>
                    {!! Form::number('epithelial_cell_max', old('epithelial_cell_max'), ['class' => 'form-control epithelial_cell', 'id' => 'epithelial_cell_max', 'placeholder' => "Max"]) !!}
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <br>
            <strong>OR</strong> Plenty : <input type="checkbox" name="epithelial_cell_status" id="epithelial_cell_status" value="plenty" onclick="disableEpithelialCell()"  {!! isset($list->epithelial_cell_status) ? 'checked' : '' !!} >
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('pus_cell_min', "PUS Cell") !!}
                <div class="input-group">
                    {!! Form::number('pus_cell_min', old('pus_cell_min'), ['class' => 'form-control pus_cell', 'id' => 'pus_cell_min', 'placeholder' => "Min"]) !!}
                    <span class="input-group-addon"> - </span>
                    {!! Form::number('pus_cell_max', old('pus_cell_max'), ['class' => 'form-control pus_cell', 'id' => 'pus_cell_max', 'placeholder' => "Max"]) !!}
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <br>
            <strong>OR</strong> Plenty : <input type="checkbox" name="pus_cell_status" id="pus_cell_status" value="plenty" onclick="disablePusCell()" {!! isset($list->pus_cell_status) && $list->pus_cell_status == 'plenty' ? 'checked' : '' !!} >
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('ketones', "Ketones") !!}
                {!! Form::text('ketones', old('ketones'), ['class' => 'form-control', 'placeholder' => "Ketones"]) !!}
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('sg', "Specific Gravity") !!}
                {!! Form::text('sg', old('sg'), ['class' => 'form-control', 'placeholder' => "Specific Gravity - SG"]) !!}
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('ph_value', "pH Value") !!}
                {!! Form::text('ph_value', old('ph_value'), ['class' => 'form-control', 'placeholder' => "pH Value"]) !!}
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('wbc_value', "White Blood Cell") !!}
                {!! Form::text('wbc_value', old('wbc_value'), ['class' => 'form-control', 'placeholder' => "White Blood Cell"]) !!}
            </div>
        </div>
    </div>

    <div class="row">
        {{--<div class="col-sm-3">--}}
            {{--<div class="form-group">--}}
                {{--{!! Form::label('blood', "Blood") !!}--}}
                {{--{!! Form::text('blood', old('blood'), ['class' => 'form-control', 'placeholder' => "Blood Count"]) !!}--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('leucocytes', "Leukocytes") !!}
                {!! Form::text('leucocytes', old('leucocytes'), ['class' => 'form-control', 'placeholder' => "Leukocytes"]) !!}
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('erythrocytes', "Erythrocytes") !!}
                {!! Form::text('erythrocytes', old('erythrocytes'), ['class' => 'form-control', 'placeholder' => "Erythrocytes"]) !!}
            </div>
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
