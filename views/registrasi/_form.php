<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Pasien;
use app\models\Registrasi;
use app\models\Paket;
use app\models\Instansi;
use app\models\Unit;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use yii\web\JsExpression;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */
/* @var $form yii\widgets\ActiveForm */

$nama_pasien = '';

if (empty($model->pasien_id)) {
    $nama_pasien;
} else {
    $data = Pasien::find()->andWhere(['id' => $model->pasien_id])->one();
    $nama_pasien = @$data->nama;
}

?>

<?php $form = ActiveForm::begin([
    'layout'=>'default',
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
        <h3 class="box-title">Form Registrasi</h3>
    </div>
	<div class="box-body">

        <?= $form->errorSummary($model); ?>

        <?php //$form->field($model, 'no_registrasi')->textInput(['maxlength' => true]) ?>

        <?php /*echo $form->field($model, 'pasien_id')->widget(Select2::classname(), [
            'initValueText' => $nama_pasien, // set the initial display text
            'options' => ['placeholder' => 'Cari Pasien ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'minimumInputLength' => 3,
                'language' => [
                    'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                ],
                'ajax' => [
                    'url' => Url::to(['site/pasien-nik-list']),
                    'dataType' => 'json',
                    'data' => new JsExpression('function(params) { return {q:params.term}; }')
                ],
                'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                'templateResult' => new JsExpression('function(pasien_id) { return pasien_id.text; }'),
                'templateSelection' => new JsExpression('function (pasien_id) { return pasien_id.text; }'),
            ],
        ]);*/ ?>


        <?php /* $form->field($model, 'pasien_id')->widget(Select2::classname(), [
            'data' =>  Pasien::getList(),
            'options' => [
                'placeholder' => '- Pilih Pasien -',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);*/ ?>

        <?= $this->render('_form-pasien',[
            'form'=>$form,
            'model'=>$model
        ]); ?>


        <?= $form->field($model, 'paket_id')->widget(Select2::classname(), [
            'data' =>  Paket::getList(),
            'options' => [
              'placeholder' => '- Pilih Paket -',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        
        <?= $form->field($model, 'tanggal')->widget(DatePicker::class, [
                'removeButton' => false,
                'value' => date('Y-m-d'),
                'options' => ['placeholder' => 'Tanggal'],
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                ]
        ]) ?>

        <?= Html::hiddenInput('referrer',$referrer); ?>

	</div>
    <div class="box-footer">
        <div class="col-sm-offset-1 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>