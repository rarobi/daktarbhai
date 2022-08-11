<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Daktarbhai">

    <!-- ———————————————————————————————————————
    ———	Google Meta property start here
    ————————————————————————————————————————— -->
    <meta name="keywords" content="">
    <meta name="description" content="" />

    <!-- ———————————————————————————————————————
    ———	Facebook Meta property start here
    ————————————————————————————————————————— -->
    <meta property="og:url" content="" />
    <meta property="og:type" content="" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="" />

    <!-- ————————————————————————————————————————————————————————————————————————————————————————————————————————
    ———	The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags
    ————————————————————————————————————————————————————————————————————————————————————————————————————————————— -->
    <title>Plan/Package Subscription by BKash</title>

    @include('frontend.layouts.theme.partials.stylesheets')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{!! asset('assets/img/favicon.png') !!}" type="image/x-icon"/>
    <style media="screen">
        .bkash-header{
            padding: 0px;
            margin: 0px;
        }
        .bkash-payment{
            padding: 120px 0 150px 0;
            background-image: url('{!! asset('assets/img/bkash-bg.png') !!}');
            width: 100%;
            float: left;
            margin-top: -160px;
            position: relative;
            opacity: 1;
            display: block;
            z-index: 1;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .bkash-header #logo img {
            margin: 15px 0;
        }
        .he-info {
            padding-top: 40px;
            color: #fff;
        }
        .he-info a strong{
            color: #fff;
            font-weight: 500 !important;
        }
        .bkash-payment .text_bn {
            font-family: 'Georgia', 'SolaimanLipi', sans-serif !important;
            font-size: 16px;
            color: #333 !important;
        }
        .bkash-payment .form-top {
            overflow: hidden;
            padding: 0 25px 5px 25px;
            background: #245AAA;
            text-align: left;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            border: solid #1e55a8;
            border-width: 1px;
            border-bottom: none;
        }
        .bkash-payment .form-top-left {
            float: left;
            width: 80%;
            padding-top: 10px;
        }
        .bkash-payment .form-top-right {
            float: left;
            width: 20%;
            font-size: 32px;
            color: #fff;
            text-align: right;
        }
        .bkash-payment .form-bottom {
            padding: 10px 25px 30px 25px;
            background: #fff;
            text-align: left;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
            border: solid #1e55a8;
            border-width: 1px;
            border-top: none;
            margin-bottom: 5px;
            min-height: 390px;
        }
        .bkash-payment .form-top-left h3 {
            margin-top: 0;
            font-size: 22px;
            font-weight: 300;
            color: #fff;
            line-height: 30px;
        }
        .bkash-payment .text_en{
            font-weight: 400;
            font-family: 'Georgia', 'SolaimanLipi', sans-serif !important;
        }
        .bkash-payment .form-bottom table{
            border: 0px solid #fff !important;
            padding: 0px;
        }
        .bkash-payment .form-bottom td{
            border: 0px solid #fff;
            padding: 5px 0px !important;
        }
        .bkash-payment input#bkashvalidate {
            background: #245AAA;
            color: #fff;
            padding: 5px 30px;
            width: 150px !important;
            border-radius: 3px;
            border: 1px solid #245AAA;
        }
        .bkash-payment input#bkashvalidate:hover {
            background: #fff;
            color: #245AAA;
        }
    </style>
</head>
<body>
<!-- ————————————————————————————————————————————
———	Main Wrap
—————————————————————————————————————————————— -->

