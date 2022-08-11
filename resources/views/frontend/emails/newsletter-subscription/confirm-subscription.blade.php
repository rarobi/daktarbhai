@extends('frontend.layouts.emails.master')

@section('title', 'Daktarbhai - Confirm subscription')

@section('after-styles-end')
    <style>

    </style>
@endsection

@section('content')
    <table class="spacer" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="16px" style="font-size: 16px; line-height: 16px; word-wrap: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; mso-line-height-rule: exactly; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; margin: 0; padding: 0;" align="left" valign="top"> </td>
        </tr></tbody></table><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: table; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th class="small-12 large-12 columns first last" style="width: 564px; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 auto; padding: 0 16px 10px;" align="left">
                <table style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0; padding: 0;" align="left">
                            <h6 style="color: #666666; font-size: 18px; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 500; text-align: left; line-height: 1.3; word-wrap: normal; margin: 0; padding: 5px 10px 5px 0;" align="left">Please Confirm <span style="color: #ed1c24;">Subscription</span></h6>
                            <p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left">Click on the Subscription Button to give us permission to send you Newsletters. It’s fast and easy!! If you don’t want to Confirm, Simply Ignore this message.</p>
                        </th>
                        <th class="expander" style="visibility: hidden; width: 0; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0; padding: 0;" align="left"></th>
                    </tr></table></th>
        </tr></tbody></table><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: table; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th class="small-12 large-4 columns first" style="width: 177.33333px; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 auto; padding: 0 8px 10px 16px;" align="left">
                <table class="button big secondary" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: auto; margin: 0 0 16px; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td style="word-wrap: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; line-height: 1.3; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top">
                            <table style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                                    <td style="word-wrap: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #fefefe; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; line-height: 1.3; font-size: 14px; background: #777777; margin: 0; padding: 0; border: 0px solid #777777;" align="left" bgcolor="#777777" valign="top">
                                        <a href="{!! route('frontend.active-email', ['random_key' => $subscriber->random_key] ) !!}" style="color: #fefefe; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: bold; text-align: center; line-height: 1.3; text-decoration: none; font-size: 16px; display: inline-block; border-radius: 3px; width: 160px; background: #ed1c24; margin: 0; padding: 8px 16px; border: 0 solid #777777;">Subscribe!</a>
                                    </td>
                                </tr></tbody></table></td>
                    </tr></tbody></table></th>
        </tr></tbody></table><p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 0 10px; padding: 0px 20px;" align="left">Thank you for your Subscribe.</p>

@endsection
