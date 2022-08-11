@if(isset($healthTips))
  <div class="row margin-leftright-null">
      <div class="col-md-12 padding-leftright-null">
          <div class="text padding-bottom-null text-center">
              <h2 class="title center grey margin-bottom-small home-title">Health Tips</h2>
          </div>
      </div>
      <div class="row no-margin health-tips">
          <div class="col-md-12 padding-leftright-null">
              <div class="health-tips-content">
                  @foreach($healthTips as $healthTip)
                      <div class="col-md-4 padding-leftright-null">
                          <div class="m-b-50">
                              <img src="{!! (isset($healthTip) && $healthTip->image_obj->web_thumbnail !=null) ? $healthTip->image_obj->web_thumbnail : (($healthTip->image !=null) ? $healthTip->image : asset('assets/img/missing-image.jpg')) !!}" class="health-tips-icon" alt="">
                              <div class="service-content">
                                  <h6 class="heading  margin-bottom-extrasmall">{!! $healthTip->title or '' !!}</h6>
                                  <p class="margin-bottom-null">{!! $healthTip->content or '' !!}
                                      <a class="tips-read-more" data-toggle="modal" data-target="#tipsmodal{!! $healthTip->id !!}">Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                  </p>
                                  <div class="tips-meta">
                                      <i class="ion-coffee"></i> @foreach(array_slice($healthTip->categories, 0, 1) as $category) &nbsp;{!! $category->name or '' !!} @endforeach
                                      <i class="ion-clock"></i> {!! $healthTip->published_before or '' !!}
                                  </div>
                              </div>
                          </div>
                      </div> -->

                      <!-- ————————————————————————————————————————————
          ———	Health Tips Modal
          —————————————————————————————————————————————— -->
                      <div class="health-tips-modal modal fade" id="tipsmodal{!! $healthTip->id !!}" tabindex="-1" role="dialog" aria-labelledby="tipsmodalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <img src="{!! (isset($healthTip) && $healthTip->image_obj->web_large !=null) ? $healthTip->image_obj->web_large : (($healthTip->image !=null) ? $healthTip->image : asset('assets/img/missing-image.jpg')) !!}" class="moadal-img" alt="">
                                  </div>
                                  <div class="modal-body">
                                      <h2>{!! $healthTip->title or '' !!}</h2>
                                      <div class="tips-meta">
                                          <i class="ion-coffee"></i> @foreach(array_slice($healthTip->categories, 0, 1) as $category) &nbsp;{!! $category->name or '' !!} @endforeach &nbsp; &nbsp;
                                          <i class="ion-clock"></i> {!! $healthTip->published_before or '' !!}
                                      </div>
                                      <p>
                                          {!! $healthTip->description or '' !!}
                                      </p>
                                  </div>
                                  <div class="modal-footer">
                                      <div class="post-share-icons health-tips" style="">
                                          <ul class="info">
                                              <li><a class="fb_share"  data-title="{!! $healthTip->title !!} " data-description="{!! textshorten($healthTip->description , 420)!!}"
                                                     data-image="{!! (isset($healthTip) && $healthTip->image !=null) ? $healthTip->image : asset('assets/img/missing-image.jpg') !!}"  data-href="{!! $healthTip->link or '' !!}">Share on  |  <i class="ion-social-facebook" data-pack="social" data-tags="like, post, share"></i></a></li>
                                          </ul>
                                      </div>
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- end healthtips modal-->
                   @endforeach
              </div>
          </div>
      </div>
      <div class="more-tips">
          <a href="{!! route('frontend.healthtips.index') !!}" class="btn margin-null margin-top-md more">More Tips</a>
      </div>
  </div>
@endif