<div id="main-wrap">
    <header class="bkash-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div id="logo">
                        <a class="navbar-brand" href="">
                            <img src="{!! asset('assets/img/login-logo.png') !!}" class="normal" alt="logo">
                            <img src="{!! asset('assets/img/login-logo.png') !!}" class="retina" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="he-info">
                        <span class="li-text">Having Problems? Call Support:</span>
                        <a href="#"><strong>16643</strong></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ————————————————————————————————————————————
    ———	END Header & Menu
    —————————————————————————————————————————————— -->

    <!--  Page Content, class footer-fixed if footer is fixed  -->
    <div id="page-content" class="header-static footer-fixed">
        <div id="home-wrap" class="content-section fullpage-wrap row">
            <div class="col-md-12 padding-leftright-null">
                <!-- ————————————————————————————————————————————
                ———	Contact Content Start here
                —————————————————————————————————————————————— -->
                <section class="bkash-payment page">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-xs-12 pull-right form-box">
                                <div class="form-top">
                                    <div class="form-top-left">
                                        <h3> Bkash Payment Method</h3>
                                    </div>
                                    <div class="form-top-right">
                                        <i class="fa fa-credit-card"></i>
                                    </div>
                                </div>
                                <div class="form-bottom">
                                    <!-- BODY -->
                                    {!! Form::open(['route' => ['frontend.subscription.confirm-payment.bkash'], 'method' => 'POST']) !!}

                                    <input type="hidden" name="userPlanProviderIDs" id="" value="{{ $transactionInfo }}">

                                    <table class="table2" style="width:100%;text-align:left;font-size:16px;">
                                        <tr>
                                            <td colspan="2" style="text-align:right;">
                                                <a href='#'><span id="show_bn" class="choose_lang">Bangla</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a href='#'><span id="show_en" class="choose_lang">English</span></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="border-top: 5px solid #E90157; padding-top: 10px;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="text_bn">বিকাশ মার্চেন্ট অ্যাকাউন্টঃ</div>
                                                <div class="text_en">Merchant bKash Account:</div>
                                            </td>
                                            <td>
                                                <div class="text_bn"><strong style="color: #E70157"> ০১৬২৯৫৫৫২২২</strong></div>
                                                <div class="text_en"><strong style="color: #E70157">01629555222</strong></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                <div class="text_bn"> পরিমাণঃ </div>
                                                <div class="text_en"> Amount: </div>
                                            </td>
                                            <td>
                                                @if($planDiscountedPrice>0)
                                                    <div class="text_bn"><span class="text_userinput"><strong style="color: #E70157">{!! ($planDiscountedPrice>0)?$planDiscountedPrice:$planOriginalPrice !!}</strong> টাকা   <strike style="color: #E70157"> {!! $planOriginalPrice !!} টাকা</strike></span></div>
                                                    <div class="text_en"><span class="text_userinput">BDT <strong style="color: #E70157">{!! ($planDiscountedPrice>0)?$planDiscountedPrice:$planOriginalPrice !!}</strong>   <strike style="color: #E70157"> BDT {!! $planOriginalPrice !!} </strike></span></div>
                                                @else
                                                    <div class="text_bn"><span class="text_userinput"><strong style="color: #E70157">{!! $planOriginalPrice !!}</strong> টাকা   </span></div>
                                                    <div class="text_en"><span class="text_userinput">BDT <strong style="color: #E70157">{!! $planOriginalPrice !!}</strong></span></div>
                                                @endif

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="text_bn"> রেফারেন্স উল্লেখ করুনঃ</div>
                                                <div class="text_en"> Reference:</div>
                                            </td>
                                            <td  >
                                                <div class="text_bn"><strong style="color: #E70157;">DHKB007</strong> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; কাউন্টার নম্বর <strong style="color: #1A7BCC">1</strong></div>
                                                <div class="text_en"><strong style="color: #E70157;">DHKB007</strong> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; Counter No: <strong style="color: #1A7BCC">1</strong></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="text_bn"  style="width:auto;display: inline-block;">লেনদেন আইডিঃ</span>
                                                <span class="text_en"  style="width:auto;display: inline-block;">Transaction ID:</span>
                                            </td>
                                            <td>
                                                <input type="text" name="trx_number" id="bkash_trxid" required="required" style="max-width:150px;"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="padding-bottom: 10px; text-align: center;">
                                                <br/>
                                                <input type="submit" name="bkashvalidate" id="bkashvalidate" value="Confirm" style="width: 80px;">
                                            </td>
                                        </tr>
                                    </table>
                                    {!! Form::close() !!}
                                </div>
                                <!-- end of trx_form_div -->
                            </div>
                            <div class="col-md-6 col-xs-12 pull-left form-box">
                                <div class="form-top">
                                    <div class="form-top-left">
                                        <h3>How to make payment using bKash</h3>
                                    </div>
                                    <div class="form-top-right">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                </div>
                                <div class="form-bottom">
                                    <table style='width: 100%;'>
                                        <tr>
                                            <td colspan="2"  style=" text-align:center; font-size:24px; padding:10px 0px 5px;font-size: 20px;">
                                                <div class="text_bn" style="color:#1A7BCC;font-size: 22px;margin-bottom: 5px;">যেভাবে <span style="color:#E70157;">বিকাশ অ্যাকাউন্টের</span> সাহায্যে পেমেন্ট করতে পারেন</div>
                                                <div class="text_en" style="color:#1A7BCC">How to Make Payment using <span style="color:#E70157">bKash Account</span></div>
                                            </td>
                                        </tr>
                                        <tr style=" text-align:center; font-size:18px; ">
                                            <td colspan="2" style="border-bottom:1px solid #E90157; padding:5px 0px 10px;font-size: 15px;">
                                                <div class="text_bn text_lang_left" style="color: #222;">আপনার যদি বিকাশ অ্যাকাউন্ট থাকে তাহলে নিমোক্ত ধাপগুলো অনুসরণ করুন </div>
                                                <div class="text_en text_lang_left" style="color: #222;">If you have a bKash account then follow the steps below</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 60px;">
                                                <div class="text_bn text_lang_left">ধাপ ১</div>
                                                <div class="text_en text_lang_left">STEP 1</div>
                                            </td>
                                            <td style="">
                                                <div class="text_bn">ডায়াল *২৪৭#</div>
                                                <div class="text_en">Dial  *247# </div>
                                            </td>
                                        <tr>
                                            <td style="">
                                                <div class="text_bn text_lang_left">ধাপ ২</div>
                                                <div class="text_en text_lang_left">STEP 2</div>
                                            </td>
                                            <td style="">
                                                <div class="text_bn">অপশন বেছে নিনঃ "পেমেন্ট"</div>
                                                <div class="text_en">Choose Option: "Payment" </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="">
                                                <div class="text_bn text_lang_left">ধাপ ৩</div>
                                                <div class="text_en text_lang_left">STEP 3</div>
                                            </td>
                                            <td style="">
                                                <div class="text_bn">বিকাশ মার্চেন্ট অ্যাকাউন্ট লিখুন:&nbsp;&nbsp;<strong style="color: #1A7BCC">০১৬২৯৫৫৫২২২</strong></div>
                                                <div class="text_en">Enter Merchant bKash Account No: &nbsp;&nbsp;<strong style="color: #1A7BCC">01629555222</strong></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="">
                                                <div class="text_bn text_lang_left">ধাপ ৪</div>
                                                <div class="text_en text_lang_left">STEP 4</div>
                                            </td>
                                            <td style="">
                                                @if($planDiscountedPrice>0)
                                                    <div class="text_bn"> টাকার পরিমাণঃ :&nbsp;&nbsp;<span class="text_userinput"><strong style="color: #1A7BCC">{!! $planDiscountedPrice !!}</strong></span></div>
                                                    <div class="text_en">Enter Amount: &nbsp;&nbsp;<span class="text_userinput"><strong style="color: #1A7BCC">{!! $planDiscountedPrice !!}</strong></span></div>
                                                @else
                                                    <div class="text_bn"> টাকার পরিমাণঃ :&nbsp;&nbsp;<span class="text_userinput"><strong style="color: #1A7BCC">{!! $planOriginalPrice !!}</strong></span></div>
                                                    <div class="text_en">Enter Amount: &nbsp;&nbsp;<span class="text_userinput"><strong style="color: #1A7BCC">{!! $planOriginalPrice !!}</strong></span></div>
                                                @endif

                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="">
                                                <div class="text_bn text_lang_left">ধাপ ৫</div>
                                                <div class="text_en text_lang_left">STEP 5</div>
                                            </td>
                                            <td style="">
                                                <div class="text_bn">রেফারেন্স উল্লেখ করুনঃ :&nbsp;&nbsp;<span class="text_userinput"><strong style="color: #1A7BCC">DHKB007</strong></span></div>
                                                <div class="text_en">Enter Reference: &nbsp;&nbsp;<span class="text_userinput"><strong style="color: #1A7BCC">DHKB007</strong></span></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="">
                                                <div class="text_bn text_lang_left">ধাপ ৬</div>
                                                <div class="text_en text_lang_left">STEP 6</div>
                                            </td>
                                            <td style="">
                                                <div class="text_bn">কাউন্টার নম্বর প্রবেশ করুনঃ <strong style="color: #1A7BCC">১</strong></div>
                                                <div class="text_en">Enter Counter No: <strong style="color: #1A7BCC">1</strong></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="">
                                                <div class="text_bn text_lang_left">ধাপ ৭</div>
                                                <div class="text_en text_lang_left">STEP 7</div>
                                            </td>
                                            <td style="">
                                                <div class="text_bn">লেনদেন নিশ্চিত করতে পিন প্রবেশ করুনঃ XXXX</div>
                                                <div class="text_en">Enter Your Pin to Confirm the Transaction: XXX</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="">
                                                <div class="text_bn text_lang_left">ধাপ ৮</div>
                                                <div class="text_en text_lang_left">STEP 8</div>
                                            </td>
                                            <td style="">
                                                <div class="text_bn">
                                                    লেনদেন সম্পূর্ণ করতে লেনদেন আইডি ব্যবহার করুন
                                                </div>
                                                <div class="text_en">
                                                    Use Transaction ID to complete your Transaction
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    @include('frontend.layouts.theme.partials.footer')
</div>

@include('frontend.layouts.theme.partials.scripts')
@section('before-scripts-end')
    <script src="{!! asset('assets/plugins/datepicker/js/bootstrap-datepicker.js') !!}"></script>
@endsection

<script type="text/javascript">
    $(document).ready(function(){
        $('text_bn').css("background-color", "yellow");
        $('.text_en').hide();
        $('#show_bn').click(function(){
            $('.text_bn').show();
            $('.text_en').hide();
        });
        $('#show_en').click(function(){
            $('.text_en').show();
            $('.text_bn').hide();
        });
    });
</script>
</body>
</html>
