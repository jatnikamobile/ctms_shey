<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Templet Form';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="paket-index box box-primary">

    <div class="box-header">
        <?= Html::a('<i class="fa fa-plus"></i> Tambah Templet', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
        <?php // Html::a('<i class="fa fa-print"></i> Export Excel', Yii::$app->request->url.'&export=1', ['class' => 'btn btn-success btn-flat','target' => '_blank']) ?>
        <?php // Html::a('<i class="fa fa-print"></i> Export Pdf', Yii::$app->request->url.'&export-pdf=1', ['class' => 'btn btn-danger btn-flat','target' => '_blank']) ?>

    </div>

    <div class="box-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No',
                'headerOptions' => ['style' => 'text-align:center; width: 50px'],
                'contentOptions' => ['style' => 'text-align:center']
            ],

            [
                'attribute' => 'kode',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:left;'],
                // 'value' => function($data) {
                //     return $data->protokol;
                // },
            ],
            [
                'attribute' => 'nama',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:left;'],
                // 'value' => function($data) {
                //     return $data->protokol;
                // },
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'text-align:center;width:120px'],
                'template' => '{view} {update} {copy} {delete}',
                'buttons' => [
                    'copy' => function($url, $model, $key) {
                        return '<a href="'. Url::to(['templet-form/copy', 'id'=>$key]).'" title="Copy" aria-label="Copy" data-pjax="0" data-method="post" data-confirm="Apakah anda yakin akan mengcopy templet ini?"><span class="glyphicon glyphicon-copy"></span></a>';
                    },
                ],
            ],
        ],
    ]); ?>
    </div>
</div>
