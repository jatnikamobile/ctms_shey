<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisik */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'type' => ActiveForm::TYPE_HORIZONTAL,
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

<div class="pemeriksaan-fisik-form box box-primary">

    <div class="box-header">
        <h3 class="box-title">Form Pemeriksaan Fisik</h3>
    </div>
	<div class="box-body">

        <?= $form->errorSummary($model); ?>
    <div class="row">
        <div class="col-sm-6">

            <?php // $form->field($model, 'no_registrasi')->textInput() ?>

            <?= $form->field($model, 'keluhan_utama', 
                [
                    'horizontalCssClasses' => [
                        'label' => 'col-sm-4',
                        'wrapper' => 'col-sm-8',
                        'error' => '',
                        'hint' => '',
                ],
            ])->textArea(['maxlength' => true]) ?>

            <?= $form->field($model, 'riwayat_alergi', [
                'horizontalCssClasses' => [
                        'label' => 'col-sm-4',
                        'wrapper' => 'col-sm-8',
                        'error' => '',
                        'hint' => '',
                    ],
            ])->textArea(['maxlength' => true]) ?>

            <?= $form->field($model, 'riwayat_kesehatan_dulu', [
                'horizontalCssClasses' => [
                        'label' => 'col-sm-4',
                        'wrapper' => 'col-sm-8',
                        'error' => '',
                        'hint' => '',
                    ],
            ])->textArea(['maxlength' => true]) ?>

            <?= $form->field($model, 'riwayat_kesehatan_keluarga', [
                'horizontalCssClasses' => [
                        'label' => 'col-sm-4',
                        'wrapper' => 'col-sm-8',
                        'error' => '',
                        'hint' => '',
                    ],
            ])->textArea(['maxlength' => true]) ?>

            <?= $form->field($model, 'kebiasaan', [
                'horizontalCssClasses' => [
                        'label' => 'col-sm-4',
                        'wrapper' => 'col-sm-8',
                        'error' => '',
                        'hint' => '',
                    ],
            ])->textArea(['maxlength' => true]) ?>

            <?= $form->field($model, 'anamnesa', [
                'horizontalCssClasses' => [
                        'label' => 'col-sm-4',
                        'wrapper' => 'col-sm-8',
                        'error' => '',
                        'hint' => '',
                    ],
            ])->textArea(['rows' => 6]) ?>

        </div>

        <div class="col-sm-6">

            <?= $form->field($model, 'sistolik',[
                'horizontalCssClasses' => [
                    'label' => 'col-sm-4',
                    'wrapper' => 'col-sm-8',
                ],
                'addon' => ['append' => ['content' => '/']]
            ])->textInput([
                'type' => 'number',
                'min' => 0
            ]) ?>

            <?= $form->field($model, 'diastolik',[
                'horizontalCssClasses' => [
                    'label' => 'col-sm-4',
                    'wrapper' => 'col-sm-8',
                ],
                'addon' => ['append' => ['content' => 'MM/Hg']]
            ])->textInput([
                'type' => 'number',
                'min' => 0
            ]) ?>

            <?= $form->field($model, 'tinggi_badan',[
                'horizontalCssClasses' => [
                    'label' => 'col-sm-4',
                    'wrapper' => 'col-sm-8',
                ],
                'addon' => ['append' => ['content' => 'Cm']]
            ])->textInput([
                'type' => 'number',
                'min' => 0
            ]) ?>

            <?= $form->field($model, 'berat_badan',[
                'horizontalCssClasses' => [
                    'label' => 'col-sm-4',
                    'wrapper' => 'col-sm-8',
                ],
                'addon' => ['append' => ['content' => 'Kg']]
            ])->textInput([
                'type' => 'number',
                'min' => 0
            ]) ?>

            <?= $form->field($model, 'nadi',[
                'horizontalCssClasses' => [
                    'label' => 'col-sm-4',
                    'wrapper' => 'col-sm-8',
                ],
                'addon' => ['append' => ['content' => '/Menit']]
            ])->textInput([
                'type' => 'number',
                'min' => 0
            ]) ?>

            <?= $form->field($model, 'pernafasan',[
                'horizontalCssClasses' => [
                    'label' => 'col-sm-4',
                    'wrapper' => 'col-sm-8',
                ],
                'addon' => ['append' => ['content' => '/Menit']]
            ])->textInput([
                'type' => 'number',
                'min' => 0
            ]) ?>

            <?= $form->field($model, 'suhu',[
                'horizontalCssClasses' => [
                    'label' => 'col-sm-4',
                    'wrapper' => 'col-sm-8',
                ],
                'addon' => ['append' => ['content' => 'C']]
            ])->textInput([
                'type' => 'number',
                'min' => 0
            ]) ?>

            <?= $form->field($model, 'golongan_darah',[
                'horizontalCssClasses' => [
                    'label' => 'col-sm-4',
                    'wrapper' => 'col-sm-8',
                ],
            ])->dropDownList([ 'A' => 'A', 'B' => 'B', 'AB' => 'AB', 'O' => 'O', ], ['prompt' => '- Pilih Golongan Darah -']) ?>

            <?= $form->field($model, 'buta_warna',[
                'horizontalCssClasses' => [
                    'label' => 'col-sm-4',
                    'wrapper' => 'col-sm-8',
                ],
            ])->dropDownList([ 'Buta Warna' => 'Buta Warna', 'Tidak Buta Warna' => 'Tidak Buta Warna', ], ['prompt' => '- Pilih Buta Warna -']) ?>


        </div>

        <?= Html::hiddenInput('referrer',$referrer); ?>
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
