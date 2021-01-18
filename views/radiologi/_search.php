<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RadiologiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="radiologi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    
    <div class="box box-primary">
        <div class="box-body">

        </div>
    </div>
        <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_registrasi') ?>

    <?= $form->field($model, 'hasil_pemeriksaan') ?>

    <?= $form->field($model, 'cor') ?>

    <?= $form->field($model, 'pulmo') ?>

    <?php // echo $form->field($model, 'sinus_diafragma') ?>

    <?php // echo $form->field($model, 'tulang_jaringan_lunak') ?>

    <div class="col-sm-2 col-xs-12">
        <?= Html::submitButton('<i class="fa fa-check"></i> Filter Data', ['class' => 'btn btn-primary btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
