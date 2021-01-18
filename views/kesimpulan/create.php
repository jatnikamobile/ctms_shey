<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kesimpulan */

$this->title = "Tambah Kesimpulan";
$this->params['breadcrumbs'][] = ['label' => 'Kesimpulan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kesimpulan-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
