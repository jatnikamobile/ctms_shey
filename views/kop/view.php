<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kop */

$this->title = "Detail Kop";
$this->params['breadcrumbs'][] = ['label' => 'Kop', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kop-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Kop</h3>
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
                'attribute' => 'nama',
                'format' => 'raw',
                'value' => $model->nama,
            ],
            [
                'attribute' => 'alamat',
                'format' => 'raw',
                'value' => $model->alamat,
            ],
            [
                'attribute' => 'telp',
                'format' => 'raw',
                'value' => $model->telp,
            ],
            [
                'attribute' => 'email',
                'format' => 'raw',
                'value' => $model->email,
            ],
            [
                'attribute' => 'website',
                'format' => 'raw',
                'value' => $model->website,
            ],
            [
                'attribute' => 'photo',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->photo != '') {
                        return Html::img('@web/images/' . $model->photo, 
                        [
                            'class' => 'img-responsive', 
                            'style' => 'height:100px'
                        ]);
                    } else { 
                        return Html::img('@web/images/no-image.png', 
                        [
                            'class' => 'img-responsive', 
                            'style' => 'height:100px'
                        ]);;
                    }
                },
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Kop', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Kop', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
