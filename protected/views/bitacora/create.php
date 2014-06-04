<?php
/* @var $this BitacoraController */
/* @var $model Bitacora */
?>

<?php
$this->breadcrumbs=array(
	'Bitacoras'=>array('index'),
	'Create',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List Bitacora', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage Bitacora', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Create','Bitacora') ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>