<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikThorax */

$this->title = "Sunting Pemeriksaan Fisik Thorax";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Fisik Thoraxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="pemeriksaan-fisik-thorax-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
