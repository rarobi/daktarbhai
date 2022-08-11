@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'PHR - BP | ' . app_name()  !!}
@endsection

@section('main-content')

    <!-- ————————————————————————————————————————————
            ———	Phr Content
            —————————————————————————————————————————————— -->
    <!-- Content start here -->

    <h3 class="phr-title">{{__('phr.bp.list_title')}} </h3>
    <div class="phr-action">
        <a href="{{ route('frontend.phr.create', $phr) }}"><i class="ion-compose"></i> {{__('phr.common.action.add')}}</a>
        <a href="{{ route('frontend.profile.phr') }}"><i class="ion-ios-undo"></i> {{__('phr.common.return')}}</a>
    </div>

    @if(isset($phrLists))
    <div class="table-responsive phr-table">

        <table id="example" class="mdl-data-table" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>{{__('phr.common.table_report_date')}}</th>
                <th>{{__('phr.bp.table.title.systolic_value')}}</th>
                <th>{{__('phr.bp.table.title.diastolic_value')}}</th>
                <th>{{__('phr.common.table_status')}}</th>
                <th>{{__('phr.common.table_action')}}</th>
            </tr>
            </thead>
            <tbody>
                @foreach($phrLists as $list)
                <tr>
                    <td><a href="{!! route('frontend.phr.show', ['phr' => 'bp', 'id'=> $list->id]) !!}">
                            {!! \Carbon\Carbon::parse($list->report_datetime)->format('F j, Y') !!}
                        </a>
                    </td>
                    <td>
                        <span @if (($list->status_obj->systolic) == 'above') class="above"
                              @elseif(($list->status_obj->systolic) == 'normal') class="normal"
                              @else  class="below" @endif>
                            {{ $list->systolic }} mmHg
                        </span>
                    </td>
                    <td>
                        <span @if (($list->status_obj->diastolic) == 'above') class="above"
                              @elseif(($list->status_obj->diastolic) == 'normal') class="normal"
                              @else  class="below" @endif>
                            {{ $list->diastolic }} mmHg
                        </span>
{{--                        {{ $list->diastolic }} {{__('bp.index.unit)}} </td>--}}
                    <td>
                        <span @if (($list->status) =='above') class="above"
                           @elseif(($list->status) =='normal') class="normal"
                           @else  class="below" @endif>
                             {{ isset($list->status) ? ucfirst($list->status) : '' }}
                        </span>
                    </td>
                    <td>
                        <div class="actions">
                            <div class="btn-group">
                                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="ion-ios-more"></i></a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="{!! route('frontend.phr.edit',['phr' => $phr, 'id'=> $list->id] ) !!}">{{__('phr.common.action.edit')}}</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#myModal{{$list->id}}" >{{__('phr.common.action.delete')}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </td>
                    <div class="phr-modal">
                        <div class="modal fade" id="myModal{{$list->id}}" role="dialog">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="text-center">{{__('phr.common.confirm_msg.sure')}}</h5>
                                        <a href="#" class="btn-alt small active doc-btn" data-dismiss="modal">{{__('phr.common.confirm_msg.no')}}</a>
                                        <a href="{!! route('frontend.phr.delete',['phr' => $phr, 'id'=> $list->id] ) !!}" class="btn-alt small active doc-btn">{{__('phr.common.confirm_msg.yes')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    <!-- ————————————————————————————————————————————
            ———	END phr Content
            —————————————————————————————————————————————— -->
@endsection
