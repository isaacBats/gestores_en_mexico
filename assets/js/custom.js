$(document).ready(function () {
    
    //Validacion de formularios
    $('#form-transaction').validate({
        rules: {
            attr_name: "required",
            attr_paterno: "required",
            attr_materno: "required"
        },
        messages: {
            attr_name: { required: "Campo requerido" },
            attr_paterno: { required: "Campo requerido" },
            attr_materno: { required: "Campo requerido" }
        },
        errorClass: "error",
        debug: true,
        submitHandler: function(form) {
            // Prevenir envío inmediato del formulario
            event.preventDefault();
            
            // Verificar que grecaptcha esté disponible
            if (typeof grecaptcha !== 'undefined' && grecaptcha.ready) {
                // Ejecutar reCAPTCHA antes de enviar
                grecaptcha.ready(function() {
                    grecaptcha.execute('6LfZsvwrAAAAAL6nS56RvIBiHIinWbcxFH7hU4Yn', {
                        action: 'submit_form'
                    }).then(function(token) {
                        // Agregar el token como campo oculto
                        if (!$('#g-recaptcha-response').length) {
                            $('<input>').attr({
                                type: 'hidden',
                                id: 'g-recaptcha-response',
                                name: 'g-recaptcha-response',
                                value: token
                            }).appendTo(form);
                        } else {
                            $('#g-recaptcha-response').val(token);
                        }
                        
                        // Enviar el formulario
                        form.submit();
                    }).catch(function(error) {
                        console.error('Error en reCAPTCHA:', error);
                        alert('Error al verificar reCAPTCHA. Por favor, intente nuevamente.');
                    });
                });
            } else {
                console.error('reCAPTCHA no está cargado correctamente');
                alert('Error al cargar el sistema de verificación. Por favor, recarga la página.');
            }
        }
    });

    // Rellena campos de persona para envío
    $('#cb_reciver').on( 'click', function() {
        var $h_name = $("#hold_name");
        var $h_middleName = $("#hold_paterno");
        var $h_lastName = $("#hold_materno");
        
        var $name = $("#nombres");
        var $middleName = $("#apellidoPaterno");
        var $lastName = $("#apellidoMaterno");
        
        if( $(this).is(':checked') ){
            $h_name.val($name.val());
            $h_middleName.val($middleName.val());
            $h_lastName.val($lastName.val());
            
        } else {
            $h_name.val('');
            $h_middleName.val('');
            $h_lastName.val('');
        }
    });

    //Agrega el precio dependiendo del estado 
    $('#attr_estado').on('change', function() {
        var $transaction = $('#id_transaction');
        var $state = $(this);
        var $costoTramite = $('#costoTramitePesos');
        var $costoCopias = $('#costoCopiasPesos');
        var $costoEnvio = $('#costoEnvioPesos');
        var $costoTotal = $('#costoTotalPesos');
        var $numCopies = $('#attr_copies').val();

        $.get('/serv/obtener-precio?state=' + $state.val() + '&transaction=' + $transaction.val(), function(data) {
            if (data) {
                data = JSON.parse(data);
                var copias = (!data.copy_cost) ? 0 : data.copy_cost * $numCopies;
                var cp = 0;
                $costoTramite.text(data.cost);
                $('#price_id').val(data.id);
                if ($costoCopias.length > 0) {
                    cp = copias;
                    $costoCopias.text(copias);
                    $('#value_price_copy').val(data.copy_cost);
                }
                $costoEnvio.text(data.copy_send);
                $costoTotal.val(parseInt($costoTramite.html()) + cp + parseInt($costoEnvio.html()));
            } else {
                console.log('Sorry something went wrong :(');
            }
        });
    });

    // Calcula el precio con copias
    $('#attr_copies').on('change', function() {
        var $costoTramite = parseInt($('#costoTramitePesos').html());
        var $costoCopias = parseInt($('#value_price_copy').val());
        var $costoEnvio = parseInt($('#costoEnvioPesos').html());
        var $costoTotal = $('#costoTotalPesos');
        var $costoCopiasHtml = $('#costoCopiasPesos');
        
        var copies = $(this).val();
        var ccopies = $costoCopias * copies;
        $costoCopiasHtml.text(ccopies);

        $costoTotal.val($costoTramite + ccopies + $costoEnvio);
    });

    //function  number with commas
    function numberWithCommas(x) {
        var parts = x.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return parts.join(".");
    }

    function sum (values) {
        var total = 0;
        values.each(function() {
            total += parseInt($(this).html());
        });
        return total;
    }
});

