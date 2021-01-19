<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PasienSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pasien-search">

    <?php $form = ActiveForm::begin([
        'id' => 'search-form',
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    
    <div class="box box-primary">
        <div class="box-body">
            <div class="row" style="margin-bottom:10px; margin-right:0;">
                <div class="col-sm-4 col-xs-12" style="padding-right: 0px !important;">
                    <?= $form->field($model, 'Diagnosa') ?>
                </div>
                <div class="col-sm-4 col-xs-12" style="padding-right: 0px !important;">
                    <?= $form->field($model, 'usia') ?>
                </div>

    <?php // echo $form->field($model, 'tanggal_lahir') ?>

    <?php // echo $form->field($model, 'jenis_kelamin') ?>

    <?php // echo $form->field($model, 'golongan_darah') ?>

    <?php // echo $form->field($model, 'no_telepon') ?>

    <?php // echo $form->field($model, 'status_kawin') ?>
            </div>

            <div class="row" style="margin-bottom:10px; margin-right:0;">
                <div class="col-xs-12">
                    <?= Html::submitButton('<i class="fa fa-check"></i> Filter Data', ['class' => 'btn btn-primary btn-flat']) ?>
                    <?= Html::button('<i class="fa fa-times"></i> Hapus', ['class' => 'btn btn-default clear btn-flat']) ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
