<?php
/* @var $this NoticiasController */
/* @var $model Noticias */


$this->breadcrumbs=array(
	'Noticiases'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('icon' => 'glyphicon glyphicon-list','label'=>'List Noticias', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create Noticias', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#noticias-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php
$this->beginWidget('bootstrap.widgets.BsPanel', array(
    'title' => 'Administrar Noticias',
    'type' => BsHtml::PANEL_TYPE_PRIMARY
));
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo BsHtml::button('Busqueda Avanzada',array('class' =>'search-button', 'icon' => BsHtml::GLYPHICON_SEARCH,'color' => BsHtml::BUTTON_COLOR_PRIMARY), '#'); ?></h3>
    </div>
    <div class="panel-body">
        <div class="search-form" style="display:none">
            <?php $this->renderPartial('_search',array(
                'model'=>$model,
            )); ?>
        </div>
        <!-- search-form -->
<table class="table">
  <thead>
    <tr>
      <th>Titulo</th>
      <th>Opciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($buscar as $user):?>
      <tr>
        <td><a href="<?php echo Yii::app()->createUrl("Noticias/view/$user->NOT_ID"); ?>"> <?php echo $user->NOT_TITULO;?></a></td>
        <td>
          <center>
            <div class="btn-group">
              <div class="input-group">
                <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                  <span class="glyphicon glyphicon-cog"></span>
                </button>
                <ul class="dropdown-menu pull-right">
                <li><a href="<?php echo Yii::app()->createUrl("Usuario/editar/$user->NOT_ID"); ?>">Editar Usuario</a></li>
                  <!--trigger Modal-->
                  <li data-toggle="modal" data-target="#questionDelete<?php echo $user->NOT_ID?>"><a>Eliminar Usuario</a></li>
                </ul>
              </div> 
            </div>
          </center>
        </td>
      </tr>
              <!-- Modal -->
    <!--Fin de Modal-->
    <?php endforeach; ?>
  </tbody>
</table>
    </div>
</div>
<?php
$this->endWidget();
?>


