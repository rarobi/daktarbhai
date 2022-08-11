@if(isset($healthy_livings) && count($healthy_livings))

    <div class="row margin-leftright-null grey-background discount-partners">
    <div class="col-md-12 padding-leftright-null">
        <div data-responsive="parent-height" data-responsive-id="mission" class="text">
            <h3 class="title center grey big margin-bottom-small home-title">Our <span> Discount </span>Partners </h3>
        </div>
    </div>
    <div class="row no-margin text grey-bg discount-offer">
        <div class="col-md-12 padding-leftright-null">
            @foreach($healthy_livings as $healthy_living)
            <a href="{!! route('frontend.healthy-living.show',  $healthy_living->id) !!}">
             <div class="col-md-3">
                <div class="services-bg-white text-center">
                    <div class="discount-img-area">
                        <img src="{!! (isset($healthy_living->image_path) && $healthy_living->image_path != null ) ? $healthy_living->image_path : asset('assets/img/health-directory.png') !!}" alt="">
                    </div>
                    <h1>{!! $healthy_living->name or ' ' !!}</h1>
                    <p class="dis-sub-title">Daktarbhai discount offer for :</p>
                    @if(isset($healthy_living->services) && count($healthy_living->services))
                    <p>
                        @foreach($healthy_living->services as $service)
                            <span>{!! $service->service_name or '' !!}</span>
                                {!! $service->discount !!}
                            <br>
                        @endforeach
                    </p>
                    @endif
                    {{--<a href="#" class="discount btn-alt small margin-null">More</a>--}}
                </div>
            </div>
            </a>
            @endforeach
        </div>
        <div class="col-md-12">
            <div class="text text-center padding-bottom-null padding-md-top-null">
                <a href="{!! route('frontend.health_directory.type',['healthy-living']) !!}" class="btn-alt active small margin-null">View All Discounts</a>
            </div>
        </div>
    </div>
</div>
@endif
