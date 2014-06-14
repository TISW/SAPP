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
			array('PER_RUT','ifrutexists', 'exists'=> 'nonexists','on'=>'create'),
			array('PER_CORREO', 'dominio'),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('PER_ID, CAR_CODIGO, PER_RUT, PER_NOMBRE, PER_CORREO, PER_TELEFONO, PER_ROLE', 'safe', 'on'=>'search'),
		);
	}

public function validateRut($attribute, $params) {
    if(strlen($this->$attribute)==12){
    $rut = str_split($this->$attribute);
	$suma=0;
	$suma += $rut[9]*2;
	$suma += $rut[8]*3;
	$suma += $rut[7]*4;
	$suma += $rut[5]*5;
	$suma += $rut[4]*6;
	$suma += $rut[3]*7;
	$suma += $rut[1]*2;
	$suma += $rut[0]*3;
	$resto = $suma % 11;
    $dv = 11 - $resto;
    if($dv == 11){
        $dv=0;
    }else if($dv == 10){
        $dv="k";
    }else{
        $dv=$dv;
    }
   if($dv != $rut[11]){
		$this->addError($attribute, 'Rut inválido.');
	}
   }
   else {$this->addError($attribute, 'Rut inválido.');}
}


	/**
	 * @return array relational rules.
	 */

public function ifrutexists($attribute,$params)
        {
                $rut =$this->$attribute;

                $user = new Persona();

                if($params['exists'] === 'nonexists')
                {
                        if ($user->findByAttributes(array('PER_RUT'=>$rut)))
                                $this->addError($attribute, 'Rut existe');           

                }
                if($params['exists'] === 'exists')
                {
                if(!$user->findByAttributes(array('PER_RUT'=>$rut)))
                        $this->addError($attribute, 'rut no existe');
            }
                
        }
public function dominio($attribute,$params){
	$i =strlen (  $this->$attribute );
    for($i;$i>0;$i--)
    {
    	if(strpos($this->$attribute, '@',$i))
    		{$this->addError($attribute, 'email incorrecto');break;}
    	if(strpos($this->$attribute, '.',$i))
    	{break;}
    }

}


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
			'PER_ID' => 'Persona',
			'CAR_CODIGO' => 'Carrera',
			'PER_RUT' => 'Rut',
			'PER_NOMBRE' => 'Nombre',
			'PER_CORREO' => 'Correo',
			'PER_TELEFONO' => 'Telefono',
			'PER_ROLE' => 'Role',
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
