<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "laboratorium_urinalisa".
 *
 * @property int $id
 * @property int $id_laboratorium
 * @property string $ph
 * @property string $berat_jenis
 * @property string $protein
 * @property string $reduksi
 * @property string $bilirubin
 * @property string $urobilinogen
 * @property string $nitrit
 * @property string $keton
 * @property string $darah
 * @property string $mk_leukosit
 * @property string $mk_eritrosit
 * @property string $mk_silender
 * @property string $mk_epithel
 * @property string $mk_kristal
 * @property string $mk_lainlain
 */
class LaboratoriumUrinalisa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laboratorium_urinalisa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_laboratorium'], 'required'],
            [['id_laboratorium'], 'integer'],
            [['ph', 'berat_jenis', 'protein', 'reduksi', 'bilirubin', 'urobilinogen', 'nitrit', 'keton', 'darah', 'mk_leukosit', 'mk_eritrosit', 'mk_silender', 'mk_epithel', 'mk_kristal', 'mk_lainlain'], 'string', 'max' => 255],
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
            'ph' => 'Ph',
            'berat_jenis' => 'Berat Jenis',
            'protein' => 'Protein',
            'reduksi' => 'Reduksi',
            'bilirubin' => 'Bilirubin',
            'urobilinogen' => 'Urobilinogen',
            'nitrit' => 'Nitrit',
            'keton' => 'Keton',
            'darah' => 'Darah',
            'mk_leukosit' => 'Mk Leukosit',
            'mk_eritrosit' => 'Mk Eritrosit',
            'mk_silender' => 'Mk Silender',
            'mk_epithel' => 'Mk Epithel',
            'mk_kristal' => 'Mk Kristal',
            'mk_lainlain' => 'Mk Lainlain',
        ];
    }
}
