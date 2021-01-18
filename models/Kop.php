<?php

namespace app\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "kop".
 *
 * @property int $id
 * @property string $nama
 * @property string $alamat
 * @property string $telp
 * @property string $email
 * @property string $website
 * @property string $photo
 */
class Kop extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'alamat', 'telp', 'email', 'website', 'photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'telp' => 'Telp',
            'email' => 'Email',
            'website' => 'Website',
            'photo' => 'Photo',
        ];
    }

    public function getImageKecil()
    {
        if ($this->photo != '') {
            return Html::img('@web/images/' . $this->photo, [
                'class' => 'img-responsive', 
                'style' => 'height:100px'
            ]);
        } 
        
        return Html::img('@web/upload/no-images.png', [
            'class' => 'img-responsive', 
            'style' => 'height:100px'
        ]);
        
    }
}
