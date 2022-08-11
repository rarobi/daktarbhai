<h3 style="font-size: 16px; font-weight: 500;">Serology Report</h3>
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
    @if(isset($serologyData->hbsag_value))
        <tr>
            <td style="text-align: right">HBsAg</td>
            <td>
                {{ $serologyData->hbsag_value }}
            </td>
            <td>{{ isset($serologyData->status->hbsag_value) ? ucwords($serologyData->status->hbsag_value) : '' }}</td>
            <td style="text-align: right"> {{ '' }} </td>
        </tr>
    @endif

    @if(isset($serologyData->tpha_value))
        <tr>
            <td style="text-align: right">TPHA</td>
            <td>
                {{ $serologyData->tpha_value }}
            </td>
            <td>{{ isset($serologyData->status->tpha_value) ? ucwords($serologyData->status->tpha_value) : '' }}</td>
            <td style="text-align: right"> {{ '' }} </td>
        </tr>
    @endif

    @if(isset($serologyData->aso_titer_value))
        <tr>
            <td style="text-align: right">ASO Titer</td>
            <td>
                {{ $serologyData->aso_titer_value }} {{ isset($list->units->aso_titer_value) ? $list->units->aso_titer_value : 'iu/ml' }}
            </td>
            <td>{{ isset($serologyData->status->aso_titer_value) ? ucwords($serologyData->status->aso_titer_value) : '' }}</td>
            <td style="text-align: right"> {{ '100 - 600 iu/ml' }} </td>
        </tr>
    @endif

    @if(isset($serologyData->ra_value))
        <tr>
            <td style="text-align: right">RA</td>
            <td>
                {{ $serologyData->ra_value }}
            </td>
            <td>{{ isset($serologyData->status->ra_value) ? ucwords($serologyData->status->ra_value) : '' }}</td>
            <td style="text-align: right"> {{ '' }} </td>
        </tr>
    @endif

    @if(isset($serologyData->crp_value))
        <tr>
            <td style="text-align: right">CRP</td>
            <td>
                {{ $serologyData->crp_value }} {{ isset($list->units->crp_value) ? $list->units->crp_value : 'mg/l' }}
            </td>
            <td>{{ isset($serologyData->status->crp_value) ? ucwords($serologyData->status->crp_value) : '' }}</td>
            <td style="text-align: right"> {{ '5 - 40 mg/l' }} </td>
        </tr>
    @endif

    @if(isset($serologyData->widal_value))
        <tr>
            <td style="text-align: right">WIDAL</td>
            <td>
                {{ $serologyData->widal_value }}
            </td>
            <td>{{ isset($serologyData->status->widal_value) ? ucwords($serologyData->status->widal_value) : '' }}</td>
            <td style="text-align: right"> {{ '1:40 - 1:320' }} </td>
        </tr>
    @endif
    @if(isset($serologyData->vdrl_value))
        <tr>
            <td style="text-align: right">VDRL</td>
            <td>
                {{ ucwords($serologyData->vdrl_value) }}
            </td>
            <td>{{ isset($serologyData->status->vdrl_value) ? ucwords($serologyData->status->vdrl_value) : '' }}</td>
            <td style="text-align: right"> {{ '' }} </td>
        </tr>
    @endif
</table>
<div class="notes">
    <strong>Notes/Comments: </strong> {{ isset($serologyData->additional_notes) ? $serologyData->additional_notes : ' ' }}
</div>