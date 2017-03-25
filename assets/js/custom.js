$(document).ready(function () {
    //Validacion de formularios
    $('#form-transaction').validate({
    	rules: {
    		attr_name: "required",
			attr_paterno: "required",
			attr_materno: "required",
			attr_curp: "required"
			// attr_sexo: "required",
			// attr_estado: "required",
			// attr_fnacimiento: "required",
			// attr_fregistro: "required",
			// attr_no_acta: "required",
			// attr_no_libro: "required",
			// attr_foja: "required",
			// attr_juzgado: "required",
			// attr_nom_padre: "required",
			// attr_nom_madre: "required",
			// attr_image: "required"
    	},
    	messages: {
    		attr_name: "Es necesario tu nombre o nombres",
			attr_paterno: "Es necesario tu primer apellido",
			attr_materno: "Es necesario tu segundo apellido",
			attr_curp: "Es necesario tu CURP"
    	},
    	errorClass: "error",
    	debug: true
    });
});