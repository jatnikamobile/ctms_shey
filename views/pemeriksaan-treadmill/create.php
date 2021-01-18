<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanTreadmill */

$this->title = "Tambah Pemeriksaan Treadmill";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Treadmills', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-treadmill-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
