<h3 style="font-size: 16px; font-weight: 500;">Glucose [Diabetes] Report</h3>
<table style="width:100%">
    <tr>
        <th>Reporting Time</th>
        <th>Glucose Level</th>
        <th>Day Time</th>
        <th>Status</th>
    </tr>
    <tr>
        <td>{!! $reportDate !!}</td>
        <td>{!! $glucoseData->level or ' ' !!} {!! $glucoseData->unit or ' ' !!}</td>
        <td>{!! $glucoseData->daytime or ' ' !!}</td>
        <td>{!! ucfirst($glucoseData->status) !!}</td>
    </tr>
</table>