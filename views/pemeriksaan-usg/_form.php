<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanUsg */
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

<div class="pemeriksaan-usg-form box box-primary">

    <div class="box-header">
        <h3 class="box-title">Form Pemeriksaan Usg</h3>
    </div>
	<div class="box-body">

        <?= $form->errorSummary($model); ?>

        <?php // $form->field($model, 'id_registrasi')->textInput() ?>

        <?= $form->field($model, 'hati')->textArea(['rows' => 6]) ?>

        <?= $form->field($model, 'kgb')->inline(true)
        ->radioList([ 
            'Normal' => 'Normal', 
            'Membesar' => 'Membesar' 
        ]) ?>

        <?= $form->field($model, 'empedu')->textArea(['rows' => 6]) ?>

        <?= $form->field($model, 'limpa')->textArea(['rows' => 6]) ?>

        <?= $form->field($model, 'pankreas')->textArea(['rows' => 6]) ?>

        <?= $form->field($model, 'ginjal')->textArea(['rows' => 6]) ?>

        <?= $form->field($model, 'kemih')->textArea(['rows' => 6]) ?>

        <?= $form->field($model, 'lainlain')->textArea(['rows' => 6]) ?>

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
