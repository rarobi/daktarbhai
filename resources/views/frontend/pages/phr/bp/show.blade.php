@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'PHR - BP | ' . app_name()  !!}
@endsection

@section('main-content')

    <!-- ————————————————————————————————————————————
            ———	Phr Content
            —————————————————————————————————————————————— -->
    @if(isset($phr))
        <h3 class="phr-title">{{__('phr.bp.details')}}: {{ $user->name or '' }}</h3>
        <div class="phr-action">
            <a href="{!! route('frontend.phr.edit',['phr' => $phr, 'id'=> $list->id] ) !!}"><i class="ion-compose"></i> {{__('phr.common.action.edit')}}</a>
            <a href="{!! route('frontend.phr.index', 'bp') !!}"><i class="ion-ios-undo"></i> {{__('phr.common.back')}}</a>
        </div>

        <div class="table-responsive phr-table bmi-details">
            <table class="table" width="50%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{__('phr.bp.table.title.details')}}</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>{{__('phr.bp.table.title.systolic_value')}}</td>
                        <td> 	{{ $list->systolic or '' }} mmHg </td>
                    </tr>
                    <tr>
                        <td>{{__('phr.bp.table.title.diastolic_value')}}</td>
                        <td>{{ $list->diastolic or '' }} mmHg </td>
                    </tr>
                    <tr>
                        {{--<td>Report Date</td>--}}
                        <td>{{__('phr.common.taken_date')}}</td>
                        <td> 	{{ $list->report_datetime or '' }}  </td>
                    </tr>
                </tbody>
            </table>

            @include('frontend.pages.phr.partials.download-form')

        </div>
    @endif
@endsection
