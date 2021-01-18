<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanAudiometry */

$this->title = "Detail Pemeriksaan Audiometry";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Audiometry', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-audiometry-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Audiometry</h3>
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
            [
                'attribute' => 'id_registrasi',
                'format' => 'raw',
                'value' => $model->id_registrasi,
            ],
            [
                'attribute' => 'l1000',
                'format' => 'raw',
                'value' => $model->l1000,
            ],
            [
                'attribute' => 'l4000',
                'format' => 'raw',
                'value' => $model->l4000,
            ],
            [
                'attribute' => 'r1000',
                'format' => 'raw',
                'value' => $model->r1000,
            ],
            [
                'attribute' => 'r4000',
                'format' => 'raw',
                'value' => $model->r4000,
            ],
            [
                'attribute' => 'selisih',
                'format' => 'raw',
                'value' => $model->selisih,
            ],
            [
                'attribute' => 'nih',
                'format' => 'raw',
                'value' => $model->nih,
            ],
            [
                'attribute' => 'uraian',
                'format' => 'raw',
                'value' => $model->uraian,
            ],
            [
                'attribute' => 'kesimpulan',
                'format' => 'raw',
                'value' => $model->kesimpulan,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Pemeriksaan Audiometry', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Pemeriksaan Audiometry', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
