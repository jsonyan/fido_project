<div class="span10 boxBorder"><!-- PANEL -->
	
	<div class="navbar">
		<div class="navbar-inner">
		<div class="container">
			<a class="brand">Configuraciones del sistema</a>

			<!--INICIO//  BARRA DE HERRAMIENTAS -->
<!--					<div class="btn-group pull-right">										
						<a href="<?php echo base_url()."index.php/"?>" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Nueva Donaci�n">
							<i class="icon-plus icon-white"></i> </a> 
                        
                        <a href="<?php echo base_url()."index.php/"?>" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Ver donaciones monetarias">
							<i class="icon-th icon-white"></i> </a>	 
                        
                        <a href="<?php echo base_url()."index.php/"?>" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Ver donaciones en especie">
							<i class="icon-th icon-white"></i> </a>	 				
							
						<a href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Borrar donaci�n">
							<i class="icon-trash icon-white"></i> </a> 
					</div>
					-->
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
			<div class="span9">

                            <?php 
                            $atrib_buscar = array('name'=>'guardar','id'=>'guardar','method'=>'post');
                            echo form_open('backend/configuraciones/guardar',$atrib_buscar);
                            ?>
				<div class="tabbable spacer"> <!-- Only required for left/right tabs -->
					<ul class="nav nav-tabs" id="tab-config">
					<li class="active"><a href="#tab1" data-toggle="tab">Gestor de animales</a></li>
					<li><a href="#tab2" data-toggle="tab">Asistencia medica</a></li>
					</ul>
					<div class="tab-content box-tab">
						<div class="tab-pane active" id="tab1">
							<h4 class="span8 well well-small">Agregar o borrar razas</h4>
							<p class="span8 text-warning">
							Adicione, borre, edite una o varias filas de razas. Recuerde que cada raza debe ir separada por una coma (<strong>,</strong>).
							</p>
							<div class="span8 text">
								<label>
								Razas de perros
								</label>
								<input name="perros" type="text" value="<?php 
									if(isset($razas_perros)){
										foreach($razas_perros as $raza)
											echo $raza.",\n";
									}
								?>" data-role="tagsinput" placeholder="A&ntilde;adir razas"/>
							</div>
							<div class="span8">
								<label>
								Razas de Gatos
								</label>
								<input name="gatos" type="text" value="<?php 
									if(isset($razas_gatos)){
										foreach($razas_gatos as $raza)
											echo $raza.",\n";
									}
								?>" data-role="tagsinput" placeholder="A&ntilde;adir razas"/>
							</div>
						</div>
						<div class="tab-pane" id="tab2">
						<p>Otra seccion.</p>
						</div>
					</div>
				</div>
                                <div class="span8">
                                    <?php echo isset($msg) ? $msg : "" ?>
                                </div>
				<div class="form-actions span8 text-center">
                                    <button type="submit" class="btn btn-primary"><i class="icon-white icon-file"></i> Guardar todos los cambios</button>
                                    <button type="submit" class="btn"><i class="icon-remove"></i> Cancelar</button>
				</div>
                            </form>
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
            <?php echo isset($script) ? $script : "" ?>
        });
        </script>
	
	<!--FIN// CARGA SCRIPTS-->
