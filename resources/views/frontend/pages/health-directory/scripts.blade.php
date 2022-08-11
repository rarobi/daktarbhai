
@section('health-directory-jquery')
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
@endsection

@section('before-scripts-end')
    <script>
        /*if value null added disabled attribute*/

        $('option[value=""]').attr("disabled", "disabled");

        /*Nice select Active*/
        $('select').niceSelect();

        /*typed js for search districts*/
        $(function(){
            var substringMatcher = function(strs) {
                return function findMatches(q, cb) {
                    var matches, substrRegex;


                    // an array that will be populated with substring matches
                    matches = [];

                    // regex used to determine if a string contains the substring `q`
                    substrRegex = new RegExp(q, 'i');

                    // iterate through the pool of strings and for any string that
                    // contains the substring `q`, add it to the `matches` array
                    $.each(strs, function(i, str) {

                        if (substrRegex.test(str.name)) {

                            // the typeahead jQuery plugin expects suggestions to a
                            // JavaScript object, refer to typeahead docs for more info
                            matches.push({ value: str.name, id:str.id, type:str.type  });
                        }
                    });

                    cb(matches);
                };
            };


            var districts = JSON.parse('{!! $districts !!}');
            console.log(districts);

            $('.typeahead').typeahead({
                    hint: true,
                    highlight: true,
                    minLength: 0
                },
                {
                    name: 'Districts',
                    displayKey: 'value',
                    source: substringMatcher(districts),
                    limit: 40,
                    templates: {
//                        header: '<h3 class="league-name">Districts</h3>'
                    }
                });
            $('.typeahead').on( 'focus', function() {
                if($(this).val() === '') // you can also check for minLength
                    $(this).data().ttTypeahead.input.trigger('queryChanged', '');
            });

            $('#scrollable-dropdown-menu .typeahead').bind('typeahead:select', function(ev, suggestion) {
                if(suggestion.type == 'spt') {
                    $('#typeSelecctedVal').val(suggestion.id);

                } else {
                    $('#typeSelecctedVal').prop('disabled', true);

                }

            });
        });
    </script>

    <script>
        $(function(){
            if(navigator.userAgent.match(/(iPhone|Android.*Mobile)/i))
            {
                $('a[data-tel]').each(function(){
                    $(this).prop('href', 'tel:' + $(this).data('tel'));
                });
            }
        })
    </script>



    <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyCfqf3jfD6CGO3Ormy168g7fwMBJlKMrM4"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
    <link href="//ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/blitzer/jquery-ui.css"
          rel="stylesheet" type="text/css" />

    <script type="text/javascript">
        $(function () {
            $(".btnShow").click(function () {
                var name = $(this).data('title');
                var latitude = $(this).data('latitude');
                var longitude = $(this).data('longitude');
                $("#dialog").dialog({
                    modal: true,
                    title: name,
                    width: 620,
                    hright: 500,
                    buttons: {
                        Close: function () {
                            $(this).dialog('close');
                        }
                    },
                    open: function () {
                        var myLatLng = new google.maps.LatLng(latitude, longitude);
                        var mapOptions = {
                            center: myLatLng,
                            zoom: 14,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        };

                        var map = new google.maps.Map($("#dvMap")[0], mapOptions);
                        var marker = new google.maps.Marker({
                            position: myLatLng,
                            map: map,
                            title: name,
                            icon: '//maps.google.com/mapfiles/ms/icons/green-dot.png',
                        });
                    }
                });
            });
        });
</script>

<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->





@endsection