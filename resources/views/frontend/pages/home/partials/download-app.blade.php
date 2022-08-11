
<div class=" row app-view m-t-30">
    <div class="col-md-12 m-t-30">
        <div class="col-md-1"></div>
        <div class="col-md-4 text-center">
            <img src="{!! asset('assets/img/app-view.png') !!}" class=" app-screen">
        </div>
        <div class="col-md-6">
            <h2 class="app-heading"><strong>{{__('home.download_app.download')}}</strong> <span style="color: #36B7B4;">{{__('home.download_app.title')}}</span></h2>
            <p class="app-para">
                {{__('home.download_app.description')}}
            </p>
            <div class="m-t-10px app-link">
                <a target="_blank" href="{{ config('misc.app.android-native.app_url') }}"><img src="{!! asset('assets/img/play-store 1.png') !!}" class="google-icon" alt=""></a>
                <a target="_blank" href="{{ config('misc.app.ios.app_url') }}"><img src="{!! asset('assets/img/app-store 1.png') !!}" class="google-icon" alt=""></a>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
