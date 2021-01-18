<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LaboratoriumUrinalisa;

/**
 * LaboratoriumUrinalisaSearch represents the model behind the search form of `app\models\LaboratoriumUrinalisa`.
 */
class LaboratoriumUrinalisaSearch extends LaboratoriumUrinalisa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_laboratorium'], 'integer'],
            [['ph', 'berat_jenis', 'protein', 'reduksi', 'bilirubin', 'urobilinogen', 'nitrit', 'keton', 'darah', 'mk_leukosit', 'mk_eritrosit', 'mk_silender', 'mk_epithel', 'mk_kristal', 'mk_lainlain'], 'safe'],
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
        $query = LaboratoriumUrinalisa::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_laboratorium' => $this->id_laboratorium,
        ]);

        $query->andFilterWhere(['like', 'ph', $this->ph])
            ->andFilterWhere(['like', 'berat_jenis', $this->berat_jenis])
            ->andFilterWhere(['like', 'protein', $this->protein])
            ->andFilterWhere(['like', 'reduksi', $this->reduksi])
            ->andFilterWhere(['like', 'bilirubin', $this->bilirubin])
            ->andFilterWhere(['like', 'urobilinogen', $this->urobilinogen])
            ->andFilterWhere(['like', 'nitrit', $this->nitrit])
            ->andFilterWhere(['like', 'keton', $this->keton])
            ->andFilterWhere(['like', 'darah', $this->darah])
            ->andFilterWhere(['like', 'mk_leukosit', $this->mk_leukosit])
            ->andFilterWhere(['like', 'mk_eritrosit', $this->mk_eritrosit])
            ->andFilterWhere(['like', 'mk_silender', $this->mk_silender])
            ->andFilterWhere(['like', 'mk_epithel', $this->mk_epithel])
            ->andFilterWhere(['like', 'mk_kristal', $this->mk_kristal])
            ->andFilterWhere(['like', 'mk_lainlain', $this->mk_lainlain]);

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
