<?php 

use app\components\Helper;
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = "Hasil Protokol";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pemeriksaan-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Protokol</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:left">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            [
                'attribute' => 'nama',
                'format' => 'raw',
                'value' => $model->nama,
            ],
        ],
    ]) ?>

    </div>

</div>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            Daftar Registrasi Pasien
        </h3>
    </div>
    <div class="box-body">
        <table class="table table-hover table-stripped">
            <thead>
                <tr>
                    <th class="text-center" width="55px">No</th>
                    <th class="text-center" width="120px">No. ID</th>
                    <th class="text-center" width="120px">No Urut</th>
                    <th class="text-center">Nama Pasien</th>
                    <th class="text-center" width="160px">Tanggal Registrasi</th>
                    <th class="text-center" width="130px">Pemeriksaan</th>
                    <th class="text-center" width="100px">Status Pemeriksaan</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($model->manyRegistrasi as $registrasi): ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center"><?= $registrasi->no_mcu ?></td>
                        <td class="text-center"><?= $registrasi->no_urut ?></td>
                        <td><?= @$registrasi->pasien->nama ?></td>
                        <td class="text-center"><?= Helper::getTanggal($registrasi->tanggal) ?></td>
                        <td class="text-center"><?= @$registrasi->paket->nama ?></td>
                        <td class="text-center">
                            <?= $registrasi->getStatusPengisianPemeriksaan() ?>
                        </td>
                        <td class="text-center">
                            <?= Html::a('<i class="fa fa-download"></i>', ['unduh-hasil-pemeriksaan','id' => $model->id,'id_registrasi' => $registrasi->id], ['data-toggle' => 'tooltip','title' => 'Unduh Hasil Pemeriksaan','target' => '_blank']); ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>