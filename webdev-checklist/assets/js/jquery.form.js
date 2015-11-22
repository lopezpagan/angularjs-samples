(function($){
    
    "use strict";
    
    $(window).load(function() {
        
    
    /* ==============================================
        Contact Form
        =============================================== */

        var contactForm = $('.main-form');
        
        contactForm.on('submit', function() {
            var requiredFields = $(this).find('.required'), 
                noRequiredFields = $(this).find('.no-required'),
                formData = contactForm.serialize(),
                formAction = $(this).attr('action');

            requiredFields.each(function() {
                var $this = $(this);
                if( $this.val() == "" ) {
                    $this.addClass('input-error');
                } else {
                    $this.removeClass('input-error');
                }
            });

            noRequiredFields.each(function() {
                var $this = $(this);
                if( $this.val() == "" ) {
                    //$this.addClass('input-error');
                } else {
                    $this.removeClass('input-error');
                }
            });

            
            function validateEmail(email) { 
                var exp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return exp.test(email);
            }

            var emailField = $('.form-email');
            if( !validateEmail(emailField.val()) ) {
                emailField.addClass("input-error");
            }

            if ($(".main-form :input").hasClass("input-error")) {
                return false;
            } else {
                
                if ( $('input:checkbox').is(':checked') ) {
                    $.post(formAction, formData, function(data) {
                        requiredFields.val("");
                        noRequiredFields.val("");
                        $('input:checkbox').removeAttr('checked');

                        if (data == "success") { 
                            
                            $('#thanks-screen').removeClass("hideScreen");
                            $('#thanks-screen').addClass("showScreen");
                            
                        } else {
                            $('#msg-screen').removeClass("hideScreen");
                            $('#msg-screen').addClass("showScreen");
                            
                            $('#msg-screen .screen-txt-subtitle2').html(data);
                        }

                    });
                } else {
                    $('#msg-screen').removeClass("hideScreen");
                    $('#msg-screen').addClass("showScreen");
                    
                    $('#msg-screen .screen-txt-subtitle2.es').html("Debes leer las reglas y aceptarlas.");
                    $('#msg-screen .screen-txt-subtitle2.en').html("You have to read and accept the rules.");
                    
                    
                    return false; 
                }
                
            }
            return false;
        });
        
        $('#submit').click(function(e){
										  
            // If a link has been clicked, scroll the page to the link's hash target:
            $('html, body').animate({
                    scrollTop: $(".main-form").offset().top
            }, 300);
            
        });

    });

})(jQuery);