<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\Helper;
use kartik\date\DatePicker;
use kartik\select2\Select2;

use app\models\Pasien;

/* @var $this yii\web\View */
/* @var $model app\models\RegistrasiSearch */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="registrasi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    
    <div class="box box-primary">
        <div class="box-body">
            <div class="row" style="margin-bottom:10px">
                <div class="col-sm-3 col-xs-12" style="padding-right: 0px !important;">
                    <?= $form->field($model, 'tanggal_awal')->widget(DatePicker::className(), [
                        'value' => date('Y-m-d'),
                        'options' => ['placeholder' => 'Tanggal Awal'],
                        'pluginOptions' => [
                            'autoclose'=>true,
                            'allowClear' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ])->label(false) ?>
                </div>
                <div class="col-sm-3 col-xs-12" style="padding-right: 0px !important;">
                    <?= $form->field($model, 'tanggal_akhir')->widget(DatePicker::className(), [
                        'value' => date('Y-m-d'),
                        'options' => ['placeholder' => 'Tanggal Akhir'],
                        'pluginOptions' => [
                            'autoclose'=>true,
                            'allowClear' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ])->label(false) ?>
                </div>
                <div class="col-sm-3">
                    <?= Html::submitButton('<i class="fa fa-check"></i> Filter Data', ['class' => 'btn btn-primary btn-flat']) ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
