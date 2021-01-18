<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanTreadmillSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemeriksaan-treadmill-search">

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

    <?= $form->field($model, 'metode') ?>

    <?= $form->field($model, 'jantung') ?>

    <?= $form->field($model, 'kf_poor') ?>

    <?php // echo $form->field($model, 'kf_fair') ?>

    <?php // echo $form->field($model, 'kf_average') ?>

    <?php // echo $form->field($model, 'kf_good') ?>

    <?php // echo $form->field($model, 'kf_excelent') ?>

    <?php // echo $form->field($model, 'klasifikasi_fungsional_1') ?>

    <?php // echo $form->field($model, 'klasifikasi_fungsional_2') ?>

    <?php // echo $form->field($model, 'klasifikasi_fungsional_3') ?>

    <?php // echo $form->field($model, 'denyut_nadi_awal') ?>

    <?php // echo $form->field($model, 'denyut_nadi_akhir') ?>

    <?php // echo $form->field($model, 'td_sistolik_awal') ?>

    <?php // echo $form->field($model, 'td_diastolik_awal') ?>

    <?php // echo $form->field($model, 'td_sistolik_akhir') ?>

    <?php // echo $form->field($model, 'td_diastolik_akhir') ?>

    <?php // echo $form->field($model, 'stop_treadmill') ?>

    <?php // echo $form->field($model, 'resume_hasil') ?>

    <?php // echo $form->field($model, 'max') ?>

    <?php // echo $form->field($model, 'submax') ?>

    <div class="col-sm-2 col-xs-12">
        <?= Html::submitButton('<i class="fa fa-check"></i> Filter Data', ['class' => 'btn btn-primary btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
