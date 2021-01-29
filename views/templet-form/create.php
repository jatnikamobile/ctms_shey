<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Paket */

$this->title = "Tambah Templet Form";
$this->params['breadcrumbs'][] = ['label' => 'Pakets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paket-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
