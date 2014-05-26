	<?php $this->beginContent('//layouts/sappLayout'); ?>

	<div class="row">
		<div class="col-xs-12 col-sm-2 col-md-2">
			<ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
				<!--Redirecciona a páginas.. (controlador/acccion)-->
				<li><a href="<?php echo Yii::app()->createUrl('Noticias/AgregarNoticia'); ?>">Agregar Noticia</a></li> 
				<li><a href="<?php echo Yii::app()->createUrl('Noticias/AdministrarNoticia'); ?>">Administrar Noticias</a></li>
				<li><a href="<?php echo Yii::app()->createUrl('Noticias/publicarNoticia'); ?>">Ingresar Alumno</a></li>
				<li><a href="<?php echo Yii::app()->createUrl('Noticias/AdministrarPublicacionesNoticia'); ?>">Igresar Bitácoras</a></li>
			</ul>
		</div>
		<div class="col-xs-12 col-sm-10 col-md-10">
			<?php 
			if(isset($content)) 
				echo $content;
			else 
				echo '
			<div class="alert alert-danger">
				<strong>No se a cargado la Pagina</strong> No tiene los permisos para acceder a la pagina.
			</div>'
			;?>
		</div>
	</div>
	<?php $this->endContent(); ?>