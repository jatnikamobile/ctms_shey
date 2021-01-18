<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pemeriksaan_fisik_telinga".
 *
 * @property int $id
 * @property int $id_pemeriksaan_fisik
 * @property string $bentuk_telinga
 * @property string $membrane
 */
class PemeriksaanFisikTelinga extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemeriksaan_fisik_telinga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pemeriksaan_fisik'], 'required'],
            [['id_pemeriksaan_fisik'], 'integer'],
            [['bentuk_telinga', 'membrane'], 'string', 'max' => 255],
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
            'bentuk_telinga' => 'Bentuk Telinga',
            'membrane' => 'Membrane',
        ];
    }
}
