<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Instansi */

$this->title = "Tambah Sponsor";
$this->params['breadcrumbs'][] = ['label' => 'Instansi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instansi-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
