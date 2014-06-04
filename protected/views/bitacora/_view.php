<?php
/* @var $this BitacoraController */
/* @var $data Bitacora */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('BIT_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->BIT_ID),array('view','id'=>$data->BIT_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRA_ID')); ?>:</b>
	<?php echo CHtml::encode($data->PRA_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BIT_INGRESO')); ?>:</b>
	<?php echo CHtml::encode($data->BIT_INGRESO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BIT_TITULO')); ?>:</b>
	<?php echo CHtml::encode($data->BIT_TITULO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BIT_CONTENIDO')); ?>:</b>
	<?php echo CHtml::encode($data->BIT_CONTENIDO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BIT_ESTADO')); ?>:</b>
	<?php echo CHtml::encode($data->BIT_ESTADO); ?>
	<br />


</div>