<?php
/* @var $this PracticasController */

$this->breadcrumbs=array(
	'Practicas'=>array('/practicas'),
	'CrearPractica',
);
?>
 
<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Crear Práctica</h3>
      </div>
      <div class="panel-body">
        
      </div>

     
      <div class="form">
<!--<?php
$form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'layout' => BsHtml::FORM_LAYOUT_HORIZONTAL,
    'enableAjaxValidation' => true,
    'id' => 'user_form_horizontal',
    'htmlOptions' => array(
        'class' => 'bs-example'
    )
));
?>

    <!--<?php echo $form->errorSummary($model); ?>-->
    <div class="form-grup">            
      <?php echo $form->labelEx($model,'RUT :'); ?>

<?php echo $form->dropDownList($model,'PER_ID',CHtml::listData(persona::model()->findAll(array('order' => 'PER_RUT')), 'PER_ID', 'PER_RUT'),array ('prompt'=>'Seleccione...','class'=>'form-control'));?>
<?php echo $form->error($model,'PER_ID'); ?>
</div>

<br>

<div class = "form-grup">
    <?php echo $form->label($model,'Tipo'); ?><br>
    <?php if (Yii::app()->user->name == 'admin') 
              {
                echo 
                    $form->dropDownList(
                      $model,'PRA_TIPO',
                      array('1'=>'Práctica 1','2'=>'Práctica 2'), 
                      array('options' => array($model->PRA_TIPO=>array('selected'=>true)),'class'=>'form-control'))
                  ;
              }?>
    
    </div>
    <div class="form-grup">
        
    
              <?php echo $form->labelEx($model,'Carrera :'); ?>
<?php echo $form->dropDownList($model,'CAR_CODIGO',CHtml::listData(carrera::model()->findAll(array('order' => 'CAR_CODIGO')), 'CAR_CODIGO', 'CAR_NOMBRE'),array ('class'=>'form-control'));?>
<?php echo $form->error($model,'CAR_CODIGO'); ?>
    </div>

    <div class="form-grup">
        <?php echo $form->label($model,'Descripcion'); ?><br>
        <?php echo $form->textField($model,'PRA_DESCRIPCION',array('maxlength'=>32,'class'=>"form-control",'placeholder'=>'Opcional','required'=>'')) ?>
    </div>

    <div class="form-grup">
        <?php echo $form->label($model,'INGRESO'); ?><br>
        <?php $fecha=strftime( "%Y-%m-%d  %H:%M", time() );?>
        <?php echo $form->textField($model,'PRA_INICIO',array('value'=>$fecha, 'readonly'=>'false','maxlength'=>32,'class'=>"form-control",'required'=>'')); ?>
        

    
    <div class="form-grup submit">
        <br><?php echo CHtml::submitButton('Enviar'); ?>
    </div>
 
<?php $this->endWidget();?>
</div><!-- form -->
    </div>