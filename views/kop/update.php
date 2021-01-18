<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kop */

$this->title = "Sunting Kop";
$this->params['breadcrumbs'][] = ['label' => 'Kop', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="kop-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
