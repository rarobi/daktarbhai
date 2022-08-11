@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'PHR - BMI | ' . app_name()  !!}
@endsection

@section('main-content')

    <!-- ————————————————————————————————————————————
            ———	Phr Content
            —————————————————————————————————————————————— -->
    <!-- Content start here -->
<div class="phr-background">
    <h3 class="phr-title"> {{__('phr.bmi.create_title')}} </h3>

    <div class="phr-action">
        <a href="{{ route('frontend.phr.index', $phr) }}"><i class="ion-ios-undo"></i> {{__('phr.common.return')}}</a>
    </div>

    <div class="bmi-create">
        {!! Form::open(['route' => ['frontend.phr.store', 'bmi'], 'method' => 'POST']) !!}
        @include('frontend.pages.phr.bmi.form')
        <!-- <div class="form-group col-md-2">
          <select id="bmiheight">
            <option>Select Unit</option>
            <option value="centimeter">Centimeter</option>
            <option value="feet">Feet</option>
          </select>
          <label for="select" class="control-label"></label><i class="bar"></i>
        </div>
        <div class="form-group col-md-4">
          <div id="centimeter" class="colors">
            <input type="number" required="required"/>
            <label for="input" class="control-label">Enter Height in Centimeter</label><i class="bar"></i>
          </div>
          <div id="feet" class="input-group" class="colors">
              <input type="number" required="required" >
              <label for="input" class="control-label">Fit</label><i class="bar"></i>
              <span class="input-group-addon"> Ft </span>
              <input type="number" required="required">
              <label for="input" class="control-label">Inches</label><i class="bar"></i>
              <span class="input-group-addon"> Inches </span>
          </div>
          </div>
        <div class="form-group col-md-3">
          <input type="number" required="required"/>
          <label for="input" class="control-label">Enter Weight in KG</label><i class="bar"></i>
        </div>
        <div class="form-group col-md-3">
          <div class="input-group date">
              <input type="text" placeholder="Date" id="datepicker" class="form-control form-field"><i class="bar"></i>
          </div>
        </div>
        <div class="col-md-12">
          <button href="doctor-details.html" class="btn-alt small active doc-btn ">Create</button>
          <a href="doctor-details.html" class="btn-alt small active doc-btn">Cancel</a>
      </div> -->
        {!! Form::close() !!}
    </div>
  </div>
    <!-- ————————————————————————————————————————————
            ———	END phr Content
            —————————————————————————————————————————————— -->
@endsection

@push('after-scripts-end-stack')
<script>
$("#feet").css("display","none");
$('#feet input').removeAttr('required');
      $("#bmiheight").click(function(){
          if ($('select').val() == "cm") {
              $("#centimeter").show();
              $('#centimeter input').attr('required', 'required');
              $('#feet input').removeAttr('required');
              $("#feet").hide();
          }
          if ($('select').val() == "feet"){
              $("#centimeter").hide();
              $('#feet input').attr('required', 'required');
              $('#centimeter input').removeAttr('required');
              $("#feet").show();
          }
       });
</script>
@endpush
