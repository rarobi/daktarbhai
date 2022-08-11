@extends('frontend.layouts.emails.master')

@section('title', 'Reset Password for Daktarbhai')
@section('after-styles-end')
    <style>

    </style>
@endsection
@section('content')

    <table class="spacer" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="16px" style="font-size: 16px; line-height: 16px; word-wrap: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; mso-line-height-rule: exactly; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; margin: 0; padding: 0;" align="left" valign="top"> </td>
        </tr></tbody></table><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: table; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th class="small-12 large-12 columns first last" style="width: 564px; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 auto; padding: 0 16px 16px;" align="left">
                <table style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0; padding: 0;" align="left">
                            <h6 style="color: inherit; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 600; text-align: left; line-height: 1.3; word-wrap: normal; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left">Hello
                                @if(is_null($user->name) || $user->name == '')
                                    @if(is_null($user->email) || $user->email == '')
                                        {!! $user->mobile or '' !!} !
                                    @else
                                        {!! $user->email or '' !!} !
                                    @endif
                                @else
                                    {!! $user->name or '' !!} !
                                @endif
                            </h6>
                            <p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left">You are receiving this email because we received  a password reset request for your account.</p>
                            <center data-parsed="" style="width: 100%; min-width: 532px;">
                                <table class="float-center pass-bg" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: center; width: 100%; float: none; background: url('http://rakibuzzaman.com/im/eamil.jpg'); margin: 0 auto; padding: 0; background-color:#ed1c24;"  background="url(&quot;{{ asset('assets/img/email/email.jpg') }}&quot;)"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td style="word-wrap: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; line-height: 1.3; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top">
                                            <table style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td style="word-wrap: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; line-height: 1.3; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"><h1 class="text-center" style="color: #fff; font-size: 24px; text-align: center; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: normal; line-height: 1.3; word-wrap: normal; margin: 0 0 5px; padding: 15px 0 0;" align="center">Your Temporary Password is</h1>
                                                        <h2 class="text-center" style="color: #fff; font-size: 25px; font-weight: 600; text-align: center; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.3; word-wrap: normal; margin: 0 0 10px; padding: 0 0 10px;" align="center">{!! $user->temp_password or '' !!}</h2>
                                                    </td>
                                                </tr></table></td>
                                    </tr></table>
                                <p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 0 10px; padding: 20px 0 0;" align="left">To get back to your account, <a href="{{ url('signin/') }}" style="color: #2199e8; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: normal; text-align: left; line-height: 1.3; text-decoration: none; margin: 0; padding: 0;">click here</a> and login using this <b style="font-weight: bold">temporary password</b> at Daktarbhai web. Alternatively, you can also login using this temporary password at Daktarbhai App.
                                </p>
                                {{--<p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left">Alternatively You can directly change your password <a href="{{ url('password/reset/'.$token) }}" style="color: #2199e8; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: normal; text-align: left; line-height: 1.3; text-decoration: none; margin: 0; padding: 0;">Click here</a></p>--}}
                                <p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left">Once logged in, this <b style="font-weight: bold">temporary password</b> will be set as your <b style="font-weight: bold">permanent password</b>. So, we encourage you to change your password after <b style="font-weight: bold">initial login</b>.</p>
                                <p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left">This <b style="font-weight: bold">temporary password</b> is valid for <b style="font-weight: bold">24 hours.</b></p>
                                <p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left">If you did not request for password reset, simply ignore this Email. </p>
                            </center>
                        </th>
                        <th class="expander" style="visibility: hidden; width: 0; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0; padding: 0;" align="left"></th>
                    </tr></table></th>
        </tr></tbody></table><table class="row collapsed footer" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: table; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th class="small-12 large-12 columns first last" style="width: 564px; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 auto; padding: 0 16px 16px;" align="left"></th></tr></tbody></table>

@endsection
