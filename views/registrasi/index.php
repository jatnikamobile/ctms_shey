<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\components\Helper;
use app\models\Pasien;
use app\models\Paket;
use app\models\Instansi;
use app\models\Unit;
use app\models\Registrasi;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RegistrasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Protokol';
$this->params['breadcrumbs'][] = $this->title;

?>

<?php echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="registrasi-index box box-primary">

    <div class="box-header">
        <?= Html::a('<i class="fa fa-plus"></i> Tambah Protokol', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>

    <div class="box-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No',
                'headerOptions' => ['style' => 'text-align:center; width:50px'],
                'contentOptions' => ['style' => 'text-align:center']
            ],
            [
                'attribute' => 'no_mcu',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center; width:80px'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'no_urut',
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
                'attribute' => 'nama_pasien',
                'label' => 'Protokol Uji',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'id_pasien_instansi',
                'label' => 'Instansi',
                'format' => 'raw',
                'filter' => Instansi::getList(),
                'value' => function($data) {
                    return @$data->instansi->nama;
                },
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'id_pasien_unit',
                'label' => 'Unit',
                'format' => 'raw',
                'filter' => Unit::getList(),
                'value' => function($data) {
                    return @$data->unit->nama;
                },
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'paket_id',
                'format' => 'raw',
                'filter' => Paket::getList(),
                'value' => function($data) {
                    return @$data->paket->nama;
                },
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],

            [
                'label'=>'Print Model CRF',
                'encodeLabel' => false,
                'format' => 'raw',
                'value' => function($data){
                    return Html::a("<i class='fa fa-print'><i>",['registrasi/pdf-label','id'=>$data->id],['data-toggle' => 'tooltip','title' => 'Print Label','target' => '_blank']);
                },
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;width:20px','title'=>'Print Label'],
            ],

            [
                'label'=>'Print Resume Set Up',
                'encodeLabel' => false,
                'format' => 'raw',
                'value' => function($data){
                    return Html::a("<i class='fa fa-print'><i>",['registrasi/pdf-formulir','id'=>$data->id],['data-toggle' => 'tooltip','title' => 'Print Formulir','target' => '_blank']);
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
