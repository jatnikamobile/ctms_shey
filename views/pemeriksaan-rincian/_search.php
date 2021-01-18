<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanRincianSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemeriksaan-rincian-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    
    <div class="box box-primary">
        <div class="box-body">

        </div>
    </div>
        <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_pemeriksaan') ?>

    <?= $form->field($model, 'id_induk') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'append') ?>

    <?php // echo $form->field($model, 'rincian_jenis') ?>

    <div class="col-sm-2 col-xs-12">
        <?= Html::submitButton('<i class="fa fa-check"></i> Filter Data', ['class' => 'btn btn-primary btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
