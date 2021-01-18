<?php

use yii\bootstrap\Modal;
use yii\grid\GridView;
use yii\helpers\BaseStringHelper;
use yii\helpers\Html;
use yii\widgets\Pjax;

$pasienSearch = new \app\models\PasienSearch();
$dataProvider = $pasienSearch->searchModal(Yii::$app->request->queryParams);
$dataProvider->pagination->pageSize = 10;

?>

<?php Modal::begin([
    'header' => '<h3>Daftar Pasien</h3>',
    'id' => 'modal-ref-pasien',
    'size' => Modal::SIZE_LARGE,
    'toggleButton' => [
        'label' => '<i class="fa fa-plus"></i> Tambah Registrasi',
        'class' => 'btn btn-success btn-flat'
    ],
]) ?>
<?= Html::a('<i class="fa fa-plus"></i> Tambah Pasien Baru', ['create'], ['class' => 'btn btn-success btn-flat']) ?>

<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $pasienSearch,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center']
            ],
            [
                'attribute' => 'nik',
                'format' => 'raw',
                'value' => function($data){
                    return $data->nik;
                },
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:left;'],
            ],
            [
                'attribute' => 'nama',
                'format' => 'raw',
                'value' => function($data){
                    return $data->nama;
                },
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:left;'],
            ],
            [
                'format' => 'raw',
                'value' => function($data) {
                    return Html::a('<i class="fa fa-check"></i>', ['registrasi/create','pasien_id' => $data->id],['class' => 'btn btn-success btn-flat btn-xs','data-toggle' => 'tooltip', 'title' => 'Tambah Registrasi']);
                },
                'headerOptions' => ['style' => 'text-align:center;width:50px'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>

<?php Modal::end(); ?>
