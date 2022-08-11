@extends('frontend.layouts.theme.master')

{{--@section('title')--}}
{{--    {!! 'Insurance Claim | ' . app_name()  !!}--}}
{{--@endsection--}}
@section('title')
    {!! 'Doctor Follow Up ' . app_name()  !!}
@endsection
@section('after-styles')
    <style>
        strong{
            font-size: 14px;
        }

        button.btn.next-btn {
            width: 95%;
            height: 50px;
            border-radius: 6px;
            background-color: #36B7B4;
            color: white;
        }
        .next-btn:hover{
            background-color: #FF6D00 !important;
            color: white;
        }
        input[type=radio] {

            height: 30px;
            width: 20px;
            /*border-radius: 15px;*/
        }

        .package-info{
            box-sizing: border-box;
            height: 50px;
            border: 1px solid #36B7B4;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            line-height: 20px;
        }

        .title-box{
            padding: 30px;
        }

        @media screen and (min-width: 400px) {
            .btn {
                width: 30%;
            }
        }
        .doctor-list{
            /* width: 95% !important; */
            margin-bottom: 20px;
        }

    </style>
@stop


@section('content')

    <div id="page-content" class="header-static footer-fixed" >
        <div id="home-wrap" class="content-section fullpage-wrap row margin-bottom-small">
            <div id="home-wrap" class="content-section fullpage-wrap row dir-bg">
                <div class="col-md-12 padding-leftright-null">
                    <section class="doctor page padding-md">
                        <div class="container">
                            <h2 class="text-center padding-top-null white">
                                Select Package
                            </h2>
                        </div>
                    </section>
                </div>
            </div>

        </div>
        <div id="home-wrap" class="content-section fullpage-wrap row white">
        {!! Form::open( ['route' => ['frontend.doctor-follow-up.user-info'], 'method' => 'POST','class' =>'form-horizontal login', 'data-parsley-validate']) !!}
        @foreach($packages as $package)
                <div class="doctor-list">
                    <div class="col-md-12 col-sm-12" >
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="doc-single" style="padding: 20px;border-radius: 5px; box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2)">
                                <div class="text-center title-box">
                                    <h3>Covid19 Follow Up</h3>
                                </div>
                                <div class="package-info">
                                    <h4>{{$package->name}}</h4>
                                </div>
                                <div class="package-info">

                                     <h6><span style="font-weight: 600">Duration:</span> {{$package->days}} Days</h6>
                                </div>
                                <div class="package-info">
                                    <h6><span style="font-weight: 600">Price:</span> {{$package->price}} BDT</h6>
                                </div>
                                <input type="hidden" name="params" value="{{json_encode($package)}}">
                                <div class="form-group  text-center btn_section">
                                    <button class="btn next-btn" >Next</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
{{--                            <input type="radio" name="partner_id" class="provider">--}}
                        </div>
                    </div>
                </div>
            @endforeach

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
            // $('.next-btn').click(function(event) {
            //     // only required when user have to choose a provider
            //     if(!providerSelected){
            //         swal('Please select a package');
            //         event.preventDefault();
            //     }
            // });
        });

    </script>


@endsection
