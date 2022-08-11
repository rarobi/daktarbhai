@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Payment Confirmation'   !!}
@endsection

@section('after-styles')
    <style>
        .p-trams{
            margin-left: 0!important;
        }

        input[type=radio] {

            height: 18px;
            width: 15px;
            /*border-radius: 15px;*/
        }
        .
    </style>

@stop

@section('page-header-class', 'header-static')

@section('content')
{{--    <div id="home-wrap" class="content-section fullpage-wrap row doc-bg">--}}
{{--        <div class="col-md-12 padding-leftright-null" style="background-color: #00d4a4">--}}
{{--            <!-- ————————————————————————————————————————————--}}
{{--            ———	Contact Content Start here--}}
{{--            —————————————————————————————————————————————— -->--}}
{{--            <section class="">--}}
{{--                <div class="container">--}}
{{--                    <div class="text-center" >--}}
{{--                        <h4 class="white big margin-bottom-small" style="margin-top: 10px">Video Call To a Doctor</h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section>--}}
{{--        </div>--}}
{{--    </div>--}}

    <!--  Page Content, class footer-fixed if footer is fixed  -->
    <div id="page-content" class="header-static footer-fixed">
        <br>
        @if(Session::has('flash_danger'))
            <div class="claim-insurance-alert alert alert-danger" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {!! session('flash_danger') !!}
            </div>
        @endif
        <div class="row">
            <div id="home-wrap" class="content-section fullpage-wrap row">
                <div class="col-md-12 padding-leftright-null">
                    <!-- ————————————————————————————————————————————
                    ———	Contact Content Start here
                    —————————————————————————————————————————————— -->
                    <div class="row">
                        <section class="doctor page padding-md">
                            <div class="container">
                                <div class="text-center">
                                    <h4 class="grey big margin-bottom-small">Select Payment Method</h4>
                                    <p>*Choose your payment option</p>
                                </div>
                            </div>
                        </section>
                    </div>

                </div>
            </div>
{{--            {{dd($consultancy_fee,$params)}}--}}
                <div id="home-wrap" class="row">
                {!! Form::open( ['route' => ['frontend.tele-medicine.payment-confirmation'], 'method' => 'POST','class' =>'form-horizontal login', 'data-parsley-validate']) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6 col-md-offset-4">
                                <h5>MFS (Mobile Financial Services)</h5>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-4 col-md-offset-4 m-t-30">
                            <div class="payment-box" id="bkash-payment-box">
{{--                                <input class="provider" type="radio" name="provider_id" value="5" checked>--}}
{{--                                <img src="{!! asset('assets/img/bkash_logo.png') !!}" class="payment-img-box">--}}
                                <a class="payment-img" title="" onclick="return false;" href="#">
                                    <img class="payment-img-box" title="" src="{!! asset('assets/img/bkash_logo.png') !!}">
                                </a>
                                <input id="bkash_btn" class="provider radio_hide" type="radio" value="5" name="provider_id" onclick="opConfig.reloadPrice();">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row m-t-30">
                        <div class="col-md-12">
                            <div class="col-md-6 col-md-offset-4">
                                <h5>Credit Card</h5>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-4 col-md-offset-4 m-t-30">
                            <div class="payment-box" id="ssl-payment-box">
{{--                                <input class="provider" type="radio" name="provider_id" value="2">--}}
{{--                                <img src="{!! asset('assets/img/payment/ssl_logo.png') !!}" class="payment-img-box" style="margin-top: 45px">--}}
                                <a class="payment-img" title="" onclick="return false;" href="#">
                                    <img class="payment-img-box" title="" src="{!! asset('assets/img/payment/ssl_logo.png') !!}">
                                </a>
                                <input id="ssl_btn" class="provider radio_hide" type="radio" value="2" name="provider_id" onclick="opConfig.reloadPrice();">
                                <input type="hidden" name="consultancy_fee" value="{!! $consultancy_fee !!}">
                                <input type="hidden" name="request_id" value="{!! $request_id !!}">
                                <input type="hidden" name="params" value="{{json_encode($params)}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-4 m-t-30">
                            <input id="checkbox" type="checkbox" > I have read and agreed to the <a href="{!! route('frontend.terms') !!}" target="_blank"><u>Terms and Conditions</u></a>
                        </div>
                    </div>
                    <div class="row m-b-15px">
                        <div class="col-md-6 col-md-offset-4 m-t-30">
                            <button type="submit" class="btn confirm-btn" id="subscribe" >Confirm </button>
                        </div>
                    </div>
                    <br>
                {!! Form::close() !!}

{{--                    <section id="pricing">--}}
{{--                        <div class="col-md-6 col-md-offset-3 price active standard padding-leftright-null">--}}
{{--                            <div class="price-title">Payment Information</div>--}}
{{--                            <ul class="subscription-pay">--}}
{{--                                {!! Form::open( ['route' => ['frontend.tele-medicine.payment-confirmation'], 'method' => 'POST','class' =>'form-horizontal login', 'data-parsley-validate']) !!}--}}
{{--                                <li>Payment Amount : <strong>{!! $consultancy_fee !!} tk</strong></li>--}}
{{--                                   <div class="col-md-12" style="margin-bottom: 10px;">--}}
{{--                                        <div class="sub-pay">--}}
{{--                                            <label for="" class="choose-payment"><h5>Please Choose payment method</h5> </label>--}}
{{--                                            <div class="payment-area">--}}
{{--                                                <label class="">--}}
{{--                                                    <input class="provider" id="provider" type="radio" name="provider_id" value="5" data-content="">--}}
{{--                                                    <img class="m-l-5" src="{!! asset('assets/img/payment/bKash.png') !!}">--}}
{{--                                                    <strong> Pay with bKash&nbsp;</strong> &nbsp;--}}
{{--                                                </label>--}}
{{--                                                <label class="">--}}
{{--                                                    <input class="provider" id="provider" type="radio" name="provider_id" value="2" data-content="">--}}
{{--                                                    <img class="m-l-5" src="{!! asset('assets/img/payment/ssl_logo.png') !!}">--}}
{{--                                                    <strong> Cards/Mobile Banking/Net Banking&nbsp;</strong> &nbsp;--}}
{{--                                                </label><br><br>--}}
{{--                                                <label class="p-trams" style="margin-top: 5px">--}}
{{--                                                    <input id="checkbox" type="checkbox" > I have read and agreed to the <a href="{!! route('frontend.terms') !!}" target="_blank"><u>Terms and Conditions</u></a>--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <input type="hidden" name="consultancy_fee" value="{!! $consultancy_fee !!}">--}}
{{--                                    <input type="hidden" name="request_id" value="{!! $request_id !!}">--}}
{{--                                    <input type="hidden" name="params" value="{{json_encode($params)}}">--}}
{{--                                    <label class="p-trams margin-left-null" >--}}
{{--                                        <li><p class="margin-bottom-null">Dear Subscriber, due to some unavoidable circumstances, date and schedule of sample collection may change.</p></li>--}}
{{--                                        <li><p class="margin-bottom-null">প্রিয় গ্রাহক, অনিবার্য কারনবশতঃ স্যাম্পল সংগ্রহের সময়সূচী পরিবর্তন হতে পারে।--}}
{{--                                                ডাক্তারভাই এ সেবা নেয়ার জন্য ধন্যবাদ।</p></li>--}}
{{--                                    </label>--}}
{{--                                    <button type="submit" class="btn-alt active btn-lg btn-primary" href="#" id="subscribe">Confirm </button>--}}
{{--                                    {!! Form::close() !!}--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </section>--}}
                </div>
        </div>
    </div>
@endsection

@section('after-scripts')
    <script>
        var isAgree = false;
        var providerSelected = false;

        window.addEventListener("pageshow", () => {
            // update hidden input field
            $('.provider').prop('checked', false);
            $('#checkbox').prop('checked', false);
        });

        $(".payment-img").click(function() {
            $(this).next().prop("checked", "checked");

            if($('.provider').is(':checked')) {
                providerSelected = true;
            } else {
                providerSelected = false;
            }

            // alert(providerSelected);
            // return false;

            if($('#ssl_btn').is(':checked'))
            {
                $("#ssl-payment-box").css("box-shadow", "0px 0px 5px #000");
            }
            else {
                $("#ssl-payment-box").css("box-shadow","0px 0px 5px #fff" );

            }
            if($('#bkash_btn').is(':checked'))
            {
                $("#bkash-payment-box").css("box-shadow", "0px 0px 5px #000");
            }
            else {
                $("#bkash-payment-box").css("box-shadow","0px 0px 5px #fff" );

            }
        });

        // $('.payment-img-box').click(function() {
        //
        //     if($('.provider').is(':checked')) {
        //         providerSelected = true;
        //     } else {
        //         providerSelected = false;
        //     }
        //     alert(providerSelected);
        //     return false;
        // });

        $("#checkbox").change(function() {
            if(this.checked) {
                isAgree = true;
            } else {
                isAgree = false;
            }
        });

        $(document).ready(function() {
            $('#subscribe').click(function(event) {
                // alert(providerSelected);
                // return false;
                // only required when user have to choose a provider
                if(!isAgree || !providerSelected){
                    swal('please provide all information');
                    event.preventDefault();
                }
            });

            $("#make-payment-form").on('submit', function(e){
                e.preventDefault();
                var formAction = $('#make-payment-form').attr('action');
//                var radioValue = $("input[name='provider_id']:checked").val();  // Currently NOT USE
                var selectedRadioValue = $("input[type='radio']:checked").attr('data-content').toLowerCase();

                if(selectedRadioValue == 'bkash') {
                    formAction = '{{ config('subscription.bkash-subscription-url') }}';
                    $('#make-payment-form').attr('action', formAction);
                } else {
                    $('#make-payment-form').attr('action', formAction);
                }

                $("#make-payment-form").unbind('submit').bind('submit').submit();
            });


        });
    </script>

@endsection
