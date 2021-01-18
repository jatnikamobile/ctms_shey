<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LaboratoriumKimia;

/**
 * LaboratoriumKimiaSearch represents the model behind the search form of `app\models\LaboratoriumKimia`.
 */
class LaboratoriumKimiaSearch extends LaboratoriumKimia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_laboratorium'], 'integer'],
            [['faal_hati_sgot', 'faal_hati_sgpt', 'lemak_kolesterol_total', 'lemak_trigliserida', 'lemak_kolesterol_hdl', 'lemak_kolesterol_ldl', 'diabetes_glukosa_puasa', 'diabetes_glukosa_2_jam', 'diabetes_gamma_gt'], 'safe'],
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
        $query = LaboratoriumKimia::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_laboratorium' => $this->id_laboratorium,
        ]);

        $query->andFilterWhere(['like', 'faal_hati_sgot', $this->faal_hati_sgot])
            ->andFilterWhere(['like', 'faal_hati_sgpt', $this->faal_hati_sgpt])
            ->andFilterWhere(['like', 'lemak_kolesterol_total', $this->lemak_kolesterol_total])
            ->andFilterWhere(['like', 'lemak_trigliserida', $this->lemak_trigliserida])
            ->andFilterWhere(['like', 'lemak_kolesterol_hdl', $this->lemak_kolesterol_hdl])
            ->andFilterWhere(['like', 'lemak_kolesterol_ldl', $this->lemak_kolesterol_ldl])
            ->andFilterWhere(['like', 'diabetes_glukosa_puasa', $this->diabetes_glukosa_puasa])
            ->andFilterWhere(['like', 'diabetes_glukosa_2_jam', $this->diabetes_glukosa_2_jam])
            ->andFilterWhere(['like', 'diabetes_gamma_gt', $this->diabetes_gamma_gt]);

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
