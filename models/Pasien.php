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
class Pasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pasien_instansi', 'id_pasien_unit', 'umur'], 'integer'],
            // [['nik', 'nama'], 'required'],
            [['alamat'], 'string'],
            [['tanggal_lahir'], 'safe'],
            [['nik', 'nama', 'tempat_lahir', 'status_kawin'], 'string', 'max' => 255],
            [['jenis_kelamin', 'golongan_darah'], 'string', 'max' => 10],
            [['no_telepon'], 'string', 'max' => 20],
            [['id_pasien_agama', 'id_pasien_pekerjaan', 'id_pasien_pendidikan'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pasien_instansi' => 'Instansi',
            'id_pasien_unit' => 'Unit',
            'nik' => 'Nik',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'umur' => 'Umur',
            'jenis_kelamin' => 'Jenis Kelamin',
            'golongan_darah' => 'Golongan Darah',
            'no_telepon' => 'No Telepon',
            'status_kawin' => 'Status Kawin',
            'id_pasien_agama' => 'Agama',
            'id_pasien_pekerjaan' => 'Pekerjaan',
            'id_pasien_pendidikan' => 'Pendidikan',
        ];
    }

    public static function getList() {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id','nama');
    }

    public static function getCount()
    {
        return static::find()->count();
    }

    public static function getCountByInstansi($param)
    {
        return static::find()->andFilterWhere(['id_pasien_instansi' => $param])->count();
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
        return $this->hasOne(Instansi::class, ['id' => 'id_pasien_instansi']);
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

    public function getPendidikan()
    {
        return $this->hasOne(Pendidikan::class, ['id' => 'id_pasien_pendidikan']);
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

}
