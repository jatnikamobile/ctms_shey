<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PemeriksaanFisikAbdomen;

/**
 * PemeriksaanFisikAbdomenSearch represents the model behind the search form of `app\models\PemeriksaanFisikAbdomen`.
 */
class PemeriksaanFisikAbdomenSearch extends PemeriksaanFisikAbdomen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_pemeriksaan_fisik'], 'integer'],
            [['dinding', 'hati', 'limpa', 'usus', 'hernia', 'scrotalis'], 'safe'],
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
        $query = PemeriksaanFisikAbdomen::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_pemeriksaan_fisik' => $this->id_pemeriksaan_fisik,
        ]);

        $query->andFilterWhere(['like', 'dinding', $this->dinding])
            ->andFilterWhere(['like', 'hati', $this->hati])
            ->andFilterWhere(['like', 'limpa', $this->limpa])
            ->andFilterWhere(['like', 'usus', $this->usus])
            ->andFilterWhere(['like', 'hernia', $this->hernia])
            ->andFilterWhere(['like', 'scrotalis', $this->scrotalis]);

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
