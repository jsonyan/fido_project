<div class="span10 boxBorder spacer"><!-- PANEL -->
	
	<!--Inner Container-->
	<div class="spacer" id="box-contenido">

    <div class="row-fluid">
		<div class="muted well well-small text-center" style="margin:10px;">
	        <p style="display:block; clear:both">
				<img src="<?php echo base_url();?>img/aplabmod.png" style="width:70%; display:block; margin:0 auto; clear:both;" class="boxBorder">
				<h1 style="margin:10px; display:block">Bienvenido <small>al panel de administracion</small></h1>
				Estas en la pagina de inicial de panel de administracion del sistema FIDO v1.0 (Beta). 
				<br>Puedes ver el <em style="color:#339933">videotutorial</em> con una breve introduccion de como manejar esta aplicacion.
				<br>Si quieres mas detalles, no dudes consultar el <em style="color:#339933">manual de usuario</em>, aunque ya no sera necesario, pues manejar este software te parecera cosa de ni&ntilde;os!
			</p>
			<p>
				<a href="#myModal" role="button" data-toggle="modal" href="#" class="btn btn-primary btn-large" style="margin:5px">Ver videotutorial &raquo;</a>
				<a href="#" class="btn btn-primary btn-large disabled" style="margin:5px">Revisar el manual &raquo;</a>
			</p>
		</div>	

        <h4 class="well well-small text-center span11 promo5"><i class="icon-star icon-white"></i> Notificaciones <i class="icon-star icon-white"></i></h4>
          <div class="row span11">
            <div class="span6">
                <a class="box-notif-button" href="<?php echo base_url()?>/backend/evaluacion">
                    <h4 class="well">Hay <span class="badge badge-info badge-notif"><?php if(isset($nro_de_solicitudes)){?><?php echo $nro_de_solicitudes;?><?php }?></span> solicitudes de adopcion</h4>
                </a>
            </div><!--/span-->
            <div class="span6">
                <a class="box-notif-button" href="<?php echo base_url()?>/backend/usuarios/mostrar_usuarios_aplab">
                    <h4 class="well">Se registraron <span class="badge badge-info badge-notif"><?php if(isset($nro_sol_vol)){?><?php echo $nro_sol_vol;?><?php }?></span>voluntarios que esperan ser aceptados</h4>
                </a>
            </div><!--/span-->
          </div><!--/row-->
		
    </div>	

	</div><!--Cerrarndo box-perfiles-->			
</div><!--Cerrarndo CELDA PANEL-->


	<!--INICIO// CARGA SCRIPTS -->
	
	<!--FIN// CARGA SCRIPTS-->

        
        
	    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h3 id="myModalLabel">Videotutorial Inicio en FIDO v.10</h3>
			</div>
			<div class="modal-body" id="cajita" style="padding:0;">
			<iframe width="560" height="315" src="http://www.youtube.com/embed/drPz6n6UXQY" frameborder="0" allowfullscreen></iframe>				
		
			</div>
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
			</div>
	
		</div>
        