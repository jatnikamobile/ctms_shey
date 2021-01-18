<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Radiologi */

$this->title = "Sunting Radiologi";
$this->params['breadcrumbs'][] = ['label' => 'Radiologi', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="radiologi-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
