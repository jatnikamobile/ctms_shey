<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PaketPemeriksaan;

/**
 * PaketPemeriksaanSearch represents the model behind the search form of `app\models\PaketPemeriksaan`.
 */
class PaketPemeriksaanSearch extends PaketPemeriksaan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_paket', 'id_pemeriksaan'], 'integer'],
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
        $query = PaketPemeriksaan::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_paket' => $this->id_paket,
            'id_pemeriksaan' => $this->id_pemeriksaan,
        ]);

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
