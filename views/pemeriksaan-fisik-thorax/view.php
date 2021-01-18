<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikThorax */

$this->title = "Detail Pemeriksaan Fisik Thorax";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Fisik Thorax', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-fisik-thorax-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Fisik Thorax</h3>
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
                'attribute' => 'dinding',
                'format' => 'raw',
                'value' => $model->dinding,
            ],
            [
                'attribute' => 'paru_paru',
                'format' => 'raw',
                'value' => $model->paru_paru,
            ],
            [
                'attribute' => 'jantung',
                'format' => 'raw',
                'value' => $model->jantung,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Pemeriksaan Fisik Thorax', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Pemeriksaan Fisik Thorax', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
