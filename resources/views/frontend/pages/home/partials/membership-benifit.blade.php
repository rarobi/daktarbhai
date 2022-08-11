<div class="membership m-t-30">
    <div class="row no-margin">
        <div class="col-md-12">
            <h3 class="margin-bottom-small">
                <strong class="membership-title">{{__('home.membership_benefit.title')}}</strong>
            </h3>
            @if(session('user') == null)
                <div class="membership-benefit">
                <div class="col-md-4 membership-box card-body item">
                    <h5 class="benefit-title">{{__('home.membership_benefit.suchana.title')}}</h5>
                    <ul class="benefit-list">
                        <li>{{__('home.membership_benefit.suchana.talk_to_doctor_text')}}</li>
                        <li>{{__('home.membership_benefit.suchana.ask_doctor_text')}}</li>
                        <li>{{__('home.membership_benefit.suchana.life_insurance_text')}}</li>
                        <li>{{__('home.membership_benefit.suchana.hospitalization_text')}}</li>
                    </ul><br>
                    <div class="col-md-5 padding-left-null benefit-btn-section">
                        <a href="{!! route('frontend.subscription.plan-list', ['param' => 'suchana']) !!}" class="btn btn-lg benefit-btn">{{__('home.membership_benefit.get_membership_btn')}}</a>
                    </div>
                    <div class="col-md-7 col-md-offset-3" style="width: auto">
                        <img src="{!! asset('assets/img/suchana.png') !!}" height="100" alt="hospital" class="suchana-img">
                    </div>
                </div>
                <div class="col-md-4 membership-box card-body item">
                    <h5 class="benefit-title">{{__('home.membership_benefit.prerona.title')}}</h5>
                    <ul class="benefit-list">
                        <li>{{__('home.membership_benefit.prerona.talk_to_doctor_text')}}</li>
                        <li>{{__('home.membership_benefit.prerona.ask_doctor_text')}}</li>
                        <li>{{__('home.membership_benefit.prerona.ephr')}}</li>
                        <li>{{__('home.membership_benefit.prerona.hospital_discount')}}</li>
                    </ul><br>
                    <div class="col-md-5 padding-left-null benefit-btn-section">
                        <a href="{!! route('frontend.subscription.plan-list', ['param' => 'perona']) !!}" class="btn btn-lg benefit-btn">{{__('home.membership_benefit.get_membership_btn')}}</a>
                    </div>
                    <div class="col-md-7" style="width: auto">
                        <img src="{!! asset('assets/img/perona.png') !!}" height="100" alt="hospital" class="perona-img">
                    </div>
                </div>
                <div class="col-md-4 membership-box card-body item">
                    <h5 class="benefit-title">{{__('home.membership_benefit.protyasa.title')}}</h5>
                    <ul class="benefit-list">
                        <li>{{__('home.membership_benefit.protyasa.talk_to_doctor_text')}}</li>
                        <li>{{__('home.membership_benefit.protyasa.ask_doctor_text')}}</li>
                        <li>{{__('home.membership_benefit.protyasa.life_insurance_text')}}</li>
                        <li>{{__('home.membership_benefit.protyasa.hospital_discount')}}</li>
                    </ul><br>
                    <div class="col-md-5 padding-left-null benefit-btn-section">
                        <a href="{!! route('frontend.subscription.plan-list', ['param' => 'protyasha']) !!}" class="btn btn-lg benefit-btn">{{__('home.membership_benefit.get_membership_btn')}}</a>
                    </div>
                    <div class="col-md-7" style="width: auto">
                        <img src="{!! asset('assets/img/protyasa.png') !!}" height="100" alt="hospital" class="protyasa-img">
                    </div>
                </div>
                <div class="col-md-4 membership-box card-body item">
                    <h5 class="benefit-title">{{__('home.membership_benefit.banglalink.title')}}</h5>
                    <ul class="benefit-list">
                        <li>{{__('home.membership_benefit.banglalink.talk_to_doctor_text')}}</li>
                        <li>{{__('home.membership_benefit.banglalink.ask_doctor_text')}}</li>
                        <li>{{__('home.membership_benefit.banglalink.life_insurance_text')}}</li>
                        <li>{{__('home.membership_benefit.banglalink.accidental_coverage')}}</li>

                    </ul><br>
                    <div class="col-md-5 padding-left-null benefit-btn-section">
                        <a href="{!! route('frontend.subscription.plan-list', ['param' => 'bl']) !!}" class="btn btn-lg benefit-btn">{{__('home.membership_benefit.get_membership_btn')}}</a>
                    </div>
                    <div class="col-md-7" style="width: auto">
                        <img src="{!! asset('assets/img/perona.png') !!}" height="100" alt="hospital" class="bl-img">
                    </div>
                </div>
            </div>
            @elseif($isBlUser)
                <div class="membership-benefit">
                    <div class="col-md-4 membership-box card-body item">
                        <h5 class="benefit-title">Banglalink Daily </h5>
                        <ul class="benefit-list">
                            <li>Talk To A Doctor- Unlimited</li>
                            <li>Ask a Doctor- Unlimited</li>
                            <li>Life Insurance - Taka 10,000 Coverage</li>
                            <li>Accidental Cash Coverage upto - Taka 5,000/month</li>
                        </ul><br>
                        <div class="col-md-5 padding-left-null benefit-btn-section">
                            <a href="{!! route('frontend.subscription.plan-list', ['param' => 'bl']) !!}" class="btn btn-lg benefit-btn">{{__('home.membership_benefit.get_membership_btn')}}</a>
                        </div>
                        <div class="col-md-7 col-md-offset-3" style="width: auto">
                            <img src="{!! asset('assets/img/suchana.png') !!}" height="100" alt="hospital" class="suchana-img">
                        </div>
                    </div>
                    <div class="col-md-4 membership-box card-body item">
                        <h5 class="benefit-title">Banglalink Monthly</h5>
                        <ul class="benefit-list">
                            <li>Talk To A Doctor- Unlimited</li>
                            <li>Ask a Doctor- Unlimited</li>
                            <li>Life Insurance - Taka 10,000 Coverage</li>
                            <li>Accidental Cash Coverage upto - Taka 5,000/month</li>
                        </ul><br>
                        <div class="col-md-5 padding-left-null benefit-btn-section">
                            <a href="{!! route('frontend.subscription.plan-list', ['param' => 'bl']) !!}" class="btn btn-lg benefit-btn">{{__('home.membership_benefit.get_membership_btn')}}</a>                 
                        </div>
                        <div class="col-md-7" style="width: auto">
                            <img src="{!! asset('assets/img/perona.png') !!}" height="100" alt="hospital" class="perona-img">
                        </div>
                    </div>
                    <div class="col-md-4 membership-box card-body item">
                        <h5 class="benefit-title">Banglalink Yearly</h5>
                        <ul class="benefit-list">
                            <li>Talk To A Doctor- Unlimited</li>
                            <li>Ask a Doctor- Unlimited</li>
                            <li>Life Insurance - Taka 10,000 Coverage</li>
                            <li>Accidental Cash Coverage upto - Taka 5,000/month</li>
                        </ul><br>
                        <div class="col-md-5 padding-left-null benefit-btn-section">
                            <a href="{!! route('frontend.subscription.plan-list', ['param' => 'bl']) !!}" class="btn btn-lg benefit-btn">{{__('home.membership_benefit.get_membership_btn')}}</a>
                        </div>
                        <div class="col-md-7" style="width: auto">
                            <img src="{!! asset('assets/img/protyasa.png') !!}" height="100" alt="hospital" class="protyasa-img">
                        </div>
                    </div>
                </div>
            @elseif(!$isBlUser)
                <div class="membership-benefit">
                    <div class="col-md-4 membership-box card-body item">
                        <h5 class="benefit-title">{{__('home.membership_benefit.suchana.title')}}</h5>
                        <ul class="benefit-list">
                            <li>{{__('home.membership_benefit.suchana.talk_to_doctor_text')}}</li>
                            <li>{{__('home.membership_benefit.suchana.ask_doctor_text')}}</li>
                            <li>{{__('home.membership_benefit.suchana.life_insurance_text')}}</li>
                            <li>{{__('home.membership_benefit.suchana.hospitalization_text')}}</li>
                        </ul><br>
                        <div class="col-md-5 padding-left-null benefit-btn-section">
                        <a href="{!! route('frontend.subscription.plan-list', ['param' => 'suchana']) !!}" class="btn btn-lg benefit-btn">{{__('home.membership_benefit.get_membership_btn')}}</a>
                        </div>
                        <div class="col-md-7 col-md-offset-3" style="width: auto">
                            <img src="{!! asset('assets/img/suchana.png') !!}" height="100" alt="hospital" class="suchana-img">
                        </div>
                    </div>
                    <div class="col-md-4 membership-box card-body item">
                        <h5 class="benefit-title">{{__('home.membership_benefit.prerona.title')}}</h5>
                        <ul class="benefit-list">
                            <li>{{__('home.membership_benefit.prerona.talk_to_doctor_text')}}</li>
                            <li>{{__('home.membership_benefit.prerona.ask_doctor_text')}}</li>
                            <li>{{__('home.membership_benefit.prerona.ephr')}}</li>
                            <li>{{__('home.membership_benefit.prerona.hospital_discount')}}</li>
                        </ul><br>
                        <div class="col-md-5 padding-left-null benefit-btn-section">
                            <a href="{!! route('frontend.subscription.plan-list', ['param' => 'perona']) !!}" class="btn btn-lg benefit-btn">{{__('home.membership_benefit.get_membership_btn')}}</a>
                        </div>
                        <div class="col-md-7" style="width: auto">
                            <img src="{!! asset('assets/img/perona.png') !!}" height="100" alt="hospital" class="perona-img">
                        </div>
                    </div>
                    <div class="col-md-4 membership-box card-body item">
                        <h5 class="benefit-title">{{__('home.membership_benefit.protyasa.title')}}</h5>
                        <ul class="benefit-list">
                            <li>{{__('home.membership_benefit.protyasa.talk_to_doctor_text')}}</li>
                            <li>{{__('home.membership_benefit.protyasa.ask_doctor_text')}}</li>
                            <li>{{__('home.membership_benefit.protyasa.life_insurance_text')}}</li>
                            <li>{{__('home.membership_benefit.protyasa.hospital_discount')}}</li>
                        </ul><br>
                        <div class="col-md-5 padding-left-null benefit-btn-section">
                            <a href="{!! route('frontend.subscription.plan-list', ['param' => 'protyasha']) !!}" class="btn btn-lg benefit-btn">{{__('home.membership_benefit.get_membership_btn')}}</a>
                        </div>
                        <div class="col-md-7" style="width: auto">
                            <img src="{!! asset('assets/img/protyasa.png') !!}" height="100" alt="hospital" class="protyasa-img">
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
