
//validate form news letter//
( function( window ){
    'use strict';


//Google Analytics Goal Tracking//

    $("#send_email").click(function() {

        register('event','interaction','sendemail','Send E-mail');
        
    });
    $("#call_now").click(function() {

        register('event','interaction','call','Called');
        
    });




   var news_letter_form = document.getElementById('news_letter');


    if(news_letter_form){

        $("#news_letter").validate({

            n_name: $('#n_name').val(),
            n_email: $('#n_email').val(),

            rules:{
                n_name:{
required:true,
minlength:2
                },
                n_email:{
                    required: true,
                    email:true
                }
            },
            messages:{
                    n_name: {
                    required: 'Qual seu nome?',
                    minlength: 'No mínimo 2 letras'
                    },
                    n_email: {
                    required: 'Precisamos que forneça seu e-mail',
                    email: 'Ops, informe um email válido'
                    }
            },

            submitHandler: function (form) {
                $("#msg_news").html('Aguarde um instate, estamos registrando seus dados.');
                $('#form_news').fadeTo("slow", 0.2);
                var dados = $(form).serialize();

                $.ajax({
                    type: "POST",
                    url: 'http://' + window.location.hostname + "/wp-content/themes/ju87/assets/register.php",
                    data: dados,
                    success: function (data) {
                    $("#msg_news").html(data);
                    
                    register('leads','interaction','register','Newsletter Register');
                    
                    $('#form_news').fadeTo("slow", 1);
                    }
                    });
               

                return false;
                }

        });
    }
            
            $('#contact_form').validate({
            
            name: $("#name").val(),
            email: $("#email").val(),
            message: $("#message").val(),
            
            rules: {
            name: {
            required: true,
            minlength: 2
            },
            email: {
            required: true,
            email: true
            },
            message: {
            required: true,
            minlength: 5
            }
            },
            messages: {
            name: {
            required: 'Qual seu nome?',
            minlength: 'No mínimo 2 letras'
            },
            email: {
            required: 'Precisamos que forneça seu e-mail',
            email: 'Ops, informe um email válido'
            },
            message:{
            required: 'Envie-nos uma mensagem',
            minlength:'Escreva mais algumas palavras :)'
            }
            
            },
           submitHandler: function (form) {
             $("#msg_msg").html("Enviando mensagem, aguarde ...");
             $('#contact_form').fadeTo("slow", 0.2);
            var dados = $(form).serialize();
            
            $.ajax({
            type: "POST",
            url: 'http://' + window.location.hostname + "/wp-content/themes/ju87/assets/send_date_m.php",
            data: dados,
            success: function (data) {
            $("#msg_msg").html(data);
            $('#contact_form').fadeTo("slow", 1);

            register('event','interaction','contact','Send Message');
            
            }
            });
            return false;
            }
            });
        }(window));