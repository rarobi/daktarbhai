@extends('frontend.layouts.theme.master')

@section('after-styles')
    {{--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">--}}
    <link rel="stylesheet" href="{!! asset('assets/css/datepicker.css') !!}">
@endsection

@section('page-header-class', 'header-static')

@section('content')
    <div id="home-wrap" class="content-section fullpage-wrap row white">


        <!-- ————————————————————————————————————————————
        ———	specialist Hospitals search here
        —————————————————————————————————————————————— -->
        <section id="profile" class="page padding-bottom-null">

            <div class="row text no-margin">
                <div class="col-md-12 bhoechie-tab-container">
                    <div class="col-md-3 col-sm-3 col-xs-4 bhoechie-tab-menu">
                        <div class="list-group">
                            <a href="#" class="list-group-item @if(!(session('password') || isset($activeAppointment) || isset($activeDiscount) || isset($activeQuestion))) active @endif text-center">
                                <h4>Profile Update</h4>
                            </a>
                            <a href="#" class="list-group-item @if((session('password'))) active @endif text-center">
                                <h4>Change Password</h4>
                            </a>
                            <a href="#" class="list-group-item @if(isset($activeAppointment))  active @endif text-center">
                                <h4>Book Appoinment History</h4>
                            </a>
                            <a href="#" class="list-group-item @if(isset($activeDiscount))  active @endif text-center">
                                <h4>Discount History</h4>
                            </a>
                            <a href="#" class="list-group-item @if(isset($activeQuestion))  active @endif text-center">
                                <h4>My Questions</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8 bhoechie-tab">
                        <!-- ————————————————————————————————————————————
                        ———	Profile Update start here
                        —————————————————————————————————————————————— -->
                        <!--  -->
                        @if(session('success'))
                            <p class="success" style="position: absolute; top: 8px;left: 73px;"> {!! session('success') !!}</p>
                        @endif
                        @if(session('error') )
                            <p class="error" style="position: absolute; top: 8px;left: 73px;"> {!! session('error')  !!} </p>
                        @endif
                        <div class="bhoechie-tab-content @if(!(session('password') || isset($activeAppointment) || isset($activeDiscount) || isset($activeQuestion))) active @endif">
                            <div class="profile-update">
                                <div class="login-form">
                                    {!! Form::model($user, ['route' => ['frontend.update-profile'], 'method' => 'POST','class' =>'form-horizontal login', 'data-parsley-validate']) !!}
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                {{ Form::text('name', old('name'), [ 'placeholder' => 'Name','id' => 'name','class' =>'form-control form-field', 'required' => 'required',
                                                                                     'data-parsley-required-message' => ' Name is required',
                                                                                     'data-parsley-trigger'          => 'change focusout',
                                                                                     'data-parsley-minlength'        => '2',
                                                                                     'data-parsley-maxlength'        => '32']) }}
                                                @if ($errors->has('name'))
                                                    <span class="error-text filled">{!! $errors->first('name') !!}  </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                {{ Form::text('email', old('email'), [ 'placeholder' => 'E-mail Address','id' => 'email','class' =>'form-control form-field', 'readonly' => 'readonly']) }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                {{ Form::select('gender', ['' => 'select a  gender','male' => 'Male','female' => 'Female'] , old('gender'),
                                                    ['class' => 'form-control form-field']) }}
                                                @if ($errors->has('gender'))
                                                    <span class="error-text filled">{!! $errors->first('gender') !!}  </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input placeholder="Mobile" name="phone" id="phone"  class="form-control form-field" type="phone" value="{!! $user->mobile or '' !!}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                {{ Form::select('division_name', ['' => 'Select City','Dhaka' => 'Dhaka','Chittagong' => 'Chittagong','Barisal' => 'Barisal','Khulna' => 'Khulna','Rajshahi' => 'Rajshahi','Sylhet' => 'Sylhet'] , old('division_name'),
                                                ['class' => 'form-control form-field']) }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                {{ Form::select('blood_group', ['' => 'Select blood group','O+' => 'O+','A+' => 'A+','B+' => 'B+','AB+' => 'AB+','O-' => 'O-','A-' => 'A-','B-' => 'B-','AB-' => 'AB-','other' => 'other'] , old('blood_group'),
                                                ['class' => 'form-control form-field']) }}
                                                @if ($errors->has('blood_group'))
                                                    <span class="error-text filled">{!! $errors->first('blood_group') !!}  </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group profile-date">
                                            <div class="col-md-12">
                                                <input type="text"  placeholder="Date of Barth" id="datepicker1" value="{!! $user->date_of_birth or '' !!}" class="form-control form-field ">
                                                <input class="birthDate" type="hidden" name="date_of_birth" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input  class="login-btn" value="Update Profile" type="submit">
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        <!-- ————————————————————————————————————————————
                        ———	Change Password start here
                        —————————————————————————————————————————————— -->
                        <div class="bhoechie-tab-content @if((session('password'))) active @endif">
                            <div class="profile-update">
                                <div class="login-form">
                                    {!! Form::model($user, ['route' => ['frontend.change-password'], 'method' => 'POST','class' =>'form-horizontal login', 'data-parsley-validate']) !!}
                                   {{-- <form  method="{!! route('frontend.change-password') !!}"  action="post" class="form-horizontal login">--}}
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                {!! Form::password('current_password', ['placeholder' => 'Current Password',  'class' => 'form-control form-field',
                                                                                        'required' => 'required', 'data-parsley-required-message' => 'Current Password is required',
                                                                                        'data-parsley-trigger'  => 'change focusout']) !!}
                                                @if ($errors->has('current_password'))
                                                    <span class="error-text filled">{!! $errors->first('current_password') !!}  </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                {!! Form::password('new_password', ['placeholder' => 'New Password',  'id' => 'newpassword', 'class' => 'form-control form-field',
                                                                                    'required' => 'required', 'data-parsley-required-message' => 'New Password is required',
                                                                                    'data-parsley-trigger'          => 'change focusout',
                                                                                    'data-parsley-minlength'        => '6',
                                                                                    'data-parsley-maxlength'        => '20']) !!}
                                                @if ($errors->has('new_password'))
                                                    <span class="error-text filled">{!! $errors->first('new_password') !!}  </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                {!! Form::password('confirm_password', ['placeholder' => 'Confirm Password',  'id' => 'confirm_password', 'class' => 'form-control form-field',
                                                                                        'required' => 'required', 'data-parsley-required-message' => 'Password confirmation is required',
                                                                                        'data-parsley-trigger'          => 'change focusout',
                                                                                        'data-parsley-equalto'          => '#newpassword',
                                                                                        'data-parsley-equalto-message'  => 'Not same as Password']) !!}
                                                @if ($errors->has('confirm_password'))
                                                    <span class="error-text filled">{!! $errors->first('confirm_password') !!}  </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input  class="login-btn" value="Update Password" type="submit">
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                    {{--</form>--}}
                                </div>
                            </div>

                        </div>
                        <!-- ————————————————————————————————————————————
                                    ———	Book Appointment History start here
                                    —————————————————————————————————————————————— -->
                        <div class="bhoechie-tab-content @if(isset($activeAppointment))  active @endif">
                            <div class="appoinment-history">
                                @if(isset($appointments) && $appointments != null)
                                @foreach($appointments as $appointment)
                                <div class="doc-single">
                                    <div class="appoinment-top">
                                        <div class="col-md-10">
                                            <p class="margin-null">Appointment-ID :{{ $appointment->appointment_id }} </p>
                                        </div>
                                        @if($appointment->booking_status == 'Approved')
                                        <div class="col-md-2">
                                            <span class="confirm"><i class="ion-checkmark-round"></i> {{ $appointment->booking_status or '' }}</span>
                                        </div>
                                        @else
                                        <div class="col-md-2">
                                            <span class="pending"><i class="ion-checkmark-round"></i> {{ $appointment->booking_status or '' }}</span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2 padding-null">
                                            <div class="doc-images">
                                                <a href="#"><img src="{{ (isset($appointment) && $appointment->doctor->image !=null) ? url('/').$appointment->doctor->image : asset('assets/img/doctor-grey.png') }}" class="img-responsive img-center"></a>
                                            </div>
                                        </div>
                                        <div class="col-md-7 padding-sm">
                                            <a href="#"><h4>{{ (isset($appointment->doctor->name))? $appointment->doctor->name : 'DAKTARBHAI'  }}</h4></a>
                                            <p class="designation margin-bottom-extrasmall">BDS Consultant, Prime General Hospital</p>
                                            <div class="address-wrap">
                                                <div class="address-left">
                                                    <p class="location margin-null"><i class="ion-ios-location-outline"></i> <span>Chamber</span><br>
                                                       {{ isset($appointment->onChamber->chamber_name) ? $appointment->onChamber->chamber_name : 'DAKTARBHAI PANEL HOSPITAL' }}, {{ isset($appointment->onChamber->chamber_address) ? $appointment->onChamber->chamber_address : 'DAKTARBHAI PANEL HOSPITAL' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 padding-null">
                                            <div class="appoinment-date">
                                                <p class="margin-bottom-null">Appointment Date</p>
                                                <h6>{{ $appointment->booking_date }} {{ $appointment->booking_time }}</h6>
                                            </div>
                                            @if($appointment->booking_status == 'Pending')
                                            <!-- <a href="#" class="btn-alt small active doc-btn"><i class="ion-close"></i>Cancel</a> -->
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                                @if(isset($appointmentPaginator) && !($appointmentPaginator->total_pages == 1 || $appointmentPaginator->total_pages == 0))
                                    <ul class="pagination">
                                        @if($appointmentPaginator->current_page > 9)
                                            <li><a href="{!! route('frontend.pagination.profile', ['terms' => $appointmentN,'page' =>$appointmentPaginator->current_page-8 ]) !!}"> << </a></li>
                                        @endif
                                        @if($appointmentPaginator->previous_page_url != null)
                                        <li><a href="{!! route('frontend.pagination.profile', ['terms' => $appointmentN ,'page' => $appointmentPaginator->current_page-1 ]) !!}"><i class="ion-ios-arrow-left"></i> Previous</a></li>
                                        @endif
                                        @for($i = 1; $i <= $appointmentPaginator->total_pages; $i++)
                                            <li><a @if($i == $appointmentPaginator->current_page) class="bg-brand-color" @endif href="{!! route('frontend.pagination.profile', ['terms' => $appointmentN ,'page' => $i ]) !!}">{!! $i!!}</a></li>
                                        @endfor
                                        @if($appointmentPaginator->next_page_url != null)
                                            <li><a href="{!! route('frontend.pagination.profile', ['terms' => $appointmentN ,'page' => $appointmentPaginator->current_page+1 ]) !!}"><i class="ion-ios-arrow-right"></i> Next</a></li>
                                        @endif
                                        @if($appointmentPaginator->current_page < $appointmentPaginator->total_pages-9 )
                                            <li><a href="{!! route('frontend.pagination.profile', ['terms' => $appointmentN,'page' =>$appointmentPaginator->current_page+8 ]) !!}"> >> </a><li>
                                        @endif
                                    </ul>
                                    @endif
                                    @else
                                    <p>There is no appointment</p>
                                @endif
                            </div>

                        </div>
                        <!-- ————————————————————————————————————————————
                                    ———	Discount History start here
                                    —————————————————————————————————————————————— -->
                        <div class="bhoechie-tab-content @if(isset($activeDiscount)) active @endif">
                            <div class="user-discount-area">
                                @if(isset($mydiscounts) && $mydiscounts != null)
                            @foreach($mydiscounts as $mydiscount)
                                @if(isset($mydiscount->provider) && $mydiscount->provider != null)
                            <div class="discount-history">
                                <h5>{{ $mydiscount->provider->name }}</h5>
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th>Avail Date</th>
                                        <th>Discount Code</th>
                                        <th>Services Name</th>
                                        <th>Discount Price</th>
                                    </tr>
                                    @foreach($mydiscount->provider->services as $service)
                                    <tr class="grey-bg">
                                        <td>{{ $mydiscount->discount_avail_date }}</td>
                                        <td>{{ $mydiscount->discount_code or '' }}</td>
                                        <td>{{ $service->service_name or '' }}</td>
                                        <td>{{ $service->discount or '' }}</td>
                                    </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                                @endif
                                @endforeach
                                @if(isset($discountPaginator) && !($discountPaginator->total_pages == 1 || $discountPaginator->total_pages == 0))
                                    <ul class="pagination">
                                        @if($discountPaginator->current_page > 9)
                                            <li><a href="{!! route('frontend.pagination.profile', ['terms' => $discountN,'page' =>$discountPaginator->current_page-8 ]) !!}"> << </a></li>
                                        @endif
                                        @if($discountPaginator->previous_page_url != null)
                                            <li><a href="{!! route('frontend.pagination.profile', ['terms' => $discountN ,'page' => $discountPaginator->current_page-1 ]) !!}"><i class="ion-ios-arrow-left"></i> Previous</a></li>
                                        @endif
                                        @for($i = 1; $i <= $discountPaginator->total_pages; $i++)
                                            <li><a @if($i == $discountPaginator->current_page) class="bg-brand-color" @endif href="{!! route('frontend.pagination.profile', ['terms' => $discountN ,'page' => $i ]) !!}">{!! $i!!}</a></li>
                                        @endfor
                                        @if($discountPaginator->next_page_url != null)
                                            <li><a href="{!! route('frontend.pagination.profile', ['terms' => $discountN ,'page' => $discountPaginator->current_page+1 ]) !!}"><i class="ion-ios-arrow-right"></i> Next</a></li>
                                        @endif
                                        @if($discountPaginator->current_page < $discountPaginator->total_pages-9 )
                                            <li><a href="{!! route('frontend.pagination.profile', ['terms' => $discountN,'page' =>$discountPaginator->current_page+8 ]) !!}"> >> </a><li>
                                        @endif
                                    </ul>
                                @endif
                                    @else
                                    <p>there is no discounts</p>
                                @endif
                            </div>
                        </div>
                        <!-- ————————————————————————————————————————————
                                   ———	My Questions start here
                                   —————————————————————————————————————————————— -->
                        <div class="bhoechie-tab-content @if(isset($activeQuestion)) active @endif">
                            <div class="my-questions">
                                @if(isset($myQuestions) && $myQuestions != null)
                                @foreach($myQuestions as $myQuestion)
                                <div class="panel panel-default">
                                    <div class="panel-heading border-none">
                                        <h4 class="panel-title">
                                            <a href="{!! route('frontend.question.show', $myQuestion->id) !!}" class="questions">
                                                <h4 class="questions-title">{{ $myQuestion->description or '' }}
                                                </h4>
                                            </a>
                                        </h4>
                                        <div class="ques-meta">
                                            <div class="col-md-3"><p><span class="date"></span>{!! $myQuestion->published_at or '' !!}</p></div>
                                            <div class="col-md-4">@foreach(array_slice($myQuestion->topics, 0, 1) as $topic)<a href="{!! route("frontend.question.topics", $topic->id) !!}" class="tag"><p>{!! $topic->title !!}</p></a>@endforeach</div>
                                            <div class="col-md-3"><a href="{!! route('frontend.question.show', $myQuestion->id) !!}" class="doc-ans"><p>Answers ({!! $myQuestion->_info->total_answer !!})</p></a></div>
                                            <div class="col-md-2">{{ $myQuestion->publish_status }}</div>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                                    @if(isset($questionPaginator) && !($questionPaginator->total_pages == 1 || $questionPaginator->total_pages == 0))
                                        <ul class="pagination">
                                            @if($questionPaginator->current_page > 9)
                                                <li><a href="{!! route('frontend.pagination.profile', ['terms' => $questionN,'page' =>$questionPaginator->current_page-8 ]) !!}"> << </a></li>
                                            @endif
                                            @if($questionPaginator->previous_page_url != null)
                                                <li><a href="{!! route('frontend.pagination.profile', ['terms' => $questionN ,'page' => $questionPaginator->current_page-1 ]) !!}"><i class="ion-ios-arrow-left"></i> Previous</a></li>
                                            @endif
                                            @for($i = 1; $i <= $questionPaginator->total_pages; $i++)
                                                <li><a @if($i == $questionPaginator->current_page) class="bg-brand-color" @endif href="{!! route('frontend.pagination.profile', ['terms' => $questionN ,'page' => $i ]) !!}">{!! $i!!}</a></li>
                                            @endfor
                                            @if($questionPaginator->next_page_url != null)
                                                <li><a href="{!! route('frontend.pagination.profile', ['terms' => $questionN ,'page' => $questionPaginator->current_page+1 ]) !!}"><i class="ion-ios-arrow-right"></i> Next</a></li>
                                            @endif
                                            @if($questionPaginator->current_page < $questionPaginator->total_pages-9 )
                                                <li><a href="{!! route('frontend.pagination.profile', ['terms' => $questionN,'page' =>$questionPaginator->current_page+8 ]) !!}"> >> </a><li>
                                            @endif
                                        </ul>
                                    @endif
                                    @else
                                    <p>there is no questions</p>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
@section('after-scripts')
    {{--<script src="{!! asset('assets/js/bootstrap-datepicker.js') !!}"></script>--}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(function() {
            $("#datepicker1").datepicker({
                format: 'yyyy-mm-dd',
                endDate: 'now',
                autoclose: true
            });
        });
        $("#datepicker1").on("change",function(){
            var $me = $(this),
                    $selected = $me.val(),
                    $parent = $me.parents('#datepicker1');
            $('.birthDate').val($selected);
            // console.log($selected);

        });
    </script>

    <script>
        var password = document.getElementById("newpassword")
                , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
@endsection
