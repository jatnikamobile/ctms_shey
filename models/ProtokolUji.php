<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pasien".
 *
 * @property int $id
 * @property int $id_pasien_instansi
 * @property int $id_pasien_unit
 * @property string $nik
 * @property string $nama
 * @property string $alamat
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property int $umur
 * @property string $jenis_kelamin
 * @property string $golongan_darah
 * @property string $no_telepon
 * @property string $status_kawin
 * @property string $id_pasien_agama
 * @property string $id_pasien_pekerjaan
 * @property string $id_pasien_pendidikan
 */
class ProtokolUji extends \yii\db\ActiveRecord
{
    public $_instansi;
    public $_paket;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'protokol_uji';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama','id_instansi','tanggal'], 'required'],
            [['deskripsi'], 'safe'],
            [['tanggal'], 'date', 'format'=>'php:Y-m-d'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_instansi' => 'Klinik Penguji',
            'id_paket' => 'Protokol Uji',
            'nama' => 'Nama Protokol',
        ];
    }

    public static function getList($labelAttr = 'nama') {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id',$labelAttr);
    }

    public static function getCount()
    {
        return static::find()->count();
    }

    public static function getCountByInstansi($param)
    {
        return static::find()->andFilterWhere(['id_instansi' => $param])->count();
    }

    public function getManyRegistrasi()
    {
        return $this->hasMany(Registrasi::class, ['pasien_id' => 'id']);
    }
    
    public function countRegistrasi()
    {
        return count($this->manyRegistrasi);
    }

    public function getInstansi()
    {
        return $this->hasOne(Instansi::class, ['id' => 'id_instansi']);
    }

    public function getUnit()
    {
        return $this->hasOne(Unit::class, ['id' => 'id_pasien_unit']);
    }

    public function getAgama()
    {
        return $this->hasOne(Agama::class, ['id' => 'id_pasien_agama']);
    }

    public function getPekerjaan()
    {
        return $this->hasOne(Pekerjaan::class, ['id' => 'id_pasien_pekerjaan']);
    }

    public function getPaket()
    {
        return $this->hasOne(Paket::class, ['id' => 'id_paket']);
    }

    public function getUmur()
    {
        $time = strtotime($this->tanggal_lahir);
        $tahun_lahir = date("Y",$time);
        $tahun_sekarang = date('Y');
        $umur = $tahun_sekarang - $tahun_lahir;

        return $umur;
    }

    public function getUmurHari()
    {
        $birthday = $this->tanggal_lahir;

        // Convert Ke Date Time
        $biday = new \DateTime($birthday);
        $today = new \DateTime();
        
        $diff = $today->diff($biday);
        
        return $diff->y.' TH '.$diff->d.' HR';
    }

    public function getPhaseHuruf()
    {
        return chr(64 + ($this->phase ?: 1));
    }

    public function getKesimpulan()
    {
        return new Kesimpulan();
        return $this->hasOne(Kesimpulan::class,['id_registrasi' => 'id']);
    }

    public function getKesimpulanByPemeriksaan($id_pemeriksaan)
    {
        $query = $this->getPemeriksaanRincianHasil()
            ->joinWith('pemeriksaanRincian')
            ->andWhere(['pemeriksaan_rincian.id_pemeriksaan' => $id_pemeriksaan])
            ->andWhere(['pemeriksaan_rincian.rincian_jenis' => PemeriksaanRincian::PILIHAN_KESIMPULAN])
            ->andWhere('pemeriksaan_rincian.id_induk IS NULL')
            ->one();

        if ($query !== null) {
            return $query->jawaban;
        }

        return null;
    }

    public function getPemeriksaanRincianHasil()
    {
        return $this->hasMany(PemeriksaanRincianHasil::class, ['id_registrasi' => 'id']);
    }

    public function allPemeriksaanHitungan()
    {
        return Pemeriksaan::find()
            ->andWhere('status_bmi = 1 OR status_tekanan_darah = 1')
            ->all();

    }

}
