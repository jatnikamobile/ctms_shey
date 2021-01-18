<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LaboratoriumKimia */

$this->title = "Sunting Laboratorium Kimia";
$this->params['breadcrumbs'][] = ['label' => 'Laboratorium Kimias', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="laboratorium-kimia-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
