<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanSpirometry */

$this->title = "Sunting Pemeriksaan Spirometry";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Spirometries', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="pemeriksaan-spirometry-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
