<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pemeriksaan */

$this->title = "Sunting Protokol";
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="pemeriksaan-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
