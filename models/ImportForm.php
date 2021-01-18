<?php

namespace app\models;

use PhpOffice\PhpSpreadsheet\IOFactory;
use app\models\Pasien;
use yii\base\Model;
use yii\web\UploadedFile;

class ImportForm extends Model
{
    public $file;
    public $sheet;
    public $mulai_dari;

    public function rules()
    {
        return [
            [['sheet','mulai_dari'],'required'],
            ['file','file'],
            [['mulai_dari'],'integer'],
        ];
    }

    public function setSheet(int $sheet){
        $sheet = $sheet - 1;
        return $this->sheet = $sheet;
    }

    public function uploadFile()
    {
        $file = UploadedFile::getInstance($this, 'file');

        if (is_object($file)) {
            $this->file = $file->baseName;
            $this->file .= '.' . $file->extension;

            $path = \Yii::getAlias('@app').'/web/imports/'.$this->file;

            if ($file->saveAs($path, false)) {
                $this->setSheet($this->sheet);
                if ($this->importExcel()){
                    return true;
                }
            }
        }
    }


    public function importExcel()
    {
        $fileDir = \Yii::getAlias('@app').'/web/imports/'.$this->file;

        if (!file_exists($fileDir)) {
            echo 'File Tidak Ditemukan ' . pathinfo($fileDir, PATHINFO_BASENAME);
            die;
        }

        $spreadSheet = IOFactory::load($fileDir);
        $spreadSheet->setActiveSheetIndex($this->sheet);
        $sheetData = $spreadSheet->getActiveSheet();
        $hightRow = $sheetData->getHighestRow();
        $mulai = $this->mulai_dari;

        for ($i = $mulai; $i <= $hightRow; $i++){
            // Kolom NIK Pasien
            $nik = trim($sheetData->getCell("B$i")->getValue());
            // Kolom Nama Pasien
            $nama = trim($sheetData->getCell("C$i")->getValue());
            // Kolom Alamat
            $alamat = trim($sheetData->getCell("D$i")->getValue());
            // Kolom Tempat Lahir
            $tempatLahir = trim($sheetData->getCell("E$i")->getValue());
            // Kolom Tanggal Lahir
            $tanggalLahir = trim($sheetData->getCell("F$i")->getValue());
            // Kolom Jenis Kelamin
            $jenisKelamin = trim($sheetData->getCell("G$i")->getValue());
            // Kolom Golongan Darah
            $golonganDarah = trim($sheetData->getCell("H$i")->getValue());
            // Kolom Nomor Telepon
            $nomorTelepon = trim($sheetData->getCell("I$i")->getValue());
            // Kolom Status Perkawinan
            $statusPerkawinan = trim($sheetData->getCell("J$i")->getValue());

            $modelPasien = Pasien::find()
            ->andWhere([
                'nik' => $nik,
                'nama' => $nama
            ])->one();

            if ($modelPasien === null) {
                $modelPasien = new Pasien();
                $modelPasien->nik = $nik;
                $modelPasien->nama = $nama;
                $modelPasien->alamat = $alamat;
                $modelPasien->tempat_lahir = $tempatLahir;
                $modelPasien->tanggal_lahir = $tanggalLahir;
                $modelPasien->jenis_kelamin = $jenisKelamin;
                $modelPasien->golongan_darah = $golonganDarah;
                $modelPasien->no_telepon = $nomorTelepon;
                $modelPasien->status_kawin = $statusPerkawinan;
                $modelPasien->save();
            }

        }

        return true;
    }
}
