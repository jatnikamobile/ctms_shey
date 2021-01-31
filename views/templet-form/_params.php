<?php 

use yii\helpers\Html;

?>

<div class="box box-primary">
	<div class="box-body">
        <?php $model->status or print Html::a('<i class="fa fa-plus"></i> Tambah Parameter ', ['param/create', 'id_form' => $model->id], ['class' => 'btn btn-flat btn-success']); ?>
	</div>
	<div class="box-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th width="55px" class="text-center">No</th>
					<th class="text-center" colspan="2">Rincian Parameter <?= $model->nama ?></th>
					<th class="text-center" width="150px">Tipe</th>
					<th class="text-center" width="150px">Default Value</th>
					<!-- <th class="text-center" width="150px">Nilai Rujukan</th> -->
				</tr>
			</thead>
			<tbody>
				<tbody>
					<?php $i = 1; $level = 0; 
					foreach ($model->getListParam() as $param): ?>
						<?= $this->render('_sub-param',[
							'i' => $i++,
							'level' => $level,
							'param' => $param,
							'model' => $model,
						]) ?>
			
					<?php endforeach ?>
				</tbody>
			</tbody>
		</table>
	</div>
</div>
