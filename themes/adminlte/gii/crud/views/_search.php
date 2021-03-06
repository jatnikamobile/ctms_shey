<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->searchModelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-search">

    <?= "<?php " ?>$form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    
    <div class="box box-primary">
        <div class="box-body">

        </div>
    </div>
    <?php
        $count = 0;
        foreach ($generator->getColumnNames() as $attribute) {
            if (++$count < 6) {
                echo "    <?= " . $generator->generateActiveSearchField($attribute) . " ?>\n\n";
            } else {
                echo "    <?php // echo " . $generator->generateActiveSearchField($attribute) . " ?>\n\n";
            }
        }
    ?>
    <div class="col-sm-2 col-xs-12">
        <?= "<?= " ?>Html::submitButton('<i class="fa fa-check"></i> Filter Data', ['class' => 'btn btn-primary btn-flat']) ?>
    </div>

    <?= "<?php " ?>ActiveForm::end(); ?>

</div>
