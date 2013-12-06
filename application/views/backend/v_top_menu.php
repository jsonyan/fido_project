    <div class="navbar boxBorder">
          <a class="logo" href="#">
			  <img src="<?php echo base_url(); ?>img/header_aplab.png" style="width:120px">
		  </a>
	
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="<?php echo base_url();?>backend/bienvenida">Inicio</a></li>
              <!--##############################################INICIAR SESION ##############-->
              <li>
 
                <p class="text-info" >Bienvenido usuario::    <?php echo $this->session->userdata('email') ?>   <?php if(isset($perfil)){?>                
              <?php }?>   </p>
 
              
              </li>
              <!--#################################################-->
            </ul>
            <div class="navbar-form pull-right">
				<div class="btn-group">
				<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
				<i class="icon-user icon-white"></i>&nbsp;Mi cuenta 
				<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li><a href="#">Editar mis datos</a></li>
					<li><?php echo anchor(base_url().'backend/bienvenida/logout_user','Cerrar sesi&oacute;n') ?></li>
					<li></li>
				</ul>
				</div>
            </div>


          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
<div class="row">
