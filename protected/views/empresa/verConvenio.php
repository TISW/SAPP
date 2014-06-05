<div class="panel panel-primary">
 <div class="panel-heading">
  <h3 class="panel-title">Convenios con la empresa</h3>
 </div>
 <div class="panel-body">
  <table class="table">
   <thead>
    <tr>
     <th>Nombre de la empresa</th>
     <th>Rut</th>
     <th>Estado</th>
     <th>Descripción</th>
     <th>Ingreso</th>
     <th>Término</th>
     <th>Opciones</th>
    </tr>
   </thead>

   <tbody>
    <?php foreach ($convEmpresa as $conv):?>
    <tr>
      <td><?php echo $conv->EMP_NOMBRE;?></td>
      <td><?php echo $conv->EMP_RUT;?></td>
      <?php
      if($conv->CON_ESTADO == 0) echo '<td>No vigente</td>';
      else echo '<td>Vigente</td>';

      ?>
      <td><?php echo $conv->CON_DESCRIPCION;?></td>
      <td><?php echo $conv->CON_INGRESO;?></td>
      <td><?php echo $conv->CON_TERMINO;?></td>
      <td>
      <div class="btn-group">
       <div class="input-group">
        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
         <span class="glyphicon glyphicon-cog"></span>
        </button>
        <ul class="dropdown-menu pull-right">
          <li> 
            <a href="<?php echo Yii::app()->createUrl(""); ?>">Editar</a>
            <li> 
             <a href="<?php echo Yii::app()->createUrl(""); ?>">Eliminar</a>
            </li>
          </li>
        </ul>
      </td>

    </tr>
    
     <?php endforeach; ?>
 </tbody>
</table>
</div>
</div>
