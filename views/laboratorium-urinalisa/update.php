<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LaboratoriumUrinalisa */

$this->title = "Sunting Laboratorium Urinalisa";
$this->params['breadcrumbs'][] = ['label' => 'Laboratorium Urinalisas', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="laboratorium-urinalisa-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
