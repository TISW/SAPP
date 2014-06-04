<?php
/* @var $this BitacoraController */
/* @var $model Bitacora */
?>

<?php
$this->breadcrumbs=array(
	'Bitacoras'=>array('index'),
	$model->BIT_ID=>array('view','id'=>$model->BIT_ID),
	'Update',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List Bitacora', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create Bitacora', 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>'View Bitacora', 'url'=>array('view', 'id'=>$model->BIT_ID)),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage Bitacora', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Update','Bitacora '.$model->BIT_ID) ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>