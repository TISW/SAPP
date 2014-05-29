<?php
$form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'enableAjaxValidation' => true,
    'id' => uniqid('user_'),
    'htmlOptions' => array(
        'class' => 'bs-example'
    )
));

$this->breadcrumbs=array(
	'Bitacora'=>array('/bitacora'),
	'Agregar',
);
?>

<!-- Si es admin -->
<?php if (Yii::app()->user->name == 'admin') echo '
<h1>Página Bitácoras Admin</h1>'
?>

<!-- Si es Alumno puede agregar bitácoras-->

<?php if (Yii::app()->user->name == 'alumno')?>



<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Página Bitácoras Alumnos</h3>
      </div>

      <form method="post">
      <table>
      <div class="panel-body">

      <?php echo $form->textFieldControlGroup($model, 'BIT_TITULO', array('placeholder' => 'Bitacora 28-05-14'));?>
      
      <?php echo $form->textArea($model, 'BIT_CONTENIDO');?> <!-- AREA DE TEXTO-->
      <br>
      <?php echo BsHtml::submitButton('Enviar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY));?>

      </div>

      </table>
      </form> 
    </div>

    <?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="grabado_ok">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
    <?php endif; ?>
    <?php echo $form->errorSummary($model); ?>
    <?php $this->endWidget();?>


