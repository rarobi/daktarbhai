<div class="col-md-12">
    <div class="form-group col-md-2" style="top: 15px;">
        {{__('phr.bmi.table.title.height')}}
    </div>
    <div class="form-group col-md-4">
        {{ Form::select('unit[height]', ['cm' => 'Centimeter', 'feet' =>'Feet'], old('unit[height]'), ['id' =>'bmiheight']) }}
        <label for="select" class="control-label"></label><i class="bar"></i>
    </div>

    <div class="form-group col-md-4">
        <div id="centimeter" class="colors">
            {{ Form::number('height_obj[cm]', old('height_obj[cm]'), ['required' => 'required', 'step' => '.01']) }}
            <label for="input" class="control-label">{{__('phr.bmi.validation_msg.height')}}</label><i class="bar"></i>
        </div>
        <div id="feet" class="input-group" class="colors">
            {{ Form::number('height_obj[feet]', old('height_obj[feet]'),['required' => 'required','placeholder' => 'Feet']) }}
            <span class="input-group-addon"> Ft</span>
            {{ Form::number('height_obj[inch]', old('height_obj[inch]'),['required' => 'required','placeholder' =>'Inches']) }}
            <span class="input-group-addon">  Inches </span>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group col-md-2" style="top: 15px;">
      {{__('phr.bmi.table.title.weight')}}
    </div>
    <div class="form-group col-md-4">
        {{ Form::select('unit[weight]',['kg' => 'kg', 'lb' => 'lb'] , old('unit[weight]'), ['id' =>'bmiweight']) }}
        <label for="select" class="control-label"></label><i class="bar"></i>
    </div>

    <div class="form-group col-md-4">
        {{ Form::number('weight', old('weight'), ['required' => 'required', 'step' => '.01']) }}
        <label for="input" class="control-label">{{__('phr.bmi.validation_msg.weight')}}</label><i class="bar"></i>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group col-md-2" style="top: 15px;">
        {{__('phr.common.taken_date')}}
    </div>
    <div class="form-group col-md-4">
        <div class="input-group date">
            {{ Form::text('taken_datetime', old('taken_datetime'), ['class' =>'form-control form-field phr-datepicker', 'data-date-end-date' => '0d', 'required' => 'required', 'id' => 'phr-datepicker', 'placeholder' => __('phr.common.date')]) }}
            {{--<span class="input-group-addon"><i class="fa fa-calendar"></i></span>--}}
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
