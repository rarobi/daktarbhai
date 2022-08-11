@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'Personal Health Record | ' . app_name()  !!}
@endsection

@section('after-styles')
    <link rel="stylesheet" href="{!! asset('assets/css/phr.css') !!}">
    <style>
        a.btn-alt.small.active {
            background-color: #36B7B4 !important;
            border-radius: 10px !important;
            /*height: 50px !important;*/
            color: #fff;
        }

        .fa{
            font-size: 22px !important;
            margin-left: 5px !important;
            position: absolute;
            top: 17px;
        }

        .profile-span {
            margin-right: 25px !important;
        }

        .profile-img {
            position: absolute;
            height: 20px;
            top: 10px;
        }
    </style>
@endsection

@section('main-content')

    <!-- ————————————————————————————————————————————
            ———	Phr Content
            —————————————————————————————————————————————— -->
    <div class="col-md-10 padding-right-null">
        <div class="phr-create-img">
            <img src="{!! asset('assets/img/phr/no-data.png') !!}" alt="">
        </div>
        <p class="text-center padding-sm create-new">
            {{ trans('strings.frontend.web.phr.no-data-found') }}
            <a href="{{ route('frontend.phr.create', $phr) }}" class="btn-alt small active doc-btn">{{__('phr.common.add_1')}} {{ ucwords($phr) }} {{__('phr.common.record')}}
{{--                <img src="{!! asset('assets/img/phr/plus-sign.png') !!}" alt=""> --}}
                <i class="fa fa-plus-circle"></i>
            </a>
        </p>

    </div>

    <!-- ————————————————————————————————————————————
            ———	END phr Content
            —————————————————————————————————————————————— -->
@endsection
