<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikMata */

$this->title = "Sunting Pemeriksaan Fisik Mata";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Fisik Matas', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="pemeriksaan-fisik-mata-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
