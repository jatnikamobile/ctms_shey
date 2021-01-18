<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PemeriksaanUsg;

/**
 * PemeriksaanUsgSearch represents the model behind the search form of `app\models\PemeriksaanUsg`.
 */
class PemeriksaanUsgSearch extends PemeriksaanUsg
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_registrasi'], 'integer'],
            [['hati', 'kgb', 'empedu', 'limpa', 'pankreas', 'ginjal', 'kemih', 'lainlain', 'kesimpulan'], 'safe'],
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
        $query = PemeriksaanUsg::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_registrasi' => $this->id_registrasi,
        ]);

        $query->andFilterWhere(['like', 'hati', $this->hati])
            ->andFilterWhere(['like', 'kgb', $this->kgb])
            ->andFilterWhere(['like', 'empedu', $this->empedu])
            ->andFilterWhere(['like', 'limpa', $this->limpa])
            ->andFilterWhere(['like', 'pankreas', $this->pankreas])
            ->andFilterWhere(['like', 'ginjal', $this->ginjal])
            ->andFilterWhere(['like', 'kemih', $this->kemih])
            ->andFilterWhere(['like', 'lainlain', $this->lainlain])
            ->andFilterWhere(['like', 'kesimpulan', $this->kesimpulan]);

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
