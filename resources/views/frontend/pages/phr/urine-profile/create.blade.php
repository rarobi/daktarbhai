@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'PHR - Urine Profile | ' . app_name()  !!}
@endsection

@section('main-content')

    <!-- ————————————————————————————————————————————
    ———	Phr Content
    —————————————————————————————————————————————— -->
    <!-- Content start here -->
  <div class="phr-background">
    <h3 class="phr-title">{{__('phr.urine-profile.create_title')}}</h3>

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
        $("#taken_datetime").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            changeMonth: true,
            changeYear:true,
            orientation: 'bottom',
            defaultDate: new Date(),
            maxDate: new Date(),
            clearBtn: true
        });

        function disableEpithelialCell() {
            var elements = document.getElementsByClassName("epithelial_cell");
            document.getElementById("epithelial_cell_status").checked ? doIt(elements, true) : doIt(elements, false);
            $('#epithelial_cell_min').val('');
            $('#epithelial_cell_max').val('');
        }

        function disablePusCell() {
            var elements = document.getElementsByClassName("pus_cell");
            document.getElementById("pus_cell_status").checked ? doIt(elements, true) : doIt(elements, false);
            $('#pus_cell_min').val('');
            $('#pus_cell_max').val('');
        }

        function doIt(elements, status) {
            for (var i = 0; i < elements.length; i++) {
                elements[i].disabled = status;
            }
        }
    </script>

@endsection

