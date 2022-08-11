@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'PHR - Tumor Marker | ' . app_name()  !!}
@endsection

@section('main-content')

    <!-- ————————————————————————————————————————————
            ———	Phr Content
            —————————————————————————————————————————————— -->
    <!-- Content start here -->
    @if(isset($phr))
        <h3 class="phr-title">{{__('phr.tumor-marker.details')}}: {{ $user->name or '' }}</h3>

        <div class="phr-action">
            <a href="{!! route('frontend.phr.edit',['phr' => $phr, 'id'=> $list->id] ) !!}"><i class="ion-compose"></i> {{__('phr.common.action.edit')}}</a>
            <a href="{!! route('frontend.phr.index', 'tumor-marker') !!}"><i class="ion-ios-undo"></i> {{__('phr.common.back')}}</a>
        </div>

        <div class="table-responsive phr-table bmi-details">
            <table class="table" width="50%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tumor Marker Report Details</th>
                        <th></th>
                        <th></th>
                        {{--<th class="text-right">Report Date: {{ isset($list->report_datetime) ? $list->report_datetime : '' }}</th>--}}
                    </tr>
                </thead>

                <tbody>
                @if($list->ca15_value)
                    <tr>
                        <td>Ca15 Value</td>
                        <td>{{ isset($list->ca15_value) ? $list->ca15_value : '' }} {{ isset($list->units->ca15_value) ? $list->units->ca15_value : 'u/ml' }} </td>
                        <td>{{ isset($list->status->ca15_value) ? ucwords($list->status->ca15_value) : '' }}</td>
                    </tr>
                @endif

                @if($list->ca125_value)
                    <tr>
                        <td>Ca125 Value</td>
                        <td>{{ isset($list->ca125_value) ? $list->ca125_value : '' }} {{ isset($list->units->ca125_value) ? $list->units->ca125_value : 'u/ml' }} </td>
                        <td>{{ isset($list->status->ca125_value) ? ucwords($list->status->ca125_value) : '' }}</td>
                    </tr>
                @endif

                @if($list->alpha_value)
                    <tr>
                        <td>Alpha Fetoprotein</td>
                        <td>{{ isset($list->alpha_value) ? $list->alpha_value : '' }} {{ isset($list->units->alpha_value) ? $list->units->alpha_value : 'µl/l' }} </td>
                        <td>{{ isset($list->status->alpha_value) ? ucwords($list->status->alpha_value) : '' }}</td>
                    </tr>
                @endif

                @if($list->carcino_value)
                    <tr>
                        <td>Carcinoembryonic Antigen (CEA)</td>
                        <td>{{ isset($list->carcino_value) ? $list->carcino_value : '' }} {{ isset($list->units->carcino_value) ? $list->units->carcino_value : 'ng/ml' }} </td>
                        <td>{{ isset($list->status->carcino_value) ? ucwords($list->status->carcino_value) : '' }}</td>
                    </tr>
                @endif

                @if($list->prostate_value)
                    <tr>
                        <td>Prostate Specific Antigen (PSA)</td>
                        <td>{{ isset($list->prostate_value) ? $list->prostate_value : '' }} {{ isset($list->units->prostate_value) ? $list->units->prostate_value : 'ng/ml' }} </td>
                        <td>{{ isset($list->status->prostate_value) ? ucwords($list->status->prostate_value) : '' }}</td>
                    </tr>
                @endif
                @if($list->report_datetime)
                    <tr>
                        <td>Report Date</td>
                        <td>{{ isset($list->report_datetime) ? $list->report_datetime : '' }} </td>
                        <td></td>
                    </tr>
                @endif
                </tbody>
            </table>

            @include('frontend.pages.phr.partials.download-form')

        </div>
    @endif
    <!-- ————————————————————————————————————————————
            ———	END phr Content
            —————————————————————————————————————————————— -->
@endsection
