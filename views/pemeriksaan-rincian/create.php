<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanRincian */

$this->title = "Tambah Pemeriksaan Rincian";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Rincians', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-rincian-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
