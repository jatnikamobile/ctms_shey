<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PaketPemeriksaan */

$this->title = "Detail Protokol Uji";
$this->params['breadcrumbs'][] = ['label' => 'Protokol Uji', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paket-pemeriksaan-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Protokol Uji</h3>
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
                'attribute' => 'id_paket',
                'format' => 'raw',
                'value' => $model->id_paket,
            ],
            [
                'attribute' => 'id_pemeriksaan',
                'format' => 'raw',
                'value' => $model->id_pemeriksaan,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Protokol Uji', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Protokol Uji', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
