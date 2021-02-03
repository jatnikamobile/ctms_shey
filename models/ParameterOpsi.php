<?php

namespace app\models;

use Yii;

/**
 * @property string $nama
 */
class ParameterOpsi extends \yii\db\ActiveRecord
{
    use ListableTrait;

    public $label;

    public static function tableName()
    {
        return 'parameter_opsi';
    }

    public function rules()
    {
        return [
        ];
    }

    public function getIsDefault()
    {
        return $this->param->default == $this->id;
    }

    public function getParam()
    {
        return $this->hasOne(Parameter::class, ['id'=>'id_param']);
    }
}
