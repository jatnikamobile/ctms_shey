<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikMata */

$this->title = "Detail Pemeriksaan Fisik Mata";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Fisik Mata', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-fisik-mata-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Fisik Mata</h3>
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
                'attribute' => 'kacamata',
                'format' => 'raw',
                'value' => $model->kacamata,
            ],
            [
                'attribute' => 'kelopak_mata',
                'format' => 'raw',
                'value' => $model->kelopak_mata,
            ],
            [
                'attribute' => 'konjungtiva',
                'format' => 'raw',
                'value' => $model->konjungtiva,
            ],
            [
                'attribute' => 'sklera',
                'format' => 'raw',
                'value' => $model->sklera,
            ],
            [
                'attribute' => 'pupil',
                'format' => 'raw',
                'value' => $model->pupil,
            ],
            [
                'attribute' => 'buta_warna',
                'format' => 'raw',
                'value' => $model->buta_warna,
            ],
            [
                'attribute' => 'refraksi',
                'format' => 'raw',
                'value' => $model->refraksi,
            ],
            [
                'attribute' => 'addisi',
                'format' => 'raw',
                'value' => $model->addisi,
            ],
            [
                'attribute' => 'funduskopi',
                'format' => 'raw',
                'value' => $model->funduskopi,
            ],
            [
                'attribute' => 'tekanan_bola',
                'format' => 'raw',
                'value' => $model->tekanan_bola,
            ],
            [
                'attribute' => 'mata_juling',
                'format' => 'raw',
                'value' => $model->mata_juling,
            ],
            [
                'attribute' => 'tonometri',
                'format' => 'raw',
                'value' => $model->tonometri,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Pemeriksaan Fisik Mata', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Pemeriksaan Fisik Mata', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
