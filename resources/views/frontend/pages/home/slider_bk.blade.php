<!-- ————————————————————————————————————————————
        ———	Slider Start Here
        —————————————————————————————————————————————— -->
<!-- <div id="flexslider-nav" class="fullpage-wrap small">
    <ul class="slides">
        <li>
            <div class="col-md-5 col-xs-12 padding-leftright-null">
                <div data-responsive="parent-height" data-responsive-id="about" class="text color-background">
                    <div class="padding-lg padding-md-topbottom-null">
                        <h3 class="big white margin-bottom-small">Health is Wealth!</h3>

                        <p class="heading left white hidden-sm hidden-xs">We can make a difference by storing and organizing all your personal health data in Daktarbhai ePHR. Doctors/general physicians can reach a conclusion faster, which would in turn can save treatment time and money, in a smarter & simpler way..  </p>
                        <p class="heading left white visible-sm visible-xs">We can make a difference by storing and organizing all your personal health data in Daktarbhai ePHR.  </p>
                        <a href="{!! route('frontend.doctor.index') !!}" class="btn-pro white z-index">more info</a>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-xs-12 padding-leftright-null">
                <div data-responsive="child-height" data-responsive-id="about" class="bg-img" style="background-image: url(&quot;{!! asset('assets/img/slide-one1.jpg') !!}&quot;); height: 557px;"></div>
            </div>
        </li>
        <li>
            <div class="col-md-5 padding-leftright-null bg-brand">
                <div data-responsive="parent-height" data-responsive-id="about" class="text color-background">
                    <div class="padding-lg padding-md-topbottom-null">
                        <h3 class="big white margin-bottom-small">Stay Healthy, Live Happy!</h3>
                        <p class="heading left white hidden-sm hidden-xs">Health is one’s biggest wealth. Let us show you how to store, maintain and stay up-beat about your health status with a few clicks of buttons.</p>
                        <p class="heading left white visible-sm visible-xs">Health is one’s biggest wealth. Let us show you how to store, maintain and stay up-beat about your health.</p>
                        <a href="{!! route('frontend.hospital.index') !!}" class="btn-pro white z-index">more info</a>
                    </div>
                </div>
            </div>
            <div class="col-md-7 padding-leftright-null">
                <div data-responsive="child-height" data-responsive-id="about" class="bg-img" style="background-image: url({!! asset('assets/img/slide-2.jpg') !!}); height: 557px;"></div>
            </div>
        </li>
        <li>
          <div class="col-md-5 padding-leftright-null bg-brand">
              <div data-responsive="parent-height" data-responsive-id="about" class="text color-background">
                  <div class="padding-lg padding-md-topbottom-null">
                      <h3 class="big white margin-bottom-small">Get the Daktarbhai app.</h3>
                      <p class="heading left white hidden-sm hidden-xs">Go to Google Play Store & Download our Daktarbhai app to enjoy your paper-free Medical Health Record System. Be the first to record your medical issues & live smart.</p>
                      <p class="heading left white visible-sm visible-xs">Go to Google Play Store & Download our Daktarbhai app to enjoy your paper-free Medical Health.</p>
                      <a href="https://play.google.com/store/apps/details?id=com.hislbd.daktarbhai&hl=en" target="_blank" class="btn-pro white z-index">Download our app</a>
                  </div>
              </div>
          </div>
          <div class="col-md-7 padding-leftright-null">
            <div data-responsive="child-height" data-responsive-id="about" class="bg-img" style="background-image: url({!! asset('assets/img/slide3.jpg') !!}); height: 557px;"></div>
        </div>
        </li>
    </ul>
    <div class="slider-navigation">
        <a href="#" class="flex-prev"><i class="ion-chevron-left"></i></a>
        <div class="slider-controls-container"></div>
        <a href="#" class="flex-next"><i class="ion-chevron-right"></i></a>
    </div>
</div> -->
<div id="flexslider" class="fullpage-wrap small banner-slider">
      <ul class="slides">
          <li style="background-image: url({!! asset('assets/img/banner-1.jpg') !!}); width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 1;" class="flex-active-slide">
            <div class="text">
                  <h1 class="white slider-title margin-bottom-small">{{__('home.slider.your_health')}} <br> {{__('home.slider.take_care')}}</h1>
                  <p class="slider-text">{{__('home.slider.description')}} </p><br>
                  <a href="{!! route('frontend.premium') !!}" class="text-bold btn-alt small activetwo margin-bottom-null" style="padding:0px 18px 0px 18px">{{__('home.button.slider_btn')}}</a>
                  <!-- <a target="_blank" href="{{ config('misc.app.android-native.app_url') }}" class="app-btn promotion slider-btn"><i class="fa fa-android" aria-hidden="true"></i> Google Play</a>
                  <a target="_blank" href="{{ config('misc.app.ios.app_url') }}" class="app-btn promotion slider-btn"><i class="fa fa-apple" aria-hidden="true"></i> App Store</a> -->
              </div>
              <div class="gradient dark"></div>
          </li>
      </ul>
  </div>

<!-- ————————————————————————————————————————————
———	Slider End
—————————————————————————————————————————————— -->
