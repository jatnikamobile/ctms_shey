<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kesimpulan;

/**
 * KesimpulanSearch represents the model behind the search form of `app\models\Kesimpulan`.
 */
class KesimpulanSearch extends Kesimpulan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_registrasi', 'id_diagnosa_kerja'], 'integer'],
            [['isi_kesimpulan', 'saran'], 'safe'],
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
        $query = Kesimpulan::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_registrasi' => $this->id_registrasi,
            'id_diagnosa_kerja' => $this->id_diagnosa_kerja,
        ]);

        $query->andFilterWhere(['like', 'isi_kesimpulan', $this->isi_kesimpulan])
            ->andFilterWhere(['like', 'saran', $this->saran]);

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
