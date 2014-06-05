<?php

class EmpresaController extends Controller
{
	public $layout='//layouts/empresasLayout'; //Todas páginas iguales hasta rules.

	public function filters()
	{
		return array(
			'accessControl', 
			'postOnly + delete', 
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('login'),
				'users'=>array('*'), //todos
			),
			array('allow', 
				'actions'=>array('index','view','buscar','convenio','editar','ingresar','mostrar','verConvenio','editarConvenio','crearConvenio'), //permite el ingreso a... al admin.
				'users'=>array('admin'),
			),
			array('allow',
				'actions'=>array('update','logout'),
				'users'=>array('@'), // todos, estando autotentificado.
			),
			array('allow',
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny', //denegar
				'users'=>array('*'),
			),
		);
	}


	public function actionBuscar()
	{
		$this->render('buscar');
	}

	public function actionConvenio()
	{
		//mostrar todas las empresas
		$empresas = Empresa::model()->findAll();
		$this->render('convenio', array('empresas'=>$empresas));


	}

	public function actionVerConvenio($id)
	{
		$convEmpresa = convenios::model()->findAll($id='EMP_ID');
		$this->render('verConvenio', array('convEmpresa'=>$convEmpresa));
	}

	public function actionCrearConvenio()
	{
		$this->render('crearConvenio');
	}

	public function actionEditar()
	{
		$this->render('editar');
	}

	public function actionIngresar()
	{
		$model=new Empresa;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Empresa']))
		{
			$model->attributes=$_POST['Empresa'];
			if($model->save()){Yii::app()->user->setFlash('success','<div class="alert alert-success">
	  						<strong>Felicidades!</strong> Se han guardado los datos correctamente.
							</div>');}
				//$this->redirect('index');
		}

		$this->render('ingresar',array(
			'model'=>$model,
		));
	}

	public function actionMostrar()
	{
		$this->render('mostrar');
	}

	public static function activeEmailField($model,$attribute,$htmlOptions=array())
	{
    	self::resolveNameID($model,$attribute,$htmlOptions);
    	self::clientChange('change',$htmlOptions);
    	return self::activeInputField('email',$model,$attribute,$htmlOptions);
	}
}