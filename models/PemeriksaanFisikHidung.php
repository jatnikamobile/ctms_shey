<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pemeriksaan_fisik_hidung".
 *
 * @property int $id
 * @property int $id_pemeriksaan_fisik
 * @property string $bentuk_hidung
 * @property string $septum_deviasi
 * @property string $conchae
 */
class PemeriksaanFisikHidung extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemeriksaan_fisik_hidung';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pemeriksaan_fisik'], 'required'],
            [['id_pemeriksaan_fisik'], 'integer'],
            [['bentuk_hidung', 'septum_deviasi', 'conchae'], 'string', 'max' => 255],
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
            'bentuk_hidung' => 'Bentuk Hidung',
            'septum_deviasi' => 'Septum Deviasi',
            'conchae' => 'Conchae',
        ];
    }
}
