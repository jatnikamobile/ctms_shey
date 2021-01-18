<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanTreadmill */
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

<div class="pemeriksaan-treadmill-form box box-primary">

    <div class="box-header">
        <h3 class="box-title">Form Pemeriksaan Treadmill</h3>
    </div>
	<div class="box-body">

        <?= $form->errorSummary($model); ?>
    <div class="row">
        <div class="col-sm-6">
        <?php // $form->field($model, 'id_registrasi')->textInput() ?>

        <?= $form->field($model, 'metode', [
            'horizontalCssClasses' => [
                    'label' => 'col-sm-2',
                    'wrapper' => 'col-sm-6',
                    'error' => '',
                    'hint' => '',
                ],
            ])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'jantung', [
            'horizontalCssClasses' => [
                    'label' => 'col-sm-2',
                    'wrapper' => 'col-sm-7',
                    'error' => '',
                    'hint' => '',
                ],
            ]
            )->radioList([ 
                'Negatif' => 'Negatif', 
                '+ Ringan' => '+ Ringan', 
                '+ Sedang' => '+ Sedang',
                '+ Parah' => '+ Parah', 
            ], [
                'inline' => true
            ]
            ) ?>

        <?= $form->field($model, 'kf_poor', [
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-6',
                'error' => '',
                'hint' => '',
            ],
            'addon' => ['append' => ['content' => 'Mets']]
            ])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'kf_fair', [
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-6',
                'error' => '',
                'hint' => '',
            ],
            'addon' => ['append' => ['content' => 'Mets']]
            ])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'kf_average', [
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-6',
                'error' => '',
                'hint' => '',
            ],
            'addon' => ['append' => ['content' => 'Mets']]
            ])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'kf_good', [
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-6',
                'error' => '',
                'hint' => '',
            ],
            'addon' => ['append' => ['content' => 'Mets']]
            ])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'kf_excelent', [
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-6',
                'error' => '',
                'hint' => '',
            ],
            'addon' => ['append' => ['content' => 'Mets']]
            ])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'klasifikasi_fungsional_1', [
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-6',
                'error' => '',
                'hint' => '',
            ],
            ])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'klasifikasi_fungsional_2', [
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-6',
                'error' => '',
                'hint' => '',
            ],
            ])->textInput(['maxlength' => true], [
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-6',
                'error' => '',
                'hint' => '',
            ],
            ]) ?>

        <?= $form->field($model, 'klasifikasi_fungsional_3', [
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-6',
                'error' => '',
                'hint' => '',
            ],
            ])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'stop_treadmill', [
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-6',
                'error' => '',
                'hint' => '',
            ],
            ])->textArea(['rows' => 6]) ?>

        <?= $form->field($model, 'resume_hasil', [
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-6',
                'error' => '',
                'hint' => '',
            ],
            ])->textArea(['rows' => 6]) ?>

    </div>
    <div class="row">
        <div class="col-sm-6">
        <?= $form->field($model, 'denyut_nadi_awal', [
            'horizontalCssClasses' => [
                'label' => 'col-sm-3',
                'wrapper' => 'col-sm-6',
            ],
            'addon' => ['append' => ['content' => '/']]
            ])->textInput([
                'type' => 'number',
                'min' => 0
            ]) ?>

        <?= $form->field($model, 'denyut_nadi_akhir', [
            'horizontalCssClasses' => [
                'label' => 'col-sm-3',
                'wrapper' => 'col-sm-6',
            ],
            'addon' => ['append' => ['content' => '/']]
            ])->textInput([
                'type' => 'number',
                'min' => 0
            ]) ?>

        <?= $form->field($model, 'td_sistolik_awal', [
            'horizontalCssClasses' => [
                'label' => 'col-sm-3',
                'wrapper' => 'col-sm-6',
            ],
            'addon' => ['append' => ['content' => '/']]
            ])->textInput([
                'type' => 'number',
                'min' => 0
            ]) ?>

        <?= $form->field($model, 'td_diastolik_awal', [
            'horizontalCssClasses' => [
                'label' => 'col-sm-3',
                'wrapper' => 'col-sm-6',
            ],
            'addon' => ['append' => ['content' => 'MM/Hg']]
            ])->textInput([
                'type' => 'number',
                'min' => 0
            ]) ?>
        <?= $form->field($model, 'td_sistolik_akhir', [
            'horizontalCssClasses' => [
                'label' => 'col-sm-3',
                'wrapper' => 'col-sm-6',
            ],
            'addon' => ['append' => ['content' => '/']]
            ])->textInput([
                'type' => 'number',
                'min' => 0
            ]) ?>

        <?= $form->field($model, 'td_diastolik_akhir', [
            'horizontalCssClasses' => [
                'label' => 'col-sm-3',
                'wrapper' => 'col-sm-6',
            ],
            'addon' => ['append' => ['content' => 'MM/Hg']]
            ])->textInput([
                'type' => 'number',
                'min' => 0
            ]) ?>

        <?= $form->field($model, 'max', [
            'horizontalCssClasses' => [
                'label' => 'col-sm-3',
                'wrapper' => 'col-sm-6',
            ],
            'addon' => ['append' => ['content' => 'HR']]
            ])->textInput([
                'type' => 'number',
                'min' => 0
            ]) ?>

        <?= $form->field($model, 'submax', [
            'horizontalCssClasses' => [
                'label' => 'col-sm-3',
                'wrapper' => 'col-sm-6',
            ],
            'addon' => ['append' => ['content' => 'HR']]
            ])->textInput([
                'type' => 'number',
                'min' => 0
            ]) ?>

        <?= Html::hiddenInput('referrer',$referrer); ?>
    </div>
	</div>
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
