@extends('frontend.layouts.emails.master')

@section('title', 'Feedback Response from Daktarbhai')
@section('after-styles-end')
    <style>

    </style>
@endsection
@section('content')
    <table class="spacer" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="16px" style="font-size: 16px; line-height: 16px; word-wrap: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; mso-line-height-rule: exactly; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; margin: 0; padding: 0;" align="left" valign="top"> </td>
        </tr></tbody></table><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: table; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th class="small-12 large-12 columns first last" style="width: 564px; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 auto; padding: 0 16px 16px;" align="left">
                <table style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0; padding: 0;" align="left">
                            <h6 style="color: #666666; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 500; text-align: left; line-height: 1.3; word-wrap: normal; font-size: 14px; margin: 0; padding: 5px 10px 5px 0;" align="left">Hello, {!! $username   !!}</h6><br>
                            <h6 style="color: #666666; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 500; text-align: left; line-height: 1.3; word-wrap: normal; font-size: 14px; margin: 0; padding: 5px 10px 5px 0;" align="left">You Have Recently Posted a Question In Daktarbhai.The Doctor Indicated That Your Query is Not Clear.</h6>
                            <p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left">We Request You to re-post your query with clear Details.
                            </p>
                        </th>
                        {{--<th class="expander" style="visibility: hidden; width: 0; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0; padding: 0;" align="left"><b></b></th>--}}
                    </tr></table></th>
        </tr></tbody></table><table class="row" style=" text-align: left; width: 100%; position: relative; display: table; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th class="small-12 large-4 columns first" style="width: 177.33333px; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 auto; padding: 0 20px;" align="left">
                <table class="callout" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; margin-bottom: 16px; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0 50px;" align="left"><th class="callout-inner secondary" style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; width: 100%; background: #fff; margin: 0; padding: 20px; border: 1px none #444444;" align="left" bgcolor="#fff">
                            <p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left"><b>Comments From the doctor:</b></p>
                            <table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: table; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th class="small-12 large-4 columns first" style="width: 33.33333%; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 auto; padding: 0;" align="left">
                                        <table style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0; padding: 0;" align="left">
                                                    <p style="color: #; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; background: #f2f2f2; margin: 1px; padding: 7px 10px;" align="left"><strong style="color: #000000; font-weight: 100;">{!! $content !!}</strong></p>

                                                </th>
                                            </tr></tbody></table></th>
                                </tr></tbody></table></th>
                        <th class="expander" style="visibility: hidden; width: 0; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0; padding: 0;" align="left"></th>
                    </tr></tbody></table></th>
        </tr></tbody></table><p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 0 10px 20px; padding: 0px 20px;" align="left"></p>
    <p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 0 10px; padding: 10px 20px;" align="left">For further inquiry contact us at: 16643</p>
    <br>
    <p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 0 10px 20px; padding: 0px 20px;" align="left">Thank you for using Daktarbhai.</p>
    <p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 0 10px 20px; padding: 0px 20px;" align="left">The Daktarbhai Team.</p>

@endsection