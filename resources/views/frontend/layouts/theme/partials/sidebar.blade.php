<div class="side-menu-container">
    <ul class="nav navbar-nav">
        <li class="{{ setActiveClass('profile') }}"><a href="{{ url('profile') }}">
{{--                <span class="ion-ios-personadd-outline"></span> --}}
                <span class="profile-span"><img class="profile-img" src="{!! asset('assets/img/profile/profile.png') !!}" alt=""></span>
                {{__('profile.sidebar.my_profile')}}</a></li>
        <!-- Dropdown-->
        <li class="panel panel-default" id="dropdown">
            <a data-toggle="collapse" href="#dropdown-lvl1">
{{--                <span class="ion-ios-list-outline"></span> {{__('profile.sidebar.my_phr')}} <span class="caret"></span>--}}
                <span class="profile-span"><img class="profile-img" src="{!! asset('assets/img/profile/my-phr.png') !!}" alt=""></span> {{__('profile.sidebar.my_phr')}} <span class="caret"></span>
            </a>

            <!-- Dropdown level 1 -->
            <div id="dropdown-lvl1" class="panel-collapse  {{ setCollapse('phr-profile') }} ">
                <div class="panel-body">
                    <ul class="nav navbar-nav">
                        <li><a href="{!! route('frontend.profile.phr') !!}">{{__('profile.sidebar.all_phr')}}</a></li>
                        <li class="{{ setActiveClass('phr-profile/bmi*') }}">
                            <a href="{!! route('frontend.phr.index', 'bmi') !!}">{{__('profile.sidebar.bmi_records')}}</a>
                        </li>
                        <li class="{{ setActiveClass('phr-profile/cbc*') }}">
                            <a href="{!! route('frontend.phr.index','cbc') !!}">{{__('profile.sidebar.cbc')}}</a>
                        </li>
                        {{--<li><a href="#">Dental Records</a></li>--}}
                        <li class="{{ setActiveClass('phr-profile/glucose*') }}">
                            <a href="{!! route('frontend.phr.index', 'glucose') !!}">{{__('profile.sidebar.glucose')}}</a>
                        </li>
                        {{--<li><a href="#">EYE Records</a></li>--}}
                        <li class="{{ setActiveClass('phr-profile/bp*') }}">
                            <a href="{!! route('frontend.phr.index', 'bp') !!}">{{__('profile.sidebar.blood_pressure')}}</a>
                        </li>
                        {{--<li><a href="{!! route('frontend.phr.index', 'urine-profile') !!}">Urine Profile</a></li>--}}
                        {{--<li><a href="#">Electrolytes Records</a></li>--}}
                        <li class="{{ setActiveClass('phr-profile/lipid*') }}"><a href="{!! route('frontend.phr.index', 'lipid') !!}">{{__('profile.sidebar.lipid_records')}}</a></li>
                        {{--<li><a href="#">Tumor Records</a></li>--}}
                        {{--<li><a href="#">Serology Records</a></li>--}}
                        {{--<li><a href="#">Liver Records</a></li>--}}
                        <li class="{{ setActiveClass('phr-profile/kidney*') }}">
                            <a href="{!! route('frontend.phr.index', 'kidney') !!}">{{__('profile.sidebar.kidney_records')}}</a>
                        </li>

                        <li class="{{ setActiveClass('phr-profile/urine-profile*') }}">
                            <a href="{!! route('frontend.phr.index', 'urine-profile') !!}">{{__('profile.sidebar.urine_profile')}}</a>
                        </li>
                        <li class="{{ setActiveClass('phr-profile/electrolyte*') }}">
                            <a href="{!! route('frontend.phr.index', 'electrolyte') !!}">{{__('profile.sidebar.electrolytes')}}</a>
                        </li>
                        <li class="{{ setActiveClass('phr-profile/tumor-marker*') }}">
                            <a href="{!! route('frontend.phr.index', 'tumor-marker') !!}">{{__('profile.sidebar.tumor_marker')}}</a>
                        </li>
                        <li class="{{ setActiveClass('phr-profile/liver*') }}">
                            <a href="{!! route('frontend.phr.index', 'liver') !!}">{{__('profile.sidebar.liver_function')}}</a>
                        </li>
                        <li class="{{ setActiveClass('phr-profile/serology*') }}">
                            <a href="{!! route('frontend.phr.index', 'serology') !!}">{{__('profile.sidebar.serology')}}</a>
                        </li>
                        <li class="{{ setActiveClass('phr-profile/thyroid*') }}">
                            <a href="{!! route('frontend.phr.index', 'thyroid') !!}">{{__('profile.sidebar.thyroid_function')}}</a>
                        </li>
                        <li class="{{ setActiveClass('phr-profile/corona/vaccine') }}">
                            <a href="{!! route('frontend.phr.corona.vaccine') !!}">{{__('profile.sidebar.covid_vaccine')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </li>

        @if(Cookie::has('_tn') && isset($logged_in_api_user))
            @if($logged_in_api_user->is_password_set == true)
                <li class="{{ setActiveClass('profile/change-password') }}">
                    <a href="{{ url('profile/change-password') }}">
{{--                        <span class="ion-ios-unlocked-outline"></span> {{__('profile.sidebar.change_password')}}--}}
                        <span class="profile-span"><img class="profile-img" src="{!! asset('assets/img/profile/password.png') !!}" alt=""></span> {{__('profile.sidebar.change_password')}}
                    </a>
                </li>
            @else
                <li class="{{ setActiveClass('profile/add-password') }}">
                    <a href="{{ url('profile/add-password') }}">
{{--                        <span class="ion-ios-unlocked-outline"></span> {{__('profile.sidebar.set_password')}}--}}
                        <span class="profile-span"><img class="profile-img" src="{!! asset('assets/img/profile/password.png') !!}" alt=""></span> {{__('profile.sidebar.set_password')}}
                    </a>
                </li>
            @endif
        @endif

        <li class="{{ setActiveClass('claim-insurance*') }}">
            <a href="{{ url('claim-insurance/history') }}">
{{--                <span class="ion-clipboard"></span> {{__('profile.sidebar.insurance_claim')}}--}}
                <span class="profile-span"><img class="profile-img" src="{!! asset('assets/img/profile/claim-history.png') !!}" alt=""></span> {{__('profile.sidebar.insurance_claim')}}
            </a>
        </li>

        <li class="{{ setActiveClass('profile/appointment-history*') }}">
            <a href="{{ url('profile/appointment-history') }}" >
{{--                <span class="ion-ios-list-outline"></span> {{__('profile.sidebar.appointment_history')}}--}}
                <span class="profile-span"><img class="profile-img" src="{!! asset('assets/img/profile/appointment-history.png') !!}" alt=""></span> {{__('profile.sidebar.appointment_history')}}
            </a>
        </li>
        <li class="{{ setActiveClass('sample-collection*') }}">
            <a href="{{ url('sample-collection') }}" >
{{--                <span class="ion-ios-pulse-strong"></span> {{__('profile.sidebar.home_pathology_history')}}--}}
                <span class="profile-span"><img class="profile-img" src="{!! asset('assets/img/profile/home-pathology.png') !!}" alt=""></span> {{__('profile.sidebar.home_pathology_history')}}
            </a>
        </li>
        <li class="{{ setActiveClass('tele-medicine/appointment-history*') }}">
            <a href="{{ url('tele-medicine/appointment-history') }}" >
{{--                <span class="ion-ios-medkit"></span> {{__('profile.sidebar.tele_medicine_history')}}--}}
                <span class="profile-span"><img class="profile-img" src="{!! asset('assets/img/profile/video-call.png') !!}" alt=""></span> {{__('profile.sidebar.tele_medicine_history')}}
            </a>
        </li>
        <li class="{{ setActiveClass('doctor-follow-up/request-list*') }}">
            <a href="{{ url('doctor-follow-up/request-list') }}" >
                <span class="profile-span"><img class="profile-img" src="{!! asset('assets/img/profile/follow-up.png') !!}" alt=""></span> {{__('profile.sidebar.doctor_follow_up')}}
            </a>
        </li>

        <li class="{{ setActiveClass('profile/discount-history*') }}">
            <a href="{{ url('profile/discount-history') }}">
{{--                <span class="ion-ios-medkit-outline"></span> {{__('profile.sidebar.discount_history')}}--}}
                <span class="profile-span"><img class="profile-img" src="{!! asset('assets/img/profile/discount-history.png') !!}" alt=""></span> {{__('profile.sidebar.discount_history')}}
            </a>
        </li>

        <li class="{{ setActiveClass('profile/my-questions*') }}">
            <a href="{{ url('profile/my-questions') }}">
{{--                <span class="ion-ios-help-outline"></span> {{__('profile.sidebar.my_questions')}}--}}
                <span class="profile-span"><img class="profile-img" src="{!! asset('assets/img/profile/question-history.png') !!}" alt=""></span> {{__('profile.sidebar.my_questions')}}
            </a>
        </li>

        <li class="{{ setActiveClass('profile/saved-bookmarks*') }}">
            <a href="{{ url('profile/saved-bookmarks') }}">
{{--                <span class="ion-ios-bookmarks-outline"></span> {{__('profile.sidebar.saved_bookmarks')}}--}}
                <span class="profile-span"><img class="profile-img" src="{!! asset('assets/img/profile/bookmark.png') !!}" alt=""></span> {{__('profile.sidebar.saved_bookmarks')}}
            </a>
        </li>

        <li class="{{ setActiveClass('profile/subscription-history*') }}">
            <a href="{{ url('profile/subscription-history') }}">
{{--                <span class="ion-ios-briefcase-outline"></span> {{__('profile.sidebar.my_subscriptions')}}--}}
                <span class="profile-span"><img class="profile-img" src="{!! asset('assets/img/profile/subscription.png') !!}" alt=""></span> {{__('profile.sidebar.my_subscriptions')}}
            </a>
        </li>

        <li class="{{ setActiveClass('profile/prescription-history*') }}">
            <a href="{{ url('profile/prescription-history') }}">
{{--                <span class="ion-ios-list-outline"></span> {{__('profile.sidebar.my_prescriptions')}}--}}
                <span class="profile-span"><img class="profile-img" src="{!! asset('assets/img/profile/prescription.png') !!}" alt=""></span> {{__('profile.sidebar.my_prescriptions')}}
            </a>
        </li>

    </ul>
</div>
