<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $model app\models\Laboratorium */

$this->title = "Detail Laboratorium";
$this->params['breadcrumbs'][] = ['label' => 'Laboratorium', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="laboratorium-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Laboratorium</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            // [
            //     'attribute' => 'id',
            //     'format' => 'raw',
            //     'value' => $model->id,
            // ],
            // [
            //     'attribute' => 'id_registrasi',
            //     'format' => 'raw',
            //     'value' => $model->id_registrasi,
            // ],
            [
                'attribute' => 'hasil_pemeriksaan',
                'format' => 'raw',
                'value' => $model->hasil_pemeriksaan,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Laboratorium', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Laboratorium', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
        <?php // Html::a('<i class="fa fa-mail-reply"></i> Registrasi', ['registrasi/view', 'id' => $model->id_registrasi], ['class' => 'btn btn-danger btn-flat']) ?>
    </div>

    <?= $this->render('_view-tab',['model'=>$model]); ?>
</div>
