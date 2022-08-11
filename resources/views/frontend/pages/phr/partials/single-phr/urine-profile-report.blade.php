<h3 style="font-size: 16px; font-weight: 500;">Urine Profile</h3>
<table style="width:100%">
    <thead>
    <tr>
        <th style="text-align: right">Test Parameter</th>
        <th>Result</th>
        <th style="text-align: right">Normal Value/Range</th>
    </tr>
    </thead>

    <tbody>
    @if(isset($urineProfileData->color))
        <tr>
            <td style="text-align: right">Color</td>
            <td>{{ $urineProfileData->color }}</td>
            <td style="text-align: right"> {{ 'Pale Yellow-Yellow' }} </td>
        </tr>
    @endif
    @if(isset($urineProfileData->appearance))
        <tr>
            <td style="text-align: right">Appearance</td>
            <td>{{ $urineProfileData->appearance }}</td>
            <td style="text-align: right"> {{ 'Clear' }} </td>
        </tr>
    @endif
    @if(isset($urineProfileData->sediment))
        <tr>
            <td style="text-align: right">Sediment</td>
            <td>{{ $urineProfileData->sediment }}</td>
            <td style="text-align: right"> {{ 'Nil' }} </td>
        </tr>
    @endif
    @if(isset($urineProfileData->reaction))
        <tr>
            <td style="text-align: right">Reaction</td>
            <td>{{ $urineProfileData->reaction }}</td>
            <td style="text-align: right"> {{ 'Acidic' }} </td>
        </tr>
    @endif
    @if(isset($urineProfileData->phosphate))
        <tr>
            <td style="text-align: right">Phosphate</td>
            <td>{{ $urineProfileData->phosphate }}</td>
            <td style="text-align: right"> {{ '0.4 - 1.3' }} </td>
        </tr>
    @endif
    @if(isset($urineProfileData->glucose))
        <tr>
            <td style="text-align: right">Glucose</td>
            <td>{{ $urineProfileData->glucose }}</td>
            <td style="text-align: right">{{ 'Nil' }}</td>
        </tr>
    @endif
    @if(isset($urineProfileData->albumin))
        <tr>
            <td style="text-align: right">Albumin</td>
            <td>{{ $urineProfileData->albumin }}</td>
            <td style="text-align: right">{{ '<30' }}</td>
        </tr>
    @endif
    @if(isset($urineProfileData->rbc_value))
        <tr>
            <td style="text-align: right">Red Blood Cell</td>
            <td>{{ $urineProfileData->rbc_value }}</td>
            <td style="text-align: right">{{ '0-2' }}</td>
        </tr>
    @endif
    @if(isset($urineProfileData->casts_value))
        <tr>
            <td style="text-align: right">Casts Value</td>
            <td>{{ $urineProfileData->casts_value }}</td>
            <td style="text-align: right">{{ '0-4' }}</td>
        </tr>
    @endif
    @if(isset($urineProfileData->crystals))
        <tr>
            <td style="text-align: right">Crystals</td>
            <td>{{ $urineProfileData->crystals }}</td>
            <td style="text-align: right">{{ '' }}</td>
        </tr>
    @endif
    <tr>
        <td style="text-align: right">Epithelial Cell</td>
        <td>
            @if(isset($urineProfileData->epithelial_cell_status))
                {{ $urineProfileData->epithelial_cell_status }}
            @else
                {{ isset($urineProfileData->epithelial_cell_min) ? $urineProfileData->epithelial_cell_min : '' }} - {{ isset($urineProfileData->epithelial_cell_max) ? $urineProfileData->epithelial_cell_max : '' }}
            @endif
        </td>
        <td style="text-align: right">{{ '0-4' }}</td>
    </tr>
    <tr>
        <td style="text-align: right">PUS Cell</td>
        <td>
            @if(isset($urineProfileData->pus_cell_status))
                {{ $urineProfileData->pus_cell_status }}
            @else
                {{ isset($urineProfileData->pus_cell_min) ? $urineProfileData->pus_cell_min : '' }} - {{ isset($urineProfileData->pus_cell_max) ? $urineProfileData->pus_cell_max : '' }}
            @endif
        </td>
        <td style="text-align: right">{{ '0-4' }}</td>
    </tr>
    @if(isset($urineProfileData->ketones))
        <tr>
            <td style="text-align: right">Ketones</td>
            <td>{{ $urineProfileData->ketones }}</td>
            <td style="text-align: right">{{ '0-4' }}</td>
        </tr>
    @endif
    @if(isset($urineProfileData->sg))
        <tr>
            <td style="text-align: right">Specific Gravity</td>
            <td>{{ $urineProfileData->sg }}</td>
            <td style="text-align: right">{{ '1.000-1.030' }}</td>
        </tr>
    @endif
    @if(isset($urineProfileData->ph_value))
        <tr>
            <td style="text-align: right">pH Value</td>
            <td>{{ $urineProfileData->ph_value }}</td>
            <td style="text-align: right">{{ '4.5-7.8' }}</td>
        </tr>
    @endif
    @if(isset($urineProfileData->wbc_value))
        <tr>
            <td style="text-align: right">White Blood Cell</td>
            <td>{{ $urineProfileData->wbc_value }}</td>
            <td style="text-align: right">{{ '' }}</td>
        </tr>
    @endif
    @if(isset($urineProfileData->leucocytes))
        <tr>
            <td style="text-align: right">Leucocytes</td>
            <td>{{ $urineProfileData->leucocytes }}</td>
            <td style="text-align: right">{{ '' }}</td>
        </tr>
    @endif
    @if(isset($urineProfileData->erythrocytes))
        <tr>
            <td style="text-align: right">Erythrocytes</td>
            <td>{{ $urineProfileData->erythrocytes }}</td>
            <td style="text-align: right">{{ '' }}</td>
        </tr>
    @endif
</table>
<div class="notes">
    <strong>Notes/Comments: </strong> {{ $urineProfileData->additional_notes or ' ' }}
</div>