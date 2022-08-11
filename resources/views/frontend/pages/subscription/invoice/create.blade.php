<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
</head>

<body style="width:8.5in;height:11in; margin:0; padding:0;color:#555555;background:#fff;font-family: Arial, sans-serif;font-size: 14px;font-family: SourceSansPro;">
<header style="background:#fff; margin:0px; padding:0px; height:150px;">
    <div style="float:left;margin-top: 8px;">
        <img src="{!! asset('assets/img/logo.png') !!}" style="height: 50px;margin-top: 15px;margin-left: 20px;">
    </div>
    <div style="float: right;margin-right: 1in; margin-top:30px;">
        <h2 style="font-size: 22px;font-weight: normal;margin: 0;color: #2ab5e7;border-bottom: 1px solid #2ab5e7;padding-right: 120px;">Get in touch</h2>
        <p style="margin-top: 10px !important;">House# 32, Road# 7, Block – F,<br>
            Banani, Dhaka – 1213<br>
            <a href="mailto:info@hislbd.com">info@daktarbhai.com</a><br>
            Cell : 16643
        </p>
    </div>
</header>
<div style="width:7.5in; height:1in;background-color:#e6f8ff; margin:0px; padding:0px;">
    <div style="width:7.5in;padding:20px;">
        <div style="float: left; width:4in; height:0.5in;">
            {{--{!! dd($invoicesInformation->purchased_date) !!}--}}
            <div style="font-size: 14px;color: #777777;font-weight: 600;">Date : {!! isset($invoicesInformation->purchased_date) ? $invoicesInformation->purchased_date : '' !!}</div>
            <div style="font-size: 14px;color: #777777;font-weight: 600;">Invoice ID : {!! isset($invoicesInformation->transaction_id) ? $invoicesInformation->transaction_id : ''  !!}</div>
        </div>
        <div style="float: right;text-align: right;width:4.5in; height:0.5in; text-align:left;">
            <h1 style="color: #0087C3;font-size: 2.4em;;font-weight: normal;margin: 0  0 10px 0;">INVOICE</h1>
        </div>
    </div>
</div>

