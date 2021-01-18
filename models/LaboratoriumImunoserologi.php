<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "laboratorium_imunoserologi".
 *
 * @property int $id
 * @property int $id_laboratorium
 * @property string $hbs_ag
 */
class LaboratoriumImunoserologi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laboratorium_imunoserologi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_laboratorium'], 'required'],
            [['id_laboratorium'], 'integer'],
            [['hbs_ag'], 'string', 'max' => 255],
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
            'hbs_ag' => 'Hbs Ag',
        ];
    }
}
