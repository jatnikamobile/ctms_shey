<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DiagnosaKerja */

$this->title = "Sunting Diagnosa Kerja";
$this->params['breadcrumbs'][] = ['label' => 'Diagnosa Kerjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="diagnosa-kerja-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
