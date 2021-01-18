<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikMata */

$this->title = "Tambah Pemeriksaan Fisik Mata";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Fisik Matas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-fisik-mata-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
