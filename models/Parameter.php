<?php

namespace app\models;

use Yii;

/**
 * @property int $id
 * @property int $id_form
 * @property int $id_induk
 * @property string $nama
 * @property int $id_tipe
 * @property int $urutan
 * @property int $level
 * @property string $default
 * @property bool $isPilihan
 * @property bool $isUraian
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
            [['nama', 'id_induk', 'id_form', 'id_tipe'], 'required'],
            [['datetime', 'default', 'options'], 'safe'],
            [['nama'], 'string', 'max' => 255],
            [['id_induk'], 'integer'],
        ];
    }

    public function getForm()
    {
        return $this->hasOne(TempletForm::class, ['id' => 'id_form']);
    }

    public function getTipe()
    {
        return $this->hasOne(ParameterTipe::class, ['id' => 'id_tipe']);
    }

    public function getIsLabel()
    {
        return $this->id_tipe === 1;
    }

    public function getIsPilihan()
    {
        return in_array($this->id_tipe, [4, 5]);
    }

    public function getIsUraian()
    {
        return $this->id_tipe === 2;
    }

    public function getInduk($select = '*')
    {
        if ($this->_induk) return $this->_induk;
        return $this->hasOne(self::class, ['id' => 'id_induk'])->select($select);
    }

    public function getManySub()
    {
        return $this->hasMany(static::class, ['id_induk' => 'id']);
    }

    public function getManyOpsi()
    {
        return $this->hasMany(ParameterOpsi::class, ['id_param' => 'id'])->leftJoin('parameter_opsi_label l', 'l.id=id_label');
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
            Yii::$app->db->createCommand()->batchInsert(ParameterOpsi::tableName(), ['id_param', 'label'], $data)->execute();
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
