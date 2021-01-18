<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kop */

$this->title = "Tambah Kop";
$this->params['breadcrumbs'][] = ['label' => 'Kop', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kop-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
