@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'PHR - Kidney | ' . app_name()  !!}
@endsection

@section('main-content')

    <!-- ————————————————————————————————————————————
            ———	Phr Content
            —————————————————————————————————————————————— -->
    <!-- Content start here -->

    @if(isset($phr))
        <h3 class="phr-title">{{__('phr.kidney.details')}}: {{ $user->name or '' }}</h3>

        <div class="phr-action">
            <a href="{!! route('frontend.phr.edit',['phr' => $phr, 'id'=> $list->id] ) !!}"><i class="ion-compose"></i> {{__('phr.common.action.edit')}}</a>
            <a href="{!! route('frontend.phr.index', 'kidney') !!}"><i class="ion-ios-undo"></i>{{__('phr.common.back')}}</a>
        </div>

        <div class="table-responsive phr-table bmi-details">
            <table class="table" width="50%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{__('phr.kidney.table.title.details')}}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{__('phr.kidney.table.title.urea')}}</td>
                        <td>{{ $list->serum_urea_level or '' }} mg/dL</td>
                    </tr>
                    <tr>
                        <td>{{__('phr.kidney.table.title.creatinine')}}</td>
                        <td>{{ $list->serum_creatinine or '' }} mg/dL</td>
                    </tr>
                    <tr>
                        <td>{{__('phr.kidney.table.title.uric_acid')}}</td>
                        <td>{{ $list->serum_uric_acid or '' }} mg/dL</td>
                    </tr>
                    <tr>
                        <td>{{__('phr.kidney.table.title.calcium')}}</td>
                        <td>{{ $list->serum_calcium or '' }} mg/dL</td>
                    </tr>
                    <tr>
                        <td>{{__('phr.kidney.table.title.phosphate')}}</td>
                        <td>{{ $list->serum_phosphate or '' }}</td>
                    </tr>
                    <tr>
                        <td>{{__('phr.kidney.table.title.nitrogen')}}</td>
                        <td>{{ $list->serum_urea_nitrogen or '' }}</td>
                    </tr>
                    <tr>
                        <td>{{__('phr.kidney.table.title.eger')}}</td>
                        <td>{{ $list->eGFR or '' }}</td>
                    </tr>
                    <tr>
                        <td>{{__('phr.common.table_report_date')}}</td>
                        <td>{{ $list->report_datetime or '' }}</td>
                    </tr>
                    <tr>
                        <td>{{__('phr.common.table_advice')}}</td>
                        <td>{{ $list->additional_notes or '' }}</td>
                    </tr>
                </tbody>
            </table>

            @include('frontend.pages.phr.partials.download-form')

        </div>
    @endif

    <!-- ————————————————————————————————————————————
            ———	END phr Content
            —————————————————————————————————————————————— -->
@endsection
