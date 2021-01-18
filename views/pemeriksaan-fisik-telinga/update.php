<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikTelinga */

$this->title = "Sunting Pemeriksaan Fisik Telinga";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Fisik Telingas', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="pemeriksaan-fisik-telinga-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
