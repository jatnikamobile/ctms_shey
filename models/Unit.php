<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unit".
 *
 * @property int $id
 * @property int $instansi_id
 * @property string $nama
 */
class Unit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['instansi_id', 'nama'], 'required'],
            [['instansi_id'], 'integer'],
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
            'instansi_id' => 'Nama Sponsor',
            'nama' => 'Nama Phase',
        ];
    }
    public function getInstansi()
    {
        return $this->hasOne(Instansi::class, ['id' => 'instansi_id']);
    }

    public static function getList() 
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id','nama');
    }

    public static function getCount()
    {
        return static::find()->count();
    }
    
    public static function getCountByInstansi($param)
    {
        return static::find()->andFilterWhere(['instansi_id' => $param])->count();
    }

    
}
