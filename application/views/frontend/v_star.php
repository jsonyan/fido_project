<div class="boxRounded spacer" style="background-color:#FFFFFF">
	<h4 class="promo4" style="padding-left:10px"><?php echo isset($seccion) ? $seccion : "Programa star"?></h4>
    <p>&nbsp;</p>
			<!--INICIO//  
			##############################################################
			PANEL PRINCIPAL---COPIA TODO TU CODIGO DENTRO DEL DIV SPAN 10
			##############################################################
			-->
            <?php if(isset($mensaje)){?>
                <p style="color:blue" ><?php echo $mensaje;?></p>
              <?php }?>
          
<script type="text/javascript">
   $(document).ready(function(){
      $("#contenedor").load("/frontend/star/lista");
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
   padding:3px 9px;
}
</style> 
<p>&nbsp;</p>

<div  class="" id="contenedor">
	</div>
 <p> &nbsp;</p>
</div>


<!-- COPIAR TU SCRIPT (INICIO) -->
<script type="text/javascript">
//alert("Holamudno");
</script>
<!-- COPIAR TU SCRIPT (FIN) -->
