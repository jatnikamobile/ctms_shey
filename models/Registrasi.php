<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "registrasi".
 *
 * @property int $id
 * @property int $no_registrasi
 * @property string $no_mcu
 * @property int $no_urut
 * @property int $paket_id
 * @property int $pasien_id
 * @property string $tanggal
 * @property string $nik_pasien
 * @property string $nama_pasien
 * @property string $alamat_pasien
 * @property string $tempat_lahir_pasien
 * @property string $tanggal_lahir_pasien
 * @property string $jenis_kelamin_pasien
 * @property string $golongan_darah_pasien
 * @property string $no_telepon_pasien
 * @property string $status_kawin_pasien
 * @property int $id_pasien_instansi
 * @property int $id_pasien_unit
 * @property int $id_pasien_agama
 * @property int $id_pasien_pekerjaan
 * @property int $id_pasien_pendidikan
 */
class Registrasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'registrasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_registrasi', 'no_mcu', 'no_urut', 'paket_id', 'pasien_id'], 'required'],
            [['no_registrasi', 'no_urut', 'paket_id', 'pasien_id', 'id_pasien_instansi', 'id_pasien_unit', 'id_pasien_agama', 'id_pasien_pekerjaan', 'id_pasien_pendidikan'], 'integer'],
            [['tanggal', 'tanggal_lahir_pasien'], 'safe'],
            [['no_mcu'], 'string', 'max' => 11],
            [['nik_pasien', 'nama_pasien', 'alamat_pasien', 'tempat_lahir_pasien', 'status_kawin_pasien'], 'string', 'max' => 255],
            [['jenis_kelamin_pasien', 'golongan_darah_pasien'], 'string', 'max' => 10],
            [['no_telepon_pasien'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_registrasi' => 'No Registrasi',
            'no_mcu' => 'No Uji',
            'no_urut' => 'Phase',
            'paket_id' => 'Protokol Uji',
            'pasien_id' => 'Judul Protokol',
            'tanggal' => 'Tanggal',
            'nik_pasien' => 'Nik Pasien',
            'nama_pasien' => 'Nama Protokol',
            'alamat_pasien' => 'Alamat Pasien',
            'tempat_lahir_pasien' => 'Tempat Lahir Pasien',
            'tanggal_lahir_pasien' => 'Tanggal Lahir Pasien',
            'jenis_kelamin_pasien' => 'Jenis Kelamin Pasien',
            'golongan_darah_pasien' => 'Golongan Darah Pasien',
            'no_telepon_pasien' => 'No Telepon Pasien',
            'status_kawin_pasien' => 'Status Kawin Pasien',
            'id_pasien_instansi' => 'Klinik Penguji',
            'id_pasien_unit' => 'Pasien Unit',
            'id_pasien_agama' => 'Pasien Agama',
            'id_pasien_pekerjaan' => 'Pasien Pekerjaan',
            'id_pasien_pendidikan' => 'Pasien Pendidikan',
        ];
    }

    public function getInstansi()
    {
        return $this->hasOne(Instansi::class, ['id' => 'id_pasien_instansi']);
    }

    public function getPasien()
    {
        return $this->hasOne(Pasien::class, ['id' => 'pasien_id']);
    }

    public function getUnit()
    {
        return $this->hasOne(Unit::class, ['id' => 'id_pasien_unit']);
    }

    public function getPaket()
    {
        return $this->hasOne(Paket::class, ['id' => 'paket_id']);
    }

    public function getPemeriksaanRincianHasil()
    {
        return $this->hasMany(PemeriksaanRincianHasil::class, ['id_registrasi' => 'id']);
    }

    public function getCountPemeriksaanRincianHasil()
    {
        return count($this->pemeriksaanRincianHasil);
    }

    public function getStatusPengisianPemeriksaan()
    {
        if ($this->getCountPemeriksaanRincianHasil() !== 0) {
            return '<span class="label label-success">Sudah Pemeriksaan</span>';
        } else {
            return '<span class="label label-danger">Belum Pemeriksaan</span>';
        }
    }

    public static function getCount()
    {
        return static::find()->count();
    }

    public static function getCountByInstansi($param)
    {
            return static::find()->andFilterWhere(['id_pasien_instansi' => $param])->count();
    }
    
    public function getPemeriksaanFisik()
    {
        return $this->hasOne(PemeriksaanFisik::class,['id_registrasi' => 'id']);
    }

    /**
     * @return PemeriksaanFisik
     */
    public function findOrCreatePemeriksaanFisik()
    {
        if ($this->pemeriksaanFisik === null) {
            $new = new PemeriksaanFisik(['id_registrasi' => $this->id]);
            $new->save();
            return $new;
        }

        return $this->pemeriksaanFisik;
    }

    public function getDataLaboratorium()
    {
        return $this->hasOne(Laboratorium::class,['id_registrasi' => 'id']);
    }

    public function findOrCreateLaboratorium()
    {
        if ($this->dataLaboratorium === null) {
            $new = new Laboratorium(['id_registrasi' => $this->id]);
            $new->save();
            return $new;
        }

        return $this->dataLaboratorium;
    }

    public function getRadiologi()
    {
        return $this->hasOne(Radiologi::class,['id_registrasi' => 'id']);
    }

    public function findOrCreateRadiologi()
    {
        if ($this->radiologi === null) {
            $new = new Radiologi(['id_registrasi' => $this->id]);
            $new->save();
            return $new;
        }

        return $this->radiologi;
    }

    public function getPemeriksaanSpirometry()
    {
        return $this->hasOne(PemeriksaanSpirometry::class,['id_registrasi' => 'id']);
    }

    public function findOrCreatePemeriksaanSpirometry()
    {
        if ($this->pemeriksaanSpirometry === null) {
            $new = new PemeriksaanSpirometry(['id_registrasi' => $this->id]);
            $new->save();
            return $new;
        }

        return $this->pemeriksaanSpirometry;
    }

    public function getPemeriksaanAudiometry()
    {
        return $this->hasOne(PemeriksaanAudiometry::class,['id_registrasi' => 'id']);
    }

    public function findOrCreatePemeriksaanAudiometry()
    {
        if ($this->pemeriksaanAudiometry === null) {
            $new = new PemeriksaanAudiometry(['id_registrasi' => $this->id]);
            $new->save();
            return $new;
        }

        return $this->pemeriksaanAudiometry;
    }

    public function getPemeriksaanEkg()
    {
        return $this->hasOne(PemeriksaanEkg::class,['id_registrasi' => 'id']);
    }

    public function findOrCreatePemeriksaanEkg()
    {
        if ($this->pemeriksaanEkg === null) {
            $new = new PemeriksaanEkg(['id_registrasi' => $this->id]);
            $new->save();
            return $new;
        }

        return $this->pemeriksaanEkg;
    }

    public function getPemeriksaanTreadmill()
    {
        return $this->hasOne(PemeriksaanTreadmill::class,['id_registrasi' => 'id']);
    }

    public function findOrCreatePemeriksaanTreadmill()
    {
        if ($this->pemeriksaanTreadmill === null) {
            $new = new PemeriksaanTreadmill(['id_registrasi' => $this->id]);
            $new->save();
            return $new;
        }

        return $this->pemeriksaanTreadmill;
    }

    public function getPemeriksaanUsg()
    {
        return $this->hasOne(PemeriksaanUsg::class,['id_registrasi' => 'id']);
    }

    public function findOrCreatePemeriksaanUsg()
    {
        if ($this->pemeriksaanUsg === null) {
            $new = new PemeriksaanUsg(['id_registrasi' => $this->id]);
            $new->save();
            return $new;
        }

        return $this->pemeriksaanUsg;
    }

    public function getKesimpulan()
    {
        return $this->hasOne(Kesimpulan::class,['id_registrasi' => 'id']);
    }

    public function findOrCreateKesimpulan()
    {
        if ($this->kesimpulan === null) {
            $new = new Kesimpulan(['id_registrasi' => $this->id]);
            $new->save();
            return $new;
        }

        return $this->kesimpulan;
    }

    // public function listKesimpulan()
    // {
    //     return Registrasi::find()
    //         ->andWhere(['id' => $this->id])
    //         ->all();
    // }

    public function BodyMassIndex($bb1, $tb1) {
        $bb = $bb1;
        $tb = $tb1/100;

        $tb2 = $tb*$tb;
        @$bmi = $bb/$tb2;

        if ($bmi < 18.5) { 
            echo '<span class="label label-danger"> Kurang Berat Badan </span>';
        }
        elseif ($bmi >= 18.5 AND $bmi < 25 ) {
           echo '<span class="label label-success"> Normal (Ideal) </span>';
        }
        elseif ($bmi >= 25 AND $bmi < 30) {
           echo '<span class="label label-warning"> Kelebihan Berat Badan </span>';
        }
        elseif ($bmi > 30) {
           echo '<span class="label label-danger"> Kegemukan (Obesitas) </span>';
        }
    }

    public function TekananDarah($sb, $db) {

        if ($sb < 85 OR $db < 55) {
            echo '<span class="label label-default">Rendah (Hipotensi)</span>';
        }
        elseif ($sb < 120 AND $db < 80) { 
            echo '<span class="label label-success"> Normal </span>';
        }
        elseif (($sb >= 120 AND $sb <= 139) OR ($db >= 80 AND $db <= 89)) {
           echo '<span class="label label-warning"> PreHipertensi </span>';
        }
        elseif (($sb >= 140 AND $sb <= 159) OR ($db >= 90 AND $db <= 99)) {
           echo '<span class="label label-danger"> Hipertensi Grade 1 </span>';
        }
        elseif (($sb >= 160 AND $sb <= 179) OR ($db >= 100 AND $db <= 109)) {
           echo '<span class="label label-danger"> Hipertensi Grade 2 </span>';
        }
        elseif ($sb >= 180 OR $db >= 110) {
           echo '<span class="label label-danger"> Hipertensi Grade 3 </span>';
        }
    }

    public function updateKesimpulan()
    {
        $kesimpulan = '';

        $modelPemeriksaanFisik = $this->findOrCreatePemeriksaanFisik();
        $kesimpulan .= $modelPemeriksaanFisik->getKesimpulan();

        $modelKesimpulan = $this->findOrCreateKesimpulan();
        $modelKesimpulan->isi_kesimpulan = $kesimpulan;

        $modelKesimpulan->save();
    }

    public function setNomorUrut($param)
    {
        $no_max = Registrasi::find()
            ->joinWith('pasien')
            ->andFilterWhere(['pasien.id_pasien_instansi' => $param])
            ->count("no_urut");
            
        $no_max+=1;

        return $no_max;
    }

    public function setNomorRegistrasi()
    {
        $no_max = Registrasi::find()
          
            ->count("no_registrasi");
            
        $no_max+=1;

        return $no_max;
    }

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    public function setNomorMcu($param)
    {
        $no_max = Registrasi::find()
            ->joinWith('pasien')
            ->andFilterWhere(['pasien.id_pasien_instansi' => $param])
            ->count("no_registrasi");

        $no_max+=1;

        return $no_max;
    }

    public function setPasienId()
    {
        $id = Pasien::find()
            ->max("id");
            
        return $id;
    }

    public function generatePasien()
    {
        $model = new Pasien();

        $model->nik = $this->nik_pasien;
        $model->nama = $this->nama_pasien;
        $model->alamat = $this->alamat_pasien;
        $model->tempat_lahir = $this->tempat_lahir_pasien;
        $model->tanggal_lahir = $this->tanggal_lahir_pasien;
        $model->jenis_kelamin = $this->jenis_kelamin_pasien;
        $model->golongan_darah = $this->golongan_darah_pasien;
        $model->no_telepon = $this->no_telepon_pasien;
        $model->status_kawin = $this->status_kawin_pasien;
        $model->id_pasien_agama = $this->id_pasien_agama;
        $model->id_pasien_pekerjaan = $this->id_pasien_pekerjaan;
        $model->id_pasien_pendidikan = $this->id_pasien_pendidikan;
        $model->id_pasien_instansi = $this->id_pasien_instansi;
        $model->id_pasien_unit = $this->id_pasien_unit;

        $model->save();
    }

    public function generateUbahPasien($id)
    {
        $model = Pasien::FindOne($id);

        $model->nik = $this->nik_pasien;
        $model->nama = $this->nama_pasien;
        $model->alamat = $this->alamat_pasien;
        $model->tempat_lahir = $this->tempat_lahir_pasien;
        $model->tanggal_lahir = $this->tanggal_lahir_pasien;
        $model->jenis_kelamin = $this->jenis_kelamin_pasien;
        $model->golongan_darah = $this->golongan_darah_pasien;
        $model->no_telepon = $this->no_telepon_pasien;
        $model->status_kawin = $this->status_kawin_pasien;
        $model->id_pasien_agama = $this->id_pasien_agama;
        $model->id_pasien_pekerjaan = $this->id_pasien_pekerjaan;
        $model->id_pasien_pendidikan = $this->id_pasien_pendidikan;
        $model->id_pasien_instansi = $this->id_pasien_instansi;
        $model->id_pasien_unit = $this->id_pasien_unit;

        $model->save();
    }

    public function getListPasienInstansi()
    {
        $query = self::find()
            ->andWhere(['id_pasien_instansi' => Yii::$app->user->identity->id_instansi])
            ->all();

        return ArrayHelper::map($query,'pasien_id','nama_pasien');
    }

    public static function getList() {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'pasien_id','nama_pasien');
    }

    public function getHasil($searchModel)
    {


        $query = PemeriksaanRincianHasil::find()
            ->andWhere(['id_registrasi' => $this->id]);

        if ($searchModel->id_pemeriksaan_sub_rincian == null) {
            if(!empty($searchModel->id_pemeriksaan_sub)){
                $query->andWhere(['id_pemeriksaan_rincian' => $searchModel->id_pemeriksaan_sub]);
            }else{
                $query->andWhere(['id_pemeriksaan_rincian' => $searchModel->id_pemeriksaan]);
            }
        } else {
            $query->andWhere(['id_pemeriksaan_rincian' => $searchModel->id_pemeriksaan_sub_rincian]);
        }
        $list = $query->one();
            
        if ($list !== null) {
            return $list->jawaban;
        } 
        return null;
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

    public function allPemeriksaanHitungan()
    {
        return Pemeriksaan::find()
            ->andWhere('status_bmi = 1 OR status_tekanan_darah = 1')
            ->all();

    }
}
