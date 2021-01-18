<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LaboratoriumImunoserologi */

$this->title = "Sunting Laboratorium Imunoserologi";
$this->params['breadcrumbs'][] = ['label' => 'Laboratorium Imunoserologis', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="laboratorium-imunoserologi-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
