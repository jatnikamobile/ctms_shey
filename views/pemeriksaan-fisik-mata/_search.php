<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikMataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemeriksaan-fisik-mata-search">

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

    <?= $form->field($model, 'kacamata') ?>

    <?= $form->field($model, 'kelopak_mata') ?>

    <?= $form->field($model, 'konjungtiva') ?>

    <?php // echo $form->field($model, 'sklera') ?>

    <?php // echo $form->field($model, 'pupil') ?>

    <?php // echo $form->field($model, 'buta_warna') ?>

    <?php // echo $form->field($model, 'refraksi') ?>

    <?php // echo $form->field($model, 'addisi') ?>

    <?php // echo $form->field($model, 'funduskopi') ?>

    <?php // echo $form->field($model, 'tekanan_bola') ?>

    <?php // echo $form->field($model, 'mata_juling') ?>

    <?php // echo $form->field($model, 'tonometri') ?>

    <div class="col-sm-2 col-xs-12">
        <?= Html::submitButton('<i class="fa fa-check"></i> Filter Data', ['class' => 'btn btn-primary btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
