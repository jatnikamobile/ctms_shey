<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pasien;

/**
 * PasienSearch represents the model behind the search form of `app\models\Pasien`.
 */
class ProtokolUjiSearch extends ProtokolUji
{
    public $tanggal_awal;
    public $tanggal_akhir;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phase','id_instansi'], 'integer'],
            [['nama','tanggal_awal','tanggal_akhir'], 'safe'],
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
        $query = ProtokolUji::find()->alias('pu');

        $query->leftJoin(Instansi::tableName().' i', 'i.id=id_instansi');
        $query->select('pu.*, i.nama _instansi');

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_instansi' => $this->id_instansi,
        ]);

        $query->andFilterWhere(['like', 'pu.nama', $this->nama]);

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

    public function searchModal($params)
    {
        $query = Pasien::find();

        $this->load($params);      

        $query->andFilterWhere(['like', 'nama', $this->nama]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);        

        if (!$this->validate()) {
            return $dataProvider;
        }

        return $dataProvider;
    }
}
