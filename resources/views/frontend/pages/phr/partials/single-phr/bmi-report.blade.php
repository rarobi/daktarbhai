<h3 style="font-size: 16px; font-weight: 500;">Body Mass Indicator (BMI) Report</h3>
<table style="width:100%">
    <tr>
        <th>Height</th>
        <th>Weight</th>
        <th>BMI Value</th>
        <th>BMI Status</th>
    </tr>
    <tr>
        <td>
            {!! isset($height) ? $height : '' !!}
            {!! isset($bmiData->height) ? '('.$bmiData->height.')' : '' !!}
        </td>
        <td>{!! $bmiData->bmi or ' ' !!}</td>
        <td>{!! $bmiData->weight or ' ' !!}</td>
        <td>{!! ucfirst($bmiData->bmi_status) !!}</td>
    </tr>
</table>