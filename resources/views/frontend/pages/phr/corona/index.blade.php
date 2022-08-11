@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'Covid vaccine | ' . app_name()  !!}
@endsection

@section('main-content')
    <div class="bhoechie-tab-content active">
        <div class="col-md-12">
            <div class="col-md-11">
                <h3 class="profile-title"> {{__('profile.corona.title')}}</h3>
            </div>
            <div class="col-md-1">
                @if(!$vaccine_list)
                <a href="{{ route('frontend.phr.corona.vaccine.create') }}" class="covid-add-btn" title="Create Vaccine"><i class="fa fa-plus-circle"></i> {{__('profile.corona.add_btn')}}</a>
                @endif
            </div>
        </div>
        <div class="my-prescription">
            <div class="row">
                @if($vaccine_list)
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="prescription-table table-responsive table table-sm table-bordered table-responsive table-center">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Vaccine Name</th>
                                    <th scope="col">First Vaccine Date</th>
                                    <th scope="col">Is first vaccine complete</th>
                                    <th scope="col">Second Vaccine Date</th>
                                    <th scope="col">Is second vaccine complete</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($vaccine_list as $vaccine)

                                    <tr>
                                        <td scope="col">{!! isset($vaccine->vaccine_name)?$vaccine->vaccine_name:'Not Provided' !!}</td>
                                        <td scope="col">{!! isset($vaccine->first_vaccine_date)? date('d F, Y', strtotime($vaccine->first_vaccine_date)):'Not Provided' !!}</td>
                                        <td scope="col" class="text-center">
                                            @if($vaccine->is_1st_vaccine_complete == 1)
                                                <span class="btn btn-success"> Yes</span>
                                            @else
                                                <span class="btn btn-danger"> No</span>
                                            @endif
                                        </td>
                                        <td scope="col">{!! isset($vaccine->second_vaccine_date)? date('d F, Y', strtotime($vaccine->second_vaccine_date)):'Not Provided' !!}</td>
                                        <td scope="col" class="text-center">
                                            @if($vaccine->is_2nd_vaccine_complete == 1)
                                                <span class="btn btn-success"> Yes</span>
                                            @else
                                                <span class="btn btn-danger"> No</span>
                                            @endif
                                        </td>
{{--                                        <td scope="col"><a class="btn-sm btn-info sample_details" href="{!! route('frontend.prescription.history.details', ['id'=> $vaccine->id]) !!}"> --}}
{{--                                                Details</a></td>--}}
                                        <td scope="col">
                                            <a class="btn-sm btn-info" href="{!! route('frontend.phr.corona.vaccine.edit', $vaccine->id) !!}">{{__('profile.corona.edit_btn')}}</a>
                                            <a class="btn-sm btn-danger vaccine_delete" href="{!! route('frontend.phr.corona.vaccine.delete', $vaccine->id) !!}">{{__('profile.corona.delete_btn')}}</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                @else
                    <div class="col-md-10 padding-right-null">
                        <div class="phr-create-img">
                            <img src="{!! asset('assets/img/phr/covid_vaccination.png') !!}" alt="">
                        </div>
                        <p class="text-center padding-sm create-new">
                            {{__('profile.corona.no_data')}}
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('after-scripts')
    <script>
        $('#viewRepost').click(function() {
            $('#repostDetails').css("display", "block");
        });


        //Destory vaccine info using sweet alert
{{--        $('.vaccine_delete').on('click', function (event) {--}}
{{--            event.preventDefault();--}}
{{--            let linkURL = $(this).attr("href");--}}
{{--            alert(linkURL);--}}
{{--            swal({--}}
{{--                title: "{{ trans('strings.backend.general.are_you_sure') }}",--}}
{{--                text: "Are you sure you want to discard this vaccine info?",--}}
{{--                type: "warning",--}}
{{--                showCancelButton: true,--}}
{{--                confirmButtonColor: "#DD6B55",--}}
{{--                confirmButtonText: "Yes!",--}}
{{--                cancelButtonText: "{{ trans('buttons.general.cancel') }}",--}}
{{--                closeOnConfirm: false--}}
{{--            }, function(isConfirmed) {--}}
{{--                if (isConfirmed) {--}}
{{--                    $.ajax({--}}
{{--                        type: "GET",--}}
{{--                        url: linkURL,--}}
{{--                        success: function(data) {--}}
{{--                            console.log(data);--}}
{{--                            return false;--}}
{{--                            swal("Submitted!", "Request has been discarded successfully.", "success");--}}
{{--                            window.location.href = "{{ route('frontend.phr.corona.vaccine') }}";--}}
{{--                        }--}}
{{--                    })--}}
{{--                } else {--}}
{{--                    swal("Cancelled", "Action Cancelled.", "error");--}}
{{--                }--}}
{{--            });--}}

{{--        });--}}
    </script>
@endsection
