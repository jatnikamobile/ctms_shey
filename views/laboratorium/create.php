<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Laboratorium */

$this->title = "Tambah Laboratorium";
$this->params['breadcrumbs'][] = ['label' => 'Laboratorium', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laboratorium-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
