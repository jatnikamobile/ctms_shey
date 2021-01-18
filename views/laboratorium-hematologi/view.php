<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LaboratoriumHematologi */

$this->title = "Detail Laboratorium Hematologi";
$this->params['breadcrumbs'][] = ['label' => 'Laboratorium Hematologi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laboratorium-hematologi-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Laboratorium Hematologi</h3>
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
                'attribute' => 'id_laboratorium',
                'format' => 'raw',
                'value' => $model->id_laboratorium,
            ],
            [
                'attribute' => 'hemoglobin',
                'format' => 'raw',
                'value' => $model->hemoglobin,
            ],
            [
                'attribute' => 'lekosit',
                'format' => 'raw',
                'value' => $model->lekosit,
            ],
            [
                'attribute' => 'hematokrit',
                'format' => 'raw',
                'value' => $model->hematokrit,
            ],
            [
                'attribute' => 'trombosit',
                'format' => 'raw',
                'value' => $model->trombosit,
            ],
            [
                'attribute' => 'eritrosit',
                'format' => 'raw',
                'value' => $model->eritrosit,
            ],
            [
                'attribute' => 'hj_basofil',
                'format' => 'raw',
                'value' => $model->hj_basofil,
            ],
            [
                'attribute' => 'hj_eosinofil',
                'format' => 'raw',
                'value' => $model->hj_eosinofil,
            ],
            [
                'attribute' => 'hj_neutrofil_batang',
                'format' => 'raw',
                'value' => $model->hj_neutrofil_batang,
            ],
            [
                'attribute' => 'hj_neutrofil_segment',
                'format' => 'raw',
                'value' => $model->hj_neutrofil_segment,
            ],
            [
                'attribute' => 'hj_limfosit',
                'format' => 'raw',
                'value' => $model->hj_limfosit,
            ],
            [
                'attribute' => 'hj_monosit',
                'format' => 'raw',
                'value' => $model->hj_monosit,
            ],
            [
                'attribute' => 'led',
                'format' => 'raw',
                'value' => $model->led,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Laboratorium Hematologi', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Laboratorium Hematologi', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
