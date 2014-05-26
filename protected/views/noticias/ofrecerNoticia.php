<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id'=>'ofrece-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>
    <p class="help-block">Los campos con <span class="required">*</span> son requeridos.</p>
        <?php echo $form->errorSummary($model); ?>
        <?php echo $form->textFieldControlGroup(Noticias::model()->findByPk($model->NOT_ID), 'NOT_TITULO', array('disabled' => true));?>
        <?php echo $form->dropDownListControlGroup($model,'CAR_CODIGO',CHtml::listData(Carrera::model()->findAll(),'CAR_CODIGO','CAR_NOMBRE'), array('empty' => 'Elija la Carrera')); ?>
        <label>Fecha Inicio*</label>
        <?php echo $form->dateField($model,'OFR_INICIO'); ?>
        <br>
        <label>Fecha Termino*</label>
        <?php echo $form->dateField($model,'OFR_TERMINO'); ?>
        <br>
        <?php echo $form->dropDownListControlGroup($model,'OFR_ESTADO',array('Activo'=>'Activo','Inactivo'=>'Inactivo')); ?>
            <?php echo BsHtml::submitButton('Agregar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>
<?php $this->endWidget(); ?>
        <table class="table">
          <thead>
            <tr>
              <th>Carrera</th>
              <th>Fecha Inicio</th>
              <th>Fecha Termino</th>
              <th>Estado</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php 
             $data=Ofrece::model()->findAllByAttributes(array('NOT_ID'=>$model->NOT_ID));
             foreach ($data as $datos):?>
              <tr>
                <td><?php echo Carrera::model()->findByPk($datos->CAR_CODIGO)->CAR_NOMBRE?></td>
                <td><?php echo $datos->OFR_INICIO;?></td>
                <td><?php echo $datos->OFR_TERMINO;?></td>
                <td><?php echo $datos->OFR_ESTADO;?></td>
                <td>
                  <center>
                    <div class="btn-group">
                      <div class="input-group">
                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                          <span class="glyphicon glyphicon-cog"></span>
                        </button>
                        <ul class="dropdown-menu pull-right">
                        <li><a href="<?php echo Yii::app()->createUrl("Usuario/editar/$datos->OFR_ID"); ?>">Editar Usuario</a></li>
                          <!--trigger Modal-->
                          <li data-toggle="modal" data-target="#questionDelete<?php echo $datos->OFR_ID?>"><a>Eliminar Usuario</a></li>
                        </ul>
                      </div> 
                    </div>
                  </center>
                </td>
              </tr>
                      <!-- Modal -->
            <div class="modal fade" id="questionDelete<?php echo $datos->OFR_ID?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Eliminar Ususario</h4>
                  </div>
                  <div class="modal-body">
                    Desea realmente eliminar La publicación <?php echo Noticias::model()->findByPk($datos->NOT_ID)->NOT_TITULO;?> para <?php echo Carrera::model()->findByPk($datos->CAR_CODIGO)->CAR_NOMBRE;?>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" onclick="location.href='<?php echo Yii::app()->createUrl("noticias/eliminarOfrecimiento/$datos->OFR_ID"); ?>'">Eliminar de todas Formas</button>
                  </div>
                </div>
              </div>
            </div>
            <!--Fin de Modal-->
            <?php endforeach; ?>
          </tbody>
        </table>
              </div>
            </div>