<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LaboratoriumHematologi */

$this->title = "Sunting Laboratorium Hematologi";
$this->params['breadcrumbs'][] = ['label' => 'Laboratorium Hematologis', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="laboratorium-hematologi-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
