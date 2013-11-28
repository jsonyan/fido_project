<div class="boxRounded spacer" style="background-color:#FFFFFF">
	
	<div class="navbar promo4">
		<div class="navbar-inner">
		<div class="container">
			<a  class="brand"style="color:white;">Reg&iacute;strate para adoptar</a>

			<!--INICIO//  BARRA DE HERRAMIENTAS -->
					<div class="btn-group pull-right">										
						<a href="<?php echo base_url().'frontend/inicio'?>" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Igresar">
							<i class="icon-plus icon-white"></i>Iniciar Sesi&oacute;n</a> 
                        
                       	 												
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
	<p> &nbsp;</p>
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
            <?php if($this->session->flashdata('existe') ? $this->session->flashdata('existe') : ''):?>    
		<div class="alert alert-error span7">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong> ERROR!!</strong>
               <?php echo $this->session->flashdata('existe') ? $this->session->flashdata('existe') : '' ?>
            </div>
            <?php endif;?> 
			
		
       
    <?php echo form_open(base_url('frontend/usuario/registro_nuevo')) ?>
        <div class="">
            <div class="input-prepend span4">
                <span class="btn btn-warning input-small">Nombre</span>
                <input type="text" name="nombre"  placeholder="Su nombre completo" value="<?php echo @set_value('nombre')?>" required=""/>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-warning input-small">Apellidos</span>
                <input type="text" placeholder="Su apellido completo" name="apellidos" value="<?php echo @set_value('apellidos')?>" required=""/>
            </div>
            
            <div class="input-prepend span4">
                <span class="btn btn-warning input-small">CI</span>
                <input type="text" placeholder="Su carnet de Identidad" name="ci" value="<?php echo @set_value('ci')?>" required=""/>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-warning input-small">Red Social</span>
                <input type="text" placeholder="Facebook-twitter" name="face" value="<?php echo @set_value('face')?>" />
            </div>     
            <div class="input-prepend span4">
                <span class="btn btn-warning input-small">Telefono</span>
                <input type="tel" placeholder="Ej. 2 2456734" pattern='\d\d\d\d\d\d\d\d' x-moz-errormessage="Ingrese un telefono valido 'xxxxxxxx'" name="fijo" value="<?php echo @set_value('fijo')?>"/> 
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-warning input-small">Celular</span>
                <input type="tel" placeholder="Ej. 71212345" pattern='\d\d\d\d\d\d\d\d' x-moz-errormessage="Ingrese un telefono movil valido 'xxxxxxxx'" name="movil"  value="<?php echo @set_value('movil')?>" required=""/>            
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-warning input-small">Ciudad</span>
                <input type="text" name="ciudad" placeholder="La Paz, El Alto, Oruro .." value="<?php echo @set_value('ciudad')?>"required=""/>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-warning input-small">Direccion</span>
                <input type="text" name="direccion" placeholder="Z/V.fatima C/Los angeles Nro.1094" value="<?php echo @set_value('direccion')?>"required=""/>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-warning input-small">Ocupacion</span>
                <input type="text" name="ocupacion"  placeholder="Abogado, ama de casa, etc." value="<?php echo @set_value('ocupacion')?>"required=""/>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-warning input-medium">Fecha Nacimiento</span>
                <select name="dd" class="span1"><option value="">DD</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select><select class="span1" name="mm"><option value="">MM</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select><select class="span1" name="aa"><option value="">AAAA</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option></select></div>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-warning input-small">Email</span>
                <?php echo form_input($campos['input_email']) ?>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-warning input-small">Contrase&ntilde;a</span>
                <?php echo form_password($campos['input_password']) ?>
                
            </div>
            
            <div class="input-prepend span4">
               <!-- <span class="btn btn-warning input-medium">Confirmar Contrase&ntilde;a</span>
                <input type="password"  placeholder=" Confirma tu password" name="repass" id="repass" onfocus="validatePass(document.getElementById('pass'), this);" oninput="validatePass(document.getElementById('pass'), this);" required=""/>-->
                <p><?php echo recaptcha_get_html($key) ?></p>
                <?php echo form_hidden('token', $token) ?>
            </div>
            <div class="input-prepend span4">
                <input type="hidden" value="pweb" name="perfil" />
            </div>            
    </div>
    
        <div class="row span11">             
            
                <a  class="btn  pull-right btn-small" href="<?php echo base_url();?>frontend/inicio">Cancelar</a>
                <input class="btn btn-primary pull-right btn-small" type="submit"  name="submit_registro" value="Registrarme"/>&nbsp;&nbsp;                                                                                                              
        </div>                          
</form>
<div class="span12">
<p>&nbsp;</p>
</div>
<p>&nbsp;</p>
			<!--FIN//  
			##############################################################
			PANEL PRINCIPAL---COPIA TODO TU CODIGO DENTRO DEL DIV SPAN 10
			##############################################################
			-->
		</div>
    </div>	

	</div><!--Cerrarndo box-perfiles-->			
<!--Cerrarndo CELDA PANEL-->


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
