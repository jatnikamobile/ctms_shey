<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanSpirometry */

$this->title = "Tambah Pemeriksaan Spirometry";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Spirometries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-spirometry-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
