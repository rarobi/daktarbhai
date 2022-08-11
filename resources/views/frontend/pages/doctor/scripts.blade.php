<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
        $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 2000,
            values: [ 0, 2000 ],
            slide: function( event, ui ) {
                $( "#amount" ).val( "TK-" + ui.values[ 0 ] + " - TK-" + ui.values[ 1 ] );
            }
        });
        $( "#amount" ).val( "TK-" + $( "#slider-range" ).slider( "values", 0 ) +
                " - TK-" + $( "#slider-range" ).slider( "values", 1 ) );

    } );
    $(document).ready(function() {
        $('select').niceSelect();
        var url      = window.location.href;
    });

</script>

<script>
    {{--$('.division-list').change(function() {--}}
        {{--var divisionName = $(this).val();--}}
        {{----}}
        {{--var URL = "{{ url('pages/district') }}" +'/'+ divisionName;--}}

        {{--$.ajax({--}}
            {{--type: "GET",--}}
            {{--url: URL,--}}
            {{--success: function(data) {--}}
                {{--console.log(data);--}}
                {{--var options = $(".district-list");--}}
                {{--options.empty();--}}

                {{--options.append('<option selected="selected" value="">Select a district</option>');--}}

                {{--$.each(data, function(key, value) {--}}
                    {{--options.append($("<option />").val(key).text(value));--}}
                {{--});--}}
                {{--options.niceSelect();--}}
                {{--options.eq(-1).remove();--}}
            {{--}--}}
        {{--});--}}

    {{--});--}}

    $(document).ready(function(){
        var divisionName = $('.division-list').find(":selected").val();
        if(divisionName != '') {
            divisionList(divisionName);
        }
        {{--$('.district-list').val('{!! $dist_name !!}').change();--}}
        {{--$(".district-list option[value='{!! $dist_name !!}']").attr('selected','selected');--}}



        });
    $('.division-list').change(function() {
        var divisionName = $(this).val();
        if(divisionName != '') {
            divisionList(divisionName);
        }

    });

    function divisionList(divisionName) {
        var URL = "{{ url('pages/district') }}" +'/'+ divisionName;
        $.ajax({
            type: "GET",
            url: URL,
            success: function(data) {
                var selected = '';
                var selectedDistrict    =   $.trim('@if(isset($dist_name)) {!! ($dist_name) !!}@else {!! '' !!}@endif');

                var options = $(".district-list");
                options.empty();

                @if(Lang::locale() == 'en')
                options.append('<option selected="selected" value="">Select a district</option>');
                @elseif(Lang::locale() == 'bn')
                options.append('<option selected="selected" value="">জেলা নির্বাচন করুন</option>');
                @endif


                $.each(data, function(key, value) {

                    options.append($("<option />").val(key).text(value));
                    if(key == selectedDistrict) {
                        console.log('ok');
                        selected    =   key;
                    }

                });

                options.niceSelect();
                options.eq(-1).remove();
                if(selected != ''){
                    options.val(selected).niceSelect('update');
                }


            }
        });
    }

//    check gender wise search
    var genderType= ['male','female','any'];

    $(".gender").change(function(){
        var selectedVal = $(this).val();
        var group = ":checkbox[name='"+ $(this).attr("name") + "']";
        if($(this).is(':checked')){
            $(group).not($(this)).attr("checked",false);
        }
        var qStr    =   '&gender=';
        setSearchUrl(selectedVal, qStr, genderType);
    });


    //check schedule avaibility
    var scheduleType= ['tomorrow','next_3_days','next_15_days'];

    $('.schedule').click(function() {
        var selectedVal = $(this).val();
        var group = ":checkbox[name='"+ $(this).attr("name") + "']";
        if($(this).is(':checked')){
            $(group).not($(this)).attr("checked",false);
        }
        var qStr    =   '&filter=';
        setSearchUrl(selectedVal, qStr, scheduleType);
    });

    //find location-area based
    function loadAreaList() {
//        var type=['today','nextthreeday'];
//        var regexp = new RegExp( type.join( '|' ), 'g' );

        var selectBox = document.getElementById("selectBox");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        var webUrl = '';
        var areaUrl      = window.location.href;
        var qrStr   = '&area=';
        //var areaUrl      = window.location.href+'&area='+selectedValue;

        if(areaUrl.indexOf(qrStr) != -1) {
            var docSUrl =   '';
            var pageRemoveUrl = '';
            docSUrl = areaUrl.replace(/([?|&]area=)[^\&]+/ , '$1' + selectedValue);
            if(areaUrl.indexOf('&page=') != -1) {
                pageRemoveUrl = docSUrl.substring(0, docSUrl.indexOf('&page'));
                webUrl  =   pageRemoveUrl;
            } else {
//                docSUrl = areaUrl.replace(/([?|&]area=)[^\&]+/ , '$1' + selectedValue);
                webUrl  = docSUrl;
            }
        } else {
            webUrl      = window.location.href+'&area='+selectedValue;
        }

        areaUrl = webUrl;
        window.location.href = areaUrl;
    }
