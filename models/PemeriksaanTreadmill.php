<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pemeriksaan_treadmill".
 *
 * @property int $id
 * @property int $id_registrasi
 * @property string $metode
 * @property string $jantung
 * @property string $kf_poor
 * @property string $kf_fair
 * @property string $kf_average
 * @property string $kf_good
 * @property string $kf_excelent
 * @property string $klasifikasi_fungsional_1
 * @property string $klasifikasi_fungsional_2
 * @property string $klasifikasi_fungsional_3
 * @property string $denyut_nadi_awal
 * @property string $denyut_nadi_akhir
 * @property int $td_sistolik_awal
 * @property int $td_diastolik_awal
 * @property int $td_sistolik_akhir
 * @property int $td_diastolik_akhir
 * @property string $stop_treadmill
 * @property string $resume_hasil
 * @property string $max
 * @property string $submax
 */
class PemeriksaanTreadmill extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemeriksaan_treadmill';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_registrasi'], 'required'],
            [['id_registrasi', 'td_sistolik_awal', 'td_diastolik_awal', 'td_sistolik_akhir', 'td_diastolik_akhir'], 'integer'],
            [['metode', 'jantung', 'stop_treadmill', 'resume_hasil'], 'string', 'max' => 255],
            [['kf_poor', 'kf_fair', 'kf_average', 'kf_good', 'kf_excelent', 'klasifikasi_fungsional_1', 'klasifikasi_fungsional_2', 'klasifikasi_fungsional_3', 'denyut_nadi_awal', 'denyut_nadi_akhir', 'max', 'submax'], 'string', 'max' => 11],
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
            'metode' => 'Metode',
            'jantung' => 'Jantung',
            'kf_poor' => 'Klasifikasi Fitness Poor',
            'kf_fair' => 'Klasifikasi Fitness Fair',
            'kf_average' => 'Klasifikasi Fitness Average',
            'kf_good' => 'Klasifikasi Fitness Good',
            'kf_excelent' => 'Klasifikasi Fitness Excelent',
            'klasifikasi_fungsional_1' => 'Klasifikasi Fungsional 1',
            'klasifikasi_fungsional_2' => 'Klasifikasi Fungsional 2',
            'klasifikasi_fungsional_3' => 'Klasifikasi Fungsional 3',
            'denyut_nadi_awal' => 'Denyut Nadi Awal',
            'denyut_nadi_akhir' => 'Denyut Nadi Akhir',
            'td_sistolik_awal' => 'Tekanan Darah Sistolik Awal',
            'td_diastolik_awal' => 'Tekanan Darah Diastolik Awal',
            'td_sistolik_akhir' => 'Tekanan Darah Sistolik Akhir',
            'td_diastolik_akhir' => 'Tekanan Darah Diastolik Akhir',
            'stop_treadmill' => 'Stop Treadmill',
            'resume_hasil' => 'Resume Hasil',
            'max' => 'Max',
            'submax' => 'Submax',
        ];
    }

    public function getRegistrasi()
    {
        return $this->hasOne(Registrasi::class,['id'=>'id_registrasi']);
    }
}
