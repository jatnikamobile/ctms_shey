<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LaboratoriumNarkobaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laboratorium-narkoba-search">

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

    <?= $form->field($model, 'methamphetamine') ?>

    <?= $form->field($model, 'cocain') ?>

    <?= $form->field($model, 'amphetamine') ?>

    <?php // echo $form->field($model, 'morphine') ?>

    <?php // echo $form->field($model, 'mariyuana') ?>

    <div class="col-sm-2 col-xs-12">
        <?= Html::submitButton('<i class="fa fa-check"></i> Filter Data', ['class' => 'btn btn-primary btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
