<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use app\models\Instansi;
use app\models\Unit;
use app\models\Pendidikan;
use app\models\Agama;
use app\models\Pekerjaan;
use app\models\Wilayah;

/* @var $this yii\web\View */
/* @var $model app\models\Pasien */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'enableAjaxValidation' => false,
    'enableClientValidation' => false,
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-sm-3',
            'wrapper' => 'col-sm-9',
            'error' => '',
            'hint' => '',
        ],
    ]
]); ?>

<div class="pasien-form box box-primary">

    <div class="box-header">
        <h3 class="box-title">Form Dokumen</h3>
    </div>
    <div class="box-body">
        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'file')->fileInput() ?>
        <?= Html::activeHiddenInput($model, 'id_protokol') ?>
        <?= Html::hiddenInput('referrer', $referrer); ?>
    </div>

    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9" style="text-align: left;">
                <?= Html::submitButton('<i class="fa fa-check"></i> Simpan', ['class' => 'btn btn-sm btn-success btn-flat']) ?>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
