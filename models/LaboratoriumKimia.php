<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "laboratorium_kimia".
 *
 * @property int $id
 * @property int $id_laboratorium
 * @property string $faal_hati_sgot
 * @property string $faal_hati_sgpt
 * @property string $lemak_kolesterol_total
 * @property string $lemak_trigliserida
 * @property string $lemak_kolesterol_hdl
 * @property string $lemak_kolesterol_ldl
 * @property string $diabetes_glukosa_puasa
 * @property string $diabetes_glukosa_2_jam
 * @property string $diabetes_gamma_gt
 */
class LaboratoriumKimia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laboratorium_kimia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_laboratorium'], 'required'],
            [['id_laboratorium'], 'integer'],
            [['faal_hati_sgot', 'faal_hati_sgpt', 'lemak_kolesterol_total', 'lemak_trigliserida', 'lemak_kolesterol_hdl', 'lemak_kolesterol_ldl', 'diabetes_glukosa_puasa', 'diabetes_glukosa_2_jam', 'diabetes_gamma_gt'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_laboratorium' => 'Id Laboratorium',
            'faal_hati_sgot' => 'Faal Hati Sgot',
            'faal_hati_sgpt' => 'Faal Hati Sgpt',
            'lemak_kolesterol_total' => 'Lemak Kolesterol Total',
            'lemak_trigliserida' => 'Lemak Trigliserida',
            'lemak_kolesterol_hdl' => 'Lemak Kolesterol Hdl',
            'lemak_kolesterol_ldl' => 'Lemak Kolesterol Ldl',
            'diabetes_glukosa_puasa' => 'Diabetes Glukosa Puasa',
            'diabetes_glukosa_2_jam' => 'Diabetes Glukosa 2 Jam',
            'diabetes_gamma_gt' => 'Diabetes Gamma Gt',
        ];
    }
}
