<!DOCTYPE html>
<html>
<head>
<title>APLAB - Seguimiento</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="<?php echo base_url(); ?>/css/bootstrap.css" rel="stylesheet" media="screen">
<link href="<?php echo base_url(); ?>/css/bootstrap-responsive.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>/css/aplab.css" rel="stylesheet">

<style type="text/css">
 .boxBorder{
		border-radius:7px;
	  	background-color:#fff;
		-webkit-box-shadow: rgba(0,0,0,0.3) 0 1px 3px; 
		   -moz-box-shadow: rgba(0,0,0,0.3) 0 1px 3px; 
		        box-shadow: rgba(0,0,0,0.3) 0 1px 3px; 
 }
 body{
 	background-color:#eee;
 }
 .inner-container{
 	margin:10px;
 }
 .thumbnail{
 	background-color:#fff;
 }
 .spacer{
	  	margin-bottom:1.5%;
 }

.icon-animal{
  background-image: url("<?php echo base_url(); ?>/img/glyphicons_002_dog.png");
  width:40px;
  height:40px;
  line-height:25px;
  float:left;
  padding:0;
  margin:0;
  
}



</style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

</head>
<body>
<div class="container">		

    <div class="navbar">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Prototipo APLAB</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#" id="inic">Inicio</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Adopta una mascota<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Felizmente adoptados</a></li>
                  <li><a href="#">En adopcion</a></li>
                  <li><a href="#">Llenar mi solicitud</a></li>
                  <li><a href="#">Terminos y condiciones de adopcion</a></li>
                </ul>
              </li>
            </ul>
            <form class="navbar-form pull-right">
				<div class="btn-group">
				<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
				<i class="icon-user icon-white"></i>&nbsp;Mi cuenta 
				<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li><a href="#">Editar mis datos</a></li>
					<li><a href="#">Cerrar sesion</a></li>
					<li></li>
				</ul>
				</div>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>






<div class="row">
<div class="span2 boxBorder spacer" id="user_menu"><!-- Menu usuario -->
	<h5 class="text-center">Menu de modulos</h5>

				<div class="thumbnail text-center">
					<a href="<?php echo base_url()."index.php/inicio_animal"?>" class="clearfix">
					<img src="<?php echo base_url(); ?>img/animal.png" alt="" style="width:80px;">
					<small class="clearfix">Admin. de animales</small>
					</a>
				</div>

				<div class="thumbnail text-center">
					<a href="#" class="clearfix">
					<img src="<?php echo base_url(); ?>img/adopciones.png" alt="" style="width:80px;">
					<small class="clearfix">Admin. de adopciones</small>
					</a>
				</div>
				<div class="thumbnail text-center menu_activo">
					<a class="clearfix" href="<?php echo base_url()."index.php/historial_medico"?>">
					<img src="<?php echo base_url(); ?>img/seguimiento.png" alt="" style="display:block; margin:0 auto; width:80px;">
					<small class="clearfix">Adm. Asistencia medica</small>
					</a>
				</div>
				<div class="thumbnail text-center">
					<a class="clearfix" href="#">
					<img src="<?php echo base_url(); ?>img/refugio.png" alt="" style="display:block; margin:0 auto; width:80px;">
					<small class="clearfix">Admin. de seguimientos</small>
					</a>
				</div>
				<div class="thumbnail text-center">
					<a class="clearfix" href="#">
					<img src="<?php echo base_url(); ?>img/voluntarios.png" alt="" style="display:block; margin:0 auto; width:80px;">
					<small class="clearfix">Admin. de usuarios</small>
					</a>
				</div>
				<div class="thumbnail text-center">
					<a class="clearfix" href="#">
					<img src="<?php echo base_url(); ?>img/donacion.png" alt="" style="display:block; margin:0 auto; width:80px;">
					<small class="clearfix">Admin. de donaciones</small>
					</a>
				</div>
				<div class="thumbnail text-center">
					<a class="clearfix" href="#">
					<img src="<?php echo base_url(); ?>img/reportes.png" alt="" style="display:block; margin:0 auto; width:80px;">
					<small class="clearfix">Reportes</small>
					</a>
				</div>
				<div class="thumbnail text-center">
					<a href="#" class="clearfix">
					<img src="<?php echo base_url(); ?>img/configuraciones.png" alt="" style="display:block; margin:0 auto; width:80px;">
					<small class="clearfix">Configuraciones</small>
					</a>
				</div>
