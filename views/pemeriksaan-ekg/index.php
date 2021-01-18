<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PemeriksaanEkgSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Pemeriksaan Ekg';
$this->params['breadcrumbs'][] = $this->title;
?>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="pemeriksaan-ekg-index box box-primary">

    <div class="box-header">
        <?php // Html::a('<i class="fa fa-plus"></i> Tambah Pemeriksaan Ekg', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
        <?php // Html::a('<i class="fa fa-print"></i> Export Excel', Yii::$app->request->url.'&export=1', ['class' => 'btn btn-success btn-flat','target' => '_blank']) ?>
        <?php // Html::a('<i class="fa fa-print"></i> Export Pdf', Yii::$app->request->url.'&export-pdf=1', ['class' => 'btn btn-danger btn-flat','target' => '_blank']) ?>

    </div>

    <div class="box-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center']
            ],

            // [
            //     'attribute' => 'id',
            //     'format' => 'raw',
            //     'headerOptions' => ['style' => 'text-align:center;'],
            //     'contentOptions' => ['style' => 'text-align:center;'],
            // ],
            // [
            //     'attribute' => 'id_registrasi',
            //     'format' => 'raw',
            //     'headerOptions' => ['style' => 'text-align:center;'],
            //     'contentOptions' => ['style' => 'text-align:center;'],
            // ],
            [
                'label' => 'Nomor MCU',
                'format' => 'raw',
                'value' => function($data){
                    return @$data->registrasi->no_mcu;
                },
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'hasil',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'kesan',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'label'=>'Download Pemeriksaan Ekg',
                'encodeLabel' => false,
                'format' => 'raw',
                'value' => function($data){
                    return Html::a("<i class='fa fa-download'><i>",['pemeriksaan-ekg/pdf','id'=>$data->id]);
                },
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;width:20px','title'=>'Download'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'text-align:center;width:80px']
            ],
        ],
    ]); ?>
    </div>
</div>
