<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PemeriksaanTreadmill;

/**
 * PemeriksaanTreadmillSearch represents the model behind the search form of `app\models\PemeriksaanTreadmill`.
 */
class PemeriksaanTreadmillSearch extends PemeriksaanTreadmill
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_registrasi', 'td_sistolik_awal', 'td_diastolik_awal', 'td_sistolik_akhir', 'td_diastolik_akhir'], 'integer'],
            [['metode', 'jantung', 'kf_poor', 'kf_fair', 'kf_average', 'kf_good', 'kf_excelent', 'klasifikasi_fungsional_1', 'klasifikasi_fungsional_2', 'klasifikasi_fungsional_3', 'denyut_nadi_awal', 'denyut_nadi_akhir', 'stop_treadmill', 'resume_hasil', 'max', 'submax'], 'safe'],
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
        $query = PemeriksaanTreadmill::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_registrasi' => $this->id_registrasi,
            'td_sistolik_awal' => $this->td_sistolik_awal,
            'td_diastolik_awal' => $this->td_diastolik_awal,
            'td_sistolik_akhir' => $this->td_sistolik_akhir,
            'td_diastolik_akhir' => $this->td_diastolik_akhir,
        ]);

        $query->andFilterWhere(['like', 'metode', $this->metode])
            ->andFilterWhere(['like', 'jantung', $this->jantung])
            ->andFilterWhere(['like', 'kf_poor', $this->kf_poor])
            ->andFilterWhere(['like', 'kf_fair', $this->kf_fair])
            ->andFilterWhere(['like', 'kf_average', $this->kf_average])
            ->andFilterWhere(['like', 'kf_good', $this->kf_good])
            ->andFilterWhere(['like', 'kf_excelent', $this->kf_excelent])
            ->andFilterWhere(['like', 'klasifikasi_fungsional_1', $this->klasifikasi_fungsional_1])
            ->andFilterWhere(['like', 'klasifikasi_fungsional_2', $this->klasifikasi_fungsional_2])
            ->andFilterWhere(['like', 'klasifikasi_fungsional_3', $this->klasifikasi_fungsional_3])
            ->andFilterWhere(['like', 'denyut_nadi_awal', $this->denyut_nadi_awal])
            ->andFilterWhere(['like', 'denyut_nadi_akhir', $this->denyut_nadi_akhir])
            ->andFilterWhere(['like', 'stop_treadmill', $this->stop_treadmill])
            ->andFilterWhere(['like', 'resume_hasil', $this->resume_hasil])
            ->andFilterWhere(['like', 'max', $this->max])
            ->andFilterWhere(['like', 'submax', $this->submax]);

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
