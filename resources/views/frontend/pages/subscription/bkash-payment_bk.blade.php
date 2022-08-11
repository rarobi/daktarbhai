@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Subscription Confirmation | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('content')

    <!--  Page Content, class footer-fixed if footer is fixed  -->
    <div id="page-content" class="header-static footer-fixed">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-xs-12 pull-left">
                <div class="form-top">
                    <div class="form-top-left">
                        <h3>How to make payment using bKash</h3>
                    </div>
                </div>
                <div class="form-bottom">

                    <table style="width: 100%;">
                        <tbody>
                        <tr>
                            <td colspan="2" style=" text-align:center; font-size:24px; padding:10px 0px 5px;font-size: 20px;">
                                <div class="text_en" style="color: rgb(26, 123, 204); display: block;">How to Make Payment using <span style="color:#E70157">bKash Account</span></div>
                            </td>
                        </tr>

                        <tr style=" text-align:center; font-size:18px; ">
                            <td colspan="2" style="border-bottom:1px solid #E90157; padding:5px 0px 10px;font-size: 15px;">
                                <div class="text_en text_lang_left" style="color: rgb(34, 34, 34); display: block;">If you have a bKash account then follow the steps below</div>
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 60px;">
                                <div class="text_en text_lang_left" style="display: block;">STEP 1</div>
                            </td>
                            <td style="">
                                <div class="text_en" style="display: block;">Dial  *247# from Your Mobile Phone</div>
                            </td>
                        </tr>

                        <tr>
                            <td style="">
                                <div class="text_en text_lang_left" style="display: block;">STEP 2</div>
                            </td>
                            <td style="">
                                <div class="text_en" style="display: block;">Choose Option: "Payment" </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="">
                                <div class="text_en text_lang_left" style="display: block;">STEP 3</div>
                            </td>
                            <td style="">
                                <div class="text_en" style="display: block;">Enter Merchant bKash Account No: &nbsp;&nbsp;<strong style="color: #1A7BCC">01629555222</strong></div>
                            </td>
                        </tr>

                        <tr>
                            <td style="">
                                <div class="text_en text_lang_left" style="display: block;">STEP 4</div>
                            </td>
                            <td style="">
                                <div class="text_en" style="display: block;">Enter Amount: &nbsp;&nbsp;<span class="text_userinput"><strong style="color: #1A7BCC">500</strong></span></div>
                            </td>
                        </tr>

                        <tr>
                            <td style="">
                                <div class="text_en text_lang_left" style="display: block;">STEP 5</div>
                            </td>
                            <td style="">
                                <div class="text_en" style="display: block;">Enter Reference: &nbsp;&nbsp;<span class="text_userinput"><strong style="color: #1A7BCC">DHKB007</strong></span></div>
                            </td>
                        </tr>

                        <tr>
                            <td style="">
                                <div class="text_en text_lang_left" style="display: block;">STEP 6</div>
                            </td>
                            <td style="">
                                <div class="text_en" style="display: block;">Enter Counter No: 1</div>
                            </td>
                        </tr>

                        <tr>
                            <td style="">
                                <div class="text_en text_lang_left" style="display: block;">STEP 7</div>
                            </td>
                            <td style="">
                                <div class="text_en" style="display: block;">Enter Your Pin to Confirm the Transaction: XXXX</div>
                            </td>
                        </tr>

                        <tr>
                            <td style="">
                                <div class="text_en text_lang_left" style="display: block;">STEP 8</div>
                            </td>
                            <td style="">
                                <div class="text_en" style="display: block;">
                                    Use Transaction ID to complete your Transaction
                                </div>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-xs-12 pull-right">
                <div class="form-top">
                    <div class="form-top-left">
                        <h3>Bkash Payment Method</h3>
                    </div>
                </div>

                {!! Form::open(['route' => ['frontend.subscription.confirm-payment.bkash'], 'method' => 'POST']) !!}

                <table>
                    <tr>
                        <td width="50%">Merchant bKash Account:</td>
                        <td width="50%">01629555222</td>
                    </tr>
                    <tr>
                        <td width="50%">Total Payable Amount:</td>
                        <td width="50%">500</td>
                    </tr>
                    <tr>
                        <td width="50%">Reference:</td>
                        <td width="50%">DHKB007</td>
                    </tr>
                    <tr>
                        <td width="50%">Counter No:</td>
                        <td width="50%">1</td>
                    </tr>
                    <tr>
                        <td width="50%">Transaction ID:</td>
                        <td width="50%">
                            <input class=""  id="" type="text" name="trx_number">
                        </td>
                    </tr>
                </table>

                <input type="hidden" name="userPlanProviderIDs" id="" value="{{ $transactionInfo }}">

                {{ Form::submit('Confirm Payment') }}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('after-scripts')
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection/