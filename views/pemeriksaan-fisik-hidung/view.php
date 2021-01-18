<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikHidung */

$this->title = "Detail Pemeriksaan Fisik Hidung";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Fisik Hidung', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-fisik-hidung-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Fisik Hidung</h3>
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
                'attribute' => 'bentuk_hidung',
                'format' => 'raw',
                'value' => $model->bentuk_hidung,
            ],
            [
                'attribute' => 'septum_deviasi',
                'format' => 'raw',
                'value' => $model->septum_deviasi,
            ],
            [
                'attribute' => 'conchae',
                'format' => 'raw',
                'value' => $model->conchae,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Pemeriksaan Fisik Hidung', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Pemeriksaan Fisik Hidung', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
