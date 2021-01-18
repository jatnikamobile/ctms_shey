<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LaboratoriumKimiaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laboratorium-kimia-search">

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

    <?= $form->field($model, 'faal_hati_sgot') ?>

    <?= $form->field($model, 'faal_hati_sgpt') ?>

    <?= $form->field($model, 'lemak_kolesterol_total') ?>

    <?php // echo $form->field($model, 'lemak_trigliserida') ?>

    <?php // echo $form->field($model, 'lemak_kolesterol_hdl') ?>

    <?php // echo $form->field($model, 'lemak_kolesterol_ldl') ?>

    <?php // echo $form->field($model, 'diabetes_glukosa_puasa') ?>

    <?php // echo $form->field($model, 'diabetes_glukosa_2_jam') ?>

    <?php // echo $form->field($model, 'diabetes_gamma_gt') ?>

    <div class="col-sm-2 col-xs-12">
        <?= Html::submitButton('<i class="fa fa-check"></i> Filter Data', ['class' => 'btn btn-primary btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
