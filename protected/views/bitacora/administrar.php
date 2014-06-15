<?php 
$form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'layout' => BsHtml::FORM_LAYOUT_INLINE,
    'enableAjaxValidation' => true,
    'id' => 'user_form_inline',
    'method'=>'get',
    'htmlOptions' => array(
        'class' => 'bs-example'
    )
));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
  $('.search-form').toggle();
  return false;
});");
?>

<?php if (Yii::app()->user->name == 'admin'){?>

<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Página Bitácoras Administrador</h3>
      </div>
      <div class="panel-body">
        <h3 class="panel-title"><?php echo BsHtml::button('Busqueda Avanzada',array('class' =>'search-button', 'icon' => BsHtml::GLYPHICON_SEARCH,'color' => BsHtml::BUTTON_COLOR_PRIMARY), '#'); ?></h3><br>
        <div class="search-form" style="display:none">
            <?php $this->renderPartial('_search',array(
                'bitacora'=>$bitacora,
            )); ?>
        </div>
        <?php //echo $form->textField($bitacora, 'PER_NOMBRE', array('placeholder' => 'Pablo Morales Alarcón'));?>
        <?php //echo BsHtml::submitButton('', array('color' => BsHtml::BUTTON_COLOR_PRIMARY, 'icon' =>BsHtml::GLYPHICON_PLUS));?>
        
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
              <?php foreach ($buscar as $bit):?>
              <?php  if($bit->BIT_ESTADO == 'Enviada'){?>
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
                              <a href="<?php echo Yii::app()->createUrl("Bitacora/ver/$bit->BIT_ID"); ?>">Ver Bitácora</a>
                            </li>

                            <li> 
                              <a href="<?php echo Yii::app()->createUrl("Bitacora/Editar/$bit->BIT_ID"); ?>">Editar Bitácora</a>
                            </li>

                            <li> 
                              <a href="<?php echo Yii::app()->createUrl("Bitacora/Eliminar/$bit->BIT_ID"); ?>">Eliminar Bitácora</a>
                            </li>
                          </ul>
                         
                        </div> 
                    </div>
                </td>
               
              </tr>
              <?php } ?>
              <?php endforeach; ?>
          </tbody>
        </table>
<?php } ?>



<?php $this->endWidget();?>
