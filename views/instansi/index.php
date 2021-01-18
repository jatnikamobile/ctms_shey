<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InstansiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Instansi';
$this->params['breadcrumbs'][] = $this->title;
?>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="instansi-index box box-primary">

    <div class="box-header">
        <?= Html::a('<i class="fa fa-plus"></i> Tambah Instansi', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-print"></i> Export Excel', Yii::$app->request->url.'&export=1', ['class' => 'btn btn-success btn-flat','target' => '_blank']) ?>
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
                'contentOptions' => ['style' => 'text-align:center; width:50px;']
            ],

            // [
            //     'attribute' => 'id',
            //     'format' => 'raw',
            //     'headerOptions' => ['style' => 'text-align:center;'],
            //     'contentOptions' => ['style' => 'text-align:center;'],
            // ],
            [
                'attribute' => 'kode',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center; width:50px;'],
            ],
            [
                'attribute' => 'nama',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],

            [
                'attribute' => 'email',
                'format' => 'raw',
                'value'=>function($data) {
                    return @$data->user->email;
                },
                'headerOptions' => ['style' => 'text-align:center; width:250px'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'label' => 'Username',
                'format' => 'raw',
                'value'=>function($data) {
                    return Html::a(@$data->user->username, ['user/view','id' => @$data->user->id], ['option' => 'value']);
                },
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'text-align:center;width:80px']
            ],
        ],
    ]); ?>
    </div>
</div>
