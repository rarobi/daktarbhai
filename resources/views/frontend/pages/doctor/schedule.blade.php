<div class="panel-group chembar" id="accordion" role="tablist" aria-multiselectable="true">
    @if(isset($chambers) && $chambers != null)
        @foreach($chambers as $key => $chamber)
            <div class="panel panel-default test">
                <div class="panel-heading" role="tab" id="heading{!! $chamber->chamber_id !!}">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{!! $chamber->chamber_id !!}" aria-expanded="true" aria-controls="collapse{!! $chamber->chamber_id !!}">
                            {!! $chamber->chamber_name or 'Chamber' !!}
                        </a>
                    </h4>
                </div>
                <div id="collapse{!! $chamber->chamber_id !!}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading{!! $chamber->chamber_id !!}">
                    <div class="panel-body">
                        <h6>{!! $chamber->chamber_name or 'Chamber' !!}</h6>
                        <p>{!! $chamber->chamber_address or '' !!}
                        </p>
                        <a id="myBtn{!! $chamber->chamber_id !!}" href="#" data-modal="#modal{!! $chamber->chamber_id !!}" data-target="#modal{!! $chamber->chamber_id !!}" class="modal__trigger btn-alt small active margin-null">{{__('find_doctor.find_schedule')}}</a>
                    </div>
                </div>
            </div>
            <div id="modal{!! $chamber->chamber_id !!}" class="modal modal__bg" role="dialog" aria-hidden="true">
                <div class="modal__dialog">
                    <div class="modal__content">
                        <h4>Select time Slot</h4>
                        {{--{!! dd($chambers[$key]) !!}--}}
                        @if(isset($chamber->slots) && $chamber->slots != null)
                            @foreach($chamber->slots as $slot)
                                <a class="schedule btn-alt small active margin-null">{!! $slot->slot_time !!}</a>
                            @endforeach
                        @else
                            <a class="schedule btn-alt small active margin-null" href="">{{__('find_doctor.message.schedules')}}</a>
                    @endif
                    <!-- modal close button -->
                        <a href="" class="modal__close demo-close">
                            <svg class="" viewBox="0 0 24 24"><path d="M19 6.41l-1.41-1.41-5.59 5.59-5.59-5.59-1.41 1.41 5.59 5.59-5.59 5.59 1.41 1.41 5.59-5.59 5.59 5.59 1.41-1.41-5.59-5.59z"/><path d="M0 0h24v24h-24z" fill="none"/></svg>
                        </a>

                    </div>
                </div>
                {{--<script>--}}
                    {{--$("#myBtn{!! $chamber->chamber_id !!}").click(function(){--}}

                        {{--// show Modal--}}
                        {{--$('#modal{!! $chamber->chamber_id !!}').modal('show');--}}
                    {{--});--}}
                {{--</script>--}}
            </div>

        @endforeach
    @endif

</div>