<div class="boxRounded spacer" style="background-color:#FFFFFF">
	
	<div class="navbar promo4">
		<div class="navbar-inner">
		<div class="container">
			<a  class="brand"style="color:white;">Necesitamos tu ayuda, denuncia....</a>

			<!--INICIO//  BARRA DE HERRAMIENTAS -->
					<div class="btn-group pull-right">					
                    				
						<a href="<?php echo base_url();?>frontend/usuario" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Igresar">
							<i class="icon-plus icon-white"></i>Registrarme para adoptar</a>                                                	 												
					</div>
			<!--END//  BARRA DE HERRAMIENTAS -->

		</div>	<!--Container-->
		</div><!--Navbar inner-->
	</div><!--Navbar-->
	
	<!--Inner Container	-->
	<div class="spacer" id="box-contenido">
    <div class="row" style="border: white ;margin-left: 50px; margin-right: 100px !important;">
<p>&nbsp;</p>    
		<div class="span11">
			<!--INICIO//  
			##############################################################
			PANEL PRINCIPAL---COPIA TODO TU CODIGO DENTRO DEL DIV SPAN 10
			##############################################################
			-->
            <h3 class="text-success text-center"> DENUNCIA CUALQUIER TIPO DE MALTRATO A LOS ANIMALES</h3>
            <?php if(isset($mensaje)){?>
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Bien!</strong><?php echo $mensaje;?>
            </div>            
              <?php }?>
            <form method="post" action="<?php echo base_url()?>frontend/inicio/reg_maltrato">
                <h3 class="text-warning text-center">Formulario de denuncia</h3>
                <div class="input-prepend span4">
                    <span class="btn btn-warning input-small">Nombre</span>
                    <input class="span3" name="nombre" type="text" placeholder="Su nombre" required="">                    
                </div>
                <div class="input-prepend span4">
                    <span class="btn btn-warning input-small">Email</span>
                    <input type="email" pattern=".*@*\.com" name="email" required="" placeholder="Su correo">                    
                </div> 
                <div class="input-prepend span4">
                    <span class="btn btn-warning input-small">Asunto</span>
                    <input class="span3" name="motivo" type="text" placeholder="Motivo de denuncia" required="">                    
                </div>
                <div class="input-prepend span4">
                    <span class="btn btn-warning input-small">Tel&eacute;fono</span>
                    <input class="span2" type="tel"  placeholder="movil o fijo"pattern='\d\d\d\d\d\d\d\d' x-moz-errormessage="Ingrese un telefono valido 'xxxxxxxx'" name="fono"/>                    
                </div>  
                <div class="input-prepend span8">
                    <span class="btn btn-warning input-large">Descripci&oacute;n de los hechos</span>
                    <textarea name="hecho" class="span6" placeholder="Especifique el lugar y los hechos" required=""></textarea>                    
                </div>
                <div class="input-prepend span8">
                    <span class="btn btn-warning input-large">Animal maltratado</span>
                    <textarea  name="maltrato" class="span6" placeholder="Especifique la especie,raza" required=""></textarea>                    
                </div>
                <div class="row">
                <div class="input-prepend span11">
                    <a class="btn pull-right" href="#"> Cancelar</a>
                    <input  class="btn btn-success pull-right" type="submit" value="Enviar denuncia" title="Enviar" name="denuncia"/>                                                            
                </div>
                </div>                
            </form>
              <!-- /tabbable -->
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
	
	<!--FIN// CARGA SCRIPTS-->
