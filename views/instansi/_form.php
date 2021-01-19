<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Instansi */
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

<div class="instansi-form box box-primary">

    <div class="box-header">
        <h3 class="box-title">Form Sponsor</h3>
    </div>
	<div class="box-body">

        <?= $form->errorSummary($model); ?>

        <!-- <?= $form->field($model, 'kode')->textInput(['maxlength' => 4]) ?> -->

        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
        
        <?php if ($model->isNewRecord){ ?>
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'password_konfirmasi')->passwordInput(['maxlength' => true]) ?>
        <?php } ?>
        <?= Html::hiddenInput('referrer',$referrer); ?>

	</div>
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
