<div class="span10 boxBorder spacer"><!-- PANEL -->
	
	<div class="navbar">
		<div class="navbar-inner">
		<div class="container">
			<a class="brand">Gestor de animales</a>

			<!--INICIO//  BARRA DE HERRAMIENTAS -->
			<?php 
			$atrib_buscar = array('name'=>'busqueda','id'=>'busqueda','method'=>'get','class'=>'navbar-form pull-right form-search');
			echo form_open('backend/mod_animales/ver_todos',$atrib_buscar);
                        ?>
					<div class="btn-group">										
						<a href="<?php echo base_url()."index.php/backend/mod_animales/ver_todos"?>" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Ver todos los animales">
							<i class="icon-th icon-white"></i> Ver todos</a>
						<a href="<?php echo base_url()."index.php/backend/mod_animales/nuevo_animal"?>" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Nuevo animal">
							<i class="icon-plus icon-white"></i> Nuevo</a>
					</div>
				<div class="input-append pull-right" style="margin-left:5px;">
				<input name="clave" type="text" class="input-small search-query" placeholder="Palabra clave">
				<button type="submit" class="btn btn-primary"><i class="icon-filter icon-white"></i>&nbsp;Filtrar</button>
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
			PANEL PRINCIPAL---COPIA TODO TU CODIGO DENTRO DEL DIV SPAN 10
			##############################################################
			-->
                        <div class="span7">
			<h4 class="well well-small">
			Datos basicos<small> del animal</small>
			<strong class="pull-right codigo-animal" id="box-cod-animal"><?php echo isset($id)? $id: "nuevo";?></strong>
			</h4>
			</div>
			<div class="span2 well well-small text-center">
<!--						<div class="btn-group dropdown">
						<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-list icon-white"></i> Seguimiento
						<span class="caret"></span>
						</a>
							<ul class="dropdown-menu text-left">
							<li>
								<div class="span2">
									<label class="checkbox">
									<input type="checkbox" />
									En revision medica
									</label>
									<label class="checkbox">
									<input type="checkbox" />
									Adoptable
									</label>
								</form>
							</div>
							<li><a href="#">Refugio temporal</a></li>
							<li><a href="#">Solicitudes de adopcion</a></li>
							<li><a href="#">Voluntario asignado</a></li>
						</ul>
						</div>-->
				<a href="#box-seguimiento" role="button" class="btn btn-primary btn-small" data-toggle="modal"><i class="icon-list icon-white"></i> Datos de seguimiento
