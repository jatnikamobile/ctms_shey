<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\components\Helper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RegistrasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Protokol';
$this->params['breadcrumbs'][] = $this->title;

?>

<?php echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="registrasi-index box box-primary">

    <div class="box-header">
        <?= Html::a('<i class="fa fa-plus"></i> Tambah Protokol Baru', ['protokol-uji/create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>

    <div class="box-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No',
                'headerOptions' => ['style' => 'text-align:center; width:50px'],
                'contentOptions' => ['style' => 'text-align:center']
            ],
            [
                'label' => 'Kode Uji',
                'headerOptions' => ['style' => 'text-align:center; width:80px'],
                'contentOptions' => ['style' => 'text-align:center;'],
                'value' => function($data) {
                    return $data->phaseHuruf . date('Y', strtotime($data->tanggal)) . $data->id;
                },
            ],
            [
                'attribute' => 'phase',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center; width:80px'],
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
            [
                'attribute' => 'nama',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'id_instansi',
                'label' => 'Instansi',
                'format' => 'raw',
                // 'filter' => Instansi::getList(),
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
                'value' => function($data) {return $data->_instansi; },
            ],
            // [
            //     'attribute' => 'id_paket',
            //     'label' => 'Center',
            //     'headerOptions' => ['style' => 'text-align:center;'],
            //     'contentOptions' => ['style' => 'text-align:center;'],
            //     'value' => function($data) {return $data->_paket; },
            // ],

            [
                'label'=>'Cetak Model CRF',
                'encodeLabel' => false,
                'format' => 'raw',
                'value' => function($data){
                    return Html::a("<i class='fa fa-print'><i>",['pdf-label','id'=>$data->id],['data-toggle' => 'tooltip','title' => 'Print Formulir','target' => '_blank']);
                },
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;width:20px','title'=>'Print'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'text-align:center;width:80px']
            ],
        ],
    ]); ?>
    </div>
</div>
