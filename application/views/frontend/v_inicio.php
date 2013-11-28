<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title><?php echo $titulo ?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('estilos/estilos.css') ?>" />
	</head>
	
	<body>
	<div class="wrapper">
		<div id="formulario_login">
			<h2>Login</h2>
			
			<p id="sesion_cerrada">
				<?php echo $this->session->flashdata('cerrada') !== FALSE ? $this->session->flashdata('cerrada') : '' ?>
			</p>
			
			<div id="errores_formulario"><?php echo validation_errors(); ?></div>
			
			<p id="error_login">
				<?php echo $this->session->flashdata('noexiste') ? $this->session->flashdata('noexiste') : '' ?>	
			</p>
			
			
				<?php echo form_open(base_url('inicio/user_login')) ?>
				
					<?php echo form_label('Email') ?>
					<?php echo form_input($campos['input_email']) ?>
					
					<?php echo form_label('Password') ?>
					<?php echo form_password($campos['input_password']) ?><br />
					
					<?php echo form_hidden('token', $token) ?>
					
					<?php echo form_submit('submit', 'Login') ?>
				
				<?php echo form_close() ?>
		</div>
		
		<?php echo anchor('../frontend/inicio/registro','Registrarme') ?>
	</div>
	</body>
</html>
