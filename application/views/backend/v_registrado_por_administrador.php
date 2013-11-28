<div class="span10 boxBorder"><!-- PANEL -->
	
	<div class="navbar">
		<div class="navbar-inner">
		<div class="container">
			<a class="brand">Registro de Usuarios</a>

			<!--INICIO//  BARRA DE HERRAMIENTAS -->
					<div class="btn-group pull-right">										
						<a href="<?php echo base_url().""?>backend/usuarios" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Nueva Donaci�n">
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
			<?php if(isset($mensaje)):?>
                    <?php if(is_array($mensaje)):?>                                               
                        <?php foreach($mensaje as $m):?>
                        <div class="alert alert-success span7">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong> CORRECTO!!</strong>
                            <?php echo $m;?>
                        </div>
                        <?php endforeach;?>
                    <?php else:?>
                        <div class="alert alert-success span7">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong> INFORMACI&Oacute;N!!</strong>
                            <?php echo $mensaje;?>
                        </div>
                    <?php endif;?>
            <?php endif;?>
            <?php if(validation_errors()):?>
            <div class="alert alert-error span7">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong> ERROR!!</strong>
                <?php echo validation_errors();?>
            </div>
    <?php endif;?>
            
                    
    <form name="form_reg" action="<?php echo base_url().'backend/usuarios/registro_very2'?>" method="POST" enctype="multipart/form-data" >
    <!-- perfil-->    
    <div class="">    
            <div class="input-prepend span4">
                <span class="btn btn-primary input-small">Registrar</span>
                <select name="perfil" id="pweb" onChange="mostrar(this.value);">
                    <option value="padopt">Adoptante</option>
                    <option value="pvolun">Voluntario</option>
                    <option value="pveter">Veterinario</option>
                    <option value="padmin">Administrador</option>
                    <option value="pdonan">Donante</option>
                </select>
            </div>
            
            <div class="input-prepend span4" style="display:none;" id="admin">
                <span class="btn btn-info input-small">Funcion</span>
                <select name="cargo"id="cargo">                    
                    <option>Presidente</option>
                    <option>Vice-presidente</option>
                    <option>Coordinador de Adopciones</option>
                    <option>Coord. de hogares temporales</option>
                    <option>Coord. de proyectos</option>
                    <option>Coord. de Donaciones</option>
                    <option>Coord. de ventas</option>
                    <option>Coord. de RRHH</option>
                    <option>Coord. de Relaciones Publicas</option>                    
                </select>                                            
            </div>
            
            <div class="input-prepend span4" style="display:none;" id="admin1">
                <span class="btn btn-info input-small">Otra Funcion</span>
                <select name="otro_cargo"id="otro_cargo">                                        
                    <option>Coordinador de Adopciones</option>
                    <option>Coord. de hogares temporales</option>
                    <option>Coord. de proyectos</option>
                    <option>Coord. de Donaciones</option>
                    <option>Coord. de ventas</option>
                    <option>Coord. de RRHH</option>
                    <option>Coord. de Relaciones Publicas</option>
                    <option>Otro</option>                    
                </select>                                          
            </div>            
            
           <div class="input-prepend span4" style="display: none;" id="estado_vol">
                <span class="btn btn-info input-small">Estado</span>
                <input type="text" name="estado"  value="" placeholder="Pasivo, Activo"/>
            </div>
            <div class="input-prepend span10" style="display: none;" id="tipo_vol">
                <!---<span class="btn btn-info input-small">Tipo voluntario</span>
                <input type="text" name="tipo" value="" placeholder="funcion voluntario" />-->
                <label><p class="text-success">C&oacute;mo quiere colaborar?</p></label>
                                <label class="checkbox inline">                                    
                                    <input type="checkbox" id="parque" name="parque" value="Fines de semana en parques"> Fines de semana en parques.
                                    </label>
                                    <label class="checkbox inline">
                                      <input type="checkbox" id="hogar" name="hogar" value="Hogar temporal"> Hogar temporal.
                                    </label>
                                    <label class="checkbox inline">
                                    <input type="checkbox" id="albergue" name="albergue" value="Trabajo en albergues"> Trabajo en albergues.
                                </label>
                                <label class="checkbox inline">
                                    <input type="checkbox" id="campana" name="campana" value="Campana de esterilizacion"> Campa&ntilde;a de esterilizaci&oacute;n.
                                </label>
                                <label class="checkbox inline">
                                    <input type="checkbox" id="asistencia" name="asistencia" value="Asistencia a eventos"> Asistencia en eventos.
                                </label>
            </div>
            <div class="input-prepend span4" style="display: none;" id="siveter">
                <span class="btn btn-info input-medium">Matricula profesional</span>
                <input class="input-medium" value="" type="text" name="matricula_profesional"  placeholder="su matricula"/>
            </div>            
        
        <!-- fin perfil-->
        <div class="">
        
            <div class="input-prepend span4">
                <span class="btn btn-primary input-small">Nombre</span>
                <input type="text" name="nombre"  placeholder="Su nombre completo" value="<?php echo @set_value('nombre')?>" required=""/>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-primary input-small">Apellidos</span>
                <input type="text" placeholder="Su apellido completo" name="apellidos" value="<?php echo @set_value('apellidos')?>" required=""/>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-primary input-small">Email</span>
                <input type="text" placeholder="ejemplo@gmail.com" name="email" value="<?php echo @set_value('email')?>" required=""/>
            </div>
            
            <div class="input-prepend span4">
                <span class="btn btn-primary input-small">CI</span>
                <input type="text" placeholder="Su carnet de Identidad" name="ci" value="<?php echo @set_value('ci')?>" required=""/>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-primary input-small">Red Social</span>
                <input type="text" placeholder="cuenta-red social que mas utiliza" name="face" value="<?php echo @set_value('face')?>" />
            </div>
            
            <div class="input-prepend span4">
                <span class="btn btn-primary input-small">Tel&eacute;fono</span>
                <input type="tel" pattern='\d\d\d\d\d\d\d\d' x-moz-errormessage="Ingrese un telefono valido 'xxxxxxxx'" value="<?php echo @set_value('fijo')?>"  name="fijo" placeholder=" Ej. 22457898"/>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-primary input-small">Celular</span> 
                <input type="tel" pattern='\d\d\d\d\d\d\d\d' x-moz-errormessage="Ingrese un telefono movil valido 'xxxxxxxx'" value="<?php echo @set_value('movil')?>" name="movil" required="" placeholder=" Ej. 79822222"/>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-primary input-small">Ciudad</span>
                <input type="text" name="ciudad" placeholder="La Paz, El Alto, Oruro .." value="<?php echo @set_value('ciudad')?>" required=""/>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-primary input-small">Direccion</span>
                <input type="text" name="direccion" placeholder="Z/V.fatima C/Los angeles Nro.1094" value="<?php echo @set_value('direccion')?>"  required=""/>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-primary input-small">Ocupacion</span>
                <input type="text" name="ocupacion"  placeholder="Abogado, ama de casa, etc." value="<?php echo @set_value('ocupacion')?>" required=""/>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-primary input-medium">Fecha Nacimiento</span>
                <select name="dd" value="<?php echo @set_value('ci')?>"  class="span1"><option value="">DD</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select><select class="span1" name="mm"><option value="">MM</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select><select class="span1" name="aa"><option value="">AAAA</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option></select></div>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-primary input-small">Contrasena</span>
                <input type="password" name="pass" value="<?php echo @set_value('pass')?>"required=""/>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-primary input-medium">Confirmar Contrasena</span>
                <input type="password" name="repass" value="<?php echo @set_value('repass')?>" required=""/>
            </div>
            </div>
                <div class="input-prepend row centrado">
                    <div class="input-prepend span1">
                        <input class="btn" type="submit" value="Registrar" name="submit_reg2" />               
                    </div>
                    <div class="input-prepend span5">                
                        <button class="btn" type="reset">Borrar</button>
                    </div>                                    
                </div>
        <div class="input-prepend row centrado">
        <div class="input-prepend span4">
                <span class="btn btn-primary input-medium">Subir foto del Usuario</span>
                <input type="file" name="userfile"/>
            </div>
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
 <!--  <script type="text/javascript">
        $(function()){
        $('#fechas').datepicker({viewMode:'years',format:'yyyy-mm-dd'});
        }
    </script>-->
    
	
	<!--FIN// CARGA SCRIPTS-->
