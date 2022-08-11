<script>
    $(function submitForm() {
        var form = $('#newsletter-form');
        var formMessages = $('#form-messages');
        $(form).submit(function(event) {
            event.preventDefault();
             /*grecaptcha.execute();*/

            var v = grecaptcha.getResponse();
            if(v.length != 0)
            {
                if ( $(this).parsley().isValid() ) {
                    var formData = $(form).serialize();

                    $.ajax({
                        type: 'POST',
                        url: $(form).attr('action'),
                        data: formData
                    }).done(function(response) {
                        console.log(response.success);
                        if(response.success == undefined){
                            $(formMessages).removeClass('success');
                            $(formMessages).addClass('error');
                            if (typeof response.error !== 'undefined') {
                                $(formMessages).html('<i class="ion-close-circled" data-pack="default" data-tags="delete, trash, kill, x"></i> ' +response.error);
                            } else {
                                $(formMessages).html('<i class="ion-close-circled" data-pack="default" data-tags="delete, trash, kill, x"></i> ' +'opps, some technical problem');
                            }


                        } else {
                            document.getElementById('email').value = "";
                            $(formMessages).removeClass('error');
                            $(formMessages).addClass('success');
                            $(formMessages).html('<i class="ion-checkmark-circled" data-pack="default" data-tags="complete, finished, success, on"></i> ' +response.success);
                        }
                    }).fail(function(data) {
                        $(formMessages).removeClass('success');
                        $(formMessages).addClass('error');
//                    $(formMessages).text('Oops! An error occured and your message could not be sent.');*/
                        var parsedJson = data.responseJSON;
                        var errorString = '';
                        $.each( parsedJson, function( key, value) {
                            errorString += '<li style="list-style: none;">' + value + '</li>';
                        });
                        $(formMessages).html(errorString);
                    });
                }
            }


        });


    });

</script>