</script>

<script>
    function setSearchUrl(selectedValue, qStr, allTypes) {

        var qryStr  =   qStr;
        var webUrl = '';
        var type = allTypes;
        var regexp = new RegExp( type.join( '|' ), 'g' );
        var url      = window.location.href;

        if(url.indexOf(qryStr) != -1) {
            var webUrl =   '';
            var pageRemoveUrl = '';
            webUrl = url.replace( regexp, selectedValue);

            if(url.indexOf('&page=') != -1) {
                pageRemoveUrl = webUrl.substring(0, webUrl.indexOf('&page'));
                webUrl  =   pageRemoveUrl;
            } else {
                webUrl  = webUrl;
            }
        }

        if(webUrl ==='') {
            var webUrl =   '';
            var pageRemoveUrl = '';
            webUrl      = window.location.href+qStr+selectedValue;

            if(url.indexOf('&page=') != -1) {
                pageRemoveUrl = webUrl.substring(0, webUrl.indexOf('&page'));
                webUrl  =   pageRemoveUrl;
            } else {
                webUrl  = webUrl;
            }
        }

        window.location.href = webUrl;
    }
</script>


{{--<script>--}}
    {{--// constructs the suggestion engine--}}
    {{--var spacial  =   ['bangladesh'];--}}
    {{--console.log(spacial);--}}
    {{--var states = new Bloodhound({--}}
        {{--datumTokenizer: Bloodhound.tokenizers.whitespace,--}}
        {{--queryTokenizer: Bloodhound.tokenizers.whitespace,--}}
        {{--// `states` is an array of state names defined in "The Basics"--}}
        {{--local: spacial--}}
    {{--});--}}

    {{--$('.typeahead').typeahead({--}}
                {{--hint: true,--}}
                {{--highlight: true,--}}
                {{--minLength: 1--}}
            {{--},--}}
            {{--{--}}
                {{--name: 'states',--}}
                {{--source: states--}}
            {{--});--}}
    {{--</script>--}}

{{--For Typeheadjs--}}
<script>
    $(function(){
        var substringMatcher = function(strs) {
            return function findMatches(q, cb) {
                var matches, substrRegex;
                //console.log(q);
                //console.log(cb);

                // an array that will be populated with substring matches
                matches = [];

                // regex used to determine if a string contains the substring `q`
                substrRegex = new RegExp(q, 'i');

                // iterate through the pool of strings and for any string that
                // contains the substring `q`, add it to the `matches` array
                $.each(strs, function(i, str) {

                    if (substrRegex.test(str.name)) {
                        console.log(str.name);
                        // the typeahead jQuery plugin expects suggestions to a
                        // JavaScript object, refer to typeahead docs for more info
                        matches.push({ value: str.name, id:str.id, type:str.type  });
                    }
                });

                cb(matches);
            };
        };

        var specialities = JSON.parse('{!! $search_specialities !!}');
        var doctors = JSON.parse('{!! $search_doctors !!}');

        $('.typeahead').typeahead({
                    hint: true,
                    highlight: true,
                    minLength: 0
                },
                {
                    name: 'specialities',
                    displayKey: 'value',
                    source: substringMatcher(specialities),
                    limit: 40,
                    templates: {
                        header: '<h3 class="league-name">Specialities</h3>'
                    }
                },
                {
                    name: 'doctors',
                    displayKey: 'value',
                    source: substringMatcher(doctors),
                    limit: 2,
                    templates: {
                        header: '<h3 class="league-name">Doctor Name</h3>'
                    }
                });
        $('.typeahead').on( 'focus', function() {
            if($(this).val() === '') // you can also check for minLength
                $(this).data().ttTypeahead.input.trigger('queryChanged', '');
        });

        $('#scrollable-dropdown-menu .typeahead').bind('typeahead:select', function(ev, suggestion) {
            if(suggestion.type == 'spt') {
                $('#typeSelecctedVal').val(suggestion.id);
//                $("#doctorName").prop('disabled', true);

            } else {
                $('#typeSelecctedVal').prop('disabled', true);

            }

        });
    });
</script>

<script type="text/javascript">
    $(window).load(function() {
        $(".loader").fadeOut("slow");
    })
</script>