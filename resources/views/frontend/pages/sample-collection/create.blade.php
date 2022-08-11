@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Sample Collection'!!}
@endsection
@section('before-styles')
<link rel="stylesheet" href="{!! asset('assets/css/bootstrap-clockpicker.min.css') !!}">
@endsection

@section('after-styles')
    <style>
      .sample-collection-box{
          background: #FFFFFF;
          padding: 25px;
          border: 0.5px solid #CED7D6;
          box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
          border-radius: 10px;
      }

      .sample-collection-box input{
          margin-top: 10px !important;
          margin-bottom: 10px !important;
          border: 1px solid #36B7B4 !important;
          /*padding: 23px !important;*/
          height: 65px !important;
          font-size: 15px;
          font-weight: 500;
          border-radius: 5px !important;
      }
      .sample-collection-box select{
          margin-top: 10px !important;
          margin-bottom: 10px !important;
          border: 1px solid #36B7B4 !important;
          height: 65px;
          font-size: 15px;
          font-weight: 500;
      }

      .sample-collection-box textarea{
          margin-top: 10px !important;
          margin-bottom: 10px !important;
          border: 1px solid #36B7B4 !important;
          padding: 23px !important;
          font-size: 15px;
          font-weight: 500;
          /*color: #fff;*/
      }
        .next-btn{
            background-color: #36B7B4;
            color: white;

        }
        .next-btn:hover{
            background-color: #FF6D00 !important;
            color: white;
        }
        .text-primary {
            color:  #43e696 !important;
        }
      .clockpicker-canvas-fg {
          stroke: none;
          fill: #43e696 !important;
      }
      .clockpicker-canvas-bg-trans {
          fill: #43e696 !important;+96
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
                            Sample Collection Request
                        </h2>
                    </div>
                </section>
            </div>
        </div>
        <br>
        <div id="home-wrap" class="content-section fullpage-wrap row">
            <div class="row margin-bottom-small">
                <div class="col-md-3"> </div>
                <div class="col-md-6 sample-collection-box">
                    {!! Form::open( ['route' => ['frontend.sample-collection.user-info-submit'], 'method' => 'POST','class' =>'form-horizontal login', 'data-parsley-validate']) !!}
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group margin-leftright-null ">
                        <label for="date_of_birth">Select Date:</label>
                        <input type="text" name="request_date" placeholder="Select Date" id="date" value="" class="form-control form-field select_date" autocomplete="off" required>
                    </div>
                    <div class="form-group margin-leftright-null">
                        <label for="date">Select Time:</label>
                        <input type="text" name="request_time" placeholder="Select Time" id="select_time" value="" class="form-control form-field " autocomplete="off" required>
                    </div>
                    <div class="form-group margin-leftright-null">
                        <label for="nid">Email:</label>
                        <input type="email" placeholder="Email" name="email_address" id="" class="form-control form-field" required>
                    </div>
                    <div class="form-group margin-leftright-null">
                        <label for="date_of_birth">Address:</label>
                        <select class="division-list form-control " data-placeholder="Location" name="division_id" tabindex="-1" aria-hidden="true" required>
                            <option value="" selected="selected">Select Division</option>
                            @if(!is_null($divisions))
{{--                                {{dd($divisions,1)}}--}}
                            @foreach($divisions as $division)
                                    <option class="" value="{!! $division->division_id  !!}" >{!! $division->division_name  !!}</option>
                                    <input type="hidden" value="{!! $division->division_name  !!}" name="division">
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group margin-leftright-null">
                        <select class="district-list  form-control " data-placeholder="Location" name="district_id" tabindex="-1" aria-hidden="true" required>
                            <option value="" selected="selected">Select District</option>
                            <input type="hidden" value="" name="district" id="district">
                        </select>
                    </div>
                    <div class="form-group margin-leftright-null">
                        <select class="area-list form-control" data-placeholder="Location" name="area_id" tabindex="-1" aria-hidden="true" required>
                            <option value="" selected="selected">Select Area</option>
                            <input type="hidden" value="" name="area" id="area">
                        </select>
                    </div>
                    <div class="form-group margin-leftright-null">
                        <textarea placeholder="Address" name="address" id="" class="form-control" required></textarea>
                    </div>

                    <div class="form-group margin-leftright-null">
                        <button class="btn btn-block next-btn">Next</button>
                        {{--                    <a href="{{route('frontend.sample-collection.vendor')}}" class="btn btn-sm btn-info">Next</a>--}}
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-md-3"> </div>

            </div>

        </div>
    </div>


@endsection

@section('before-scripts-end')
    <script src="{!! asset('assets/plugins/datepicker/js/bootstrap-datepicker.js') !!}"></script>
    <script src="{!! asset('assets/js/bootstrap-clockpicker.min.js') !!}"></script>

    <script>
        $(document).ready(function() {
            var date = new Date();
            date.setDate(date.getDate()+1);
            $(function() {
                $(".select_date").datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    changeMonth: true,
                    changeYear:true,
                    orientation: 'bottom',
                    defaultDate: new Date(),
                    startDate: date,
                    maxDate: new Date()
                });
            });

            //$(function() {
                // $(".select_date").datepicker({
                //     format: 'yyyy-mm-dd',
                //     autoclose: true,
                //     changeMonth: true,
                //     changeYear:true,
                //     orientation: 'bottom',
                //     defaultDate: new Date(),
                //     startDate: "today",
                //     maxDate: new Date()
                //     //clearBtn: true
                // });
            //});

            $('.division-list').change(function() {
                var divisionName = $(this).val();
                var URL = "{{ url('pages/district-with-param') }}" +'/'+ divisionName;
                $.ajax({
                    type: "GET",
                    url: URL,
                    success: function(data) {
                        var options = $(".district-list");
                        options.empty();
                        options.append('<option selected="selected"  value="">Select an option</option>');
                        $.each(data, function(key, value) {
                            // console.log(key,value)
                            options.append($("<option />").val(key).text(value));
                            $("#district").val(value);
                        });


                    }
                });
            });

            $('.district-list').change(function() {
                var districtId = $('.district-list').val();
                var URL = "{{ url('pages/area-by-district') }}" +'/'+ districtId;
                $.ajax({
                    type: "GET",
                    url: URL,
                    success: function(data) {
                        var options = $(".area-list");
                        options.empty();
                        options.append('<option selected="selected" value="">Select an option</option>');
                        $.each(data, function(key, value) {
                            options.append($("<option />").val(key).text(value));
                        });
                    }
                });
            });

            $("select.area-list").change(function(){
                var selectedArea = $(this).children("option:selected").text();
                $("#area").val(selectedArea);
            });

            var $input = $('#select_time').clockpicker({
                default:          'now',
                placement:        'bottom',
                align:            'left',
                donetext:         'Done',
                autoclose:        false,
                vibrate:          true,
                fromnow:          0,
                twelvehour:       true
            });
        });
    </script>
@endsection
