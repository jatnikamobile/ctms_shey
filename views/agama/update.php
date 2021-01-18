<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Agama */

$this->title = "Sunting Agama";
$this->params['breadcrumbs'][] = ['label' => 'Agamas', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="agama-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
