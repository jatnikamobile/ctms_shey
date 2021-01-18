<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanEkg */

$this->title = "Sunting Pemeriksaan Ekg";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Ekgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="pemeriksaan-ekg-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
