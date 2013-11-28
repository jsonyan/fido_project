<div class="boxRounded spacer" style="background-color:#FFFFFF">
	
	<div class="navbar promo4">
		<div class="navbar-inner">
		<div class="container">
			<a  class="brand"style="color:white;">EVALUACI&Oacute;N</a>

			<!--INICIO//  BARRA DE HERRAMIENTAS -->
					<div class="btn-group pull-right">										
						<a href="<?php base_url() ?>/frontend/evaluacion" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Ver animales en adopci&oacute;n">
							<i class="icon-plus icon-white"></i>Ver animales en adopci&oacute;n</a>                                                 	 												
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
    <form action="<?php echo base_url().'frontend/evaluacion/add_evaluacion'?>" name="form_evaluacion" method="POST">
         <input type="hidden" name="adoptante" value="<?php echo $this->session->userdata('email') ?>" />
         <input type="hidden" name="id_animal" value="<?php echo $codigo_a;?>"/>
         <center><h4>DATOS DE LA VIVIENDA Y FAMILIA</h4></center>
        <div class="row span12">
        <p class="text-info">Por favor llene el siguiente formulario. Elija la opcion que corresponda.</p></div>
        <div class=" row span12">
            <div class="input-prepend span4">
                <span class="btn btn-success disabled input-medium">Tipo de Vivienda</span>
                <select class="input input-medium" name="tipo_vivienda" id="tipo_vivienda" onChange="evaluar(this.value);">
                    <option value="Casa">Casa</option>
                    <option value="Departamento">Departamento</option>
                    <option value="Un Ambiente">Un Ambiente</option>
                    <option value="Condominio">Condominio</option>
                </select>
            </div>
            <div class="input-prepend span4" style="display: none;" id="con">
                <span class="btn input-medium disabled">Permiten Animales:</span>
                        <select class="input-mini" id="permite_animal1" name="permite_animal1">
                            <option>No</option>
                            <option>Si</option>
                            <option>No sabe</option>
                        </select>
            </div>
            <div class="input-prepend span4">
                <label class="checkbox inline">Su Vivienda Cuenta Con:</label>
                <label class="checkbox inline">
                    <input type="checkbox" name="jardin"id="jardin" value="Con Jardin">Jardin
                </label>
                <label class="checkbox inline">
                    <input type="checkbox" id="patio" name="patio" value="Con Patio">Patio
                </label>
                <label class="checkbox inline">
                    <input type="checkbox" id="terraza" name="terraza" value="Con Terraza">Terraza
                </label>
                <label class="checkbox inline">
                    <input type="checkbox" id="duplex" name="duplex" value="Duplex">Duplex
                </label>                
            </div> 
            </div> 
        <div class="row span12">                      
            <div class="input-prepend span4">
            <span class="btn btn-success disabled input-small">Su vivienda es:</span>
                <select id="vivienda" name="vivienda">
                    <option value="Propio">Propio(No de sus Padres)</option>
                    <option value="Alquilado">Alquilado</option>
                    <option value="Anticretico">Anticretico</option>
                    <option value="De mis papas">De mis pap&aacute;s</option>
                </select>
            </div>
            
            <div class="row span12" style="display:none" id="siotro">
              <fieldset>
                <legend class="span11"> Si su vivienda no es propia</legend>
                <div class="input-prepend span9">
                    <span class="btn input-expanded disabled">Permiten Animales/Estan de Acuerdo con que ud. adopte un animal:</span>
                        <select class="input-mini" id="permite2" name="permite2">
                            <option>No</option>
                            <option>Si</option>
                            <option>No sabe</option>
                        </select>
                </div>
                <div class="input-prepend span6">
                    <span class="btn input-expanded disabled">Nombre del padre o madre /due&ntilde;o de casa:</span>
                    <input class="input-large" type="text"name="dueno" id="dueno" />
                </div>
                <div class="input-prepend span4">
                    <span class="btn disabled input-small"> Telefono:</span>
                    <input class="input-medium" type="number" name="teldueno" id="teldueno"/>
                </div>                    
                </fieldset>
            </div>
            <div class="input-prepend span4">
                        <span class="btn btn-success disabled input-large">Cuantas personas viven en casa</span>
                        <input class="input-mini"  type="number" min="1"name="nro_persona"/>
            </div>
           <div class="input-prepend span4">
                <span class="btn btn-success disabled input-medium">Tiene Ninos:</span>
                <select class="input input-mini"id="ninos" name="ninos">
                        <option value="no">No</option>
                        <option value="si">Si</option>
                </select>
           </div>
           <div class="input-prepend span12"style="display:none;" id="d2">
               <div class="input-prepend span3">
                    <span class="btn input-medium disabled">Cuantos ni&ntilde;os son?</span>
                    <input class="input-small"  type="number" min="1" name="nro_ninos"/>
               </div>
               <div class="input-prepend span3">
                    <span class="btn input-medium disabled">Edad de los Ni&ntilde;os:</span>
                    <input class="input-small"   placeholder=" 2-3-4"type="text" name="edad_ninos"/>
               </div>
           </div>
        </div>
        <div class="row span12">
            <div class="input-prepend span11">
                <center><h4>DATOS RELACIONADOS AL BIENESTAR DEL ANIMAL DE COMPANIA</h4></center>
                
            </div>
            <div class="row span11">
            <p class="text-info">En su hogar, el animal de compania permanecera:.</p></h4>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-success disabled input-small">En el Dia: </span>
                <select class="span2" name="dia" id="dia">
                    <option value="Dentro de la casa">Dentro de la casa</option>
                    <option value="Fuera de la casa">Fuera de casa</option>
                </select>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-success disabled input-small">En la Noche: </span>
                <select class="span2" name="noche" id="noche" >
                    <option value="Dentro de la casa">Dentro de la casa</option>
                    <option value="Fuera de la casa">Fuera de la casa</option>
                </select>
            </div>

            <div class="input-prepend span4" style="display:none;" id="cadena">
                <span class="btn input-medium disabled">El Perro estara:</span>
                    <select name="pcadena" id="pcadena" >
                        <option value="Suelto">Suelto</option>
                        <option value="Con cadena">Con cadena</option>
                	</select>
            </div>
        <div class="input-prepend span4"style="display:none;" id="razon">
            <span class="btn input-medium disabled">Explique las razones.</span>
            <textarea rows="2" name="motivo" id="motivo" ></textarea>
        </div>
        <div class="row span12">
            <div class="input-prepend span11">
                <span class="btn btn-success disabled" style="column-rule-style: solid;">Esta de acuerdo en esterilizar al perr@ o gat@ que desea adoptar?</span>
                <select class="input-mini" name="deacuerdo" id="deacuerdo">
                        <option>Si</option>
                        <option>No</option>
                        <option>No Sabe</option>
                </select>
            </div>
        </div>
        <div class="row span12">
            <div class="input-prepend span4">
                <span class="btn btn-success disabled">Tiene otros animales:</span>
                    <select class="input input-mini"name="otros_animales" id="otros_animales">
                        <option value="No">No</option>
                        <option value="Si">SI</option>
                    </select>
            </div>
        </div>
        <!-- tiene o no animales-->
        <div class="row span12" style="display:none;" id="sitiene">
            <fieldset>
                <legend class="span11"> Perros</legend>
                    <div class="input-prepend span3">
                        <span class="btn btn-warning disabled">Nro. de perros</span>
                        <input class="input input-small"type="number" name="nperro"/>
                    </div>            
                    <div class="input-prepend span3">
                        <span class="btn disabled">Nro. de hembras</span>
                        <input  class="input input-small"type="number" name="nhp"/>
                    </div>
                    <div class="input-prepend span3">
                        <span class="btn disabled">Nro. Machos</span>
                        <input class="input input-small" type="number" name="nmp"/>
                    </div>
                    <div class="input-prepend span4">
                        <span class="btn  input-small disabled">Edades</span>
                        <input class="input input-xlarge" type="text" name="edad_perro"/>
                    </div>
                    <div class="input-prepend span4">
                        <span class="btn  input-small disabled">Razas</span>
                        <input type="text" class="input input-xlarge" name="raza_perro"/>
                    </div>
            </fieldset>
            <fieldset>
                <legend class="span11"> Gatos</legend>
                    <div class="input-prepend span3">
                        <span class="btn btn-warning disabled">Nro. de Gatos</span>
                        <input class="input input-small" type="number" name="ngato"/>
                    </div>
                    <div class="input-prepend span3">
                        <span class="btn disabled">Nro. de hembras</span>
                        <input class="input input-small" type="number" name="nhg"/>
                    </div>
                    <div class="input-prepend span3">
                        <span class="btn disabled">Nro. de machos</span>
                        <input class="input input-small" type="number" name="nmg"/>
                    </div>
        
                    <div class="input-prepend span4">
                        <span class="btn disabled input-small">Edades</span>
                        <input class="input input-xlarge" type="text" name="edad_gato"/>
                    </div>
                    
                    <div class="input-prepend span4">
                        <span class="btn input-small disabled">Razas</span>
                        <input class="input input-xlarge" type="text" name="raza_gato"/>
                    </div>
                    <fieldset>
                        <legend class="span11"> Si tiene otros animales, indique cuales por favor.</legend>
                            <div class="input-prepend span9">
                                <span class="btn disabled">Otros animales</span>
                                <textarea class="input input-xxlarge" rows="2" name="otros_animales2"></textarea>    
                            </div>
                    </fieldset>
                    
            </fieldset>
            <fieldset>
                <legend class="span11">Informacion Adicional - Los animales que tiene::</legend>    
                    <div class="input-prepend span3">
                        <span class="btn input-medium disabled">Estan esterilizados?</span>
                        <select class="input input-mini"name="estan_esterilizado">
                            <option>Si</option>
                            <option>No</option>
                        </select>
                    </div>
        
                    <div class="input-prepend span6">
                        <span class="btn input-small disabled">Por que?</span>
                        <textarea class="span4" rows="2"   name="porque"></textarea>
                    </div>
        
                    <div class="input-prepend span4">
                        <span class="btn input-medium disabled">Estos animales son:</span>
                        <select name="estos_son">
                                    <option>Sociables</option>
                                    <option>Agresivos</option>
                                    <option>Timidos</option>
                                    <option>Enfermos</option>
                        </select>
                    </div>
                    <div class="input-prepend span4">
                        <span class="btn input-medium disabled">Cuentan con veterinario</span>
                        <select name="con_veterinario" id="cveterinario">
                                    <option value="No">No</option>
                                    <option value="Si">Si</option>
                        </select>
                    </div>
                    <div  style="display: none;"class="input-prepend span4" id="vervete">
                        <span class="btn input-large disabled">Dirección y nombre del Dr@.</span>
                        <textarea class="span5" rows="2" id="siveter" name="dir_veterinario"></textarea>
                    </div>
            </fieldset>
        </div>
        <!-- end tiene o no animales-->
         <div class="input-prepend span4">
                <span class="btn btn-success disabled input-large">Adopto un perro y/o gato?.</span>
                <select class="input-mini" name="ya_adopto" id="ya_adopto">
                    <option value="No">No</option>
                    <option value="Si">Si</option>
                </select>
         </div>
         <div class="input-prepend span4"style="display:none;" id="siadopto">
                <span class="btn input-large disabled">Donde y cuando lo adopto?</span>
                <textarea class="span4" rows="2" name="adopto" id="adopto"></textarea>
         </div>
         <div class="input-prepend span4">
                <span class="btn btn-success disabled input-medium">Algun Comentario</span>
                <textarea class="span4" rows="2" name="comentario" id="comentario"></textarea>
         </div>
        </div>        
        <div class="row span11">             
                <input class="btn btn-success"type="submit"  name="submit"value="Enviar solicitud"/>
                                                              
                <a  class="btn"href="<?php echo base_url();?>frontend/evaluacion">Cancelar</a>
                <p>&nbsp;</p>
        </div>
             
        </div>
	</form>            


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
	<script src="<?php echo base_url(); ?>js/oculta.js"></script>
	<!--FIN// CARGA SCRIPTS-->
