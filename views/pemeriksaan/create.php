<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pemeriksaan */

$this->title = "Tambah Protokol";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
