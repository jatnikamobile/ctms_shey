<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikLeher */

$this->title = "Tambah Pemeriksaan Fisik Leher";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Fisik Lehers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-fisik-leher-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
