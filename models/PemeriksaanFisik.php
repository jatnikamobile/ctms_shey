<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pemeriksaan_fisik".
 *
 * @property int $id
 * @property int $id_registrasi
 * @property string $keluhan_utama
 * @property string $riwayat_alergi
 * @property string $riwayat_kesehatan_dulu
 * @property string $riwayat_kesehatan_keluarga
 * @property string $kebiasaan
 * @property int $sistolik
 * @property int $diastolik
 * @property int $tinggi_badan
 * @property int $berat_badan
 * @property string $golongan_darah
 * @property string $buta_warna
 * @property string $anamnesa
 * @property string $nadi
 * @property string $pernafasan
 * @property string $suhu
 * @property Registrasi registrasi
 */
class PemeriksaanFisik extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemeriksaan_fisik';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_registrasi'], 'required'],
            [['id_registrasi', 'tinggi_badan', 'berat_badan', 'sistolik', 'diastolik'], 'integer'],
            [['keluhan_utama', 'riwayat_alergi', 'riwayat_kesehatan_dulu', 'riwayat_kesehatan_keluarga', 'kebiasaan', 'golongan_darah', 'buta_warna', 'anamnesa', 'nadi', 'pernafasan', 'suhu'], 'string', 'max' => 255],
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
            'keluhan_utama' => 'Keluhan Utama',
            'riwayat_alergi' => 'Riwayat Alergi',
            'riwayat_kesehatan_dulu' => 'Riwayat Kesehatan Dulu',
            'riwayat_kesehatan_keluarga' => 'Riwayat Kesehatan Keluarga',
            'kebiasaan' => 'Kebiasaan',
            'sistolik' => 'Sistolik',
            'diastolik' => 'Diastolik',
            'tinggi_badan' => 'Tinggi Badan',
            'berat_badan' => 'Berat Badan',
            'golongan_darah' => 'Golongan Darah',
            'buta_warna' => 'Buta Warna',
            'anamnesa' => 'Anamnesa',
            'nadi' => 'Nadi',
            'pernafasan' => 'Pernafasan',
            'suhu' => 'Suhu',
        ];
    }

    public function getRegistrasi()
    {
        return $this->hasOne(Registrasi::class,['id'=>'id_registrasi']);
    }

    public function getPemeriksaanFisikMata()
    {
        return $this->hasOne(PemeriksaanFisikMata::class,['id_pemeriksaan_fisik' => 'id']);
    }

    public function findOrCreatePemeriksaanFisikMata($params=[])
    {
        if ($this->pemeriksaanFisikMata === null) {
            $new = new PemeriksaanFisikMata(['id_pemeriksaan_fisik' => $this->id]);

            $new->save();

            return $new;
        }

        return $this->pemeriksaanFisikMata;
    }

    public function getPemeriksaanFisikTelinga()
    {
        return $this->hasOne(PemeriksaanFisikTelinga::class,['id_pemeriksaan_fisik' => 'id']);
    }

    public function findOrCreatePemeriksaanFisikTelinga()
    {
        if ($this->pemeriksaanFisikTelinga === null) {
            $new = new PemeriksaanFisikTelinga(['id_pemeriksaan_fisik' => $this->id]);
            $new->save();
            return $new;
        }

        return $this->pemeriksaanFisikTelinga;
    }

    public function getPemeriksaanFisikTimpani()
    {
        return $this->hasOne(PemeriksaanFisikTimpani::class,['id_pemeriksaan_fisik' => 'id']);
    }

    public function findOrCreatePemeriksaanFisikTimpani()
    {
        if ($this->pemeriksaanFisikTimpani === null) {
            $new = new PemeriksaanFisikTimpani(['id_pemeriksaan_fisik' => $this->id]);
            $new->save();
            return $new;
        }

        return $this->pemeriksaanFisikTimpani;
    }

    public function getPemeriksaanFisikHidung()
    {
        return $this->hasOne(PemeriksaanFisikHidung::class,['id_pemeriksaan_fisik' => 'id']);
    }

    public function findOrCreatePemeriksaanFisikHidung()
    {
        if ($this->pemeriksaanFisikHidung === null) {
            $new = new PemeriksaanFisikHidung(['id_pemeriksaan_fisik' => $this->id]);
            $new->save();
            return $new;
        }

        return $this->pemeriksaanFisikHidung;
    }

    public function getPemeriksaanFisikLeher()
    {
        return $this->hasOne(PemeriksaanFisikLeher::class,['id_pemeriksaan_fisik' => 'id']);
    }

    public function findOrCreatePemeriksaanFisikLeher()
    {
        if ($this->pemeriksaanFisikLeher === null) {
            $new = new PemeriksaanFisikLeher(['id_pemeriksaan_fisik' => $this->id]);
            $new->save();
            return $new;
        }

        return $this->pemeriksaanFisikLeher;
    }

    public function getPemeriksaanFisikMulut()
    {
        return $this->hasOne(PemeriksaanFisikMulut::class,['id_pemeriksaan_fisik' => 'id']);
    }

    public function findOrCreatePemeriksaanFisikMulut()
    {
        if ($this->pemeriksaanFisikMulut === null) {
            $new = new PemeriksaanFisikMulut(['id_pemeriksaan_fisik' => $this->id]);
            $new->save();
            return $new;
        }

        return $this->pemeriksaanFisikMulut;
    }

    public function getPemeriksaanFisikThorax()
    {
        return $this->hasOne(PemeriksaanFisikThorax::class,['id_pemeriksaan_fisik' => 'id']);
    }

    public function findOrCreatePemeriksaanFisikThorax()
    {
        if ($this->pemeriksaanFisikThorax === null) {
            $new = new PemeriksaanFisikThorax(['id_pemeriksaan_fisik' => $this->id]);
            $new->save();
            return $new;
        }

        return $this->pemeriksaanFisikThorax;
    }

    public function getPemeriksaanFisikAbdomen()
    {
        return $this->hasOne(PemeriksaanFisikAbdomen::class,['id_pemeriksaan_fisik' => 'id']);
    }

    public function findOrCreatePemeriksaanFisikAbdomen()
    {
        if ($this->pemeriksaanFisikAbdomen === null) {
            $new = new PemeriksaanFisikAbdomen(['id_pemeriksaan_fisik' => $this->id]);
            $new->save();
            return $new;
        }

        return $this->pemeriksaanFisikAbdomen;
    }

    public function getPemeriksaanFisikManuferEkstremitas()
    {
        return $this->hasOne(PemeriksaanFisikManuferEkstremitas::class,['id_pemeriksaan_fisik' => 'id']);
    }

    public function findOrCreatePemeriksaanFisikManuferEkstremitas()
    {
        if ($this->pemeriksaanFisikManuferEkstremitas === null) {
            $new = new PemeriksaanFisikManuferEkstremitas(['id_pemeriksaan_fisik' => $this->id]);
            $new->save();
            return $new;
        }

        return $this->pemeriksaanFisikManuferEkstremitas;
    }

    public function getKesimpulan()
    {
        $kesimpulan = '';

        if($this->keluhan_utama!='Tidak Ada') {
            $kesimpulan .= 'Keluhan Utama : '.$this->keluhan_utama.', ';
        };

        if($this->riwayat_alergi!='Tidak Ada') {
            $kesimpulan .= 'Riwayat Alergi : '.$this->riwayat_alergi.', ';
        };

        if($this->riwayat_kesehatan_dulu!='Tidak Ada') {
            $kesimpulan .= 'Riwayat Kesehatan Dulu : '.$this->riwayat_kesehatan_dulu.', ';
        };

        if($this->riwayat_kesehatan_keluarga!='Tidak Ada') {
            $kesimpulan .= 'Riwayat Kesehatan Keluarga : '.$this->riwayat_kesehatan_keluarga.', ';
        };

        if($this->kebiasaan!='Tidak Ada') {
            $kesimpulan .= 'Kebiasaan : '.$this->kebiasaan.', ';
        };

        $modelMata = $this->findOrCreatePemeriksaanFisikMata();

        if($modelMata->kacamata!='Tidak Pakai') {
            $kesimpulan .= 'Kacamata : '.$modelMata->kacamata.', ';
        }

        if($modelMata->kelopak_mata!='Normal') {
            $kesimpulan .= 'Kelopak Mata : '.$modelMata->kelopak_mata.', ';
        }

        if($modelMata->konjungtiva!='Normal') {
            $kesimpulan .= 'Konjungtiva : '.$modelMata->konjungtiva.', ';
        }

        if($modelMata->sklera!='Normal') {
            $kesimpulan .= 'Sklera : '.$modelMata->sklera.', ';
        }

        if($modelMata->pupil!='Isokor') {
            $kesimpulan .= 'Pupil : '.$modelMata->pupil.', ';
        }

        if($modelMata->buta_warna!='Normal') {
            $kesimpulan .= 'Buta Warna : '.$modelMata->buta_warna.', ';
        }

        if($modelMata->refraksi!='Normal') {
            $kesimpulan .= 'Refraksi : '.$modelMata->refraksi.', ';
        }

        if($modelMata->addisi!='Normal') {
            $kesimpulan .= 'Addisi : '.$modelMata->addisi.', ';
        }

        if($modelMata->funduskopi!='Normal') {
            $kesimpulan .= 'Funduskopi : '.$modelMata->funduskopi.', ';
        }

        if($modelMata->tekanan_bola!='Normal') {
            $kesimpulan .= 'Tekanan Bola : '.$modelMata->tekanan_bola.', ';
        }

        if($modelMata->mata_juling!='Normal') {
            $kesimpulan .= 'Mata Juling : '.$modelMata->mata_juling.', ';
        }


        $modelTelinga = $this->findOrCreatePemeriksaanFisikTelinga();

        if($modelTelinga->bentuk_telinga!='Normal') {
            $kesimpulan .= 'Bentuk Telinga : '.$modelTelinga->bentuk_telinga.', ';
        }

        if($modelTelinga->membrane!='Normal') {
            $kesimpulan .= 'Membrane : '.$modelTelinga->membrane.', ';
        }

        $modelTimpani = $this->findOrCreatePemeriksaanFisikTimpani();

        if($modelTimpani->serumen!='-/-') {
            $kesimpulan .= 'Serumen : '.$modelTimpani->serumen.', ';
        }

        if($modelTimpani->lainlain!='Normal') {
            $kesimpulan .= 'Timpani Lain-Lain : '.$modelTimpani->lainlain.', ';
        }

        $modelHidung = $this->findOrCreatePemeriksaanFisikHidung();

        if($modelHidung->bentuk_hidung!='Normal') {
            $kesimpulan .= 'Bentuk Hidung : '.$modelHidung->bentuk_hidung.', ';
        }

        if($modelHidung->septum_deviasi!='Tidak Ada') {
            $kesimpulan .= 'Septum Deviasi : '.$modelHidung->septum_deviasi.', ';
        }

        if($modelHidung->conchae!='Normal') {
            $kesimpulan .= 'Conchae : '.$modelHidung->conchae.', ';
        }

        $modelLeher = $this->findOrCreatePemeriksaanFisikLeher();

        if($modelLeher->tiroid!='Tidak Teraba') {
            $kesimpulan .= 'Tiroid : '.$modelLeher->tiroid.', ';
        }

        if($modelLeher->limfonoid!='Tidak Teraba') {
            $kesimpulan .= 'Limfonoid : '.$modelLeher->limfonoid.', ';
        }

        if($modelLeher->tenggorokan!='Normal') {
            $kesimpulan .= 'Tenggorokan : '.$modelLeher->tenggorokan.', ';
        }

        if($modelLeher->tonsil!='Normal') {
            $kesimpulan .= 'tonsil : '.$modelLeher->tonsil.', ';
        }

        if($modelLeher->faring!='Normal') {
            $kesimpulan .= 'Faring : '.$modelLeher->faring.', ';
        }

        $modelMulut = $this->findOrCreatePemeriksaanFisikMulut();

        if($modelMulut->mucosa_mulut!='Normal') {
            $kesimpulan .= 'Mucosa Mulut : '.$modelMulut->mucosa_mulut.', ';
        }

        if($modelMulut->kelainan_gigi!='Tidak ada Kelainan') {
            $kesimpulan .= 'Kelainan Gigi : '.$modelMulut->kelainan_gigi.', ';
        }

        if($modelMulut->lidah!='Normal') {
            $kesimpulan .= 'Lidah : '.$modelMulut->lidah.', ';
        }

        $modelThorax = $this->findOrCreatePemeriksaanFisikThorax();

        if($modelThorax->dinding!='Simetris') {
            $kesimpulan .= 'Dinding : '.$modelThorax->dinding.', ';
        }

        if($modelThorax->paru_paru!='Vesikuler') {
            $kesimpulan .= 'Paru-paru : '.$modelThorax->paru_paru.', ';
        }

        if($modelThorax->jantung!='Normal') {
            $kesimpulan .= 'Jantung : '.$modelThorax->jantung.', ';
        }

        $modelAbdomen = $this->findOrCreatePemeriksaanFisikAbdomen();

        if($modelAbdomen->dinding!='Normal') {
            $kesimpulan .= 'Dinding : '.$modelAbdomen->dinding.', ';
        }

        if($modelAbdomen->hati!='Normal') {
            $kesimpulan .= 'Hati : '.$modelAbdomen->hati.', ';
        }

        if($modelAbdomen->limpa!='Normal') {
            $kesimpulan .= 'Limpa : '.$modelAbdomen->limpa.', ';
        }

        if($modelAbdomen->usus!='Normal') {
            $kesimpulan .= 'Usus : '.$modelAbdomen->usus.', ';
        }

        if($modelAbdomen->hernia!='Normal') {
            $kesimpulan .= 'Hernia : '.$modelAbdomen->hernia.', ';
        }

        if($modelAbdomen->scrotalis!='Negativ') {
            $kesimpulan .= 'Scrotalis : '.$modelAbdomen->scrotalis.', ';
        }

        $modelManuferEkstremitas = $this->findOrCreatePemeriksaanFisikManuferEkstremitas();

        if($modelManuferEkstremitas->kekuatan!='Normal') {
            $kesimpulan .= 'Kekuatan : '.$modelManuferEkstremitas->kekuatan.', ';
        }

        if($modelManuferEkstremitas->varises!='Normal') {
            $kesimpulan .= 'Varises : '.$modelManuferEkstremitas->varises.', ';
        }

        if($modelManuferEkstremitas->reflek_fisiologis!='Normal') {
            $kesimpulan .= 'Reflek Fisiologis : '.$modelManuferEkstremitas->reflek_fisiologis.', ';
        }

        if($modelManuferEkstremitas->reflek_patologis!='Normal') {
            $kesimpulan .= 'Reflek Patologis : '.$modelManuferEkstremitas->reflek_patologis.', ';
        }

        if($modelManuferEkstremitas->lainlain!='Normal') {
            $kesimpulan .= 'Manufer Ekstremitas Lain-lain : '.$modelManuferEkstremitas->lainlain.', ';
        }

        return $kesimpulan;
    }

}