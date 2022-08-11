<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>429....That's an error.</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{!! asset('assets/css/bootstrap/bootstrap.min.css') !!}">
    <link rel="shortcut icon" href="{!! asset('assets/img/favicon.png') !!}" type="image/x-icon"/>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!--  Main Wrap  -->
<div id="main-wrap">
    <div id="page-content">
        <div id="home-wrap" class="content-section fullpage-wrap">
            
            <div class="row maintenance">
                <div class="col-md-4 col-md-offset-3">
                    <div class="text padding-bottom-md padding-left-null">
                        <img src="{!! asset('assets/img/logo.png') !!}" class="normal" alt="{{ app_name() }}" style="height: 50px;width: 120px;">
                        <p> <b>429.</b> That's an error.</p>
                        <p>We're sorry, but you have sent too many requests to us recently. Please try again later. That's all we know.</p>
                    </div>
                </div>
                <div class="col-md-5">
                    <img src="{!! asset('assets/img/429robot.png') !!}" class="robot" style="width: 210px;margin-bottom:10px">
                </div> 
            </div>
        </div>
    </div>
</div>
<script src="{!! asset('assets/js/jquery.min.js') !!}"></script>
<script src="{!! asset('assets/js/bootstrap/bootstrap.min.js') !!}"></script>

<style media="screen">
    #main-wrap {position: relative;width: 100%;	max-width: 1500px;margin: 0 auto;padding: 0 50px;overflow: hidden;background: white;}
    #page-content {position: relative;z-index: 2;background-color: white;}
    .fullpage-wrap {margin-left: -50px;margin-right: -50px;background-color: white;}
    .content-section .text {padding: 50px;}
    .padding-left-null {padding-left: 0 !important;}
    .padding-right-null {padding-right: 0 !important;}
    .maintenance{padding: 60px 0 50px 0;}
    .maintenance img{width: 100%;margin-top: 20px;margin-bottom: 50px;}
    .error-page p {font-size: 16px;font-weight: 400;line-height: 20px;margin-top: 120px;color: #333;text-align: left;}
    .error-page p span {color: #ed1c24;font-weight: 500;font-size: 16;}
    @media (max-width: 768px){.error-page p {margin-top: -70px;text-align: center;padding-left: 50px;}
        .maintenance img {margin-bottom: 0px;}
    }
</style>
</body>
</html>
