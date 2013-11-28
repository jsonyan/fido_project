
            <ul class="thumbnails">
            <?php foreach($animales_en_adopcion as $fila):?>
              <li class="span12">
                <div class="thumbnail span2">
                
                  <img src="<?php echo base_url()?>uploads/fotos-animal/<?php echo $fila->id_animal.'_0.jpg';?>"  width="260" height="180"alt="">
                  <span class="box-nombres">Soy &nbsp;<?php echo $fila->nombre_animal;?></span>                  
                </div>
                <div class="thumbnail span9">
                <!--#########################################################-->
                <form class="pull-right" action="<?php echo base_url();?>frontend/evaluacion/ver_formulario" method="post">
                        <input type="hidden" name="id_a" value="<?php echo $fila->id_animal?>"/>
                        <input type="submit" class="btn btn-primary btn-small " value="Adoptar"/>
                </form>
                <!--##########################################################--->
                    <p><b class="text-error"><u>NOMBRE:</u></b>&nbsp;<b><?php echo $fila->nombre_animal;?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php if($fila->sexo_animal=='Hembra'){ ?><img src="<?php echo base_url();?>img/f1.jpg" width="35" height="35"alt=""><?php }?>
                    <?php if($fila->sexo_animal=='Macho'){ ?><img src="<?php echo base_url();?>img/macho.jpg" width="40" height="40"alt=""><?php }?>
                                                        
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
            
            <div class="pagination pagination-small pagination-centered" id="pagination-digg">
                <ul>
                    <?php echo $pag_links;?>
                </ul>
            </div>

