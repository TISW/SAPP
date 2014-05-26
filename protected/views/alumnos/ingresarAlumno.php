<?php
/* @var $this AlumnosController */

$this->breadcrumbs=array(
	'Alumnos'=>array('/alumnos'),
	'IngresarAlumno',
);
?>

<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Ingresar Alumno</h3>
      </div>
      <div class="panel-body">


<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'users-form',
    'enableAjaxValidation'=>true,
)); ?>
 
    <?php echo $form->errorSummary($alumno); ?>
    <div class="form-grup">
        <?php echo $form->label($alumno,'RUT'); ?><br>
        <?php echo $form->textField($alumno,'PER_RUT',array('maxlength'=>32,'class'=>"form-control",'placeholder'=>'Ej.1234567-0','required'=>'')) ?>

    </div><br>
    <div class="form-grup">
        <?php echo $form->label($alumno,'NOMBRE'); ?><br>
        <?php echo $form->textField($alumno,'PER_NOMBRE',array('maxlength'=>32,'class'=>"form-control",'placeholder'=>'Nombre','required'=>'')) ?>
    </div><br>
    <div class="form-grup">
        <?php echo $form->label($alumno,'CORREO'); ?><br>
        <?php echo CHtml::activeEmailField($alumno,'PER_CORREO',array('maxlength'=>32,'class'=>"form-control",'placeholder'=>'Ej.correo@correo.cl','required'=>'')) ?>
    </div><br>
    <div class="form-grup">
        <?php echo $form->label($alumno,'TELEFONO'); ?><br>
        <?php echo $form->textField($alumno,'PER_TELEFONO',array('maxlength'=>32,'class'=>"form-control",'placeholder'=>'Telefono','required'=>'')) ?>
    </div><br>
    
    <div class="form-grup submit">
        <br><?php echo CHtml::submitButton('Enviar'); ?>
    </div>
 
<?php $this->endWidget(); ?>
</div><!-- form -->
      </div>
    </div>

