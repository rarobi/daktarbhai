<h3 style="font-size: 16px; font-weight: 500;">Liver Function</h3>
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
    @if(isset($liverData->alkaline_phosphate_value))
        <tr>
            <td style="text-align: right">Alkaline Phosphate</td>
            <td>
                {{ $liverData->alkaline_phosphate_value }} {{ 'U/L' }}
            </td>
            <td>{{ isset($liverData->status->alkaline_phosphate_value) ? ucwords($liverData->status->alkaline_phosphate_value) : '' }}</td>
            <td style="text-align: right"> {{ '40 - 130 U/L' }} </td>
        </tr>
    @endif

    @if(isset($liverData->total_bilirubin_value))
        <tr>
            <td style="text-align: right">Total Bilirubin</td>
            <td>
                {{ $liverData->total_bilirubin_value }} {{ 'mg/dL' }}
            </td>
            <td>{{ isset($liverData->status->total_bilirubin_value) ? ucwords($liverData->status->total_bilirubin_value) : '' }}</td>
            <td style="text-align: right"> {{ '0.3 - 3.0 mg/dL' }} </td>
        </tr>
    @endif
    @if(isset($liverData->alt_value))
        <tr>
            <td style="text-align: right">ALT (SGPT)</td>
            <td>
                {{ $liverData->alt_value }} {{ 'U/L' }}
            </td>
            <td>{{ isset($liverData->status->alt_value) ? ucwords($liverData->status->alt_value) : '' }}</td>
            <td style="text-align: right"> {{ '10 - 40 U/L' }} </td>
        </tr>
    @endif
    @if(isset($liverData->ast_value))
        <tr>
            <td style="text-align: right">AST (SGOT)</td>
            <td>
                {{ $liverData->ast_value }} {{ 'U/L' }}
            </td>
            <td>{{ isset($liverData->status->ast_value) ? ucwords($liverData->status->ast_value) : '' }}</td>
            <td style="text-align: right"> {{ '10 - 40 U/L' }} </td>
        </tr>
    @endif

</table>
<div class="notes">
    <strong>Notes/Comments: </strong> {{ $liverData->additional_notes or ' ' }}
</div>