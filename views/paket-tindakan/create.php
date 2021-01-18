<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PaketTindakan */

$this->title = "Tambah Protokol Tindakan";
$this->params['breadcrumbs'][] = ['label' => 'Paket Tindakans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paket-tindakan-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