</div>
	
<div class="span10 boxBorder"><!-- PANEL -->
	
	<div class="navbar">
		<div class="navbar-inner">
		<div class="container">
			<a class="brand">Gestor de asistencia medica</a>
			<form class="navbar-form pull-right form-search">
<!--				<a href="#" role="button" class="btn btn-primary"><i class="icon-home icon-white"></i></a>
				<a href="#myModal" role="button" class="btn btn-primary" data-toggle="modal">
					<i class="icon-plus icon-white"></i>&nbsp;Nuevo animal
				</a>-->

					<div class="btn-group">
						<a href="<?php echo base_url()."index.php/historial_medico"?>" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Ver todos los animales">
							<i class="icon-th icon-white"></i></a>
					</div>

				<div class="input-append">
				<input type="text" class="input-small search-query" placeholder="Palabra clave">
				<button type="submit" class="btn btn-primary"><i class="icon-filter icon-white"></i>&nbsp;Filtrar</button>
				</div>
			</form>
		</div>	<!--Container-->
		</div><!--Navbar inner-->
	</div><!--Navbar-->
	
	<!--Inner Container-->
	<div class="span9" id="box-perfiles">

<div class="row">
		<div class="span9">
			<div class="span8">
			<h4 class="well well-small">
			Datos <small> del animal</small>
			</h4>
			</div>
				
				<?php
				if(isset($datos_animal)){ 
					echo "<table class=\"table table-bordered span8\">";
					foreach($datos_animal as $item){
						$foto = strlen($item['foto_animal']) <= 4 ? "" : 'src="'.base_url().'uploads/fotos-animal/'.$item['id_animal'].'_0.jpg"';
						echo "<tr> <td class=\"span2\">"."<img ".$foto." style=\"width:125px; height:125px;\" data-src=\"holder.js/125x125\">"."</td>";
						echo "<td class=\"span3\">";
						echo "<strong>Nombre:</strong> ".$item['nombre_animal']."<br/>";
						echo "<strong>Sexo:</strong> ".$item['sexo_animal']."<br/>";
						echo "<strong>Especie:</strong> ".$item['especie']."<br/>";
						echo "<strong>Raza:</strong> ".$item['raza']."<br/>";
						echo "<strong>Tama&ntilde;o:</strong> ".$item['tamano']."<br/>";
						echo "<strong>Edad:</strong> ".$item['edad']."<br/>";
						echo "</strong></td>";
						echo "<td>";
						echo "<strong>Descripcion/Detalles del animal:</strong><br/> ".$item['caracteristicas']."<br/>";
						echo "</td>";
						echo "</tr>";
					}
					echo "</table>";
				}else{
					show_404();
				}
				
				?>


			<div class="span8"><!-- Panel de historial (INICIO)-->
				<h4 class="well well-small">
				Historial medico
				<a href="#modal-ficha" role="button" class="btn btn-primary btn-small pull-right" data-toggle="modal"><i class="icon-plus icon-white"></i> Nueva ficha medica</a>
				</h4>

				<div class="accordion" id="accordion2"><!-- Acordion (INICIO) -->
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
							<table class="table table-condensed table-bordered"><tr>
							<td>Item1</td>
							<td>Item1</td>
							<td>Item1</td>
							<td>Item1</td>
							</tr>
							</table>
							</a>
						</div>
						<div id="collapseOne" class="accordion-body collapse">
							<div class="accordion-inner">
							<a href="#modal-ficha" role="button" class="btn btn-primary btn-mini pull-right" data-toggle="modal">
								<i class="icon-edit icon-white"></i> Editar ficha</a>
							Diagnostico: AAAA<br>
							Tratamiento: BBBB<br>
							Vacunas: CCCC 
							</div>
						</div>
					</div>
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
							28/01/2013 - Revision general
							</a>
						</div>
						<div id="collapseTwo" class="accordion-body collapse">
							<div class="accordion-inner">
							<a href="#modal-ficha" role="button" class="btn btn-primary btn-mini pull-right" data-toggle="modal">
								<i class="icon-edit icon-white"></i> Editar ficha</a>
							Diagnostico: AAAA<br>
							Tratamiento: BBBB<br>
							Vacunas: CCCC 
							</div>
						</div>
					</div>
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse3">
							21/01/2013 - Politraumatismo
							</a>
						</div>
						<div id="collapse3" class="accordion-body collapse">
							<div class="accordion-inner">
							<a href="#modal-ficha" role="button" class="btn btn-primary btn-mini pull-right" data-toggle="modal">
								<i class="icon-edit icon-white"></i> Editar ficha</a>
							Diagnostico: AAAA<br>
							Tratamiento: BBBB<br>
							Vacunas: CCCC 
							</div>
						</div>
					</div>

				</div><!-- Acordion (FIN) -->
			</div><!-- Panel de historial (FIN)-->

		</div>
		
    </div>	

	</div><!--Cerrarndo box-perfiles-->			
		
	</div>			

