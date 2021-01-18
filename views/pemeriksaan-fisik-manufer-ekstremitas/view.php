<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikManuferEkstremitas */

$this->title = "Detail Pemeriksaan Fisik Manufer Ekstremitas";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Fisik Manufer Ekstremitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-fisik-manufer-ekstremitas-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Fisik Manufer Ekstremitas</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            [
                'attribute' => 'id',
                'format' => 'raw',
                'value' => $model->id,
            ],
            [
                'attribute' => 'id_pemeriksaan_fisik',
                'format' => 'raw',
                'value' => $model->id_pemeriksaan_fisik,
            ],
            [
                'attribute' => 'kekuatan',
                'format' => 'raw',
                'value' => $model->kekuatan,
            ],
            [
                'attribute' => 'varises',
                'format' => 'raw',
                'value' => $model->varises,
            ],
            [
                'attribute' => 'reflek_fisiologis',
                'format' => 'raw',
                'value' => $model->reflek_fisiologis,
            ],
            [
                'attribute' => 'reflek_patologis',
                'format' => 'raw',
                'value' => $model->reflek_patologis,
            ],
            [
                'attribute' => 'lainlain',
                'format' => 'raw',
                'value' => $model->lainlain,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Pemeriksaan Fisik Manufer Ekstremitas', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Pemeriksaan Fisik Manufer Ekstremitas', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
