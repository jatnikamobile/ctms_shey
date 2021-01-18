<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "radiologi".
 *
 * @property int $id
 * @property int $id_registrasi
 * @property string $hasil_pemeriksaan
 * @property string $cor
 * @property string $pulmo
 * @property string $sinus_diafragma
 * @property string $tulang_jaringan_lunak
 */
class Radiologi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'radiologi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_registrasi'], 'required'],
            [['id_registrasi'], 'integer'],
            [['hasil_pemeriksaan', 'cor', 'pulmo', 'sinus_diafragma', 'tulang_jaringan_lunak'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_registrasi' => 'Registrasi',
            'hasil_pemeriksaan' => 'Hasil Pemeriksaan',
            'cor' => 'Cor',
            'pulmo' => 'Pulmo',
            'sinus_diafragma' => 'Sinus dan Diafragma',
            'tulang_jaringan_lunak' => 'Tulang dan Jaringan Lunak',
        ];
    }

    public function getRegistrasi()
    {
        return $this->hasOne(Registrasi::class,['id'=>'id_registrasi']);
    }
}
