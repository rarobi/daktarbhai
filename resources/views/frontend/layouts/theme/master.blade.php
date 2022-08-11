<!DOCTYPE html>
<html lang="en">
<head>
    <!-- google analytics script -->
    @include('frontend.layouts.theme.partials.ga-scripts')

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Daktarbhai">
    <meta name="_token" content="{{ csrf_token() }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ———————————————————————————————————————
    ———	Google Meta property start here
    ————————————————————————————————————————— -->
    <meta name="description" content="@yield('meta_description', trans('strings.frontend.web.description'))">
    <meta name="keywords" content="Book Appointment, Find Doctor, Find Hospital, Ask a Doctor, Health">

    @if(config("misc.web.app_env") != 'production')
        <meta name="robots" content="noindex, nofollow">
    @endif

    <!-- ———————————————————————————————————————
    ———	Facebook Meta property start here
    ————————————————————————————————————————— -->
    <meta property="fb:app_id" content="{!! config("misc.web.facebook_app_id") !!}" />

    <meta property="og:url" content="@yield('meta_og_url', url('/'))" />
    <meta property="og:type" content="@yield('meta_og_type', 'website')" />
    <meta property="og:title" content="@yield('meta_og_title', app_name())" />
    <meta property="og:description" content="@yield('meta_og_description', trans('strings.frontend.web.description'))" />
    <meta property="og:image" content="@yield('meta_og_image', asset('assets/img/login-logo.png'))" />

    <meta name="twitter:card" content="@yield('meta_og_description', trans('strings.frontend.web.description'))">

    <meta name="twitter:url" content="@yield('meta_og_url', url('/'))">

    <meta name="twitter:title" content="@yield('meta_og_title', app_name())">

    <meta name="twitter:description" content="@yield('meta_og_description', trans('strings.frontend.web.description'))">

    <meta name="twitter:image" content="@yield('meta_og_image', asset('assets/img/login-logo.png'))">

    <!--<meta http-equiv="Content-Security-Policy" content=" script-src 'self' https://www.googletagmanager.com https://www.google.com https://cdnjs.cloudflare.com https://connect.facebook.net  'unsafe-inline';
        img-src 'self' https://cdn-daktarbhai.sgp1.cdn.digitaloceanspaces.com https://www.facebook.com; connect-src https://api.healthsheba.com;">-->

     <!-- ————————————————————————————————————————————————————————————————————————————————————————————————————————
    ———	The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags
    ————————————————————————————————————————————————————————————————————————————————————————————————————————————— -->
    <title>@yield('title', app_name())</title>


    @include('frontend.layouts.theme.partials.stylesheets')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{!! asset('assets/img/favicon.png') !!}" type="image/x-icon"/>
    {{--<link rel="shortcut icon" href="../../../../../public/assets/img/favicon.png" type="image/x-icon"/>--}}

    @yield('header-scripts')

    <!-- Facebook pixel analytics script -->
    @include('frontend.layouts.theme.partials.fb-pixel-scripts')

</head>
<body>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '{!! config("misc.web.facebook_app_id") !!}',
            xfbml      : true,
            version    : 'v2.10'
        });
        FB.AppEvents.logPageView();
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!-- ————————————————————————————————————————————
———	Loder
—————————————————————————————————————————————— -->
{{--<div id="myloader">--}}
            {{--<span class="loader">--}}
                {{--<img src="{!! asset('assets/img/logo-loding.png') !!}" class="normal" alt="Daktarbhai">--}}
                {{--<img src="{!! asset('assets/img/logo-loding.png') !!}" class="retina" alt="Daktarbhai">--}}
            {{--</span>--}}
{{--</div>--}}
<!-- ————————————————————————————————————————————
———	Main Wrap
—————————————————————————————————————————————— -->
<div id="main-wrap">
    @include('frontend.layouts.theme.partials.header')
    <!-- ————————————————————————————————————————————
    ———	Page Content
    —————————————————————————————————————————————— -->
    <div id="page-content" class="@yield('page-header-class') footer-fixed">
        @if(isset($errors))
          {{-- @include('includes.partials.messages')--}}
            {{--<div id="errorMessageShow"></div>--}}
        @endif

        @yield('content')
    </div>
    <!-- ————————————————————————————————————————————————————————————
    ———	END Page Content, class footer-fixed if footer is fixed
    —————————————————————————————————————————————————————————————— -->

    @include('frontend.layouts.theme.partials.footer')
</div>
<!-- ————————————————————————————————————————————
———	END Main Wrap
—————————————————————————————————————————————— -->

@include('frontend.layouts.theme.partials.scripts')
@section('before-scripts-end')
    <script src="{!! asset('assets/plugins/datepicker/js/bootstrap-datepicker.js') !!}"></script>
@endsection

@section('after-scripts')

    <script>
        var SelectDate=$('#dateInput').val();

        $(document).ready(function()  {
            $( ".calendar" ).datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: '1',
                maxDate: '15',
                defaultDate: SelectDate
            });

            $(document).on('click', '.date-picker .input', function(e){
                var $me = $(this),
                        $parent = $me.parents('.date-picker');
                $parent.toggleClass('open');
            });


            $(".calendar").on("change",function(){
                var $me = $(this),
                        $selected = $me.val(),
                        $parent = $me.parents('.date-picker');
                $parent.find('.result').children('span').html($selected);
                $parent.find('#dateInput').val($selected);

            });
        });
    </script>
@endsection

</body>
</html>
