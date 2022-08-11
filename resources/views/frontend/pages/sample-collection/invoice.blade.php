@extends('frontend.layouts.theme.master')

{{--@section('title')--}}
{{--    {!! 'Insurance Claim | ' . app_name()  !!}--}}
{{--@endsection--}}
@section('title')
    {!! 'Sample Collection | Invoice ' . app_name()  !!}
@endsection
@section('after-styles')
    <style>
        .table{
            width: 90%;
            border: none!important;
            background-color: rgba(54, 183, 180, 0.05);
        }
        .table td{
            border: none !important;
        }
        .btn{
            background-color: #36B7B4!important;
            color: white;
            margin-bottom: 10px;
            /*width: 20%;*/
        }

        .btn:hover{
            background-color: #FF6D00 !important;
            color: #f0f0f0;
        }

        @media screen and (max-width: 1030px) {
            .table {
                width: 100%;
            }
        }
        @media screen and (min-width: 400px) {
            .btn {
                width: 20%;
            }
        }
        label{
            font-weight: 600;
            margin-bottom: 5px;
        }
        .shipping-info{
            padding: 10px;
            border: 1px solid #36B7B4;
            background: #fff;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .shipping-info p {
            margin-bottom: 10px;
            font-size: 18px;
            font-weight: 300;
            color: #2f2f2f;
        }
        .shipping-seperatro{
            border: 1px solid #36B7B4;
        }

        .btn-section .invoice-btn{
            width: 90% !important;
            height: 50px;
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
                            Invoice
                        </h2>
                    </div>
                </section>
            </div>
        </div>
        <div id="home-wrap" class="content-section fullpage-wrap" >
            <div class="row no-margin">
                <div class="col-md-12">
                    <div class="row padding-bottom-null ">
                        <div class="col-md-12  margin-bottom-null padding-bottom-null" style="background: linear-gradient(180deg, #F4F6F8 0%, #FFFFFF 100%);">
                                <div class="col-md-1"></div>
                                <div class="col-md-6" style="margin-top: 30px">
                                    <h4><strong>Shipping Information</strong></h4>
                                    <hr class="shipping-seperatro">
                                    <div class="col-md-12 shipping-info">
                                        <label for="">Name:</label>
                                        {{$user->name}}
                                    </div>
                                   <div class="col-md-12 shipping-info">
                                       <label for="">Request Date & Time:</label>
                                       {{isset($params->request_date) ? $params->request_date :''}} &nbsp;& {{isset($params->request_time) ? $params->request_time :''}}
                                   </div>
                                    <div class="col-md-12 shipping-info">
                                        <label for="" class="">Address:</label> <br>
                                    <p>    {{isset($params->address) ? $params->address :''}}, {{isset($params->area) ? $params->area :''}},</p>
                                       <p> {{isset($params->district) ? $params->district :''}},</p>
                                       <p> {{isset($params->division) ? $params->division :''}}.</p>
                                    </div>

                                </div>
                                <div class=" col-md-4 pull-right" style="margin-top: 30px">
                                            <table class="table">
                                                <tr>
                                                    @foreach($test_data as $key=> $value)
                                                        <td>   {{$key}}</td>
                                                        <td align="right">   {{$value}} BDT</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="2"><strong>Additional Charge</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>PPE Cost</td>
                                                    <td align="right">{{$ppe_cost}}.00 BDT</td>
                                                </tr>
                                                <tr>
                                                    <td>Service Charge</td>
                                                    <td align="right">{{$sample_collection_cost}}.00 BDT</td>
                                                </tr>
                                                <tr>
                                                    <td align="right"><strong>Total</strong></td>
                                                    <td align="right">{{$total}}.00 BDT</td>
                                                </tr>
                                            </table>
                                    <div class="btn-section">
                                        {!! Form::open( ['route' => ['frontend.sample-collection.store'], 'method' => 'POST','class' =>'form-horizontal login', 'data-parsley-validate']) !!}

                                        <input type="hidden" name="params" value="{{ json_encode($params) }}">
                                        <input type="hidden" name="test_dat" value="{{ json_encode($test_data) }}">
                                        <input type="hidden" name="lab_test_ids" value="{{ json_encode($lab_test_ids) }}">
                                        <input type="hidden" name="partner_id" value="{{$partner_id }}">
                                        <input type="hidden" name="total_price" value="{{$total }}">
                                        <button type="submit" class="btn invoice-btn">
                                            Confirm
                                        </button>
                                        {!! Form::close() !!}
                                    </div>

                                </div>
                                <div class="col-md-1"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection

@section('before-scripts-end')
    <script>
        $(document).ready(function() {
            var testPrice = $("#test_price").val();
            console.log(testPrice)
        });
    </script>

@endsection
