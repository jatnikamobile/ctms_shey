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
}
