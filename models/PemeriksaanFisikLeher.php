<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pemeriksaan_fisik_leher".
 *
 * @property int $id
 * @property int $id_pemeriksaan_fisik
 * @property string $tiroid
 * @property string $limfonoid
 * @property string $tenggorokan
 * @property string $tonsil
 * @property string $faring
 */
class PemeriksaanFisikLeher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemeriksaan_fisik_leher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pemeriksaan_fisik'], 'required'],
            [['id_pemeriksaan_fisik'], 'integer'],
            [['tiroid', 'limfonoid', 'tenggorokan', 'tonsil', 'faring'], 'string', 'max' => 255],
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
            'tiroid' => 'Tiroid',
            'limfonoid' => 'Limfonoid',
            'tenggorokan' => 'Tenggorokan',
            'tonsil' => 'Tonsil',
            'faring' => 'Faring',
        ];
    }
}
