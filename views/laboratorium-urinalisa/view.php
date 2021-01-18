<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LaboratoriumUrinalisa */

$this->title = "Detail Laboratorium Urinalisa";
$this->params['breadcrumbs'][] = ['label' => 'Laboratorium Urinalisa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laboratorium-urinalisa-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Laboratorium Urinalisa</h3>
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
                'attribute' => 'ph',
                'format' => 'raw',
                'value' => $model->ph,
            ],
            [
                'attribute' => 'berat_jenis',
                'format' => 'raw',
                'value' => $model->berat_jenis,
            ],
            [
                'attribute' => 'protein',
                'format' => 'raw',
                'value' => $model->protein,
            ],
            [
                'attribute' => 'reduksi',
                'format' => 'raw',
                'value' => $model->reduksi,
            ],
            [
                'attribute' => 'bilirubin',
                'format' => 'raw',
                'value' => $model->bilirubin,
            ],
            [
                'attribute' => 'urobilinogen',
                'format' => 'raw',
                'value' => $model->urobilinogen,
            ],
            [
                'attribute' => 'nitrit',
                'format' => 'raw',
                'value' => $model->nitrit,
            ],
            [
                'attribute' => 'keton',
                'format' => 'raw',
                'value' => $model->keton,
            ],
            [
                'attribute' => 'darah',
                'format' => 'raw',
                'value' => $model->darah,
            ],
            [
                'attribute' => 'mk_leukosit',
                'format' => 'raw',
                'value' => $model->mk_leukosit,
            ],
            [
                'attribute' => 'mk_eritrosit',
                'format' => 'raw',
                'value' => $model->mk_eritrosit,
            ],
            [
                'attribute' => 'mk_silender',
                'format' => 'raw',
                'value' => $model->mk_silender,
            ],
            [
                'attribute' => 'mk_epithel',
                'format' => 'raw',
                'value' => $model->mk_epithel,
            ],
            [
                'attribute' => 'mk_kristal',
                'format' => 'raw',
                'value' => $model->mk_kristal,
            ],
            [
                'attribute' => 'mk_lainlain',
                'format' => 'raw',
                'value' => $model->mk_lainlain,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Laboratorium Urinalisa', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Laboratorium Urinalisa', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
