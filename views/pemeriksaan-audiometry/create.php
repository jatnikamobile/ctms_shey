<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanAudiometry */

$this->title = "Tambah Pemeriksaan Audiometry";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Audiometries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-audiometry-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
