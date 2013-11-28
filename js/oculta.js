$(function (){
            $("#vivienda").change(function() {
                if ($(this).val() != "Propio") {
                    $("#siotro").slideDown('slow').show();
                }else{
                    $("#siotro").fadeOut('slow').hide();
                }
            });
        });
        
$(function (){
            $("#ninos").change(function() {
                if ($(this).val() != "no") {
                    $("#d2").slideDown('slow').show();
                }else{
                    $("#d2").hide();
                }
            });
        });
        
$(function (){
            $("#dia").change(function() {
                if ($(this).val() != "Dentro de la casa") {
                    $("#cadena").slideDown('slow').show();
                }else{
                    $("#cadena").hide();
                }
            });
        });
$(function (){
            $("#noche").change(function() {
                if ($(this).val() != "Dentro de la casa") {
                    $("#cadena").slideDown('slow').show();
                }else{
                    $("#cadena").hide();
                }
            });
        });
        
        
$(function (){
            $("#pcadena").change(function() {
                if ($(this).val() != "Suelto") {
                    $("#razon").slideDown('slow').show();
                }else{
                    $("#razon").hide();
                }
            });
        });
        
$(function (){
            $("#otros_animales").change(function() {
                if ($(this).val() != "No") {
                    $("#sitiene").slideDown('slow').show();
                }else{
                    $("#sitiene").slideUp('slow').hide();
                    $("#vervete").slideUp('slow').hide();
                }
            });
        });
        
        
        
        $(function (){
            $("#cveterinario").change(function() {
                if ($(this).val() != "No") {
                    $("#vervete").slideDown('slow').show();
                }else{
                    $("#vervete").hide();
                }
            });
        });
        
        
        $(function (){
            $("#ya_adopto").change(function() {
                if ($(this).val() != "No") {
                    $("#siadopto").slideDown('slow').show();
                }else{
                    $("#siadopto").hide();
                }
            });
        });
/// FUNCIONA????
        $(function (){
            $("#tipo_vivienda").change(function() {
                if ($(this).val() != "Casa") {
                    $("#duplex").slideDown('slow').show();
                }else{
                    $("#duplex").hide();
                }
            });
        });

                    
function mostrar(id) {
	if (id == "padopt") {
		$("#admin").hide();
        $("#admin1").hide();
		$("#estado_vol").hide();
		$("#tipo_vol").hide();
		$("#siveter").hide();
	}
	
	if (id == "pvolun") {
		$("#admin").hide();
        $("#admin1").hide();
		$("#estado_vol").slideDown('slow').show();
		$("#tipo_vol").slideDown().show();
		$("#siveter").hide();
	}
	
	if (id == "pveter") {
		$("#admin").hide();
        $("#admin1").hide();
		$("#estado_vol").hide();
		$("#tipo_vol").hide();
		$("#siveter").slideDown('slow').show();
	}
	
	if (id == "padmin") {
		$("#admin").slideDown('slow').show();
        $("#admin1").slideDown('slow').show();
		$("#estado_vol").hide();
		$("#tipo_vol").hide();
		$("#siveter").hide();
	}
    if(id=="pdonan")
    {
        $("#admin").hide();
        $("#admin1").hide();
		$("#estado_vol").hide();
		$("#tipo_vol").hide();
		$("#siveter").hide();
    }
}        

                    
function evaluar(id) {
	if (id == "Condominio") {
		$("#con").slideDown('slow').show();        
	}
	if (id == "Casa") {
		$("#con").slideDown('slow').hide();
	}
	
	if (id == "Un Ambiente") {
		$("#con").slideDown('slow').hide();
	}
	
	if (id == "Departamento") {
		$("#con").slideDown('slow').hide();
	}
}        

     