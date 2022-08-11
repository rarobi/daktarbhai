@extends('frontend.layouts.theme.master')

@section('after-styles')
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
                    <div class="col-md-3 col-sm-3 col-xs-4 profile-tab-menu">
                        <div class="list-group">

                            <a href="{{ url('profile') }}" class="list-group-item {{ Active::pattern('profile') }} text-center" >
                                <h4>Profile</h4>
                            </a>
                            <a href="{{ url('profile/update') }}" class="list-group-item text-center {{ Active::pattern('profile/update') }}">
                                <h4>Profile Update</h4>
                            </a>
                            <a href="{{ url('profile/change-password') }}" class="list-group-item text-center {{ Active::pattern('profile/change-password') }}">
                                <h4>Change Password</h4>
                            </a>
                            <a href="{{ url('profile/appointment-history') }}" class="list-group-item text-center {{ Active::pattern('profile/appointment-history*') }}">
                                <h4>Book Appointment History</h4>
                            </a>
                            <a href="{{ url('profile/discount-history') }}" class="list-group-item text-center {{ Active::pattern('profile/discount-history*') }}">
                                <h4>Discount History</h4>
                            </a>
                            <a href="{{ url('profile/my-questions') }}" class="list-group-item text-center {{ Active::pattern('profile/my-questions*') }}">
                                <h4>My Questions</h4>
                            </a>
                            <a href="{{ url('profile/saved-bookmarks') }}" class="list-group-item text-center {{ Active::pattern('profile/my-questions*') }}">
                                <h4>Saved Bookmarks</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8 bhoechie-tab">
                        <!-- ————————————————————————————————————————————
                        ———	Profile Update start here
                        —————————————————————————————————————————————— -->
                        @yield('profile_content')
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
