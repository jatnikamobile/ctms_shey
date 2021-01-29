<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Petugas */

$this->title = "Sunting Parameter";
$this->params['breadcrumbs'][] = ['label' => 'Parameter', 'url' => ['templet-form/view','id'=>$model->id_form]];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="petugas-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
