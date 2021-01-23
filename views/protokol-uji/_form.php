<?php

use app\models\Instansi;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Pasien;
use app\models\Paket;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */
/* @var $form yii\widgets\ActiveForm */
$referrer = $_POST['referrer'] ?? Yii::$app->request->referrer ?? Url::to(['index']);
?>

<?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
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

<div class="registrasi-form box box-primary">

    <div class="box-header">
        <h3 class="box-title">Form Registrasi Protokol</h3>
    </div>
	<div class="box-body">

        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($model, 'id',
                        [
                            'horizontalCssClasses' => [
                                'label' => 'col-sm-4',
                                'wrapper' => 'col-sm-8',
                                'error' => '',
                                'hint' => '',
                        ],
                    ])->textInput(['maxlength' => true, 'disabled' => 1])->label('No.') ?>

                <?= $form->field($model, 'nama',
                    [
                        'horizontalCssClasses' => [
                            'label' => 'col-sm-4',
                            'wrapper' => 'col-sm-8',
                            'error' => '',
                            'hint' => '',
                        ],
                    ])->label('Nama Protokol')
                ?>
                <?= $form->field($model, 'id_instansi',
                    [
                        'horizontalCssClasses' => [
                            'label' => 'col-sm-4',
                            'wrapper' => 'col-sm-8',
                            'error' => '',
                            'hint' => '',
                        ],
                    ])->widget(Select2::class, [
                        'data' =>  Instansi::getList(),
                        'options' => [
                            'placeholder' => '- Pilih Instansi -',
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label('Klinik Penguji'); ?>

                <?= $form->field($model, 'deskripsi',
                    [
                        'horizontalCssClasses' => [
                            'label' => 'col-sm-4',
                            'wrapper' => 'col-sm-8',
                            'error' => '',
                            'hint' => '',
                        ],
                    ])->textarea()->label('Protokol Uji') ?>

                <?php
                $model->tanggal = date('Y-m-d', $model->tanggal ? strtotime($model->tanggal) : time());
                echo $form->field($model, 'tanggal', [
                                'horizontalCssClasses' => [
                                    'label' => 'col-sm-4',
                                    'wrapper' => 'col-sm-8',
                                    'error' => '',
                                    'hint' => '',
                                ],            
                ])->widget(DatePicker::class, [
                        'removeButton' => false,
                        'options' => ['placeholder' => 'Tanggal'],
                        'pluginOptions' => [
                            'autoclose'=>true,
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true,
                        ],
                ]) ?>

                <?= Html::hiddenInput('referrer',$referrer); ?>
                <div class="row">
                    <div class="col-sm-offset-4 col-sm-8">
                        <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
                        <?= Html::a('<i class="fa fa-times"></i> Batal', $referrer, ['class' => 'btn btn-default btn-flat']) ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
