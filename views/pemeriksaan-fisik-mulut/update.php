<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikMulut */

$this->title = "Sunting Pemeriksaan Fisik Mulut";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Fisik Muluts', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="pemeriksaan-fisik-mulut-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
