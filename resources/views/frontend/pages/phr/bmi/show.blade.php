@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'PHR - BMI | ' . app_name()  !!}
@endsection

@section('main-content')

    <!-- ————————————————————————————————————————————
            ———	Phr Content
            —————————————————————————————————————————————— -->
    <!-- Content start here -->
    @if(isset($phr))
        <h3 class="phr-title">{{__('phr.bmi.bmi')}}: {{ $user->name or '' }}</h3>

        <div class="phr-action">
            <a href="{!! route('frontend.phr.edit',['phr' => 'bmi', 'id'=> $list->id] ) !!}"><i class="ion-compose"></i> {{__('phr.common.action.edit')}}</a>
            <a href="{!! route('frontend.phr.index', 'bmi') !!}"><i class="ion-ios-undo"></i> {{__('phr.common.back')}}</a>
        </div>

        <div class="table-responsive phr-table bmi-details">
            <table class="table" width="50%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{__('phr.bmi.details')}}</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>{{__('phr.bmi.table.title.height')}}</td>
                        <td>{{ $list->height or '' }}</td>
                    </tr>
                    <tr>
                        <td>{{__('phr.bmi.table.title.weight')}}</td>
                        <td>{{ $list->weight or '' }}{{__('phr.bmi.unit.kg')}}</td>
                    </tr>
                    <tr>
                        <td>{{__('phr.bmi.table.title.bmi_value')}}</td>
                        <td>{{ $list->bmi or '' }}({{ ucwords($list->bmi_status) }})</td>
                    </tr>
                    <tr>
                        <td>{{__('phr.common.table_report_date')}}</td>
                        <td>{{ $list->report_datetime or '' }}</td>
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
