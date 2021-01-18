<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dokter */

$this->title = "Sunting Dokter";
$this->params['breadcrumbs'][] = ['label' => 'Dokter', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="dokter-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
