<?php 

?>

<?= $model->getTabPemeriksaanDropdown() ?>

<div>&nbsp;</div>

<?= $this->render('pemeriksaan-rincian-list',['model' => $model]) ?>