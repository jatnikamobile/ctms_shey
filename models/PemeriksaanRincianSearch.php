<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PemeriksaanRincian;

/**
 * PemeriksaanRincianSearch represents the model behind the search form of `app\models\PemeriksaanRincian`.
 */
class PemeriksaanRincianSearch extends PemeriksaanRincian
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_pemeriksaan', 'id_induk', 'nama', 'rincian_jenis'], 'integer'],
            [['append'], 'safe'],
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
        $query = PemeriksaanRincian::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_pemeriksaan' => $this->id_pemeriksaan,
            'id_induk' => $this->id_induk,
            'nama' => $this->nama,
            'rincian_jenis' => $this->rincian_jenis,
        ]);

        $query->andFilterWhere(['like', 'append', $this->append]);

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
