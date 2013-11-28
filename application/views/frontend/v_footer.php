      <div class="row spacer">
        <div class="span3 shadow-box">
          <h5 class="text-center promo1">Adopta un compañer@
	        <a class="btn btn-mini pull-right" style="margin:0 10px;" href="<?php echo base_url()?>frontend/adopcion">Ver mas &raquo;</a>
		  </h5>
          <img class="img-center img-novp" src="<?php echo base_url();?>posts/1adop.jpg" alt=""> 
        </div>
        <div class="span3 shadow-box">
          <h5 class="text-center promo2">¿Quieres ser voluntario?
	        <a class="btn btn-mini pull-right" style="margin:0 10px;" href="<?php echo base_url()?>frontend/inicio/voluntariado">Ver mas &raquo;</a>
		  </h5>
          <img class="img-center img-novp" src="<?php echo base_url();?>posts/2vol.jpg" alt=""> 
        </div>
        <div class="span3 shadow-box">
          <h5 class="text-center promo3">Realiza una donacion
	        <a class="btn btn-mini pull-right" style="margin:0 10px;" href="#">Ver mas &raquo;</a>
		  </h5>
          <img class="img-center img-novp" src="<?php echo base_url();?>posts/3don.jpg" alt="">
       </div>
        <div class="span3 shadow-box">
          <h5 class="text-center promo4">Denuncia el maltrato
	        <a class="btn btn-mini pull-right" style="margin:0 10px;" href="<?php echo base_url()?>frontend/inicio/maltrato">Ver mas &raquo;</a>
		  </h5>
          <img class="img-center img-novp" src="<?php echo base_url();?>posts/4den.jpg" alt="">
        </div>
      </div>
</div><!--Cerrarndo FILA-->

      <div class="navbar-inner">
        <p style="line-height:35px">&copy; APLAB - Amor Por Los Animales Bolivia 2013</p>
      </div>

</div>	<!--Cerrarndo Container-->

	
    <script src="<?php echo base_url(); ?>js/jquery.form.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/holder/holder.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>
	<script>
		$(function(){
			$('#login-form').find('form').click(function (e) {
				e.stopPropagation();
			});			
		});
	</script>

</body>
</html>
