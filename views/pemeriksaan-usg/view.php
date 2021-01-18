<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanUsg */

$this->title = "Detail Pemeriksaan Usg";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Usg', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-usg-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Usg</h3>
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
                'attribute' => 'hati',
                'format' => 'raw',
                'value' => $model->hati,
            ],
            [
                'attribute' => 'kgb',
                'format' => 'raw',
                'value' => $model->kgb,
            ],
            [
                'attribute' => 'empedu',
                'format' => 'raw',
                'value' => $model->empedu,
            ],
            [
                'attribute' => 'limpa',
                'format' => 'raw',
                'value' => $model->limpa,
            ],
            [
                'attribute' => 'pankreas',
                'format' => 'raw',
                'value' => $model->pankreas,
            ],
            [
                'attribute' => 'ginjal',
                'format' => 'raw',
                'value' => $model->ginjal,
            ],
            [
                'attribute' => 'kemih',
                'format' => 'raw',
                'value' => $model->kemih,
            ],
            [
                'attribute' => 'lainlain',
                'format' => 'raw',
                'value' => $model->lainlain,
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
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Pemeriksaan Usg', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Pemeriksaan Usg', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
