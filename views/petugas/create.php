<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Petugas */

$this->title = "Tambah Petugas";
$this->params['breadcrumbs'][] = ['label' => 'Petugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="petugas-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
