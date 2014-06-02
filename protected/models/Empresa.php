<?php

/**
 * This is the model class for table "empresa".
 *
 * The followings are the available columns in table 'empresa':
 * @property string $EMP_ID
 * @property string $EMP_NOMBRE
 * @property string $EMP_RUT
 * @property string $EMP_DIRECCION
 * @property string $EMP_CONTACTO
 * @property string $EMP_CORREO
 * @property string $EMP_TELEFONO
 * @property string $EMP_INGRESO
 *
 * The followings are the available model relations:
 * @property Convenio[] $convenios
 * @property Evalua[] $evaluas
 */
class Empresa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'empresa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EMP_INGRESO', 'required'),
			array('EMP_NOMBRE, EMP_CONTACTO', 'length', 'max'=>60),
			//array('EMP_RUT', 'length', 'max'=>12),
			array('EMP_DIRECCION', 'length', 'max'=>100),
			array('EMP_CORREO', 'length', 'max'=>30),
			array('EMP_TELEFONO', 'length', 'max'=>20),

			array('EMP_RUT', 'validateRut'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('EMP_ID, EMP_NOMBRE, EMP_RUT, EMP_DIRECCION, EMP_CONTACTO, EMP_CORREO, EMP_TELEFONO, EMP_INGRESO', 'safe', 'on'=>'search'),
		);
	}

	public function validateRut($attribute, $params) {/*
        $data = explode('-', $this->EMP_RUT);
        $evaluate = strrev($data[0]);
        $multiply = 2;
        $store = 0;
        for ($i = 0; $i < strlen($evaluate); $i++) {
            $store += $evaluate[$i] * $multiply;
            $multiply++;
            if ($multiply > 7)
                $multiply = 2;
        }
        isset($data[1]) ? $verifyCode = strtolower($data[1]) : $verifyCode = '';
        $result = 11 - ($store % 11);
        if ($result == 10)
            $result = 'k';
        if ($result == 11)
            $result = 0;
        if ($verifyCode != $result)
            $this->addError('EMP_RUT', 'Rut inválido.');*/
    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'convenios' => array(self::HAS_MANY, 'Convenio', 'EMP_ID'),
			'evaluas' => array(self::HAS_MANY, 'Evalua', 'EMP_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'EMP_ID' => 'Emp',
			'EMP_NOMBRE' => 'Emp Nombre',
			'EMP_RUT' => 'Emp Rut',
			'EMP_DIRECCION' => 'Emp Direccion',
			'EMP_CONTACTO' => 'Emp Contacto',
			'EMP_CORREO' => 'Emp Correo',
			'EMP_TELEFONO' => 'Emp Telefono',
			'EMP_INGRESO' => 'Emp Ingreso',
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

		$criteria->compare('EMP_ID',$this->EMP_ID,true);
		$criteria->compare('EMP_NOMBRE',$this->EMP_NOMBRE,true);
		$criteria->compare('EMP_RUT',$this->EMP_RUT,true);
		$criteria->compare('EMP_DIRECCION',$this->EMP_DIRECCION,true);
		$criteria->compare('EMP_CONTACTO',$this->EMP_CONTACTO,true);
		$criteria->compare('EMP_CORREO',$this->EMP_CORREO,true);
		$criteria->compare('EMP_TELEFONO',$this->EMP_TELEFONO,true);
		$criteria->compare('EMP_INGRESO',$this->EMP_INGRESO,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Empresa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
