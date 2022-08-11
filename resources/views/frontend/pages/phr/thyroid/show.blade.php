@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'PHR - Thyroid Function | ' . app_name() !!}
@endsection

@section('main-content')

    <!-- ————————————————————————————————————————————
            ———	Phr Content
            —————————————————————————————————————————————— -->
    <!-- Content start here -->
    @if(isset($phr))
        <h3 class="phr-title">{{__('phr.thyroid.details')}}: {{ $user->name or '' }}</h3>

        <div class="phr-action">
            <a href="{!! route('frontend.phr.edit',['phr' => $phr, 'id'=> $list->id] ) !!}"><i class="ion-compose"></i> {{__('phr.common.action.edit')}}</a>
            <a href="{!! route('frontend.phr.index', 'thyroid') !!}"><i class="ion-ios-undo"></i> {{__('phr.common.back')}}</a>
        </div>

        <div class="table-responsive phr-table bmi-details">
            <table class="table" width="50%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Thyroid Report Details</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        {{--<th class="text-right">Report Date: {{ isset($list->report_datetime) ? $list->report_datetime : '' }}</th>--}}
                    </tr>
                </thead>

                <tbody>
                @if($list->tsh)
                    <tr>
                        <td>TSH</td>
                        <td>{{ $list->tsh }} {{ isset($list->units->tsh) ? $list->units->tsh : 'pg/ml' }}</td>
                        <td>{{ isset($list->status->tsh) ? ucwords($list->status->tsh) : '' }}</td>
                        <td>{{ '0.7 - 7.0 pg/ml' }}</td>
                    </tr>
                @endif
                @if($list->tt4)
                    <tr>
                        <td>TT4</td>
                        <td>{{ isset($list->tt4) ? $list->tt4 : '' }} {{ isset($list->units->tt4) ? $list->units->tt4 : 'ug/dl' }}</td>
                        <td>{{ isset($list->status->tt4) ? ucwords($list->status->tt4) : '' }}</td>
                        <td>{{ '2.0 - 17.0 ug/dl' }}</td>
                    </tr>
                @endif
                @if($list->ft4)
                    <tr>
                        <td>FT4</td>
                        <td>{{ isset($list->ft4) ? $list->ft4 : '' }} {{ isset($list->units->ft4) ? $list->units->ft4 : 'µl/ml' }}</td>
                        <td>{{ isset($list->status->ft4) ? ucwords($list->status->ft4) : '' }}</td>
                        <td>{{ '0.2 - 3.0 µl/ml' }}</td>
                    </tr>
                @endif
                @if($list->ft3)
                    <tr>
                        <td>FT3</td>
                        <td>{{ isset($list->ft3) ? $list->ft3 : '' }} {{ isset($list->units->ft3) ? $list->units->ft3 : 'ng/dl' }}</td>
                        <td>{{ isset($list->status->ft3) ? ucwords($list->status->ft3) : '' }}</td>
                        <td>{{ '0.5 - 7.0 ng/dl' }}</td>
                    </tr>
                @endif
                @if($list->total_t3)
                    <tr>
                        <td>Total T3</td>
                        <td>{{ isset($list->total_t3) ? $list->total_t3 : '' }} {{ isset($list->units->total_t3) ? $list->units->total_t3 : 'ng/dl' }}</td>
                        <td>{{ isset($list->status->total_t3) ? ucwords($list->status->total_t3) : '' }}</td>
                        <td>{{ '30 - 220 ng/dl' }}</td>
                    </tr>
                @endif
                @if($list->report_datetime)
                    <tr>
                        <td>Report Date</td>
                        <td>{{ isset($list->report_datetime) ? $list->report_datetime : '' }} </td>
                        <td></td>
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
