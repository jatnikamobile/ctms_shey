<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanAudiometry */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'layout'=>'horizontal',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-sm-2',
            'wrapper' => 'col-sm-4',
            'error' => '',
            'hint' => '',
        ],
    ]
]); ?>

<div class="pemeriksaan-audiometry-form box box-primary">

    <div class="box-header">
        <h3 class="box-title">Form Pemeriksaan Audiometry</h3>
    </div>
	<div class="box-body">

        <?= $form->errorSummary($model); ?>

        <?php // $form->field($model, 'id_registrasi')->textInput() ?>

        <?= $form->field($model, 'l1000')
        ->textInput([
            'type' => 'number',
            'min' => 0
        ]) ?>

        <?= $form->field($model, 'l4000')
        ->textInput([
            'type' => 'number',
            'min' => 0
        ]) ?>

        <?= $form->field($model, 'r1000')->textInput([
            'type' => 'number',
            'min' => 0
        ]) ?>

        <?= $form->field($model, 'r4000')->textInput([
            'type' => 'number',
            'min' => 0
        ]) ?>

        <?= $form->field($model, 'selisih')->textInput([
            'type' => 'number',
            'min' => 0
        ]) ?>

        <?= $form->field($model, 'nih')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'uraian')->textArea(['rows' => 6]) ?>

        <?= $form->field($model, 'kesimpulan')->textArea(['rows' => 6]) ?>

        <?= Html::hiddenInput('referrer',$referrer); ?>

	</div>
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
