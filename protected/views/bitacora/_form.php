<?php
/* @var $this BitacoraController */
/* @var $model Bitacora */
/* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id'=>'bitacora-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldControlGroup($model,'PRA_ID',array('maxlength'=>10)); ?>
    <?php echo $form->textFieldControlGroup($model,'BIT_INGRESO'); ?>
    <?php echo $form->textFieldControlGroup($model,'BIT_TITULO',array('maxlength'=>100)); ?>
    <?php echo $form->textAreaControlGroup($model,'BIT_CONTENIDO',array('rows'=>6)); ?>
    <?php echo $form->textFieldControlGroup($model,'BIT_ESTADO',array('maxlength'=>1)); ?>

    <?php echo BsHtml::submitButton('Submit', array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>

<?php $this->endWidget(); ?>
