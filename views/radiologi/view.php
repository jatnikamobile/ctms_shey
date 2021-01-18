<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Radiologi */

$this->title = "Detail Radiologi";
$this->params['breadcrumbs'][] = ['label' => 'Radiologi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="radiologi-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Radiologi</h3>
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
            // [
            //     'attribute' => 'id_registrasi',
            //     'format' => 'raw',
            //     'value' => $model->id_registrasi,
            // ],
            [
                'attribute' => 'cor',
                'format' => 'raw',
                'value' => $model->cor,
            ],
            [
                'attribute' => 'pulmo',
                'format' => 'raw',
                'value' => $model->pulmo,
            ],
            [
                'attribute' => 'sinus_diafragma',
                'format' => 'raw',
                'value' => $model->sinus_diafragma,
            ],
            [
                'attribute' => 'tulang_jaringan_lunak',
                'format' => 'raw',
                'value' => $model->tulang_jaringan_lunak,
            ],
            [
                'attribute' => 'hasil_pemeriksaan',
                'format' => 'raw',
                'value' => $model->hasil_pemeriksaan,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Radiologi', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Radiologi', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
