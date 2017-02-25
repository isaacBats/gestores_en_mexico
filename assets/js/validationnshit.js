/*
  © 2017 Israel Morales Polendo
 * Ayuda con las validaciones
 */

function validar_regCivil_acta_de_nacimiento() {
	var valid = true;
        
        if ($("#terminosycondiciones")[0].checked == false){
            $("#validation_error").text("Debes aceptar los términos y condiciones antes de continuar");
            return false;
        }
        
        var inputsParaValidar;
        
        if ($("#copiarDatos")[0].checked){
            //usar los mismos datos
            inputsParaValidar = "#validacion_forzosos input[required=true],#validacion_forzosos select"
        }else{
            //usar datos diferentes
            inputsParaValidar = "input[required=true], select";
        }
        
	$(inputsParaValidar).each(function(){
		$(this).removeClass('invalid');
		$(this).attr('title','');
                $("#validation_error").text("");
		if(!$(this).val()){ 
			$(this).addClass('invalid');
			//$(this).attr('title','This field is required');
			valid = false;
		}
		if($(this).attr("type")=="email" && !$(this).val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)){
			$(this).addClass('invalid');
			$(this).attr('title','Introduce un email válido');
			valid = false;
		}
                if($(this).context.type == "select-one" && $(this).context.name != "gral-ncopias" && $(this).context.value == 0){
                        $(this).addClass('invalid');
			$(this).attr('title','Selecciona una opción');
			valid = false;
                }

                if (!valid)
                    $("#validation_error").text("Error, por favor revisa los datos que proporcionaste");
	});
        
       
	return valid;
}
