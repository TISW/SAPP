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

<div class="panel panel-primary">
 <div class="panel-heading">
  <h3 class="panel-title">Nuevo convenio</h3>
 </div>

<div class="panel-body">
    <?php
        echo $form->textFieldControlGroup(convenio, 'username');
    ?>



</div>
</div>


<?php $this->endWidget(); ?>