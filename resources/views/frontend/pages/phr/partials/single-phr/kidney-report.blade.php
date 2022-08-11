<h3 style="font-size: 16px; font-weight: 500;">Kidney Function</h3>
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
    @if(isset($kidneyData->serum_urea_level))
        <tr>
            <td>Serum Urea Level</td>
            <td>{{ $kidneyData->serum_urea_level or '' }} {{ $kidneyData->units->serum_urea_level or '' }} </td>
            <td>{{ isset($kidneyData->status->serum_urea_level) ? ucfirst($kidneyData->status->serum_urea_level) : '' }} </td>
            <td>5-20 (mg/dl) OR 1.8-7.1 (mmol/L) </td>
        </tr>
    @endif
    @if(isset($kidneyData->serum_creatinine))
        <tr>
            <td>Serum Creatinine</td>
            <td>{{ $kidneyData->serum_creatinine or '' }} {{ $kidneyData->units->serum_creatinine or '' }} </td>
            <td>{{ isset($kidneyData->status->serum_creatinine) ? ucfirst($kidneyData->status->serum_creatinine) : '' }} </td>
            <td>0.7 – 1.3 (Male), 0.6 – 1.1 (Female)</td>
        </tr>
    @endif
    @if(isset($kidneyData->serum_uric_acid))
        <tr>
            <td>Serum Uric Acid</td>
            <td>{{ $kidneyData->serum_uric_acid or '' }} {{ $kidneyData->units->serum_uric_acid or '' }} </td>
            <td>{{ isset($kidneyData->status->serum_uric_acid) ? ucfirst($kidneyData->status->serum_uric_acid) : '' }} </td>
            <td>250 – 750 (mg/24h)</td>
        </tr>
    @endif
    @if(isset($kidneyData->serum_calcium))
        <tr>
            <td>Serum Calcium</td>
            <td>{{ $kidneyData->serum_calcium or '' }} {{ $kidneyData->units->serum_calcium or '' }} </td>
            <td>{{ isset($kidneyData->status->serum_calcium) ? ucfirst($kidneyData->status->serum_calcium) : '' }} </td>
            <td>8.5 – 10.2 (mg/dl)</td>
        </tr>
    @endif
    @if(isset($cbcData->serum_phosphate))
        <tr>
            <td>Serum Phosphate</td>
            <td>{{ $kidneyData->serum_phosphate or '' }} {{ $kidneyData->units->serum_phosphate or '' }} </td>
            <td>{{ isset($kidneyData->status->serum_phosphate) ? ucfirst($kidneyData->status->serum_phosphate) : '' }} </td>
            <td>2.5 – 4.5 (mg/dL)</td>
        </tr>
    @endif
    @if(isset($kidneyData->eGFR))
        <tr>
            <td>eGFR</td>
            <td>{{ $kidneyData->eGFR or '' }} {{ $kidneyData->units->eGFR or '' }} </td>
            <td>{{ isset($kidneyData->status->eGFR) ? ucfirst($kidneyData->status->eGFR) : '' }} </td>
            <td>90 – 120 (mL/min)</td>
        </tr>
    @endif
    @if(isset($kidneyData->serum_urea_nitrogen))
        <tr>
            <td>Serum Urea Nitrogen</td>
            <td>{{ $kidneyData->serum_urea_nitrogen or '' }} {{ $kidneyData->units->serum_urea_nitrogen or '' }} </td>
            <td>{{ isset($kidneyData->status->serum_urea_nitrogen) ? ucfirst($kidneyData->status->serum_urea_nitrogen) : '' }} </td>
            <td>12 – 20 (gm/24h)</td>
        </tr>
    @endif
    @if(isset($kidneyData->corrected_calcium))
        <tr>
            <td>Corrected Calcium</td>
            <td>{{ $kidneyData->corrected_calcium or '' }} {{ $kidneyData->units->corrected_calcium or '' }}</td>
            <td>{{ isset($kidneyData->status->corrected_calcium) ? ucfirst($kidneyData->status->corrected_calcium) : '' }} </td>
            <td></td>
        </tr>
    @endif
</table>
<div class="notes">
    <strong>Notes/Comments: </strong> {{ $kidneyData->additional_notes }}
</div>