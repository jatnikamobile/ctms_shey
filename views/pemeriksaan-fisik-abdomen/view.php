<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikAbdomen */

$this->title = "Detail Pemeriksaan Fisik Abdomen";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Fisik Abdomen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-fisik-abdomen-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Fisik Abdomen</h3>
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
                'attribute' => 'hati',
                'format' => 'raw',
                'value' => $model->hati,
            ],
            [
                'attribute' => 'limpa',
                'format' => 'raw',
                'value' => $model->limpa,
            ],
            [
                'attribute' => 'usus',
                'format' => 'raw',
                'value' => $model->usus,
            ],
            [
                'attribute' => 'hernia',
                'format' => 'raw',
                'value' => $model->hernia,
            ],
            [
                'attribute' => 'scrotalis',
                'format' => 'raw',
                'value' => $model->scrotalis,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Pemeriksaan Fisik Abdomen', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Pemeriksaan Fisik Abdomen', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
