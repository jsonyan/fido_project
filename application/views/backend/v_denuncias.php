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
		<div class="span10">
			<!--INICIO//  
			##############################################################
			PANEL PRINCIPAL---COPIA TODO TU CODIGO DENTRO DEL DIV SPAN 10
			##############################################################
			-->
<script type="text/javascript">
   $(document).ready(function(){
      $("#contenedor").load("/backend/denuncia/lista");
      $(document).on("click", "#pagination-digg li a", function(e){
          e.preventDefault();
         var href = $(this).attr("href");
         $("#contenedor").load(href);
      }); 
   });
</script>
<style type="text/css">
#pagination-digg .active{
   background:#0099ff;
   color:white;
   font-weight:bold;
   display:block;
   float:left;
   padding:5px 13px;
}
</style>
<div id="contenedor">


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
