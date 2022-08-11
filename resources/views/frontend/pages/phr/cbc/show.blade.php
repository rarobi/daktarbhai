@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'PHR - CBC | ' . app_name()  !!}
@endsection

@section('main-content')

    <!-- ————————————————————————————————————————————
            ———	Phr Content
            —————————————————————————————————————————————— -->
    <!-- Content start here -->
    @if(isset($phr))
    <h3 class="phr-title">{{__('phr.cbc.details')}} {{ $user->name or '' }}</h3>

    <div class="phr-action">
        <a href="{!! route('frontend.phr.edit',['phr' => $phr, 'id'=> $list->id] ) !!}"><i class="ion-compose"></i> {{__('phr.common.action.edit')}}</a>
        <a href="{!! route('frontend.phr.index', 'cbc') !!}"><i class="ion-ios-undo"></i>{{__('phr.common.back')}}</a>
    </div>

    <div class=" table-responsive phr-table bmi-details">
        <table class="table" width="50%" cellspacing="0">
            <thead>
                <tr>
                    <th>{{__('phr.cbc.table.title.details')}}</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
            @if(isset($list->hemoglobin))
                <tr>
                    <td>{{__('phr.cbc.placeholder.hemoglobin')}}</td>
                    <td>{{ $list->hemoglobin or '' }} {{__('phr.cbc.unit.hemoglobin_unit')}} </td>
                </tr>
            @endif
            @if(isset($list->esr))
                <tr>
                    <td>{{__('phr.cbc.placeholder.esr')}}</td>
                    <td>{{ $list->esr or '' }} {{__('phr.cbc.unit.esr_unit')}} </td>
                </tr>
            @endif
            @if(isset($list->total_wbc))
                <tr>
                    <td>{{__('phr.cbc.placeholder.total_wbc')}}</td>
                    <td>{{ $list->total_wbc or '' }}{{__('phr.cbc.unit.unit_1')}} </td>
                </tr>
            @endif
            @if(isset($list->platelets))
                <tr>
                    <td>{{__('phr.cbc.placeholder.platelets')}}</td>
                    <td>{{ $list->platelets or '' }} {{__('phr.cbc.unit.unit_1')}} </td>
                </tr>
            @endif
            @if(isset($list->neutrophils))
                <tr>
                    <td>{{__('phr.cbc.placeholder.neutrophils')}}</td>
                    <td>{{ $list->neutrophils or '' }}{{__('phr.cbc.unit.basophils_unit')}} </td>
                </tr>
            @endif
            @if(isset($list->lymphocytes))
                <tr>
                    <td>{{__('phr.cbc.placeholder.lymphocytes')}}</td>
                    <td>{{ $list->lymphocytes or '' }} {{__('phr.cbc.unit.basophils_unit')}} </td>
                </tr>
            @endif
            @if(isset($list->eosinophils))
                <tr>
                    <td>{{__('phr.cbc.placeholder.eosinophils')}}</td>
                    <td>{{ $list->eosinophils or '' }} {{__('phr.cbc.unit.basophils_unit')}} </td>
                </tr>
            @endif
            @if(isset($list->monocytes))
                <tr>
                    <td>{{__('phr.cbc.placeholder.monocytes')}}</td>
                    <td>{{ $list->monocytes or '' }} {{__('phr.cbc.unit.basophils_unit')}}</td>
                </tr>
            @endif
            @if(isset($list->rbc))
                <tr>
                    <td>{{__('phr.cbc.placeholder.rbc')}}</td>
                    <td>{{ $list->rbc or '' }}</td>
                </tr>
            @endif
            @if(isset($list->pcv))
                <tr>
                    <td>{{__('phr.cbc.show.pcv')}}</td>
                    <td>{{ $list->pcv or '' }}</td>
                </tr>
            @endif
            @if(isset($list->mcv))
                <tr>
                    <td>{{__('phr.cbc.show.mcv')}}</td>
                    <td>{{ $list->mcv or '' }} %</td>
                </tr>
            @endif
            @if(isset($list->mch))
                <tr>
                    <td>{{__('phr.cbc.show.mch')}}</td>
                    <td> {{ $list->mch or '' }} </td>
                </tr>
            @endif
            @if(isset($list->mchc))
                <tr>
                    <td>{{__('phr.cbc.show.mchc')}}</td>
                    <td>{{ $list->mchc or '' }}</td>
                </tr>
            @endif
            @if(isset($list->rwd))
                <tr>
                    <td>{{__('phr.cbc.show.rwd')}}</td>
                    <td>{{ $list->rwd or '' }}</td>
                </tr>
            @endif
            @if(isset($list->white_cell_count))
                <tr>
                    <td>{{__('phr.cbc.placeholder.white_cell_count')}}</td>
                    <td>{{ $list->white_cell_count or '' }}</td>
                </tr>
            @endif
            @if(isset($list->report_datetime))
                <tr>
                    <td>{{__('phr.common.table_report_date')}}</td>
                    <td>{{ $list->report_datetime or '' }} </td>
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
