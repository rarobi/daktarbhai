@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'PHR - Tumor Marker | ' . app_name()  !!}
@endsection

@section('main-content')

    <!-- ————————————————————————————————————————————
    ———	Phr Content
    —————————————————————————————————————————————— -->
    <!-- Content start here -->
  <div class="phr-background">
    <h3 class="phr-title"> {{__('phr.tumor-marker.create_title')}}</h3>

    <div class="phr-action">
        <a href="{{ route('frontend.phr.index', $phr) }}"><i class="ion-ios-undo"></i> {{__('phr.common.return')}}</a>
    </div>

    <div class="bmi-create">

        {!! Form::open(['route' => ['frontend.phr.store', $phr], 'method' => 'POST']) !!}

        @include('frontend.pages.phr.'.$phr.'.form')

        {!! Form::close() !!}

    </div>
  </div>
    <!-- ————————————————————————————————————————————
            ———	END phr Content
            —————————————————————————————————————————————— -->
@endsection

@section('after-scripts')
    <script>
        $("#taken-datetime").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            changeMonth: true,
            changeYear:true,
            orientation: 'bottom',
            defaultDate: new Date(),
            maxDate: new Date(),
            clearBtn: true
        });
    </script>

@endsection
