<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanTreadmill */

$this->title = "Detail Pemeriksaan Treadmill";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Treadmill', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-treadmill-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Treadmill</h3>
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
                'attribute' => 'metode',
                'format' => 'raw',
                'value' => $model->metode,
            ],
            [
                'attribute' => 'jantung',
                'format' => 'raw',
                'value' => $model->jantung,
            ],
            [
                'attribute' => 'kf_poor',
                'format' => 'raw',
                'value' => $model->kf_poor,
            ],
            [
                'attribute' => 'kf_fair',
                'format' => 'raw',
                'value' => $model->kf_fair,
            ],
            [
                'attribute' => 'kf_average',
                'format' => 'raw',
                'value' => $model->kf_average,
            ],
            [
                'attribute' => 'kf_good',
                'format' => 'raw',
                'value' => $model->kf_good,
            ],
            [
                'attribute' => 'kf_excelent',
                'format' => 'raw',
                'value' => $model->kf_excelent,
            ],
            [
                'attribute' => 'klasifikasi_fungsional_1',
                'format' => 'raw',
                'value' => $model->klasifikasi_fungsional_1,
            ],
            [
                'attribute' => 'klasifikasi_fungsional_2',
                'format' => 'raw',
                'value' => $model->klasifikasi_fungsional_2,
            ],
            [
                'attribute' => 'klasifikasi_fungsional_3',
                'format' => 'raw',
                'value' => $model->klasifikasi_fungsional_3,
            ],
            [
                'attribute' => 'denyut_nadi_awal',
                'format' => 'raw',
                'value' => $model->denyut_nadi_awal,
            ],
            [
                'attribute' => 'denyut_nadi_akhir',
                'format' => 'raw',
                'value' => $model->denyut_nadi_akhir,
            ],
            [
                'attribute' => 'td_sistolik_awal',
                'format' => 'raw',
                'value' => $model->td_sistolik_awal,
            ],
            [
                'attribute' => 'td_diastolik_awal',
                'format' => 'raw',
                'value' => $model->td_diastolik_awal,
            ],
            [
                'attribute' => 'td_sistolik_akhir',
                'format' => 'raw',
                'value' => $model->td_sistolik_akhir,
            ],
            [
                'attribute' => 'td_diastolik_akhir',
                'format' => 'raw',
                'value' => $model->td_diastolik_akhir,
            ],
            [
                'attribute' => 'stop_treadmill',
                'format' => 'raw',
                'value' => $model->stop_treadmill,
            ],
            [
                'attribute' => 'resume_hasil',
                'format' => 'raw',
                'value' => $model->resume_hasil,
            ],
            [
                'attribute' => 'max',
                'format' => 'raw',
                'value' => $model->max,
            ],
            [
                'attribute' => 'submax',
                'format' => 'raw',
                'value' => $model->submax,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Pemeriksaan Treadmill', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Pemeriksaan Treadmill', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
