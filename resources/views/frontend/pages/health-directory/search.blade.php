@section('after-styles')
    <link rel="stylesheet" href="{!! asset('assets/css/nice-select.min.css') !!}">
    <style>
        .district-box{
            /*-webkit-appearance: menulist-button;*/
            height: 50px;
        }

        .list {
            height: 300px;
            overflow-y: scroll !important;
        }

    </style>
@endsection
{{--{{dd($en_district)}}--}}
{!! Form::open(['route'=>'frontend.health_directory.search',  'class' => 'doctor-search-form', 'data-parsley-validate', 'method' => 'POST']) !!}
 <div class="row">
    <div class="col-md-5 search-form-left">
        {{--{!! dd($health_directories) !!}--}}
        <div class="form-group">
            {!! Form::select('health_directory', ['' => __('find_doctor.placeholder.you_looking')] + $health_directories,
                (isset($health_directory) && $health_directory != null) ? $health_directory : '',
                ['data-placeholder' => 'health_directory', 'class' => 'form-control location-search custom-select',
                'required' => 'required', 'data-parsley-required-message'  => 'Please select a health directories',
                 'data-parsley-errors-container' => '#health_directory_error']) !!}
        </div>
        <div id="health_directory_error">

        </div>
    </div>
    <div class="col-md-5 search-form-left">
        <div class="form-group">
            {{--<input  list="browsers" class="typeahead form-control"  type="text" name="district_name" value="{!! (isset($location) && $location != null) ? $location : '' !!}" placeholder="{{__('buttons.search_district')}} ..." >--}}
            {{--<input type="hidden" id="typeSelecctedVal">--}}

            {!! Form::select('district_name', ['' => __('find_doctor.placeholder.search_district')] + $district_list,
            (isset($district_list) && $district_list != null) ? '' : '',
             ['data-placeholder' => 'health_directory', 'class' => 'form-control district-box']) !!}

        </div>
    </div>
    <div class="col-md-2 search-form-left">
        {{--<input type="submit" class="f-button btn-alt small active margin-null" value="Search">--}}
        <input type="submit" class="f-button btn-alt small active margin-null" value="{{__('buttons.search')}}">
    </div>
 </div>
{!! Form::close() !!}
@section('before-scripts')
    <script src="{!! asset('assets/js/typeahead.bundle.js') !!}"></script>
    <script src="{!! asset('assets/js/jquery.nice-select.min.js')!!}"></script>
@endsection
