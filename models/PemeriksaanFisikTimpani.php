<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pemeriksaan_fisik_timpani".
 *
 * @property int $id
 * @property int $id_pemeriksaan_fisik
 * @property string $serumen
 * @property string $lainlain
 */
class PemeriksaanFisikTimpani extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemeriksaan_fisik_timpani';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pemeriksaan_fisik'], 'required'],
            [['id_pemeriksaan_fisik'], 'integer'],
            [['serumen', 'lainlain'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pemeriksaan_fisik' => 'Id Pemeriksaan Fisik',
            'serumen' => 'Serumen',
            'lainlain' => 'Lain - Lain',
        ];
    }
}
