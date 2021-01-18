<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikMulut */

$this->title = "Tambah Pemeriksaan Fisik Mulut";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Fisik Muluts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-fisik-mulut-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
