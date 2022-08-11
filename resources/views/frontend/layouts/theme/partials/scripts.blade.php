<!-- ————————————————————————————————————————————
———	All js library
—————————————————————————————————————————————— -->
<script src="{!! asset('assets/js/jquery.min.js') !!}"></script>
@yield('health-directory-jquery')

@yield('before-scripts')
<script src="{!! asset('assets/js/bootstrap/bootstrap.min.js') !!}"></script>
<!-- <script src="{!! asset('assets/js/jquery.flexslider-min.js') !!}"></script> -->
<script src="{!! asset('assets/js/jquery.fullPage.min.js') !!}"></script>
<script src="{!! asset('assets/js/owl.carousel.min.js') !!}"></script>
<script src="{!! asset('assets/js/isotope.min.js') !!}"></script>
<script src="{!! asset('assets/js/jquery.magnific-popup.min.js') !!}"></script>
<script src="{!! asset('assets/js/jquery.scrollTo.min.js') !!}"></script>
<script src="{!! asset('assets/js/smooth.scroll.min.js') !!}"></script>
<script src="{!! asset('assets/js/jquery.appear.js') !!}"></script>
<!-- <script src="{!! asset('assets/js/jquery.countTo.js') !!}"></script> -->
<script src="{!! asset('assets/js/jquery.scrolly.js') !!}"></script>
<script src="{!! asset('assets/js/plugins-scroll.js') !!}"></script>
<script src="{!! asset('assets/js/imagesloaded.min.js') !!}"></script>

<!-- <script src="{!! asset('assets/js/typeahead.bundle.js') !!}"></script> -->
<script src="{!! asset('assets/js/pace.min.js') !!}"></script>
<!-- <script src="{!! asset('assets/js/jquery.nice-select.min.js') !!}"></script> -->
<!-- <script src='//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.3/sweetalert2.all.min.js"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.3/sweetalert2.all.min.js" integrity="sha384-xGlesFaOV9SBjfFFwXA1qnMxVlNSC45yjlo5GfVaIOwuUaxFgaRdwUkMnr9gvw9k" crossorigin="anonymous"></script>--}}

{{--<script src="{!! asset('assets/plugins/datepicker/js/bootstrap-datepicker.js') !!}"></script>--}}
{{--<script src="{!! asset('assets/plugins/datepicker/js/bootstrap-datepicker.js') !!}"></script>--}}
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>--}}
@yield('before-scripts-end')

<script src="{!! asset('assets/js/main.js') !!}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        /**
         * Place the CSRF token as a header on all pages for access in AJAX requests
         */
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.menu-icon').click(function() {
            $('.display_advance').toggle('1000');
            $(this).toggleClass("fa fa-bars fa fa-times");

        });

        $('.lang-en-btn').click(function() {
            var lang = $(this).val();
            var URL = "{{ url('/lang/') }}" +'/'+ lang;


            $.ajax({
                type: "GET",
                url: URL,
                success: function(data) {
                    location.reload();
                }
            });
        });

        $('.lang-bn-btn').click(function() {
            var lang = $(this).val();
            var URL = "{{ url('/lang/') }}" +'/'+ lang;

            $.ajax({
                type: "GET",
                url: URL,
                success: function(data) {
                    location.reload();
                }
            });
        });

    });

    window.ParsleyConfig = {
        errorsWrapper: '<div></div>',
        errorTemplate: '<span class="error-text"></span>',
        classHandler: function (el) {
            return el.$element.closest('input');
        },
        successClass: 'valid',
        errorClass: 'invalid'
    };
</script>

<script src="//cdnjs.cloudflare.com/ajax/libs/parsley.js/2.7.0/parsley.min.js"></script>

@yield('after-scripts')

<script>
    function recaptchaCallback() {
        var form = $('.form-contact');
        $(form).unbind('submit').submit();
    }
    $(function () {
        var form = $('.form-contact');
        $(form).submit(function(event) {
            event.preventDefault();
            grecaptcha.execute();
        });
    });


</script>

<script>
    function newsletterCallback() {
        var form = $('#form-contact');
        $(form).unbind('submit').submit();
    }
    $(function () {

        var form = $('#form-contact');
        $(form).submit(function(event) {
            event.preventDefault();
            var widget1 = grecaptcha.render(
                    'recaptcha1',{
                        'sitekey' :'{!! config("misc.web.google_recapcha_sitekey") !!}',
                        'theme': 'light',
                        'callback' : newsletterCallback
                    }

            );
            grecaptcha.execute(widget1);
        });
    });
</script>

<script src="//www.google.com/recaptcha/api.js" async defer></script>
@include('frontend.layouts.theme.partials.newsletter-scripts')

{{-- Find and replace broken image link with a placeholder image--}}
<script>
    $('img').error(function(){
         $(this).attr('src', '{!! asset("assets/img/missing-image.jpg") !!}');
    });
</script>

<script src="{{ asset('js/custom.js') }}"></script>

@stack('after-scripts-end-stack')
