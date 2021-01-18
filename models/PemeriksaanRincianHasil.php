<?php

namespace app\models;

use Yii;
use app\models\PemeriksaanRincian;
use app\models\PemeriksaanRincianHasil;
use app\models\Petugas;
use yii\helpers\Html;


/**
 * This is the model class for table "pemeriksaan_rincian_hasil".
 *
 * @property int $id
 * @property int $id_registrasi
 * @property int $id_pemeriksaan_rincian
 * @property string $jawaban
 */
class PemeriksaanRincianHasil extends \yii\db\ActiveRecord
{
    public $uraian;
    public $pilihan;
    public $file;
    public $dokter;
    public $pemeriksa;
    public $nik_pasien;
    public $nama_pasien;
    public $tanggal_lahir;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemeriksaan_rincian_hasil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_registrasi', 'id_pemeriksaan_rincian'], 'required'],
            [['id_registrasi', 'id_pemeriksaan_rincian'], 'integer'],
            [['jawaban'], 'string'],
            [['uraian','pilihan','file','dokter','pemeriksa'],'safe'],
            [['file'], 'file', 'extensions' => 'png, jpg, pdf'],
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
            'id_pemeriksaan_rincian' => 'Id Pemeriksaan Rincian',
            'jawaban' => 'Jawaban',
        ];
    }

    public function getLinkFileLampiran()
    {
        return \yii\helpers\Html::a($this->jawaban, ['pemeriksaan-rincian-hasil/unduh-lampiran','id' => $this->id], ['option' => 'value'],['target'=>'_blank']);
    }

    /**
     * @param $filePath
     * @return bool
     * Melakukan pengecekan apakah file ada atau tidak
     */
    public function isFileExist($filePath=null)
    {
        if ($filePath == null) {
            $filePath = Yii::getAlias('@app').'/web/uploads/'.$this->jawaban;
        }

        if (is_file($filePath)) {
            return true;
        } else {
            return false;
        }
    }

    public function getGambar($htmlOptions=[]) {
        $filePath = Yii::getAlias('@app').'/web/uploads/'.$this->jawaban;
        if($this->isFileExist($filePath)) {
            return Html::img(Yii::getAlias('@web').'/uploads/'.$this->jawaban, $htmlOptions); 
        }
    }

    public function getPemeriksaanRincian()
    {
        return $this->hasOne(PemeriksaanRincian::class,['id' => 'id_pemeriksaan_rincian']);
    }    

    public function getRegistrasi()
    {
        return $this->hasOne(Registrasi::class,['id' => 'id_registrasi']);
    }

    public function getPasien()
    {
        return $this->hasOne(Pasien::class,['id' => 'pasien_id'])
            ->via('registrasi');
    }    

    /**
     * @param $filePath
     * @return bool
     * Mengahapus file, jika $file sudah ada sebelumnya
     */
    public function hapusFile($filePath)
    {
        if ($this->isFileExist($filePath)) {
            unlink($filePath);
        }
    }

    /**
     * @param $id_registrasi
     * @param $arrayFile[]
     * @return Save Lampiran
     * Fungsi untuk menyimpan lampiran
     */
    public function uploadLampiran($id_registrasi, $arrayFile)
    {
       if (count($this->file) !== 0) {
            foreach ($this->file as $key => $file) {
                // FindOne PemeriksaanRincianHasil
                $self = PemeriksaanRincianHasil::find()
                    ->andWhere(['id_registrasi' => $id_registrasi])
                    ->andWhere(['id_pemeriksaan_rincian' => $arrayFile[$key]])
                    ->one();

                // Filename pada lampiran yang di upload
                $fileName = $file->baseName . '.' . $file->extension;
                // Path untuk menyimpan lampiran yang telah di upload
                $path = Yii::getAlias('@app').'/web/uploads/';

                if ($self === null) {
                    // Membuat Pemeriksaan Rincian Hasil Baru
                    $self = new PemeriksaanRincianHasil();
                    $self->id_registrasi = $id_registrasi;
                    $self->id_pemeriksaan_rincian = $arrayFile[$key];
                    $self->jawaban = $fileName;
                    $self->save(false);
                }
                if ($self) {
                    // mengedit Pemeriksaan Rincian Hasil lama
                    $self->jawaban = $fileName;
                    $self->save(false);
                }

                // Menyimpan file lampiran yang telah di upload pada direktori "web/uploads"
                $file->saveAs($path.$fileName, false);
            }
        }
    }

    /**
     * @param $id_registrasi
     * @param $postPilihan[]
     * @return Menyimpan Data Hasil Pemeriksaan Rincian
     * Fungsi untuk melakukan pengecekan pada PemeriksaanRincianHasil
     */
    public function savePemeriksaanRincianHasil($id_registrasi, $postPilihan)
    {
        // Melakukan pengecekan apakah kesimpulan untuk registrasi sudah ada atau tidak
        $modelKesimpulan = Kesimpulan::findOne(['id_registrasi' => $id_registrasi]);
        if ($modelKesimpulan === null) {
            // Membuat objek kesimpulan untuk di simpan pada table Kesimpulan
            $modelKesimpulan = new Kesimpulan();
            $modelKesimpulan->id_registrasi = $id_registrasi;
        }

        // Variable untuk menampung hasil dari pemeriksaan yang nanti nya akan di simpan pada attribute isi_kesimpulan table Kesimpulan
        $concat = '';

        // Melakukan pengechekan apakah form uraian !== null . Dilakukan untuk pencegahan error muncul, jika form pemeriksaan tidak di isi sama sekali 
        if ($this->uraian !== null) {
            foreach ($this->uraian as $id_pemeriksaan_rincian => $jawaban) {
                // FindOne PemeriksaanRincianHasil
                $self = PemeriksaanRincianHasil::find()
                    ->andWhere(['id_registrasi' => $id_registrasi])
                    ->andWhere(['id_pemeriksaan_rincian' => $id_pemeriksaan_rincian])
                    ->one();
                // FindOne PemeriksaanRincian
                $modelPemeriksaanRincian = PemeriksaanRincian::findOne($id_pemeriksaan_rincian);
                

                if ($self !== null) {
                    // Jika PemeriksaanRincianHasil sudah ada, maka update datanya
                    $self->id_registrasi = $id_registrasi;
                    $self->id_pemeriksaan_rincian = $id_pemeriksaan_rincian;
                    $self->jawaban = $jawaban;
                    $self->save(false);
                } else {
                    // Jika PemeriksaanRincianHasil sudah ada, maka buat data baru
                    $self = new PemeriksaanRincianHasil();
                    $self->id_registrasi = $id_registrasi;
                    $self->id_pemeriksaan_rincian = $id_pemeriksaan_rincian;
                    $self->jawaban = $jawaban;
                    $self->save(false);

                }

                // Melakukan pengechekan jika PemeriksaanRincian memiliki default_value
                if ($modelPemeriksaanRincian->isDefaultValueIsNotNull()) {
                    // Jika default_value tidak sama dengan jawaban yang di input maka concat adalah jawaban yang di input
                    if ($modelPemeriksaanRincian->default_value != $jawaban) {
                        $concat .= $modelPemeriksaanRincian->nama.' : '.$jawaban.', ';
                    }
                }
            }
        }

        // Melakukan pengechekan apakah form postPilihan !== null . Dilakukan untuk pencegahan error muncul, jika form pemeriksaan tidak di isi sama sekali 
        if ($postPilihan !== null) {
            foreach ($postPilihan as $id_pemeriksaan_rincian => $jawaban) {
                // FindOne PemeriksaanRincianHasil
                $self = PemeriksaanRincianHasil::find()
                    ->andWhere(['id_registrasi' => $id_registrasi])
                    ->andWhere(['id_pemeriksaan_rincian' => $id_pemeriksaan_rincian])
                    ->one();
                // FindOne PemeriksaanRincian
                $modelPemeriksaanRincian = PemeriksaanRincian::findOne($id_pemeriksaan_rincian);

                if ($self !== null) {
                    // Jika PemeriksaanRincianHasil sudah ada, maka update datanya
                    $self->id_registrasi = $id_registrasi;
                    $self->id_pemeriksaan_rincian = $id_pemeriksaan_rincian;
                    $self->jawaban = $jawaban;
                    $self->save(false);
                } else {
                    // Jika PemeriksaanRincianHasil sudah ada, maka buat data baru
                    $self = new PemeriksaanRincianHasil();
                    $self->id_registrasi = $id_registrasi;
                    $self->id_pemeriksaan_rincian = $id_pemeriksaan_rincian;
                    $self->jawaban = $jawaban;
                    $self->save(false);

                }

                // Melakukan pengechekan jika PemeriksaanRincian rincianJenis nya adalah pilihan
                if ($modelPemeriksaanRincian->isPilihan()) {
                    // Melakukan perulangan untuk mencari nilai default pada PemeriksaanRincianPilihan di ambil dari models PemeriksaanRincian
                    foreach ($modelPemeriksaanRincian->manyPemeriksaanRincianPilihan as $pemeriksaanRincianPilihan) {
                        // Melakukan pengechekan jika PemeriksaanRincianPilihan memiliki default_value
                        if ($pemeriksaanRincianPilihan->isDefaultValue()) {
                            // Jika default_value tidak sama dengan jawaban yang di input maka concat adalah jawaban yang di input
                            if ($pemeriksaanRincianPilihan->nama != $jawaban) {
                                $concat .= $modelPemeriksaanRincian->nama.' : '.$jawaban.', ';
                            }
                        }
                    }
                }
            }
        }

        // Menyimpan isi kesimpulan dari variable $concat
        $modelKesimpulan->isi_kesimpulan = $concat;
        $modelKesimpulan->save();
    }

    public function setDokter()
    {
        foreach ($this->dokter as $key => $value) {

            $query = PemeriksaanRincianHasil::findOne([
                'id_registrasi' => $this->id_registrasi,
                'id_pemeriksaan_rincian' => $key,
            ]);

            if ($query != null) {
                $query->jawaban = $value;
                $query->save();
            } else {
                $model = new PemeriksaanRincianHasil();
                $model->id_registrasi = $this->id_registrasi;
                $model->id_pemeriksaan_rincian = $key;
                $model->jawaban = $value;
                $model->save(false);
            }
        }
    }

    public function setPemeriksa()
    {
        foreach ($this->pemeriksa as $key => $value) {

            $query = PemeriksaanRincianHasil::findOne([
                'id_registrasi' => $this->id_registrasi,
                'id_pemeriksaan_rincian' => $key,
            ]);

            if ($query != null) {
                $query->jawaban = $value;
                $query->save();
            } else {
                $model = new PemeriksaanRincianHasil();
                $model->id_registrasi = $this->id_registrasi;
                $model->id_pemeriksaan_rincian = $key;
                $model->jawaban = $value;
                $model->save(false);
            }
        }
    }    

    public function isDokter()
    {
        $query = PemeriksaanRincianHasil::findOne([
            'id_registrasi' => $this->id_registrasi,
            'id_pemeriksaan_rincian' => $this->id_pemeriksaan_rincian,
        ]);

        if ($query != null) {
            return true;
        }        
        return false;
    }

    public function getOneDokter()
    {
        return $this->hasOne(Dokter::class,['id' => 'jawaban']);
    }

    public function getOnePetugas()
    {
        return $this->hasOne(Petugas::class,['id' => 'jawaban']);
    }    
}
