@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'PHR - Tumor Marker | ' . app_name()  !!}
@endsection

@section('main-content')

    <!-- ————————————————————————————————————————————
            ———	Phr Content
            —————————————————————————————————————————————— -->

    <h3 class="phr-title">{{__('phr.tumor-marker.list_title')}}</h3>

    <div class="phr-action">
        <a href="{{ route('frontend.phr.create', $phr) }}"><i class="ion-compose"></i> {{__('phr.common.action.add')}}</a>
        {{--<a href="">Print</a>
        <a href="">Export</a>
        <a href="">Delete</a>--}}
        <a href="{{ route('frontend.profile.phr') }}"><i class="ion-ios-undo"></i> {{__('phr.common.return')}}</a>
    </div>

    @if(isset($phrLists))
    <div class="table-responsive phr-table">
        <table id="example" class="mdl-data-table" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Report Date</th>
                <th>ca15 Value</th>
                <th>ca125 Value</th>
                <th>Alpha Value</th>
                <th>Carcino Value</th>
                <th>Prostate Value</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($phrLists as $list)
                <tr>
                    <td>
                        <a href="{!! route('frontend.phr.show', ['phr' => $phr, 'id'=> $list->id]) !!}">
                            {!! \Carbon\Carbon::parse($list->report_datetime)->format('F j, Y') !!}
                        </a>
                    </td>
                    <td>{{ isset($list->ca15_value) ? $list->ca15_value : '' }} {{ isset($list->units->ca15_value) ? $list->units->ca15_value : 'u/ml' }}</td>
                    <td>{{ isset($list->ca125_value) ? $list->ca125_value : '' }} {{ isset($list->units->ca125_value) ? $list->units->ca125_value : 'u/ml' }}</td>
                    <td>{{ isset($list->alpha_value) ? $list->alpha_value : '' }} {{ isset($list->units->alpha_value) ? $list->units->alpha_value : 'µl/l' }}</td>
                    <td>{{ isset($list->carcino_value) ? $list->carcino_value : '' }} {{ isset($list->units->carcino_value) ? $list->units->carcino_value : 'ng/ml' }}</td>
                    <td>{{ isset($list->prostate_value) ? $list->prostate_value : '' }} {{ isset($list->units->prostate_value) ? $list->units->prostate_value : 'ng/ml' }}</td>
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
                                        <h5 class="text-center">Are You sure to Delete?</h5>
                                        <a href="#" class="btn-alt small active doc-btn" data-dismiss="modal">No</a>
                                        <a href="{!! route('frontend.phr.delete',['phr' => $phr, 'id'=> $list->id] ) !!}" class="btn-alt small active doc-btn">Yes</a>
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
