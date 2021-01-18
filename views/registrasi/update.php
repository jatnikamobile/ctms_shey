<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */

$this->title = "Sunting Registrasi";
$this->params['breadcrumbs'][] = ['label' => 'Registrasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="registrasi-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
