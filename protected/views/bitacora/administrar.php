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
        <h3 class="panel-title">Panel Admin</h3>
    </div>
      <div class="panel-body">
            <?php echo $form->textFieldControlGroup($bitacora, 'BIT_TITULO');?> 
      </div>
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
        <td><?php echo $bit->CAR_CODIGO;?></td>
        <td><?php echo $bit->PER_RUT;?></td>
        <td><?php echo $bit->PER_NOMBRE;?></td>
        <td><?php echo $bit->PRA_ESTPRACTICA;?></td>
        <td><?php echo $bit->PRA_TIPO;?></td>
        
        
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div><?php  } ?>

<?php
$this->endWidget();
?>
