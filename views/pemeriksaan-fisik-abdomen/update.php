<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikAbdomen */

$this->title = "Sunting Pemeriksaan Fisik Abdomen";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Fisik Abdomens', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="pemeriksaan-fisik-abdomen-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
