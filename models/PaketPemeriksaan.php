<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paket_pemeriksaan".
 *
 * @property int $id
 * @property int $id_paket
 * @property int $id_pemeriksaan
 */
class PaketPemeriksaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paket_pemeriksaan';
    }

    const KESIMPULAN = 1;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_paket', 'id_pemeriksaan'], 'unique', 'targetAttribute' => ['id_paket', 'id_pemeriksaan']],
            [['id_paket', 'id_pemeriksaan'], 'required'],
            [['id_paket', 'id_pemeriksaan'], 'integer'],
            [['status_kesimpulan'],'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_paket' => 'Paket',
            'id_pemeriksaan' => 'Pemeriksaan',
        ];
    }

    public function getPemeriksaan()
    {
        return $this->hasOne(Pemeriksaan::class,['id' => 'id_pemeriksaan']);
    }
}
