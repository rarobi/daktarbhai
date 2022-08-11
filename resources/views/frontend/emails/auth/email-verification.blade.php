<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Verify Your Email Address</h2>

<div>
    Thanks for creating an account to Daktarbhai.
    Please follow the link below to verify your email address
    <a style="width: 100px; height: 100px; color:green; font-weight: bolder" href="{{ URL::to('register/email-verify/' . $confirmation_code. '?email='.$email) }}">Verify Email</a>

</div>

</body>
</html>