@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Video Call To a Doctor ' !!}
@endsection
@section('after-styles')
    <style>
        .profile-title.appoinment {
            width: 98%;
        }


    </style>
@stop

@section('content')
    <div id="page-content" class="header-static footer-fixed" >
        <div id="home-wrap" class="content-section fullpage-wrap margin-bottom-small" style="background-color: #fff; min-height: 500px"><br>
            <div class="row margin-leftright-null section-padding">
                <div class="col-md-9 margin-leftright-null">
                    <div class="form-group has-search margin-leftright-null ">
                        {!! Form::open( ['route' => ['frontend.tele-medicine.speciality-wise-doctor'], 'method' => 'GET','class' =>'form-inline tele-medicine-doctor-search-form']) !!}
                        <span class="fa fa-map-marker form-control-feadback"></span>
                        <select id="location" class="form-control"  data-error="Please Select district" name="district_id">
                            <option value="">Search by a district [Ex. Dhaka]</option>
                           @foreach($district_list->districts as $district)
                               <option value="{!! $district->district_name !!}">{!! $district->district_name !!}</option>
                           @endforeach
                        </select>
                        <span class="fa fa-search search-icon form-control-feadback"></span>

                        <select id="speciality" class="form-control"  name="speciality_id" required>
                            <option value="">Search by Specialists</option>
                           @foreach($specialities as $speciality)
                               <option value="{!! $speciality->id !!}">{!! $speciality->name !!}</option>
                           @endforeach
                        </select>
                        <div>
                            <button class="btn btn-lg home-search-btn"> Search </button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="row slider-section section-padding">
                <div class="col-md-12">
                    <div class="col-md-4 col-sm-12 speciality-title-section">
                        <h2 class="margin-bottom">"Skip the travel!" Take online doctor consultation</h2>
                        <ul class="slider-download-btn">
                            <li><a href="#" class="download-button">Consult Now </a></li>
                        </ul>
                    </div>
                    <div class="col-md-5 col-md-offset-3 col-sm-12 img-section">
                        <img src="{!! asset('assets/img/facility_slider.png') !!}" class="facility-slider-img img-responsive" alt="">
                    </div>
                </div>
            </div>

            @if(count($specialities)>0)
                <div class="row no-margin m-t-30">
                    <div class="col-md-12 margin-bottom-small">
                        <h3 class="membership-title">{{__('home.choose_specialist.title')}}</h3>
                        <div class="row padding-bottom-null m-t-30">
                            <div class="col-lg-12 col-md-12 col-sm-12 margin-bottom-null padding-bottom-null">
                            @foreach($specialities as $specialist)
{{--                                    <div class="col-xs-12 col-sm-12 col-md-4 text-center padding-leftright-null">--}}
{{--                                        <div class="thumbnail text-center" style="margin-right: 20px">--}}
{{--                                            <a href="{{route('frontend.tele-medicine.speciality-wise-doctor',['speciality_id'=>$specialist->id])}}" >--}}
{{--                                            --}}{{--<a href="{{url('/tele-medicine/speciality-wise-doctor/'.$specialist->id)}}" >--}}
{{--                                                <h4 class="phr-m-title">{{ $specialist->name }}</h4>--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                <div class="col-md-2 col-sm-5 col-xs-12 speciality-info text-center" style="margin-bottom: 20px; min-height: 220px">
                                    <div class="speciality-box card-body">
                                        <img src="{!! asset('assets/img/specialist/General Physician.png') !!}" class="speciality-img" title="{!! $specialist->name !!}"/>
                                    </div>
                                    <p style="color: #000;"> {{ \Illuminate\Support\Str::limit($specialist->name, 25, $end='...') }}</p>
                                    <a href="{{ route('frontend.tele-medicine.speciality-wise-doctor',['speciality_id'=> $specialist->id]) }}">{{__('home.choose_specialist.book_now_btn')}}</a>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>



@endsection

@section('before-scripts-end')
    <script>


    </script>


@endsection
