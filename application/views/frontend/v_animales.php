<div class="boxRounded spacer" style="background-color:#FFFFFF">
	
	<div class="navbar promo4">
		<div class="navbar-inner">
		<div class="container">
			<a  class="brand"style="color:white;">Necesitamos tu ayuda, Adopta! NO compres!!</a>

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
    <div class="row">
		<div class="span10">
			<!--INICIO//  
			##############################################################
			PANEL PRINCIPAL---COPIA TODO TU CODIGO DENTRO DEL DIV SPAN 10
			##############################################################
			-->
            <p>&nbsp;</p>
<script type="text/javascript">
   $(document).ready(function(){
      $("#contenedor").load("/frontend/adopcion/lista");
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
	
	<!--FIN// CARGA SCRIPTS-->
