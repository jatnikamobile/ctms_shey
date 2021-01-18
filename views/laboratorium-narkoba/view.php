<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LaboratoriumNarkoba */

$this->title = "Detail Laboratorium Narkoba";
$this->params['breadcrumbs'][] = ['label' => 'Laboratorium Narkoba', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laboratorium-narkoba-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Laboratorium Narkoba</h3>
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
                'attribute' => 'methamphetamine',
                'format' => 'raw',
                'value' => $model->methamphetamine,
            ],
            [
                'attribute' => 'cocain',
                'format' => 'raw',
                'value' => $model->cocain,
            ],
            [
                'attribute' => 'amphetamine',
                'format' => 'raw',
                'value' => $model->amphetamine,
            ],
            [
                'attribute' => 'morphine',
                'format' => 'raw',
                'value' => $model->morphine,
            ],
            [
                'attribute' => 'mariyuana',
                'format' => 'raw',
                'value' => $model->mariyuana,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Laboratorium Narkoba', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Laboratorium Narkoba', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
