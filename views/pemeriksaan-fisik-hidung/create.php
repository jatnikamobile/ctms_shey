<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanFisikHidung */

$this->title = "Tambah Pemeriksaan Fisik Hidung";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Fisik Hidungs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-fisik-hidung-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
