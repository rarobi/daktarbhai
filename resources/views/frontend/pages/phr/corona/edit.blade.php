@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'Covid vaccine | ' . app_name()  !!}
@endsection

@section('main-content')
    <div class="bhoechie-tab-content active">
        <div class="col-md-12">
            <div class="col-md-10">
                <h3 class="profile-title"> {{__('profile.corona.edit_title')}}</h3>
            </div>
        </div>
        <div class="row">
            {!! Form::open(['route' => ['frontend.phr.corona.vaccine.update', $vaccine->id], 'method' => 'POST']) !!}
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
                    {{ Form::select('name', ['' => 'Select a vaccine name'] + $name_list, $vaccine->vaccine_name, ['class' =>'vaccine_name']) }}
                </div>
            </div>
            <div class="col-md-12 m-t-30 other_vaccine_name">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                    {{ Form::text('other_vaccine_name', $vaccine->vaccine_name, ['class' => 'other_name', 'placeholder' => 'Enter Other Vaccine Name']) }}
                </div>
            </div>
            <div class="col-md-12 m-t-30">
                <div class="col-md-6">
                    {{__('profile.corona.date1')}}
                </div>
                <div class="col-md-6">
                    {{ Form::text('first_vaccine_date', $vaccine->first_vaccine_date,['class' => 'date']) }}
                </div>
            </div>
            <div class="col-md-12 m-t-30 second_date">
                <div class="col-md-6">
                    {{__('profile.corona.date2')}}
                </div>
                <div class="col-md-6">
                    {{ Form::text('second_vaccine_date', $vaccine->second_vaccine_date,[ 'class' => 'date']) }}
                </div>
            </div>
            <div class="col-md-12 m-t-30">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-info active vaccine-btn ">{{__('phr.common.action.update')}}</button>
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
            });

            {{--var vaccineList = '{!! json_encode($name_list) !!}';--}}
            {{--var vaccine     = "{!! $vaccine->vaccine_name !!}";--}}
            {{--vaccineList = JSON.parse(vaccineList);--}}

            $('.other_vaccine_name').hide();
            $('.second_date').hide();
        })

        $( "select" ).on('change', function() {
            var value = $( this ).val();
            if(value == 'Other'){
                $('.other_vaccine_name').show();
            } else {
                $('.other_vaccine_name').hide();
                $('.other_name').val('');
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
