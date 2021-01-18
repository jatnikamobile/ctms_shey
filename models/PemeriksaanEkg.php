<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pemeriksaan_ekg".
 *
 * @property int $id
 * @property int $id_registrasi
 * @property string $hasil
 * @property string $kesan
 */
class PemeriksaanEkg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemeriksaan_ekg';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_registrasi'], 'required'],
            [['id_registrasi'], 'integer'],
            [['hasil', 'kesan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_registrasi' => 'Id Registrasi',
            'hasil' => 'Hasil',
            'kesan' => 'Kesan',
        ];
    }

    public function getRegistrasi()
    {
        return $this->hasOne(Registrasi::class,['id'=>'id_registrasi']);
    }
}
