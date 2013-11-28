<div class="span10 boxBorder"><!-- PANEL -->
	
	<div class="navbar">
		<div class="navbar-inner">
		<div class="container">
			<a class="brand">Registro de Usuarios</a>

			<!--INICIO//  BARRA DE HERRAMIENTAS -->
					<div class="btn-group pull-right">										
						<a href="<?php echo base_url().""?>backend/usuarios" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Nueva Donación">
							<i class="icon-plus icon-white"></i>Registrar Nuevo Usuario</a> 
                        
                        <a href="<?php echo base_url()."backend/usuarios/mostrar_usuarios_aplab"?>" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Ver donaciones monetarias">
							<i class="icon-th icon-white"></i>Ver Usuarios Registrados </a>	 
                        
                        <a href="#" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Ver donaciones en especie">
							<i class="icon-th icon-white"></i>Buscar Usuario registrado </a>	 												
					</div>
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
        	
        <?php if(isset($error)): ?>
            <?php echo $error; ?>
        <?php else: ?>
        
    <form name="form_edit" action="<?php echo base_url().'backend/usuarios/editar'?>" method="POST" enctype="multipart/form-data" >
    <!-- perfil-->    
    <div class="">    
           <?php if($perfil_edit=='padmin'):?>
            <div class="input-prepend span4">
                <span class="btn btn-danger input-small">Funci&oacute;n</span>
                <input type="text" name="cargo" id="cargo" value="<?php echo $funcion;?>" />                            
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-danger input-small">Otra Funci&oacute;n</span>
                <input type="text" name="otro_cargo" id="otro_cargo" value="<?php echo $otro;?>" />                            
            </div>
            <div class="input-prepend span4">
                <input type="hidden" name="pedit" value="<?php echo $perfil_edit;?>" />                            
            </div>
            <?php endif;?>
            <?php if($perfil_edit=='pvolun'):?>
            <div class="input-prepend span4">
                <span class="btn btn-info input-small">Tipo</span>
                <input type="text" name="tipo" id="tipo" value="<?php echo $tipo;?>" />                            
            </div>
            
            <div class="input-prepend span4">
                <span class="btn btn-info input-small">Estado</span>
                <input type="text" name="estado" id="estado" value="<?php echo $estado;?>" />                            
            </div>
             <div class="input-prepend span4">
                <input type="hidden" name="pedit" value="<?php echo $perfil_edit;?>" />                            
            </div>
            <?php endif;?>
            <?php if($perfil_edit=='pveter'):?> 
            <div class="input-prepend span4">
                <span class="btn btn-success input-small">Matricula</span>
                <input type="text" name="matricula" id="matricula" value="<?php echo $matricula;?>" />                            
            </div>
             <div class="input-prepend span4">
                <input type="hidden" name="pedit" value="<?php echo $perfil_edit;?>" />                            
            </div>
            <?php endif;?> 
            <?php if($perfil_edit=='pdonan'):?>
            <div class="input-prepend span4">
                <input type="hidden" name="pedit" id="id_usuario" value="<?php echo $perfil_edit;?>" />                            
            </div>
            <?php endif;?>
            <?php if($perfil_edit=='padopt'):?>
            <div class="input-prepend span4">
                <input type="hidden" name="pedit" id="id_usuario" value="<?php echo $perfil_edit;?>" />                            
            </div>
            <?php endif;?>
            <div class="input-prepend span4">
                <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $id_usuario;?>" />                            
            </div>                                         
        </div>
        
        <!-- fin perfil-->
        <div class="">
        
            <div class="input-prepend span4">
                <span class="btn btn-primary input-small">Nombre</span>
                <input type="text" name="nombre"  value="<?php echo $nombre;?>"required=""/>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-primary input-small">Apellidos</span>
                <input type="text" name="apellidos"  value="<?php echo $apellidos;?>"required=""/>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-primary input-small">Email</span>
                <input type="email" pattern=".*@*\.com" name="email"  value="<?php echo $email;?>" required=""/>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-primary input-small">CI</span>
                <input type="text" name="ci"  value="<?php echo $ci;?>" required=""/>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-primary input-small">Tel&eacute;fono</span>
                <input type="tel" pattern='\d\d\d\d\d\d\d\d' x-moz-errormessage="Ingrese un telefono valido 'xxxxxxxx'" name="fijo"  value="<?php echo $telefono;?>"/>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-primary input-small">Celular</span>
                <input type="tel" pattern='\d\d\d\d\d\d\d\d' x-moz-errormessage="Ingrese un telefono movil valido 'xxxxxxxx'" name="movil"  value="<?php  echo $celular;?>" required=""/>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-primary input-small">Ciudad</span>
                <input type="text" name="ciudad"  value="<?php  echo $ciudad;?>" required=""/>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-primary input-small">Direcci&oacute;n</span>
                <input type="text" name="direccion"  value="<?php echo $direccion;?>" required=""/>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-primary input-small">Ocupaci&oacute;n</span>
                <input type="text" name="ocupacion"   value="<?php echo $ocupacion;?>"required=""/>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-primary input-medium">Fecha Nacimiento</span>
                <input type="text" name="nacimiento"  value="<?php echo $nacimiento;?>" required=""/>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-primary input-small">Contrase&ntilde;a</span>
                <input type="password" name="pass" id="pass" required=""/>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-primary input-medium">Confirmar Contrase&ntilde;a</span>
                <input type="password" name="repass" id="repass" onfocus="validatePass(document.getElementById('pass'), this);" oninput="validatePass(document.getElementById('pass'), this);" required=""/>
            </div>
            
        </div>
        <div class="input-prepend row centrado">            
            <div class="input-prepend span1">
                <input class="btn" type="submit" value="Modificar" name="submit" />                              
            </div>
            <div class="input-prepend span5">
                <a class="btn" href="<?php echo base_url()?>/backend/usuarios/mostrar_usuarios_aplab">Cancelar</a>
            </div>                                        
        </div>
        <div class="input-prepend row centrado">
            <div class="input-prepend span4">
                <span class="btn btn-primary input-medium">Cambiar Foto  del usuario</span>                
                <input type="file" name="userfile" />
            </div>
        </div>   
</form>
<?php endif; ?>
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
            function validatePass(pass, repass) {
            if (pass.value != repass.value || pass.value == '' || repass.value == '') {
            repass.setCustomValidity('Error!! La Contraseñas no son iguales');
            } else {
            repass.setCustomValidity('');
            }}
</script>

	<!--FIN// CARGA SCRIPTS-->