<div style="width:8.5in; height:7in;margin:0px; padding:0px;">
    @if(isset($user))
        <div style="margin-left: 0px; width: 2.5in;float: left; height:5in; color:#555;">
            <h3>Bill To:</h3>
            <p>{!! isset($user->name) ? $user->name : 'Not Provided' !!}<br>
                Mob: {!! $user->mobile !!} <br>
                E-mail: <a href="#">{!! isset($user->email) ? $user->email : 'Not Provided' !!}</a>
            </p>
            @if(isset($invoicesInformation->agent_code))
            <h3>Agent Info:</h3>
            <p>{!! isset($invoicesInformation->agent_name) ? $invoicesInformation->agent_name : 'Not Provided.' !!} <br>
                ID: {!! isset($invoicesInformation->agent_code) ?  $invoicesInformation->agent_code : 'Not Provided.' !!}
            </p>
            @endif
        </div>

    @endif
    <div style="width: 4in; height:7in;color:#555; float:right; margin-right:1in;">
        <h3>Invoice Details:</h3>
        <table style="width: 100%;margin-bottom: 0px;text-align: left;">
            <tbody>
            <tr>
                <td style="padding: 8px 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF !important;margin-bottom:1px;">User Name </td>
                <td style="padding: 8px 20px;border-bottom: 1px solid #FFFFFF !important;background: #95defb;color: #333;text-align: left;margin-bottom:1px;">{!! isset($user->name) ? $user->name : 'Not Provided' !!} </td>
            </tr>
            <tr>
                <td style="padding: 8px 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF !important;margin-bottom:1px;">Plan Name </td>
                <td style="padding: 8px 20px;border-bottom: 1px solid #FFFFFF !important;background: #95defb;color: #333;text-align: left;margin-bottom:1px;">{!! isset($invoicesInformation->plan_name) ? $invoicesInformation->plan_name :' ' !!} </td>
            </tr>
            <tr>
                <td style="padding: 8px 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF !important;">Plan duration </td>
                <td style="padding: 8px 20px;border-bottom: 1px solid #FFFFFF !important;background: #95defb;color: #333;text-align: left;">{!! isset($invoicesInformation->plan_duration) ? $invoicesInformation->plan_duration :'' !!} days </td>
            </tr>
            <tr>
                <td style="padding: 8px 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF !important;">Provider name </td>
                <td style="padding: 8px 20px;border-bottom: 1px solid #FFFFFF !important;background: #95defb;color: #333;text-align: left;">{!! isset($invoicesInformation->provider_name) ? $invoicesInformation->provider_name: ''  !!}  </td>
            </tr>
            <tr>
                <td style="padding: 8px 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF !important;">Payment method </td>
                <td style="padding: 8px 20px;border-bottom: 1px solid #FFFFFF !important;background: #95defb;color: #333;text-align: left;">{!! isset($invoicesInformation->payment_method) ? $invoicesInformation->payment_method : '' !!} </td>
            </tr>
            <tr>
                <td style="padding: 8px 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF !important;">Transaction number </td>
                <td style="padding: 8px 20px;border-bottom: 1px solid #FFFFFF !important;background: #95defb;color: #333;text-align: left;">{!! isset($invoicesInformation->transaction_id) ? $invoicesInformation->transaction_id : '' !!}  </td>
            </tr>
            <tr>
                <td style="padding: 8px 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF !important;">Plan original price </td>
                <td style="padding: 8px 20px;border-bottom: 1px solid #FFFFFF !important;background: #95defb;color: #333;text-align: left;">BDT {!! isset($invoicesInformation->plan_original_price) ? $invoicesInformation->plan_original_price : '' !!}  </td>
            </tr>
            <tr>
                <td style="padding: 8px 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF !important;">Transaction price </td>
                <td style="padding: 8px 20px;border-bottom: 1px solid #FFFFFF !important;background: #95defb;color: #333;text-align: left;">BDT {!! isset($invoicesInformation->transaction_price) ? $invoicesInformation->transaction_price : '' !!}  </td>
            </tr>
            <tr>
                <td style="padding: 8px 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF !important;">Discount Amount </td>
                <td style="padding: 8px 20px;border-bottom: 1px solid #FFFFFF !important;background: #95defb;color: #333;text-align: left;">BDT {!! isset($invoicesInformation->discount_amount) ? $invoicesInformation->discount_amount : (int)($invoicesInformation->plan_original_price-$invoicesInformation->transaction_price) !!}  </td>
            </tr>
            <tr>
                <td style="padding: 8px 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF !important;">Discount in percentage </td>
                <td style="padding: 8px 20px;border-bottom: 1px solid #FFFFFF !important;background: #95defb;color: #333;text-align: left;">{!! isset($invoicesInformation->discount_in_percentage) ? $invoicesInformation->discount_in_percentage : '' !!} % </td>
            </tr>

            <tr>
                <td style="padding: 8px 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF !important;">Purchased Date </td>
                <td style="padding: 8px 20px;border-bottom: 1px solid #FFFFFF !important;background: #95defb;color: #333;text-align: left;">{!! isset($invoicesInformation->purchased_date) ? $invoicesInformation->purchased_date : '' !!}</td>
            </tr>
            {{-- TODO these data need to validate from controller --}}
            <tr>
                <td style="padding: 8px 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF !important;">Activation Date  </td>
                <td style="padding: 8px 20px;border-bottom: 1px solid #FFFFFF !important;background: #95defb;color: #333;text-align: left;">{!! isset($invoicesInformation->activation_date) ? $invoicesInformation->activation_date : '' !!}  </td>
            </tr>
            <tr>
                <td style="padding: 8px 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF !important;">Expire Date </td>
                <td style="padding: 8px 20px;border-bottom: 1px solid #FFFFFF !important;background: #95defb;color: #333;text-align: left;">{!! isset($invoicesInformation->expire_date) ? $invoicesInformation->expire_date : '' !!}</td>
            </tr>
            </tbody>
            <table style="width: 100%;margin-bottom: 0px;text-align: left;float:right;">
                <tfoot>
                <tr>
                    <td style="padding: 8px 20px;text-align: center;">TOTAL</td>
                    <td style="padding: 8px 20px;text-align: center;border-bottom: 1px solid #333 !important;">{!! isset($invoicesInformation->plan_original_price) ? $invoicesInformation->plan_original_price : '' !!} tk</td>
                </tr>

                <tr>
                    <td style="padding: 8px 20px;text-align: center;">DISCOUNT
                        @if(isset($invoicesInformation->discount_in_percentage))
                            {!! $invoicesInformation->discount_in_percentage !!}
                        @else
                            0
                        @endif
                        % </td>
                    <td style="padding: 8px 20px;text-align: center;border-bottom: 1px solid #333 !important;">
                        @if(isset($invoicesInformation->discount_amount))
                            {!! $invoicesInformation->discount_amount !!}
                        @endif
                        tk
                    </td>

                </tr>

                @if(isset($invoicesInformation->transaction_price))
                <tr>
                    <td style="padding: 8px 20px;text-align: center;">GRAND TOTAL</td>
                    <td style="padding: 8px 20px;text-align: center;border-bottom: 1px solid #333 !important;">{!! $invoicesInformation->transaction_price !!} tk</td>
                </tr>
                @endif
                </tfoot>
            </table>
        </table>
    </div>
</div>

<footer style="color: #777777;width: 7.5in; padding-top:10px; height: 30px; position: absolute;  bottom: 0; border-top: 1px solid #AAAAAA; text-align: center;">
    Your health, Take care - Daktarbhai
</footer>

</body>
</html>
