<?php

namespace app\models;

use Yii;
use app\models\PemeriksaanRincian;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pemeriksaan".
 *
 * @property int $id
 * @property int $id_induk
 * @property string $nama
 */
class ParameterTipe extends \yii\db\ActiveRecord
{
    use ListableTrait;

    public static function tableName()
    {
        return 'parameter_tipe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_induk'], 'integer'],
            [['nama'], 'required'],
            [['status_bmi','status_tekanan_darah'],'integer'],
            [['nama'], 'string', 'max' => 255],
        ];
    }
    // 'status_pemeriksa', 'status_pemeriksaan'

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_induk' => 'Induk',
            'nama' => 'Nama Protokol',
            'status_bmi' => 'Parameter Protokol',
            'status_tekanan_darah' => 'Status Tekanan Darah'
        ];
    }

    public function getManyTipeAtr()
    {
        return $this->hasMany(ParameterTipeAtr::class, ['id_tipe' => 'id']);
    }

    /**
     * @return Registrasi
     */
    public function getManyRegistrasi()
    {
        return $this->hasMany(Registrasi::className(), ['paket_id' => 'id_paket'])
            ->via('manyPaketPemeriksaan');
    }
    
    /*public function getManyRegistrasi()
    {
        return $this->hasMany(Registrasi::class, ['paket_id' => 'id_paket'])->viaTable('paket_pemeriksaan', ['id_pemeriksaan' => 'id']);
    }*/

    public function getCountRegistrasi()
    {
        return count($this->manyRegistrasi);
    }

    public function getManyPemeriksaanRincianInduk()
    {
        return $this->hasMany(PemeriksaanRincian::class,['id_pemeriksaan' => 'id'])->andWhere('id_induk is NULL');
    }

    public function findIndukPemeriksaan()
    {
        return static::find()->andWhere('id_induk is NULL')->all();
    }

    public function getInduk()
    {
        return $this->hasOne(self::class,['id' => 'id_induk']);
    }

    public function getManySub()
    {
        return $this->hasMany(self::class,['id_induk' => 'id']);
    }

    public function hasSub()
    {
        if (count($this->manySub) !== 0) {
            return true;
        } else {
            return false;
        }
    }

    public function isStatusBMI()
    {
        if ($this->status_bmi == self::BMI) {
            return true;
        }

        return false;
    }

    public function isStatusTekananDarah()
    {
        if ($this->status_tekanan_darah == self::TEKANAN_DARAH) {
            return true;
        }

        return false;
    }

    public function isStatusPemeriksaanTtd()
    {
        if ($this->status_bmi == self::PEMERIKSA_TTD) {
            return true;
        }

        return false;
    }

    public function getJawabanPemeriksaanRincian($id_registrasi)
    {
        $nilai = [];

        foreach ($this->manyPemeriksaanRincianInduk as $pemeriksaanRincian) {
            $valuePemeriksaanRincianHasil = \app\models\PemeriksaanRincianHasil::find()
            ->andWhere([
                'id_registrasi' => $id_registrasi,
                'id_pemeriksaan_rincian' => $pemeriksaanRincian->id
            ])->one();

            $nilai[] = @$valuePemeriksaanRincianHasil->jawaban;
        }

        return $nilai;
    }

    public function getNilaiBodyMassIndex($id_registrasi)
    {
        // $nilai[]
        // Key 0 adalah nilai Tinggi Badan
        // Key 1 adalah nilai Berat Badan
        $nilai = $this->getJawabanPemeriksaanRincian($id_registrasi);

        if (@$nilai[0] !== null) {
            @$tinggiBadan = @$nilai[0] / 100;
            @$tinggiBadan *= @$tinggiBadan;
        }

        if (@$nilai[1] !== null) {
            @$beratBadan = @$nilai[1] / @$tinggiBadan;
        }

        return @$beratBadan ?? 0;
    }

    public function getLabelBodyMassIndex($id_registrasi)
    {
        $bmi = $this->getNilaiBodyMassIndex($id_registrasi);
        $nilai = $this->getJawabanPemeriksaanRincian($id_registrasi);

        if ($bmi < 18.5) { 
            return @$nilai[0].'/'.@$nilai[1].' Cm/Kg <span class="label label-danger"> Kurang Berat Badan </span>';
        } elseif ($bmi >= 18.5 AND $bmi < 25 ) {
           return @$nilai[0].'/'.@$nilai[1].' Cm/Kg <span class="label label-success"> Normal (Ideal) </span>';
        } elseif ($bmi >= 25 AND $bmi < 30) {
           return @$nilai[0].'/'.@$nilai[1].' Cm/Kg <span class="label label-warning"> Kelebihan Berat Badan </span>';
        } elseif ($bmi > 30) {
           return @$nilai[0].'/'.@$nilai[1].' Cm/Kg <span class="label label-danger"> Kegemukan (Obesitas) </span>';
        } else {
            return $bmi;
        }

    }

    public function getLabelTekananDarah($id_registrasi)
    {
        // $nilai[]
        // Key 0 adalah nilai SISTOLIK
        // Key 1 adalah nilai DIASTOLIK
        $nilai = $this->getJawabanPemeriksaanRincian($id_registrasi);

        if (@$nilai[0] !== null AND @$nilai[1]) {
            $sistolik = $nilai[0];
            $diastolik = $nilai[1];

            if ($sistolik < 85 OR $diastolik < 55) {
                return "$sistolik/$diastolik MM/Hg ".'<span class="label label-default">Rendah (Hipotensi)</span>';
            } elseif ($sistolik < 120 AND $diastolik < 80) { 
                return "$sistolik/$diastolik MM/Hg ".'<span class="label label-success"> Normal </span>';
            } elseif (($sistolik >= 120 AND $sistolik <= 139) OR ($diastolik >= 80 AND $diastolik <= 89)) {
               return "$sistolik/$diastolik MM/Hg ".'<span class="label label-warning"> PreHipertensi </span>';
            } elseif (($sistolik >= 140 AND $sistolik <= 159) OR ($diastolik >= 90 AND $diastolik <= 99)) {
               return "$sistolik/$diastolik MM/Hg ".'<span class="label label-danger"> Hipertensi Grade 1 </span>';
            } elseif (($sistolik >= 160 AND $sistolik <= 179) OR ($diastolik >= 100 AND $diastolik <= 109)) {
               return "$sistolik/$diastolik MM/Hg ".'<span class="label label-danger"> Hipertensi Grade 2 </span>';
            } elseif ($sistolik >= 180 OR $diastolik >= 110) {
               return "$sistolik/$diastolik MM/Hg ".'<span class="label label-danger"> Hipertensi Grade 3 </span>';
            } else {
                return '';
            }
        } else {
            return '';
        }
    }

    public function getListInduk()
    {
        return ArrayHelper::map(self::findIndukPemeriksaan(),'id','nama');
    }

    public function getTabPemeriksaanDropdown()
    {
        return \yii\bootstrap\ButtonDropdown::widget([
            'label' => '',
            'options' => ['class' => 'btn btn-xs btn-primary btn-flat'],
            'dropdown' => [
                'encodeLabels' => false,
                'items' => [
                    [
                        'label' => '<i class="fa fa-pencil"></i> Sunting Sub Pemeriksaan',
                        'url' => ['pemeriksaan/update','id' => $this->id]
                    ],
                    [
                        'label' => '<i class="fa fa-trash"></i> Hapus Sub Pemeriksaan',
                        'url' => ['pemeriksaan/delete','id' => $this->id],
                        'linkOptions' => [
                            'data' => [
                                'method' => 'post',
                                'confirm' => \Yii::t('yii', 'Are you sure you want to delete this item?'),
                            ],
                        ]
                    ],
                ],
            ],
        ]);
    }

    public function getValueDokter($id_registrasi)
    {
        $query = PemeriksaanRincianHasil::find()
            ->joinWith('pemeriksaanRincian')
            ->andWhere(['id_registrasi' => $id_registrasi])
            ->andWhere(['pemeriksaan_rincian.id_pemeriksaan' => $this->id])
            ->andWhere(['pemeriksaan_rincian.rincian_jenis' => PemeriksaanRincian::DOKTER])
            ->one();

        if ($query != null) {
            return @$query->oneDokter->nama;
        }


        return null;
    }

    public function getValuePetugas($id_registrasi)
    {
        $query = PemeriksaanRincianHasil::find()
            ->joinWith('pemeriksaanRincian')
            ->andWhere(['id_registrasi' => $id_registrasi])
            ->andWhere(['pemeriksaan_rincian.id_pemeriksaan' => $this->id])
            ->andWhere(['pemeriksaan_rincian.rincian_jenis' => PemeriksaanRincian::PEMERIKSA])
            ->one();

        if ($query != null) {
            return @$query->onePetugas->nama;
        }


        return null;
    }

    public static function getListPemerisaanSub($id_pemeriksaan)
    {
        $query = Pemeriksaan::find()->andWhere(['id_induk' => $id_pemeriksaan]);
        return ArrayHelper::map($query, 'id', 'nama');
    }

    public function getLabelPemeriksaan($id_registrasi)
    {
        if ($this->status_bmi == 1) {
            return $this->getLabelBodyMassIndex($id_registrasi);
        } elseif($this->status_tekanan_darah == 1) {
            return $this->getLabelTekananDarah($id_registrasi);
        }
    }

    /*public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if ($this->status_pemeriksaan == static::BMI) {
            $this->status_bmi = 1;
        } elseif ($this->status_pemeriksaan == static::TEKANAN_DARAH) {
            $this->status_tekanan_darah = 1;
        } elseif ($this->status_pemeriksaan == static::PEMERIKSA) {
            $this->status_pemeriksa = 1;
        }

        return true;
    }*/
}
