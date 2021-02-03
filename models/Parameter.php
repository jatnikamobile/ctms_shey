<?php

namespace app\models;

use Yii;
use yii\db\Expression;
use yii\db\Query;

/**
 * @property int $id
 * @property int $id_form
 * @property int $id_induk
 * @property string $nama
 * @property int $id_tipe
 * @property int $urutan
 * @property string $default
 * @property bool $isPilihan
 * @property bool $isUraian
 * @property ParameterOpsi[] $manyOpsi
 */
class Parameter extends \yii\db\ActiveRecord
{
    use ListableTrait;

    public $options = [];
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

    public function getManyOpsi($asArray=0)
    {
        return $this->hasMany(ParameterOpsi::class, ['id_param' => 'id'])->alias('o')->leftJoin('parameter_opsi_label l', 'l.id=id_label')->select('o.id id,id_label,label')->orderBy('urutan')->asArray($asArray);
    }

    public function afterValidate()
    {
        if ($this->datetime) {
            $this->default = $this->datetime;
        }
        parent::afterValidate();
    }

    public function afterSave($insert, $changedAttributes)
    {
        if ($this->isPilihan && is_array($this->options)) {
            $default = null;
            Yii::$app->db->createCommand()->delete('parameter_opsi', ['id_param' => $this->id])->execute();
            $labels = (new Query)->select(new Expression('id, lcase(label)label'))->from('parameter_opsi_label')->where(['label' => $this->options])->indexBy('label')->all();

            $urutan = 0;
            foreach ($this->options as $i => $label) {
                $urutan++;
                $lclabel = strtolower($label);
                if (empty($labels[$lclabel]['id'])) {
                    $newLabelsInsert[] = [$label];
                    $newLabels[] = $label;
                    continue;
                }
                if ($i == $this->default) {
                    $default = $labels[$lclabel]['id'];
                }
                $newOpsis[] = [
                    $this->id,
                    $labels[$lclabel]['id'],
                    $urutan,
                ];
            }

            if (!empty($newLabelsInsert)) {
                try {
                    Yii::$app->db->createCommand()->batchInsert('parameter_opsi_label', ['label'], $newLabelsInsert)->execute();
                } catch (\Exception $e) {
                }

                $labels = (new Query)->select(new Expression('id, lcase(label)label'))->from('parameter_opsi_label')->where(['label' => $newLabels])->indexBy('label')->all();
                $urutan = 0;

                foreach ($this->options as $i => $lclabel) {
                    $urutan++;
                    $lclabel = strtolower($lclabel);
                    if (empty($labels[$lclabel]['id'])) {
                        continue;
                    }
                    if ($i == $this->default) {
                        $default = $labels[$lclabel]['id'];
                    }
                    $newOpsis[] = [
                        $this->id,
                        $labels[$lclabel]['id'],
                        $urutan,
                    ];
                }
            }

            if (!empty($newOpsis)) {
                Yii::$app->db->createCommand()->batchInsert(ParameterOpsi::tableName(), ['id_param', 'id_label', 'urutan'], $newOpsis)->execute();
                $this->updateAttributes(['default' => ParameterOpsi::find()->where(['id_param' => $this->id, 'id_label' => $default])->select('id')]);
            }
        }
        parent::afterSave($insert, $changedAttributes);
    }
}
