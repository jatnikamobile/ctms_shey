<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use app\models\DiagnosaKerja;
use app\models\Registrasi;

/* @var $this yii\web\View */
/* @var $model app\models\Kesimpulan */
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

<div class="kesimpulan-form box box-primary">

    <div class="box-header">
        <h3 class="box-title">Form Kesimpulan</h3>
    </div>
	<div class="box-body">

        <?= $form->errorSummary($model); ?>

        <?php // $form->field($model, 'id_registrasi')->textInput() ?>

        <?= $form->field($model, 'isi_kesimpulan')->textArea(['rows' => 6]) ?>

        <?= $form->field($model, 'saran')->textArea(['rows' => 6]) ?>

        <?= $form->field($model, 'id_diagnosa_kerja')->widget(Select2::classname(), [
            'data' =>  DiagnosaKerja::getList(),
            'options' => [
              'placeholder' => '- Pilih Diagnosa Kerja -',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>

        <?= Html::hiddenInput('referrer',$referrer); ?>

	</div>
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
