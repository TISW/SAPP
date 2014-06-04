
<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <?php /*ESTA VISTA ES LA BUSQUEDA AVANZADA*/ ?>
    <br>
    
    <?php echo $form->textField($bitacora,'BIT_INGRESO', array('prepend'=>'Fecha de Ingreso')); ?>
    <?php //echo $form->textField($bitacora,'BIT_TITULO',array('maxlength'=>100)); ?>
    <?php //echo $form->textFieldControlGroup($bitacora,'BIT_ESTADO',array('maxlength'=>1)); ?>
    <br>

    <div class="form-actions">
        <?php echo BsHtml::submitButton('Buscar',  array('color' => BsHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

<?php $this->endWidget(); ?>
