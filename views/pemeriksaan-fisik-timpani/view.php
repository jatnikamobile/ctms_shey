<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikTimpani */

$this->title = "Detail Pemeriksaan Fisik Timpani";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Fisik Timpani', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-fisik-timpani-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Fisik Timpani</h3>
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
                'attribute' => 'serumen',
                'format' => 'raw',
                'value' => $model->serumen,
            ],
            [
                'attribute' => 'lainlain',
                'format' => 'raw',
                'value' => $model->lainlain,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Pemeriksaan Fisik Timpani', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Pemeriksaan Fisik Timpani', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
