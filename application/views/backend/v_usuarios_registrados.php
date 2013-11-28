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
                        <div class="input-append pull-right" style="margin-left:5px;">
				<input name="clave" type="text" class="input-small search-query" placeholder="Palabra clave">
				<button type="submit" class="btn btn-primary"><i class="icon-filter icon-white"></i>&nbsp;Filtrar</button>
				</div>	 												
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
      <!-- ################################PARA BUSCAR-->      
      <hr />
  <!-- <div id='busqueda'>
      <input type='text' id='busca_dato' name='busca_dato' size=50/>
   </div>
   <div id='resultados'>

   </div>--->
            <!----###############################=FIN BUSCAR-->
	<ul id="myTab" class="nav nav-tabs">
              <li class="in"><a href="#ver_admin" data-toggle="tab">Administradores</a></li>
              <li><a href="#ver_volun" data-toggle="tab">Voluntarios</a></li>
              <li><a href="#ver_adopt" data-toggle="tab">Adoptantes</a></li>
              <li><a href="#ver_donan" data-toggle="tab">Donantes</a></li>
              <li><a href="#ver_veter" data-toggle="tab">Veterinarios</a></li>
              
            </ul>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade in active" id="ver_admin">
            
                    <table class="table table-condensed">
                          <thead>
                            <tr>
                              <th>COD.</th></th>
                              <th>Nombre</th>
                              <th>Apellidos</th>
                              <th>CI</th>
                              <th>Correo Electronico</th>
                              <th>Red Social</th>
                              <th>Telefonos</th>
                            </tr>
                          </thead>
                          <?php foreach($usuarios_admin as $fila):?>
                          <?php echo "<tbody>";?>
                            <?php echo "<tr class='warning'>";?>
                              <?php echo"<td>";?><?php echo $fila->id_usuario;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->nombre;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->apellidos;?><?php echo"</td>";?>    
                              <?php echo"<td>";?><?php echo $fila->ci;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->email;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->red_social;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->telefono; echo '--'; echo $fila->celular?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php $perfil='administrador';?><?php echo"</td>";?>
                              <?php echo"<td>";?><a  class="btn btn-mini btn-primary" href="<?php echo base_url()?>backend/usuarios/editar_usuario/<?php echo $fila->id_usuario;?>/<?php echo $perfil; ?>">Editar</a><?php echo"</td>";?>
                              <?php echo"<td>";?><a  class="btn btn-mini btn-primary"  href="#">Borrar</a><?php echo"</td>";?>
                            <?php echo"<tr>";?>
                          <?php echo"</tbody>";?>
                          <?php endforeach;?>
                    </table>                                                                                                                                                                                                                                                                                                                            
              </div>
              <div class="tab-pane fade" id="ver_donan">                
                    <table class="table table-condensed">
                          <thead>
                            <tr>
                              <th>COD.</th></th>
                              <th>Nombre</th>
                              <th>Apellidos</th>
                              <th>CI</th>
                              <th>Correo Electronico</th>
                              <th>Red Social</th>
                              <th>Telefonos</th>
                            </tr>
                          </thead>
                          <?php foreach($usuarios_donan as $fila):?>
                          <?php echo "<tbody>";?>
                            <?php echo "<tr class='warning'>";?>
                              <?php echo"<td>";?><?php echo $fila->id_usuario;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->nombre;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->apellidos;?><?php echo"</td>";?>    
                              <?php echo"<td>";?><?php echo $fila->ci;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->email;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->red_social;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->telefono; echo '--'; echo $fila->celular?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php $perfil='donante';?><?php echo"</td>";?>
                              <?php echo"<td>";?><a  class="btn btn-mini btn-primary" href="<?php echo base_url()?>backend/usuarios/editar_usuario/<?php echo $fila->id_usuario;?>/<?php echo $perfil; ?>">Editar</a><?php echo"</td>";?>
                              <?php echo"<td>";?><a  class="btn btn-mini btn-primary"  href="#">Borrar</a><?php echo"</td>";?>
                            <?php echo"<tr>";?>
                          <?php echo"</tbody>";?>
                          <?php endforeach;?>
                    </table>                                                                              
              </div>
              <div class="tab-pane fade" id="ver_volun">
                     <table class="table table-condensed">
                          <thead>
                            <tr>
                              <th>COD.</th></th>
                              <th>Nombre</th>
                              <th>Apellidos</th>
                              <th>CI</th>
                              <th>Correo Electronico</th>
                              <th>Red Social</th>
                              <th>Telefonos</th>
                            </tr>
                          </thead>
                          <?php foreach($usuarios_volun as $fila):?>
                          <?php echo "<tbody>";?>
                            <?php echo "<tr class='warning'>";?>
                              <?php echo"<td>";?><?php echo $fila->id_usuario;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->nombre;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->apellidos;?><?php echo"</td>";?>    
                              <?php echo"<td>";?><?php echo $fila->ci;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->email;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->red_social;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->telefono; echo '--'; echo $fila->celular?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php $perfil='voluntario';?><?php echo"</td>";?>
                              <?php echo"<td>";?><a  class="btn btn-mini btn-primary" href="<?php echo base_url()?>backend/usuarios/editar_usuario/<?php echo $fila->id_usuario;?>/<?php echo $perfil; ?>">Editar</a><?php echo"</td>";?>
                              <?php echo"<td>";?><a  class="btn btn-mini btn-primary"  href="#">Borrar</a><?php echo"</td>";?>
                            <?php echo"<tr>";?>
                          <?php echo"</tbody>";?>
                          <?php endforeach;?>
                    </table>                            
              </div>
              <div class="tab-pane fade" id="ver_adopt">
                       <table class="table table-condensed">
                          <thead>
                            <tr>
                              <th>COD.</th></th>
                              <th>Nombre</th>
                              <th>Apellidos</th>
                              <th>CI</th>
                              <th>Correo Electronico</th>
                              <th>Red Social</th>
                              <th>Telefonos</th>
                            </tr>
                          </thead>
                          <?php foreach($usuarios_adopt as $fila):?>
                          <?php echo "<tbody>";?>
                            <?php echo "<tr class='warning'>";?>
                              <?php echo"<td>";?><?php echo $fila->id_usuario;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->nombre;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->apellidos;?><?php echo"</td>";?>    
                              <?php echo"<td>";?><?php echo $fila->ci;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->email;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->red_social;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->telefono; echo '--'; echo $fila->celular;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php $perfil='adoptante';?><?php echo"</td>";?>
                              <?php echo"<td>";?><a  class="btn btn-mini btn-primary" href="<?php echo base_url()?>backend/usuarios/editar_usuario/<?php echo $fila->id_usuario;?>/<?php echo $perfil; ?>">Editar</a><?php echo"</td>";?>
                              <?php echo"<td>";?><a  class="btn btn-mini btn-primary"  href="#">Borrar</a><?php echo"</td>";?>
                            <?php echo"<tr>";?>
                          <?php echo"</tbody>";?>
                          <?php endforeach;?>
                    </table>                            
              </div>
              <div class="tab-pane fade" id="ver_veter">
                      <table class="table table-condensed">
                          <thead>
                            <tr>
                              <th>COD.</th></th>
                              <th>Nombre</th>
                              <th>Apellidos</th>
                              <th>CI</th>
                              <th>Correo Electronico</th>
                              <th>Red Social</th>
                              <th>Telefonos</th>
                            </tr>
                          </thead>
                          <?php foreach($usuarios_veter as $fila):?>
                          <?php echo "<tbody>";?>
                            <?php echo "<tr class='warning'>";?>
                              <?php echo"<td>";?><?php echo $fila->id_usuario;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->nombre;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->apellidos;?><?php echo"</td>";?>    
                              <?php echo"<td>";?><?php echo $fila->ci;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->email;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->red_social;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->telefono; echo '--'; echo $fila->celular?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php $perfil='veterinario';?><?php echo"</td>";?>
                              <?php echo"<td>";?><a  class="btn btn-mini btn-primary" href="<?php echo base_url()?>backend/usuarios/editar_usuario/<?php echo $fila->id_usuario;?>/<?php echo $perfil; ?>">Editar</a><?php echo"</td>";?>
                              <?php echo"<td>";?><a  class="btn btn-mini btn-primary"  href="#">Borrar</a><?php echo"</td>";?>
                            <?php echo"<tr>";?>
                          <?php echo"</tbody>";?>
                          <?php endforeach;?>
                    </table>
       
              </div>
              
            </div>
<script>
  $(function () {
    $('#myTab a:last').tab('show');
  })
</script>
                    
    

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
    <script type='text/javascript'>
   $(function(){
      $('#busca_dato').autocomplete({
        source: 'ajax08.php',
        select: function(event,ui){
          $('#resultados').html("<div style='border:1px solid black;width:300px;background:yellow;padding:20px'><h1>Producto</h1><br>Codigo:"+ui.item.value.split('|')[0]+"<br>Descripcion:"+ui.item.value.split('|')[1]+"<br></div>" );
          }
        });
   });

</script>
	
	<!--FIN// CARGA SCRIPTS-->
