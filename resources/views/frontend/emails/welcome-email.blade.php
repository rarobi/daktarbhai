@extends('frontend.layouts.emails.master')

@section('title', 'Welcome to Daktarbhai')

@section('after-styles-end')
    <style>

    </style>
@endsection

@section('content')
    <table class="spacer" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="16px" style="font-size: 16px; line-height: 16px; word-wrap: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; mso-line-height-rule: exactly; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; margin: 0; padding: 0;" align="left" valign="top"> </td>
        </tr></tbody></table><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: table; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th class="small-12 large-12 columns first last" style="width: 564px; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 auto; padding: 0 16px 16px;" align="left">
                <table style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0; padding: 0;" align="left">
                            <h6 style="color: #666666; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 500; text-align: left; line-height: 1.3; word-wrap: normal; font-size: 14px; margin: 0; padding: 5px 10px 5px 0;" align="left">Hello, {!! $user->name   !!}</h6><br>
                            <h6 style="color: #666666; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 500; text-align: left; line-height: 1.3; word-wrap: normal; font-size: 14px; margin: 0; padding: 5px 10px 5px 0;" align="left">Welcome to Daktarbhai! We are delighted you have joined us.</h6>
                            <p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left">You have successfully signed up with us. With your account you can enjoy various services of Daktarbhai anytime anywhere. Our services includes.
                                Some of these services include:
                            </p>
                        </th>
                        <th class="expander" style="visibility: hidden; width: 0; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0; padding: 0;" align="left"></th>
                    </tr></table></th>
        </tr></tbody></table><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: table; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th class="small-12 large-4 columns first" style="width: 177.33333px; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 auto; padding: 0 8px 16px 16px;" align="left">
                <table style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th class="bg-grey" style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; background: #f7f7f7; margin: 0; padding: 0;" align="left" bgcolor="#f7f7f7">
                            <a href="#" target="_blank" style="color: #2199e8; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: normal; text-align: left; line-height: 1.3; text-decoration: none; margin: 0; padding: 0;">
                                <center data-parsed="" style="width: 100%; min-width: 145.33333px;"> <img src="{!! asset('assets/img/email/welcome/book-appointment.png') !!}" class="float-center" align="middle" style="width: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; max-width: 100%; clear: both; display: block; float: none; text-align: center; margin: 0 auto; border: none;" /></center>
                                <h6 style="color: #919191; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 500; text-align: left; line-height: 1.3; word-wrap: normal; font-size: 14px; margin: 0; padding: 5px 10px;" align="left">Book <span style="color: #666666;">Appoinment</span></h6>
                                <p style="font-size: 12px; line-height: 16px; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; margin: 0 0 10px; padding: 0 10px;" align="left">Don’t Skip Work To see a Doctor.</p>
                            </a>
                        </th>
                    </tr></tbody></table></th>
            <th class="small-12 large-4 columns" style="width: 177.33333px; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 auto; padding: 0 8px 16px;" align="left">
                <table style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th class="bg-grey" style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; background: #f7f7f7; margin: 0; padding: 0;" align="left" bgcolor="#f7f7f7">
                            <a href="#" target="_blank" style="color: #2199e8; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: normal; text-align: left; line-height: 1.3; text-decoration: none; margin: 0; padding: 0;">
                                <center data-parsed="" style="width: 100%; min-width: 145.33333px;"> <img src="{!! asset('assets/img/email/welcome/ask-a-doc.png') !!}" class="float-center" align="middle" style="width: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; max-width: 100%; clear: both; display: block; float: none; text-align: center; margin: 0 auto; border: none;" /></center>
                                <h6 style="color: #919191; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 500; text-align: left; line-height: 1.3; word-wrap: normal; font-size: 14px; margin: 0; padding: 5px 10px;" align="left">Ask a <span style="color: #666666;">Doctor</span></h6>
                                <p style="font-size: 12px; line-height: 16px; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; margin: 0 0 10px; padding: 0 10px;" align="left">Share a Little, Save a Life. Ask a Doctor</p>
                            </a>
                        </th>
                    </tr></tbody></table></th>
            <th class="small-12 large-4 columns last" style="width: 177.33333px; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 auto; padding: 0 16px 16px 8px;" align="left">
                <table style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th class="bg-grey" style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; background: #f7f7f7; margin: 0; padding: 0;" align="left" bgcolor="#f7f7f7">
                            <a href="#" target="_blank" style="color: #2199e8; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: normal; text-align: left; line-height: 1.3; text-decoration: none; margin: 0; padding: 0;">
                                <center data-parsed="" style="width: 100%; min-width: 145.33333px;"> <img src="{!! asset('assets/img/email/welcome/hospital-discount.png') !!}" class="float-center" align="middle" style="width: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; max-width: 100%; clear: both; display: block; float: none; text-align: center; margin: 0 auto; border: none;" /></center>
                                <h6 style="color: #919191; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 500; text-align: left; line-height: 1.3; word-wrap: normal; font-size: 14px; margin: 0; padding: 5px 10px;" align="left">Hospital <span style="color: #666666;">Discount</span></h6>
                                <p style="font-size: 12px; line-height: 16px; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; margin: 0 0 10px; padding: 0 10px;" align="left">Take Our Service &amp; Save Your Money.</p>
                            </a>
                        </th>
                    </tr></tbody></table></th>
        </tr></tbody></table><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: table; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th class="small-12 large-4 columns first" style="width: 177.33333px; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 auto; padding: 0 8px 16px 16px;" align="left">
                <table style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th class="bg-grey" style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; background: #f7f7f7; margin: 0; padding: 0;" align="left" bgcolor="#f7f7f7">
                            <a href="#" target="_blank" style="color: #2199e8; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: normal; text-align: left; line-height: 1.3; text-decoration: none; margin: 0; padding: 0;">
                                <center data-parsed="" style="width: 100%; min-width: 145.33333px;"> <img src="{!! asset('assets/img/email/welcome/personal-health-report.png') !!}" class="float-center" align="middle" style="width: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; max-width: 100%; clear: both; display: block; float: none; text-align: center; margin: 0 auto; border: none;" /></center>
                                <h6 style="color: #919191; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 500; text-align: left; line-height: 1.3; word-wrap: normal; font-size: 14px; margin: 0; padding: 5px 10px;" align="left"><span style="color: #666666;">Personal</span> Health Report </h6>
                                <p style="font-size: 12px; line-height: 16px; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; margin: 0 0 10px; padding: 0 10px;" align="left">DKeep Track Of Your <br />Health.</p>
                            </a>
                        </th>
                    </tr></tbody></table></th>
            <th class="small-12 large-4 columns" style="width: 177.33333px; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 auto; padding: 0 8px 16px;" align="left">
                <table style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th class="bg-grey" style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; background: #f7f7f7; margin: 0; padding: 0;" align="left" bgcolor="#f7f7f7">
                            <a href="#" target="_blank" style="color: #2199e8; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: normal; text-align: left; line-height: 1.3; text-decoration: none; margin: 0; padding: 0;">
                                <center data-parsed="" style="width: 100%; min-width: 145.33333px;"> <img src="{!! asset('assets/img/email/welcome/health-tourism.png') !!}" class="float-center" align="middle" style="width: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; max-width: 100%; clear: both; display: block; float: none; text-align: center; margin: 0 auto; border: none;" /></center>
                                <h6 style="color: #919191; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 500; text-align: left; line-height: 1.3; word-wrap: normal; font-size: 14px; margin: 0; padding: 5px 10px;" align="left">Health <span style="color: #666666;">Tourism</span></h6>
                                <p style="font-size: 12px; line-height: 16px; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; margin: 0 0 10px; padding: 0 10px;" align="left"> At Your Life Threatening Condition</p>
                            </a>
                        </th>
                    </tr></tbody></table></th>
            <th class="small-12 large-4 columns last" style="width: 177.33333px; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 auto; padding: 0 16px 16px 8px;" align="left">
                <table style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th class="bg-grey" style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; background: #f7f7f7; margin: 0; padding: 0;" align="left" bgcolor="#f7f7f7">
                            <a href="#" target="_blank" style="color: #2199e8; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: normal; text-align: left; line-height: 1.3; text-decoration: none; margin: 0; padding: 0;">
                                <center data-parsed="" style="width: 100%; min-width: 145.33333px;"> <img src="{!! asset('assets/img/email/welcome/health-package.png') !!}" class="float-center" align="middle" style="width: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; max-width: 100%; clear: both; display: block; float: none; text-align: center; margin: 0 auto; border: none;" /></center>
                                <h6 style="color: #919191; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 500; text-align: left; line-height: 1.3; word-wrap: normal; font-size: 14px; margin: 0; padding: 5px 10px;" align="left">Health <span style="color: #666666;">Package</span></h6>
                                <p style="font-size: 12px; line-height: 16px; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; margin: 0 0 10px; padding: 0 10px;" align="left">Eligible for a Free consultation.</p>
                            </a>
                        </th>
                    </tr></tbody></table></th>
        </tr></tbody></table>
    <p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 0 10px; padding: 10px 20px;" align="left">For further inquiry contact us at: 16643</p>
    <br>
    <p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 0 10px 20px; padding: 0px 20px;" align="left">Thank you for using Daktarbhai.</p>
    <p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 0 10px 20px; padding: 0px 20px;" align="left">The Daktarbhai Team.</p>


@endsection

