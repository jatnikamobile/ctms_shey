<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikAbdomen */

$this->title = "Tambah Pemeriksaan Fisik Abdomen";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Fisik Abdomens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-fisik-abdomen-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
