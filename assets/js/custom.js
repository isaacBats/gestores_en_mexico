$(document).ready(function () {
    
    //Validacion de formularios
    $('#form-transaction').validate({
        rules: {
            attr_name: "required",
            attr_paterno: "required",
            attr_materno: "required",
            attr_curp: "required",
            attr_sexo: "required",
            attr_estado: "required",
            attr_fnacimiento: "required",
            attr_fregistro: "required",
            attr_no_acta: "required",
            attr_no_libro: "required",
            attr_foja: "required",
            attr_juzgado: "required",
            attr_nom_padre: "required",
            attr_nom_madre: "required",
        },
        messages: {
            attr_name: { required: "Campo requerido" },
            attr_paterno: { required: "Campo requerido" },
            attr_materno: { required: "Campo requerido" },
            attr_curp: { required: "Campo requerido"}
        },
        errorClass: "error",
        debug: true,
        submitHandler: function(form) {
            form.submit();
        }
    });

    // Rellena campos de persona para envío
    $('#cb_reciver').on( 'click', function() {
        var $r_name = $("#reciv_name");
        var $r_middleName = $("#reciv_paterno");
        var $r_lastName = $("#reciv_materno");
        var $r_email = $("#reciv_email");
        var $r_phone = $("#reciv_tel");
        var $r_mobil = $("#reciv_mobil");
        var $r_street = $("#reciv_calle");
        var $r_noout = $("#reciv_num_ext");
        var $r_noin = $("#reciv_num_int");
        var $r_township = $("#reciv_colonia");
        var $r_zipCode = $("#reciv_cp");
        var $r_settlement = $("#reciv_municipio");
        var $r_contry = $("#reciv_pais");
        var $r_state = $("#reciv_estado");
        var $r_referer = $("#reciv_referencia");

        var $h_name = $("#hold_name");
        var $h_middleName = $("#hold_paterno");
        var $h_lastName = $("#hold_materno");
        var $h_email = $("#hold_email");
        var $h_phone = $("#hold_tel");
        var $h_mobil = $("#hold_mobil");
        var $h_street = $("#hold_calle");
        var $h_noout = $("#hold_num_ext");
        var $h_noin = $("#hold_num_int");
        var $h_township = $("#hold_colonia");
        var $h_zipCode = $("#hold_cp");
        var $h_settlement = $("#hold_municipio");
        var $h_contry = $("#hold_pais");
        var $h_state = $("#hold_estado");
        var $h_referer = $("#hold_referencia");
        
        if( $(this).is(':checked') ){
            $r_name.val($h_name.val());
            $r_middleName.val($h_middleName.val());
            $r_lastName.val($h_lastName.val());
            $r_email.val($h_email.val());
            $r_phone.val($h_phone.val());
            $r_mobil.val($h_mobil.val());
            $r_street.val($h_street.val());
            $r_noout.val($h_noout.val());
            $r_noin.val($h_noin.val());
            $r_township.val($h_township.val());
            $r_zipCode.val($h_zipCode.val());
            $r_settlement.val($h_settlement.val());
            $r_contry.val($h_contry.val());
            $r_state.val($h_state.val());
            $r_referer.val($h_referer.val());
        } else {
            $r_name.val('');
            $r_middleName.val('');
            $r_lastName.val('');
            $r_email.val('');
            $r_phone.val('');
            $r_mobil.val('');
            $r_street.val('');
            $r_noout.val('');
            $r_noin.val('');
            $r_township.val('');
            $r_zipCode.val('');
            $r_settlement.val('');
            $r_contry.val('');
            $r_state.val('');
            $r_referer.val('');
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
                debugger;
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

