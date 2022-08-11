<h3 style="font-size: 16px; font-weight: 500;">Electrolytes Report</h3>
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
    @if(isset($electrolyteData->sodium))
        <tr>
            <td style="text-align: right">Sodium</td>
            <td>
                {{ $electrolyteData->sodium }} {{ isset($electrolyteData->units->sodium) ? $electrolyteData->units->sodium : 'mmol/L' }}
            </td>
            <td>{{ isset($electrolyteData->status->sodium) ? ucwords($electrolyteData->status->sodium) : '' }}</td>
            <td style="text-align: right"> {{ isset($electrolyteDataRange->sodium) ? $electrolyteDataRange->sodium : '136 - 145 mmol/L' }} </td>
        </tr>
    @endif

    @if(isset($electrolyteData->potassium))
        <tr>
            <td style="text-align: right">Potassium</td>
            <td>
                {{ $electrolyteData->potassium }} {{ isset($electrolyteData->units->potassium) ? $electrolyteData->units->potassium : 'mmol/L' }}
            </td>
            <td>{{ isset($electrolyteData->status->potassium) ? ucwords($electrolyteData->status->potassium) : '' }}</td>
            <td style="text-align: right"> {{ isset($electrolyteDataRange->potassium) ? $electrolyteDataRange->potassium : '3.5 - 5.1 mmol/L' }} </td>
        </tr>
    @endif

    @if(isset($electrolyteData->chloride))
        <tr>
            <td style="text-align: right">Chloride</td>
            <td>
                {{ $electrolyteData->chloride }} {{ isset($electrolyteData->units->chloride) ? $electrolyteData->units->chloride : 'mmol/L' }}
            </td>
            <td>{{ isset($electrolyteData->status->chloride) ? ucwords($electrolyteData->status->chloride) : '' }}</td>
            <td style="text-align: right"> {{ isset($electrolyteDataRange->chloride) ? $electrolyteDataRange->chloride : '96 - 107 mmol/L' }} </td>
        </tr>
    @endif

    @if(isset($electrolyteData->bicarbonate))
        <tr>
            <td style="text-align: right">Bicarbonate</td>
            <td>
                {{ $electrolyteData->bicarbonate }} {{ isset($electrolyteData->units->bicarbonate) ? $electrolyteData->units->bicarbonate : 'mmol/L' }}
            </td>
            <td>{{ isset($electrolyteData->status->bicarbonate) ? ucwords($electrolyteData->status->bicarbonate) : '' }}</td>
            <td style="text-align: right"> {{ isset($electrolyteDataRange->bicarbonate) ? $electrolyteDataRange->bicarbonate : '21 - 32 mmol/L' }} </td>
        </tr>
    @endif

    @if(isset($electrolyteData->pH))
        <tr>
            <td style="text-align: right">pH Value</td>
            <td>
                {{ $electrolyteData->pH }}
            </td>
            <td>{{ isset($electrolyteData->status->pH) ? ucwords($electrolyteData->status->pH) : '' }}</td>
            <td style="text-align: right"> {{ isset($electrolyteDataRange->pH) ? $electrolyteDataRange->pH : '7.35 - 7.45' }} </td>
        </tr>
    @endif

</table>
<div class="notes">
    <strong>Notes/Comments: </strong> {{ $electrolyteData->additional_notes or ' ' }}
</div>