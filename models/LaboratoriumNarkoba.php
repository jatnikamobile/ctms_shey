<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "laboratorium_narkoba".
 *
 * @property int $id
 * @property int $id_laboratorium
 * @property string $methamphetamine
 * @property string $cocain
 * @property string $amphetamine
 * @property string $morphine
 * @property string $mariyuana
 */
class LaboratoriumNarkoba extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laboratorium_narkoba';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_laboratorium'], 'required'],
            [['id_laboratorium'], 'integer'],
            [['methamphetamine', 'cocain', 'amphetamine', 'morphine', 'mariyuana'], 'string', 'max' => 255],
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
            'methamphetamine' => 'Methamphetamine',
            'cocain' => 'Cocain',
            'amphetamine' => 'Amphetamine',
            'morphine' => 'Morphine',
            'mariyuana' => 'Mariyuana',
        ];
    }
}
