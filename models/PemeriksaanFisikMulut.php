<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pemeriksaan_fisik_mulut".
 *
 * @property int $id
 * @property int $id_pemeriksaan_fisik
 * @property string $mucosa_mulut
 * @property string $kelainan_gigi
 * @property string $lidah
 */
class PemeriksaanFisikMulut extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemeriksaan_fisik_mulut';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pemeriksaan_fisik'], 'required'],
            [['id_pemeriksaan_fisik'], 'integer'],
            [['mucosa_mulut', 'kelainan_gigi', 'lidah'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pemeriksaan_fisik' => 'Id Pemeriksaan Fisik',
            'mucosa_mulut' => 'Mucosa Mulut',
            'kelainan_gigi' => 'Kelainan Gigi',
            'lidah' => 'Lidah',
        ];
    }
}
