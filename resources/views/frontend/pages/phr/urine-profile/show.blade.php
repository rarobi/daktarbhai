@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'PHR - Urine Profile | ' . app_name()  !!}
@endsection

@section('main-content')

    <!-- ————————————————————————————————————————————
            ———	Phr Content
            —————————————————————————————————————————————— -->
    <!-- Content start here -->
    @if(isset($phr))
        <h3 class="phr-title">{{__('phr.urine-profile.details')}}: {{ $user->name or '' }}</h3>

        <div class="phr-action">
            <a href="{!! route('frontend.phr.edit',['phr' => $phr, 'id'=> $list->id] ) !!}"><i class="ion-compose"></i> {{__('phr.common.action.edit')}}</a>
            <a href="{!! route('frontend.phr.index', 'urine-profile') !!}"><i class="ion-ios-undo"></i> {{__('phr.common.back')}}</a>
        </div>

        <div class="table-responsive phr-table bmi-details">
            <table class="table" width="50%" cellspacing="0">
                <thead>
                <tr>
                    <th>{{__('phr.urine-profile.table.title.details')}}</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                @if($list->color)
                    <tr>
                        <td>{{__('phr.urine-profile.table.title.urine_color')}}</td>
                        <td>{{ isset($list->color) ? $list->color : '' }}</td>
                    </tr>
                @endif
                @if($list->appearance)
                    <tr>
                        <td>{{__('phr.urine-profile.table.title.appearance')}}</td>
                        <td>{{ isset($list->appearance) ? $list->appearance : '' }}</td>
                    </tr>
                @endif
                @if($list->sediment)
                    <tr>
                        <td>{{__('phr.urine-profile.table.title.sediment')}}</td>
                        <td>{{ isset($list->sediment) ? $list->sediment : '' }}</td>
                    </tr>
                @endif
                @if($list->reaction)
                    <tr>
                        <td>{{__('phr.urine-profile.table.title.reaction')}}</td>
                        <td>{{ isset($list->reaction) ? $list->reaction : '' }}</td>
                    </tr>
                @endif
                @if($list->phosphate)
                    <tr>
                        <td>{{__('phr.urine-profile.table.title.phosphate')}}</td>
                        <td>{{ isset($list->phosphate) ? $list->phosphate : '' }}</td>
                    </tr>
                @endif
                @if($list->glucose)
                    <tr>
                        <td>{{__('phr.urine-profile.table.title.glucose')}}</td>
                        <td>{{ isset($list->glucose) ? $list->glucose : '' }}</td>
                    </tr>
                @endif
                @if($list->albumin)
                    <tr>
                        <td>{{__('phr.urine-profile.table.title.albumin')}}</td>
                        <td>{{ isset($list->albumin) ? $list->albumin : '' }}</td>
                    </tr>
                @endif
                @if($list->rbc_value)
                    <tr>
                        <td>{{__('phr.urine-profile.table.title.rbc')}}</td>
                        <td>{{ isset($list->rbc_value) ? $list->rbc_value : '' }}</td>
                    </tr>
                @endif
                @if($list->casts_value)
                    <tr>
                        <td>{{__('phr.urine-profile.table.title.casts')}}</td>
                        <td>{{ isset($list->casts_value) ? $list->casts_value : '' }}</td>
                    </tr>
                @endif
                @if($list->crystals)
                    <tr>
                        <td>{{__('phr.urine-profile.table.title.crystals')}}</td>
                        <td>{{ isset($list->crystals) ? $list->crystals : '' }}</td>
                    </tr>
                @endif
                @if($list->ketones)
                    <tr>
                        <td>{{__('phr.urine-profile.table.title.ketones')}}</td>
                        <td>{{ isset($list->ketones) ? $list->ketones : '' }}</td>
                    </tr>
                @endif
                @if($list->sg)
                    <tr>
                        <td>{{__('phr.urine-profile.table.title.gravity')}}</td>
                        <td>{{ isset($list->sg) ? $list->sg : '' }}</td>
                    </tr>
                @endif
                @if($list->ph_value)
                    <tr>
                        <td>{{__('phr.urine-profile.table.title.ph_value')}}</td>
                        <td>{{ isset($list->ph_value) ? $list->ph_value : '' }}</td>
                    </tr>
                @endif
                <tr>
                    <td>{{__('phr.urine-profile.table.title.epithelial_cell')}}</td>
                    <td>
                        @if($list->epithelial_cell_status)
                            {{ $list->epithelial_cell_status }}
                        @else
                            {{ isset($list->epithelial_cell_min) ? $list->epithelial_cell_min : ''}} - {{ isset($list->epithelial_cell_max) ? $list->epithelial_cell_max : '' }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>{{__('phr.urine-profile.table.title.pus_cell')}}</td>
                    <td>
                        @if($list->pus_cell_status)
                            {{ $list->pus_cell_status }}
                        @else
                            {{ isset($list->pus_cell_min) ? $list->pus_cell_min : ''}} - {{ isset($list->pus_cell_max) ? $list->pus_cell_max : '' }}
                        @endif
                    </td>
                </tr>
                @if($list->wbc_value)
                    <tr>
                        <td>{{__('phr.urine-profile.table.title.wbc')}}</td>
                        <td>{{ isset($list->wbc_value) ? $list->wbc_value : '' }}</td>
                    </tr>
                @endif
                @if($list->leucocytes)
                    <tr>
                        <td>{{__('phr.urine-profile.table.title.leucocytes')}}</td>
                        <td>{{ isset($list->leucocytes) ? $list->leucocytes : '' }}</td>
                    </tr>
                @endif
                @if($list->erythrocytes)
                    <tr>
                        <td>{{__('phr.urine-profile.table.title.erythrocytes')}}</td>
                        <td>{{ isset($list->erythrocytes) ? $list->erythrocytes : '' }}</td>
                    </tr>
                @endif
                @if($list->report_datetime)
                    <tr>
                        <td>{{__('phr.common.table_report_date')}}</td>
                        <td>
                            {{ isset($list->report_datetime) ? \Carbon\Carbon::parse($list->report_datetime)->format('F j, Y') : '' }}
                        </td>
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
