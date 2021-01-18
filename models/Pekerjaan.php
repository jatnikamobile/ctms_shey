<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pekerjaan".
 *
 * @property int $id
 * @property string $nama
 */
class Pekerjaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pekerjaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
}
