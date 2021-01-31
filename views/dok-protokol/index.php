<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

?>
<div class="registrasi-view box box-primary">
    <div class="box-header">
        <h3 class="box-title" id="dokp">Dokumen Pendukung</h3>
    </div>
    <div class="box-header">
        <script>
            window.dokProtokolFormLoaded = (modal) => modal.querySelector('.box-footer').style.display = 'none'
            window.dokProtokolSubmit = async (wretch, data) => {
                data.append('DokumenProtokol[id_protokol]', <?= $id_protokol ?>)
                // let url = '<?= Url::to(['dok-protokol/create']) ?>'
                let html = await wretch(data)
                if (html !== 'OK') {
                    return html
                }
                $.pjax.reload({
                    container: '#pjax1'
                })
                swal_success('Data berhasil disimpan.')
            }
        </script>
        <?= Html::a('<i class="fa fa-plus"></i> Tambah Dokumen Baru', ['dok-protokol/create'], ['class' => 'showModalButton btn btn-success btn-flat', 'data-swal-did-open' => 'dokProtokolFormLoaded', 'data-swal-pre-confirm' => 'dokProtokolSubmit', 'data-modal-type' => 'form']) ?>
    </div>

    <div class="box-body">
        <div class="col-sm-12">
            <?php Pjax::begin(['id' => 'pjax1']) ?>
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
                            'view' => function ($url, $model, $key) {
                                $url = Yii::getAlias('@web/uploads/dok-protokol/' . $model->file_path);
                                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['class' => 'showModalButton', 'data-modal-type' => 'embed-pdf', 'data-name' => $model->nama, 'data-pjax' => 0]);
                            },
                            'update' => function ($url, $model, $key) {
                                $url = Url::to(['dok-protokol/update', 'id' => $key]);
                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                    'class' => 'showModalButton',
                                    'data' => [
                                        'swal-did-open' => 'dokProtokolFormLoaded',
                                        'swal-pre-confirm' => 'dokProtokolSubmit',
                                        'modal-type' => 'form',
                                        'pjax' => 0,
                                    ],
                                ]);
                            },
                            'delete' => function ($url, $model, $key) {
                                return '<a href="' . Url::to(['dok-protokol/delete', 'id' => $key]) . '" title="Hapus" aria-label="Hapus" data-pjax="0" data-confirm="Apakah Anda yakin ingin menghapus item ini?" data-method="post"><span class="glyphicon glyphicon-trash"></span></a>';
                            },
                        ]
                    ],
                ],
            ]) ?>
            <?php Pjax::end() ?>
        </div>
    </div>
</div>
