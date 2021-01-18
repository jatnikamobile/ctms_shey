<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Laboratorium */

$this->title = "Sunting Laboratorium";
$this->params['breadcrumbs'][] = ['label' => 'Laboratorium', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="laboratorium-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
