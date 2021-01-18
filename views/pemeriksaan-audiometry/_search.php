<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanAudiometrySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemeriksaan-audiometry-search">

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

    <?= $form->field($model, 'l1000') ?>

    <?= $form->field($model, 'l4000') ?>

    <?= $form->field($model, 'r1000') ?>

    <?php // echo $form->field($model, 'r4000') ?>

    <?php // echo $form->field($model, 'selisih') ?>

    <?php // echo $form->field($model, 'nih') ?>

    <?php // echo $form->field($model, 'uraian') ?>

    <?php // echo $form->field($model, 'kesimpulan') ?>

    <div class="col-sm-2 col-xs-12">
        <?= Html::submitButton('<i class="fa fa-check"></i> Filter Data', ['class' => 'btn btn-primary btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
