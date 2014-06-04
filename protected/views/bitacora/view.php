<?php
/* @var $this BitacoraController */
/* @var $model Bitacora */
?>

<?php
$this->breadcrumbs=array(
	'Bitacoras'=>array('index'),
	$model->BIT_ID,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List Bitacora', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create Bitacora', 'url'=>array('create')),
	array('icon' => 'glyphicon glyphicon-edit','label'=>'Update Bitacora', 'url'=>array('update', 'id'=>$model->BIT_ID)),
	array('icon' => 'glyphicon glyphicon-minus-sign','label'=>'Delete Bitacora', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->BIT_ID),'confirm'=>'Are you sure you want to delete this item?')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage Bitacora', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('View','Bitacora '.$model->BIT_ID) ?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'BIT_ID',
		'PRA_ID',
		'BIT_INGRESO',
		'BIT_TITULO',
		'BIT_CONTENIDO',
		'BIT_ESTADO',
	),
)); ?>