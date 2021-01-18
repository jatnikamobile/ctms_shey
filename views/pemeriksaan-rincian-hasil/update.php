<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanRincianHasil */

$this->title = "Sunting Pemeriksaan Rincian Hasil";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Rincian Hasils', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="pemeriksaan-rincian-hasil-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
