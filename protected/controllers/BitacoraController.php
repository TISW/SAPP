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
				'actions'=>array('index','view','administrar','agregar','buscar','editar','eliminar'), //permite el ingreso a... al admin.
				'users'=>array('admin'),
			),
			array('allow', 
				'actions'=>array('index','agregar'), //permite el ingreso a... al alumno
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


	public function actionAdministrar()
	{
		$this->render('administrar');
	}

	public function actionAgregar()
	{
		$this->render('agregar');
	}

	public function actionBuscar()
	{
		$this->render('buscar');
	}

	public function actionEditar()
	{
		$this->render('editar');
	}

	public function actionEliminar()
	{
		$this->render('eliminar');
	}

	
}