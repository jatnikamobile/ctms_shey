<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PemeriksaanFisikManuferEkstremitas;

/**
 * PemeriksaanFisikManuferEkstremitasSearch represents the model behind the search form of `app\models\PemeriksaanFisikManuferEkstremitas`.
 */
class PemeriksaanFisikManuferEkstremitasSearch extends PemeriksaanFisikManuferEkstremitas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_pemeriksaan_fisik'], 'integer'],
            [['kekuatan', 'varises', 'reflek_fisiologis', 'reflek_patologis', 'lainlain'], 'safe'],
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
        $query = PemeriksaanFisikManuferEkstremitas::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_pemeriksaan_fisik' => $this->id_pemeriksaan_fisik,
        ]);

        $query->andFilterWhere(['like', 'kekuatan', $this->kekuatan])
            ->andFilterWhere(['like', 'varises', $this->varises])
            ->andFilterWhere(['like', 'reflek_fisiologis', $this->reflek_fisiologis])
            ->andFilterWhere(['like', 'reflek_patologis', $this->reflek_patologis])
            ->andFilterWhere(['like', 'lainlain', $this->lainlain]);

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
