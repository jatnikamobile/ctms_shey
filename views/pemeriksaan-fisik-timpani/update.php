<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikTimpani */

$this->title = "Sunting Pemeriksaan Fisik Timpani";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Fisik Timpanis', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="pemeriksaan-fisik-timpani-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
