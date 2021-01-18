<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisik */

$this->title = "Detail Pemeriksaan Fisik";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Fisik', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="pemeriksaan-fisik-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Fisik</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            // [
            //     'attribute' => 'id',
            //     'format' => 'raw',
            //     'value' => $model->id,
            // ],
            // [
            //     'attribute' => 'id_registrasi',
            //     'format' => 'raw',
            //     'value' => $model->id_registrasi,
            // ],
            [
                'attribute' => 'keluhan_utama',
                'format' => 'raw',
                'value' => $model->keluhan_utama,
            ],
            [
                'attribute' => 'riwayat_alergi',
                'format' => 'raw',
                'value' => $model->riwayat_alergi,
            ],
            [
                'attribute' => 'riwayat_kesehatan_dulu',
                'format' => 'raw',
                'value' => $model->riwayat_kesehatan_dulu,
            ],
            [
                'attribute' => 'riwayat_kesehatan_keluarga',
                'format' => 'raw',
                'value' => $model->riwayat_kesehatan_keluarga,
            ],
            [
                'attribute' => 'kebiasaan',
                'format' => 'raw',
                'value' => $model->kebiasaan,
            ],
            [
                'attribute' => 'sistolik',
                'format' => 'raw',
                'value' => $model->sistolik,
            ],
            [
                'attribute' => 'diastolik',
                'format' => 'raw',
                'value' => $model->diastolik,
            ],
            [
                'attribute' => 'tinggi_badan',
                'format' => 'raw',
                'value' => $model->tinggi_badan,
            ],
            [
                'attribute' => 'berat_badan',
                'format' => 'raw',
                'value' => $model->berat_badan,
            ],
            [
                'attribute' => 'nadi',
                'format' => 'raw',
                'value' => $model->nadi,
            ],
            [
                'attribute' => 'pernafasan',
                'format' => 'raw',
                'value' => $model->pernafasan,
            ],
            [
                'attribute' => 'suhu',
                'format' => 'raw',
                'value' => $model->suhu,
            ],
            [
                'attribute' => 'golongan_darah',
                'format' => 'raw',
                'value' => $model->golongan_darah,
            ],
            [
                'attribute' => 'buta_warna',
                'format' => 'raw',
                'value' => $model->buta_warna,
            ],
            [
                'attribute' => 'anamnesa',
                'format' => 'raw',
                'value' => $model->anamnesa,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Pemeriksaan Fisik', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Pemeriksaan Fisik', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
        <?php //  Html::a('<i class="fa fa-mail-reply"></i> Registrasi', ['registrasi/view', 'id' => $model->id_registrasi], ['class' => 'btn btn-danger btn-flat']) ?>
    </div>

    <?= $this->render('_view-tab',['model'=>$model]); ?>
</div>
