<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "instansi".
 *
 * @property int $id
 * @property string $nama
 */
class Sponsor extends \yii\db\ActiveRecord
{
    public $username;
    public $password;
    public $password_konfirmasi;
    public $email;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sponsor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode' => 'Kode',
            'nama' => 'Nama',
        ];
    }
    public static function getList() 
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id','nama');
    }
    
    public static function getCount()
    {
        return static::find()->count();
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id_instansi' => 'id']);
    }
	
	public function setNomorInstansi()
	{
		$no_max = Instansi::find()
		->max("kode");
		// echo '<pre>'; print_r($no_max); echo '</pre>'; die();
		$no_max += 1;
		
		return $no_max;
	}	
}
