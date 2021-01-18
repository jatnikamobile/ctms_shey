<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LaboratoriumImunoserologi */

$this->title = "Tambah Laboratorium Imunoserologi";
$this->params['breadcrumbs'][] = ['label' => 'Laboratorium Imunoserologis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laboratorium-imunoserologi-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
