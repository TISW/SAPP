<?php

class BitacoraController extends Controller
{
	public $layout='//layouts/bitacorasLayout'; //Todas páginas iguales hasta rules.

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
				'actions'=>array('index','view','administrar','agregar','buscar','editar','eliminar','ver'), //permite el ingreso a... al admin.
				'users'=>array('admin'),
			),
			array('allow', 
				'actions'=>array('index','agregar', 'administrar'), //permite el ingreso a... al alumno
				'users'=>array('alumno'),
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

	//funciones*

	public function actionAdministrar()
	{
		$nuevo = BitAdmin::model()->findAll(); //Guarda todas las Bitácoras
		$bitacora2= new BitAdmin();

		if(Yii::app()->user->name == 'admin')
		{
			$bitacora=BitAdmin::model()->findAll();
		}
		if(Yii::app()->user->name == 'profesor')
		{
			$bitacora=BitAdmin::model()->findByAttributes(array('CAR_CODIGO'=>Yii::app()->user->carrera));
		}
		if(Yii::app()->user->name == 'alumno')
		{
			$bitacora=BitAdmin::model()->findByAttributes(array('PER_ID'=>Yii::app()->user->ID)); //Guarda el ID de la persona
		}
			$this->render('administrar', array('bitacora'=>$bitacora, 'nuevo'=>$nuevo, 'bitacora2'=>$bitacora2));	
	}

	public function actionAgregar($id)
	{
		$bitacora=new Bitacora;
		
		if (isset($_POST['Bitacora']))  //existe la vista
			{
				$bitacora->attributes=$_POST['Bitacora']; //recibir todos los atributos que voy a modificar

				//guardar datos de la Bitacora
				$bitacora->PRA_ID = $id;
				$bitacora->BIT_INGRESO=date("Y-m-d H:i:s");

				if($bitacora->save())
						{
							Yii::app()->user->setFlash('success','<div class="alert alert-success">
	  						<strong>Felicidades!</strong> Se han guardado los datos correctamente.
							</div>');
						} 	

			}

		$this->render('agregar', array('model'=>$bitacora,));
	}

	public function actionEditar()
	{
		$this->render('editar');
	}

	public function actionEliminar()
	{
		$this->render('eliminar');
	}

	public function actionVer()
	{
		$this->render('ver');
	}

}