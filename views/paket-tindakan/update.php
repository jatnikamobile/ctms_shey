<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PaketTindakan */

$this->title = "Sunting Paket Tindakan";
$this->params['breadcrumbs'][] = ['label' => 'Paket Tindakans', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="paket-tindakan-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
