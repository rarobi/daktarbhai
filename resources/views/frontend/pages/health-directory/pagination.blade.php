@if($paginator->total_pages != 1)
<div class="row">
    @if(isset($location) && $location != null)
        <div class="col-xs-12">
            <ul class="pagination">
{{--                @if($paginator->current_page > 9)--}}
{{--                    <li><a href="{!! route('frontend.pagination.type.location.health_directory',--}}
{{--                                [ $type, $location, $paginator->current_page-8 ]) !!}"> << </a></li>--}}
{{--                @endif--}}

                @if(isset($first_page) && $paginator->current_page != 1 && $paginator->current_page>5)
                    <li><a href="{!! route('frontend.pagination.type.health_directory',
                            [ $type, $first_page]) !!}"> {{__('pagination.first')}} </a></li>
                @endif

                @if($paginator->previous_page_url != null)
                    <li><a href="{!! route('frontend.pagination.type.location.health_directory',
                                [ $type,$location, $paginator->current_page-1 ]) !!}"><i class="ion-ios-arrow-left"></i> {{__('pagination.previous')}}</a></li>
                @endif

                @for($i = max(1,$paginator->current_page-5); $i <=  min($paginator->current_page+5, $paginator->total_pages);  $i++)
                    <li><a @if($i == $paginator->current_page) class="bg-brand-color" @endif
                        href="{!! route('frontend.pagination.type.location.health_directory',
                                [ 'type' => $type, 'location' => $location, 'page' => $i ]) !!}">{!! $i !!}</a></li>
                @endfor

                @if($paginator->next_page_url != null)
                    <li><a href="{!! route('frontend.pagination.type.location.health_directory',
                                [ $type, $location, $paginator->current_page+1 ]) !!}">{{__('pagination.next')}} <i class="ion-ios-arrow-right"></i></a></li>
                @endif

{{--                @if($paginator->current_page < $paginator->total_pages-9 )--}}
{{--                    <li><a href="{!! route('frontend.pagination.type.location.health_directory',--}}
{{--                                [ $type, $location, $paginator->current_page+5 ]) !!}"> >> </a><li>--}}
{{--                @endif--}}

                @if($paginator->current_page != $paginator->total_pages && $paginator->current_page < $paginator->total_pages-5)
                    <li><a href="{!! route('frontend.pagination.type.health_directory',
                                [ $type, $paginator->total_pages ]) !!}"> {{__('pagination.last')}} </a><li>
                @endif
            </ul>
        </div>
    @else
        <div class="col-xs-12">
            <ul class="pagination">
                {{--                @if($paginator->current_page > 9)--}}
                {{--                    <li><a href="{!! route('frontend.pagination.type.health_directory',--}}
                {{--                                [ $type, $paginator->current_page-8 ]) !!}"> << </a></li>--}}
                {{--                @endif--}}


                @if(isset($first_page) && $paginator->current_page != 1 && $paginator->current_page>5)
                    <li><a href="{!! route('frontend.pagination.type.health_directory',
                                [ $type, $first_page]) !!}"> {{__('pagination.first')}} </a></li>
                @endif

                @if($paginator->previous_page_url != null)
                    <li><a href="{!! route('frontend.pagination.type.health_directory',
                                [ $type, $paginator->current_page-1 ]) !!}"><i class="ion-ios-arrow-left"></i> {{__('pagination.previous')}}</a></li>
                @endif

                @for($i = max(1,$paginator->current_page-5); $i <=  min($paginator->current_page+5, $paginator->total_pages);  $i++)
                    <li><a @if($i == $paginator->current_page) class="bg-brand-color" @endif
                        href="{!! route('frontend.pagination.type.health_directory',
                                [ 'type' => $type, 'page' => $i ]) !!}">{!! $i !!}</a></li>
                @endfor

                @if($paginator->next_page_url != null)
                    <li><a href="{!! route('frontend.pagination.type.health_directory',
                                [ $type, $paginator->current_page+1 ]) !!}">{{__('pagination.next')}} <i class="ion-ios-arrow-right"></i></a></li>
                @endif

                {{--                @if($paginator->current_page < $paginator->total_pages-9 )--}}
                {{--                    <li><a href="{!! route('frontend.pagination.type.health_directory',--}}
                {{--                                [ $type, $paginator->current_page+8 ]) !!}"> >> </a><li>--}}
                {{--                @endif--}}

                @if($paginator->current_page != $paginator->total_pages && $paginator->current_page < $paginator->total_pages-5)
                    <li><a href="{!! route('frontend.pagination.type.health_directory',
                                [ $type, $paginator->total_pages ]) !!}"> {{__('pagination.last')}} </a><li>
                @endif
            </ul>
        </div>
    @endif
</div>
    @endif