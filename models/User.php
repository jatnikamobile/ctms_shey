<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property mixed $userRole
 * @property mixed $satker
 * @property bool $idSatker
 * @property mixed $tahun
 * @property string $authKey
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    public $password_konfirmasi;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username','password','id_user_role'], 'required'],
            [['id_user_role'], 'integer'],
            [['username','password','password_konfirmasi'], 'string', 'max' => 255],
            ['password_konfirmasi', 'validatePasswordKonfirmasi']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'id_user_role' => 'User Role',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function validatePasswordKonfirmasi($attribute, $params)
    {
        if($this->password != $this->password_konfirmasi)
        {
            $this->addError($attribute, 'Password konfirmasi tidak sesuai');
        }
    }

    public function getUserRole()
    {
        return $this->hasOne(UserRole::className(),['id' => 'id_user_role']);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }
    /**
     * Removes password reset token
     */

    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * @return bool
     */
    public static function isAdmin()
    {
        if (!Yii::$app->user->isGuest) {
            if (Yii::$app->user->identity->id_user_role === UserRole::ADMIN){
                return true;
            }
        }
        return false;  
    }

    /**
     * @return bool
     */
    public static function isInstansi()
    {
        if (!Yii::$app->user->isGuest) {
            if (Yii::$app->user->identity->id_user_role === UserRole::INSTANSI){
                return true;
            }
        }
        return false;
    }

    /**
     * @return bool
     */
    public static function isDokter()
    {
        if (!Yii::$app->user->isGuest) {
            if (Yii::$app->user->identity->id_user_role === UserRole::DOKTER){
                return true;
            }
        }
        return false;
    }

    public function getInstansi()
    {
        return $this->hasOne(Instansi::className(), ['id' => 'id_instansi']);
    }

    public function getDokter()
    {
        return $this->hasOne(Dokter::className(), ['id' => 'id_dokter']);
    }

    public static function findBySession()
    {
        $query = User::find();
        $query->andWhere('username = :username',[':username'=>Yii::$app->user->identity->username]);

        return $query->one();
    }

    public function getRole()
    {
        if ($this->id_user_role === UserRole::ADMIN) {
            return 'Admin';
        } 

        if ($this->id_user_role === UserRole::INSTANSI) {
            return 'Instansi';
        }

        if ($this->id_user_role === UserRole::DOKTER) {
            return 'Dokter';
        }
    }

}
