@extends('frontend.layouts.theme.master')

{{--@section('title')--}}
{{--    {!! 'Insurance Claim | ' . app_name()  !!}--}}
{{--@endsection--}}
@section('title')
    {!! 'Sample Collection|Vendor ' . app_name()  !!}
@endsection
@section('after-styles')
    <style>
        strong{
            font-size: 14px;
        }
        .next-btn{
            background-color: #36B7B4;
            color: white;

        }
        .next-btn:hover{
            background-color: #FF6D00 !important;
            color: white;
        }

        .doc-images img {
            width: 55% !important;
            border-radius: 150px;
            height: 250px;
        }
        input[type=radio] {

            height: 30px;
            width: 20px;
            /*border-radius: 15px;*/
        }

        .doctor-list{
            width: 95% !important;
        }

        @media screen and (min-width: 400px) {
            .btn {
                width: 30%;
            }
        }

        @media (max-width: 768px){
            .doc-images img {
                width: 65% !important;
                border-radius: 100px;
                height: 215px;
                margin-left: 10px;
            }
        }

        @media (max-width: 480px){
            .doc-images img {
                width: 55% !important;
                border-radius: 150px;
                height: 250px;
                margin-left: 10px;
            }
        }

        /*.partner-id{*/
        /*    box-shadow:  0px 0px 5px #000 !important;*/
        /*}*/

    </style>
@stop


@section('content')

    <div id="page-content" class="header-static footer-fixed" >
        <div id="home-wrap" class="content-section fullpage-wrap row dir-bg">
            <div class="col-md-12 padding-leftright-null">
                <section class="doctor page padding-md">
                    <div class="container">
                        <h2 class="text-center padding-top-null white">
                            Select Vendor
                        </h2>
                    </div>
                </section>
            </div>
        </div>
        <div id="home-wrap" class="content-section fullpage-wrap row white">
        {!! Form::open( ['route' => ['frontend.sample-collection.test-list'], 'method' => 'POST','class' =>'form-horizontal login', 'data-parsley-validate']) !!}
        @foreach($results as $result)
                <div class="doctor-list">
{{--                    <div class="col-md-1"></div>--}}
                    <div class="col-md-5 col-sm-12 col-md-offset-1" >
                        <div class="single-doctor-box">
                            <div class="doc-single search-list " style="background-color: #ffffff">
                                <div class="col-md-12 padding-sm">
                                    <div class="doc-images text-center">
{{--                                        {{dd($result)}}--}}
                                        <img src="{!! (isset($result) && $result->logo != null) ? $result->logo : asset('assets/img/hospital12.png') !!}" alt="hospital" class="">
                                    </div>
                                </div>
                                <div class="col-md-12 text-center doctor-profile-btn">
                                    <div class="doctor-info">
                                        <h4 class="margin-bottom-small">{{$result->name}}</h4>
                                        <p class="designation">{{$result->partner_type}}</p>

                                    </div>
                                </div>
                                <div class="col-md-12 text-center margin-bottom-small">
                                    <button class="btn next-btn partner-btn" >Select</button>
                                    <input  class="provider radio_hide" type="radio" value="{{$result->id}}" name="partner_id" onclick="opConfig.reloadPrice();">
                                </div>
{{--                                <a href="#" class="btn btn-primary partner-btn">--}}
{{--                                    Select--}}
{{--                                </a>--}}
{{--                                <div class="form-group  text-center btn_section">--}}
{{--                                </div>--}}

                            </div>
                        </div>

                    </div>
{{--                    <div class="col-md-1"></div>--}}
                </div>
{{--                <div class="col-md-1 col-sm-12 padding-md">--}}
{{--                    <input type="radio" name="partner_id" class="provider" value="{{$result->id}}">--}}
{{--                </div>--}}
            @endforeach
                            <input type="hidden" name="params" value="{{json_encode($params)}}">
{{--            <div class="form-group  text-center btn_section">--}}
{{--                <button class="btn next-btn" >Next</button>--}}
{{--            </div>--}}
            {!! Form::close() !!}

        </div>
    </div>


@endsection

@section('before-scripts-end')
    <script>
        var providerSelected = false;


        $('.provider').click(function() {
            if($('.provider').is(':checked')) {
                providerSelected = true;
            } else {
                providerSelected = false;
            }
        });

        $(document).ready(function() {

            $(".partner-btn").click(function() {
                $(this).next().prop("checked", "checked");

                if($('.provider').is(':checked')) {
                    providerSelected = true;
                } else {
                    providerSelected = false;
                }

                if($('.radio_hide').is(':checked'))
                {
                    $(this).next().addClass("partner-id");

                    $('.partner-id').parent().css("box-shadow", "0px 0px 5px #000");
                }
                else {
                    $(this).parent().css("box-shadow","0px 0px 5px #fff" );
                    $('.radio_hide').removeClass("partner-id");


                }
            });

            $('.next-btn').click(function(event) {
                // alert(providerSelected);
                // return false;
                // only required when user have to choose a provider
                if(!providerSelected){
                    swal('Please select a vendor');
                    event.preventDefault();
                }
            });
        });

    </script>


@endsection
