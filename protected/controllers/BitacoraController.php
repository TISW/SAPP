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
				'actions'=>array('index','agregar', 'administrar', 'editar'), //permite el ingreso a... al alumno
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
		$bitacora= new BitAdmin;
		if(Yii::app()->user->name == 'admin')
		{
			if(isset($_GET['BitAdmin']))
			{
				$bitacora->attributes=$_GET['BitAdmin'];				
			}
		}
		if(Yii::app()->user->name == 'profesor')
		{
			$bitacora=BitAdmin::model()->findByAttributes(array('CAR_CODIGO'=>Yii::app()->user->carrera));
		}
		if(Yii::app()->user->name == 'alumno')
		{
			$bitacora=BitAdmin::model()->findByAttributes(array('PER_ID'=>Yii::app()->user->ID)); //Guarda el ID de la persona
		}

		$buscar=($bitacora->PER_NOMBRE=='')?BitAdmin::model()->findAll():BitAdmin::model()->findAll("PER_NOMBRE Like '%$bitacora->PER_NOMBRE%'");
		if(isset($bitacora))$buscar=($bitacora->PER_NOMBRE=='')?BitAdmin::model()->findAll():BitAdmin::model()->findAll("PER_NOMBRE Like '%$bitacora->PER_NOMBRE%'");
		else $buscar=null;
		$this->render('administrar', array('bitacora'=>$bitacora, 'nuevo'=>$nuevo, 'bitacora2'=>$bitacora2, 'buscar'=>$buscar));	
	}

	public function actionAgregar()
	{
		$bitacora=new Bitacora; //Bitácora vacia, donde se insertará la nueva.
		$nuevo = Practica::model()->findByAttributes(array('PER_ID'=>Yii::app()->user->ID)); // Tiene todas las Bitácoras y los ID de la vista.
		
		if (isset($_POST['Bitacora']))  //existe la vista
			{
				$bitacora->attributes=$_POST['Bitacora']; //recibir todos los atributos que voy a modificar

				//guardar datos de la Bitacora
						$bitacora->PRA_ID = $nuevo->PRA_ID;
						$bitacora->BIT_INGRESO=date("Y-m-d H:i:s");

				if($bitacora->save())
						{
							Yii::app()->user->setFlash('success','<div class="alert alert-success">
	  						<strong>Felicidades!</strong> Se han guardado los datos correctamente.
							</div>');
						} 	

			}

		$this->render('agregar', array('model'=>$bitacora));
	}

	public function actionEditar($id)
	{
		$alumno = BitAdmin::model()->findByAttributes(array('BIT_ID'=>$id)); // id de la Bitácora.
		$nueva = Bitacora::model()->findByAttributes(array('BIT_ID'=>$id)); // acceso a la parte fisica de la BD.

		if(isset($_POST['BitAdmin']))
		{
			
			//se recupera los datos ingresado por teclado
			$alumno->attributes=$_POST['BitAdmin'];

			$nueva->BIT_ID = $alumno->BIT_ID;
			$nueva->BIT_TITULO = $alumno->BIT_TITULO;
			$nueva->BIT_CONTENIDO = $alumno->BIT_CONTENIDO;
			$nueva->BIT_ESTADO = $alumno->BIT_ESTADO;
			$nueva->BIT_INGRESO=date("Y-m-d H:i:s");


			if($nueva->save())
						{
							Yii::app()->user->setFlash('success','<div class="alert alert-success">
	  						<strong>Felicidades!</strong> Se han guardado los datos correctamente.
							</div>');
						} 
		}

		$this->render('editar', array('alumno'=>$alumno, 'nueva'=>$nueva));
	}

	public function actionEliminar($id)
	{
		$model=Bitacora::model()->findByAttributes(array('BIT_ID'=>$id));
		$model->delete();
		$this->redirect(array('administrar'));
	}

	public function actionVer($id)
	{
		$alumno = BitAdmin::model()->findByAttributes(array('PRA_ID'=>$id)); // id de la Práctica.
		$this->render('ver', array('alumno'=>$alumno));
	}

}