
<?php if (Yii::app()->user->name == 'admin'){?>

<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Página Bitácoras Admin</h3>
      </div>
      <div class="panel-body">
        
        <table class="table">
  <thead>
    <tr>
      <th>ID_Bitácora</th>
      <th>Ingreso</th>
      <th>Título</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($bitacora as $bit):?>
      <tr>
        <td><?php echo $bit->BIT_ID;?></td>
        <td><?php echo $bit->BIT_INGRESO;?></td>
        <td><?php echo $bit->BIT_TITULO;?></td>
       
        <td><span></span></td>
      </tr>
      <?php endforeach; ?>
  </tbody>
</table>
<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="grabado_ok">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>
</div>
<?php  }?>


<?php if (Yii::app()->user->name == 'alumno'){?>    
	  <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Página Bitácoras Alumno</h3>
      </div>
      <div class="panel-body">
        
        <table class="table">
  <thead>
    <tr>
      <th>Título</th>
      <th>Contenido</th>
    </tr>
  </thead>
  <tbody>
  	  <?php foreach ($bitacora as $bit):?>
      <tr>
        <td><?php echo $bit->BIT_TITULO;?></td>
        <td><?php echo $bit->BIT_CONTENIDO;?></td>
       
        <td><span></span></td>
      </tr>
      <?php endforeach; ?>
  </tbody>
</table>

</div>
<?php } ?>
