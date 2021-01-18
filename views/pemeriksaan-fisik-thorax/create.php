<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikThorax */

$this->title = "Tambah Pemeriksaan Fisik Thorax";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Fisik Thoraxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-fisik-thorax-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
