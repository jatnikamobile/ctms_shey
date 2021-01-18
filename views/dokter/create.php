<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Dokter */

$this->title = "Tambah Dokter";
$this->params['breadcrumbs'][] = ['label' => 'Dokter', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dokter-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
