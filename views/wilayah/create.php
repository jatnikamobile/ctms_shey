<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Wilayah */

$this->title = "Tambah Wilayah";
$this->params['breadcrumbs'][] = ['label' => 'Wilayahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wilayah-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
