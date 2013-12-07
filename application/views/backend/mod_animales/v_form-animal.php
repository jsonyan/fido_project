<div class="span10 boxBorder spacer"><!-- PANEL -->
	
	<div class="navbar">
		<div class="navbar-inner">
		<div class="container">
			<a class="brand">Gestor de animales</a>

			<!--INICIO//  BARRA DE HERRAMIENTAS -->
			<?php 
			$atrib_buscar = array('name'=>'busqueda','id'=>'busqueda','method'=>'post','class'=>'navbar-form pull-right form-search');
			echo form_open('backend/mod_animales/ver_todos',$atrib_buscar);
                        ?>
					<div class="btn-group">										
						<a href="<?php echo base_url()."index.php/backend/mod_animales/ver_todos"?>" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Ver todos los animales">
							<i class="icon-th icon-white"></i> Ver todos</a>
						<a href="<?php echo base_url()."index.php/backend/mod_animales/nuevo_animal"?>" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Nuevo animal">
							<i class="icon-plus icon-white"></i> Nuevo</a>
					</div>
			</form>	
			<!--END//  BARRA DE HERRAMIENTAS -->

		</div>	<!--Container-->
		</div><!--Navbar inner-->
	</div><!--Navbar-->
	
	<!--Inner Container	-->
	<div class="spacer" id="box-contenido">
    <div class="row">
		<div class="span10">
			<!--INICIO//  
			##############################################################
			PANEL PRINCIPAL - COPIA TODO TU CODIGO DENTRO DEL DIV SPAN 10
			##############################################################
			-->
                        <div class="span7">
			<h4 class="well well-small">
			Datos basicos<small> del animal</small>
			<strong class="pull-right codigo-animal" id="box-cod-animal"><?php echo isset($id)? $id: "nuevo";?></strong>
			</h4>
			</div>
			<div class="span2 well well-small text-center">
						<div class="btn-group dropdown">
						<a class="btn btn-small btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-list icon-white"></i> Datos para adopcion
						<span class="caret"></span>
						</a>
							<ul class="dropdown-menu pull-right text-left" style="background-color:#ffa;">
							<li id="login-form" style="padding: 0;">
                                                        <?php 
                                                                $atrib_seg = array('name'=>'guarda_datos_adopcion','id'=>'guarda_datos_adopcion','method'=>'post','style'=>'margin:0;');
                                                                echo form_open('backend/mod_animales/guardaParaAdopcion',$atrib_seg);
                                                        ?>
								<div class="span2">
									<label class="checkbox">
                                                                        <input name="revision" type="checkbox" value="1" <?php if(isset($revision)){if($revision == 1){ echo "checked=\"checked\"";}}?>/>
									En revision medica
									</label>
									<label class="checkbox">
									<input name="adoptable" type="checkbox" value="1" <?php if(isset($adoptable)){if($adoptable == 1){ echo "checked=\"checked\"";}}?>/>
									Adoptable
									</label>
                                                                    <input name="flag_seguimiento" type="hidden" id="flag_seguimiento" value="<?php echo isset($id) ? $id : "nuevo"?>">
                                                                    <div id="mensajito"></div>
                                                                    <button class="btn btn-primary btn-mini span1" type="submit">Actualizar</button>
								</form>
							</div>
						</ul>
						</div>
			</div>

				<?php 
				$atrib = array('name'=>'guardaDatos','id'=>'guardaDatos','method'=>'post');
				echo form_open('backend/mod_animales/guardarDatos',$atrib);?>

			<div class=""><!--Begin row-->
                                <?php if(!isset($id)): ?>
                                    <div class="input-prepend span9">
                                        <span class="badge badge-important">( * ) Datos obligatorios para generar codigo de animal. No son modificables luego de la creacion del registro.</span>
                                    </div>    
                                <?php endif;?>

                            <div class="input-prepend span4">
				<span class="btn-aplab input-small">Nombre</span>
				<input name="nombre" class="text-left span3" type="text" placeholder="Nombre del animal" value="<?php echo isset($nombre)? $nombre: "";?>">
				</div>
				
				<div class="input-prepend span4">
				<span class="btn-aplab input-small">Sexo *</span>
				<select name="sexo" class="span3" id="sexo">
                                    <?php if(isset($sexo)):?>
					<option value="<?php echo isset($sexo) ? $sexo: "0";?>" selected><?php echo isset($sexo) ? $sexo: "No establecido";?></option>
                                    <?php else: ?>
                                        <option value="0">Seleccione sexo</option>
					<option value="hembra">Hembra</option>
					<option value="macho">Macho</option>
                                    <?php endif; ?>
				</select>
				</div>
				<div class="input-prepend span4">
				<span class="btn-aplab input-small">Especie *</span>
				<select name="especie" class="span3" id="especie">
                                    <?php if(isset($especie)):?>
					<option value="<?php echo isset($especie) ? $especie: "0";?>" selected><?php echo isset($especie) ? $especie: "No establecido";?></option>
                                    <?php else: ?>
					<option value="0">Seleccione especie</option>
					<option value="gato">Gato</option>
					<option value="perro">Perro</option>
                                    <?php endif; ?>
				</select>
				</div>
				<div class="input-prepend span4">
				<span class="btn-aplab disabled input-small">Raza *</span>
				<select name="raza" class="span3" id="raza">
                                    <?php if(isset($especie)):?>
					<option value="<?php echo isset($raza) ? $raza: "0";?>" selected><?php echo isset($raza) ? $raza: "";?></option>
                                    <?php else: ?>
					<option value="0">Seleccione primero especie</option>
                                    <?php endif; ?>
                                
                                </select>
				</div>
				<div class="input-prepend span4">
				<span class="btn-aplab input-small">Entrada</span>
				<select name="motivo_entrada" class="span3">
					<option value="0">Motivo/causa</option>
					<option <?php if(isset($entrada)){echo strcmp($entrada,"abandono")==0 ? "selected=\"true\"" : "";}?> value="abandono">Abandono</option>
					<option <?php if(isset($entrada)){echo strcmp($entrada,"callejero")==0 ? "selected=\"true\"" : "";}?> value="callejero">Callejero</option>
					<option <?php if(isset($entrada)){echo strcmp($entrada,"enfermo")==0 ? "selected=\"true\"" : "";}?> value="enfermo">Enfermo/herido</option>
					<option <?php if(isset($entrada)){echo strcmp($entrada,"maltrato")==0 ? "selected=\"true\"" : "";}?> value="maltrato">Maltrato</option>
					<option <?php if(isset($entrada)){echo strcmp($entrada,"nacido_en_refugio")==0 ? "selected=\"true\"" : "";}?> value="nacido_en_refugio">Nacido en refugio</option>
					<option <?php if(isset($entrada)){echo strcmp($entrada,"problemas_con_familia")==0 ? "selected=\"true\"" : "";}?> value="problemas_con_familia">Problemas con familia</option>
				</select>
				</div>
				<div class="input-prepend span4">
				<span class="btn-aplab input-small">Color</span>
				<select name="color" class="span3">
					<option value="0">Elija un color</option>
					<option <?php if(isset($color)){echo strcmp($color,"amarillo")==0 ? "selected=\"true\"" : "";}?> value="amarillo">Amarillo</option>
					<option <?php if(isset($color)){echo strcmp($color,"negro")==0 ? "selected=\"true\"" : "";}?> value="negro">Negro</option>
					<option <?php if(isset($color)){echo strcmp($color,"rojo")==0 ? "selected=\"true\"" : "";}?> value="rojo">Rojo</option>
					<option <?php if(isset($color)){echo strcmp($color,"blanco")==0 ? "selected=\"true\"" : "";}?> value="blanco">Blanco</option>
					<option <?php if(isset($color)){echo strcmp($color,"canela")==0 ? "selected=\"true\"" : "";}?> value="canela">Canela</option>
					<option <?php if(isset($color)){echo strcmp($color,"crema")==0 ? "selected=\"true\"" : "";}?> value="crema">Crema</option>
					<option <?php if(isset($color)){echo strcmp($color,"gris")==0 ? "selected=\"true\"" : "";}?> value="gris">Gris</option>
				</select>
  				</div>
				<div class="input-prepend span4">
				<span class="btn-aplab input-small">Tama&ntilde;o</span>
				<select name="tamanio" class="span3">
					<option value="0">Selecciones tama&ntilde;o</option>
					<option <?php if(isset($tamano)){echo strcmp($tamano,"pequeno")==0 ? "selected=\"true\"" : "";}?> value="pequeno">Peque&ntilde;o</option>
					<option <?php if(isset($tamano)){echo strcmp($tamano,"mediano")==0 ? "selected=\"true\"" : "";}?> value="mediano">Mediano</option>
					<option <?php if(isset($tamano)){echo strcmp($tamano,"grande")==0 ? "selected=\"true\"" : "";}?> value="grande">Grande</option>
				</select>
				</div>
				<div class="input-prepend span4">
				<span class="btn-aplab input-small">Esterilizado</span>
				<select name="esterilizado" class="span3">
					<option <?php if(isset($esterilizado)){echo strcmp($esterilizado,"0")==0 ? "selected=\"true\"" : "";}?> value="0">No</option>
					<option <?php if(isset($esterilizado)){echo strcmp($esterilizado,"1")==0 ? "selected=\"true\"" : "";}?> value="1">Si</option>
				</select>
				</div>
				<div class="input-prepend span4">
				<span class="btn-aplab input-small">Tatuaje</span>
				<select name="tatuaje" class="span3">
					<option <?php if(isset($tatuaje)){echo strcmp($tatuaje,"0")==0 ? "selected=\"true\"" : "";}?> value="0">No</option>
					<option <?php if(isset($tatuaje)){echo strcmp($tatuaje,"1")==0 ? "selected=\"true\"" : "";}?> value="1">Si</option>
				</select>
				</div>
                                <div class="input-prepend span4">
				<span class="btn-aplab input-small">Detalles</span>
                                <textarea name="caracteristicas" class="span3" placeholder="Caracteristicas / Descripcion / detalles / se&ntilde;as"><?php echo isset($caracteristicas) ? trim($caracteristicas) : "";?></textarea>
				</div>

                            
                            
                            <h4 class="span9 well well-small">Datos <small> cuando fue encontrado</small></h4>
				<div class="input-prepend span8">
				<span class="btn-aplab input-small">Estado</span>
					<textarea name="estado_encontrado" class="span7" placeholder="Estado en el que fue encontrado"><?php echo isset($estado_encontrado) ? $estado_encontrado : ""?></textarea>
				</div>
				<div class="input-prepend span4">
				<span class="btn-aplab input-small">Encontrado por</span>
				<input name="encontrado_por" class="span3" type="text" placeholder="Nombre de quien lo encontro" value="<?php echo isset($encontrado_por) ? $encontrado_por : "" ?>">
				</div>
				<div class="input-prepend span4">
				<span class="btn-aplab input-small">Encontrado en</span>
				<input name="direccion_encontrado" class="span3" type="text" placeholder="Direccion" value="<?php echo isset($direccion_encontrado) ? $direccion_encontrado : ""?>">
				</div>



			<h4 class="span9 well well-small">Nacimiento <small> y muerte</small></h4>


				<div class="input-prepend span4">
				<span class="btn-aplab input-small">Nacimiento</span>
				<input name="fecha_nacimiento" class="fnac span3" type="text" placeholder="Indicar fecha" value="<?php echo isset($nacimiento) ? $nacimiento : "" ?>">
				</div>
				<div class="input-prepend span4">
				<span class="btn-aplab input-small">Muerte</span>
				<input name="fecha_muerte" class="fmuerte span3" type="text" placeholder="Indicar fecha" value="<?php echo isset($muerte) ? $muerte : ""?>">
				</div>

				<div class="input-prepend span8">
				<span class="btn-aplab input-small">Motivo</span>
					<textarea name="motivo_muerte" class="span7" placeholder="Motivo de la muerte"><?php echo isset($motivo_muerte) ? $motivo_muerte : ""?></textarea>
					<input id="flag_animal" name="flag_animal" type="hidden" value="<?php echo isset($id)? $id: "nuevo"?>">
				</div>


			</div>
			<div class="text-center span8"><!--Begin row-->
				<div class="text-center">
					<div id="notif_data">
					</div>	
					<button id="registrar" type="submit" class="btn btn-primary"><i class="icon-file icon-white"></i> Guardar datos basicos</button>
					<a href="<?php echo base_url();?>index.php/backend/mod_animales/ver_todos" class="btn"><i class="icon-remove"></i> Cancelar</a>
				</div>
			</div><!--end padding 5% box-->
				</form>					

			<h4 class="span9 well well-small">A&ntilde;adir fotos<small> 150x150 (px)</small></h4>
	<div class="row">
			<div id="foto_animal" class="span3 text-center">
