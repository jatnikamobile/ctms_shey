<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PemeriksaanFisik;

/**
 * PemeriksaanFisikSearch represents the model behind the search form of `app\models\PemeriksaanFisik`.
 */
class PemeriksaanFisikSearch extends PemeriksaanFisik
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_registrasi', 'tinggi_badan', 'berat_badan', 'sistolik', 'diastolik'], 'integer'],
            [['keluhan_utama', 'riwayat_alergi', 'riwayat_kesehatan_dulu', 'riwayat_kesehatan_keluarga', 'kebiasaan',  'golongan_darah', 'buta_warna', 'anamnesa', 'nadi', 'pernafasan', 'suhu'], 'safe'],
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
        $query = PemeriksaanFisik::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_registrasi' => $this->id_registrasi,
            'tinggi_badan' => $this->tinggi_badan,
            'berat_badan' => $this->berat_badan,
            'sistolik' => $this->sistolik,
            'diastolik' => $this->diastolik,
        ]);

        $query->andFilterWhere(['like', 'keluhan_utama', $this->keluhan_utama])
            ->andFilterWhere(['like', 'riwayat_alergi', $this->riwayat_alergi])
            ->andFilterWhere(['like', 'riwayat_kesehatan_dulu', $this->riwayat_kesehatan_dulu])
            ->andFilterWhere(['like', 'riwayat_kesehatan_keluarga', $this->riwayat_kesehatan_keluarga])
            ->andFilterWhere(['like', 'kebiasaan', $this->kebiasaan])
            ->andFilterWhere(['like', 'golongan_darah', $this->golongan_darah])
            ->andFilterWhere(['like', 'buta_warna', $this->buta_warna])
            ->andFilterWhere(['like', 'anamnesa', $this->anamnesa])
            ->andFilterWhere(['like', 'nadi', $this->nadi])
            ->andFilterWhere(['like', 'pernafasan', $this->pernafasan])
            ->andFilterWhere(['like', 'suhu', $this->suhu]);

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


}
