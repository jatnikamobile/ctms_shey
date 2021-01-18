<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanUsgSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemeriksaan-usg-search">

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

    <?= $form->field($model, 'hati') ?>

    <?= $form->field($model, 'kgb') ?>

    <?= $form->field($model, 'empedu') ?>

    <?php // echo $form->field($model, 'limpa') ?>

    <?php // echo $form->field($model, 'pankreas') ?>

    <?php // echo $form->field($model, 'ginjal') ?>

    <?php // echo $form->field($model, 'kemih') ?>

    <?php // echo $form->field($model, 'lainlain') ?>

    <?php // echo $form->field($model, 'kesimpulan') ?>

    <div class="col-sm-2 col-xs-12">
        <?= Html::submitButton('<i class="fa fa-check"></i> Filter Data', ['class' => 'btn btn-primary btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
