<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pemeriksaan_fisik_mata".
 *
 * @property int $id
 * @property int $id_pemeriksaan_fisik
 * @property string $kacamata
 * @property string $kelopak_mata
 * @property string $konjungtiva
 * @property string $sklera
 * @property string $pupil
 * @property string $buta_warna
 * @property string $refraksi
 * @property string $addisi
 * @property string $funduskopi
 * @property string $tekanan_bola
 * @property string $mata_juling
 * @property string $tonometri
 */
class PemeriksaanFisikMata extends \yii\db\ActiveRecord
{   
    use ListableTrait;

    const PAKAI = 1;
    const TIDAK_PAKAI = 2;
    const KELOPAK1 = 3;
    const KELOPAK2 = 4;
    const KELOPAK3 = 5;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemeriksaan_fisik_mata';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pemeriksaan_fisik'], 'required'],
            [['id_pemeriksaan_fisik'], 'integer'],
            [['kacamata', 'kelopak_mata', 'konjungtiva', 'sklera', 'pupil', 'buta_warna', 'refraksi', 'addisi', 'funduskopi', 'tekanan_bola', 'mata_juling', 'tonometri'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pemeriksaan_fisik' => 'Id Pemeriksaan Fisik',
            'kacamata' => 'Kacamata',
            'kelopak_mata' => 'Kelopak Mata',
            'konjungtiva' => 'Konjungtiva',
            'sklera' => 'Sklera',
            'pupil' => 'Pupil',
            'buta_warna' => 'Buta Warna',
            'refraksi' => 'Refraksi',
            'addisi' => 'Addisi',
            'funduskopi' => 'Funduskopi',
            'tekanan_bola' => 'Tekanan Bola',
            'mata_juling' => 'Mata Juling',
            'tonometri' => 'Tonometri',
        ];
    }

    public function getManyKategori()
    {
        return $this->hasMany(Buku::class, ['id_kategori' => 'id']);
    }

    public static function getKacamata()
    {
        $data = [];
        foreach (static::find()->all() as $mata) {
            $data[] = [$mata->kacamata];
        }
        return $data;
    }

    public static function getGrafikKacamata()
    {
        $data = [];

        foreach (self::getListPakai() as $key) {

            @$count = self::getCountKacamata($key);

            $data[] = [($count)];
        }

        return $data;
    }

    public static function getCountKacamata($data=null)
    {
        $model = static::find()
            ->andFilterWhere(['kacamata' => $data])
            ->all();

        return count($model);
    }

    public static function getGrafikKelopakMata()
    {
        $data = [];

        foreach (self::getListKelopakMata() as $key) {

            @$count = self::getCountKelopakMata($key);

            $data[] = [($count)];
        }

        return $data;
    }

    public static function getCountKelopakMata($data=null)
    {
        $model = static::find()
            ->andFilterWhere(['kelopak_mata' => $data])
            ->all();

        return count($model);
    }
}
