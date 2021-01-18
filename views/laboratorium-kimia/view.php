<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LaboratoriumKimia */

$this->title = "Detail Laboratorium Kimia";
$this->params['breadcrumbs'][] = ['label' => 'Laboratorium Kimia', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laboratorium-kimia-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Laboratorium Kimia</h3>
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
                'attribute' => 'faal_hati_sgot',
                'format' => 'raw',
                'value' => $model->faal_hati_sgot,
            ],
            [
                'attribute' => 'faal_hati_sgpt',
                'format' => 'raw',
                'value' => $model->faal_hati_sgpt,
            ],
            [
                'attribute' => 'lemak_kolesterol_total',
                'format' => 'raw',
                'value' => $model->lemak_kolesterol_total,
            ],
            [
                'attribute' => 'lemak_trigliserida',
                'format' => 'raw',
                'value' => $model->lemak_trigliserida,
            ],
            [
                'attribute' => 'lemak_kolesterol_hdl',
                'format' => 'raw',
                'value' => $model->lemak_kolesterol_hdl,
            ],
            [
                'attribute' => 'lemak_kolesterol_ldl',
                'format' => 'raw',
                'value' => $model->lemak_kolesterol_ldl,
            ],
            [
                'attribute' => 'diabetes_glukosa_puasa',
                'format' => 'raw',
                'value' => $model->diabetes_glukosa_puasa,
            ],
            [
                'attribute' => 'diabetes_glukosa_2_jam',
                'format' => 'raw',
                'value' => $model->diabetes_glukosa_2_jam,
            ],
            [
                'attribute' => 'diabetes_gamma_gt',
                'format' => 'raw',
                'value' => $model->diabetes_gamma_gt,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Laboratorium Kimia', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Laboratorium Kimia', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
