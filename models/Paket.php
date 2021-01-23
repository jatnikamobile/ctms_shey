<?php

namespace app\models;

use Yii;
use app\models\ListableTrait;

/**
 * This is the model class for table "paket".
 *
 * @property int $id
 * @property string $nama
 */
class Paket extends \yii\db\ActiveRecord
{
    use ListableTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_protokol_uji'], 'integer'],
            [['id_protokol_uji','nama'], 'safe'],
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

    public function getManyPaketTindakan()
    {
        return $this->hasMany(PaketTindakan::class,['id_paket'=>'id']);
    }

    public function getManyPaketPemeriksaan()
    {
        return $this->hasMany(PaketPemeriksaan::class,['id_paket' => 'id']);
    }

    public function hasPaketPemeriksaan()
    {
        if (count($this->manyPaketPemeriksaan) !== 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function getList() {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id','nama');
    }

    public function findAllPaketTindakan()
    {
        return $this->getManyPaketTindakan()->all();
    }

    public function allPaketPemeriksaan($conditions=[])
    {
        return $this->getManyPaketPemeriksaan()
            ->andFilterWhere($conditions)
            ->all();
    }


}
