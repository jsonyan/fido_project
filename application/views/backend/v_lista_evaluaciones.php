<table class="table table-condensed" id="nav1">
                          <thead>
                            <tr>
                              <th>Fecha de Envio</th>
                              <th>CODIGO</th>
                              <th>Cod. de usuario</th>
                              <th>Cod. Animal</th>
                              <th>Comentario</th>
                            </tr>
                          </thead>
                          <?php foreach($evaluaciones as $fila):?>
                            
                            <?php  if( $fila->leido=='0'and $fila->aceptado=='0'){
                                $cambia1='error';
                                $cambia2='important';
                                $es_eva='No leido';
                            }?>
                            <?php  if( $fila->leido=='1'and $fila->aceptado=='0'){
                                $cambia1='warning';
                                $cambia2='warning';
                                $es_eva='Leido';
                            }?>
                            <?php  if( $fila->leido=='1'and $fila->aceptado=='2'){
                                $cambia1='success';
                                $cambia2='success';
                                $es_eva='Aceptado';
                            }?>
                            <?php  if( $fila->leido=='1'and $fila->aceptado=='1'){
                                $cambia1='info';
                                $cambia2='info';
                                $es_eva='Rechazado';
                            }?>
                            
                            
                          <?php echo "<tbody>";?>
                            <?php echo '<tr class="'?><?php echo $cambia1?><?php echo'">'?>
                              <?php echo"<td>";?><?php echo $fila->fecha_solicitud;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->id_evaluacion;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->usuario_id;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->animal_id;?><?php echo"</td>";?>    
                              <?php echo"<td>";?><?php echo $fila->comentario;?><?php echo"</td>";?>
                                                          
                              <?php echo"<td>";?><?php echo'<span class="label label-'?><?php echo $cambia2?><?php echo'">'?><?php echo $es_eva?><?php echo'</span>'?><?php echo"</td>";?>
                              <?php echo"<td>";?><a  class="btn btn-small btn-primary"  href="<?php echo base_url();?>backend/evaluacion/leer_solicitud/<?php echo $fila->id_evaluacion;?> ">Leer</a><?php echo"</td>";?>
                              <?php echo"<td>";?><a  data-toggle="modal" href="#myModal" class="btn btn-small btn-primary">Responder</a> <?php echo"</td>";?>
                              <?php echo"<td>";?><a  class="btn btn-small btn-active" href="<?php echo base_url();?>backend/evaluacion/delete_evaluacion/<?php echo $fila->id_evaluacion;?>">Eliminar</a><?php echo"</td>";?>
                            <?php echo"<tr>";?>
                          <?php echo"</tbody>";?>
                          <?php endforeach;?>
</table>
<div class="pagination pagination-centered" id="pagination-digg">
    <ul>
        <?php echo $pag_links;?>
    </ul>
</div>    
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 id="myModalLabel">Enviar E-mail</h3>
            </div>
            <div class="modal-body">
              <h4>Aplab - Bolivia</h4>
                 
    <?php echo form_open(base_url('backend/evaluacion/envio_de_email')) ?>
        <div class="">
        
            <div class="input-prepend span4">
                <span class="btn btn-warning input-small">Para</span>
                <input type="text" name="email" required=""/>
            </div>
            <div class="input-prepend span4">
                <span class="btn btn-warning input-small">CC</span>
                <input type="text" placeholder="Correo alternativo" name="alternativo" required=""/>
            </div>
            
            <div class="input-prepend span4">
                <span class="btn btn-warning input-small">Asunto</span>
                <input type="text" placeholder="Asunto" name="asunto" required=""/>
            </div>
            
            <div class="input-prepend span6">
                <span class="btn btn-warning input-small">Mensaje</span>                
                <textarea rows="5" name="mensaje"></textarea>
            </div>                 
            
            </div>
             
        <div class="row span4">                                         
                <input class="btn btn-primary pull-right btn-small" type="submit"  name="enviar" value="Enviar"/>&nbsp;&nbsp;                                                                                                              
        </div>           
    </div>
                             
  </form>
            
            <div class="modal-footer">
              <button class="btn" data-dismiss="modal">Cancelar</button>
              
            </div>
</div>
          
