<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PemeriksaanRincianHasil;

/**
 * PemeriksaanRincianHasilSearch represents the model behind the search form of `app\models\PemeriksaanRincianHasil`.
 */
class PemeriksaanRincianHasilSearch extends PemeriksaanRincianHasil
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_registrasi', 'id_pemeriksaan_rincian'], 'integer'],
            [['jawaban'], 'safe'],
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
        $query = PemeriksaanRincianHasil::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_registrasi' => $this->id_registrasi,
            'id_pemeriksaan_rincian' => $this->id_pemeriksaan_rincian,
        ]);

        $query->andFilterWhere(['like', 'jawaban', $this->jawaban]);

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
