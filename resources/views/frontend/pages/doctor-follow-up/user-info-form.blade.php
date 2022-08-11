@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Doctor Follow Up'!!}
@endsection
@section('before-styles')
<link rel="stylesheet" href="{!! asset('assets/css/bootstrap-clockpicker.min.css') !!}">
@endsection

@section('after-styles')
    <style>



      .claim-from .form-control {
          border: 1px solid #36B7B4 !important;
          border-radius: 2px;
          height: 50px;
      }
      hr{
          border: 0.05px solid #36B7B4 !important;
          margin-bottom:20px !important;
      }

      .profile-update .login-btn {
          background-color: #36B7B4 !important;
          color: #fff !important;
          border: 1px solid #36B7B4;
          width: 80% !important;
      }




    </style>
@stop


@section('content')
    <div id="page-content" class="header-static footer-fixed" >
        <div id="home-wrap" class="content-section fullpage-wrap row dir-bg">
            <div class="col-md-12 padding-leftright-null">
                <section class="doctor page padding-md">
                    <div class="container">
                        <h2 class="text-center padding-top-null white">
                            Doctor Follow Up Request
                        </h2>
                    </div>
                </section>
            </div>
        </div>

        <div id="home-wrap" class="content-section fullpage-wrap about-page claim"  >
            <div class="claim-from">
                <div class="profile-update margin-bottom-null">
                    <div class="login-form" style="background: #fff">
                        <div class="col-md-12">
                            <h6 class="claim-title">
                                <strong>
                                    Paintent Information
                                </strong>
                            </h6>
                            <hr>
                        </div>
                        {!! Form::open( ['route' => ['frontend.doctor-follow-up.store'], 'method' => 'POST','class' =>'form-horizontal login']) !!}
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emaild">Email</label>
                                {{ Form::text('email','',['class'=>'form-control', 'required'=>'required', 'placeholder'=>'Patient email']) }}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h6 class="claim-title">
                                <strong>
                                    Address
                                </strong>
                            </h6>
                            <hr>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::select('division', ['' => 'Select Division'] + $division_list, old('district'), ['id' => 'division-list','class' => 'form-control','required' => 'required']) !!}
                                <input type="hidden" id="division_name" name="division_name">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::select('district', ['' => 'Select District'], old('district'), ['id' => 'district-list','class' => 'form-control ' ,'required' => 'required']) !!}
                                <input type="hidden" id ='district_name' name="district_name">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::select('area', ['' => 'Select Area'], old('area'), ['id' => 'area-list','class' => 'form-control' , 'required' => 'required']) !!}
                                <input type="hidden" name="area_name" value="" id="area_name">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <textarea placeholder="Address" name="address" id="" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h6 class="claim-title">
                                <strong>
                                    Covid19 Test Information
                                </strong>
                            </h6>
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('sample_provided_date','Sample provided date',['class'=>'form-control-label required-star']) }}
                                {{ Form::text('sample_provided_date','',['class'=>'form-control select_date', 'required'=>'required', 'placeholder'=>'Sample Provided Date']) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('test_result_date','Test Result Date',['class'=>'form-control-label required-star']) }}
                                {{ Form::text('test_result_date','',['class'=>'form-control select_date', 'required'=>'required', 'placeholder'=>'Date']) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('test_result','Test Result',['class'=>'form-control-label required-star']) }}
                                {{ Form::select('test_result',['positive'=>'Positive','negative'=>'Negative'],'',['class'=>'form-control', 'required'=>'required', 'placeholder'=>'Select an option']) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('sample_provide_place','Sample Provided Place',['class'=>'form-control-label required-star']) }}
                                {{ Form::text('sample_provide_place','',['class'=>'form-control', 'required'=>'required', 'placeholder'=>'Sample Provided Place']) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('tested_by','Tested By',['class'=>'form-control-label required-star']) }}
                                {{ Form::text('tested_by','',['class'=>'form-control', 'required'=>'required', 'placeholder'=>'Tested By']) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('no_of_test','No. of Test',['class'=>'form-control-label required-star']) }}
                                {{ Form::number('test_no','',['class'=>'form-control', 'required'=>'required', 'placeholder'=>'Enter test number[Ex. 1]','min'=>'1']) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
{{--                                <div class="col-md-8">--}}
{{--                                    <p class="text-bold">Do you have take corona vaccine?</p>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-8">--}}
{{--                                    <div class="form-group">--}}
                                        {{ Form::label('is_corona_tested','Do you have take corona vaccine?',['class'=>'form-control-label']) }}
{{--                                        {!! Form::radio('is_vaccine_taken', 1, ['class' => 'form-control is_vaccine_yes', 'id'=>'is_vaccine_yes', 'required' => 'required']) !!} Yes--}}
{{--                                        {!! Form::radio('is_vaccine_taken', 0, ['class' => 'form-control is_vaccine_no',  'id'=>'is_vaccine_no',  'required' => 'required']) !!} No--}}
                                    {{ Form::select('is_vaccine_taken',['1'=>'Yes','0'=>'No'],'',['id'=>'is_vaccine_taken', 'class'=>'form-control', 'required'=>'required', 'placeholder'=>'Select an option']) }}

{{--                                </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('is_corona_tested','Is corona tested',['class'=>'form-control-label']) }}
                                {{ Form::select('is_corona_tested',['1'=>'Yes','0'=>'No'],'',['class'=>'form-control','required'=>'required', 'placeholder'=>'Select an option']) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('is_sample_provided','Is sample provided',['class'=>'form-control-label']) }}
                                {{ Form::select('is_sample_provided',['1'=>'Yes','0'=>'No'],'',['class'=>'form-control','required'=>'required', 'placeholder'=>'Select an option']) }}
                            </div>
                        </div>
                        <div class="col-md-12 padding-left-null date">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('first_dosage_date','Date of First Dosage:',['class'=>'form-control-label']) }}
                                    {{ Form::text('first_dosage_date',null,['class'=>'form-control vacination_date','id'=>'form-first_dosage_date','placeholder'=>'Select Date']) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('second_dosage_date','Date of Second Dosage:',['class'=>'form-control-label']) }}
                                    {{ Form::text('second_dosage_date',null,['class'=>'form-control vacination_date','id'=>'form-second_dosage_date','placeholder'=>'Select Date']) }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-2 padding-leftright-null">
                                    <input type="hidden" name="package_info" value="{{$package_info}}">
                                    <input id="submit-contact" class="login-btn" value="{{__('claim_insurance.form.button')}}" type="submit" style="width: 100% !important">
                                </div>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

@section('before-scripts-end')
    <script src="{!! asset('assets/plugins/datepicker/js/bootstrap-datepicker.js') !!}"></script>

    <script>
        $(document).ready(function() {
            var date = new Date();
            // date.setDate(date.getDate()+1);
            $(function() {
                $(".select_date").datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    changeMonth: true,
                    changeYear:true,
                    orientation: 'bottom',
                    defaultDate: new Date(),
                });

                $(".vacination_date").datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    changeMonth: true,
                    changeYear:true,
                    orientation: 'bottom',
                    defaultDate: new Date(),
                });
            });


            $('#division-list').change(function() {
                var divisionName = $(this).val();
                $("#division_name").val($('#division-list option:selected').text());
                var URL = "{{ url('pages/division-wise-district') }}" +'/'+ divisionName;
                $.ajax({
                    type: "GET",
                    url: URL,
                    success: function(data) {
                        var options = $("#district-list");
                        options.empty();
                        options.append('<option selected="selected"  value="">Select an option</option>');
                        $.each(data, function(key, value) {
                            console.log(key,value)
                            options.append($("<option />").val(key).text(value));
                            $("#district").val(value);
                            $("#district_id").val(key);
                        });


                    }
                });
            });

            $('#district-list').change(function() {
                var districtId = $('#district-list').val();
                $("#district_name").val($('#district-list option:selected').text());
                var URL = "{{ url('pages/area-by-district') }}" +'/'+ districtId;
                $.ajax({
                    type: "GET",
                    url: URL,
                    success: function(data) {
                        var options = $("#area-list");
                        options.empty();
                        options.append('<option selected="selected" value="">Select an option</option>');
                        $.each(data, function(key, value) {
                            options.append($("<option />").val(key).text(value));
                        });
                    }
                });
            });

            $("#area-list").change(function(){
                // var selectedArea = $(this).children("option:selected").text();
                $("#area_name").val($('#area-list option:selected').text());

                // $("#area_name").val(selectedArea);
            });

            $('.date').hide();


            $('#is_vaccine_taken').change(function() {
                var is_vaccine_taken = $( this ).val();

                if(is_vaccine_taken == 1){
                    $('.date').show();
                } else {
                    $('.date').hide();
                }
            });

            // if($(":radio").prop("checked", false)){
            //     $('.date').hide();
            // }
            //
            //
            // $(":radio").change(function() {
            //     var is_vaccine_taken = $( this ).val();
            //
            //     if(is_vaccine_taken == 1){
            //         $('.date').show();
            //     } else {
            //         $('.date').hide();
            //     }
            //     $('#first_dosage_date').val("");
            //     $('#second_dosage_date').val("");
            //
            //
            // });

        });

    </script>
@endsection
