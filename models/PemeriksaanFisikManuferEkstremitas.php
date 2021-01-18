<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pemeriksaan_fisik_manufer_ekstremitas".
 *
 * @property int $id
 * @property int $id_pemeriksaan_fisik
 * @property string $kekuatan
 * @property string $varises
 * @property string $reflek_fisiologis
 * @property string $reflek_patologis
 * @property string $lainlain
 */
class PemeriksaanFisikManuferEkstremitas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemeriksaan_fisik_manufer_ekstremitas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pemeriksaan_fisik'], 'required'],
            [['id_pemeriksaan_fisik'], 'integer'],
            [['kekuatan', 'varises', 'reflek_fisiologis', 'reflek_patologis', 'lainlain'], 'string', 'max' => 255],
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
            'kekuatan' => 'Kekuatan',
            'varises' => 'Varises',
            'reflek_fisiologis' => 'Reflek Fisiologis',
            'reflek_patologis' => 'Reflek Patologis',
            'lainlain' => 'Lainlain',
        ];
    }
}
