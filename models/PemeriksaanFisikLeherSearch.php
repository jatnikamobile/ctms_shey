<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PemeriksaanFisikLeher;

/**
 * PemeriksaanFisikLeherSearch represents the model behind the search form of `app\models\PemeriksaanFisikLeher`.
 */
class PemeriksaanFisikLeherSearch extends PemeriksaanFisikLeher
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_pemeriksaan_fisik'], 'integer'],
            [['tiroid', 'limfonoid', 'tenggorokan', 'tonsil', 'faring'], 'safe'],
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
        $query = PemeriksaanFisikLeher::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_pemeriksaan_fisik' => $this->id_pemeriksaan_fisik,
        ]);

        $query->andFilterWhere(['like', 'tiroid', $this->tiroid])
            ->andFilterWhere(['like', 'limfonoid', $this->limfonoid])
            ->andFilterWhere(['like', 'tenggorokan', $this->tenggorokan])
            ->andFilterWhere(['like', 'tonsil', $this->tonsil])
            ->andFilterWhere(['like', 'faring', $this->faring]);

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
