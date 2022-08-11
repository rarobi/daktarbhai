@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'My questions | ' . app_name()  !!}
@endsection

@section('main-content')
    <div class="bhoechie-tab-content active">
      <h3 class="profile-title"> {{__('profile.question.title')}}</h3>
        <div class="my-questions">
            {{--{{dd($myQuestions)}}--}}
            @if(isset($myQuestions) && $myQuestions != null)
                @foreach($myQuestions as $myQuestion)
                    <div class="parentQuestion">
                        <div class="panel panel-default">
                            <div class="panel-heading border-none">
                                <h4 class="panel-title">
{{--                                    @if(($myQuestion->publish_status) =='Pending')--}}
{{--                                        <a href="{!! route('frontend.question.edit', $myQuestion->id) !!}" class="question-edit"><span class="ion-ios-compose-outline"></span> {{__('phr.common.action.edit')}}</a>--}}
{{--                                    @endif--}}
                                    <a href="{!! route('frontend.question.show', $myQuestion->id) !!}" class="questions">
                                        <h4 class="questions-title">{{ strip_tags($myQuestion->description) }}
                                        </h4>
                                    </a>
                                </h4>
                                @if(isset($myQuestion->additional_info))
                                    <div class="row additional-info-box">
                                        @foreach (json_decode(json_encode($myQuestion->additional_info),true) as $key=>$add_info)
                                            @isset($add_info)
                                                <p class="col-md-4 margin-null"><b>{!! ucfirst($key) !!}</b> :
                                                    @if(($key == 'height'))
                                                        @isset($add_info['feet']['feet'])
                                                            {!! $add_info['feet']['feet'] !!}'{!! $add_info['feet']['inches'] !!}'' ({!! $add_info['cm'] !!}  <i>cm</i>)
                                                        @endisset
                                                    @elseif($key == 'weight')
                                                        @isset($add_info['weight_kg'])
                                                        {!! isset($add_info['weight_kg'])?$add_info['weight_kg']:'' !!} <i>kg</i>
                                                        @endisset
                                                     @else
                                                        {!! isset($add_info['note'])?$add_info['note']:'' !!}
                                                    @endif
                                                </p>
                                            @endisset
                                            {{--<p>{!! isset($add_info['note'])?$add_info['note']:'' !!}</p>--}}
                                        @endforeach
                                    </div>
                                @endif

                                <div class="ques-meta">
                                    <div class="col-md-3"><p><span class="date"></span>{!! $myQuestion->published_at or '' !!}</p></div>
                                    <div class="col-md-4">@foreach(array_slice($myQuestion->topics, 0, 1) as $topic)<a href="{!! route("frontend.question.topics", $topic->id) !!}" class="tag"><p>{!! $topic->title !!}</p></a>@endforeach</div>
                                    <div class="col-md-3"><a href="{!! route('frontend.question.show', $myQuestion->id) !!}" class="doc-ans"><p>{{__('profile.question.answers')}} ({!! $myQuestion->_info->total_answer !!})</p></a></div>
                                    <div class="col-md-2">
                                        <!-- <span class="approved"><i class="ion-checkmark-circled"></i> Approved</span> -->
                                        <!-- <span class="discard"><i class="ion-close-circled"></i> Discard</span> -->
                                        <span @if (($myQuestion->publish_status) =='Pending') class="pending"
                                              @elseif(($myQuestion->publish_status) =='Discard') class="discard"
                                              @else  class="approved" @endif>
                                     <i @if (($myQuestion->publish_status) =='Pending') class="ion-ios-refresh"
                                        @elseif(($myQuestion->publish_status) =='Discard') class="ion-close-circled"
                                        @else  class="ion-checkmark-circled" @endif >
                                     </i> {{ $myQuestion->publish_status }}

                                  </span>
                                    </div>
                                    @if($myQuestion->publish_status != "Approved")
                                            @if(!is_null($myQuestion->repost_details))

                                                @isset($myQuestion->repost_details[count($myQuestion->repost_details)-1]->is_reposted)
                                                    @if(!$myQuestion->repost_details[count($myQuestion->repost_details)-1]->is_reposted)
                                                        <a href="javascript:void(0)" onclick="repost(this)" class="viewRepost"> {{__('profile.question.repost')}} </a>
                                                    @endif
                                                @endisset
                                            @endif

                                    @endif
                                    &nbsp;
                                    {{--<a href="{!! route('frontend.question.edit', $myQuestion->id) !!}" class="">Edit</a>--}}
                                </div>

                            </div>
                        </div>
                        <div class="panel-heading border-none alert alert-success repostDetails" style="display: none; background-color: #fff">
                            @if(isset($myQuestion->repost_details) && count($myQuestion->repost_details) > 0)

                                {{--<div class="col-md-12 alert alert-success" id="repostDetails" style="display: none">--}}
                                {{--<button type="button" class="close repost" data-dismiss="alert">x</button>--}}
                                {{--<p>{!! $myQuestion->repost_details[count($myQuestion->repost_details)-1]->requested_details !!}</p>--}}

                                {{--</div>--}}
                                <button type="button" class="close repost" onclick="toggleRepost(this)">x</button>
                                <p class="repost-message">{!! $myQuestion->repost_details[count($myQuestion->repost_details)-1]->requested_details !!}</p>

                            @endif
                        </div>
                    </div>
                @endforeach

                @if(isset($questionPaginator) && !($questionPaginator->total_pages == 1 || $questionPaginator->total_pages == 0))
                    <ul class="pagination">
                        @if($questionPaginator->current_page > 9)
                            <li><a href="{!! url($rootUrl, ['page' =>$questionPaginator->current_page-8 ]) !!}"> << </a></li>
                        @endif
                        @if($questionPaginator->previous_page_url != null)
                            <li><a href="{!! url($rootUrl, ['page' => $questionPaginator->current_page-1 ]) !!}"><i class="ion-ios-arrow-left"></i> {{__('pagination.previous')}}</a></li>
                        @endif
                        @for($i = 1; $i <= $questionPaginator->total_pages; $i++)
                            <li><a @if($i == $questionPaginator->current_page) class="bg-brand-color" @endif href="{!! url($rootUrl, ['page' => $i ]) !!}">{!! $i!!}</a></li>
                        @endfor
                        @if($questionPaginator->next_page_url != null)
                            <li><a href="{!! url($rootUrl, ['page' => $questionPaginator->current_page+1 ]) !!}"><i class="ion-ios-arrow-right"></i> {{__('pagination.next')}}</a></li>
                        @endif
                        @if($questionPaginator->current_page < $questionPaginator->total_pages-9 )
                            <li><a href="{!! url($rootUrl, ['page' =>$questionPaginator->current_page+8 ]) !!}"> >> </a><li>
                        @endif
                    </ul>
                @endif
            @else
                <div class="phr-create-img">
{{--                    <img src="{!! asset('assets/img/questions-blank.png') !!}" alt="">--}}
                    <img src="{!! asset('assets/img/phr/no-data.png') !!}" alt="">
                </div>
                <p class="text-center padding-sm profile-create-new">
                    {{__('profile.question.msg.question_msg')}}
                    <a href="{!! route('frontend.ask_doctor') !!}" class="btn-alt small active doc-btn">{{__('askDoctor.button.search_btn')}}
                        <i class="fa fa-plus-circle"></i>
                    </a>
                </p>
            @endif
        </div>
    </div>
@endsection

@section('after-scripts')
    <script>
        function repost(repostRequest) {
            var parentQuestion = $(repostRequest).parents('.parentQuestion');
            var repostElement = $(parentQuestion).children('.repostDetails');
            $(repostElement).show();
        }
        function toggleRepost(toggleElement) {
            var parentElement = $(toggleElement).parents('.repostDetails');
            $(parentElement).hide();
        }
    </script>
@endsection