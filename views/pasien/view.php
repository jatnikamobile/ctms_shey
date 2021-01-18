<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Pasien */

$this->title = "Detail Pasien";
$this->params['breadcrumbs'][] = ['label' => 'Pasien', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pasien-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Pasien</h3>
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
                'attribute' => 'nik',
                'format' => 'raw',
                'value' => $model->nik,
            ],
            [
                'attribute' => 'nama',
                'format' => 'raw',
                'value' => $model->nama,
            ],
            [
                'attribute' => 'alamat',
                'format' => 'raw',
                'value' => $model->alamat,
            ],
            [
                'attribute' => 'tempat_lahir',
                'format' => 'raw',
                'value' => $model->tempat_lahir,
            ],
            [
                'attribute' => 'tanggal_lahir',
                'format' => 'raw',
                'value' => $model->tanggal_lahir,
            ],
            [
                'label' => 'umur',
                'format' => 'raw',
                'value' => $model->getUmur($model->tanggal_lahir),
            ],
            [
                'attribute' => 'jenis_kelamin',
                'format' => 'raw',
                'value' => $model->jenis_kelamin,
            ],
            [
                'attribute' => 'golongan_darah',
                'format' => 'raw',
                'value' => $model->golongan_darah,
            ],
            [
                'attribute' => 'no_telepon',
                'format' => 'raw',
                'value' => $model->no_telepon,
            ],
            [
                'attribute' => 'status_kawin',
                'format' => 'raw',
                'value' => $model->status_kawin,
            ],
            [
                'attribute' => 'id_pasien_agama',
                'format' => 'raw',
                'value' => @$model->agama->nama,
            ],
            [
                'attribute' => 'id_pasien_pekerjaan',
                'format' => 'raw',
                'value' => @$model->pekerjaan->nama,
            ],
            [
                'attribute' => 'id_pasien_pendidikan',
                'format' => 'raw',
                'value' => @$model->pendidikan->nama,
            ],
            [
                'attribute' => 'id_pasien_instansi',
                'format' => 'raw',
                'value' => @$model->instansi->nama,
            ],
            [
                'attribute' => 'id_pasien_unit',
                'format' => 'raw',
                'value' => @$model->unit->nama,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Pasien', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Pasien', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>
</div>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Daftar Medical Checkup</h3>
    </div>
    <div class="box-body">
        <table class="table table-hover table-condensed">
            <thead>
            <tr>
                <th width="30px" style="text-align:center">No</th>
                <th style="text-align:center">Nomor MCU</th>
                <th style="text-align:center;">Tanggal Registrasi</th>
                <th style="text-align:center;">Paket</th>
                <th> </th>
            </tr>
            </thead>
            <?php $i=1; ?>
            <?php foreach($model->manyRegistrasi as $data) { ?>
                <tr>
                    <td style="text-align:center"><?= $i++; ?></td>
                    <td style="text-align:center"><?= $data->no_mcu; ?></td>
                    <td style="text-align:center"><?= Helper::getTanggal($data->tanggal); ?></td>
                    <td style="text-align:center"><?= @$data->paket->nama; ?></td>
                    <td style="text-align:center">
                        <?= Html::a(
                                '<i class="fa fa-eye"></i>',
                                ['/registrasi/view', 'id' => $data->id],
                                ['data-toggle' => 'tooltip', 'title' => 'Lihat Detail']
                        ); ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>