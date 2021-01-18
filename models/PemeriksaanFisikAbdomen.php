<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pemeriksaan_fisik_abdomen".
 *
 * @property int $id
 * @property int $id_pemeriksaan_fisik
 * @property string $dinding
 * @property string $hati
 * @property string $limpa
 * @property string $usus
 * @property string $hernia
 * @property string $scrotalis
 */
class PemeriksaanFisikAbdomen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemeriksaan_fisik_abdomen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pemeriksaan_fisik'], 'required'],
            [['id_pemeriksaan_fisik'], 'integer'],
            [['dinding', 'hati', 'limpa', 'usus', 'hernia', 'scrotalis'], 'string', 'max' => 255],
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
            'hati' => 'Hati',
            'limpa' => 'Limpa',
            'usus' => 'Usus',
            'hernia' => 'Hernia',
            'scrotalis' => 'Scrotalis',
        ];
    }
}
