<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikMulutSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemeriksaan-fisik-mulut-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    
    <div class="box box-primary">
        <div class="box-body">

        </div>
    </div>
        <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_pemeriksaan_fisik') ?>

    <?= $form->field($model, 'mucosa_mulut') ?>

    <?= $form->field($model, 'kelainan_gigi') ?>

    <?= $form->field($model, 'lidah') ?>

    <div class="col-sm-2 col-xs-12">
        <?= Html::submitButton('<i class="fa fa-check"></i> Filter Data', ['class' => 'btn btn-primary btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
