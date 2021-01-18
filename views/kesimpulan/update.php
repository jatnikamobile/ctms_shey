<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kesimpulan */

$this->title = "Sunting Kesimpulan";
$this->params['breadcrumbs'][] = ['label' => 'Kesimpulan', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="kesimpulan-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
