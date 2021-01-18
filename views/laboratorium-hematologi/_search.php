<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LaboratoriumHematologiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laboratorium-hematologi-search">

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

    <?= $form->field($model, 'hemoglobin') ?>

    <?= $form->field($model, 'lekosit') ?>

    <?= $form->field($model, 'hematokrit') ?>

    <?php // echo $form->field($model, 'trombosit') ?>

    <?php // echo $form->field($model, 'eritrosit') ?>

    <?php // echo $form->field($model, 'hj_basofil') ?>

    <?php // echo $form->field($model, 'hj_eosinofil') ?>

    <?php // echo $form->field($model, 'hj_neutrofil_batang') ?>

    <?php // echo $form->field($model, 'hj_neutrofil_segment') ?>

    <?php // echo $form->field($model, 'hj_limfosit') ?>

    <?php // echo $form->field($model, 'hj_monosit') ?>

    <?php // echo $form->field($model, 'led') ?>

    <div class="col-sm-2 col-xs-12">
        <?= Html::submitButton('<i class="fa fa-check"></i> Filter Data', ['class' => 'btn btn-primary btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
