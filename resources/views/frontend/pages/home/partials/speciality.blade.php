<div class="speciality m-t-30">
    <div class="row no-margin">
        <div class="col-md-12">
            <div class="col-md-10">
{{--                <h3 class="margin-bottom-small">--}}
                    <h2 class="membership-title margin-bottom-small">{{__('home.choose_specialist.title')}}</h2>
{{--                </h3>--}}
            </div>
            <div class="col-md-2 text-center margin-bottom-small">
                <a href="{!! route('frontend.tele-medicine.speciality-list') !!}" class="btn btn-lg spciality-btn">{{__('home.choose_specialist.specialist_btn')}}</a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-2 text-center margin-bottom-small">
                <div class="speciality-box card-body">
                    <img src="{!! asset('assets/img/specialist/General Physician.png') !!}" class="speciality-img"/>
                </div><br>
                <p>{{__('home.choose_specialist.general_physician')}}</p>
                <a href="{{ route('frontend.tele-medicine.speciality-wise-doctor',['speciality_id'=> 2]) }}">{{__('home.choose_specialist.book_now_btn')}}</a>
            </div>
            <div class="col-md-2 text-center margin-bottom-small">
                <div class="speciality-box card-body">
                    <img src="{!! asset('assets/img/specialist/Gynaecology.png') !!}" class="speciality-img"/>
                </div><br>
                <p>{{__('home.choose_specialist.obstetrics_gynecology')}}</p>
                <a href="{{ route('frontend.tele-medicine.speciality-wise-doctor',['speciality_id'=> 3]) }}">{{__('home.choose_specialist.book_now_btn')}}</a>
            </div>
            <div class="col-md-2 text-center margin-bottom-small">
                <div class="speciality-box card-body">
                    <img src="{!! asset('assets/img/specialist/child specialist.png') !!}" class="speciality-img"/>
                </div><br>
                <p>{{__('home.choose_specialist.child_specialist')}}</p>
                <a href="{{ route('frontend.tele-medicine.speciality-wise-doctor',['speciality_id'=> 73]) }}">{{__('home.choose_specialist.book_now_btn')}}</a>
            </div>
            <div class="col-md-2 text-center margin-bottom-small">
                <div class="speciality-box card-body">
                    <img src="{!! asset('assets/img/specialist/cardiology1.png') !!}" class="speciality-img"/>
                </div><br>
                <p>{{__('home.choose_specialist.cardiology')}}</p>
                <a href="{{ route('frontend.tele-medicine.speciality-wise-doctor',['speciality_id'=> 5]) }}">{{__('home.choose_specialist.book_now_btn')}}</a>
            </div>
            <div class="col-md-2 text-center margin-bottom-small">
                <div class="speciality-box card-body">
                    <img src="{!! asset('assets/img/specialist/Dermatology1.png') !!}" class="speciality-img"/>
                </div><br>
                <p>{{__('home.choose_specialist.dermatology')}}</p>
                <a href="{{ route('frontend.tele-medicine.speciality-wise-doctor',['speciality_id'=> 8]) }}">{{__('home.choose_specialist.book_now_btn')}}</a>
            </div>
            <div class="col-md-2 text-center margin-bottom-small">
                <div class="specia{__('home.choose_specialist.paediatrics')}}lity-box card-body">
                    <img src="{!! asset('assets/img/specialist/paediatrics.png') !!}" class="speciality-img"/>
                </div><br>
                <p>{{__('home.choose_specialist.paediatrics')}}</p>
                <a href="{{ route('frontend.tele-medicine.speciality-wise-doctor',['speciality_id'=> 44]) }}">{{__('home.choose_specialist.book_now_btn')}}</a>
            </div>
        </div>
    </div>
</div><br>
