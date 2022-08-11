<h3 style="font-size: 16px; font-weight: 500;">Complete Blood Count</h3>
<table style="width:100%">
    <thead>
    <tr>
        <th>Test Parameter</th>
        <th>Result</th>
        <th>Normal Value/Range</th>
    </tr>
    </thead>

    <tbody>
    @if(isset($cbcData->hemoglobin))
        <tr>
            <td>Hemoglobin</td>
            <td>{{ $cbcData->hemoglobin or '' }} {{ $cbcData->units->hemoglobin or '' }} </td>
            <td>14.0 – 18.0 (Male) 12.0 – 16.0 (Female) </td>
        </tr>
    @endif
    @if(isset($cbcData->esr))
        <tr>
            <td>ESR</td>
            <td>{{ $cbcData->esr or '' }} {{ $cbcData->units->esr or '' }} </td>
            <td>0 – 22 (Male), 0 – 29 (Female)</td>
        </tr>
    @endif
    @if(isset($cbcData->total_wbc))
        <tr>
            <td>Total WBC</td>
            <td>{{ $cbcData->total_wbc or '' }} {{ $cbcData->units->total_wbc or '' }} </td>
            <td>4,500 – 11,000 (cells/μL), 4.5 – 11.0 (10^9/L)</td>
        </tr>
    @endif
    @if(isset($cbcData->platelets))
        <tr>
            <td>Platelets</td>
            <td>{{ $cbcData->platelets or '' }} {{ $cbcData->units->platelets or '' }} </td>
            <td>150,000 – 450,000</td>
        </tr>
    @endif
    @if(isset($cbcData->neutrophils))
        <tr>
            <td>Neutrophilis</td>
            <td>{{ $cbcData->neutrophils or '' }}{{ $cbcData->units->neutrophils or '' }} </td>
            <td>40 – 80</td>
        </tr>
    @endif
    @if(isset($cbcData->lymphocytes))
        <tr>
            <td>Lymphocytes</td>
            <td>{{ $cbcData->lymphocytes or '' }}{{ $cbcData->units->lymphocytes or '' }} </td>
            <td>20 – 40</td>
        </tr>
    @endif
    @if(isset($cbcData->eosinophils))
        <tr>
            <td>Eosinophils</td>
            <td>{{ $cbcData->eosinophils or '' }}{{ $cbcData->units->eosinophils or '' }} </td>
            <td>2 – 10</td>
        </tr>
    @endif
    @if(isset($cbcData->monocytes))
        <tr>
            <td>Monocytes</td>
            <td>{{ $cbcData->monocytes or '' }}{{ $cbcData->units->monocytes or '' }}</td>
            <td>1 – 6</td>
        </tr>
    @endif
    @if(isset($cbcData->basophils))
        <tr>
            <td>Basophils</td>
            <td>{{ $cbcData->basophils or '' }}{{ $cbcData->units->basophils or '' }}</td>
            <td>< 1 – 2</td>
        </tr>
    @endif
    @if(isset($cbcData->rbc))
        <tr>
            <td>Red Blood Count</td>
            <td>{{ $cbcData->rbc or '' }} {{ $cbcData->units->rbc or '' }}</td>
            <td>4.7 – 6.1 (Male), 4.2 – 5.4 (Female)</td>
        </tr>
    @endif
    @if(isset($cbcData->pcv))
        <tr>
            <td>Pack Cell Volume</td>
            <td>{{ $cbcData->pcv or '' }}{{ $cbcData->units->pcv or '' }}</td>
            <td>0.46 (Male), 0.42(Female) </td>
        </tr>
    @endif
    @if(isset($cbcData->mcv))
        <tr>
            <td>Mean Cell Volume</td>
            <td>{{ $cbcData->mcv or '' }} {{ $cbcData->units->mcv or '' }}</td>
            <td>80 – 100</td>
        </tr>
    @endif
    @if(isset($cbcData->mch))
        <tr>
            <td>Mean Cell Haemoglobin</td>
            <td> {{ $cbcData->mch or '' }} {{ $cbcData->units->mch or '' }}</td>
            <td>27 – 31</td>
        </tr>
    @endif
    @if(isset($cbcData->mchc))
        <tr>
            <td>Mean Corpuscular Hemoglobin Concentration</td>
            <td>{{ $cbcData->mchc or '' }} {{ $cbcData->units->mchc or '' }}</td>
            <td>32 – 36</td>
        </tr>
    @endif
    @if(isset($cbcData->rwd))
        <tr>
            <td>Red Cell Distribution Width</td>
            <td>{{ $cbcData->rwd or '' }} {{ $cbcData->units->rwd or '' }}</td>
            <td>11.5 – 14.5</td>
        </tr>
    @endif
</table>