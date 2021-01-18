<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paket_tindakan".
 *
 * @property int $id
 * @property int $id_paket
 * @property int $id_tindakan
 */
class PaketTindakan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paket_tindakan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_paket', 'id_tindakan'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_paket' => 'Paket',
            'id_tindakan' => 'Tindakan',
        ];
    }

    public function getTindakan()
    {
        return $this->hasOne(Tindakan::class,['id'=>'id_tindakan']);
    }
}
