<?php

use app\models\Pemeriksaan;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pemeriksaan */
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

<div class="pemeriksaan-form box box-primary">

    <div class="box-header">
        <h3 class="box-title">Form Protokol</h3>
    </div>
	<div class="box-body">
        
        <?= $form->errorSummary($model); ?>

        <?= $form->field($model, 'id_induk')->widget(Select2::classname(), [
            'data' =>  Pemeriksaan::getListIndukPemeriksaan(),
            'options' => [
              'placeholder' => '- Pilih Induk Protokol -',
              'disabled' => true
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        
        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'status_bmi')->dropDownList([1 => 'Parameter 1', 2 => 'Parameter 2', 3 => 'Parameter 3'], ['prompt' => '-- Parameter --']); ?>

        <?= Html::hiddenInput('referrer',$referrer); ?>

	</div>
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
