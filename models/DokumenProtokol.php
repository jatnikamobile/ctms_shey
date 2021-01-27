<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

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
class DokumenProtokol extends \yii\db\ActiveRecord
{
    /** @var UploadedFile */
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dokumen_protokol';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama','id_protokol','file'], 'required'],
            [['deskripsi'], 'safe'],
            [['file'], 'file'],
        ];
    }

    public static function getList($labelAttr = 'nama') {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id',$labelAttr);
    }

    public function getProtokol()
    {
        return $this->hasOne(ProtokolUji::class, ['id' => 'id_protokol']);
    }
}
