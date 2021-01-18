<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikHidung */

$this->title = "Sunting Pemeriksaan Fisik Hidung";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Fisik Hidungs', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="pemeriksaan-fisik-hidung-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
