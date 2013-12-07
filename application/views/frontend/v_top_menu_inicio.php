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
              <li class="item-top top1"><a href="<?php echo base_url() ?>frontend/inicio"><i class="icon-home icon-white"></i> Inicio</a></li>
              
              <li class="dropdown item-top top2">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Acerca de APLAB<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li class="nav-header">Institucional</li>                  
                  <li><a href="<?php echo base_url()?>frontend/inicio/historia">Historia</a></li>
                  <li><a href="<?php echo base_url()?>frontend/inicio/somos">Quienes somos??</a></li>
                  <li><a href="#">Mision y vision</a></li>
                  
                  <li><a href="<?php echo base_url()?>frontend/inicio/politica">Politicas</a></li>
                </ul>
              </li>
               <li class="dropdown item-top top7">
                <a href="<?php echo base_url()?>frontend/star">Aplab STAR</a>
                <!--<ul class="dropdown-menu">
                  <li><a href="#">Felizmente adoptados</a></li>
                  <li><a href="<?php echo base_url() ?>frontend/adopcion">En adopcion</a></li>
                  <li><a href="#">Llenar mi solicitud</a></li>
                  <li><a href="#">Terminos y condiciones de adopcion</a></li>
                </ul>-->
              </li>
              <li class="dropdown item-top top5">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Adopciones<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Felizmente adoptados</a></li>
                  <li><a href="<?php echo base_url() ?>frontend/adopcion">En adopcion</a></li>
                  <li><a href="#">Llenar mi solicitud</a></li>
                  <li><a href="#">Terminos y condiciones de adopcion</a></li>
                </ul>
              </li>
              <li class="dropdown item-top top4"><a href="#">Actividades</a></li>
              <li class="dropdown item-top top3">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Unete a nosotros<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url()?>frontend/inicio/voluntariado">Quieres ser voluntario?</a></li>
                  <li><a href="#">Quieres hacer tu donacion?</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Otros</li>
                  <li><a href="<?php echo base_url()?>frontend/inicio/maltrato">Denuncia el maltrato</a></li>
                  <li><a href="#">Tu mascota se perdio?</a></li>
                </ul>
              </li>
              
             
				<div class="pull-right">
					<div class="btn-group">
                    
					<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
					Iniciar sesion
					<b class="caret"></b> 
                    <?php //if(isset($mensaje)):?>	                    	                   
                                                           			
				    <?php echo $this->session->flashdata('cerrada') !== FALSE ? $this->session->flashdata('cerrada') : '' ?>						
                    <?php echo validation_errors(); ?>						
				    <?php echo $this->session->flashdata('noexiste') ? $this->session->flashdata('noexiste') : '' ?>
                    <?php //endif;?>				                                        
					</a>
					<ul class="dropdown-menu pull-right">
					<!-- dropdown menu links -->
						<li style="padding:15px" id="login-form">
						<div class="wrapper">
		<div>
			<h2 class="text-info">Acceso</h2>									
				<?php echo form_open(base_url('frontend/inicio/user_login')) ?>
				
					<?php echo form_label('Email') ?>
					<?php echo form_input($campos['input_email']) ?>
					
					<?php echo form_label('Password') ?>
					<?php echo form_password($campos['input_password']) ?><br />
					
					<?php echo form_hidden('token', $token) ?>
					
                                        
					<?php 
                                            $valores = array(
                                                'name' => 'submit',
                                                'value' => 'Ingresar',
                                                'class' => 'btn btn-primary pull-left'
                                            );
                                            echo form_submit($valores);
                                            
                                        $link = base_url()."frontend/usuario";
                                        $styleAnchor = array('class'=>'btn btn-primary pull-right');
                                        echo anchor($link,'Registrarme',$styleAnchor); ?>
				
				<?php echo form_close() ?>
		</div>
		
	</div>                
						</li>
					</ul>
					</div>				
				</div>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

<div class="">