<?php
 				$atrib_foto = array('id'=>'subirFoto','class'=>'well well-small span3','style'=>'margin:0;','method'=>'post','enctype'=>'multipart/form-data');
				echo form_open('backend/mod_animales/subirfoto',$atrib_foto);
?>

				<input type="file" class="spacer" name="userfile">
				<input id="flag_img" name="flag_img" type="hidden" value="<?php echo isset($id) ? $id : "nuevo"?>">
					<div id="notif-foto">
					</div>	
				<button id="btn-upfoto" type="submit" class="btn btn-primary btn-small"><i class="icon-arrow-up icon-white"></i>Subir foto</button>
			</form>			

			</div>
			<div class="span7">
				<ul class="thumbnails" id="boxGaleria">
				<?php
				if(isset($foto_animal)){
					$tok = strtok($foto_animal,"*");
					while($tok !=false){
						$item = "<li>
				<a href=\"".base_url()."uploads/fotos-animal/".$tok."\" class=\"thumbnail\" rel=\"lightbox[animal]\">
					<img src=\"".base_url()."uploads/fotos-animal/".$tok."\" style=\"width:120px\" class=\"polaroid spacer\">
				</a>
				</li>
";
						echo $item;
						$item = "";
						$tok = strtok("*");
					}	
				}
				?>
				</ul>			
			</div>
		</div>	

			<!--FIN  
			##############################################################
			PANEL PRINCIPAL - COPIA TODO TU CODIGO DENTRO DEL DIV SPAN 10
			##############################################################
			-->
		</div>



		
    </div>	

	</div><!--Cerrarndo box-perfiles-->			
