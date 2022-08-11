@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'Covid vaccine | ' . app_name()  !!}
@endsection

@section('main-content')
    <div class="bhoechie-tab-content active">
        <div class="col-md-12">
            <div class="col-md-10">
                <h3 class="profile-title"> {{__('profile.corona.create_title')}}</h3>
            </div>
            <div class="col-md-2">
                <a href="{{ route('frontend.phr.corona.vaccine') }}" class="covid-add-btn" title="Create Vaccine"><i class="fa fa-backward"></i> {{__('profile.corona.back_btn')}}</a>
            </div>
        </div>
        <div class="row">
            {!! Form::open(['route' => ['frontend.phr.corona.vaccine.store'], 'method' => 'POST']) !!}
            <div class="col-md-12">
                <div class="col-md-6">
                    {{__('profile.corona.dose_number')}}
                </div>
                <div class="col-md-6">
                    <input  class="" type="radio" value="first" name="dose_number" checked> {{__('profile.corona.dose1')}}
                    <input  class="" type="radio" value="second" name="dose_number"> {{__('profile.corona.dose2')}}
                </div>
            </div>
            <div class="col-md-12 m-t-30">
                <div class="col-md-6">
                    {{__('profile.corona.vaccine_name')}}
                </div>
                <div class="col-md-6">
                    {{ Form::select('name', ['' => 'Select a vaccine name'] + $name_list, ['class' =>'vaccine_name']) }}
                </div>
            </div>
            <div class="col-md-12 m-t-30 other_vaccine_name">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                    {{ Form::text('other_vaccine_name', old('other_vaccine_name'),['placeholder' => 'Enter Other Vaccine Name']) }}
                </div>
            </div>
            <div class="col-md-12 m-t-30">
                <div class="col-md-6">
                    {{__('profile.corona.date1')}}
                </div>
                <div class="col-md-6">
                    {{ Form::text('first_vaccine_date', old('first_vaccine_date'),['class' => 'date']) }}
                </div>
            </div>
            <div class="col-md-12 m-t-30 second_date">
                <div class="col-md-6">
                    {{__('profile.corona.date2')}}
                </div>
                <div class="col-md-6">
                    {{ Form::text('second_vaccine_date', old('second_vaccine_date'),[ 'class' => 'date']) }}
                </div>
            </div>
            <div class="col-md-12 m-t-30">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-info active vaccine-btn ">{{__('phr.common.action.create')}}</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('after-scripts')
    <script>
        $( document ).ready(function() {
            $('.date').datepicker({
                format: 'yyyy-mm-dd',
                orientation: "bottom"
            });

            $('.other_vaccine_name').hide();
            $('.second_date').hide();
        })

        $( "select" ).on('change', function() {
            var value = $( this ).val();
            if(value == 'Other'){
                $('.other_vaccine_name').show();
            } else {
                $('.other_vaccine_name').hide();
            }
        });

        $("input[type='radio']").click(function(){
            var radioValue = $("input[name='dose_number']:checked").val();
            if(radioValue == 'first'){
                $('.second_date').hide();
            } else {
                $('.second_date').show();
            }
        });

    </script>
@endsection
