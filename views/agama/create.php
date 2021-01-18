<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Agama */

$this->title = "Tambah Agama";
$this->params['breadcrumbs'][] = ['label' => 'Agamas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agama-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
