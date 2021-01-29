<?php

/** @var yii\web\View $this */

$this->title = Yii::$app->request->get('id_induk') ? "Tambah Sub Parameter" : "Tambah Parameter";
$this->params['breadcrumbs'][] = ['label' => 'Petugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="petugas-create">

    <?= $this->render('_form', compact('model')) ?>

</div>
