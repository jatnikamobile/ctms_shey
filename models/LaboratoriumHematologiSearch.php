<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LaboratoriumHematologi;

/**
 * LaboratoriumHematologiSearch represents the model behind the search form of `app\models\LaboratoriumHematologi`.
 */
class LaboratoriumHematologiSearch extends LaboratoriumHematologi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_laboratorium'], 'integer'],
            [['hemoglobin', 'lekosit', 'hematokrit', 'trombosit', 'eritrosit', 'hj_basofil', 'hj_eosinofil', 'hj_neutrofil_batang', 'hj_neutrofil_segment', 'hj_limfosit', 'hj_monosit', 'led'], 'safe'],
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
        $query = LaboratoriumHematologi::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_laboratorium' => $this->id_laboratorium,
        ]);

        $query->andFilterWhere(['like', 'hemoglobin', $this->hemoglobin])
            ->andFilterWhere(['like', 'lekosit', $this->lekosit])
            ->andFilterWhere(['like', 'hematokrit', $this->hematokrit])
            ->andFilterWhere(['like', 'trombosit', $this->trombosit])
            ->andFilterWhere(['like', 'eritrosit', $this->eritrosit])
            ->andFilterWhere(['like', 'hj_basofil', $this->hj_basofil])
            ->andFilterWhere(['like', 'hj_eosinofil', $this->hj_eosinofil])
            ->andFilterWhere(['like', 'hj_neutrofil_batang', $this->hj_neutrofil_batang])
            ->andFilterWhere(['like', 'hj_neutrofil_segment', $this->hj_neutrofil_segment])
            ->andFilterWhere(['like', 'hj_limfosit', $this->hj_limfosit])
            ->andFilterWhere(['like', 'hj_monosit', $this->hj_monosit])
            ->andFilterWhere(['like', 'led', $this->led]);

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
