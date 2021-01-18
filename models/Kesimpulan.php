<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kesimpulan".
 *
 * @property int $id
 * @property int $id_registrasi
 * @property int $id_diagnosa_kerja
 * @property string $isi_kesimpulan
 * @property string $saran
 */
class Kesimpulan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kesimpulan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_registrasi'], 'required'],
            [['id_registrasi', 'id_diagnosa_kerja'], 'integer'],
            ['saran', 'string', 'max' => 255],
            ['isi_kesimpulan','string']
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
            'id_diagnosa_kerja' => 'Diagnosa Kerja',
            'isi_kesimpulan' => 'Isi Kesimpulan',
            'saran' => 'Saran',
        ];
    }

    public function getDiagnosa()
    {
        return $this->hasOne(DiagnosaKerja::class, ['id' => 'id_diagnosa_kerja']);
    }

    public function getRegistrasi()
    {
        return $this->hasOne(Registrasi::class,['id'=>'id_registrasi']);
    }
    
}
