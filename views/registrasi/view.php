
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;
use app\models\intansi;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */

$this->title = "Detail Protokol";
$this->params['breadcrumbs'][] = ['label' => 'Registrasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$allow_button = 0;
?>
<div class="registrasi-view box box-primary">
    <div class="box-header">
        <h3 class="box-title">Detail Protokol</h3>
    </div>

    <div class="box-body">

    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-7">
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
                            'attribute' => 'no_mcu',
                            'format' => 'raw',
                            'headerOptions' => ['style' => 'text-align:center;'],
                            'contentOptions' => ['style' => 'text-align:center;'],
                        ],
                        // [
                        //     'attribute' => 'id_pasien_instansi',
                        //     'format' => 'raw',
                        //     'value' => function($data){
                        //         return @$data->instansi->nama;
                        //     } ,
                        //     'headerOptions' => ['style' => 'text-align:center;'],
                        //     'contentOptions' => ['style' => 'text-align:center;'],
                        // ],
                        [
                            'attribute' => 'no_urut',
                            'format' => 'raw',
                            'headerOptions' => ['style' => 'text-align:center;'],
                            'contentOptions' => ['style' => 'text-align:center;'],
                        ],
                        [
                            'attribute' => 'pasien_id',
                            'format' => 'raw',
                            'value' => function($data) {
                                return @$data->pasien->nama;
                            },
                            'headerOptions' => ['style' => 'text-align:center;'],
                            'contentOptions' => ['style' => 'text-align:center;'],
                        ],
                        [
                            'attribute' => 'paket_id',
                            'format' => 'raw',
                            'value' => function($data) {
                                return '<span class="label label-success">'. @$data->paket->nama . '</span>';
                            },
                            'headerOptions' => ['style' => 'text-align:center;'],
                            'contentOptions' => ['style' => 'text-align:center;'],
                        ],
                        [
                            'attribute' => 'tanggal',
                            'format' => 'raw',
                            'value' => function($data) {
                                return Helper::getTanggalSingkat($data->tanggal);
                            },
                            'headerOptions' => ['style' => 'text-align:center; width: 120px'],
                            'contentOptions' => ['style' => 'text-align:center;'],
                        ],
                    ],
                ]) ?>
            </div>
            <div class="col-sm-5">
                <?= DetailView::widget([
                    'model' => $model,
                    'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
                    'attributes' => [
                        [
                            'attribute' => 'id_pasien_instansi',
                            'format' => 'raw',
                            'value' => function($data){
                                return @$data->instansi->nama;
                            } ,
                            'headerOptions' => ['style' => 'text-align:center;'],
                            'contentOptions' => ['style' => 'text-align:center;'],
                        ],
                    ],
                ]) ?>
            </div>
        </div>
    </div>


    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Protokol', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Protokol', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
        <div>&nbsp;</div>

        <?= $this->render('pemeriksaan-tabs',[
            'model' => $model,
            'modelPemeriksaanRincianHasil' => $modelPemeriksaanRincianHasil,
            'disabled' => false,
            'allow_button' => $allow_button,
        ]) ?>

        <?php /*$this->render('tabs-pemeriksaan',[
            'model' => $model,
            'buttonAction' => true
        ])*/ ?>
    </div>
</div>
