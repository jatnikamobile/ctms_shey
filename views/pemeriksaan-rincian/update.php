<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanRincian */

$this->title = "Sunting Pemeriksaan Rincian";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Rincians', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="pemeriksaan-rincian-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
