<?php

/**
 * This is the model class for table "persona".
 *
 * The followings are the available columns in table 'persona':
 * @property string $PER_ID
 * @property string $CAR_CODIGO
 * @property string $PER_RUT
 * @property string $PER_NOMBRE
 * @property string $PER_CORREO
 * @property string $PER_TELEFONO
 * @property string $PER_ROLE
 *
 * The followings are the available model relations:
 * @property DocenteEncargado[] $docenteEncargados
 * @property Carrera $cARCODIGO
 * @property Practica[] $practicas
 * @property Practica[] $practicas1
 * @property Usuario $usuario
 */
class Persona extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'persona';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CAR_CODIGO, PER_RUT, PER_NOMBRE, PER_ROLE', 'required'),
			array('CAR_CODIGO', 'length', 'max'=>10),
			array('PER_ROLE', 'length', 'max'=>12),//CAMBIO PER_RUT
			array('PER_NOMBRE', 'length', 'max'=>60),
			array('PER_CORREO', 'length', 'max'=>40),
			array('PER_TELEFONO', 'length', 'max'=>20),

			array('PER_RUT', 'validateRut'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('PER_ID, CAR_CODIGO, PER_RUT, PER_NOMBRE, PER_CORREO, PER_TELEFONO, PER_ROLE', 'safe', 'on'=>'search'),
		);
	}
		/*
public function validateRut($attribute, $params) {
        $data = explode('-', $this->PER_RUT);
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
            $this->addError('PER_RUT', 'Rut inválido.');
    }
*/

public function validateRut($attribute, $params) {
	$rut=$attribute;
	$suma=0;
    if(strpos($rut,"-")==false){
        $RUT[0] = substr($rut, 0, -1);
        $RUT[1] = substr($rut, -1);
    }else{
        $RUT = explode("-", trim($rut));
    }
    $elRut = str_replace(".", "", trim($RUT[0]));
    $factor = 2;
    for($i = strlen($elRut)-1; $i >= 0; $i--):
        $factor = $factor > 7 ? 2 : $factor;
        $suma += $elRut{$i}*$factor++;
    endfor;
    $resto = $suma % 11;
    $dv = 11 - $resto;
    if($dv == 11){
        $dv=0;
    }else if($dv == 10){
        $dv="k";
    }else{
        $dv=$dv;
    }
   if($dv == trim(strtolower($RUT[1]))){
		$this->addError($attribute, 'Rut inválido.');
	}
    }
public function getFormattedRut() {
        $unformattedRut = $this->rut;
        if (strpos($unformattedRut, '-') !== false ) {
            $splittedRut = explode('-', $unformattedRut);
            $number = number_format($splittedRut[0], 0, ',', '.');
            $verifier = strtoupper($splittedRut[1]);
            return $number . '-' . $verifier;
        }
        return number_format($unformattedRut, 0, ',', '.');
    }
	

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'docenteEncargados' => array(self::HAS_MANY, 'DocenteEncargado', 'PER_ID'),
			'cARCODIGO' => array(self::BELONGS_TO, 'Carrera', 'CAR_CODIGO'),
			'practicas' => array(self::HAS_MANY, 'Practica', 'PER_ID'),
			'practicas1' => array(self::HAS_MANY, 'Practica', 'CAR_CODIGO'),
			'usuario' => array(self::HAS_ONE, 'Usuario', 'PER_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'PER_ID' => 'Per',
			'CAR_CODIGO' => 'Car Codigo',
			'PER_RUT' => 'Per Rut',
			'PER_NOMBRE' => 'Per Nombre',
			'PER_CORREO' => 'Per Correo',
			'PER_TELEFONO' => 'Per Telefono',
			'PER_ROLE' => 'Per Role',
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

		$criteria->compare('PER_ID',$this->PER_ID,true);
		$criteria->compare('CAR_CODIGO',$this->CAR_CODIGO,true);
		$criteria->compare('PER_RUT',$this->PER_RUT,true);
		$criteria->compare('PER_NOMBRE',$this->PER_NOMBRE,true);
		$criteria->compare('PER_CORREO',$this->PER_CORREO,true);
		$criteria->compare('PER_TELEFONO',$this->PER_TELEFONO,true);
		$criteria->compare('PER_ROLE',$this->PER_ROLE,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Persona the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
