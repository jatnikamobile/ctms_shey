<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "laboratorium".
 *
 * @property int $id
 * @property int $id_registrasi
 * @property string $hasil_pemeriksaan
 */
class Laboratorium extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laboratorium';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_registrasi'], 'required'],
            [['id_registrasi'], 'integer'],
            [['hasil_pemeriksaan'], 'string', 'max' => 255],
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
        ];
    }

    public function getRegistrasi()
    {
        return $this->hasOne(Registrasi::class,['id'=>'id_registrasi']);
    }

    public function getLaboratoriumHematologi()
    {
        return $this->hasOne(LaboratoriumHematologi::class,['id_laboratorium' => 'id']);
    }

    public function findOrCreateLaboratoriumHematologi()
    {
        if ($this->laboratoriumHematologi === null) {
            $new = new LaboratoriumHematologi(['id_laboratorium' => $this->id]);
            $new->save();
            return $new;
        }

        return $this->laboratoriumHematologi;
    }

    public function getLaboratoriumKimia()
    {
        return $this->hasOne(LaboratoriumKimia::class,['id_laboratorium' => 'id']);
    }

    public function findOrCreateLaboratoriumKimia()
    {
        if ($this->laboratoriumKimia === null) {
            $new = new LaboratoriumKimia(['id_laboratorium' => $this->id]);
            $new->save();
            return $new;
        }

        return $this->laboratoriumKimia;
    }

    public function getLaboratoriumUrinalisa()
    {
        return $this->hasOne(LaboratoriumUrinalisa::class,['id_laboratorium' => 'id']);
    }

    public function findOrCreateLaboratoriumUrinalisa()
    {
        if ($this->laboratoriumUrinalisa === null) {
            $new = new LaboratoriumUrinalisa(['id_laboratorium' => $this->id]);
            $new->save();
            return $new;
        }

        return $this->laboratoriumUrinalisa;
    }

    public function getLaboratoriumNarkoba()
    {
        return $this->hasOne(LaboratoriumNarkoba::class,['id_laboratorium' => 'id']);
    }

    public function findOrCreateLaboratoriumNarkoba()
    {
        if ($this->laboratoriumNarkoba === null) {
            $new = new LaboratoriumNarkoba(['id_laboratorium' => $this->id]);
            $new->save();
            return $new;
        }

        return $this->laboratoriumNarkoba;
    }

    public function getLaboratoriumImunoserologi()
    {
        return $this->hasOne(LaboratoriumImunoserologi::class,['id_laboratorium' => 'id']);
    }

    public function findOrCreateLaboratoriumImunoserologi()
    {
        if ($this->laboratoriumImunoserologi === null) {
            $new = new LaboratoriumImunoserologi(['id_laboratorium' => $this->id]);
            $new->save();
            return $new;
        }

        return $this->laboratoriumImunoserologi;
    }
}
