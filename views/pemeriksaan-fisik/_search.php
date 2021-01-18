<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemeriksaan-fisik-search">

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

    <?= $form->field($model, 'keluhan_utama') ?>

    <?= $form->field($model, 'riwayat_alergi') ?>

    <?= $form->field($model, 'riwayat_kesehatan_dulu') ?>

    <?php // echo $form->field($model, 'riwayat_kesehatan_keluarga') ?>

    <?php // echo $form->field($model, 'kebiasaan') ?>

    <?php // echo $form->field($model, 'tekanan_darah') ?>

    <?php // echo $form->field($model, 'tinggi_badan') ?>

    <?php // echo $form->field($model, 'berat_badan') ?>

    <?php // echo $form->field($model, 'golongan_darah') ?>

    <?php // echo $form->field($model, 'buta_warna') ?>

    <?php // echo $form->field($model, 'anamnesa') ?>

    <?php // echo $form->field($model, 'nadi') ?>

    <?php // echo $form->field($model, 'pernafasan') ?>

    <?php // echo $form->field($model, 'suhu') ?>

    <div class="col-sm-2 col-xs-12">
        <?= Html::submitButton('<i class="fa fa-check"></i> Filter Data', ['class' => 'btn btn-primary btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
