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
<h1>Página Bitácoras Alumno</h1>'
?>
