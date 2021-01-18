<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "instansi".
 *
 * @property int $id
 * @property string $nama
 */
class Instansi extends \yii\db\ActiveRecord
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
        return 'instansi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['bagian'], 'safe'],
            [['username','password','password_konfirmasi'],'required','on'=>'create', 'message' => '{attribute} tidak boleh kosong'],
            [['username','email'], 'unique', 'targetClass' => '\app\models\User', 'message' => '{attribute} Sudah Ada'],
            [['email'],'email'],
            // [['kode'], 'integer', 'max' => 4],
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

    public function createUser()
    {
        $user = new User([
            'username' => $this->username,
            'password' => Yii::$app->getSecurity()->generatePasswordHash($this->password),
            'email' => $this->email,
            'id_instansi' => $this->id, 
            'id_user_role' => UserRole::INSTANSI,
        ]);

        if ($user->save(false)) {
            return true;
        }

    }
	
	
}
