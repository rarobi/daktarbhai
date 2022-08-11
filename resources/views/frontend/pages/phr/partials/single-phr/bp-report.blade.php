<h3 style="font-size: 16px; font-weight: 500;">Blood Pressure (BP) Report</h3>
<table style="width:100%">
    <tr>
        <th>Reporting Time</th>
        <th>Systolic</th>
        <th>Diastolic</th>
        <th>BP Status</th>
    </tr>
    <tr>
        <td>{!! $reportDate !!}</td>
        <td>{!! $bpData->systolic or ' ' !!}</td>
        <td>{!! $bpData->diastolic or ' ' !!}</td>
        <td>{!! ucfirst($bpData->status) !!}</td>
    </tr>
</table>