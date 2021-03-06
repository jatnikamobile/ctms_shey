<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pemeriksaan_fisik_thorax".
 *
 * @property int $id
 * @property int $id_pemeriksaan_fisik
 * @property string $dinding
 * @property string $paru_paru
 * @property string $jantung
 */
class PemeriksaanFisikThorax extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemeriksaan_fisik_thorax';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pemeriksaan_fisik'], 'required'],
            [['id_pemeriksaan_fisik'], 'integer'],
            [['dinding', 'paru_paru', 'jantung'], 'string', 'max' => 255],
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
            'dinding' => 'Dinding',
            'paru_paru' => 'Paru Paru',
            'jantung' => 'Jantung',
        ];
    }
}
