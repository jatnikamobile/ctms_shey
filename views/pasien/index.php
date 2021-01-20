<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PasienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Calon Subject';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="pasien-index box box-primary">

    <div class="box-header">
        <!-- <?= Html::a('<i class="fa fa-plus"></i> Tambah Pasien', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-print"></i> Export Excel', Yii::$app->request->url.'&export=1', ['class' => 'btn btn-success btn-flat','target' => '_blank']) ?>
        <?= Html::a('<i class="fa fa-upload"></i> Import Data Pasien', ['import'], ['class' => 'btn btn-flat btn-success']); ?> -->

    </div>

    <div class="box-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
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
            [
                'attribute' => 'Site',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
                'value' => function($data) {
                    return Yii::$app->name;
                },
            ],
            [
                'label' => 'Nama Pasien',
                'attribute' => 'Firstname',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            // [
            //     'attribute' => 'alamat',
            //     'format' => 'raw',
            //     'headerOptions' => ['style' => 'text-align:center;'],
            //     'contentOptions' => ['style' => 'text-align:center;'],
            // ],
            // [
            //     'attribute' => 'tempat_lahir',
            //     'format' => 'raw',
            //     'headerOptions' => ['style' => 'text-align:center;'],
            //     'contentOptions' => ['style' => 'text-align:center;'],
            // ],
            [
                'label' => 'ICD',
                'attribute' => 'KdIcd',
                'format' => 'raw',
                // 'value' => function($data) {
                //     return Helper::getTanggalSingkat($data->tanggal_lahir);
                // },
                'headerOptions' => ['style' => 'text-align:center; width: 120px'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'label' => 'Usia',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
                'value' => function($data) {
                    if (empty($data->umurhari)) return '-';

                    $usia = $data->umurhari.' hari';
                    if ($data->umurbln) $usia = $data->umurbln.' bln '.$usia;
                    if ($data->umurthn) $usia = $data->umurthn.' thn '.$usia;

                    return $usia;
                }
            ],
            [
                'attribute' => 'Diagnosa',
                'format' => 'raw',
                // 'value' => function($data) {
                //     return @$data->instansi->nama;
                // },
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            // [
            //     'attribute' => 'golongan_darah',
            //     'format' => 'raw',
            //     'headerOptions' => ['style' => 'text-align:center;'],
            //     'contentOptions' => ['style' => 'text-align:center;'],
            // ],
            // [
            //     'attribute' => 'no_telepon',
            //     'format' => 'raw',
            //     'headerOptions' => ['style' => 'text-align:center;'],
            //     'contentOptions' => ['style' => 'text-align:center;'],
            // ],
            // [
            //     'attribute' => 'status_kawin',
            //     'format' => 'raw',
            //     'headerOptions' => ['style' => 'text-align:center;'],
            //     'contentOptions' => ['style' => 'text-align:center;'],
            // ],
            // [   
            //     'attribute' => 'Jumlah MCU',
            //     'value' => function($data) {
            //         return $data->countRegistrasi();
            //     },
            //     'contentOptions' => ['class' => 'text-center'],
            //     'headerOptions' => ['class' => 'text-center']
            // ],

            [
                'header' => 'Masuk Kriteria',
                'class' => \yii\grid\ActionColumn::class,
                'contentOptions' => ['style' => 'text-align:center;width:80px'],
                'template' => '{mark}',
                'buttons' => [
                    'mark' => function($url, $model, $key) {
                        return '<a href="#" class="mark-as-subject" data-regno="'.$key.'" data-nama="'.$model->Firstname.'"><span class="label label-success"><i class="fa fa-paper-plane"></i></span></a>';
                    },
                ],
            ],
        ],
    ]); ?>
    </div>
</div>

<?php
$urlMark = Url::to(['mark-subject', '_'=>'_']);
$this->registerJs("
$('.mark-as-subject').click(ev => {
    let data = ev.currentTarget.dataset
    swal(`Masukkan \"\${data.nama}\" ke daftar subject`)
    .then(confirm => {
        if (!confirm) throw null;
        // data[yii.getCsrfParam()] = yii.getCsrfToken()
        return wretch(`$urlMark`)
            .headers({'X-CSRF-Token': yii.getCsrfToken()})
            .formUrl(data)
            .post()
            .json(json => {
                console.info(json)
                swal(`Success`,`success`);
            })
    })
    .catch(err => {
        console.error(err)
        if (err) {
            swal(`Oh noes!`, `The AJAX request failed!`, `error`);
        } else {
            swal.stopLoading();
            swal.close();
        }
    });
})
");
