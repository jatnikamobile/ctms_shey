<?php

namespace app\models;

use Yii;
use app\models\PemeriksaanRincian;
use yii\helpers\ArrayHelper;

/**
 * @property string $nama
 */
class ParameterOpsi extends \yii\db\ActiveRecord
{
    use ListableTrait;

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
