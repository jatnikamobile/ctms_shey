<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanUsg */

$this->title = "Tambah Pemeriksaan Usg";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Usgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-usg-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
