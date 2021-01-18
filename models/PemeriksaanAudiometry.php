<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pemeriksaan_audiometry".
 *
 * @property int $id
 * @property int $id_registrasi
 * @property int $l1000
 * @property int $l4000
 * @property int $r1000
 * @property int $r4000
 * @property int $selisih
 * @property string $nih
 * @property string $uraian
 * @property string $kesimpulan
 */
class PemeriksaanAudiometry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemeriksaan_audiometry';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_registrasi'], 'required'],
            [['id_registrasi', 'l1000', 'l4000', 'r1000', 'r4000', 'selisih'], 'integer'],
            [['nih', 'uraian', 'kesimpulan'], 'string', 'max' => 255],
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
            'l1000' => 'L1000',
            'l4000' => 'L4000',
            'r1000' => 'R1000',
            'r4000' => 'R4000',
            'selisih' => 'Selisih',
            'nih' => 'Nih',
            'uraian' => 'Uraian',
            'kesimpulan' => 'Kesimpulan',
        ];
    }

    public function getRegistrasi()
    {
        return $this->hasOne(Registrasi::class,['id'=>'id_registrasi']);
    }
}
