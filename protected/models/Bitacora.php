<?php

/**
 * This is the model class for table "bitacora".
 *
 * The followings are the available columns in table 'bitacora':
 * @property string $BIT_ID
 * @property string $PRA_ID
 * @property string $BIT_INGRESO
 * @property string $BIT_TITULO
 * @property string $BIT_CONTENIDO
 * @property string $BIT_ESTADO
 *
 * The followings are the available model relations:
 * @property Practica $pRA
 */
class Bitacora extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bitacora';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PRA_ID, BIT_INGRESO, BIT_TITULO, BIT_CONTENIDO', 'required'),
			array('PRA_ID', 'length', 'max'=>10),
			array('BIT_TITULO', 'length', 'max'=>100),
			array('BIT_ESTADO', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('BIT_ID, PRA_ID, BIT_INGRESO, BIT_TITULO, BIT_CONTENIDO, BIT_ESTADO', 'safe', 'on'=>'search'),
			//array('BIT_TITULO, BIT_CONTENIDO', 'comprobar_cadena'),
		);
	}

	/*function comprobar_cadena($attribute, $params){ 
	//compruebo que los caracteres sean los permitidos 
	$cadena = $this->$attribute; // caracteres permitidos 
	$permitidos = "abcdefghijklmnñopqrstuvwxyzáéíóúABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚ123456789,-_/.() "; 
	// le cambio el nombre, para que cuando arroje el error diga "descrición" en ves de OFE_DESCRIPCION if($attribute=='OFE_NOMBRE') $lala = 'Titulo '; 
	if($attribute=='BIT_TITULO') $lala = 'Descripción'; 
	if($attribute=='BIT_CONTENIDO') $lala = 'Tareas'; 
	
	for ($i=0,$aux=0; $i<strlen($cadena); $i++){ 
		if (strpos($permitidos, substr($cadena,$i,1))===false)
			{ $aux = 1; } } 
			if($aux==1) $this->addError($attribute,'El campo <b>'.$lala.'</b> Solo acepta letras, numeros y algunos simbolos'); } 

	/*function comprobar_primer_dato($attribute,$params){ 
	$cadena = $this->$attribute; 
	// caracteres permitidos 
	$permitidos = "abcdefghijklmnñopqrstuvwxyzáéíóúABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚ"; 
	// le cambio el nombre, para que cuando arroje el error diga "descrición" en ves de OFE_DESCRIPCION if($attribute=='OFE_NOMBRE') $lala = 'Titulo '; 
	if($attribute=='OFE_DESCRIPCION') $lala = 'Descripción'; 
	if($attribute=='OFE_TAREAS') $lala = 'Tareas'; 
	if($attribute=='OFE_AREA_TRABAJO') $lala = 'Área de Trabajo'; 
	if (strpos($permitidos, substr($cadena,0,1))===false){ 
		$this->addError($attribute, 'El campo <b>'.$lala.'</b> debe comenzar con una letra'); } }*/


	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'pRA' => array(self::BELONGS_TO, 'Practica', 'PRA_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'BIT_ID' => 'Bit',
			'PRA_ID' => 'Pra',
			'BIT_INGRESO' => 'Bit Ingreso',
			'BIT_TITULO' => 'Título', 
			'BIT_CONTENIDO' => 'Contenido',
			'BIT_ESTADO' => 'Bit Estado',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('BIT_ID',$this->BIT_ID,true);
		$criteria->compare('PRA_ID',$this->PRA_ID,true);
		$criteria->compare('BIT_INGRESO',$this->BIT_INGRESO,true);
		$criteria->compare('BIT_TITULO',$this->BIT_TITULO,true);
		$criteria->compare('BIT_CONTENIDO',$this->BIT_CONTENIDO,true);
		$criteria->compare('BIT_ESTADO',$this->BIT_ESTADO,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Bitacora the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
