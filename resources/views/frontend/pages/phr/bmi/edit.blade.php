@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'PHR - BMI | ' . app_name()  !!}
@endsection

@section('main-content')

    <!-- ————————————————————————————————————————————
            ———	Phr Content
            —————————————————————————————————————————————— -->
    <!-- Content start here -->
    @if(isset($phr))
  <div class="phr-background">
    <h3 class="phr-title"> {{__('phr.common.action.edit')}} </h3>

    <div class="phr-action">
        {{--<a href="{{ route('frontend.phr.create', $phr) }}"><i class="ion-compose"></i> Add</a>--}}
        <a href="{{ route('frontend.phr.index', $phr) }}"><i class="ion-ios-undo"></i> {{__('phr.common.return')}}</a>
    </div>

    <div class="bmi-create">
        {!! Form::model($list, ['route' => ['frontend.phr.update',  'bmi',  $list->id], 'method' => 'PUT']) !!}
        @include('frontend.pages.phr.bmi.form')
        {!! Form::close() !!}
    </div>
  </div>
    @endif
    <!-- ————————————————————————————————————————————
            ———	END phr Content
            —————————————————————————————————————————————— -->
@endsection

@push('after-scripts-end-stack')
<script>
$("#feet").css("display","none");
$('#feet input').removeAttr('required');
      $("#bmiheight").click(function(){
          if ($('select').val() == "cm") {
              $("#centimeter").show();
              $('#centimeter input').attr('required', 'required');
              $('#feet input').removeAttr('required');
              $("#feet").hide();
          }
          if ($('select').val() == "feet"){
              $("#centimeter").hide();
              $('#feet input').attr('required', 'required');
              $('#centimeter input').removeAttr('required');
              $("#feet").show();
          }
       });
</script>

@endpush
