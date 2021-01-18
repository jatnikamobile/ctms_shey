<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Radiologi */

$this->title = "Tambah Radiologi";
$this->params['breadcrumbs'][] = ['label' => 'Radiologi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="radiologi-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
