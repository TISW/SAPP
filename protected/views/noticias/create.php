<?php
/* @var $this NoticiasController */
/* @var $model Noticias */
?>

<?php
$this->breadcrumbs=array(
	'Noticiases'=>array('index'),
	'Create',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List Noticias', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage Noticias', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Agregar','Noticia') ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>