<?php
/* @var $this NoticiasController */
/* @var $model Noticias */
/* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>
    <?php echo $form->textFieldControlGroup($model,'NOT_TITULO',array('maxlength'=>100)); ?>
    <?php echo $form->textAreaControlGroup($model,'NOT_CONTENIDO',array('rows'=>6)); ?>

    <div class="form-actions">
        <?php echo BsHtml::submitButton('Buscar',  array('color' => BsHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

<?php $this->endWidget(); ?>
