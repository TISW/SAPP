<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'enableAjaxValidation'=>true,
)); ?>
	<?php echo $form->errorSummary($user); ?>
	<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Ingresar Usuario</h3>
      </div>
      <div class="panel-body">
        <div class="form-group">
		<div class="input-group">
			<span class="input-group-addon">Usuario</span>
			<select name="Usuario[PER_ID]" id="Usuario_PER_ID" class="form-control" >
				<?php foreach ($personas as $persona):?>
					<option value="<?php echo $persona->PER_ID;?>" ><?php echo $persona->Nombre; ?></option>
				<?php endforeach; ?>
			</select>
		</div> 
	</div>  
	<div class="form-group">
			<div class="input-group">
			<span class="input-group-addon">Contraseña</span>
		<?php echo $form->passwordField($user,'USU_PASSWORD',array('maxlength'=>32,'class'=>"form-control",'placeholder'=>'Si no asigna Contraseña, Se creara una automaticamente * Los primeros 5 digitos del rut','required'=>'')); ?>
		<?php echo $form->error($user,'USU_PASSWORD'); ?>
				</div> 
	</div>
	<div class="form-group">
		<div class="input-group">
			<span class="input-group-addon">Tipo de Usuario</span>
			<select name="Usuario[USU_ESTADO]" id="Usuario_USU_ESTADO" class="form-control" >
				<option value="H" >Habilitar</option>
				<option value="N" >No Habilitar</option>
			</select>
		<?php echo $form->error($user,'role'); ?>
		</div> 
	</div>  
	<div class="form-group">
		<button type="submit" class="btn btn-default">Ingresar</button>
	</div>
      </div>
    </div>

<?php $this->endWidget(); ?>
