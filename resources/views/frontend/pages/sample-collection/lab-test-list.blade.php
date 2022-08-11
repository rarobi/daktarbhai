@extends('frontend.layouts.theme.master')
@section('title')
    {!! 'Sample Collection| ' . app_name()  !!}
@endsection
@section('after-styles')
    <style>
        input[type=checkbox] {

            height: 20px;
            width: 16px;
            border-radius: 15px;
        }

        i.fa.fa-plus {
            background: #36B7B4;
            padding: 3px;
            color: #ffff;
            top: -15px;
            position: relative;
            border-radius: 2px;
        }
        .test-seperator{
            border: 0.01em solid #36B7B4;
            width: 100%;
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
        @media screen and (min-width: 400px) {
            .btn {
                width: 30%;
            }
        }
        .test-list-table{
            border: 1px solid #36B7B4;
        }

        .test-list-table th {
            background: #36B7B4!important;
            border: 1px solid #36B7B4;
        }

        .test-list-table tr {
            border: 1px solid #36B7B4;
        }
        .test-list-table td {
            border: 1px solid #36B7B4;
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
                            Test List
                        </h2>
                    </div>
                </section>
            </div>
        </div>
        @if(Session::has('error'))
            <div class="claim-insurance-alert alert alert-danger" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {!! session('error') !!}
            </div>
        @endif
        <div id="home-wrap" class="content-section fullpage-wrap" >
            <div class="row no-margin"><br>
                <div class="col-md-12">
                    <div class="row padding-bottom-null">
                        <div class="col-lg-12 col-md-12 col-sm-12 margin-bottom-null padding-bottom-null">
                            {!! Form::open( ['route' => ['frontend.sample-collection.test-amount'], 'method' => 'POST','class' =>'form-horizontal login', 'data-parsley-validate']) !!}
                            <div class="row">
                                @foreach($results as $result)
{{--                                    {{dd($result->test_category_id)}}--}}
                                    <div class="col-md-4 ">
                                        <div class="table">
                                            <div>
                                                <h5>{{$result->test_category}}</h5>
                                                <a class="pull-right" data-toggle="collapse" href="#{{$result->test_category_id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                            <hr class="test-seperator">
                                            <table class="table table-responsive collapse test-list-table" id="{{$result->test_category_id}}">
                                                <tr>
                                                    <th>Test Name</th>
                                                    <th>Price</th>
                                                    <th></th>
                                                </tr>
                                                @foreach($result->lab_test_names as $test)
                                                    <tr >
                                                        <td id="test_name">{{$test->test_name}}</td>
                                                        <td id="test_price">{{$test->original_price}}</td>
                                                        <td><input type="checkbox" name="lab_test_info[]" class="lab_test_info" value="{{$test->id}}"></td>
                                                    </tr>

                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                @endforeach
                                <input type="hidden" name="test_info" value="" class="test_info">
                                    <input type="hidden" name="ppe_cost" value="{{$ppe_cost}}" >
                                    <input type="hidden" name="sample_collection_cost" value="{{$sample_collection_cost}}" >
                                    <input type="hidden" name="partner_id" value="{{$partner_id}}" >
                                    <input type="hidden" name="params" value="{{$params}}" >

                            </div>         
                        </div>
                    </div>
                 </div>
                <div class="form-group text-center">
                    <button class="btn">Next</button>
                </div>
            </div>
                {!! Form::close() !!}
        </div>
    </div>



@endsection

@section('before-scripts-end')
    <script>


            function myfunc(ele) {
                // alert('ok');

                var values = [];


                $.each($("input[name='lab_test_info[]']:checked").closest("td").siblings("td"),
                    function () {

                        // var name = $(this).siblings('td').first();
                        // var price = $(this).siblings('td').next();
                        values. push($(this).text());
                    });
                var test_info = JSON.stringify(values);
                $('.test_info').val(test_info);
            }


            $(document).ready(function() {
                $("input.lab_test_info").click(myfunc);

                $( ".btn" ).click(function() {
                    var testInfo = $('.test_info').val();
                    if(testInfo == ''){
                        swal('Please select test from test list');
                        return false;
                    }
                });
            });


    </script>


@endsection
