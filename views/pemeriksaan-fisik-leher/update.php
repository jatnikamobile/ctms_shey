<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikLeher */

$this->title = "Sunting Pemeriksaan Fisik Leher";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Fisik Lehers', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="pemeriksaan-fisik-leher-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
