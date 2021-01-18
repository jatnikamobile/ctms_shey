<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanTreadmill */

$this->title = "Sunting Pemeriksaan Treadmill";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Treadmills', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="pemeriksaan-treadmill-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
