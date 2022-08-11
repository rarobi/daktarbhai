<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
    <title>Document</title>
</head>
<body>

    <form id="payment_gw" name="payment_gw" method="POST" action="https://sandbox.sslcommerz.com/gwprocess/v3/process.php">
        <input type="hidden" name="total_amount" value="{!! $$provider_name->price !!}" />
        <input type="hidden" name="store_id" value="test_teledaktar" />
        <input type="hidden" name="tran_id" value="{!! $$provider_name->transaction_id !!}" />
        <input type="hidden" name="success_url" value="{!! $$provider_name->success_url !!}" />
        <input type="hidden" name="fail_url" value="{!! $$provider_name->failed_url !!}" />
        <input type="hidden" name="cancel_url" value="{!! $$provider_name->cancel_url !!}" />
        <input type="hidden" name="version" value="3.00" />

        <input type="hidden" name="value_a" value="{!! $$provider_name->name !!}">
        <input type="hidden" name="value_b" value="{!! $$provider_name->plan_id !!}">
        <input type="hidden" name="value_c" value="{!! $$provider_name->platform !!}">

        <!-- Customer Information !-->

        <input type="hidden" name="cus_name" value="{!! $user->name !!}">
        <input type="hidden" name="cus_email" value="{!! $user->email !!}">
        <input type="hidden" name="cus_phone" value="{!! $user->mobile !!}">
        <input type="hidden" name="value_d" value="{!! $user->access_token !!}">

        <!-- Domain Information !-->

        <input type="hidden" name="ship_name" value="{!! $response_origin !!}">

        {{--<button type="submit"> Submit </button>--}}
    </form>
    {{--$( "form" ).on( "submit", function( event ) {
    event.preventDefault();
    console.log( $( this ).serialize() );
    });--}}
</body>
</html>

<script type="application/javascript">
    document.getElementById('payment_gw').submit();
</script>