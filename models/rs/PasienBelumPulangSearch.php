<?php

namespace app\models\rs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\db\Expression;
use yii\db\Query;

class PasienBelumPulangSearch extends FPPRI
{
    public $usia;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Diagnosa','usia','KdIcd'], 'safe'],
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
     * @return ActiveQuery
     */

    public function getQuerySearch($params)
    {
        $query = FPPRI::find();

        $this->load($params);

        $query->andFilterWhere(['like', 'Diagnosa', $this->Diagnosa]);
        $query->andFilterWhere(['like', 'KdIcd', $this->KdIcd]);

        if ($this->usia) {
            preg_match('/(\d+)\s*thn|(\d+)\s*bln|(\d+)\s*hari/i', $this->usia, $matches);
            $query->andFilterWhere([
                'umurthn' => $matches[1] ?? null,
                'umurbln' => $matches[2] ?? null,
                'umurhari' => $matches[3] ?? null,
            ]);
        }
        return $query;
    }
    
    public function search($params)
    {
        $query = $this->getQuerySearch($params);
        $query->andWhere(new Expression('Regno not in (select Regno from FPulang)'));

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);        

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        return $dataProvider;
    }

    public function searchModal($params)
    {
        $query = FPPRI::find();

        $this->load($params);      

        $query->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'nama', $this->nama]);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);        

        return $dataProvider;
    }
}
