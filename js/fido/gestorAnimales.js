/*
#######################################################################
FUNCIONES PARA EL GESTOR DE ANIMALES
Sistema: FIDO-APLAB V 1.0
Fecha: 1 de mayo de 2013
#######################################################################
*/
	$(function(){
		
		//Algunas variables de Configuracion 	   
		var perros = ["afgano","boxer","boston terrier","pequines","maltes"];
		var gatos = ["siames","raza2","raza3","raza4","raza5"];
		
		
		$('body').tooltip({
		  selector: "a[data-toggle=tooltip]",
		  html:true
		});
		$('.colorpicker').colorpicker();
		$('.fnac , .fmuerte').datepicker();
		
		
		$('#especie').change(function(){
			var cadenaop = "";
			var especie = $(this).val();
			if(especie == "perro"){
				$(perros).each(function(i){
					cadenaop += '<option value=\"'+$(perros)[i]+'\">'+$(perros)[i]+'</option>';	
				});
			}else{
				$(gatos).each(function(i){
					cadenaop += '<option value=\"'+$(gatos)[i]+'\">'+$(gatos)[i]+'</option>';	
				});
			
			}
			$('#raza').html(cadenaop);
		});
		
		

});