</div><!--Cerrarndo CELDA PANEL-->

      <footer>
        <p>&copy; APLAB - Amor Por Los Animales Bolivia 2013</p>
      </footer>

</div>	<!--Cerrarndo Container-->

				<?php 
				$atrib = array('name'=>'guardaFicha','id'=>'guardaFicha','method'=>'post');
				echo form_open('ficha_medica/guarda_ficha',$atrib);?>
<div id="modal-ficha" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="myModalLabel">Nueva ficha medica</h3>
</div>
<div class="modal-body">

			<div class="row"><!--Begin row-->
				<div class="input-prepend span5">
				<button class="btn btn-primary span2" type="button">Motivo de la consulta</button>
				<input name="motivo-consulta" class="text-left span3" type="text" placeholder="Ej.: Politraumatismo" value="<?php echo isset($nombre)? $nombre: "";?>">
				</div>
				
				<div class="input-prepend span5">
				<button class="btn btn-primary span2" type="button">Diagnostico</button>
				<textarea name="diagnostico" rows="4" class="text-left span3" type="text" placeholder="Ej.: Fractura de radio y cubito..." value="<?php echo isset($nombre)? $nombre: "";?>"></textarea>	
				</div>

				<div class="input-prepend span5">
				<button class="btn btn-primary span2" type="button">Tratamiento a seguir</button>
				<textarea name="tratamiento" rows="4" class="text-left span3" type="text" placeholder="Ej.: Reduccion de fractura con yeso durante 15 dias" value="<?php echo isset($nombre)? $nombre: "";?>"></textarea>	
				</div>

				<div class="input-prepend span5">
				<button class="btn btn-primary span2" type="button">Vacunas aplicadas</button>
				<textarea name="vacunacion" rows="3" class="text-left span3" type="text" placeholder="Ej.: Octuple anual, Antirrabica anual" value="<?php echo isset($nombre)? $nombre: "";?>"></textarea>	
				</div>

			</div>


</div>
<div class="modal-footer">
	<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
	<button id="registrar" type="submit" class="spacer btn btn-primary"><i class="icon-file icon-white"></i> Guardar ficha</button>
</div>
</div>
				</form>					
	
    <script src="<?php echo base_url(); ?>/js/jquery.js"></script>
<!--    <script src="http://localhost/aplab/js/jquery.form.js"></script>-->
    <script src="<?php echo base_url(); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/holder/holder.js"></script>

</body>
</html>
