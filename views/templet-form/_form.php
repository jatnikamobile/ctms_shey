<?php

use app\models\Parameter;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/** @var yii\web\View  $this */
/** @var app\models\Paket  $model */
/** @var yii\widgets\ActiveForm $form  */
$param = new Parameter();
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
]) ?>

    <div class="paket-form box box-primary">
        <div class="box-header">
            <h3 class="box-title">Templet Form</h3>
        </div>

        <div class="box-body">
            <?= $form->field($model, 'kode') ?>
            <?= $form->field($model, 'nama') ?>
            <?= Html::hiddenInput('referrer',$referrer); ?>
            <div class="row">
                <div class="col-sm-offset-2 col-sm-4">
                    <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
                    <?= Html::a('<i class="fa fa-times"></i> Batal', $referrer, ['class' => 'btn btn-default btn-flat']) ?>
                </div>
            </div>
        </div>
    </div>

<?php ActiveForm::end(); ?>
