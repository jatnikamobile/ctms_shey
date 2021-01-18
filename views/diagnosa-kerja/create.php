<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DiagnosaKerja */

$this->title = "Tambah Diagnosa Kerja";
$this->params['breadcrumbs'][] = ['label' => 'Diagnosa Kerjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnosa-kerja-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
