<?php
/* @var $this EmpresaController */
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.Rut.min.js',CClientScript::POS_END);
Yii::app()->clientScript->registerScript('Validar_rut', "
    $('#Empresa_EMP_RUT').Rut({
  on_error: function(){ alert('Rut incorrecto'); }
});
");


$this->breadcrumbs=array(
	'Empresa'=>array('/empresa'),
	'Ingresar',
);
?>
<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Ingresar Empresa</h3>
      </div>
      <div class="panel-body">

        <?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="grabado_ok">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'users-form',
    'enableAjaxValidation'=>true,
)); ?>
 
    <?php echo $form->errorSummary($model); ?>
    <div class="form-grup">
        <?php echo $form->label($model,'RUT'); ?><br>
        <?php echo $form->textField($model,'EMP_RUT',array('maxlength'=>32,'class'=>"form-control",'placeholder'=>'Ej.12345678-0','required'=>'')) ?>

    </div>
    <div class="form-grup">
        <?php echo $form->label($model,'NOMBRE'); ?><br>
        <?php echo $form->textField($model,'EMP_NOMBRE',array('maxlength'=>32,'class'=>"form-control",'placeholder'=>'Nombre','required'=>'')) ?>
    </div>
    <div class="form-grup">
        <?php echo $form->label($model,'CORREO'); ?><br>
        <?php echo CHtml::activeEmailField($model,'EMP_CORREO',array('maxlength'=>32,'class'=>"form-control",'placeholder'=>'Ej.correo@correo.cl','required'=>'')) ?>
    </div>
    <div class="form-grup">
        <?php echo $form->label($model,'TELEFONO'); ?><br>
        <?php echo $form->textField($model,'EMP_TELEFONO',array('maxlength'=>32,'class'=>"form-control",'placeholder'=>'Telefono','required'=>'')) ?>
    </div>
    <div class="form-grup">
        <?php echo $form->label($model,'Direccion'); ?><br>
        <?php echo $form->textField($model,'EMP_DIRECCION',array('maxlength'=>32,'class'=>"form-control",'placeholder'=>'Direccion','required'=>'')) ?>
    </div>
    <div class="form-grup">
        <?php echo $form->label($model,'CONTACTO'); ?><br>
        <?php echo $form->textField($model,'EMP_CONTACTO',array('maxlength'=>32,'class'=>"form-control",'placeholder'=>'Nombre Contacto','required'=>'')) ?>
    </div>
    <div class="form-grup">
        <?php echo $form->label($model,'INGRESO'); ?><br>
        <?php $fecha=strftime( "%Y-%m-%d  %H:%M", time() );?>
        <?php echo $form->textField($model,'EMP_INGRESO',array('value'=>$fecha, 'readonly'=>'false','maxlength'=>32,'class'=>"form-control",'required'=>'')); ?>
        <!--<?php echo $form->textField($model,'EMP_INGRESO') ?>-->
    </div>

    
    <div class="form-grup submit">
        <br><?php echo CHtml::submitButton('Enviar'); ?>
    </div>
 
<?php $this->endWidget(); ?>
</div><!-- form -->
      </div>
    </div>
