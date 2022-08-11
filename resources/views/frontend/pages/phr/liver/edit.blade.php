@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'PHR - Liver Function | ' . app_name()  !!}
@endsection

@section('main-content')

    <!-- ————————————————————————————————————————————
            ———	Phr Content
            —————————————————————————————————————————————— -->
    <!-- Content start here -->
    @if(isset($phr))
    <div class="phr-background">
        <h3 class="phr-title"> {{__('phr.liver-function.edit_title')}}</h3>

        <div class="phr-action">
            {{--<a href="{{ route('frontend.phr.create', $phr) }}"><i class="ion-compose"></i> Add</a>--}}
            <a href="{{ route('frontend.phr.index', $phr) }}"><i class="ion-ios-undo"></i> {{__('phr.common.return')}}</a>
        </div>

        <div class="bmi-create">

            {!! Form::model($list, ['route' => ['frontend.phr.update',  $phr,  $list->id], 'method' => 'PUT']) !!}

            @include('frontend.pages.phr.'.$phr.'.form')

            {!! Form::close() !!}

        </div>
      </div>
    @endif
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
