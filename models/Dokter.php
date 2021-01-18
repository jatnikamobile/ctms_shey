<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dokter".
 *
 * @property int $id
 * @property string $nama
 */
class Dokter extends \yii\db\ActiveRecord
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
        return 'dokter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username','password','password_konfirmasi'],'required','on'=>'create', 'message' => '{attribute} tidak boleh kosong'],
            [['username','email'], 'unique', 'targetClass' => '\app\models\User', 'message' => '{attribute} Sudah Ada'],
            [['email'],'email'],
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
            'nama' => 'Nama',
        ];
    }

    public static function getList() 
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id','nama');
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id_dokter' => 'id']);
    }

    public function createUser()
    {
        $user = new User([
            'username' => $this->username,
            'password' => Yii::$app->getSecurity()->generatePasswordHash($this->password),
            'email' => $this->email,
            'id_dokter' => $this->id, 
            'id_user_role' => UserRole::DOKTER,
        ]);

        if ($user->save(false)) {
            return true;
        }

    }
}
