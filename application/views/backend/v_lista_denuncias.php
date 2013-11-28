<table class="table table-condensed" id="nav1">
                          <thead>
                            <tr>
                              <th>Fecha de Envio</th>
                              <th>CODIGO</th>
                              <th>Nombre</th>
                              <th>Correo</th>
                              <th>Asunto</th>
                              <th>Descripcion de los hechos</th>
                              <th>Maltrat0</th>
                            </tr>
                          </thead>
                          <?php foreach($denuncias as $fila):?>
                            
                            <?php  if( $fila->leido=='0'){
                                $cambia1='error';
                                $cambia2='important';
                                $es_eva='No leido';
                            }?>
                            <?php  if( $fila->leido=='1'){
                                $cambia1='success';
                                $cambia2='warning';
                                $es_eva='Leido';
                            }?>                            
                          <?php echo "<tbody>";?>
                            <?php echo '<tr class="'?><?php echo $cambia1?><?php echo'">'?>
                              <?php echo"<td>";?><?php echo $fila->fecha_registro;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->id_maltrato;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->nombre;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->correo;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->asunto;?><?php echo"</td>";?>    
                              <?php echo"<td>";?><?php echo $fila->descripcion;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo $fila->maltratado;?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php $perfil='administrador';?><?php echo"</td>";?>
                              <?php echo"<td>";?><?php echo'<span class="label label-'?><?php echo $cambia2?><?php echo'">'?><?php echo $es_eva?><?php echo'</span>'?><?php echo"</td>";?>
                              <?php echo"<td>";?><a  class="btn btn-small btn-primary"  href="<?php echo base_url();?>backend/evaluacion/leer_solicitud/<?php echo $fila->id_maltrato;?> ">Leer</a><?php echo"</td>";?>
                            <?php echo"<tr>";?>
                          <?php echo"</tbody>";?>
                          <?php endforeach;?>
</table>
<div class="pagination pagination-centered" id="pagination-digg">
    <ul>
        <?php echo $pag_links;?>
    </ul>
</div>