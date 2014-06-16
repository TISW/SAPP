<?php
$form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'layout' => BsHtml::FORM_LAYOUT_HORIZONTAL,
    'enableAjaxValidation' => true,
    'id' => 'user_form_horizontal',
    'htmlOptions' => array(
        'class' => 'bs-example'
    )
));
?>
<?php
/* @var $this BitacoraController */

$this->breadcrumbs=array(
	'Bitacora'=>array('/bitacora'),
	'Editar',
);
?>

<?php if (Yii::app()->user->name == 'admin'){?>
<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Bitácora del Alumno <?php echo $alumno->PER_NOMBRE ?></h3>
      </div>

      	
      	<div class="panel-body"> <!-- Mostrar la bitácora del alumno..-->
      		<?php echo $form->textFieldControlGroup($alumno, 'BIT_TITULO') ?>
      		<?php echo $form->textAreaControlGroup($alumno, 'BIT_CONTENIDO') ?>
      		<?php 
                echo 
                    $form->dropDownListControlGroup(
                      $alumno,'BIT_ESTADO',
                      array('Enviada'=>'Enviada','No enviada'=>'No enviada'), 
                      array('options' => array($alumno->BIT_ESTADO=>array('selected'=>true)),'class'=>'form-control'));
              ?>
                <div align="center">
                <?php echo BsHtml::submitButton('Enviar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY));?>
                </div>
</div>

<?php } ?>

<?php if (Yii::app()->user->name == 'alumno'){?> 

<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Bitácora del Alumno <?php echo $alumno->PER_NOMBRE ?></h3>
      </div>

        
        <div class="panel-body"> <!-- Mostrar la bitácora del alumno..-->
          <?php echo $form->textFieldControlGroup($alumno, 'BIT_TITULO') ?>
          <?php echo $form->textAreaControlGroup($alumno, 'BIT_CONTENIDO') ?>
          <?php 
                echo 
                    $form->dropDownListControlGroup(
                      $alumno,'BIT_ESTADO',
                      array('Enviada'=>'Enviada','No enviada'=>'No enviada'), 
                      array('options' => array($alumno->BIT_ESTADO=>array('selected'=>true)),'class'=>'form-control'));
              ?>
                <div align="center">
                <?php echo BsHtml::submitButton('Enviar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY));?>
                </div>
        </div>
</div>  

<?php } ?>

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="grabado_ok">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
    <?php endif; ?>
<?php echo $form->errorSummary($alumno); ?>
<?php echo $form->errorSummary($nueva); ?>
<?php $this->endWidget();?>
