<h3 style="font-size: 16px; font-weight: 500;">Thyroid Report</h3>
<table style="width:100%">
    <thead>
    <tr>
        <th style="text-align: right">Test Parameter</th>
        <th>Result</th>
        <th>Status</th>
        <th style="text-align: right">Normal Value/Range</th>
    </tr>
    </thead>

    <tbody>
    @if(isset($thyroidData->tsh))
        <tr>
            <td style="text-align: right">TSH</td>
            <td>{{ $thyroidData->tsh }} {{ isset($thyroidData->units->tsh) ? $thyroidData->units->tsh : 'pg/ml' }}</td>
            <td>{{ isset($thyroidData->status->tsh) ? ucwords($thyroidData->status->tsh) : '' }}</td>
            <td style="text-align: right">{{ '0.7 - 7.0 pg/ml' }}</td>
        </tr>
    @endif
    @if(isset($thyroidData->tpha_value))
        <tr>
            <td style="text-align: right">TT4</td>
            <td>{{ $thyroidData->tt4 }} {{ isset($thyroidData->units->tt4) ? $thyroidData->units->tt4 : 'ug/dl' }}</td>
            <td>{{ isset($thyroidData->status->tt4) ? ucwords($thyroidData->status->tt4) : '' }}</td>
            <td style="text-align: right"> {{ '2.0 - 17.0 ug/dl' }} </td>
        </tr>
    @endif
    @if(isset($thyroidData->ft4))
        <tr>
            <td style="text-align: right">FT4</td>
            <td>{{ $thyroidData->ft4 }} {{ isset($thyroidData->units->ft4) ? $thyroidData->units->ft4 : 'µl/ml' }}</td>
            <td>{{ isset($thyroidData->status->ft4) ? ucwords($thyroidData->status->ft4) : '' }}</td>
            <td style="text-align: right"> {{ '0.2 - 3.0 µl/ml' }} </td>
        </tr>
    @endif
    @if(isset($thyroidData->ft3))
        <tr>
            <td style="text-align: right">FT3</td>
            <td>{{ $thyroidData->ft3 }} {{ isset($thyroidData->units->ft3) ? $thyroidData->units->ft3 : 'ng/dl' }}</td>
            <td>{{ isset($thyroidData->status->ft3) ? ucwords($thyroidData->status->ft3) : '' }}</td>
            <td style="text-align: right"> {{ '0.5 - 7.0 ng/dl' }} </td>
        </tr>
    @endif
    @if(isset($thyroidData->total_t3))
        <tr>
            <td style="text-align: right">Total T3</td>
            <td>{{ $thyroidData->total_t3 }} {{ isset($thyroidData->units->total_t3) ? $thyroidData->units->total_t3 : 'ng/dl' }}</td>
            <td>{{ isset($thyroidData->status->total_t3) ? ucwords($thyroidData->status->total_t3) : '' }}</td>
            <td style="text-align: right"> {{ '30 - 220 ng/dl' }} </td>
        </tr>
    @endif
</table>
<div class="notes">
    <strong>Notes/Comments: </strong> {{ isset($thyroidData->additional_notes) ? $thyroidData->additional_notes : ' ' }}
</div>