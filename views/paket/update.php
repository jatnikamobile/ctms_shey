<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Paket */

$this->title = "Sunting Paket";
$this->params['breadcrumbs'][] = ['label' => 'Pakets', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="paket-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
