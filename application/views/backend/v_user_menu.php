<div class="span2 boxBorder spacer text-center" id="user_menu"><!-- Menu usuario -->
	<h5 class="btn spacer" data-toggle="collapse" data-target=".nav-collapse">Menu de modulos</h5>
        <div class="nav-collapse collapse">

				<div class="mod-menu-item text-center <?php if(isset($mod_activo)){ echo strcmp($mod_activo,"animales")==0 ? "menu_activo" : "" ;}?>">
					<a href="<?php echo base_url();?>backend/mod_animales/ver_todos" class="clearfix">
					<img src="<?php echo base_url();?>img/animal.png" alt="" style="width:80px; height:40px">
					<small class="clearfix">Admin. de animales</small>
					</a>
				</div>

<!--			<div class="mod-menu-item text-center <?php if(isset($mod_activo)){ echo strcmp($mod_activo,"adopciones")==0 ? "menu_activo" : "" ;}?>">
					<a href="<?php echo base_url();?>backend/evaluacion/lista" class="clearfix">
					<img src="<?php echo base_url(); ?>img/adopciones.png" alt="" style="width:80px; height:40px">
					<small class="clearfix">Admin. de adopciones</small>
					</a>
				</div>
-->
				<div class="mod-menu-item text-center <?php if(isset($mod_activo)){ echo strcmp($mod_activo,"medico")==0 ? "menu_activo" : "" ;}?>">
					<a class="clearfix" href="<?php echo base_url();?>index.php/backend/mod_historial_medico/ver_todos">
					<img src="<?php echo base_url(); ?>img/seguimiento.png" alt="" style="width:80px; height:40px">
					<small class="clearfix">Adm. Asistencia medica</small>
					</a>
				</div>
				<div class="mod-menu-item text-center <?php if(isset($mod_activo)){ echo strcmp($mod_activo,"seguimientos")==0 ? "menu_activo" : "" ;}?>">
					<a class="clearfix" href="<?php echo base_url();?>index.php/backend/mod_seguimiento/inicio_seguimiento">
					<img src="<?php echo base_url(); ?>img/refugio.png" alt="" style="width:80px; height:40px">
					<small class="clearfix">Admin. de seguimientos</small>
					</a>
				</div>
<!--				<div class="mod-menu-item text-center <?php if(isset($mod_activo)){ echo strcmp($mod_activo,"refugios")==0 ? "menu_activo" : "" ;}?>">
					<a class="clearfix" href="<?php echo base_url();?>index.php/backend/mod_refugios/inicio">
					<img src="<?php echo base_url(); ?>img/refugio2.png" alt="" style="width:80px; height:40px">
					<small class="clearfix">Admin. de refugios</small>
					</a>
				</div>
-->
				<div class="mod-menu-item text-center <?php if(isset($mod_activo)){ echo strcmp($mod_activo,"usuarios")==0 ? "menu_activo" : "" ;}?>">
					<a class="clearfix" href="<?php echo base_url();?>backend/usuarios/mostrar_usuarios_aplab">
					<img src="<?php echo base_url(); ?>img/voluntarios.png" alt="" style="width:80px; height:40px">
					<small class="clearfix">Admin. de usuarios</small>
					</a>
				</div>
<!--				<div class="mod-menu-item text-center <?php if(isset($mod_activo)){ echo strcmp($mod_activo,"donaciones")==0 ? "menu_activo" : "" ;}?>">
					<a class="clearfix" href="#">
					<img src="<?php echo base_url(); ?>img/donacion.png" alt="" style="width:80px; height:40px">
					<small class="clearfix">Admin. de donaciones</small>
					</a>
				</div>
-->
				<div class="mod-menu-item text-center <?php if(isset($mod_activo)){ echo strcmp($mod_activo,"reportes")==0 ? "menu_activo" : "" ;}?>">
					<a class="clearfix" href="<?php echo base_url();?>index.php/backend/mod_reportes">
					<img src="<?php echo base_url(); ?>img/reportes.png" alt="" style="width:80px; height:40px">
					<small class="clearfix">Reportes</small>
					</a>
				</div>
				<div class="mod-menu-item text-center <?php if(isset($mod_activo)){ echo strcmp($mod_activo,"config")==0 ? "menu_activo" : "" ;}?>">
					<a href="<?php echo base_url();?>index.php/backend/configuraciones/editar" class="clearfix">
					<img src="<?php echo base_url(); ?>img/configuraciones.png" alt="" style="width:80px; height:40px">
					<small class="clearfix">Configuraciones</small>
					</a>
				</div>
        </div>
</div>
