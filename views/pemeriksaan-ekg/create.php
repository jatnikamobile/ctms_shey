<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanEkg */

$this->title = "Tambah Pemeriksaan Ekg";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Ekgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-ekg-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
