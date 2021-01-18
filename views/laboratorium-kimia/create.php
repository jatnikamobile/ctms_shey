<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LaboratoriumKimia */

$this->title = "Tambah Laboratorium Kimia";
$this->params['breadcrumbs'][] = ['label' => 'Laboratorium Kimias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laboratorium-kimia-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
