<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikManuferEkstremitas */

$this->title = "Tambah Pemeriksaan Fisik Manufer Ekstremitas";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Fisik Manufer Ekstremitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-fisik-manufer-ekstremitas-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
