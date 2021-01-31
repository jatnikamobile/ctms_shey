<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Paket */

$this->title = "Detail Form";
$this->params['breadcrumbs'][] = ['label' => 'Paket', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
        <?= Html::a('<i class="fa fa-list"></i> Templet Form ', ['index'], ['class' => 'btn btn-info btn-flat']) ?>
        <?php $model->status or print Html::a('<i class="fa fa-paper-plane"></i> Ajukan verifikasi', ['submit', 'id' => $model->id], ['class' => 'btn btn-warning btn-flat', 'data-confirm' => 'Apakah anda yakin akan mengajukan templet form ini?', 'data-method' => 'post']) ?>
    </div>

</div>

<?= $this->render('_params', compact('model')) ?>
