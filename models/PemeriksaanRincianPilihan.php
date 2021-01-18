<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "pemeriksaan_rincian_pilihan".
 *
 * @property int $id
 * @property int $id_pemeriksaan_rincian
 * @property string $nama
 * @property string $default_value
 */
class PemeriksaanRincianPilihan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemeriksaan_rincian_pilihan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pemeriksaan_rincian', 'nama'], 'required'],
            [['id_pemeriksaan_rincian','default_value'], 'integer'],
            ['default_value','default','value' => null],
            [['nama'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pemeriksaan_rincian' => 'Pemeriksaan Rincian',
            'nama' => 'Nama',
        ];
    }

    public function isDefaultValue()
    {
        if ($this->default_value) {
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
                        'label' => '<i class="fa fa-check"></i> Set Pilihan Defult',
                        'url' => ['pemeriksaan-rincian-pilihan/set-default','id' => $this->id]
                    ],
                    '<li class="divider"></i>',
                    [
                        'label' => '<i class="fa fa-pencil"></i> Sunting Pilihan Jawaban',
                        'url' => ['pemeriksaan-rincian-pilihan/update','id' => $this->id]
                    ],
                    [
                        'label' => '<i class="fa fa-trash"></i> Hapus Pilihan Jawaban',
                        'url' => ['pemeriksaan-rincian-pilihan/delete','id' => $this->id],
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

    public function getPemeriksaanRincian()
    {
        return $this->hasOne(PemeriksaanRincian::class,['id' => 'id_pemeriksaan_rincian']);
    }

    public function getCountRincianHasil($searchModel)
    {
        $pemeriksaanRincianHasil = PemeriksaanRincianHasil::find()
            ->joinWith('registrasi')
            ->joinWith('pasien')
            ->andFilterWhere(['pasien.id_pasien_instansi' => $searchModel->id_pasien_instansi])
            ->andFilterWhere(['registrasi.paket_id' => $searchModel->paket_id])
            ->andFilterWhere(['registrasi.id_pasien_unit' => $searchModel->id_pasien_unit])
            ->andFilterWhere(['between', 'tanggal', $searchModel->tanggal_awal, $searchModel->tanggal_akhir]);
        if ($searchModel->id_pemeriksaan_sub_rincian == null) { 
            if(!empty($searchModel->id_pemeriksaan_sub)){
                $pemeriksaanRincianHasil->joinWith('pemeriksaanRincian')
                    ->andWhere(['pemeriksaan_rincian.id_pemeriksaan' => $searchModel->id_pemeriksaan_sub])
                    ->andWhere(['pemeriksaan_rincian.rincian_jenis' => PemeriksaanRincian::PILIHAN_KESIMPULAN])
                    ->andWhere(['jawaban' => $this->nama]);
            }else{
                $pemeriksaanRincianHasil->joinWith('pemeriksaanRincian')
                    ->andWhere(['pemeriksaan_rincian.id_pemeriksaan' => $searchModel->id_pemeriksaan])
                    ->andWhere(['pemeriksaan_rincian.rincian_jenis' => PemeriksaanRincian::PILIHAN_KESIMPULAN])
                    ->andWhere(['jawaban' => $this->nama]);
            }
        } else {
            $pemeriksaanRincianHasil
                ->andWhere([
                    'id_pemeriksaan_rincian' => $searchModel->id_pemeriksaan_sub_rincian,
                    'jawaban' => $this->nama
                ]);
        }
        return $pemeriksaanRincianHasil->count();
    }

    public function getRincianHasil($param)
    {
        $pemeriksaanRincianHasil = PemeriksaanRincianHasil::find()
            ->joinWith('registrasi')
            ->joinWith('pasien')
            ->andFilterWhere(['pasien.id_pasien_instansi' => $searchModel->id_pasien_instansi])
            ->andFilterWhere(['registrasi.paket_id' => $searchModel->paket_id])
            ->andFilterWhere(['registrasi.id_pasien_unit' => $searchModel->id_pasien_unit])
            ->andFilterWhere(['between', 'tanggal', $searchModel->tanggal_awal, $searchModel->tanggal_akhir]);
        if ($searchModel->id_pemeriksaan_sub_rincian == null) {
            if(!empty($searchModel->id_pemeriksaan_sub)){
                $pemeriksaanRincianHasil->joinWith('pemeriksaanRincian')
                    ->andWhere(['pemeriksaan_rincian.id_pemeriksaan' => $searchModel->id_pemeriksaan_sub])
                    ->andWhere(['pemeriksaan_rincian.rincian_jenis' => PemeriksaanRincian::PILIHAN_KESIMPULAN])
                    ->andWhere(['jawaban' => $this->nama]);
            }else{
                $pemeriksaanRincianHasil->joinWith('pemeriksaanRincian')
                    ->andWhere(['pemeriksaan_rincian.id_pemeriksaan' => $searchModel->id_pemeriksaan])
                    ->andWhere(['pemeriksaan_rincian.rincian_jenis' => PemeriksaanRincian::PILIHAN_KESIMPULAN])
                    ->andWhere(['jawaban' => $this->nama]);
            }
        } else {
            $pemeriksaanRincianHasil = PemeriksaanRincianHasil::find()
                ->andWhere([
                    'id_pemeriksaan_rincian' => $searchModel->id_pemeriksaan_sub_rincian,
                    'jawaban' => $this->nama
                ]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $pemeriksaanRincianHasil,
        ]);

        return $dataProvider;
    }
}
