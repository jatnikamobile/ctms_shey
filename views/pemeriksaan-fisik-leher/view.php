<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikLeher */

$this->title = "Detail Pemeriksaan Fisik Leher";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Fisik Leher', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-fisik-leher-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Fisik Leher</h3>
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
                'attribute' => 'tiroid',
                'format' => 'raw',
                'value' => $model->tiroid,
            ],
            [
                'attribute' => 'limfonoid',
                'format' => 'raw',
                'value' => $model->limfonoid,
            ],
            [
                'attribute' => 'tenggorokan',
                'format' => 'raw',
                'value' => $model->tenggorokan,
            ],
            [
                'attribute' => 'tonsil',
                'format' => 'raw',
                'value' => $model->tonsil,
            ],
            [
                'attribute' => 'faring',
                'format' => 'raw',
                'value' => $model->faring,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Pemeriksaan Fisik Leher', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Pemeriksaan Fisik Leher', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
