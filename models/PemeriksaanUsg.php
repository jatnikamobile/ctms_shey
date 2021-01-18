<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pemeriksaan_usg".
 *
 * @property int $id
 * @property int $id_registrasi
 * @property string $hati
 * @property string $kgb
 * @property string $empedu
 * @property string $limpa
 * @property string $pankreas
 * @property string $ginjal
 * @property string $kemih
 * @property string $lainlain
 * @property string $kesimpulan
 */
class PemeriksaanUsg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemeriksaan_usg';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_registrasi'], 'required'],
            [['id_registrasi'], 'integer'],
            [['hati', 'kgb', 'empedu', 'limpa', 'pankreas', 'ginjal', 'kemih', 'lainlain', 'kesimpulan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_registrasi' => 'Id Registrasi',
            'hati' => 'Hati',
            'kgb' => 'K.G.B',
            'empedu' => 'Empedu',
            'limpa' => 'Limpa',
            'pankreas' => 'Pankreas',
            'ginjal' => 'Ginjal',
            'kemih' => 'Kemih',
            'lainlain' => 'Lainlain',
            'kesimpulan' => 'Kesimpulan',
        ];
    }
    
    public function getRegistrasi()
    {
        return $this->hasOne(Registrasi::class,['id'=>'id_registrasi']);
    }
}
