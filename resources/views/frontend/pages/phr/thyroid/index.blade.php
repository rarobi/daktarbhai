@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'PHR - Thyroid Function | ' . app_name()  !!}
@endsection

@section('main-content')

    <!-- ————————————————————————————————————————————
            ———	Phr Content
            —————————————————————————————————————————————— -->

    <h3 class="phr-title">{{__('phr.thyroid.list_title')}}</h3>

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
                <th>TSH</th>
                <th>TT4</th>
                <th>FT4</th>
                <th>FT3</th>
                <th>Total T3</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($phrLists as $list)
                <tr>
                    <td>
                        <a href="{!! route('frontend.phr.show', ['phr' => $phr, 'id'=> $list->id]) !!}">
                            {!! $list->report_datetime !!}
                        </a>
                    </td>
                    <td>{{ isset($list->tsh) ? $list->tsh : '' }} {{ isset($list->units->tsh) ? $list->units->tsh : 'pg/ml' }}</td>
                    <td>{{ isset($list->tt4) ? $list->tt4 : '' }} {{ isset($list->units->tt4) ? $list->units->tt4 : 'ug/dl' }}</td>
                    <td>{{ isset($list->ft4) ? $list->ft4 : '' }} {{ isset($list->units->ft4) ? $list->units->ft4 : 'µl/ml' }}</td>
                    <td>{{ isset($list->ft3) ? $list->ft3 : '' }} {{ isset($list->units->ft3) ? $list->units->ft3 : 'ng/dl' }}</td>
                    <td>{{ isset($list->total_t3) ? $list->total_t3 : '' }} {{ isset($list->units->total_t3) ? $list->units->total_t3 : 'ng/dl' }}</td>
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
