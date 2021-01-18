<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikTimpani */

$this->title = "Tambah Pemeriksaan Fisik Timpani";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Fisik Timpanis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-fisik-timpani-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
