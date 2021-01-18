<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Paket */

$this->title = "Detail Paket";
$this->params['breadcrumbs'][] = ['label' => 'Paket', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paket-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Paket</h3>
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
                'attribute' => 'nama',
                'format' => 'raw',
                'value' => $model->nama,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Paket', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Protokol ', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>

<div class="paket-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Daftar Protokol Uji</h3>
        <?= Html::a('<i class="fa fa-plus"></i> Tambah Protokol Uji', ['/paket-pemeriksaan/create', 'id_paket' => $model->id], ['class' => 'btn btn-success btn-flat pull-right']) ?>

    </div>

    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th width="55px" class="text-center">No</th>
                <th class="text-center">Nama Pemeriksan</th>
                <th width="100px" class="text-center">Aksi</th>
            </tr>
            <?php $no = 1; foreach ($model->manyPaketPemeriksaan as $paketPemeriksaan): ?>
            <tr>
                <td class="text-center"><?= @$no++ ?></td>
                <td>
                    <?= Html::a(@$paketPemeriksaan->pemeriksaan->nama, ['pemeriksaan/view','id' => $paketPemeriksaan->id_pemeriksaan]) ?>
                </td>
                <td class="text-center">
                    <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['paket-pemeriksaan/update', 'id' => $paketPemeriksaan->id], ['data-toggle' => 'tooltip',
                        'title' => 'Ubah' ], [
                        
                    ]) ?>
                    <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', ['paket-pemeriksaan/delete', 'id' => $paketPemeriksaan->id], [
                        'data-toggle' => 'tooltip',
                        'title' => 'Hapus',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </td>

            </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>
