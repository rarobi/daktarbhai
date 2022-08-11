@section('header-script')
<style type="text/css">
    {{--.our-partner-hospital h3.home-title {--}}
        {{--font-size: 32px !important;--}}
        {{--font-weight: 300;--}}
        {{--line-height: 40px !important;--}}
        {{--text-align: center !important;--}}
        {{--text-transform: uppercase !important;--}}

    {{--}--}}
    {{--.our-partner-hospital h3.home-title span {--}}
        {{--color: #00d4a4;--}}
        {{--font-weight: 400;--}}
    {{--}--}}
    {{--.our-partner-hospital .top-cart {--}}
        {{--padding: 75px 20px 20px 20px;--}}
        {{--border: 1px solid #f1f1f1;--}}
        {{--min-height: 260px;--}}
    {{--}--}}
    {{--.our-partner-hospital .top-cart:hover {--}}
        {{--box-shadow: 0px 0px 30px 0px rgba(88, 88, 88, 0.15);--}}
        {{--transition: all .3s ease-in-out;--}}
    {{--}--}}

    {{--.our-partner-hospital .top-cart:hover .fa.fa-hospital-o.service {--}}
        {{--background: url({{ url('/assets/img/2.png') }}) no-repeat center;--}}
        {{--/*background: url(../../img/logo.png) no-repeat center;*/--}}
        {{--transition: all .3s ease-in-out;--}}
    {{--}--}}
    {{--.our-partner-hospital .fa.fa-hospital-o.service  {--}}
        {{--width: 80px;--}}
        {{--height: 100px;--}}
        {{--position: absolute;--}}
        {{--top: 0px;--}}
        {{--left: 50%;--}}
        {{--margin-left: -40px;--}}
        {{--text-align: center;--}}
        {{--font-size: 40px;--}}
        {{--line-height: 100px !important;--}}
        {{--background: url({{ url('/assets/img/1.png') }}) no-repeat center;--}}
        {{--/*background: url(../../img/logo.png) no-repeat center;*/--}}
        {{--color: #fff;--}}
    {{--}--}}

    {{--.our-partner-hospital .top-cart:hover .icon.ion-ios-world.service {--}}
        {{--background: url({{ url('/assets/img/2.png') }}) no-repeat center;--}}
        {{--transition: all .3s ease-in-out;--}}
    {{--}--}}
    {{--.our-partner-hospital .icon.ion-ios-world.service  {--}}
        {{--width: 80px;--}}
        {{--height: 100px;--}}
        {{--position: absolute;--}}
        {{--top: 0px;--}}
        {{--left: 50%;--}}
        {{--margin-left: -40px;--}}
        {{--text-align: center;--}}
        {{--font-size: 40px;--}}
        {{--line-height: 100px;--}}
        {{--background: url({{ url('/assets/img/1.png') }}) no-repeat center;--}}
        {{--color: #fff;--}}
    {{--}--}}
    {{--.our-partner-hospital .top-cart:hover .icon.ion-ios-cloud-upload.service {--}}
        {{--background: url({{ url('/assets/img/2.png') }}) no-repeat center;--}}
        {{--transition: all .3s ease-in-out;--}}
    {{--}--}}
    {{--.our-partner-hospital .icon.ion-ios-cloud-upload.service  {--}}
        {{--width: 80px;--}}
        {{--height: 100px;--}}
        {{--position: absolute;--}}
        {{--top: 0px;--}}
        {{--left: 50%;--}}
        {{--margin-left: -40px;--}}
        {{--text-align: center;--}}
        {{--font-size: 40px;--}}
        {{--line-height: 100px;--}}
        {{--background: url({{ url('/assets/img/1.png') }}) no-repeat center;--}}
        {{--color: #fff;--}}
    {{--}--}}

    @media only screen and(max-width: 480px){
        .hospital_logo{
            padding: 0 !important;
        }
    }
</style>
@endsection

@if(isset($panelHospitals) && $panelHospitals != null)
<div class="row margin-leftright-null our-partner-hospital">
    <div class="col-md-12 padding-leftright-null">
        <div data-responsive="parent-height" data-responsive-id="mission" class="text">
            <h3 class="title text-center grey big margin-bottom-small home-title"> {{__('home.services.our')}} <span> {{__('home.partner.general.partner')}} </span>{{__('home.partner.general.hospitals')}}  <br> {{__('home.partner.general.diagnostic')}} </h3>
        </div>
    </div>
    {{--<div class="row no-margin text partner-hospitals">--}}
        {{--<div class="col-md-12 padding-leftright-null">--}}
            {{--<div class="col-md-12 padding-leftright-null">--}}
                {{--@foreach($panelHospitals as $panelHospital)--}}
                    {{--{!! dd($panelHospital) !!}--}}
                {{--<div class="col-sm-12 col-md-4 padding-leftright-null partner-hospital-margin">--}}
                    {{--<div class="text text-center padding-md-bottom-null">--}}
                        {{--<a href="{!! route('frontend.hospital.show', $panelHospital->id) !!}"><div class="top-cart">--}}
                                {{--<i class="fa fa-hospital-o service"></i>--}}
                                {{--<h6 class="medium dark">{!! $panelHospital->name or '' !!}</h6>--}}
                                {{--<p class="htype">{!! $panelHospital->type or '' !!}</p>--}}
                                {{--<p> <span class="directory-cat">{!! $panelHospital->type or '' !!}</span>--}}
                                    {{--@if(! isEmptyOrNull($panelHospital->district_name))--}}
                                        {{--<i class="fa fa-map-marker"></i> {!! $panelHospital->district_name or '' !!} </p>--}}
                                {{--@endif--}}
                                {{--<p class="margin-md-bottom-null">--}}
                                    {{--{!! $panelHospital->description or '' !!}--}}
                                    {{--{!! $panelHospital->address or '' !!}--}}
                                    {{--{!! $panelHospital->district_name or ' ' !!}--}}
                                {{--</p>--}}
                            {{--</div></a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--@endforeach--}}
                {{--<div class="col-sm-12 col-md-4 padding-leftright-null">--}}
                    {{--<div class="text text-center padding-md-bottom-null">--}}
                        {{--<a href="#"><div class="top-cart">--}}
                                {{--<i class="fa fa-hospital-o service"></i>--}}
                                {{--<h6 class="medium dark">Trauma & Orthopedic Hospital</h6>--}}
                                {{--<p class="margin-md-bottom-null">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae atque architecto modi explicabo asperiores reiciendis autem quibusdam, quia.</p>--}}
                            {{--</div></a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-12 col-md-4 padding-leftright-null">--}}
                    {{--<div class="text text-center">--}}
                        {{--<a href="#"><div class="top-cart">--}}
                                {{--<i class="fa fa-hospital-o service"></i>--}}
                                {{--<h6 class="medium dark">Monowara Hospital Pvt. Ltd</h6>--}}
                                {{--<p class="margin-md-bottom-null">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae atque architecto modi explicabo asperiores reiciendis autem quibusdam, quia.</p>--}}
                            {{--</div></a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="text text-center padding-bottom-null padding-top-null">--}}
                    {{--<a href="{!! route('frontend.health_directory.type',['panel-hospitals']) !!}" class="btn-alt active small margin-null">View All Partner Hospitals</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    {{--</div>--}}
    <div class="row no-margin text partner-hospitals">
        <div class="col-md-12 padding-leftright-null">
            <div class="col-md-12 padding-leftright-null partner-hospital">
                @foreach($panelHospitals as $panelHospital)
                <div class="col-sm-12 padding-leftright-null partner-hospital-margin item">
                    <div class="text text-center padding-md-bottom-null hospital_logo" style="padding: 50px;">
                        <a href="{!! route('frontend.hospital.show', $panelHospital->id) !!}">
                            <div class="top-cart">
                                @if(empty($panelHospital->logo_image))
                                <i class="fa fa-hospital-o service" style="background: url({{ url('/assets/img/2.png') }}) no-repeat center; line-height: 100px; margin: -50px auto;"></i>
                                @else
                                <img src="{{ $panelHospital->logo_image }}" style="width: 80px; height: 100px; margin: -50px auto;>
                                @endif



                                <h6 class="medium dark">
                                    <br/><br/><br/><br/>
                                    {!! $panelHospital->name or '' !!} </h6>
                                {{--<p class="htype">{!! $panelHospital->type or '' !!}</p>--}}
                                <p> <span class="directory-cat">{!! $panelHospital->type or '' !!}</span>
                                    @if(! isEmptyOrNull($panelHospital->district_name))
                                        <i class="fa fa-map-marker"></i> {!! $panelHospital->district_name or '' !!} </p>
                                    @endif
                                <p class="margin-md-bottom-null">
                                    {{--{!! $panelHospital->description or '' !!}--}}
                                    {!! $panelHospital->address or '' !!}
                                    {!! $panelHospital->district_name or ' ' !!}
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
                {{--<div class="col-sm-12 col-md-4 padding-leftright-null">--}}
                    {{--<div class="text text-center padding-md-bottom-null">--}}
                        {{--<a href="#"><div class="top-cart">--}}
                                {{--<i class="fa fa-hospital-o service"></i>--}}
                                {{--<h6 class="medium dark">Trauma & Orthopedic Hospital</h6>--}}
                                {{--<p class="margin-md-bottom-null">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae atque architecto modi explicabo asperiores reiciendis autem quibusdam, quia.</p>--}}
                            {{--</div></a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-12 col-md-4 padding-leftright-null">--}}
                    {{--<div class="text text-center">--}}
                        {{--<a href="#"><div class="top-cart">--}}
                                {{--<i class="fa fa-hospital-o service"></i>--}}
                                {{--<h6 class="medium dark">Monowara Hospital Pvt. Ltd</h6>--}}
                                {{--<p class="margin-md-bottom-null">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae atque architecto modi explicabo asperiores reiciendis autem quibusdam, quia.</p>--}}
                            {{--</div></a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
            <div class="col-md-12">
                <div class="text text-center padding-bottom-null padding-top-null">
                    <a href="{!! route('frontend.health_directory.type',['panel-hospitals']) !!}" class="btn-alt active small margin-null">{{__('home.button.hospital_btn')}}</a>
                </div>
            </div>
        </div>

    </div>
</div>
    @endif

{{--@section('before-scripts-end')--}}
    {{--<script>--}}

        {{--$(document).ready(function(){--}}
            {{--$(".partner-hospital").owlCarousel({--}}
                {{--loop:true,--}}
                {{--autoplay:true,--}}
                {{--margin:10,--}}
                {{--responsiveClass:true,--}}
                {{--responsive:{--}}
                    {{--0:{--}}
                        {{--item:1,--}}
                        {{--nav:true--}}
                    {{--},--}}
                    {{--600:{--}}
                        {{--item:1,--}}
                        {{--nav:false--}}
                    {{--},--}}
                    {{--1000:{--}}
                        {{--item:1,--}}
                        {{--nav:true,--}}
                        {{--loop:false--}}
                    {{--}--}}
                {{--}--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
{{--@endsection--}}
