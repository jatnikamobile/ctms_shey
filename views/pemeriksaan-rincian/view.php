<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanRincian */

$this->title = "Detail Pemeriksaan Rincian";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Rincian', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-rincian-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Rincian</h3>
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
                'attribute' => 'id_pemeriksaan',
                'format' => 'raw',
                'value' => $model->id_pemeriksaan,
            ],
            [
                'attribute' => 'id_induk',
                'format' => 'raw',
                'value' => $model->id_induk,
            ],
            [
                'attribute' => 'nama',
                'format' => 'raw',
                'value' => $model->nama,
            ],
            [
                'attribute' => 'append',
                'format' => 'raw',
                'value' => $model->append,
            ],
            [
                'attribute' => 'rincian_jenis',
                'format' => 'raw',
                'value' => $model->rincian_jenis,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Pemeriksaan Rincian', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Pemeriksaan Rincian', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
