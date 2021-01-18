<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PemeriksaanAudiometry;

/**
 * PemeriksaanAudiometrySearch represents the model behind the search form of `app\models\PemeriksaanAudiometry`.
 */
class PemeriksaanAudiometrySearch extends PemeriksaanAudiometry
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_registrasi', 'l1000', 'l4000', 'r1000', 'r4000', 'selisih'], 'integer'],
            [['nih', 'uraian', 'kesimpulan'], 'safe'],
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
        $query = PemeriksaanAudiometry::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_registrasi' => $this->id_registrasi,
            'l1000' => $this->l1000,
            'l4000' => $this->l4000,
            'r1000' => $this->r1000,
            'r4000' => $this->r4000,
            'selisih' => $this->selisih,
        ]);

        $query->andFilterWhere(['like', 'nih', $this->nih])
            ->andFilterWhere(['like', 'uraian', $this->uraian])
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
