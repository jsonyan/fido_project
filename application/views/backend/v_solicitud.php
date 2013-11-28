<div class="span10 boxBorder"><!-- PANEL -->
	
	<div class="navbar">
		<div class="navbar-inner">
		<div class="container">
			<a class="brand">Registro de Usuarios</a>

			<!--INICIO//  BARRA DE HERRAMIENTAS -->
					<div class="btn-group pull-right">										
						<a href="<?php echo base_url()?>backend/usuarios" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Nueva Donación">
							<i class="icon-plus icon-white"></i>Registrar Nuevo Usuario</a> 
                        
                        <a href="<?php echo base_url()?>backend/usuarios/mostrar_usuarios_aplab" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Ver donaciones monetarias">
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
		<div class="span10" id="solicitud">
			<!--INICIO//  
			##############################################################
			PANEL PRINCIPAL---COPIA TODO TU CODIGO DENTRO DEL DIV SPAN 10
			##############################################################
			-->
          <script language="javascript">
                function imprimir_solicitud(solicitud)
                {var ficha=document.getElementById(solicitud);
                    var ventimp=window.open(' ','popimpr');
                    ventimp.document.write(ficha.innerHTML);
                    ventimp.document.close();
                    ventimp.print();
                    ventimp.close();}
            </script>
            


    <style media="print" type="text/css">
              @media screen {
                  .no-imprimir {                      
                      width: 260px;
                      height: 180px;
                  }
                }
                
                @media print {
                  
                  #printSection, #printSection * {
                    visibility:visible;
                  }
                  #printSection {
                    position:absolute;
                    left:0;
                    top:0;
                  }
                  .no-imprimir{
                    display: inline;
                    width: 0 !important;
                    height: 0 !important;
                  }
                }
                
            </style>

            
            
               <div class="">
                    <ul class="thumbnails">           
                      <li class="span9">
                        <?php foreach($adoptante as $u):?>
                        <div class="thumbnail span2">                
                          <img class="no-imprimir" src="<?php  echo base_url();?>img/APLAB.jpg"  alt="">
                          <span class="box-nombres">Adoptante</span>                  
                        </div>
                        <div class="thumbnail span4 ">   
                            <p>
                                
                                <h4 class="text-center"> Datos del adoptante</h4>
                                <strong> Nombre:&nbsp;</strong> <?php echo $u->nombre;?>&nbsp;&nbsp;<?php echo $u->apellidos;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <strong>CI:</strong> <?php echo $u->ci;?><br />
                                <strong>Direcci&oacute;n:&nbsp;</strong><?php echo $u->direccion;?><br />
                                <strong>Tel&eacute;fonos:&nbsp;</strong><?php echo $u->telefono;?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $u->celular;?><br />
                                <strong>Correo electr&oacute;nico:&nbsp;</strong><?php echo $u->email;?><br />
                                <strong>Ciudad:&nbsp;</strong><?php echo $u->ciudad;?><br />
                                <?php endforeach;?>
                            </p>
                            <p>
                                <?php foreach($animal as $a):?>
                                <h4 class="text-center"> Datos del Animal que se desea adoptar</h4>
                                <strong>Cod. de Animal:&nbsp;&nbsp;</strong><?php echo $a->id_animal;?><br />
                                <strong>Sexo Animal:&nbsp;&nbsp;</strong><?php echo $a->sexo_animal;?>&nbsp;<strong>Raza:&nbsp;</strong><?php echo $a->raza;?><br />
                                
                            </p>
                        </div>
                        <div class="thumbnail span2">                
                          <img  class="no-imprimir"src="<?php echo base_url();?>img/animal/<?php echo $a->foto_animal;?>" style="width:260px;height: 180px;" alt="">
                          <span class="box-nombres"><?php echo $a->nombre_animal;?></span>
                          <?php endforeach;?>                  
                        </div>
                      </li>                                 
                    </ul>
                </div>
                <div class="">                  
                      <div class="span8">
                            <h2 class="text-center">SOLICITUD DE ADOPCI&Oacute;N</h2>
                            <div class="row span10">            
                            <?php if(isset($mensaje2)):?>            	        
                        
                            <div class="alert alert-error span7">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong> ERROR!!</strong>
                            <?php echo $mensaje2;?>
                        </div>                    
                        <?php endif;?>            
                        </div>
                            <div class="row span10">            
                            <?php if(isset($mensaje1)):?>            	        
                        
                            <div class="alert alert-success span7">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong> CORRECTO!!</strong>
                            <?php echo $mensaje1;?>
                        </div>                    
                        <?php endif;?>            
                        </div>
                        <div class="row span10">            
                                            <?php if(isset($mensaje)):?>            	        
                                        
                                            <div class="alert alert-error span7">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <strong> ERROR!!</strong>
                                            <?php echo $mensaje;?>
                                        </div>                    
                	                <?php endif;?>            
                        </div>
                            <img src="<?php  echo base_url();?>img/barra.jpg"  style="width:900px;height: 5px;" alt=""/>
                            <?php foreach($eva as $f):?>
                            <p> Evaluacion  <?php echo $f->id_evaluacion; ?></p>
                            <p class="text-right">La Paz, <?php echo $f->fecha_solicitud;?></p>
                         <dl>
                            <dt>Se&ntilde;ores APLAB</dt>
                            <dt>APLAB-BOLIVIA</dt><br />
                            <dt>Estimados Se&ntilde;ores APLAB:</dt>
                            <dd>El motivo de la presente solicitud es para hacerles conocer mi inter&eacute;s en el animalito <?php foreach($animal as $a):?><?php echo $a->nombre_animal;?></span>
                          <?php endforeach;?>. Por lo cual adjunto algunos datos para poder tener en mi hogar este hermoso animal.</dd><br />
                            <dt style="color: blue;">Datos referentes a mi hogar.</dt>                      
                            <dd><strong>Vivimos en un/una:&nbsp;</strong><?php echo $f->tipo_vivienda?></dd>
                            <dd><strong>Mi vivienda es: </strong> <?php echo $f->su_vivienda_es ?></dd>                            
                            <dd><strong>Mi <?php echo $f->tipo_vivienda?> cuenta: </strong></dd>                            
                             <ul class="unstyled">                                
                                <li>
                                  <ul>
                                    <?php if ($f->jardin!='0'){echo '<li>'; echo $f->jardin;echo '</li>';}?>
                                    <?php if ($f->patio!='0'){ echo '<li>';echo $f->patio;echo '</li>';}?>
                                    <?php if ($f->terraza!='0'){ echo '<li>';echo $f->terraza;echo '</li>';}?>
                                    <?php if ($f->duplex!='0'){ echo '<li>';echo $f->duplex;echo '</li>';}?>
                                  </ul>
                                </li>                                
                              </ul>
                            <?php if($f->su_vivienda_es != 'De mis papas' and $f->su_vivienda_es != 'Propio' ){ ?>
                            <?php echo '<dd><strong>EL nombre del Due&ntilde;o de casa es: </strong>';?><?php echo $f->propietario;?><?php echo '</dd>';?>
                            <?php echo '<dd><strong>EL Tel&eacute;fono del Due&ntilde;o de casa es: </strong>';?><?php echo $f->fono_propietario;?><?php echo '</dd>';?>
                            <?php echo '<dd>Este propietario(a), ';echo $f->no_propio; echo ' me permitira tener este animal en casa.</dd>';}?>                                                          
                            <?php if($f->su_vivienda_es == 'De mis papas'){ ?>
                            <?php echo '<dd><strong>EL nombre de mi padre es:</strong>';?><?php echo $f->propietario;?><?php echo '</dd>';?>
                            <?php echo '<dd><strong>EL Tel&eacute;fono de mi padre es:</strong>';?><?php echo $f->fono_propietario;?><?php echo '</dd>';?>
                            <?php echo '<dd>';echo $f->no_propio; echo ' me permitir&aacute;n adoptar este animal.</dd>';}?>                            
                            <dd>En mi hogar vivimos <?php echo $f->nro_persona?> personas,&nbsp; </dd>                            
                            <?php  if ($f->ninos=='si'){?>
                            <?php echo '<dd>Tengo '; echo $f->nro_ninos; echo ' ni&ntilde;os, '; echo 'de edades  ';echo $f->edad_ninos; echo ' a&ntilde;os.</dd>';}?><br />
                            <dt style="color: blue;">Para el bienestar del animal</dt>
                            <dd>El animalito en el dia permanecer&aacute;:  <?php echo $f->dia;?> <?php if($f->dia=='Fuera de la casa'){ echo ', mientras este afuera el permanecera '; echo $f->cadena; }?>
                            <?php if($f->cadena=='Con cadena' and $f->dia=='Fuera de la casa'){ echo ' esto '; echo $f->motivo_cadena;} ?>.</dd>
                            <dd>El animalito en la noche permanecera:  <?php echo $f->noche;?> <?php if($f->noche=='Fuera de la casa'){ echo ', mientras este afuera el permanecera '; echo $f->cadena; }?>
                            <?php if($f->cadena=='Con cadena' and $f->noche=='Fuera de la casa'){ echo ' esto '; echo $f->motivo_cadena;} ?>.</dd>
                            <dd><?php echo $f->deacuerdo_esterilizado?> estoy de acuerdo con esterilizar al animalito que quiero adoptar.</dd>
                            <!--otros animales-->
                            <?php if($f->otros_animales=='Si') {?>
                                <?php  if ($f->nperro!=0)
                                    {
                                        echo '<dd>En mi familia tenemos '; echo $f->nperro;  echo' perros.';
                                        if ($f->nhp!='0')
                                        {
                                            echo $f->nhp;
                                            echo ' hembra(s),';
                                        }
                                        if ($f->nmp!='0')
                                        {
                                            echo $f->nmp;
                                            echo ' macho(s),';
                                        }
                                        if ($f->raza_perro!=' ')
                                        {
                                            echo 'su(s) raza(s) son/es: ';
                                            echo $f->raza_perro;                                            
                                        }                                        
                                       
                                        echo '</dd>';                                        
                                    }?>
                                <?php  if ($f->ngato!=0)
                                    {
                                        echo '<dd>En mi familia tenemos '; echo $f->ngato;  echo' gato(s).';
                                        if ($f->nhg!='0')
                                        {
                                            echo $f->nhg;
                                            echo ' hembra(s),';
                                        }
                                        if ($f->nmg!='0')
                                        {
                                            echo $f->nmg;
                                            echo ' macho(s),';
                                        }
                                        if ($f->raza_gato!=' ')
                                        {
                                            echo 'su(s) raza(s) son/es: ';
                                            echo $f->raza_gato;                                            
                                        }                                        
                                       
                                        echo '</dd>';                                        
                                    }?>
                                
                                <?php echo '<dd> Otros animales que pueda tener, '; echo $f->otros_animales2; echo'</dd>';?>
                                <?php echo '<dd> Estos animales '; echo $f->estan_esterilizado; echo' se encuentran esterilizados, porque '; echo $f->porque; echo', mis animalitos son '; echo $f->estos_son; echo'.</dd>';?>                                
                                <?php if ($f->con_veterinario=='Si'){
                                    echo '<dd> Mis animalitos son atendidos por la Dr./Dra. Sus datos son'; echo $f->dir_veterinario; echo'</dd>';}?>                                                               
                            <?php }?>
                                    <?php if($f->otros_animales=='No') {
                                        echo '<dd>No tengo ningun animal por lo que quiero adoptar este lindo animal.</dd>';
                                    }?>                            
                            <?php if($f->ya_adopto=='Si')
                            echo '<dd> Ya habia adoptado habia adoptado otro animal, y lo adopte en';echo $f->donde_adopto; echo'</dd>';?>
                            <dd><?php  echo $f->comentario?></dd><br />
                            <dd>Gracias por detenerse a considerar mi solicitud. Quedo a la espera de sus noticias, y que me den en adopcion este hermoso animal.</dd>                           
                          </dl>
                          
                      </div>
                      
                </div>
                
            

			<!--FIN//  
			##############################################################
			PANEL PRINCIPAL---COPIA TODO TU CODIGO DENTRO DEL DIV SPAN 10
			##############################################################
			-->
		</div >
        <div class="row pull-right">
        <div class="btn-toolbar" style="margin: 0;">
              <div class="btn-group dropup">
                <button class="btn btn-primary">Opciones</button>
                <button class="btn dropdown-toggle btn-primary" data-toggle="dropdown"><span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url();?>backend/evaluacion/leido/<?php echo $f->id_evaluacion;?>">Leido</a></li>
                  <li><a href="<?php echo base_url();?>backend/evaluacion/aceptar/<?php echo $f->id_evaluacion;?>">Aceptar</a></li>
                  <li><a href="<?php echo base_url();?>backend/evaluacion/rechazar/<?php echo $f->id_evaluacion;?>">Rechazar</a></li>
                  <li class="divider"></li>
                  <li><a href="javascript:imprimir_solicitud('solicitud')">Imprimir Solicitud</a></li>
                </ul>
              </div><!-- /btn-group -->  
              <div class="btn-group dropup">
                <button class="btn btn-primary">Salir</button>
                <button class="btn primary dropdown-toggle btn-primary" data-toggle="dropdown"><span class="caret"></span></button>
                <ul class="dropdown-menu pull-right">
                  <li><a href="#">Inicio</a></li>                  
                  <li class="divider"></li>
                  <li><a href="<?php echo  base_url()?>backend/evaluacion">Salir</a></li>
                </ul>
              </div>            
            </div>
            </div>
                  
<?php endforeach;?>


		
    </div>	

	</div><!--Cerrarndo box-perfiles-->			
</div><!--Cerrarndo CELDA PANEL-->


	<!--INICIO// CARGA SCRIPTS -->
	
	<!--FIN// CARGA SCRIPTS-->