</a>						
			</div>

				<?php 
				$atrib = array('name'=>'guardaDatos','id'=>'guardaDatos','method'=>'post');
				echo form_open('backend/mod_animales/guardarDatos',$atrib);?>

			<div class=""><!--Begin row-->
				<div class="input-prepend span4">
				<span class="btn btn-warning disabled input-small" type="button">Nombre</span>
				<input name="nombre" class="text-left span3" type="text" placeholder="Nombre del animal" value="<?php echo isset($nombre)? $nombre: "";?>">
				</div>
				
				<div class="input-prepend span4">
				<span class="btn btn-warning disabled input-small" type="button">Sexo</span>
				<select name="sexo" class="span3" id="sexo"<?php echo isset($id) ? "disabled" : "" ?>>
					<option value="0">Seleccione sexo</option>
					<option <?php if(isset($sexo)){echo strcmp($sexo,"hembra")==0 ? "selected=\"true\"" : "";}?> value="hembra">Hembra</option>
					<option <?php if(isset($sexo)){echo strcmp($sexo,"macho")==0 ? "selected=\"true\"" : "";}?>value="macho">Macho</option>
				</select>
				</div>
				<div class="input-prepend span4">
				<span class="btn btn-warning disabled input-small" type="button">Especie</span>
				<select name="especie" class="span3" id="especie" <?php echo isset($id) ? "disabled" : "" ?>>
					<option value="0">Seleccione especie</option>
					<option <?php if(isset($especie)){echo strcmp($especie,"gato")==0 ? "selected=\"true\"" : "";}?> value="gato">Gato</option>
					<option <?php if(isset($especie)){echo strcmp($especie,"perro")==0 ? "selected=\"true\"" : "";}?> value="perro">Perro</option>
				</select>
				</div>
			
				<div class="input-prepend span4">
				<span class="btn btn-warning disabled input-small" type="button">Raza</span>
				<select name="raza" class="span3" id="raza" <?php echo isset($id) ? "disabled" : "" ?>>
					<option value="<?php echo isset($raza) ? $raza: "";?>"><?php echo isset($raza) ? $raza: "";?></option>
				</select>
				</div>
				<div class="input-prepend span4">
				<span class="btn btn-warning disabled input-small" type="button">Mestizo</span>
				<select name="mestizo" class="span3">
					<option <?php if(isset($mestizo)){echo strcmp($mestizo,"0")==0 ? "selected=\"true\"" : "";}?> value="0">No</option>
					<option <?php if(isset($mestizo)){echo strcmp($mestizo,"1")==0 ? "selected=\"true\"" : "";}?> value="1">Si</option>
				</select>
				</div>
				<div class="input-prepend span4">
					<span class="btn btn-warning disabled input-small" type="button">Color</span>
				<select name="color" class="span3">
					<option value="0">Elija color</option>
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
				<span class="btn btn-warning disabled input-small" type="button">Tama&ntilde;o</span>
				<select name="tamanio" class="span3">
					<option value="0">Selecciones tama&ntilde;o</option>
					<option <?php if(isset($tamano)){echo strcmp($tamano,"pequeno")==0 ? "selected=\"true\"" : "";}?> value="pequeno">Peque&ntilde;o</option>
					<option <?php if(isset($tamano)){echo strcmp($tamano,"mediano")==0 ? "selected=\"true\"" : "";}?> value="mediano">Mediano</option>
					<option <?php if(isset($tamano)){echo strcmp($tamano,"grande")==0 ? "selected=\"true\"" : "";}?> value="grande">Grande</option>
				</select>
				</div>
				<div class="input-prepend span4">
				<span class="btn btn-warning disabled input-small" type="button">Entrada</span>
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
				<span class="btn btn-warning disabled input-small" type="button">Esterilizado</span>
				<select name="esterilizado" class="span3">
					<option <?php if(isset($esterilizado)){echo strcmp($esterilizado,"0")==0 ? "selected=\"true\"" : "";}?> value="0">No</option>
					<option <?php if(isset($esterilizado)){echo strcmp($esterilizado,"1")==0 ? "selected=\"true\"" : "";}?> value="1">Si</option>
				</select>
				</div>
				<div class="input-prepend span4">
				<span class="btn btn-warning disabled input-small" type="button">Adoptable</span>
				<select name="adoptable" class="span3">
					<option <?php if(isset($adoptable)){echo strcmp($adoptable,"0")==0 ? "selected=\"true\"" : "";}?> value="0">No</option>
					<option <?php if(isset($adoptable)){echo strcmp($adoptable,"1")==0 ? "selected=\"true\"" : "";}?> value="1">Si</option>
				</select>
				</div>
				<div class="input-prepend span8">
				<span class="btn btn-warning disabled input-small" type="button">Detalles</span>
					<textarea name="caracteristicas" class="span7" placeholder="Caracteristicas / Descripcion / detalles / se�as"><?php echo isset($caracteristicas) ? trim($caracteristicas) : "";?></textarea>
				</div>


			<h4 class="span9 well well-small">Datos <small> cuando fue encontrado</small></h4>



				<div class="input-prepend span8">
				<span class="btn btn-warning disabled input-small" type="button">Estado</span>
					<textarea name="estado_encontrado" class="span7" placeholder="Estado en el que fue encontrado"><?php echo isset($estado_encontrado) ? $estado_encontrado : ""?></textarea>
				</div>
				<div class="input-prepend span4">
				<span class="btn btn-warning disabled input-small" type="button">Encontrado por</span>
				<input name="encontrado_por" class="span3" type="text" placeholder="Nombre de quien lo encontro" value="<?php echo isset($encontrado_por) ? $encontrado_por : "" ?>">
				</div>
				<div class="input-prepend span4">
				<span class="btn btn-warning disabled input-small" type="button">Encontrado en</span>
				<input name="direccion_encontrado" class="span3" type="text" placeholder="Direccion" value="<?php echo isset($direccion_encontrado) ? $direccion_encontrado : ""?>">
				</div>



			<h4 class="span9 well well-small">Edad <small> y otros datos</small></h4>


				<div class="input-prepend span4">
				<span class="btn btn-warning disabled input-small" type="button">Nacimiento</span>
				<input name="fecha_nacimiento" class="fnac span3" type="text" placeholder="Fecha o edad aprox." value="<?php echo isset($nacimiento) ? $nacimiento : "" ?>">
				</div>
				<div class="input-prepend span4">
				<span class="btn btn-warning disabled input-small" type="button">Muerte</span>
				<input name="fecha_muerte" class="fmuerte span3" type="text" placeholder="Fecha" value="<?php echo isset($muerte) ? $muerte : ""?>">
				</div>

				<div class="input-prepend span8">
				<span class="btn btn-warning disabled input-small" type="button">Motivo</span>
					<textarea name="motivo_muerte" class="span7" placeholder="Motivo de la muerte"><?php echo isset($motivo_muerte) ? $motivo_muerte : ""?></textarea>
					<input id="flag_animal" name="flag_animal" type="hidden" value="<?php echo isset($id)? $id: "nuevo"?>">
				</div>


			</div>
			<div class="text-center"><!--Begin row-->

				<div class="text-center">
					<div id="notif_data">
					</div>	
					<button id="registrar" type="submit" class="spacer btn btn-primary"><i class="icon-file icon-white"></i> Guardar datos basicos</button>
					<a href="<?php echo base_url();?>index.php/backend/mod_animales/ver_todos" class="spacer btn"><i class="icon-remove"></i> Cancelar</a>
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

				<input size="4" type="file" class="spacer" name="userfile">
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

			<!--FIN//  
			##############################################################
			PANEL PRINCIPAL---COPIA TODO TU CODIGO DENTRO DEL DIV SPAN 10
			##############################################################
			-->
		</div>



		
    </div>	

	</div><!--Cerrarndo box-perfiles-->			
