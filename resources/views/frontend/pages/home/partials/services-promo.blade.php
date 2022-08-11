<div class="row margin-leftright-null service-section">
      <div class="col-md-12 section-paddin" style="margin-left: 30px">
          <div class="col-md-6 margin-bottom padding-leftright-null">
              <div class="col-md-12 padding-left-null single-service padding-leftright-null">
                  <div class="col-md-4 img-box text-center ">
                      <img src="{!! asset('assets/img/Talk to a Doctor.png') !!}" alt="">
                  </div>
                  <div class="col-md-8">
                      <div class="col-md-12 service-content-box text-center">
                          <a href="#" class="service-button responsive-service-btn tall-to-doctor-btn" id="talk-to-doctor">
{{--                              <span class="badge" id="badge-top-right">24/7</span>--}}
                              {{__('home.services.talk_to_doctor')}}
{{--                              <br>--}}
                              <span class="live">LIVE <i class="fa fa-podcast"></i></span>
                          </a>
                          <p class='text-center service-text'>{{__('home.services.talk_to_doctor_desc')}}</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-6 margin-bottom padding-leftright-null">
              <div class="col-md-12 padding-left-null single-service padding-leftright-null">
                  <div class="col-md-4 img-box text-center ">
                      <img src="{!! asset('assets/img/corona test.png') !!}" id="corona_test" alt="">
                  </div>
                  <div class="col-md-8">
                      <div class="col-md-12 service-content-box text-center">
                          <a href="{!! route('frontend.doctor-follow-up.packages') !!}" class="service-button responsive-service-btn corona-service-btn">{{__('home.services.corona_treatment_service')}}</a>
                          <p class='text-center service-text'>{{__('home.services.corona_treatment_desc')}}</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-6 margin-bottom padding-leftright-null">
              <div class="col-md-12 padding-left-null single-service padding-leftright-null">
                  <div class="col-md-4 img-box text-center ">
                      <img src="{!! asset('assets/img/Video Call to a Doctor.png') !!}" alt="">
                  </div>
                  <div class="col-md-8">
                      <div class="col-md-12 service-content-box text-center">
                          <a href="{!! route('frontend.tele-medicine.speciality-list') !!}" class="service-button responsive-service-btn video-call-btn">{{__('home.services.video_call_to_doctor')}}</a>
                          <p class='text-center service-text'>{{__('home.services.video_call_to_doctor_desc')}}</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-6 margin-bottom padding-leftright-null">
              <div class="col-md-12 padding-left-null single-service padding-leftright-null">
                  <div class="col-md-4 img-box text-center ">
                      <img src="{!! asset('assets/img/Ask a Doctor.png') !!}" id="ask_a_doctor" alt="">
                  </div>
                  <div class="col-md-8">
                      <div class="col-md-12 service-content-box text-center">
                          <a href="{!! route('frontend.ask_doctor') !!}" class="service-button responsive-service-btn">{{__('navs.general.ask_a_doctor')}}</a>
{{--                          <a href="" class="service-button responsive-service-btn">{{__('navs.general.ask_a_doctor')}}</a>--}}
                          <p class='text-center service-text'>{{__('home.services.ask_doctor_desc')}}</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-6 margin-bottom padding-leftright-null">
              <div class="col-md-12 padding-left-null single-service padding-leftright-null">
                  <div class="col-md-4 img-box text-center ">
                      <img src="{!! asset('assets/img/Doctor Appointment.png') !!}"  id="book_appointment" alt="">
                  </div>
                  <div class="col-md-8">
                      <div class="col-md-12 service-content-box text-center">
                          <a href="{!! route('frontend.doctor.index') !!}" class="service-button responsive-service-btn">{{__('home.services.doctor_appointment')}}</a>
                          <p class='text-center service-text'>{{__('home.services.doctor_appointment_desc')}}</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-6 margin-bottom padding-leftright-null">
              <div class="col-md-12 padding-left-null single-service padding-leftright-null">
                  <div class="col-md-4 img-box text-center ">
                      <img src="{!! asset('assets/img/Doorstep Pathology Test Service.png') !!}" id="pathology_test" alt="">
                  </div>
                  <div class="col-md-8 text-center">
                      <div class="col-md-12 service-content-box">
                          <a href="{!! route('frontend.sample-collection.create') !!}" class="service-button responsive-service-btn home-pathology-btn">{{__('home.services.doorstep_pathology_test')}}</a>
                          <p class='text-center service-text'>{{__('home.services.doorstep_pathology_desc')}}</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>

</div>
