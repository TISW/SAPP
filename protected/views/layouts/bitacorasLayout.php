	<?php $this->beginContent('//layouts/sappLayout'); ?>

	<div class="row">
		<div class="col-xs-12 col-sm-2 col-md-2">
			<ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
				<!--Redirecciona a páginas.. (controlador/acccion)-->
				<!-- Si es Admin -->
				
				<?php if (Yii::app()->user->name == 'admin') echo '
            	<li><a href="'.Yii::app()->createUrl('Bitacora/Administrar').'">Bitácoras</a></li>
            	
            	<li><a href="'.Yii::app()->createUrl('Bitacora/Buscar').'">Buscar Bitácoras</a></li>
            	<li><a href="'.Yii::app()->createUrl('Bitacora/Editar').'">Editar Bitácoras</a></li>
            	<li><a href="'.Yii::app()->createUrl('Bitacora/Eliminar').'">Eliminar Bitácoras</a></li>'
            	?>
				
				<!-- Si es Alumno -->
				<?php if (Yii::app()->user->name == 'alumno') echo '
            	<li><a href="'.Yii::app()->createUrl('Bitacora/Agregar').'">Bitácora</a></li>
            	<li><a href="'.Yii::app()->createUrl('Bitacora/Agregar').'">Agregar Bitácoras</a></li>'
            	
            	?>
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