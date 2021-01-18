<?php

namespace app\models;

use Yii;
use app\models\ListableTrait;
use app\models\PemeriksaanRincianPilihan;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pemeriksaan_rincian".
 *
 * @property int $id
 * @property int $id_pemeriksaan
 * @property int $id_induk
 * @property int $nama
 * @property string $append
 * @property int $rincian_jenis
 */
class PemeriksaanRincian extends \yii\db\ActiveRecord
{
    use ListableTrait;

    const PILIHAN = 1;
    const URAIAN = 2;
    const PERNYATAAN = 3;
    const LAMPIRAN = 4;
    const DOKTER = 5;
    const PEMERIKSA = 6;
    const PETUGAS = 6;
    const PILIHAN_KESIMPULAN = 7;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemeriksaan_rincian';
    }

    public $id_dokter;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pemeriksaan'], 'required'],
            [['nama'],'safe'],
            [['append','default_value', 'nilai_rujukan'],'default','value' => null],
            [['id_pemeriksaan', 'id_induk', 'rincian_jenis'], 'integer'],
            [['append','nama','default_value'], 'string', 'max' => 255],
            [['nilai_rujukan','id_dokter'],'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pemeriksaan' => 'Pemeriksaan',
            'id_induk' => 'Induk',
            'nama' => 'Nama',
            'append' => 'Append',
            'rincian_jenis' => 'Rincian Jenis',
            'default_value' => 'Default Value',
            'id_dokter' => 'Nama Dokter',
        ];
    }

    public function getManyPemeriksaanRincianPilihan()
    {
        return $this->hasMany(PemeriksaanRincianPilihan::class,['id_pemeriksaan_rincian' => 'id']);
    }

    public function getManyPemeriksaanRincianHasil()
    {
        return $this->hasMany(PemeriksaanRincianHasil::class,['id_pemeriksaan_rincian' => 'id']);
    }

    public function findIndukPemeriksaanRincian()
    {
        /*return static::find()->andWhere('id_induk is NULL')->all();*/
        return static::find()->all();
    }

    public function getInduk()
    {
        return $this->hasOne(self::class,['id' => 'id_induk']);
    }

    public function getManySub()
    {
        return $this->hasMany(self::class,['id_induk' => 'id']);
    }

    public function getListIndukPemeriksaanRincian()
    {
        return ArrayHelper::map(self::findIndukPemeriksaanRincian(),'id','nama');
    }

    public static function getListRincianJenis()
    {
        return [
            static::PILIHAN => 'Pilihan',
            static::URAIAN => 'Uraian',
            static::PERNYATAAN => 'Pernyataan',
            static::LAMPIRAN => 'Lampiran',
            static::DOKTER => 'Dokter',
            static::PEMERIKSA => 'Pemeriksa',
            static::PILIHAN_KESIMPULAN => 'Kesimpulan',
        ];
    }

    public function getRincianJenis()
    {
        if ($this->rincian_jenis === self::URAIAN) {
            return 'Uraian';
        } elseif ($this->rincian_jenis === self::PILIHAN) {
            return 'Pilihan';
        } elseif ($this->rincian_jenis === self::LAMPIRAN) {
            return 'Lampiran';

        } elseif ($this->rincian_jenis === self::PILIHAN_KESIMPULAN) {
            return 'Kesimpulan Akhir';
        } elseif ($this->rincian_jenis === self::DOKTER) {
            return 'Dokter';
        } elseif ($this->rincian_jenis === self::PEMERIKSA) {
            return 'Pemeriksa';
        } else {
            return 'Pernyataan';
        }
    }

    public function isUraian()
    {
        if ($this->rincian_jenis === self::URAIAN) {
            return true;
        } else {
            return false;
        }
    }

    public function isPilihan()
    {
        if ($this->rincian_jenis === self::PILIHAN) {
            return true;
        } else {
            return false;
        }
    }

    public function isKesimpulan()
    {
        if ($this->rincian_jenis === self::PILIHAN_KESIMPULAN) {
            return true;
        } else {
            return false;
        }
    }    

    public function isPernyataan()
    {
        if ($this->rincian_jenis === self::PERNYATAAN) {
            return true;
        } else {
            return false;
        }
    }

    public function isLampiran()
    {
        if ($this->rincian_jenis === self::LAMPIRAN) {
            return true;
        } else {
            return false;
        }
    }

    public function isDokter()
    {
        if ($this->rincian_jenis === self::DOKTER) {
            return true;
        } else {
            return false;
        }
    }

    public function isPemeriksa()
    {
        if ($this->rincian_jenis === self::PEMERIKSA) {
            return true;
        } else {
            return false;
        }
    }    

    public function isAppendIsNotNull()
    {
        if ($this->append !== null) {
            return true;
        } else {
            return false;
        }
    }

    public function isDefaultValueIsNotNull()
    {
        if ($this->default_value !== null) {
            return true;
        } else {
            return false;
        }
    }

    public function getButtonDropdown()
    {
        return \yii\bootstrap\ButtonDropdown::widget([
            'label' => '',
            'options' => ['class' => 'btn btn-xs btn-success btn-flat'],
            'dropdown' => [
                'encodeLabels' => false,
                'items' => [
                    [
                        'label' => '<i class="fa fa-plus"></i> Tambah Sub Rincian', 
                        'url' => ['pemeriksaan-rincian/create','id_pemeriksaan' => $this->id_pemeriksaan,'id_induk' => $this->id]
                    ],
                    [
                        'label' => '<i class="fa fa-pencil"></i> Sunting Rincian Pemeriksaan',
                        'url' => ['pemeriksaan-rincian/update','id' => $this->id]
                    ],
                    [
                        'label' => '<i class="fa fa-trash"></i> Hapus Rincian Pemeriksaan',
                        'url' => ['pemeriksaan-rincian/delete','id' => $this->id],
                        'linkOptions' => [
                            'data' => [
                                'method' => 'post',
                                'confirm' => \Yii::t('yii', 'Are you sure you want to delete this item?'),
                            ],
                        ]
                    ],
                    '<li class="divider"><li>',
                    [
                        'label' => '<i class="fa fa-plus"></i> Tambah Pilihan Jawaban', 
                        'url' => ['pemeriksaan-rincian-pilihan/create','id_pemeriksaan_rincian' => $this->id],
                        'visible' => $this->isPilihan() OR $this->isKesimpulan()
                    ],
                ],
            ],
        ]);
    }

}
