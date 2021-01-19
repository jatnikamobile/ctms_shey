<?php 

use kartik\tabs\TabsX;
use yii\helpers\Html;



if ($pemeriksaan->hasSub()) {
	foreach ($pemeriksaan->manySub as $subPemeriksaan) {
		$items[] = [
			'label' => $subPemeriksaan->nama,
	        'content' => $this->render('pemeriksaan-sub-konten',[
	        	'model' => $model,
	            'subPemeriksaan' => $subPemeriksaan,
	            'modelPemeriksaanRincianHasil' => $modelPemeriksaanRincianHasil,
    			'form' => $form
	        ])
		];
	}
}

?>

<?php if ($pemeriksaan->hasSub()) { ?>
	<?= TabsX::widget([
	    'items' => $items,
	    'position' => TabsX::POS_ABOVE,
	    'encodeLabels' => false,
	    'headerOptions' => ['id' => 'pemeriksaanSub'],
	]) ?>
<?php } ?>

<div>&nbsp;</div>