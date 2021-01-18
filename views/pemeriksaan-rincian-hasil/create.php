<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanRincianHasil */

$this->title = "Tambah Pemeriksaan Rincian Hasil";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Rincian Hasils', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-rincian-hasil-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
