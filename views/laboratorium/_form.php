<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Laboratorium */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'type'=>'horizontal',
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

<div class="laboratorium-form box box-primary">

    <div class="box-header">
        <h3 class="box-title">Form Laboratorium</h3>
    </div>
	<div class="box-body">

        <?= $form->errorSummary($model); ?>

        <?php // $form->field($model, 'id_registrasi')->textInput() ?>

        <?= $form->field($model, 'hasil_pemeriksaan')->dropDownList([ 'Normal' => 'Normal', 'Dalam Batas Normal' => 'Dalam Batas Normal' ,'Abnormal' => 'Abnormal', ], ['prompt' => '- Pilih Hasil Pemeriksaan -']) ?>
        <?= Html::hiddenInput('referrer',$referrer); ?>

	</div>
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

</div>

<div class="pemeriksaan-fisik-form box box-primary">
    <div class="box-body">

        <?= $this->render('_form-tab',[
            'form'=>$form,
            'model'=>$model
        ]); ?>

    </div>
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
