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

	public function actionAgregar()
	{
		$persona = BitAdmin::model()->findByAttributes(array('PER_ID'=>Yii::app()->user->ID)); //id de la persona que ingreso.
		$bitacora=new Bitacora; //Bitácora vacia, donde se insertará la nueva.
		$nuevo = BitAdmin::model()->findAll(); // Tiene todas las Bitácoras y los ID de la vista.
		
		if (isset($_POST['Bitacora']))  //existe la vista
			{
				$bitacora->attributes=$_POST['Bitacora']; //recibir todos los atributos que voy a modificar

				//guardar datos de la Bitacora
				foreach ($nuevo as $nuevo) // recorre Todas las Bitácoras
				{ 
					if($persona->PER_ID == $nuevo->PER_ID)
					{
				
						$bitacora->PRA_ID = $nuevo->PRA_ID;
						$bitacora->BIT_INGRESO=date("Y-m-d H:i:s");
					}
				}

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