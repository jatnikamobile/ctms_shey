<?php 

use kartik\tabs\TabsX;
use yii\helpers\Html;


foreach ($model->manySub as $subPemeriksaan) {
	$items[] = [
		'label' => $subPemeriksaan->nama,
        'content' => $this->render('_tabs-sub-pemeriksaan',[
            'model' => $subPemeriksaan
        ])
	];
}

?>


<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">
			Daftar Sub Protokol
		</h3>
		<?= Html::a('<i class="fa fa-plus"></i> Tambah Sub Protokol', ['create','id_induk' => $model->id], ['class' => 'btn btn-flat btn-success pull-right']); ?>
	</div>
	<div class="box-body">
		<?php if ($model->hasSub()): ?>
			<?= TabsX::widget([
			    'items' => $items,
			    'position' => TabsX::POS_ABOVE,
			    'encodeLabels' => false
			]); ?>
		<?php endif ?>
	</div>
</div>