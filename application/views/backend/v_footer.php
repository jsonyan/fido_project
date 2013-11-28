</div><!--Cerrarndo FILA-->

      <footer>
        <p>&copy; APLAB - Amor Por Los Animales Bolivia 2013</p>
      </footer>

</div>	<!--Cerrarndo Container-->

	
    <script src="<?php echo base_url(); ?>js/jquery.form.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/holder/holder.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>
	<script>
	$(function(){
		
		//Algunas variables de Configuracion 	   
		var perros = ["afgano","boxer","boston terrier","pequines","maltes"];
		var gatos = ["siames","raza2","raza3","raza4","raza5"];
		
		
		$('body').tooltip({
		  selector: "a[data-toggle=tooltip]",
		  html:true
		});
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
/*
------------------------------------------------
AJAX CALLS
------------------------------------------------
*/		
		
		//GUARDANDO DATOS DE ANIMAL
		var options = {
			target: '#notif_data',
			success: codigoJson
		};
		
        $('#guardaDatos').ajaxForm(options);

		
		//

		//SUBIENDO FOTOS DEL ANIMAL
        $('#subirFoto').ajaxForm({
            target: '#notif-foto',
			success: cargaEnGaleria
        });

});

		//CARGA EL CODIGO DE CADA ANIMAL AL REGISTRO DE NUEVO
		//PONIENDO EL VALOR DEL CODIGO(FLAG) DEL FORMULARIO DE ANIMAL AL INPUT OCULTO DEL FORM ANIMAL PARA EVITAR REPETICIONES
		function codigoJson(data){
				$('#box-cod-animal').html($(data).find('#code').html());
				$('#flag_animal').attr('value',$('#box-cod-animal').text());
				$('#flag_img').attr('value',$('#box-cod-animal').text());
		}
		function cargaEnGaleria(data){
		
				var imgLink = $(data).find('#imgpath').text()+"";
				if(imgLink != "error"){	
					var img = "<li><a href=\""+imgLink+"\" class=\"thumbnail\" rel=\"lightbox[animal]\"><img src=\""+imgLink+"\" style=\"width:120px\" class=\"polaroid spacer\"></a></li>";
					$('#boxGaleria').append(img);
				}
		}

	</script>

</body>
</html>
