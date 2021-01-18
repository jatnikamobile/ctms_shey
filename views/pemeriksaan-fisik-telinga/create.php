<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikTelinga */

$this->title = "Tambah Pemeriksaan Fisik Telinga";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Fisik Telingas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-fisik-telinga-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
