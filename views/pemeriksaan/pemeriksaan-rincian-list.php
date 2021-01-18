<?php 

use yii\helpers\Html;

?>

<div class="box box-primary">
	<div class="box-body">
			<?= Html::a('<i class="fa fa-plus"></i> Tambah Rincian Pemeriksaan '.$model->nama, ['pemeriksaan-rincian/create','id_pemeriksaan' => $model->id], ['class' => 'btn btn-flat btn-success']); ?>
	</div>
	<div class="box-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th width="55px" class="text-center">No</th>
					<th class="text-center" colspan="2">Rincian Pemeriksaan <?= $model->nama ?></th>
					<th class="text-center" width="150px">Default Value</th>
					<th class="text-center" width="150px">Nilai Rujukan</th>
				</tr>
			</thead>
			<tbody>
				<tbody>
					<?php $i = 1; $level = 0; foreach ($model->manyPemeriksaanRincianInduk as $pemeriksaanRincian): ?>
						<?= $this->render('_sub-pemeriksaan-rincian',[
							'i' => $i++,
							'level' => $level,
							'pemeriksaanRincian' => $pemeriksaanRincian
						]) ?>
			
					<?php endforeach ?>
				</tbody>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
    /*$('tr.isPilihan').click(function(){
        $(this).nextUntil('tr.isPilihan').css('display', function(i,v){
            return this.style.display === 'table-row' ? 'none' : 'table-row';
        });
    });*/
</script>