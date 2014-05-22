<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'enableAjaxValidation'=>true,
)); ?>
	<?php //Se vacia el Password para no entregar la contraseña al usuario
	$user->USU_PASSWORD='';
	echo $form->errorSummary($user);
	echo $form->errorSummary($persona); ?>

	<!--Inicio Fomrulario Editar Usuario-->
	<div>
	<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Editar información de <?php echo $persona->PER_NOMBRE; ?></h3>
      </div>
      <div class="panel-body">
        <div class="form-group">
		<div class="input-group">
		<span class="input-group-addon">Contraseña</span>
			<?php echo $form->passwordField($user,'USU_PASSWORD',array('maxlength'=>32,'class'=>"form-control",'placeholder'=>'Solo si desea Cambiar su Contraseña, rellene este campo','required'=>'')); ?>
			<?php echo $form->error($user,'USU_PASSWORD'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="input-group">
		<span class="input-group-addon">Telefono</span>

		<?php echo $form->textField($persona,'PER_TELEFONO',array('maxlength'=>20,'class'=>"form-control",'placeholder'=>'Telefono de Contacto','required'=>'')); ?>
		<?php echo $form->error($persona,'PER_TELEFONO'); ?>

		</div>
	</div>

	<?php if (Yii::app()->user->name == 'admin'||(Yii::app()->user->name == 'profesor'&&Yii::app()->user->ID !=$persona->PER_ID) )
	{
		echo'
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">Estado</span>'.
				$form->dropDownList(
					$user,'USU_ESTADO',
					array('H'=>'Habilitado','N'=>'No Habilitado'), 
					array('options' => array($user->PER_ID=>array('selected'=>true)),'class'=>'form-control')).		
			'</div>
		</div>'
			;
	}?>
	<div class="form-group">
		<button type="submit" class="btn btn-default">Guardar</button>
	</div>
	</div>
      </div>
    </div>
	
	<!--Fin Fomrulario Editar Usuario-->
<?php $this->endWidget(); ?>