<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PemeriksaanFisikMata;

/**
 * PemeriksaanFisikMataSearch represents the model behind the search form of `app\models\PemeriksaanFisikMata`.
 */
class PemeriksaanFisikMataSearch extends PemeriksaanFisikMata
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_pemeriksaan_fisik'], 'integer'],
            [['kacamata', 'kelopak_mata', 'konjungtiva', 'sklera', 'pupil', 'buta_warna', 'refraksi', 'addisi', 'funduskopi', 'tekanan_bola', 'mata_juling', 'tonometri'], 'safe'],
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
        $query = PemeriksaanFisikMata::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_pemeriksaan_fisik' => $this->id_pemeriksaan_fisik,
        ]);

        $query->andFilterWhere(['like', 'kacamata', $this->kacamata])
            ->andFilterWhere(['like', 'kelopak_mata', $this->kelopak_mata])
            ->andFilterWhere(['like', 'konjungtiva', $this->konjungtiva])
            ->andFilterWhere(['like', 'sklera', $this->sklera])
            ->andFilterWhere(['like', 'pupil', $this->pupil])
            ->andFilterWhere(['like', 'buta_warna', $this->buta_warna])
            ->andFilterWhere(['like', 'refraksi', $this->refraksi])
            ->andFilterWhere(['like', 'addisi', $this->addisi])
            ->andFilterWhere(['like', 'funduskopi', $this->funduskopi])
            ->andFilterWhere(['like', 'tekanan_bola', $this->tekanan_bola])
            ->andFilterWhere(['like', 'mata_juling', $this->mata_juling])
            ->andFilterWhere(['like', 'tonometri', $this->tonometri]);

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
