<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanSpirometry */

$this->title = "Detail Pemeriksaan Spirometry";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Spirometry', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-spirometry-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Spirometry</h3>
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
                'attribute' => 'hasil',
                'format' => 'raw',
                'value' => $model->hasil,
            ],
            [
                'attribute' => 'kesimpulan',
                'format' => 'raw',
                'value' => $model->kesimpulan,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Pemeriksaan Spirometry', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Pemeriksaan Spirometry', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