</div><!--Cerrarndo CELDA PANEL-->


	<!--INICIO// CARGA SCRIPTS -->
	<script src="<?php echo base_url();?>js/lightbox.js"></script>
        <script type="text/javascript">
	$(function(){
		//Algunas variables de Configuracion 	   
                var perros = [<?php if(isset($razas_perros)){foreach($razas_perros as $raza) echo "\"".$raza."\",";}?>"no_definido"];
                var gatos = [<?php if(isset($razas_gatos)){foreach($razas_gatos as $raza) echo "\"".$raza."\",";}?>"no_definido"];
		
		
		$('body').tooltip({
		  selector: "a[data-toggle=tooltip]",
		  html:true
		});

		$('.fnac , .fmuerte').datepicker({
                    startView:'year',
                    format:'yyyy-mm-dd',
                    startDate:'-10y',
                    endDate:'+0y',
                    language: "es"
                });
		
		
		$('#especie').change(function(){
			var cadenaop = "<option value=\"0\">Seleccione raza</option>";
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
	
        //SUBIENDO FOTOS DEL ANIMAL
        $('#subirFoto').ajaxForm({
            target: '#notif-foto',
            success: cargaEnGaleria
        });

        //PARA ADOPCION
        $('#login-form').find('form').click(function (e) {
            e.stopPropagation();
	});			
		
        $('#guarda_datos_adopcion').ajaxForm({
            target: '#mensajito',
            success: boxAdopcion
	});

});

		//CARGA EL CODIGO DE CADA ANIMAL AL REGISTRO DE NUEVO
		//PONIENDO EL VALOR DEL CODIGO(FLAG) DEL FORMULARIO DE ANIMAL AL INPUT OCULTO DEL FORM ANIMAL PARA EVITAR REPETICIONES
		function codigoJson(data){
                    $('#box-cod-animal').html($(data).find('#code').html());
                    $('#flag_animal').attr('value',$('#box-cod-animal').text());
                    $('#flag_img').attr('value',$('#box-cod-animal').text());
                    $('#flag_seguimiento').attr('value',$('#box-cod-animal').text());
                    window.setTimeout(function() { $(".alert").alert('close'); }, 3000);
		}
                function boxAdopcion(data){
                    window.setTimeout(function() { $(".alert").alert('close'); }, 3000);
                }


		function cargaEnGaleria(data){
                    var imgLink = $(data).find('#imgpath').text()+"";
                    if(imgLink != "error"){	
                        var img = "<li><a href=\""+imgLink+"\" class=\"thumbnail\" rel=\"lightbox[animal]\"><img src=\""+imgLink+"\" style=\"width:120px\" class=\"polaroid spacer\"></a></li>";
			$('#boxGaleria').append(img);
                    }
                    window.setTimeout(function() { $(".alert").alert('close'); }, 3000);
		}

	</script>
	
	<!--FIN// CARGA SCRIPTS-->
    