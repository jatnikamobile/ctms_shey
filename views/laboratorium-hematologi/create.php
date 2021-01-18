<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LaboratoriumHematologi */

$this->title = "Tambah Laboratorium Hematologi";
$this->params['breadcrumbs'][] = ['label' => 'Laboratorium Hematologis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laboratorium-hematologi-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
