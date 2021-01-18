<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikMulut */

$this->title = "Detail Pemeriksaan Fisik Mulut";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Fisik Mulut', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-fisik-mulut-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Fisik Mulut</h3>
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
                'attribute' => 'mucosa_mulut',
                'format' => 'raw',
                'value' => $model->mucosa_mulut,
            ],
            [
                'attribute' => 'kelainan_gigi',
                'format' => 'raw',
                'value' => $model->kelainan_gigi,
            ],
            [
                'attribute' => 'lidah',
                'format' => 'raw',
                'value' => $model->lidah,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Pemeriksaan Fisik Mulut', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Pemeriksaan Fisik Mulut', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
