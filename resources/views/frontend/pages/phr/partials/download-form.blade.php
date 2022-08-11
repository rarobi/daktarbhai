{!! Form::open(['route' => ["frontend.download.single.phr"] ]) !!}
<input type="hidden" name="user_id" value="{{ $user->user_id }}">
<input type="hidden" name="phr_id" value="{{ $list->id }}">
<input type="hidden" name="phr_name" value="{{ $phr }}">
<button class="btn btn-sm download-btn" id="download" type="submit">
    <i class="fa fa-file-pdf-o"></i>&nbsp; {{ __('phr.common.button.download') }}
</button>
{!! Form::close() !!}
