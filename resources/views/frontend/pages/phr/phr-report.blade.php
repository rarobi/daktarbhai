<html>
<head>
    <title></title>

{{--    <style>--}}
{{--        .personal-info{--}}
{{--            width:100%;--}}
{{--            font-size: 13px;--}}
{{--            float: left;--}}
{{--            border-bottom: 1px solid #333;--}}
{{--            height: 170px;--}}
{{--            margin-bottom: 20px;--}}
{{--        }--}}
{{--        .personal-info-left{--}}
{{--            width:56%;--}}
{{--            margin-right: 2%;--}}
{{--            float: left;--}}
{{--        }--}}
{{--        .personal-info-right{--}}
{{--            width:40%;--}}
{{--            margin-left: 2%;--}}
{{--            float: right;--}}
{{--        }--}}
{{--        .report-info{--}}
{{--            text-align: center;--}}
{{--            width: 100%;--}}
{{--            margin: 20px 0;--}}
{{--        }--}}
{{--        .report-info th{--}}
{{--            font-size: 13px;--}}
{{--            font-weight: 600;--}}
{{--            background-color: #f1f1f1;--}}
{{--            text-align: center;--}}
{{--        }--}}
{{--        .report-info td{--}}
{{--            font-size: 13px;--}}
{{--            text-align: center;--}}
{{--        }--}}

{{--        .notes{--}}
{{--            text-align: left;--}}
{{--            margin-top: 80px;--}}
{{--            width: 100%;--}}
{{--        }--}}

{{--        .footer{--}}
{{--            text-align: center;--}}
{{--            position: absolute;--}}
{{--            bottom: 0;--}}
{{--            width: 100%;--}}
{{--        }--}}

{{--    </style>--}}

</head>
<body>
<div class="container">
    <div class="personal-info">
        <h3 style="text-align: center; font-size: 20px;">
            {!! strtoupper($phrName) !!} Report
        </h3>
        <div class="personal-info-left">
            <table style="width:100%">
                <tr>
                    <td width="80px">Name</td>
                    <td width="10px">:</td>
                    <td>{!! $userData->name !!}</td>
                </tr>
                <tr>
                    <td width="80px">Gender/Sex</td>
                    <td width="10px">:</td>
                    <td>{!! ucfirst($userData->gender) !!} {!! isset($userData->marital_status) ? '('.ucfirst($userData->marital_status).')' : '' !!}</td>
                </tr>
                <tr>
                    <td width="80px"> Age</td>
                    <td width="10px">:</td>
                    <td>{!! $userData->age !!}</td>
                </tr>
                <tr>
                    <td width="80px">Blood Group</td>
                    <td width="10px">:</td>
                    <td>{!! $userData->blood_group !!}</td>
                </tr>
                {{--<tr>--}}
                    {{--<td width="80px">BMI Status</td>--}}
                    {{--<td width="10px">:</td>--}}
                    {{--<td>--}}
                        {{--{!! dd($lastBmiData) !!}--}}
                        {{--@if(isset($bmiData->bmi))--}}
                            {{--{!! $bmiData->bmi or '' !!}--}}
                            {{--{!! '('.ucfirst($bmiData->bmi_status).')' !!}--}}
                        {{--@else--}}
                            {{--{!! $lastBmiData->bmi or '' !!}--}}

                            {{--{!! '('.ucfirst($lastBmiData->bmi_status).')' !!}--}}
                        {{--@endif--}}
                    {{--</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td width="80px">Blood Pressure</td>--}}
                    {{--<td width="10px">:</td>--}}
                    {{--<td>--}}
                        {{--@if(isset($bpData->bp))--}}
                            {{--{!! $bpData->systolic !!}/{!! $bpData->diastolic !!}--}}
                           {{--{!! '('.ucfirst($bpData->status).')' !!}--}}
                        {{--@else--}}
                            {{--{!! $lastBpData->systolic !!}/{!! $lastBpData->diastolic !!}--}}
                            {{--{!! '('.ucfirst($lastBpData->status).')' !!}--}}
                        {{--@endif--}}
                    {{--</td>--}}
                {{--</tr>--}}
            </table>

        </div>
        <div class="personal-info-right">
            <table style="width:90%; float: none; margin: 0 auto;">
                <tr>
                    <td width="80px">Report Date</td>
                    <td width="10px">:</td>
                    <td>
                        {!! $reportDate !!}
                    </td>
                </tr>
                <tr>
                    <td width="50px">Mobile</td>
                    <td width="10px">:</td>
                    <td>{!! $userData->mobile !!}</td>
                </tr>
                <tr>
                    <td width="50px">Email ID</td>
                    <td width="10px">:</td>
                    <td>{!! $userData->email !!}</td>
                </tr>
                <tr>
                    <td width="50px">User ID</td>
                    <td width="10px">:</td>
                    <td>{!! $userData->username !!}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="report-info">

        @if(isset($bmiData))
            @include('frontend.pages.phr.partials.single-phr.bmi-report')
        @elseif(isset($bpData))
            @include('frontend.pages.phr.partials.single-phr.bp-report')
        @elseif(isset($cbcData))
            @include('frontend.pages.phr.partials.single-phr.cbc-report')
        @elseif(isset($glucoseData))
            @include('frontend.pages.phr.partials.single-phr.glucose-report')
        @elseif(isset($kidneyData))
            @include('frontend.pages.phr.partials.single-phr.kidney-report')
        @elseif(isset($lipidData))
            @include('frontend.pages.phr.partials.single-phr.lipid-report')
        @elseif(isset($urineProfileData))
            @include('frontend.pages.phr.partials.single-phr.urine-profile-report')
        @elseif(isset($electrolyteData))
            @include('frontend.pages.phr.partials.single-phr.electrolyte-report')
        @elseif(isset($tumorMarkerData))
            @include('frontend.pages.phr.partials.single-phr.tumor-report')
        @elseif(isset($liverData))
            @include('frontend.pages.phr.partials.single-phr.liver-report')
        @elseif(isset($serologyData))
            @include('frontend.pages.phr.partials.single-phr.serology-report')
        @elseif(isset($thyroidData))
            @include('frontend.pages.phr.partials.single-phr.thyroid-report')
        @endif
    </div>
    <div class="footer">

    </div>
</div>
</body>
</html>
