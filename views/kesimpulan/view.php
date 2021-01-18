<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\DiagnosaKerja;

/* @var $this yii\web\View */
/* @var $model app\models\Kesimpulan */

$this->title = "Detail Kesimpulan";
$this->params['breadcrumbs'][] = ['label' => 'Kesimpulan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kesimpulan-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Kesimpulan</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            // // [
            // //     'attribute' => 'id',
            // //     'format' => 'raw',
            // //     'value' => $model->id,
            // // ],
            // [
            //     'attribute' => 'id_registrasi',
            //     'format' => 'raw',
            //     'value' => $model->id_registrasi,
            // ],
            [
                'attribute' => 'isi_kesimpulan',
                'format' => 'raw',
                'value' => $model->isi_kesimpulan,
            ],
            [
                'attribute' => 'saran',
                'format' => 'raw',
                'value' => $model->saran,
            ],
            [
                'attribute' => 'id_diagnosa_kerja',
                'format' => 'raw',
                'value' => function($data) {
                    return @$data->diagnosa->nama;
                },
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Kesimpulan', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Kesimpulan', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
