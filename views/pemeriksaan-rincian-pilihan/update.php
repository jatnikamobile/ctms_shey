<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanRincianPilihan */

$this->title = "Sunting Pemeriksaan Rincian Pilihan";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Rincian Pilihans', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="pemeriksaan-rincian-pilihan-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
