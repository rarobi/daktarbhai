@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'PHR - Electrolytes | ' . app_name()  !!}
@endsection

@section('main-content')

    <!-- ————————————————————————————————————————————
            ———	Phr Content
            —————————————————————————————————————————————— -->
    <!-- Content start here -->
    @if(isset($phr))
        <h3 class="phr-title">{{__('phr.electrolytes-profile.details')}}: {{ $user->name or '' }}</h3>

        <div class="phr-action">
            <a href="{!! route('frontend.phr.edit',['phr' => $phr, 'id'=> $list->id] ) !!}"><i class="ion-compose"></i> {{__('phr.common.action.edit')}}</a>
            <a href="{!! route('frontend.phr.index', 'electrolyte') !!}"><i class="ion-ios-undo"></i> {{__('phr.common.back')}}</a>
        </div>

        <div class="table-responsive phr-table bmi-details">
            <table class="table" width="50%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Electrolytes Report Details</th>
                        <th></th>
                        <th></th>
                        {{--<th class="text-right">Report Date: {{ isset($list->report_datetime) ? $list->report_datetime : '' }}</th>--}}
                    </tr>
                </thead>

                <tbody>
                @if($list->sodium)
                    <tr>
                        <td>Sodium</td>
                        <td>{{ isset($list->sodium) ? $list->sodium : '' }} {{ isset($list->units->sodium) ? $list->units->sodium : $list->units->sodium }} </td>
                        <td>{{ isset($list->status->sodium) ? ucwords($list->status->sodium) : '' }}</td>
                    </tr>
                @endif

                @if($list->potassium)
                    <tr>
                        <td>Potassium</td>
                        <td>{{ isset($list->potassium) ? $list->potassium : '' }} {{ isset($list->units->potassium) ? $list->units->potassium : 'mmol/L' }} </td>
                        <td>{{ isset($list->status->potassium) ? ucwords($list->status->potassium) : '' }}</td>
                    </tr>
                @endif

                @if($list->chloride)
                    <tr>
                        <td>Chloride</td>
                        <td>{{ isset($list->chloride) ? $list->chloride : '' }} {{ isset($list->units->chloride) ? $list->units->chloride : 'mmol/L' }} </td>
                        <td>{{ isset($list->status->chloride) ? ucwords($list->status->chloride) : '' }}</td>
                    </tr>
                @endif

                @if($list->bicarbonate)
                    <tr>
                        <td>Bicarbonate</td>
                        <td>{{ isset($list->bicarbonate) ? $list->bicarbonate : '' }} {{ isset($list->units->bicarbonate) ? $list->units->bicarbonate : 'mmol/L' }} </td>
                        <td>{{ isset($list->status->bicarbonate) ? ucwords($list->status->bicarbonate) : '' }}</td>
                    </tr>
                @endif

                @if($list->pH)
                    <tr>
                        <td>pH Value</td>
                        <td>{{ isset($list->pH) ? $list->pH : '' }} {{ isset($list->units->pH) ? $list->units->pH : '' }} </td>
                        <td>{{ isset($list->status->pH) ? ucwords($list->status->pH) : '' }}</td>
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
