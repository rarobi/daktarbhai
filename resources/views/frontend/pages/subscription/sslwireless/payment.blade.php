<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form id="payment_gw" name="payment_gw" method="POST" action="https://sandbox.sslcommerz.com/gwprocess/v3/process.php">
        <input type="hidden" name="total_amount" value="{!! $ssl->price !!}" />
        <input type="hidden" name="store_id" value="test_teledaktar" />
        <input type="hidden" name="tran_id" value="{!! $ssl->transaction_id !!}" />
        <input type="hidden" name="success_url" value="{!! $ssl->success_url !!}" />
        <input type="hidden" name="fail_url" value="{!! $ssl->failed_url !!}" />
        <input type="hidden" name="cancel_url" value="{!! $ssl->cancel_url !!}" />
        <input type="hidden" name="version" value="3.00" />

        <!-- Customer Information !-->
        <input type="hidden" name="cus_name" value="{!! $ssl->user->name !!}">
        <input type="hidden" name="cus_email" value="{!! $ssl->user->email !!}">
        <input type="hidden" name="cus_phone" value="{!! $ssl->user->mobile !!}">
        <input type="hidden" name="value_a" value="{!! $ssl->provider_name !!}">
        <input type="hidden" name="value_b" value="{!! $ssl->plan_id !!}">
        <input type="hidden" name="value_c" value="{!! $ssl->platform !!}">
        <input type="hidden" name="value_d" value="{!! $ssl->user->api_token !!}">
        <input type="hidden" name="ship_name" value="{!! $response_origin !!}">


    </form>
</body>
</html>

<script type="application/javascript">
    document.getElementById('payment_gw').submit();
</script>