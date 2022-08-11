<div class="row section-padding whats-new-section margin-leftright-null">
    <div class="col-md-12 section-title">
        <h3 class="margin-bottom">{{__('home.whats_new.whats_new_title')}}</h3>
    </div>
    <div class="col-md-12">
      <div class="col-md-4 padding-leftright-null video-blog-section">
          <div class="col-md-12  card video-card" >
           <img src="{!! asset('assets/img/video-title.png') !!}" class="video-title-img" alt="">
              <img src="{!! asset('assets/img/video-blog-1.png') !!}" class="card-img-top img-responsive video-blog-img margin-bottom" alt="...">
              <div class="card-body video-card-body">
                  <p class="card-text card-title video-blog-title">{{__('home.whats_new.video_title')}}</p>
                  <p class="card-text card-desc">{{__('home.whats_new.video_description')}}</p>
              </div>
              <div class="card-footer">
                  <a href="{!! route('frontend.video-blogs.index') !!}" class="service-button new-feature-button">{{__('home.whats_new.video_btn')}}</a>
              </div>
          </div>
      </div>
    <div class="col-md-4 padding-leftright-null video-blog-section">
        <div class="col-md-12  card video-card" >
            <img src="{!! asset('assets/img/offer-title.png') !!}" class="video-title-img" alt="">
            <img src="{!! asset('assets/img/followup.jpg') !!}" class="card-img-top img-responsive video-blog-img margin-bottom" alt="...">
            <div class="card-body video-card-body">
                <p class="card-text card-title">{{__('home.whats_new.offers_title')}}</p>
                <p class="card-text card-desc">{{__('home.whats_new.offers_description')}}</p>
            </div>
            <div class="card-footer">
                <a href="{!! route('frontend.doctor-follow-up.packages') !!}" class="service-button new-feature-button">{{__('home.whats_new.offers_btn')}}</a>
            </div>
        </div>
    </div>
      <div class="col-md-4 padding-leftright-null video-blog-section">
          <div class="col-md-12  card video-card" >
              <img src="{!! asset('assets/img/discount-title.png') !!}" class="video-title-img" alt="">
              <img src="{!! asset('assets/img/discount-1.png') !!}" class="card-img-top img-responsive video-blog-img margin-bottom" alt="...">
              <div class="card-body video-card-body">
                  <p class="card-text card-title">{{__('home.whats_new.discount_title')}}</p>
                  <p class="card-text card-desc">{{__('home.whats_new.discount_description')}}</p>
              </div>
              <div class="card-footer">
                  <a href="{!! route('frontend.hospital.index') !!}" class="service-button new-feature-button">{{__('home.whats_new.discount_btn')}}</a>
              </div>
          </div>
      </div>
    </div>
</div>
