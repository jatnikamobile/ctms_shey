<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KesimpulanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kesimpulan-search">

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

    <?= $form->field($model, 'id_diagnosa_kerja') ?>

    <?= $form->field($model, 'isi_kesimpulan') ?>

    <?= $form->field($model, 'saran') ?>

    <div class="col-sm-2 col-xs-12">
        <?= Html::submitButton('<i class="fa fa-check"></i> Filter Data', ['class' => 'btn btn-primary btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
