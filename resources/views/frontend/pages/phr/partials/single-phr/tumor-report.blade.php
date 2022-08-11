<h3 style="font-size: 16px; font-weight: 500;">Tumor Marker</h3>
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
    @if(isset($tumorMarkerData->ca15_value))
        <tr>
            <td style="text-align: right">Ca15 Value</td>
            <td>
                {{ $tumorMarkerData->ca15_value }} {{ isset($tumorMarkerData->units->ca15_value) ? $tumorMarkerData->units->ca15_value : 'u/ml' }}
            </td>
            <td>{{ isset($tumorMarkerData->status->ca15_value) ? ucwords($tumorMarkerData->status->ca15_value) : '' }}</td>
            <td style="text-align: right"> {{ '0.0 - 30.0 u/ml' }} </td>
        </tr>
    @endif

    @if(isset($tumorMarkerData->ca125_value))
        <tr>
            <td style="text-align: right">Ca125 Value</td>
            <td>
                {{ $tumorMarkerData->ca125_value }} {{ isset($tumorMarkerData->units->ca125_value) ? $tumorMarkerData->units->ca125_value : 'u/ml' }}
            </td>
            <td>{{ isset($tumorMarkerData->status->ca125_value) ? ucwords($tumorMarkerData->status->ca125_value) : '' }}</td>
            <td style="text-align: right"> {{ '0.0 - 35.0 u/ml' }} </td>
        </tr>
    @endif

    @if(isset($tumorMarkerData->alpha_value))
        <tr>
            <td style="text-align: right">Alpha Fetoprotein</td>
            <td>
                {{ $tumorMarkerData->alpha_value }} {{ isset($tumorMarkerData->units->alpha_value) ? $tumorMarkerData->units->alpha_value : 'µl/l' }}
            </td>
            <td>{{ isset($tumorMarkerData->status->alpha_value) ? ucwords($tumorMarkerData->status->alpha_value) : '' }}</td>
            <td style="text-align: right"> {{ '0.0 - 8.0 µl/l' }} </td>
        </tr>
    @endif

    @if(isset($tumorMarkerData->carcino_value))
        <tr>
            <td style="text-align: right">Carcinoembryonic Antigen (CEA)</td>
            <td>
                {{ $tumorMarkerData->carcino_value }} {{ isset($tumorMarkerData->units->carcino_value) ? $tumorMarkerData->units->carcino_value : 'ng/ml' }}
            </td>
            <td>{{ isset($tumorMarkerData->status->carcino_value) ? ucwords($tumorMarkerData->status->carcino_value) : '' }}</td>
            <td style="text-align: right"> {{ '0.0 - 2.5 ng/ml' }} </td>
        </tr>
    @endif

    @if(isset($tumorMarkerData->prostate_value))
        <tr>
            <td style="text-align: right">Prostate Specific Antigen (PSA)</td>
            <td>
                {{ $tumorMarkerData->prostate_value }} {{ isset($tumorMarkerData->units->prostate_value) ? $tumorMarkerData->units->prostate_value : 'ng/ml' }}
            </td>
            <td>{{ isset($tumorMarkerData->status->prostate_value) ? ucwords($tumorMarkerData->status->prostate_value) : '' }}</td>
            <td style="text-align: right"> {{ '0.0 - 4.0 ng/ml' }} </td>
        </tr>
    @endif

</table>
<div class="notes">
    <strong>Notes/Comments: </strong> {{ $tumorMarkerData->additional_notes or ' ' }}
</div>