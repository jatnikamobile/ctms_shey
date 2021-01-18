<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PaketTindakan */

$this->title = "Detail Paket Tindakan";
$this->params['breadcrumbs'][] = ['label' => 'Paket Tindakan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paket-tindakan-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Paket Tindakan</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            [
                'attribute' => 'id',
                'format' => 'raw',
                'value' => $model->id,
            ],
            [
                'attribute' => 'id_paket',
                'format' => 'raw',
                'value' => $model->id_paket,
            ],
            [
                'attribute' => 'id_tindakan',
                'format' => 'raw',
                'value' => $model->id_tindakan,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Paket Tindakan', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Protokol Uji', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
