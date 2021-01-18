<?php

use app\models\Paket;
use app\models\Pemeriksaan;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PaketPemeriksaan */
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

<div class="paket-pemeriksaan-form box box-primary">

    <div class="box-header">
        <h3 class="box-title">Form Protokol Uji</h3>
    </div>
	<div class="box-body">

        <?= $form->errorSummary($model); ?>

        <?= $form->field($model, 'id_paket')->widget(Select2::classname(), [
            'data' =>  Paket::getList(),
            'options' => [
              'placeholder' => '- Pilih Paket -',
              'disabled' => true
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>

        <?= $form->field($model, 'id_pemeriksaan')->widget(Select2::classname(), [
            'data' =>  Pemeriksaan::getListIndukPemeriksaan(),
            'options' => [
              'placeholder' => '- Pilih Pemeriksaan -',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>

        <div class="row">
            <div class="col-sm-8">
                <?= $form->field($model, 'status_kesimpulan')->checkbox()->label('Masukan Ke Kesimpulan'); ?>
            </div>
        </div>


        <?= Html::hiddenInput('referrer',$referrer); ?>

	</div>
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
