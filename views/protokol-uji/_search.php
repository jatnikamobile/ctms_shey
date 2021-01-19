<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Instansi;
use app\models\Paket;
use kartik\date\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\RegistrasiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="registrasi-search">

    <?php $form = ActiveForm::begin([
        'id' => 'search-form',
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    
    <div class="box box-primary">
        <div class="box-body">
            <div class="row" style="margin-bottom:10px; margin-right:0;">
                <div class="col-sm-4 col-xs-12" style="padding-right: 0px !important;">
                    <?= $form->field($model, 'tanggal_awal')->widget(DatePicker::class, [
                        'value' => date('Y-m-d'),
                        'options' => ['placeholder' => 'Tanggal Awal'],
                        'pluginOptions' => [
                            'autoclose'=>true,
                            'allowClear' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ])->label('Tanggal') ?>
                </div>
                <div class="col-sm-4 col-xs-12" style="padding-right:0;">
                    <label>&nbsp;</label>
                    <?= $form->field($model, 'tanggal_akhir')->widget(DatePicker::class, [
                        'value' => date('Y-m-d'),
                        'options' => ['placeholder' => 'Tanggal Akhir'],
                        'pluginOptions' => [
                            'autoclose'=>true,
                            'allowClear' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ])->label(false) ?>
                </div>
                <div class="col-sm-4 col-xs-12" style="padding-right:0">
                   <?= $form->field($model, 'nama') ?>
                </div>
                <div class="col-sm-4 col-xs-12" style="padding-right:0">
                    <?= $form->field($model, 'id_instansi')->widget(Select2::class, [
                        'data' => Instansi::getList(),
                        'options' => ['placeholder' => '-- Pilih --'],
                    ]) ?>
                </div>
                <div class="col-sm-4 col-xs-12" style="padding-right:0">
                    <?= $form->field($model, 'id_paket')->widget(Select2::class, [
                        'data' => Paket::getList(),
                        'options' => ['placeholder' => '-- Pilih --'],
                    ]) ?>
                </div>
                <div class="col-sm-4 col-xs-12" style="padding-right:0">
                    <?= $form->field($model, 'phase')->dropDownList(['-- Pilih --',1,2,3]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <?= Html::submitButton('<i class="fa fa-check"></i> Filter Data', ['class' => 'btn btn-primary btn-flat']) ?>
                    <?= Html::button('<i class="fa fa-times"></i> Hapus', ['class' => 'btn btn-default clear btn-flat']) ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$this->registerCss("
    .select2-container--krajee .select2-selection {border-radius:0 !important}
");
