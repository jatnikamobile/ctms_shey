<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LaboratoriumUrinalisaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laboratorium-urinalisa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    
    <div class="box box-primary">
        <div class="box-body">

        </div>
    </div>
        <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_laboratorium') ?>

    <?= $form->field($model, 'ph') ?>

    <?= $form->field($model, 'berat_jenis') ?>

    <?= $form->field($model, 'protein') ?>

    <?php // echo $form->field($model, 'reduksi') ?>

    <?php // echo $form->field($model, 'bilirubin') ?>

    <?php // echo $form->field($model, 'urobilinogen') ?>

    <?php // echo $form->field($model, 'nitrit') ?>

    <?php // echo $form->field($model, 'keton') ?>

    <?php // echo $form->field($model, 'darah') ?>

    <?php // echo $form->field($model, 'mk_leukosit') ?>

    <?php // echo $form->field($model, 'mk_eritrosit') ?>

    <?php // echo $form->field($model, 'mk_silender') ?>

    <?php // echo $form->field($model, 'mk_epithel') ?>

    <?php // echo $form->field($model, 'mk_kristal') ?>

    <?php // echo $form->field($model, 'mk_lainlain') ?>

    <div class="col-sm-2 col-xs-12">
        <?= Html::submitButton('<i class="fa fa-check"></i> Filter Data', ['class' => 'btn btn-primary btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
