<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PasienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Calon Subject';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registrasi-view box box-primary">
    <div class="box-header">
        <h3 class="box-title">Dokumen Pendukung</h3>
    </div>
    <div class="box-header">
        <script>
        window.dokProtokolFormLoaded = (modal) => modal.querySelector('.box-footer').style.display = 'none'
        window.dokProtokolSubmit = async(data) => {
            data = new FormData(document.querySelector('.swal2-content form'))
            data.append('DokumenProtokol[id_protokol]', <?=$id_protokol?>)
            let html = await wretch('<?=Url::to(['dok-protokol/create'])?>').body(data).post().text()
            if (html === 'OK') {
                $.pjax.reload({container: '#pjax1'})
                return swal_fire({text:'Data berhasil disimpan.', icon:'success'})
            }
            SwalForm.update({html})
            dokProtokolFormLoaded(SwalForm.getContent())

            return false
        }</script>
        <?= Html::a('<i class="fa fa-plus"></i> Tambah Dokumen Baru', ['dok-protokol/create'], ['class' => 'swal-open btn btn-success btn-flat', 'data-swal-did-open'=>'dokProtokolFormLoaded', 'data-swal-pre-confirm'=>'dokProtokolSubmit', 'data-swal-form'=>1]) ?>
    </div>

    <div class="box-body">
        <div class="col-sm-12">
            <?php Pjax::begin(['id'=>'pjax1']) ?>
                <?= GridView::widget([
                    'dataProvider' => $dpDoks,
                    'columns' => [
                        [
                            'class' => 'yii\grid\SerialColumn',
                            'header' => 'No',
                            'headerOptions' => ['style' => 'text-align:center; width:50px'],
                            'contentOptions' => ['style' => 'text-align:center']
                        ],
                        [
                            'attribute' => 'nama',
                            'headerOptions' => ['style' => 'text-align:center; width:80px'],
                            'contentOptions' => ['style' => 'text-align:center;'],
                        ],

                        [
                            'class' => 'yii\grid\ActionColumn',
                            'contentOptions' => ['style' => 'text-align:center;width:80px'],
                            'buttons' => [
                                'view' => function($url, $model, $key) {
                                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['dok-protokol/view', 'id' => $key]);
                                },
                                ''
                            ]
                        ],
                    ],
                ]) ?>
            <?php Pjax::end() ?>
        </div>
    </div>
</div>
