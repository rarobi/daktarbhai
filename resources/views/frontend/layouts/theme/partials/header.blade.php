<!-- ————————————————————————————————————————————
    ———	Header Start Here
    —————————————————————————————————————————————— -->
<header id="header" class="fixed">
    <nav class="navbar navbar-default">
        <div class="col-xs-1 col-sm-1 col-md-1 padding-right-null responsive-menu-bar">
                <span class="fa fa-bars menu-icon"></span>
        </div>
        <!-- ————————————————————————————————————————————
            ———	Logos
            —————————————————————————————————————————————— -->
        <div class="col-md-5 padding-left-null" id="logo">
            <a class="navbar-brand" href="{!! route('frontend.index') !!}">
                <img src="{!! asset('assets/img/logo.png') !!}" class="normal" alt="{{ app_name() }}">
                <img src="{!! asset('assets/img/logo.png') !!}" class="retina" alt="{{ app_name() }}">
            </a>
        </div>
        <!-- ————————————————————————————————————————————
        ———	Classic menu, responsive menu Sidemenu
        —————————————————————————————————————————————— -->
        <div class="col-md-5" id="sidemenu">
            <div class="menu-holder">
                <ul>
                    @if(Cookie::has('_tn') && isset($logged_in_api_user))

                        <li class="submenu user">
                        <!-- TODO: Need to change the Image URL -->
                          <img src="{!! (isset($logged_in_api_user->image) && ($logged_in_api_user->image != null)) ? $logged_in_api_user->image : asset('assets/img/profile-1.png') !!}" alt="">
                            <a href="#">
                                <span class="user-name">
                                    {{ ( isset($logged_in_api_user->name) && ($logged_in_api_user->name != null)) ? $logged_in_api_user->name : (($logged_in_api_user->mobile != null) ? $logged_in_api_user->mobile : $logged_in_api_user->email) }}
                                </span>

{{--                                {{ ( isset(session('user')->name) && session('user')->name != null) ? session('user')->name : session('user')->mobile }}--}}
                                <i class="ion-android-arrow-dropdown" data-pack="android" data-tags="chevron, navigation"></i></a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('frontend.profile') }}">{{__('navs.general.profile')}}</a></li>
                                <li><a href="{!! route('frontend.profile.phr') !!}" >{{__('navs.general.phr')}}</a></li>
                                <li><a href="{!! route('frontend.signout') !!}" >{{__('navs.general.logout')}}</a></li>
                            </ul>
                        </li>
                        @else
                        <li class="lang">
                           <span class="current"><a href="{!! route('frontend.signin') !!}" {{ setActive('signin') }}>{{__('navs.general.login')}}</a></span>
                        </li>
                    @endif
                    <!-- <li>
                        <a href="{{ config('misc.app.android-native.app_url') }}" target="_blank"><img src="{!! asset('assets/img/google-play.png') !!}" alt=""></a>
                    </li> -->
               @foreach(array_keys(config('locale.languages')) as $lang)
                   @if($lang != app()->getLocale())
                    <li >
{{--                        <small>--}}
{{--                            <a style="color: white!important;" href="{{ '/lang/'.$lang }}" class="dropdown-item"><span class="badge badge-info lang-btn">@lang('menus.language-picker.langs.'.$lang)</span></a>--}}
{{--                        </small>--}}
                        <div class="lang-button">
                            <input id="toggle-on" class="lang-en-btn toggle toggle-left" name="lang" value="en" type="radio" @if(session('locale') == 'en') checked @endif @if(session('locale') == null) checked @endif>
                                <label for="toggle-on" class="switch-btn" id="switch-btn-en">EN</label>
                                <input id="toggle-off" class="lang-bn-btn toggle toggle-right" name="lang" value="bn" type="radio" @if(session('locale') == 'bn') checked  @endif>
                                <label for="toggle-off" class="switch-btn" id="switch-btn-bn">বাং</label>
                        </div>
                    </li>
                    @endif
              @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-3 sidemenu display_advance">
            <ul>
                <li><a  href="#" {{ setActive('health-directory') }} >{{__('navs.general.health_directory')}} &nbsp;<i class="ion-android-arrow-dropright" data-pack="android" data-tags="chevron, navigation"></i></a>
                    <ul>
                        <li><a href="{!! route('frontend.health_directory.type',['hospital']) !!}">{{__('navs.general.hospital')}}</a></li>
                        <li><a href="{!! route('frontend.health_directory.type',['ambulance']) !!}">{{__('navs.general.ambulance')}}</a></li>
                        <li><a href="{!! route('frontend.health_directory.type',['blood-bank']) !!}">{{__('navs.general.blood_bank')}}</a></li>
                        <li><a href="{!! route('frontend.health_directory.type',['pharmacy']) !!}">{{__('navs.general.pharmacy')}}</a></li>
                        <li><a href="{!! route('frontend.health_directory.type',['healthy-living']) !!}">{{__('navs.general.healthy_living')}}</a></li>
                    </ul>
                </li>
                <li><a href="{!! route('frontend.personal_health_report') !!}">{{__('navs.general.health_record')}}</a></li>
                <li><a href="{!! route('frontend.health-insurance') !!}">{{__('navs.general.cash_claim')}}</a></li>
                <li><a href="{!! route('frontend.hospital.index') !!}">{{__('navs.general.get_discount')}}</a></li>
                <li><a href="#">{{__('navs.general.other_services')}} &nbsp;<i class="ion-android-arrow-dropright" data-pack="android" data-tags="chevron, navigation"></i></a>
                    <ul>
                        <li><a href="{!! route('frontend.hospital.index') !!}">{{__('navs.general.hospital_discount')}}</a></li>
                        <li><a href="{!! route('frontend.health-insurance') !!}">{{__('navs.general.health_insurance')}}</a></li>
                        <li><a href="{!! route('frontend.insurance-claim.create') !!}">{{__('navs.general.claim_insurance')}}</a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- ————————————————————————————————————————————
———	END Header & Menu
—————————————————————————————————————————————— -->
