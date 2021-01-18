<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanEkg */

$this->title = "Detail Pemeriksaan Ekg";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Ekg', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-ekg-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Ekg</h3>
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
            [
                'attribute' => 'id_registrasi',
                'format' => 'raw',
                'value' => $model->id_registrasi,
            ],
            [
                'attribute' => 'hasil',
                'format' => 'raw',
                'value' => $model->hasil,
            ],
            [
                'attribute' => 'kesan',
                'format' => 'raw',
                'value' => $model->kesan,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Pemeriksaan Ekg', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Pemeriksaan Ekg', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
