@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'PHR - Liver Function | ' . app_name()  !!}
@endsection

@section('main-content')

    <!-- ————————————————————————————————————————————
            ———	Phr Content
            —————————————————————————————————————————————— -->
    <!-- Content start here -->
    @if(isset($phr))
        <h3 class="phr-title">{{__('phr.liver-function.details')}}: {{ $user->name or '' }}</h3>

        <div class="phr-action">
            <a href="{!! route('frontend.phr.edit',['phr' => $phr, 'id'=> $list->id] ) !!}"><i class="ion-compose"></i> {{__('phr.common.action.edit')}}</a>
            <a href="{!! route('frontend.phr.index', 'liver') !!}"><i class="ion-ios-undo"></i> {{__('phr.common.back')}}</a>
        </div>

        <div class="table-responsive phr-table bmi-details">
            <table class="table" width="50%" cellspacing="0">
                <thead>
                <tr>
                    <th>Liver Function Report Details</th>
                    <th></th>
                    <th></th>
                    {{--<th class="text-right">Report Date: {{ isset($list->report_datetime) ? $list->report_datetime : '' }}</th>--}}
                </tr>
                </thead>

                <tbody>

                @if($list->alkaline_phosphate_value)
                    <tr>
                        <td>Alkaline Phosphate</td>
                        <td>{{ $list->alkaline_phosphate_value }} {{ 'U/L' }}</td>
                        <td>{{ isset($list->status->alkaline_phosphate_value) ? ucwords($list->status->alkaline_phosphate_value) : '' }}</td>
                    </tr>
                @endif

                @if($list->total_bilirubin_value)
                    <tr>
                        <td>Total Bilirubin</td>
                        <td>{{ isset($list->total_bilirubin_value) ? $list->total_bilirubin_value : '' }} {{ 'mg/dL' }}</td>
                        <td>{{ isset($list->status->total_bilirubin_value) ? ucwords($list->status->total_bilirubin_value) : '' }}</td>
                    </tr>
                @endif

                @if($list->alt_value)
                    <tr>
                        <td>ALT (SGPT)</td>
                        <td>{{ isset($list->alt_value) ? $list->alt_value : '' }} {{ 'U/L' }}</td>
                        <td>{{ isset($list->status->alt_value) ? ucwords($list->status->alt_value) : '' }}</td>
                    </tr>
                @endif

                @if($list->ast_value)
                    <tr>
                        <td>AST (SGOT)</td>
                        <td>{{ isset($list->ast_value) ? $list->ast_value : '' }} {{ 'U/L' }}</td>
                        <td>{{ isset($list->status->ast_value) ? ucwords($list->status->ast_value) : '' }}</td>
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
