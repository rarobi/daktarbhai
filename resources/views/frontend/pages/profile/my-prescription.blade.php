@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'My Prescription | ' . app_name()  !!}
@endsection

@section('main-content')
    <div class="bhoechie-tab-content active">
        <h3 class="profile-title"> {{__('profile.prescription.title')}}</h3>
        <div class="my-prescription">
            <div class="row">
        @if($myPrescriptions)
                      <div class="col-md-12">
                        <div class="table-responsive">

                              <table class="prescription-table table-responsive table table-sm table-bordered table-responsive table-center">
                                  <thead class="thead-light">
                                  <tr>
                                      <!-- <th scope="col">Patient Name</th> -->
                                      <th scope="col">Doctor Name</th>
                                      <th scope="col">Prescription Code</th>
                                      <th scope="col">Prescription Date</th>
                                      <th scope="col">Action</th>
                                  </tr>
                                  </thead>
                                      <tbody>
                                         @foreach($myPrescriptions as $myPrescription)
                                      <tr>
                                          <!-- <td scope="col">{!! isset($myPrescription->patient_name)?$myPrescription->patient_name:'Not Provided' !!}</td> -->
                                          <td scope="col">{!! isset($myPrescription->practitioner_name)?$myPrescription->practitioner_name:'Not Provided' !!}</td>
                                          <td scope="col">{!! isset($myPrescription->prescription_code)?$myPrescription->prescription_code:'Not Provided' !!}</td>
                                          <td scope="col">{!! isset($myPrescription->prescription_date)? date('d F, Y', strtotime($myPrescription->prescription_date)):'Not Provided' !!}</td>
                                          <td scope="col"><a class="btn-sm btn-info sample_details" href="{!! route('frontend.prescription.history.details', ['id'=> $myPrescription->id]) !!}"> <i class="fa fa-external-link" aria-hidden="true"></i>
Details</a></td>
                                      </tr>
                                       @endforeach
                                      </tbody>
                              </table>

                        </div>
                      </div>
         @else
         <div class="col-md-10 padding-right-null">
            <div class="phr-create-img">
{{--              <img src="{!! asset('assets/img/prescription.png') !!}" alt="">--}}
                <img src="{!! asset('assets/img/phr/no-data.png') !!}" alt="">

            </div>
            <p class="text-center padding-sm create-new">
                {{__('profile.prescription.msg.any_prescription')}}
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
    </script>
@endsection
