<?php

$this->breadcrumbs=array(
	'Bitacora'=>array('/bitacora'),
	'Agregar',
);
?>

<!-- Si es admin -->
<?php if (Yii::app()->user->name == 'admin') echo '
<h1>Página Bitácoras Admin</h1>'
?>

<!-- Si es Alumno puede agregar bitácoras-->

<?php if (Yii::app()->user->name == 'alumno') echo '
<h1>Página Bitácoras Alumno</h1>'?>



<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Página Bitácoras Alumnos</h3>
      </div>
      <div class="panel-body">
        <textarea class="form-control" rows="5" name="User[username]" id="User_username"></textarea>
      </div>
    </div>