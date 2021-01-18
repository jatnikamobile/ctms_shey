<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LaboratoriumUrinalisa */

$this->title = "Tambah Laboratorium Urinalisa";
$this->params['breadcrumbs'][] = ['label' => 'Laboratorium Urinalisas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laboratorium-urinalisa-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
