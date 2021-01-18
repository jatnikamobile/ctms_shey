<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Registrasi;

/**
 * RegistrasiSearch represents the model behind the search form of `app\models\Registrasi`.
 */
class RegistrasiSearch extends Registrasi
{   
    public $nik;
    public $id_instansi;
    public $tanggal_awal;
    public $tanggal_akhir;
    public $id_pemeriksaan;
    public $id_pemeriksaan_sub;
    public $id_pemeriksaan_sub_rincian;
    public $hasil;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['id', 'paket_id', 'pasien_id', 'no_urut', 'id_pasien_instansi', 'id_pasien_unit'], 'integer'],
            [['tanggal','no_registrasi', 'tanggal_awal', 'tanggal_akhir', 'no_mcu','nik', 'id_pemeriksaan', 'id_pemeriksaan_sub','id_pemeriksaan_sub_rincian','hasil','nama_pasien'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */

    public function getQuerySearch($params)
    {
        $query = Registrasi::find();

        $this->load($params);
        
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'no_registrasi' => $this->no_registrasi,
            'no_mcu' => $this->no_mcu,
            'no_urut' => $this->no_urut,
            'paket_id' => $this->paket_id,
            'nama_pasien' => $this->nama_pasien,
            'tanggal' => $this->tanggal,
            'id_pasien_instansi' => $this->id_pasien_instansi,
            'id_pasien_unit' => $this->id_pasien_unit
        ]);

        $query->andFilterWhere(['between', 'tanggal', $this->tanggal_awal, $this->tanggal_akhir]);

        return $query;
    }
    
    public function search($params)
    {
        $query = $this->getQuerySearch($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);        

        return $dataProvider;
    }

    public function searchResumeHasil($params)
    {
        $query = Registrasi::find();
        $this->load($params);

        $query->joinWith('pasien');
        $query->andFilterWhere([
            'id' => $this->id,
            'no_registrasi' => $this->no_registrasi,
            'no_mcu' => $this->no_mcu,
            'no_urut' => $this->no_urut,
            'paket_id' => $this->paket_id,
            'pasien_id' => $this->pasien_id,
            'nama_pasien' => $this->nama_pasien,
            'tanggal' => $this->tanggal,
            'registrasi.id_pasien_instansi' => $this->id_pasien_instansi,
            'id_pasien_unit' => $this->id_pasien_unit
        ]);

        $query->andFilterWhere(['between', 'tanggal', $this->tanggal_awal, $this->tanggal_akhir]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);        

        return $dataProvider;
    }

    public function searchAnalisisMcu($params)
    {
        $query = Registrasi::find();
        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->joinWith('pasien');
        $query->andFilterWhere([
            'id' => $this->id,
            'no_registrasi' => $this->no_registrasi,
            'no_mcu' => $this->no_mcu,
            'no_urut' => $this->no_urut,
            'paket_id' => $this->paket_id,
            'pasien_id' => $this->pasien_id,
            'tanggal' => $this->tanggal,
            'registrasi.id_pasien_unit' => $this->id_pasien_unit,
            'pasien.id_pasien_instansi' => $this->id_pasien_instansi,
        ]);

        $query->andFilterWhere(['between', 'tanggal', $this->tanggal_awal, $this->tanggal_akhir]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);        

        return $dataProvider;
    }

    public function getGrafikKoordinatX()
    {
        $query = PemeriksaanRincianPilihan::find();

        // jika filter hanya sampai pada sub analisa, maka grafik menampilkan kesimpulan pada level pemeriksaan analisa
        if ($this->id_pemeriksaan_sub_rincian == null) { 
            $query->joinWith('pemeriksaanRincian')
//                ->andWhere(['pemeriksaan_rincian.id_pemeriksaan' => $this->id_pemeriksaan_sub])
                ->andWhere(['pemeriksaan_rincian.id_pemeriksaan' => $this->id_pemeriksaan   ])
                ->andWhere(['pemeriksaan_rincian.rincian_jenis' => PemeriksaanRincian::PILIHAN_KESIMPULAN]);
        } else {
            $query->andWhere(['id_pemeriksaan_rincian' => $this->id_pemeriksaan_sub_rincian]);
        }
        $data = [];

        foreach ($query->all() as $pilihan) {
            $data[] = [$pilihan->nama];
        }
        return $data;
    }

    public function getGrafik()
    {
        $query = PemeriksaanRincianPilihan::find();

        // jika filter hanya sampai pada sub analisa, maka grafik menampilkan kesimpulan pada level pemeriksaan analisa
        if ($this->id_pemeriksaan_sub_rincian == null) {
            if(!empty($this->id_pemeriksaan_sub)){
                $query->joinWith('pemeriksaanRincian')
                    ->andWhere(['pemeriksaan_rincian.id_pemeriksaan' => $this->id_pemeriksaan_sub]);
                    // ->andWhere(['pemeriksaan_rincian.rincian_jenis' => PemeriksaanRincian::PILIHAN_KESIMPULAN]);
            }else{
                $query->joinWith('pemeriksaanRincian')
                    ->andWhere(['pemeriksaan_rincian.id_pemeriksaan' => $this->id_pemeriksaan]);
                    // ->andWhere(['pemeriksaan_rincian.rincian_jenis' => PemeriksaanRincian::PILIHAN_KESIMPULAN]);
            }
        } else {
            $query->andWhere(['id_pemeriksaan_rincian' => $this->id_pemeriksaan_sub_rincian]);
        }
        // echo $query->createCommand()->getRawSql(); die();
        $data = [];
        foreach ($query->all() as $pilihan) { 

            $pemeriksaanRincianHasil = PemeriksaanRincianHasil::find()
                ->joinWith('registrasi')
                ->joinWith('pasien')
                ->andFilterWhere(['pasien.id_pasien_instansi' => $this->id_pasien_instansi])
                ->andFilterWhere(['registrasi.paket_id' => $this->paket_id])
                ->andFilterWhere(['registrasi.id_pasien_unit' => $this->id_pasien_unit])
                ->andFilterWhere(['between', 'tanggal', $this->tanggal_awal, $this->tanggal_akhir]);
            if ($this->id_pemeriksaan_sub_rincian == null) {
                    if(!empty($this->id_pemeriksaan_sub)){
                        $pemeriksaanRincianHasil->joinWith('pemeriksaanRincian')
                            ->andWhere(['pemeriksaan_rincian.id_pemeriksaan' => $this->id_pemeriksaan_sub])
                            ->andWhere(['pemeriksaan_rincian.rincian_jenis' => PemeriksaanRincian::PILIHAN_KESIMPULAN])
                            ->andWhere(['jawaban' => $pilihan->nama]);
                    }else{
                        $pemeriksaanRincianHasil->joinWith('pemeriksaanRincian')
                            ->andWhere(['pemeriksaan_rincian.id_pemeriksaan' => $this->id_pemeriksaan])
                            ->andWhere(['pemeriksaan_rincian.rincian_jenis' => PemeriksaanRincian::PILIHAN_KESIMPULAN])
                            ->andWhere(['jawaban' => $pilihan->nama]);
                    }
            } else {
                $pemeriksaanRincianHasil = PemeriksaanRincianHasil::find()
                    ->andWhere([
                        'id_pemeriksaan_rincian' => $this->id_pemeriksaan_sub_rincian,
                        'jawaban' => $pilihan->nama
                    ]);
            }

            $data[] = [$pilihan->nama, (int) $pemeriksaanRincianHasil->count()];
        }
        return $data;
    }

    public function getRincianHasil($searchModel)
    {
        $pemeriksaanRincianHasil = PemeriksaanRincianHasil::find()
            ->select("pemeriksaan_rincian_hasil.*, registrasi.no_registrasi, registrasi.no_mcu, registrasi.no_urut,registrasi.paket_id, registrasi.tanggal, registrasi.nik_pasien, registrasi.nama_pasien, pasien.tanggal_lahir")
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
                    ->andWhere(['jawaban' => $searchModel->hasil]);
            }else{
                $pemeriksaanRincianHasil->joinWith('pemeriksaanRincian')
                    ->andWhere(['pemeriksaan_rincian.id_pemeriksaan' => $searchModel->id_pemeriksaan])
                    ->andWhere(['pemeriksaan_rincian.rincian_jenis' => PemeriksaanRincian::PILIHAN_KESIMPULAN])
                    ->andWhere(['jawaban' => $searchModel->hasil]);
            }
        } else {
            $pemeriksaanRincianHasil
                ->andWhere([
                    'id_pemeriksaan_rincian' => $searchModel->id_pemeriksaan_sub_rincian,
                    'jawaban' => $searchModel->hasil
                ]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $pemeriksaanRincianHasil,
        ]);

        return $dataProvider;
    }



}
