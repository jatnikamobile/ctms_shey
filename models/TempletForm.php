<?php

namespace app\models;

use Yii;
use app\models\ListableTrait;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "paket".
 *
 * @property int $id
 * @property string $nama
 */
class TempletForm extends \yii\db\ActiveRecord
{
    use ListableTrait;

    public $protokol;
    public $id_template;
    private $params;

    public static function tableName()
    {
        return 'form';
    }

    public function rules()
    {
        return [
            [['kode', 'nama'], 'required'],
            // [['id_protokol'], 'integer'],
            // [['id_protokol','nama'], 'safe'],
            [['kode', 'nama'], 'string', 'max' => 255],
        ];
    }

    public function getProtokol()
    {
        return $this->hasOne(ProtokolUji::class, ['id' => 'id_protokol']);
    }

    public function getManyParam()
    {
        return $this->hasMany(Parameter::class, ['id_form' => 'id']);
    }

    public function getListParam($induk = null)
    {
        return array_filter($this->manyParam, function ($param) use ($induk) {
            return $param->id_induk == ($induk ? $induk->id : false);
        });
    }

    public function getStatusLabel()
    {
        $status = [
            ['Draft', 'default'],
            ['Verifikasi', 'warning'],
            ['Aktif', 'success'],
        ][$this->status];

        return "<span class='label label-{$status[1]}'>{$status[0]}</label>";
    }
}
