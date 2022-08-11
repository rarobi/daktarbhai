@extends('frontend.layouts.theme.master')

@section('before-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.material.min.css">
@endsection

@section('page-header-class', 'header-static')

@section('after-styles')
    <link rel="stylesheet" href="{!! asset('assets/css/phr.css?v=1.1') !!}">
    <style>
        /*.side-menu {*/
        /*    width: 80%;*/
        /*}*/

        .col-xs-10{
            position: initial!important;
        }

        .profile-img {
            position: absolute;
            height: 20px;
            top: 10px;
        }

        .profile-span{
            margin-right: 25px !important;
        }
    </style>
@endsection

@section('content')
    <!-- ————————————————————————————————————————————
            ———	Page Content
            —————————————————————————————————————————————— -->

    <div id="home-wrap" class="content-section fullpage-wrap row" style="background: linear-gradient(180deg, #F4F6F8 0%, #FFFFFF 100%);">
        <section class="page padding-bottom-null">
            <div class="row text no-margin">
                <div class="phr col-md-12 padding-leftright-null">
                    <!-- sidebar start here -->
                    <div class="col-lg-2 col-md-3">
                        <div class="side-menu">
                            <nav class="navbar navbar-default" role="navigation">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <!-- Main Menu -->
                                @include('frontend.layouts.theme.partials.sidebar')
                                <!-- /.navbar-collapse -->
                            </nav>
                        </div>
                    </div>

                    <div class="col-lg-10 col-md-9 padding-leftright-null">

                        <!-- Content start here -->
                        @if(Session::has('error'))
                            <div class="phr-alert alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>Error! </strong>
                                {!! session('error') !!}
                            </div>
                        @endif

                        @if(Session::has('success'))
                            <div class="phr-alert alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>Success! </strong>
                                {!! session('success') !!}
                            </div>
                        @endif

                        <!-- Main content -->
                        @yield('main-content')
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection

@section('before-scripts-end')
{{--    <script src="{!! asset('assets/js/bootstrap-datepicker.js') !!}"></script>--}}
    <script src="{!! asset('assets/plugins/datepicker/js/bootstrap-datepicker.js') !!}"></script>
    <script src='https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/1.10.15/js/dataTables.material.min.js'></script>
@endsection

@section('after-scripts')
    <script>
        $(document).ready(function() {
            $('#phr-datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                changeMonth: true,
                changeYear:true,
                orientation: 'bottom',
                defaultDate: new Date(),
                maxDate: new Date()
//            clearBtn: true
            });

            var actionColumn = parseInt('{!! isset($actionColumn) ? $actionColumn : '' !!}');
            var table = $('#example').DataTable( {
                columnDefs: [
                    {
                        targets: [ 0, 1, 2, 3],
                        className: 'mdl-data-table__cell--non-numeric'
                    },
                    { orderable: false, "targets": actionColumn }
                ]

            });
            table.order([0, 'desc']).draw();


            $("#show-more").click(function(){
                $("#more_options").toggle(100);
            });

            $(function() {
                $("#dateOfBirth").datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    changeMonth: true,
                    changeYear:true,
                    orientation: 'bottom',
                    defaultDate: new Date(),
                    maxDate: new Date()
//            clearBtn: true
                });
            });

            $("#dateOfBirth").on("change",function(){
                var $me = $(this),
                    $selected = $me.val(),
                    $parent = $me.parents('#dateOfBirth');
                $('.birthDate').val($selected);
            });
        });
    </script>
@endsection