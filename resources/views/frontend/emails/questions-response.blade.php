@extends('frontend.layouts.emails.master')

@section('title', 'Question Answer From Daktarbhai')
@section('after-styles-end')
    <style>

    </style>
@endsection
@section('content')

    <table class="spacer" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="16px" style="font-size: 16px; line-height: 16px; word-wrap: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; mso-line-height-rule: exactly; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; margin: 0; padding: 0;" align="left" valign="top"> </td>
        </tr></tbody></table><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: table; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th class="small-12 large-12 columns first last" style="width: 564px; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 auto; padding: 0 16px 16px;" align="left">
                <table style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0; padding: 0;" align="left">
                            <h6 style="color: inherit; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 600; text-align: left; line-height: 1.3; word-wrap: normal; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left">Hello {!! $user_name !!}
                            </h6>
                            <p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left">Congratulations! Daktarbhai has just answered your query.
                            </p>
                            <center data-parsed="" style="width: 100%; min-width: 532px;">
                                <table class="float-center pass-bg" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: center; width: 100%; float: none;  margin: 0 auto; padding: 0; background-color:#ed1c24;"  background=""><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td style="word-wrap: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; line-height: 1.3; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top">
                                            <table style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td style="word-wrap: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; line-height: 1.3; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"><h1 class="text-center" style="color: #fff; font-size: 24px; text-align: center; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: normal; line-height: 1.3; word-wrap: normal; margin: 0 0 5px; padding: 15px 0 0;" align="center">Your Question was</h1>
                                                        <h2 class="text-center" style="color: #fff; font-size: 15px; font-weight: 600; text-align: center; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.3; word-wrap: normal; margin: 0 0 10px; padding: 0 0 10px;" align="center">{!! trim($questions) !!}</h2>
                                                    </td>
                                                </tr></table></td>
                                    </tr></table>
                                </p>
                                <br>
                                <p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left">To View the answer of your query please <a href="{{ url('services/ask-a-doctor/'.$id) }} ">click here</a> </p>
                                <p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left">Alternatively, you can also use our Daktarbhai mobile App to view the answer. </p><br>
                                <p style="color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: center; line-height: 1.3; font-size: 14px; margin: 0 0 10px; padding: 0;" align="center">Thank You For Your patience, Stay With <span style="color: #ed1c24;">Daktarbhai</span>!</p>
                            </center>
                        </th>
                        <th class="expander" style="visibility: hidden; width: 0; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0; padding: 0;" align="left">
                        </th>
                    </tr></table></th>
        </tr></tbody></table><table class="row collapsed footer" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: table; padding: 0;"><tbody><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><th class="small-12 large-12 columns first last" style="width: 564px; color: #5F5F5F; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 300; text-align: left; line-height: 1.3; font-size: 14px; margin: 0 auto; padding: 0 16px 16px;" align="left"></th></tr></tbody></table>

@endsection
