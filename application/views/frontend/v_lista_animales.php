<div class="row span12">
            <ul class="thumbnails">
            <?php foreach($animales_en_adopcion as $fila):?>
              <li class="span11">
                <div class="thumbnail span2">
                  <img src="<?php echo base_url()?>uploads/fotos-animal/<?php echo $fila->id_animal.'_0.jpg';?>" style="width: 260px !important; height: 180px !important;" alt="">
                  <span class="btn btn-primary btn-block">Soy &nbsp;<?php echo $fila->nombre_animal;?></span>                  
                </div>
                <div class="thumbnail span8">
                    <p><b class="text-error"><u>NOMBRE:</u></b>&nbsp;<b><?php echo $fila->nombre_animal;?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php if($fila->sexo_animal=='Hembra'){ ?><img src="<?php echo base_url();?>img/f1.jpg" style="width:35px;height: 35px;" alt=""><?php }?>
                    <?php if($fila->sexo_animal=='Macho'){ ?><img src="<?php echo base_url();?>img/macho.jpg" style="width:40px;height: 40px;" alt=""><?php }?>
                    <a href="<?php echo base_url();?>frontend/usuario" class="btn btn-primary btn-small pull-right">Adoptar</a></p>                                    
                     <dl>
                        <dt class="text-success">RAZA:&nbsp;<?php echo $fila->raza;?></dt>                                     
                        <dt>CARACTERISTICAS:</dt>
                        <dd><?php echo $fila->caracteristicas;?></dd>
                        <dd><?php echo $fila->nombre_animal;?> es un lindo cachorrito que lo encontr&eacute; abandonado en un paradero. Me gustar&iacute;a que alguno de ustedes pudiese darle un lindo hogar a esta bella mascota. Les aseguro que sera su amigo mas fiel y cari&ntilde;oso.</dd>
                      </dl>                                     
                </div>
              </li>
            <?php endforeach;?>
              <hr />              
            </ul>
            <div class="pagination pagination-centered" id="pagination-digg">
                <ul>
                    <?php echo $pag_links;?>
                </ul>
            </div>
</div>
        