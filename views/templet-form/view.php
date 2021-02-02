<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\TempletForm $model */

$this->title = "Detail Form";
$this->params['breadcrumbs'][] = ['label' => 'Paket', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$model->rowMeta = (object)[
    'num' => 1,
    'level' => 0,
    'btnDropdown' => function () {
    }
];
?>
<div class="paket-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Form</h3>
    </div>

    <div class="box-body">

        <?= DetailView::widget([
            'model' => $model,
            'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
            'attributes' => [
                [
                    'attribute' => 'kode',
                    'format' => 'raw',
                ],
                [
                    'attribute' => 'nama',
                    'format' => 'raw',
                ],
                [
                    'attribute' => 'statusLabel',
                    'label' => 'status',
                    'format' => 'raw',
                ],
            ],
        ]) ?>

    </div>

    <div class="box-footer">
        <?php $model->status or print Html::a('<i class="fa fa-pencil"></i> Sunting Templet', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Templet Form ', ['index'], ['class' => 'btn btn-info btn-flat']) ?>
        <?= Html::a('<i class="fa fa-copy"></i> Copy', ['copy', 'id' => $model->id], ['class' => 'btn btn-default btn-flat', 'data-method' => "post", 'data-confirm' => "Apakah anda yakin akan mengcopy templet ini?"]) ?>
        <?php $model->status or print Html::a('<i class="fa fa-paper-plane"></i> Ajukan verifikasi', ['submit', 'id' => $model->id], ['class' => 'btn btn-warning btn-flat', 'data-confirm' => 'Apakah anda yakin akan mengajukan templet form ini?', 'data-method' => 'post']) ?>
    </div>

</div>

<?php //params 
if ($model->status) {
    $subParam = '_sub-param-view';
} else {
    $subParam = '_sub-param';
    $model->rowMeta->btnDropdown = function($param) {
        return $this->render('_button-dropdown', compact('param'));
    };
}
?>
<div class="box box-primary">
    <div class="box-body">
        <?php $model->status or print Html::a('<i class="fa fa-plus"></i> Tambah Parameter ', ['param/create', 'id_form' => $model->id], ['class' => 'btn btn-flat btn-success']); ?>
    </div>
    <div class="box-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="55px" class="text-center">No</th>
                    <th class="text-center">Rincian Parameter <?= $model->nama ?></th>
                    <th class="text-center" width="100px">Tipe</th>
                    <th class="text-center" width="180px">Default Value</th>
                    <!-- <th class="text-center" width="150px">Nilai Rujukan</th> -->
                </tr>
            </thead>
            <tbody>
            <tbody>
                <?php foreach ($model->getListParam() as $param) : ?>
                    <?= $this->render('_sub-param', [
                        'param' => $param,
                        'model' => $model,
                    ]) ?>
                <?php endforeach ?>
            </tbody>
            </tbody>
        </table>
    </div>
</div>
