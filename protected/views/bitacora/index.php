<?php
/* @var $this BitacoraController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Bitacoras',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create Bitacora', 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage Bitacora', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Bitacoras') ?>
<?php $this->widget('bootstrap.widgets.BsListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>