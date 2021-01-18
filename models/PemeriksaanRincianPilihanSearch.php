<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PemeriksaanRincianPilihan;

/**
 * PemeriksaanRincianPilihanSearch represents the model behind the search form of `app\models\PemeriksaanRincianPilihan`.
 */
class PemeriksaanRincianPilihanSearch extends PemeriksaanRincianPilihan
{
    /**
     * @inheritdoc
     */

    public $id_pemeriksaan_sub_rincian;
    public $id_pemeriksaan_sub;
    public $id_pemeriksaan;

    public function rules()
    {
        return [
            [['id', 'id_pemeriksaan_rincian'], 'integer'],
            [['nama','id_pemeriksaan_sub_rincian','id_pemeriksaan_sub'], 'safe'],
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
        $query = PemeriksaanRincianPilihan::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_pemeriksaan_rincian' => $this->id_pemeriksaan_rincian,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama]);

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

    public function searchAnalisisMcu($params)
    {
        $query = $this->getQuerySearch($params);

        if ($this->id_pemeriksaan_sub_rincian == null) { 
           if(!empty($this->id_pemeriksaan_sub)){
               $query->joinWith('pemeriksaanRincian')
                   ->andWhere(['pemeriksaan_rincian.id_pemeriksaan' => $this->id_pemeriksaan_sub])
                   ->andWhere(['pemeriksaan_rincian.rincian_jenis' => PemeriksaanRincian::PILIHAN_KESIMPULAN]);
           }else{
               $query->joinWith('pemeriksaanRincian')
                   ->andWhere(['pemeriksaan_rincian.id_pemeriksaan' => $this->id_pemeriksaan])
                   ->andWhere(['pemeriksaan_rincian.rincian_jenis' => PemeriksaanRincian::PILIHAN_KESIMPULAN]);
           }
        } else {
            $query->andWhere(['id_pemeriksaan_rincian' => $this->id_pemeriksaan_sub_rincian]);
        }        

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
