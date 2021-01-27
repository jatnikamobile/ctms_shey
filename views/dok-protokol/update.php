<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pasien */

$this->title = "Sunting Pasien";
$this->params['breadcrumbs'][] = ['label' => 'Pasien', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="pasien-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
