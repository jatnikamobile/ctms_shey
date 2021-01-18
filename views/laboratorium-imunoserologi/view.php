<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LaboratoriumImunoserologi */

$this->title = "Detail Laboratorium Imunoserologi";
$this->params['breadcrumbs'][] = ['label' => 'Laboratorium Imunoserologi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laboratorium-imunoserologi-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Laboratorium Imunoserologi</h3>
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
                'attribute' => 'id_laboratorium',
                'format' => 'raw',
                'value' => $model->id_laboratorium,
            ],
            [
                'attribute' => 'hbs_ag',
                'format' => 'raw',
                'value' => $model->hbs_ag,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Laboratorium Imunoserologi', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Laboratorium Imunoserologi', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
