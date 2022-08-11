@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'PHR - Serology | ' . app_name() !!}
@endsection

@section('main-content')

    <!-- ————————————————————————————————————————————
            ———	Phr Content
            —————————————————————————————————————————————— -->
    <!-- Content start here -->
    @if(isset($phr))
        <h3 class="phr-title">{{__('phr.serology.details')}}: {{ $user->name or '' }}</h3>

        <div class="phr-action">
            <a href="{!! route('frontend.phr.edit',['phr' => $phr, 'id'=> $list->id] ) !!}"><i class="ion-compose"></i>  {{__('phr.common.action.edit')}}</a>
            <a href="{!! route('frontend.phr.index', 'serology') !!}"><i class="ion-ios-undo"></i> {{__('phr.common.back')}}</a>
        </div>

        <div class="table-responsive phr-table bmi-details">
            <table class="table" width="50%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Serology Report Details</th>
                        <th></th>
                        <th></th>
                        {{--<th class="text-right">Report Date: {{ isset($list->report_datetime) ? $list->report_datetime : '' }}</th>--}}
                    </tr>
                </thead>

                <tbody>
                @if($list->hbsag_value)
                    <tr>
                        <td>HBsAg</td>
                        <td>{{ $list->hbsag_value }}</td>
                        <td>{{ isset($list->status->hbsag_value) ? ucwords($list->status->hbsag_value) : '' }}</td>
                    </tr>
                @endif
                @if($list->tpha_value)
                    <tr>
                        <td>TPHA</td>
                        <td>{{ isset($list->tpha_value) ? $list->tpha_value : '' }}</td>
                        <td>{{ isset($list->status->tpha_value) ? ucwords($list->status->tpha_value) : '' }}</td>
                    </tr>
                @endif
                @if($list->aso_titer_value)
                    <tr>
                        <td>ASO Titer</td>
                        <td>{{ isset($list->aso_titer_value) ? $list->aso_titer_value : '' }} {{ isset($list->units->aso_titer_value) ? $list->units->aso_titer_value : 'iu/ml' }}</td>
                        <td>{{ isset($list->status->aso_titer_value) ? ucwords($list->status->aso_titer_value) : '' }}</td>
                    </tr>
                @endif
                @if($list->ra_value)
                    <tr>
                        <td>RA</td>
                        <td>{{ isset($list->ra_value) ? $list->ra_value : '' }}</td>
                        <td>{{ isset($list->status->ra_value) ? ucwords($list->status->ra_value) : '' }}</td>
                    </tr>
                @endif
                @if($list->crp_value)
                    <tr>
                        <td>CRP</td>
                        <td>{{ isset($list->crp_value) ? $list->crp_value : '' }} {{ isset($list->units->crp_value) ? $list->units->crp_value : 'mg/l' }}</td>
                        <td>{{ isset($list->status->crp_value) ? ucwords($list->status->crp_value) : '' }}</td>
                    </tr>
                @endif
                @if($list->widal_value)
                    <tr>
                        <td>WIDAL</td>
                        <td>{{ isset($list->widal_value) ? $list->widal_value : '' }}</td>
                        <td>{{ isset($list->status->widal_value) ? ucwords($list->status->widal_value) : '' }}</td>
                    </tr>
                @endif
                @if($list->vdrl_value)
                    <tr>
                        <td>VDRL</td>
                        <td>{{ isset($list->vdrl_value) ? ucwords($list->vdrl_value) : '' }}</td>
                        <td>{{ isset($list->status->vdrl_value) ? ucwords($list->status->vdrl_value) : '' }}</td>
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
