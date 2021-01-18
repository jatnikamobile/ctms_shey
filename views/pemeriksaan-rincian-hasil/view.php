<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanRincianHasil */

$this->title = "Detail Pemeriksaan Rincian Hasil";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Rincian Hasil', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-rincian-hasil-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Rincian Hasil</h3>
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
                'attribute' => 'id_registrasi',
                'format' => 'raw',
                'value' => $model->id_registrasi,
            ],
            [
                'attribute' => 'id_pemeriksaan_rincian',
                'format' => 'raw',
                'value' => $model->id_pemeriksaan_rincian,
            ],
            [
                'attribute' => 'jawaban',
                'format' => 'raw',
                'value' => $model->jawaban,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Pemeriksaan Rincian Hasil', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Pemeriksaan Rincian Hasil', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
