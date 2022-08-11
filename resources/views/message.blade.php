@if(Session::has('success'))
    <div class="phr-alert alert alert-success" id="success-alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>Success! </strong> {!! session('success') !!}
    </div>
@elseif(Session::has('error'))
    <div class="phr-alert alert alert-danger" id="success-alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>Error! </strong> {!! session('error') !!}
    </div>
@else
@endif