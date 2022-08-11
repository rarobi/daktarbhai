@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'PHR - BP | ' . app_name()  !!}
@endsection

@section('main-content')

    <!-- ————————————————————————————————————————————
            ———	Phr Content
            —————————————————————————————————————————————— -->
    <!-- Content start here -->
  <div class="phr-background">
    <h3 class="phr-title"> {{__('phr.bp.create_title')}} </h3>
    <div class="phr-action">
        <a href="{{ route('frontend.phr.index', $phr) }}"><i class="ion-ios-undo"></i> {{__('phr.common.return')}}</a>
    </div>

    <div class="bmi-create">
        {!! Form::open(['route' => ['frontend.phr.store', 'bp'], 'method' => 'POST']) !!}
        @include('frontend.pages.phr.bp.form')
        {!! Form::close() !!}
    </div>
  </div>
    <!-- ————————————————————————————————————————————
            ———	END phr Content
            —————————————————————————————————————————————— -->
@endsection
