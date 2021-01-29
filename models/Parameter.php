<?php

namespace app\models;

use Yii;

/**
 * @property int $id
 * @property int $id_induk
 * @property string $nama
 */
class Parameter extends \yii\db\ActiveRecord
{
    use ListableTrait;

    public $options;
    public $datetime;
    public $_induk;

    public static function tableName()
    {
        return 'parameter';
    }

    public function rules()
    {
        return [
            [['nama','id_induk','id_form','id_tipe'], 'required'],
            [['datetime','default','options'], 'safe'],
            [['nama'], 'string', 'max' => 255],
            [['id_induk'], 'integer'],
        ];
    }

    public function getForm()
    {
        return $this->hasOne(TempletForm::class, ['id'=>'id_form']);
    }

    public function getTipe()
    {
        return $this->hasOne(ParameterTipe::class, ['id'=>'id_tipe']);
    }

    public function getIsPilihan()
    {
        return $this->tipe->id === 4 || $this->tipe->id === 5;
    }

    public function getIsUraian()
    {
        return $this->tipe->id === 2;
    }

    public function getInduk($select = '*')
    {
        if ($this->_induk) return $this->_induk;
        return $this->hasOne(self::class, ['id'=>'id_induk'])->select($select);
    }

    public function getManySub()
    {
        return $this->hasMany(static::class, ['id_induk'=>'id']);
    }

    public function getManyOpsi()
    {
        return $this->hasMany(ParameterOpsi::class, ['id_param'=>'id']);
    }

    public function afterValidate()
    {
        if ($this->datetime) {
            $this->default = $this->datetime;
        }
    }

    public function afterSave($insert, $changedAttributes)
    {
        if ($insert && $this->options) {
            $data = [];
            foreach ($this->options as $i => $value) {
                $data[] = [$this->id, $value];
            }
            Yii::$app->db->createCommand()->batchInsert(ParameterOpsi::tableName(), ['id_param','label'], $data)->execute();
        // } else {
        //     $oldOptions = $this->manyOpsi;
        //     ParameterOpsi::find()->andWhere(['id' => array_keys($this->options)])->indexBy('id')->all()
        // }
        // $options = 
        // foreach ($options as $i => $opt) {
        //     if ()
        }
    }
}
