<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Instansi */

$this->title = "Detail Sponsor";
$this->params['breadcrumbs'][] = ['label' => 'Instansi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instansi-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Sponsor</h3>
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
            [
                'attribute' => 'kode',
                'format' => 'raw',
                'value' => $model->kode,
            ],
            [
                'attribute' => 'nama',
                'format' => 'raw',
                'value' => $model->nama,
            ],

            [
                'attribute' => 'email',
                'format' => 'raw',
                'value'=>function($data) {
                    return @$data->user->email;
                },
                'headerOptions' => ['style' => 'text-align:center; width:250px'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            
            [
                'label' => 'Username',
                'format' => 'raw',
                'value'=>function($data) {
                    return Html::a(@$data->user->username, ['user/view','id' => @$data->user->id], ['option' => 'value']);
                },
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Update Sponsor', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Sponsor', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
