@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'PHR - Lipid | ' . app_name()  !!}
@endsection

@section('main-content')

    <!-- ————————————————————————————————————————————
            ———	Phr Content
            —————————————————————————————————————————————— -->
    <!-- Content start here -->
    @if(isset($phr))
        <h3 class="phr-title">{{__('phr.lipid.details')}}: {{ $user->name or '' }}</h3>

        <div class="phr-action">
            <a href="{!! route('frontend.phr.edit',['phr' => $phr, 'id'=> $list->id] ) !!}"><i class="ion-compose"></i> {{__('phr.common.action.edit')}}</a>
            <a href="{!! route('frontend.phr.index', 'lipid') !!}"><i class="ion-ios-undo"></i> {{__('phr.common.back')}}</a>
        </div>

        <div class="table-responsive phr-table bmi-details">
            <table class="table" width="50%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{__('phr.lipid.table.title.details')}}</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>{{__('phr.lipid.table.title.cholesterol')}}</td>
                        <td>{{ $list->total_cholesterol or '' }} mg/dL</td>
                    </tr>
                    <tr>
                        <td>{{__('phr.lipid.table.title.triglyceride')}}</td>
                        <td>{{ $list->triglycerides or '' }} mg/dL</td>
                    </tr>
                    <tr>
                        <td>{{__('phr.lipid.table.title.hdl')}}</td>
                        <td>{{ $list->hdl or '' }} mg/dL</td>
                    </tr>
                    <tr>
                        <td>{{__('phr.lipid.table.title.ldl')}}</td>
                        <td>{{ $list->ldl or '' }} mg/dL</td>
                    </tr>
                    <tr>
                        <td>{{__('phr.lipid.table.title.hdl_ratio')}}</td>
                        <td>{{ $list->total_cholesterol_hdl_ratio or '' }}</td>
                    </tr>
                    <tr>
                        <td>{{__('phr.common.table_report_date')}}</td>
                        <td>{{ $list->report_datetime or '' }}</td>
                    </tr>
                    <tr>
                        <td>{{__('phr.lipid.table.title.advice')}}</td>
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
