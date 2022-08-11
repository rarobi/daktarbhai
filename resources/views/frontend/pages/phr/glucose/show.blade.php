@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'PHR - Glucose | ' . app_name()  !!}
@endsection

@section('main-content')

    <!-- ————————————————————————————————————————————
            ———	Phr Content
            —————————————————————————————————————————————— -->
    <!-- Content start here -->
    @if(isset($phr))
        <h3 class="phr-title">{{__('phr.glucose.details')}} : {{ $user->name or '' }}</h3>

        <div class="phr-action">
            <a href="{!! route('frontend.phr.edit',['phr' => $phr, 'id'=> $list->id] ) !!}"><i class="ion-compose"></i> {{__('phr.common.action.edit')}}</a>
            <a href="{!! route('frontend.phr.index', 'glucose') !!}"><i class="ion-ios-undo"></i> {{__('phr.common.back')}}</a>
        </div>

        <div class="table-responsive phr-table bmi-details">
            <table class="table" width="50%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{__('phr.glucose.table.title.glucose_details')}}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{__('phr.glucose.table.title.type')}}</td>
                        <td>{{ $list->type or '' }}</td>
                    </tr>
                    <tr>
                        <td>{{__('phr.glucose.table.title.value')}}</td>
                        <td>{{ $list->level or '' }} {{ $list->unit or '' }}</td>
                    </tr>
                    <tr>
                        <td>{{__('phr.glucose.table.title.day_time')}}</td>
                        <td>{{ $list->daytime or '' }}</td>
                    </tr>
                    <tr>
                        <td>{{__('phr.common.table_status')}}</td>
                        <td>
                          <span  @if (($list->status) =='above') class="above"
                                 @elseif(($list->status) =='normal') class="normal"
                                 @else  class="below" @endif>
                                 {{ isset($list->status) ? ucfirst($list->status) : '' }}
                          </span>
                        </td>
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
