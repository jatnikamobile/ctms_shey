<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;
use app\models\Pasien;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */

?>
    <div class="box-header with-border">
        <h3 class="box-title">Detail Pasien</h3>
    </div>

    <div class="box-body">
        <?= DetailView::widget([
            'model' => $model,
            'template' => '<tr><th width="180px" style="text-align:left">{label}</th><td>{value}</td></tr>',
            'attributes' => [
                [
                    'label' => 'NIK',
                    'format' => 'raw',
                    'value' => @$model->pasien->nik,
                ],
                [
                    'label' => 'Nama Pasien',
                    'format' => 'raw',
                    'value' => @$model->pasien->nama,
                ],
                [
                    'label' => 'Alamat',
                    'format' => 'raw',
                    'value' => @$model->pasien->alamat,
                ],
                [
                    'label' => 'Tempat Lahir',
                    'format' => 'raw',
                    'value' => @$model->pasien->tempat_lahir,
                ],
                [
                    'label' => 'Tanggal Lahir',
                    'format' => 'raw',
                    'value' => Helper::getTanggal(@$model->pasien->tanggal_lahir),
                ],
                [
                    'label' => 'Umur',
                    'format' => 'raw',
                    'value' => Pasien::getUmur(@$model->pasien->tanggal_lahir),
                ],
                [
                    'label' => 'Jenis Kelamin',
                    'format' => 'raw',
                    'value' => @$model->pasien->jenis_kelamin,
                ],
                [
                    'label' => 'Golongan Darah',
                    'format' => 'raw',
                    'value' => @$model->pasien->golongan_darah,
                ],
                [
                    'label' => 'No Telepon',
                    'format' => 'raw',
                    'value' => @$model->pasien->no_telepon,
                ],
                [
                    'label' => 'Status Kawin',
                    'format' => 'raw',
                    'value' => @$model->pasien->status_kawin,
                ],
                [
                    'label' => 'Agama',
                    'format' => 'raw',
                    'value' => @$model->pasien->agama,
                ],
                [
                    'label' => 'Pendidikan',
                    'format' => 'raw',
                    'value' => @$model->pasien->pendidikan,
                ],
                [
                    'label' => 'Pekerjaan',
                    'format' => 'raw',
                    'value' => @$model->pasien->pekerjaan,
                ],
                [
                    'label' => 'Wilayah',
                    'format' => 'raw',
                    'value' => @$model->pasien->wilayah,
                ],
            ]
        ]) ?>
    </div>

    <div class="box-footer">
        <?php if ($buttonAction): ?>
            <?= Html::a('<i class="fa fa-pencil"></i> Sunting Data Pasien', ['/pasien/update', 'id' => $model->pasien->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?php endif ?>
    </div>