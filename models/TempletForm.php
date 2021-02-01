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
 * @property Parameter[] $manyParam
 */
class TempletForm extends \yii\db\ActiveRecord
{
    use ListableTrait;

    public $rowMeta;
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
            [['kode'], 'required'],
            [['id_protokol'], 'integer'],
            [['id_protokol', 'nama'], 'safe'],
            [['kode', 'nama'], 'string', 'max' => 255],
        ];
    }

    public function getProtokol()
    {
        return $this->hasOne(ProtokolUji::class, ['id' => 'id_protokol']);
    }

    public function getManyParam()
    {
        return $this->hasMany(Parameter::class, ['id_form' => 'id'])->orderBy('urutan');
    }

    /** @return Parameter[] */
    public function getListParam($id_induk = 0)
    {
        $array = [];
        foreach ($this->manyParam as $i => $param) {
            if ($param->id_induk === $id_induk) {
                $array[] = $param;
            }
        }
        return $array;
        return array_filter($this->manyParam, function ($param) use ($induk) {
            return $param->id_induk == ($induk ? $induk->id : false);
        });
    }

    public function copy()
    {
        $newModel = clone $this;
        $newModel->setOldAttributes(null);
        $newModel->id = null;
        $newModel->nama = 'Copy of ' . $this->nama;
        $newModel->status = 0;

        $transaction = static::getDb()->beginTransaction();
        try {
            $result = $newModel->insertInternal();
            if ($result === false) {
                $transaction->rollBack();
                return false;
            }
            $newModel->copyParams($this);
            $transaction->commit();
            return $newModel;
        } catch (\Throwable $e) {
            $transaction->rollBack();
            Yii::error($e, __METHOD__);
            return false;
        }
    }

    protected function copyParams(TempletForm $srcModel)
    {
        $this->copyParamsInternal($srcModel, $srcModel->getListParam());
    }

    protected function copyParamsInternal(TempletForm $srcModel, $srcParams, $id_induk = 0)
    {
        if (empty($srcParams)) {
            return;
        }
        /** @var Parameter $param */
        foreach ($srcParams as $param) {
            $dataToInsert[] = [
                $this->id,
                $id_induk,
                $param->nama,
                $param->id_tipe,
                $param->urutan,
                $param->level,
                $param->default,
            ];
        }
        static::getDb()->createCommand()->batchInsert(Parameter::tableName(), ['id_form', 'id_induk', 'nama', 'id_tipe', 'urutan', 'level', 'default'], $dataToInsert)->execute();
        $newParams = Parameter::find()->where(['id_form' => $this->id, 'id_induk' => $id_induk])->orderBy('urutan')->select('id')->asArray()->all();

        Yii::debug([
            // 'srcP' => array_map(function($i) {return $i->attributes;},$srcParams),
            'srcP' => ArrayHelper::toArray($srcParams),
            'newP' => $newParams,
        ],__METHOD__);
        /** @var Parameter $param */
        foreach ($srcParams as $i => $param) {
            Yii::debug($param->nama,__METHOD__);
            if ($param->isLabel) {
                $this->copyParamsInternal($srcModel, $srcModel->getListParam($param->id), $newParams[$i]['id']);
            } elseif ($param->isPilihan) {
                $this->copyOptions($param->id, $newParams[$i]['id']);
            }
        }
    }

    protected function copyOptions($srcParamId, $newParamId)
    {
        $opsis = static::getDb()->createCommand("select * from parameter_opsi where id_param=$srcParamId order by urutan")->queryAll();
        foreach ($opsis as $opsi) {
            $dataToInsert[] = [
                $newParamId,
                $opsi['id_label'],
                $opsi['urutan'],
            ];
        }
        !empty($dataToInsert) && static::getDb()->createCommand()->batchInsert('parameter_opsi', ['id_param', 'id_label', 'urutan'], $dataToInsert)->execute();
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

    public function beforeSave($insert)
    {
        $this->nama = Protokol::find()->select('nama');
        return parent::beforeSave($insert);
    }
}