</div><!--Cerrarndo CELDA PANEL-->


	<!--INICIO// CARGA SCRIPTS -->
	<script type="text/javascript">
	$(function(){
		
		//Algunas variables de Configuracion 	   
                var perros = [<?php if(isset($razas_perros)){foreach($razas_perros as $raza) echo "\"".$raza."\",";}?>"no_definido"];
                var gatos = [<?php if(isset($razas_gatos)){foreach($razas_gatos as $raza) echo "\"".$raza."\",";}?>"no_definido"];
		
		
		$('body').tooltip({
		  selector: "a[data-toggle=tooltip]",
		  html:true
		});

		$('.fnac , .fmuerte').datepicker({viewMode:'years',format:'yyyy-mm-dd'});
		
		
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
		
/*		var cadenaop = array();
		$('#especie').change(function(){
			var especie = $(this).val();
			if(especie == "perro"){
				$('#raza').typeahead({
					source: perros
				})
			}else{
				$('#raza').typeahead({
					source: gatos
				})
			
			}
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

        $('#user_menu').scrollspy();
        $('#myTab a:first').tab('show');
		
        $('#guarda_seguimiento').ajaxForm({
			target: '#mensajito'
/*			dataType:'xml',
			success: function(data){
				$('#mensajito').html($(data).find('#msg').html());
			}*/
		});

});

		//CARGA EL CODIGO DE CADA ANIMAL AL REGISTRO DE NUEVO
		//PONIENDO EL VALOR DEL CODIGO(FLAG) DEL FORMULARIO DE ANIMAL AL INPUT OCULTO DEL FORM ANIMAL PARA EVITAR REPETICIONES
		function codigoJson(data){
				$('#box-cod-animal').html($(data).find('#code').html());
				$('#flag_animal').attr('value',$('#box-cod-animal').text());
				$('#flag_img').attr('value',$('#box-cod-animal').text());
				$('#flag_seguimiento').attr('value',$('#box-cod-animal').text());
		}


		function cargaEnGaleria(data){
		
				var imgLink = $(data).find('#imgpath').text()+"";
				if(imgLink != "error"){	
					var img = "<li><a href=\""+imgLink+"\" class=\"thumbnail\" rel=\"lightbox[animal]\"><img src=\""+imgLink+"\" style=\"width:120px\" class=\"polaroid spacer\"></a></li>";
					$('#boxGaleria').append(img);
				}
		}

	</script>
	
	<!--FIN// CARGA SCRIPTS-->
<div id="box-seguimiento" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header promo5">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
<h3 id="myModalLabel">Datos de seguimiento</h3>
</div>
        <?php 
                $atrib_seg = array('name'=>'guarda_seguimiento','id'=>'guarda_seguimiento','method'=>'post');
                echo form_open('backend/mod_animales/guardaSeguimiento',$atrib_seg);
        ?>
<div class="modal-body">
    <ul class="nav nav-tabs" id="myTab">
    <li class="active"><a href="#para_adopcion" data-toggle="tab">Para adopcion</a></li>
    <li><a href="#voluntario_encargado" data-toggle="tab">Voluntario encargado</a></li>
    <li><a href="#refugio_temporal" data-toggle="tab">Refugio temporal</a></li>
    </ul>

    <div class="tab-content">
    <div class="tab-pane active" id="para_adopcion">
                <label class="checkbox span2">
                    <input type="checkbox" name="revision" value="true"> EN REVISION MEDICA
                </label>
                <label class="checkbox span2">
                    <input type="checkbox" name="adoptable" value="true"> ADOPTABLE
                </label>
                <div class="spacer"></div>
        
    </div>
    <div class="tab-pane" id="voluntario_encargado">
			<?php 
			if(isset($voluntarios)){
				$cabecera = '<table class="table"><tr><th>Asignar</th><th>Nombre</th><th>Ap.Paterno</th><th>Ap.Materno</th></tr>';
				echo $cabecera;
				foreach($voluntarios as $fila){
					echo "<tr>";
					echo "<td><input name=\"volunt\" value=\"true\" type=\"radio\"></td>";
					echo "<td>".$fila['nombre']."</td>";
					echo "<td>".$fila['ap_paterno']."</td>";
					echo "<td>".$fila['ap_materno']."</td>";
					echo "</tr>";
				}
				$pie = '</table>';
				echo $pie;
			}else{
				$mensaje = '<p class="alert alert-error"><a class="close" data-dismiss="alert" href="#">&times;</a>ERROR: Guarde datos del animal primero</p>';
				echo $mensaje;
			}
			?>
		
	</div>
    <div class="tab-pane" id="refugio_temporal">DDD</div>
    </div>
</div>
            <div id="mensajito" style="clear:both; padding:5px 15px"></div>
            <div class="text-center well well-small">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                <button class="btn btn-primary" type="submit">Guardar cambios</button>
            </div>
			<input type="hidden" id="flag_seguimiento" name="flag_seguimiento" value="<?php echo isset($id) ? $id : "nuevo"?>"/>
        </form>
</div>
    