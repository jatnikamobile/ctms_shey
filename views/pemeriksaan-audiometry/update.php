<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanAudiometry */

$this->title = "Sunting Pemeriksaan Audiometry";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Audiometries', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="pemeriksaan-audiometry-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
