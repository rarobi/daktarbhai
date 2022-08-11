<!-- Inliner Build Version 4380b7741bb759d6cb997545f3add21ad48f010b -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml" style="min-height: 100%; background-color: #f3f3f3 !important;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>@yield('title')</title>
</head>
<body style="width: 100% !important; min-width: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; background-color: #f3f3f3 !important; margin: 0; padding: 0;" bgcolor="#f3f3f3 !important">
@include('frontend.layouts.emails.partials.foundation-css')
<!-- <style> -->
@include('frontend.layouts.emails.partials.header')

@yield('content')


@include('frontend.layouts.emails.partials.footer')