<!--

<div class="row no-margin text grey-bg login-home">
  <div class="col-md-12 padding-leftright-null">
    <div class="col-md-4">
      <div class="bg-white">
        <div class="icon-area">
          <img src="{!! asset('assets/img/h-1.png') !!}" alt="">
        </div>
        <h1>Record Your Personal <br>Health </h1>
        <p>Managing health records by individuals to "take charge of their own health" in a shareable and interoperable platform
        </p>
        <a href="{!! route('frontend.personal_health_report') !!}" class="btn-alt small margin-null">Record Your PHR</a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="bg-white">
        <div class="icon-area">
          <img src="{!! asset('assets/img/h-2.png') !!}" alt="">
        </div>
        <h1>Up to 35% Discount Our Panel Hospital</h1>
        <p>Daktarbhai members will enjoy major discounts at our panel hospitals spread in different districts of Bangladesh
        </p>
        <a href="{!! route('frontend.hospital.index') !!}" id="" class="btn-alt small margin-null">Get Discount</a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="bg-white">
          <div class="icon-area">
            <img src="{!! asset('assets/img/appoinment.png') !!}" alt="">
          </div>
          <h1>Find your doctor and Book a Appointment </h1>
          <p>With Daktarbhai you can enjoy services such as, “Book Appointment” with doctors of your choose specialists.
          </p>
          <a href="{!! route('frontend.doctor.index') !!}" class="btn-alt small margin-null">Book an Appointment</a>
      </div>
    </div>
  </div>
</div> -->

  <div class="row margin-leftright-null grey-background new-services">
    <div class="col-md-12 padding-leftright-null">
        <div data-responsive="parent-height" data-responsive-id="mission" class="text">
            <h3 class="title center grey big margin-bottom-small home-title">{{__('home.services.our')}} <span>{{__('home.services.services')}} </span></h3>
        </div>
    </div>
    <div class="row no-margin text grey-bg">
      <div class="col-md-12 padding-leftright-null">
        <div class="col-md-3">
          <a href="{!! route('frontend.personal_health_report') !!}" alt="">
          <div class="services-bg-white">
              <div class="icon-area">
{{--                <img src="{!! asset('assets/img/services-3.png') !!}" alt="">--}}
                <img src="{!! asset('assets/img/track healthrecord.png') !!}" alt="">
              </div>
              <h1>{{__('home.health_record.title')}}</h1>
              <p class="justi">{{__('home.health_record.description')}}
              </p>
          </div>
          </a>
        </div>
        <div class="col-md-3">
          <a href="{!! route('frontend.ask_doctor') !!}" alt="">
            <div class="services-bg-white">
              <div class="icon-area">
{{--                <img src="{!! asset('assets/img/services-1.png') !!}" alt="">--}}
                <img src="{!! asset('assets/img/ask a doctor.png') !!}" alt="">
              </div>
              <h1>{{__('home.ask_doctor.title')}}</h1>
              <p class="justi"> {{__('home.ask_doctor.description')}} </p>
            </div>
            </a>
        </div>
        <div class="col-md-3">
          <a href="{!! route('frontend.doctor.index') !!}" alt="">
            <div class="services-bg-white">
              <div class="icon-area">
{{--                <img src="{!! asset('assets/img/services-2.png') !!}" alt="">--}}
                <img src="{!! asset('assets/img/book appointment.png') !!}" alt="">
              </div>
              <h1>{{__('home.book_appointment.title')}}</h1>
              <p class="justi">{{__('home.book_appointment.description')}}</p>
            </div>
          </a>
        </div>
        <div class="col-md-3">
          <a href="{!! route('frontend.health_directory') !!}" alt="">
            <div class="services-bg-white">
                <div class="icon-area">
                  <img src="{!! asset('assets/img/Health Directory.png') !!}" alt="">
{{--                  <img src="{!! asset('assets/img/services-4.png') !!}" alt="">--}}
                </div>
                <h1>{{__('home.health_directory.title')}}</h1>
                <p class="justi">{{__('home.health_directory.description')}}</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-12">
            <div class="text text-center padding-bottom-null padding-md-top-null">
                <a href="{!! route('frontend.services') !!}" class="btn-alt active small margin-null">{{__('home.button.service_btn')}}</a>
            </div>
        </div>
    </div>
</div>
