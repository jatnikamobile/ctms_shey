<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */

$this->title = "Tambah Protokol";
$this->params['breadcrumbs'][] = ['label' => 'Protokol', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registrasi-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
