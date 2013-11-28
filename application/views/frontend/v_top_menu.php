    <div class="navbar">
		  <img src="<?php echo base_url();?>img/header_aplab.png" style=" position:absolute; z-index:100; width:200px">
      <div class="navbar-inner">
        <div class="container pull-right" id="top-menu">
          <button type="button" class="btn btn-navbar" style="clear:both;" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="item-top top1"><a href="#"><i class="icon-home icon-white"></i> Inicio</a></li>
              <li class="dropdown item-top top2">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Adopciones<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Felizmente adoptados</a></li>
                  <li><a href="<?php echo base_url()?>frontend/evaluacion">En adopcion</a></li>
                  <li><a href="#">Llenar mi solicitud</a></li>
                  <li><a href="#">Terminos y condiciones de adopcion</a></li>
                </ul>
              </li>
              <li class="dropdown item-top top3">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Unete a nosotros<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url()?>frontend/inicio/voluntariado">Quieres ser voluntario?</a></li>
                  <li><a href="#">Quieres hacer tu donacion?</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Otros</li>
                  <li><a href="#">Denuncia el maltrato</a></li>
                  <li><a href="#">Tu mascota se perdio?</a></li>
                </ul>
              </li>
              <li class="dropdown item-top top4"><a href="#">Actividades</a></li>
              <li class="dropdown item-top top5">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Acerca de APLAB<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li class="nav-header">Institucional</li>
                  <li><a href="#">Antecedentes</a></li>
                  <li><a href="#">Mision y vision</a></li>
                  <li><a href="#">Politicas</a></li>
                </ul>
              </li>
				<div class="pull-right">
					<div class="btn-group">
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
					Usuario
					<span class="caret"></span>
					</a>
					<ul class="dropdown-menu pull-right">
					<!-- dropdown menu links -->
						  <li class="divider"></li>
                          <li class="nav-header">Usuario</li>
                          <li class="align-center"><a> Tu usuario es: <?php echo $this->session->userdata('email') ?> <br /></a></li>
                          <li class="align-center"><a style="color: blue;"><?php if(isset($perfil)){?><?php echo $perfil;?><?php }?></a></li>
                          <li class="divider"></li>
                          <li class="nav-header">Session</li>
                          <li><?php echo anchor('../frontend/evaluacion/logout_user','Cerrar sesión') ?></li>                          
					</ul>
					</div>				
				</div>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

<div class="">
