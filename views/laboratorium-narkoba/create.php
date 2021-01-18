<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LaboratoriumNarkoba */

$this->title = "Tambah Laboratorium Narkoba";
$this->params['breadcrumbs'][] = ['label' => 'Laboratorium Narkobas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laboratorium-narkoba-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
