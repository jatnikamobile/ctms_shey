<?php 

use app\models\PaketPemeriksaan;
use yii\helpers\Html;
use yii\widgets\DetailView;


?>

<?= Html::a('<i class="fa fa-print"></i> Cetak Kesimpulan', ['/pemeriksaan/unduh-kesimpulan', 'id_registrasi' => $model->id], ['class' => 'btn btn-success btn-flat','target' => '_blank']) ?>
<?php if (!$disabled) { ?>
	<?php if (@$model->kesimpulan !== null): ?>
		<?= Html::a('<i class="fa fa-pencil"></i> Sunting Kesimpulan', ['kesimpulan/update','id' => @$model->kesimpulan->id], ['class' => 'btn btn-flat btn-success']); ?>
	<?php endif ?>
<?php } ?>

<?= Html::a('<i class="fa fa-print"></i> Cetak Seluruh Pemeriksaan', ['registrasi/unduh-seluruh-pemeriksaan','id' => $model->id], ['class' => 'btn btn-flat btn-success','target' => '_blank']); ?>

<div>&nbsp;</div>

<?php if ($model->kesimpulan !== null): ?>
	<?= DetailView::widget([
	    'model' => $model->kesimpulan,
	    'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
	    'attributes' => [
	        [
	            'attribute' => 'isi_kesimpulan',
	            'format' => 'raw',
	            'value' => $model->kesimpulan->isi_kesimpulan,
	        ],
	        [
	            'attribute' => 'saran',
	            'format' => 'raw',
	            'value' => $model->kesimpulan->saran,
	        ],
	        [
	            'attribute' => 'id_diagnosa_kerja',
	            'format' => 'raw',
	            'value' => function($data) {
	                return @$data->diagnosa->nama;
	            },
	            'headerOptions' => ['style' => 'text-align:center;'],
	            'contentOptions' => ['style' => 'text-align:center;'],
	        ],
	    ],
	]) ?>

<?php endif ?>

<table class="table table-bordered table-hover">
	<?php foreach ($model->paket->allPaketPemeriksaan(['status_kesimpulan' => PaketPemeriksaan::KESIMPULAN]) as $paketPemeriksaan) { ?>
		<tr>
			<th width="180px" style="text-align:right"><?= $paketPemeriksaan->pemeriksaan->nama; ?></th>
			<td><?= $model->getKesimpulanByPemeriksaan($paketPemeriksaan->id_pemeriksaan); ?></td>
		</tr>
	<?php } ?>
	<?php foreach ($model->allPemeriksaanHitungan() as $pemeriksaanRincianHasil) { ?>
		<tr>
			<th width="180px" style="text-align:right; font-weight: bold">Nilai Akhir <?= $pemeriksaanRincianHasil->nama ?></td>
			<td>
				<?= $pemeriksaanRincianHasil->getLabelPemeriksaan($model->id) ?>
			</td>
		</tr>
	<?php } ?>
</table>