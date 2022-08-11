<h3 style="font-size: 16px; font-weight: 500;">Lipid Profile</h3>
<table style="width:100%">
    <thead>
    <tr>
        <th>Test Parameter</th>
        <th>Result</th>
        <th>Status</th>
        <th>Normal Value/Range</th>
    </tr>
    </thead>

    <tbody>
    @if(isset($lipidData->total_cholesterol))
        <tr>
            <td>total_cholesterol</td>
            <td>{{ $lipidData->total_cholesterol or '' }} {{ $lipidData->units->total_cholesterol or '' }} </td>
            <td>{{ isset($lipidData->status->total_cholesterol) ? ucfirst($lipidData->status->total_cholesterol) : '' }} </td>
            <td> {{ '< 200 (mg/dL) OR < 5.2 (mmol/L)' }} </td>
        </tr>
    @endif
    @if(isset($lipidData->hdl))
        <tr>
            <td>HDL</td>
            <td>{{ $lipidData->hdl or '' }} {{ $lipidData->units->hdl or '' }} </td>
            <td>{{ isset($lipidData->status->hdl) ? ucfirst($lipidData->status->hdl) : '' }} </td>
            <td> {{ '> 60 (mg/dL) OR > 1.6 (mmol/L)' }} </td>
        </tr>
    @endif
    @if(isset($lipidData->ldl))
        <tr>
            <td>LDL</td>
            <td>{{ $lipidData->ldl or '' }} {{ $lipidData->units->ldl or '' }} </td>
            <td>{{ isset($lipidData->status->ldl) ? ucfirst($lipidData->status->ldl) : '' }} </td>
            <td> {{ '< 100 (mg/dL) OR < 2.6 (mmol/L)' }} </td>
        </tr>
    @endif
    @if(isset($lipidData->triglycerides))
        <tr>
            <td>Serum Calcium</td>
            <td>{{ $lipidData->triglycerides or '' }} {{ $lipidData->units->triglycerides or '' }} </td>
            <td>{{ isset($lipidData->status->triglycerides) ? ucfirst($lipidData->status->triglycerides) : '' }} </td>
            <td> {{ '< 150 (mg/dL) OR < 1.7 (mmol/L)' }} </td>
        </tr>
    @endif
    @if(isset($cbcData->total_cholesterol_hdl_ratio))
        <tr>
            <td>Serum Phosphate</td>
            <td>{{ $lipidData->total_cholesterol_hdl_ratio or '' }} {{ $lipidData->units->total_cholesterol_hdl_ratio or '' }} </td>
            <td>{{ isset($lipidData->status->total_cholesterol_hdl_ratio) ? ucfirst($lipidData->status->total_cholesterol_hdl_ratio) : '' }} </td>
            <td>2.5 – 4.5 (mg/dL)</td>
        </tr>
    @endif
</table>
<div class="notes">
    <strong>Notes/Comments: </strong> {{ $lipidData->additional_notes or ' ' }}
</div>