<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LaboratoriumNarkoba;

/**
 * LaboratoriumNarkobaSearch represents the model behind the search form of `app\models\LaboratoriumNarkoba`.
 */
class LaboratoriumNarkobaSearch extends LaboratoriumNarkoba
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_laboratorium'], 'integer'],
            [['methamphetamine', 'cocain', 'amphetamine', 'morphine', 'mariyuana'], 'safe'],
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
        $query = LaboratoriumNarkoba::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_laboratorium' => $this->id_laboratorium,
        ]);

        $query->andFilterWhere(['like', 'methamphetamine', $this->methamphetamine])
            ->andFilterWhere(['like', 'cocain', $this->cocain])
            ->andFilterWhere(['like', 'amphetamine', $this->amphetamine])
            ->andFilterWhere(['like', 'morphine', $this->morphine])
            ->andFilterWhere(['like', 'mariyuana', $this->mariyuana]);

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
