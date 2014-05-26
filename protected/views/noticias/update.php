<?php
/* @var $this NoticiasController */
/* @var $model Noticias */
?>

<?php
$this->breadcrumbs=array(
	'Noticiases'=>array('index'),
	$model->NOT_ID=>array('view','id'=>$model->NOT_ID),
	'Update',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List Noticias', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create Noticias', 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>'View Noticias', 'url'=>array('view', 'id'=>$model->NOT_ID)),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage Noticias', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Update','Noticias '.$model->NOT_ID) ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>