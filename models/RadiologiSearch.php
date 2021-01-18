<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Radiologi;

/**
 * RadiologiSearch represents the model behind the search form of `app\models\Radiologi`.
 */
class RadiologiSearch extends Radiologi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_registrasi'], 'integer'],
            [['hasil_pemeriksaan', 'cor', 'pulmo', 'sinus_diafragma', 'tulang_jaringan_lunak'], 'safe'],
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
        $query = Radiologi::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_registrasi' => $this->id_registrasi,
        ]);

        $query->andFilterWhere(['like', 'hasil_pemeriksaan', $this->hasil_pemeriksaan])
            ->andFilterWhere(['like', 'cor', $this->cor])
            ->andFilterWhere(['like', 'pulmo', $this->pulmo])
            ->andFilterWhere(['like', 'sinus_diafragma', $this->sinus_diafragma])
            ->andFilterWhere(['like', 'tulang_jaringan_lunak', $this->tulang_jaringan_lunak]);

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
