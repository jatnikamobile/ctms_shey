<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PaketPemeriksaan */

$this->title = "Sunting Paket Pemeriksaan";
$this->params['breadcrumbs'][] = ['label' => 'Paket Pemeriksaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="paket-pemeriksaan-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
