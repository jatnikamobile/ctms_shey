<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LaboratoriumNarkoba */

$this->title = "Sunting Laboratorium Narkoba";
$this->params['breadcrumbs'][] = ['label' => 'Laboratorium Narkobas', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="laboratorium-narkoba-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
