<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanRincianPilihan */

$this->title = "Tambah Pemeriksaan Rincian Pilihan";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Rincian Pilihans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-rincian-pilihan-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
