<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pemeriksaan_rincian_rumus".
 *
 * @property int $id
 * @property int $id_pemeriksaan_rincian
 * @property string $rumus
 */
class PemeriksaanRincianRumus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemeriksaan_rincian_rumus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pemeriksaan_rincian', 'rumus'], 'required'],
            [['id_pemeriksaan_rincian'], 'integer'],
            [['rumus'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pemeriksaan_rincian' => 'Id Pemeriksaan Rincian',
            'rumus' => 'Rumus',
        ];
    }
}
