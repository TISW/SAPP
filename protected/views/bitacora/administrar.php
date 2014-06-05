<?php 
$form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'layout' => BsHtml::FORM_LAYOUT_INLINE,
    'enableAjaxValidation' => true,
    'id' => 'user_form_inline',
    'htmlOptions' => array(
        'class' => 'bs-example'
    )
));
?>
<?php if (Yii::app()->user->name == 'admin'){?>

<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Página Bitácoras Admin</h3>
      </div>
      <div class="panel-body">

        <?php //echo $form->textFieldControlGroup($bitacora, 'BIT_TITULO');?>
        <?php echo BsHtml::submitButton('', array('color' => BsHtml::BUTTON_COLOR_PRIMARY, 'icon' =>BsHtml::GLYPHICON_PLUS));?>
        
        <table class="table">
          <thead>
            <tr>
              <th>Nombre del Alumno</th>
              <th>Tipo de Práctica</th>
              <th>Empresa</th>
              <th>Fecha de Ingreso</th>
              <th>Seleccionar</th>
            </tr>
          </thead>
          <tbody>
              <?php foreach ($bitacora as $bit):?>
              <tr>
                <td><?php echo $bit->PER_NOMBRE;?></td>
                <td><?php echo $bit->PRA_TIPO;?></td>
                <td><?php echo $bit->EMP_NOMBRE;?></td>
                <td><?php echo $bit->BIT_INGRESO;?></td>
                <td>
                    <div class="btn-group">
                        <div class="input-group">
                          <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-cog"></span>
                          </button>

                          <ul class="dropdown-menu pull-right">
                            <li> 
                              <a href="<?php echo Yii::app()->createUrl("Bitacora/verBitacora/$bitacora->PRA_ID"); ?>">Ver Bitácora</a>
                            </li>

                            <li> 
                              <a href="<?php echo Yii::app()->createUrl("Bitacora/Editar/$bitacora->PRA_ID"); ?>">Editar Bitácora</a>
                            </li>

                            <li> 
                              <a href="<?php echo Yii::app()->createUrl("Bitacora/Eliminar/$bitacora->PRA_ID"); ?>">Eliminar Bitácora</a>
                            </li>
                          </ul>
                         
                        </div> 
                    </div>
                </td>
               
              </tr>
              <?php endforeach; ?>
          </tbody>
        </table>
<?php } ?>


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
<?php echo $form->errorSummary($prac); ?>
<?php $this->endWidget();?>
