
<!-- ————————————————————————————————————————————
———	Footer. Class fixed for fixed footer
—————————————————————————————————————————————— -->
<footer class="fixed1">
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <div class="logo1">
                <img src="{!! asset('assets/img/barcode.png') !!}" class="barcode" alt="logo">
{{--                <img src="{!! asset('assets/img/barcode.png') !!}" class="retina" alt="logo">--}}
            </div>
            <h5 class="white-text m-t-10px">{{__('footer.general.download_app')}}</h5>
            <div class="m-t-10px">
                <a target="_blank" href="{{ config('misc.app.android-native.app_url') }}"><img src="{!! asset('assets/img/play-store 1.png') !!}" class="google-icon" alt=""></a>
                <a target="_blank" href="{{ config('misc.app.ios.app_url') }}"><img src="{!! asset('assets/img/app-store 1.png') !!}" class="google-icon" alt=""></a>
            </div>
          </div>
        <div class="col-xs-12 col-sm-3 col-md-3">
            <h6 class="heading white margin-bottom-extrasmall">{{__('footer.general.services')}}</h6>
            <hr class="white-text">
            <div class="col-md-12 padding-left-null">
                <div class="col-md-7 padding-left-null">
                    <ul class="sitemap">
{{--                        <li><a href="#">Covid Followup Service</a></li>--}}
                        <li><a href="{!! route('frontend.sample-collection.create') !!}">{{__('footer.general.doorstep_pathology_test')}}</a></li>
                        <li><a href="{!! route('frontend.services') !!}">{{__('footer.general.services')}}</a></li>
                        <li><a href="{!! route('frontend.ask_doctor') !!}">{{__('home.ask_doctor.title')}}</a></li>
                        <li><a href="{!! route('frontend.doctor.index') !!}">{{__('home.services.doctor_appointment')}}</a></li>

{{--                        <li><a href="{!! route('frontend.personal_health_report') !!}">{{__('home.health_record.title')}}</a></li>--}}
{{--                        <li><a href="{!! route('frontend.doctor.index') !!}">{{__('home.book_appointment.title')}}</a></li>--}}
{{--                        <li><a href="{!! route('frontend.ask_doctor') !!}">{{__('home.ask_doctor.title')}}</a></li>--}}
{{--                        <li><a href="{!! route('frontend.hospital.index') !!}">{{__('home.discount_facility.title')}}</a></li>--}}
{{--                        <li><a href="{!! route('frontend.health_package') !!}">{{__('footer.services.health_packages')}}</a></li>--}}
                    </ul>
                </div>
                <div class="col-md-5 padding-left-null">
                    <ul class="sitemap">
                        <li><a href="{!! route('frontend.hospital.index') !!}">{{__('footer.general.discount')}}</a></li>
                        <li><a href="{!! route('frontend.insurance-claim.create') !!}">{{__('navs.general.cash_claim')}}</a></li>
                        <li><a href="{!! route('frontend.personal_health_report') !!}">{{__('navs.general.health_record')}}</a></li>
                        <li><a href="{!! route('frontend.health_directory') !!}">{{__('navs.general.health_directory')}}</a></li>


{{--                        <li><a href="{!! route('frontend.personal_health_report') !!}">{{__('home.health_record.title')}}</a></li>--}}
{{--                        <li><a href="{!! route('frontend.doctor.index') !!}">{{__('home.book_appointment.title')}}</a></li>--}}
{{--                        <li><a href="{!! route('frontend.ask_doctor') !!}">{{__('home.ask_doctor.title')}}</a></li>--}}
{{--                        <li><a href="{!! route('frontend.hospital.index') !!}">{{__('home.discount_facility.title')}}</a></li>--}}
{{--                        <li><a href="{!! route('frontend.health_package') !!}">{{__('footer.services.health_packages')}}</a></li>--}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-2">
            <h6 class="heading white margin-bottom-extrasmall">{{__('footer.general.useful_links')}}</h6>
            <hr class="white-text">
            <ul class="sitemap margin-bottom-extrasmall">
                <li><a href="{!! route('frontend.about') !!}">{{__('footer.links.about_us')}}</a></li>
                <li><a href="{!! route('frontend.contact') !!}">{{__('footer.links.contact_us')}}</a></li>
                <li><a href="{!! route('frontend.policy') !!}">{{__('footer.links.privacy_policy')}}</a></li>
                <li><a href="{!! route('frontend.terms') !!}">{{__('footer.links.terms_conditions')}}</a></li>
            </ul>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-2">
            <h6 class="heading white margin-bottom-extrasmall">{{__('footer.general.social')}}</h6>
            <hr class="white-text">
            <ul class="info" id="social-tag">
                <li><a target="_blank" href="{{ config('misc.app.social.facebook') }}"><i class="ion-social-facebook" data-pack="social" data-tags="like, post, share"></i></a></li>
                <li><a target="_blank" href="{{ config('misc.app.social.twitter') }}"><i class="ion-social-twitter" data-pack="social" data-tags="follow, post, share"></i></a></li>
                <li><a target="_blank" href="{{ config('misc.app.social.youtube') }}"><i class="ion-social-youtube" data-pack="social" data-tags="follow, post, share"></i></a></li>
                <li><a href="https://www.linkedin.com/company/hislbd/mycompany/"><i class="ion-social-linkedin" data-pack="social" data-tags="follow, post, share"></i></a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 payment-partner">
            <h5 class="white-text">{{__('footer.payment_partners.title')}}</h5><br>
{{--            <div class="col-md-1"></div>--}}
            <div class="col-md-7 padding-left-null">
                <ul>
                    <li class="partner"><img src="{!! asset('assets/img/payment/bKash.png') !!}"></li>
                    <li class="partner"><img src="{!! asset('assets/img/payment/nagad.png') !!}"></li>
                    <li class="partner"><img src="{!! asset('assets/img/payment/rocket.png') !!}"></li>
                    <li class="partner"><img src="{!! asset('assets/img/payment/ucash.png') !!}"></li>
                    <li class="partner"><img src="{!! asset('assets/img/payment/qcash.png') !!}"></li>
                    <li class="partner"><img src="{!! asset('assets/img/payment/visa.png') !!}"></li>
                    <li class="partner"><img src="{!! asset('assets/img/payment/master.png') !!}"></li>
                    <li class="partner"><img src="{!! asset('assets/img/payment/american.png') !!}"></li>
                </ul>
            </div>
            <div class="col-md-4 padding-left-null pull-left">
                <p class='partner-text'>{{__('footer.payment_partners.card_text')}}</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-md-offset-5">
            <img src="{!! asset('assets/img/logo-white.png') !!}" class="normal" alt="logo" height="40">
        </div>
    </div>
    <div class="row m-t-10px">
        <div class="col-md-4"></div>
        <div class="col-md-7 rights">
            <div>
{{--                <img src="{!! asset('assets/img/logo.png') !!}">--}}
            </div>
            <div>
                &copy; {{ date('Y') }} All Rights Reserved by <a href="{{ config('misc.app.parent.company_url') }}" class="site-link" target="_blank">{{ config('misc.app.parent.company_name') }}</a>
            </div>
        </div>
        <div class="col-md-1">
            <a href="#main-wrap" class="white-text" id="backtotop">{{__('footer.general.back_to_top')}}</a>
        </div>
    </div>
</footer>


	{{--END Footer. Class fixed for fixed footer--}}

