<?php

use app\models\Dokter;
use app\models\Pemeriksaan;
use app\models\PemeriksaanRincian;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanRincian */
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

<div class="pemeriksaan-rincian-form box box-primary">

    <div class="box-header">
        <h3 class="box-title">Form Pemeriksaan Rincian</h3>
    </div>
	<div class="box-body">

        <?= $form->errorSummary($model); ?>

        <?= $form->field($model, 'id_pemeriksaan')->widget(Select2::classname(), [
            'data' =>  Pemeriksaan::getList(),
            'options' => [
              'placeholder' => '- Pilih Pemeriksaan -',
              'disabled' => true
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>

        <?= $form->field($model, 'id_induk')->widget(Select2::classname(), [
            'data' =>  PemeriksaanRincian::getListIndukPemeriksaanRincian(),
            'options' => [
              'placeholder' => '- Pilih Induk Pemeriksaan Rincian -',
              'disabled' => true
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>

        <?= $form->field($model, 'rincian_jenis')->dropDownList(PemeriksaanRincian::getListRincianJenis(), ['class' => 'rincian_jenis form-control']); ?>

        <?= $form->field($model, 'nama')->textInput() ?>


        <div class="uraian-form">
            <?= $form->field($model, 'append')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'default_value')->textInput(['option' => 'value']); ?>

            <?= $form->field($model, 'nilai_rujukan')->textarea(); ?>
        </div>



        <?= Html::hiddenInput('referrer',$referrer); ?>

	</div>
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

</div>

<script>
    function refreshMenuItemType()
    {
        $('.uraian-form').hide();
        $('.dokter-form').hide();
        var type = $('.rincian_jenis').val();

        if (type == 2) {
            $('.uraian-form').show();
        }

        if (type == 5) { // PEMERIKSAAN DOKTER
            $('#pemeriksaanrincian-nama').val('Dokter Pemeriksa');
            
        }        
    }

    $(document).ready(function() {
        refreshMenuItemType();
    });

    $('.rincian_jenis').change(function() {
        refreshMenuItemType();
    });
</script>


<?php ActiveForm::end(); ?>
