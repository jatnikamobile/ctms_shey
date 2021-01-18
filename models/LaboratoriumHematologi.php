<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "laboratorium_hematologi".
 *
 * @property int $id
 * @property int $id_laboratorium
 * @property string $hemoglobin
 * @property string $lekosit
 * @property string $hematokrit
 * @property string $trombosit
 * @property string $eritrosit
 * @property string $hj_basofil
 * @property string $hj_eosinofil
 * @property string $hj_neutrofil_batang
 * @property string $hj_neutrofil_segment
 * @property string $hj_limfosit
 * @property string $hj_monosit
 * @property string $led
 */
class LaboratoriumHematologi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laboratorium_hematologi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_laboratorium'], 'required'],
            [['id_laboratorium'], 'integer'],
            [['hemoglobin', 'lekosit', 'hematokrit', 'trombosit', 'eritrosit', 'hj_basofil', 'hj_eosinofil', 'hj_neutrofil_batang', 'hj_neutrofil_segment', 'hj_limfosit', 'hj_monosit', 'led'], 'string', 'max' => 255],
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
            'hemoglobin' => 'Hemoglobin',
            'lekosit' => 'Lekosit',
            'hematokrit' => 'Hematokrit',
            'trombosit' => 'Trombosit',
            'eritrosit' => 'Eritrosit',
            'hj_basofil' => 'Basofil',
            'hj_eosinofil' => 'Eosinofil',
            'hj_neutrofil_batang' => 'Neutrofil Batang',
            'hj_neutrofil_segment' => 'Neutrofil Segment',
            'hj_limfosit' => 'Limfosit',
            'hj_monosit' => 'Monosit',
            'led' => 'Led',
        ];
    }
}
