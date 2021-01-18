<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanRincianPilihan */

$this->title = "Detail Pemeriksaan Rincian Pilihan";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Rincian Pilihan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-rincian-pilihan-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Rincian Pilihan</h3>
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
                'attribute' => 'id_pemeriksaan_rincian',
                'format' => 'raw',
                'value' => $model->id_pemeriksaan_rincian,
            ],
            [
                'attribute' => 'nama',
                'format' => 'raw',
                'value' => $model->nama,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Pemeriksaan Rincian Pilihan', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Pemeriksaan Rincian Pilihan', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
