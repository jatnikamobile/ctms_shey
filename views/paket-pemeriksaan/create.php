<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PaketPemeriksaan */

$this->title = "Tambah Protokol Pemeriksaan";
$this->params['breadcrumbs'][] = ['label' => 'Paket Pemeriksaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paket-pemeriksaan-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
