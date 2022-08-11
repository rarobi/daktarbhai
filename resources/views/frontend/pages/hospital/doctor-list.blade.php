@extends('frontend.layouts.theme.master')

@section('title')
    {!! 'Doctor List -Hospital | ' . app_name()  !!}
@endsection

@section('page-header-class', 'header-static')

@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap row doc-bg">
        <div class="col-md-12 padding-leftright-null">
            <!-- ————————————————————————————————————————————
            ———	Find Doctor Start here
            —————————————————————————————————————————————— -->
            <section class="doctor page padding-md">
                <div class="container">
                    <h2 class="text-center padding-top-null white">
                        {!! $hospital->name or '' !!}
                    </h2>
                    <p class="heading white text-center">{{__('home.services.title')}}
                        {{--Health is a right, not a privilege. It needs to be enjoyed with equity.--}}
                    </p>
                </div>
            </section>
        </div>
    </div>

    <div id="home-wrap" class="content-section fullpage-wrap row white">
        <!-- ————————————————————————————————————————————
        ———	Single Doctor list
        —————————————————————————————————————————————— -->
        @if($doctors != null)
            @foreach($doctors as $doctor)
                <div class="doctor-list">
                    <div class="col-md-12">
                        <div class="doc-single">
                            <div class="col-md-9">
                                <div class="col-md-3 padding-null">
                                    <div class="doc-images">
                                        <a href="{!! route('frontend.doctor.show', $doctor->doctor_id) !!}"><img src="{!! (isset($doctor) && $doctor->image !=null) ? $doctor->image : asset('assets/img/doctor-grey.png') !!}" alt="doctor" class="img-responsive img-center"></a>
                                    </div>
                                </div>
                                <div class="col-md-9 padding-sm">
                                    <a href="{!! route('frontend.doctor.show', $doctor->doctor_id) !!}"><h4>{!! $doctor->name or '' !!}</h4></a>
                                    <p class="designation margin-bottom-null">{!! $doctor->qualification or '' !!}</p>
                                    @if(isset($doctor->specialities) && $doctor->specialities != null)
                                        <div class="address-wrap">
                                            <div class="address-left">
                                                <p class="sp-icon margin-bottom-null"><img src="{!! asset('assets/img/sp-doc-icon.png') !!}"><span>Specialist</span></p>
                                                <ul class="doc-specil">
                                                    <li>{!! $doctor->specialities or '' !!}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                    @if($doctor->chambers != null && count($doctor->chambers))
                                        @php
                                            $chamber = $doctor->chambers[0]
                                        @endphp
                                        <div class="address-wrap">
                                            <div class="address-left">
                                                <p class="location"><i class="ion-ios-location-outline"></i> <span>Chamber</span><br>
                                                    {!! $chamber->chamber_name or '' !!}, {!! $chamber->chamber_address or '' !!}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3 padding-md">
                                <a href="{!! route('frontend.doctor.show', $doctor->doctor_id) !!}" class="btn-alt small active doc-btn">{{__('find_doctor.details')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="doctor-list">
                <div class="col-md-12">
                    <div class="doc-single padding-sm not-found">
                        <h6 class="text-center">{{__('find_doctor.message.search_doctor')}}
                            {{--We have not found any <span>Doctors</span> that match your search criteria.--}}

                        </h6>
                    </div>
                </div>
            </div>
    @endif
        <!-- ————————————————————————————————————————————
        ———	Pagination
        —————————————————————————————————————————————— -->
        @if(isset($paginator) && $paginator->total_pages != 1)
        <section id="nav" class="padding-top-null">
            <div class="row">
                <div class="col-md-12">
                    <ul class="pagination">
{{--                        @if($paginator->current_page > 9)--}}
{{--                            <li><a href="{!! route('frontend.hospital.pagination.doctors', ['id' => $id,'page' =>$paginator->current_page-8 ]) !!}"> << </a></li>--}}
{{--                        @endif--}}

                        @if(isset($first_page) && $paginator->current_page != 1 && $paginator->current_page>5)
                            <li><a href="{!! route('frontend.hospital.pagination.doctors', ['id' => $id,'page' => $first_page ]) !!}"> {{__('pagination.first')}} </a></li>
                        @endif
                        @if($paginator->previous_page_url != null)
                            <li>
                                <a href="{!! route('frontend.hospital.pagination.doctors', ['id' => $id,'page' =>$paginator->current_page-1 ]) !!}">
                                    <i class="ion-ios-arrow-left"></i>  {{__('pagination.previous')}}</a>
                            </li>
                        @endif

                        @for($i = max(1,$paginator->current_page-5); $i <=  min($paginator->current_page+5, $paginator->total_pages);  $i++)
                            <li><a @if($i == $paginator->current_page) class="bg-brand-color" @endif href="{!! route('frontend.hospital.pagination.doctors', ['id' => $id,'page' =>$i ]) !!}">{!! $i!!}</a></li>
                        @endfor
                        {{--{!! dd($query_string) !!}--}}

                        @if($paginator->next_page_url != null)
                            <li><a href="{!! route('frontend.hospital.pagination.doctors', ['id' => $id,'page' =>$paginator->current_page+1 ]) !!}"> {{__('pagination.next')}} <i class="ion-ios-arrow-right"></i></a></li>
                        @endif
{{--                        @if($paginator->current_page < $paginator->total_pages-9 )--}}
{{--                            <li><a href="{!! route('frontend.hospital.pagination.doctors', ['id' => $id,'page' =>$paginator->current_page+8 ]) !!}"> >> </a><li>--}}
{{--                        @endif--}}

                        @if($paginator->current_page != $paginator->total_pages && $paginator->current_page < $paginator->total_pages-5)
                            <li><a href="{!! route('frontend.hospital.pagination.doctors', ['id' => $id,'page' =>$paginator->total_pages ]) !!}"> {{__('pagination.last')}} </a><li>
                        @endif

                    </ul>
                </div>
            </div>
        </section>
            @endif
    </div>
@endsection

@section('before-scripts-end')

@endsection