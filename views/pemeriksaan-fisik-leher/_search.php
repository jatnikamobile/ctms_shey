<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikLeherSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemeriksaan-fisik-leher-search">

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

    <?= $form->field($model, 'tiroid') ?>

    <?= $form->field($model, 'limfonoid') ?>

    <?= $form->field($model, 'tenggorokan') ?>

    <?php // echo $form->field($model, 'tonsil') ?>

    <?php // echo $form->field($model, 'faring') ?>

    <div class="col-sm-2 col-xs-12">
        <?= Html::submitButton('<i class="fa fa-check"></i> Filter Data', ['class' => 'btn btn-primary btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
