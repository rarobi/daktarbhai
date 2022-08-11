

<!DOCTYPE html>
<!--[if lte IE 7]> <html class="ie-lte7" dir="ltr"> <![endif]-->
<!--[if lte IE 9]> <html class="ie-lte9" dir="ltr"> <![endif]-->
<!--[if !IE]><!--> <html dir="ltr">             <!--<![endif]-->
<head>
    <title>Unsubscribe-Confirm | Daktarbhai</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">




    <style type="text/css">
        body{
            font:14px/20px 'Helvetica', Arial, sans-serif;
            margin:0;
            padding:75px 0 0 0;
            text-align:center;
            -webkit-text-size-adjust:none;
        }
        label {
            display:block;
            width:auto;
            margin-top:8px;
            font-weight:bold;
        }
        p{
            padding:0 0 10px 0;
        }
        h1 img{
            max-width:100%;
            height:auto !important;
            vertical-align:bottom;
        }
        h2{
            font-size:22px;
            line-height:28px;
            margin:0 0 12px 0;
        }
        h3{
            margin:0 0 12px 0;
        }
        .headerBar{
            background:none;
            padding:0;
            border:none;
        }
        .wrapper{
            width:600px;
            margin:0 auto 10px auto;
            text-align:left;
        }
        input.button{
            border:none !important;
        }
        .button{
            display:inline-block;
            font-weight:500;
            font-size:16px;
            line-height:42px;
            font-family:'Helvetica', Arial, sans-serif;
            width:auto;
            white-space:nowrap;
            height:42px;
            margin:12px 5px 12px 0;
            padding:0 22px;
            text-decoration:none;
            text-align:center;
            cursor:pointer;
            border:0;
            border-radius:3px;
            vertical-align:top;
        }
        .button span{
            display:inline;
            font-family:'Helvetica', Arial, sans-serif;
            text-decoration:none;
            font-weight:500;
            font-style:normal;
            font-size:16px;
            line-height:42px;
            cursor:pointer;
            border:none;
        }
        .rounded6{
            border-radius:6px;
        }
        .poweredWrapper{
            padding:20px 0;
            width:560px;
            margin:0 auto;
        }
        .poweredBy{
            display:block;
        }
        span.or{
            display:inline-block;
            height:32px;
            line-height:32px;
            padding:0 5px;
            margin:5px 5px 0 0;
        }
        .clear{
            clear:both;
        }
        .profile-list{
            display:block;
            margin:15px 20px;
            padding:0;
            list-style:none;
            border-top:1px solid #eee;
        }
        .profile-list li{
            display:block;
            margin:0;
            padding:5px 0;
            border-bottom:1px solid #eee;
        }
        html[dir=rtl] .wrapper,html[dir=rtl] .container,html[dir=rtl] label{
            text-align:right !important;
        }
        html[dir=rtl] ul.interestgroup_field label{
            padding:0;
        }
        html[dir=rtl] ul.interestgroup_field input{
            margin-left:5px;
        }
        html[dir=rtl] .hidden-from-view{
            right:-5000px;
            left:auto;
        }
        body,#bodyTable{
            background-color:#eeeeee;
        }
        h1{
            font-size:28px;
            line-height:110%;
            margin-bottom:30px;
            margin-top:0;
            padding:0;
        }
        #templateContainer{
            background-color:none;
        }
        #templateBody{
            background-color:#ffffff;
        }
        .bodyContent{
            line-height:150%;
            font-family:Helvetica;
            font-size:14px;
            color:#333333;
            padding:20px;
        }
        a:link,a:active,a:visited,a{
            color:#336699;
        }
        .button:link,.button:active,.button:visited,.button,.button span{
            background-color:#5d5d5d !important;
            color:#ffffff !important;
        }
        .button:hover{
            background-color:#444444 !important;
            color:#ffffff !important;
        }
        label{
            line-height:150%;
            font-family:Helvetica;
            font-size:16px;
            color:#5d5d5d;
        }
        .field-group input,select,textarea,.dijitInputField{
            font-family:Helvetica;
            color:#5d5d5d !important;
        }
        .asterisk{
            color:#cc6600;
            font-size:20px;
        }
        label .asterisk{
            visibility:hidden;
        }
        .indicates-required{
            display:none;
        }
        .field-help{
            color:#777;
        }
        .error,.errorText{
            color:#e85c41;
            font-weight:bold;
        }
        @media (max-width: 620px){
            body{
                width:100%;
                -webkit-font-smoothing:antialiased;
                padding:10px 0 0 0 !important;
                min-width:300px !important;
            }

        }	@media (max-width: 620px){
            .wrapper,.poweredWrapper{
                width:auto !important;
                max-width:600px !important;
                padding:0 10px;
            }

        }	@media (max-width: 620px){
            #templateContainer,#templateBody,#templateContainer table{
                width:100% !important;
                -moz-box-sizing:border-box;
                -webkit-box-sizing:border-box;
                box-sizing:border-box;
            }

        }	@media (max-width: 620px){
            .addressfield span{
                width:auto;
                float:none;
                padding-right:0;
            }

        }	@media (max-width: 620px){
            .captcha{
                width:auto;
                float:none;
            }

        }</style>
</head>
<body>

<div class="wrapper rounded6" id="templateContainer">
    {{--<h1 class="masthead">Daktarbhai</h1>--}}
    <div class="masthead" style="margin-bottom: 10px; width: 150px;">
        <img src="{!! asset('assets/img/logo.png') !!}" style="width: 180px;  " class="normal" alt="logo">
    </div>
    <div id="templateBody" class="bodyContent rounded6">
        <h4 class="lead text-xs-center">We're sorry to see you go!</h4>

        <p class="lead text-xs-center">You have successfully unsubscribed from further healthtips emails from Daktarbhai.</p>
        </div>
        <br>
        <a class="button" href="{{ route('frontend.index') }}">continue to our website &raquo;</a>
        {{--<span class="or">or</span>
        <a class="button" href="">manage your preferences</a>--}}
    </div>
</div>


{{--<div class="poweredWrapper">
    <span class="poweredBy"><a href="http://www.mailchimp.com/monkey-rewards/?utm_source=freemium_newsletter&utm_medium=email&utm_campaign=monkey_rewards&aid=f49fca9a9cca3a7e0caf0582b&afl=1"><img src="https://cdn-images.mailchimp.com/monkey_rewards/MC_MonkeyReward_15.png" border="0" alt="Email Marketing Powered by MailChimp" title="MailChimp Email Marketing" width="139" height="54"></a></span>
</div>--}}

</body>


</html>

