<?php 

$isStatusBMI = $subPemeriksaan->isStatusBMI();
$isStatusTekananDarah = $subPemeriksaan->isStatusTekananDarah();
?>

<?php 
/*$test = $subPemeriksaan->getJawabanPemeriksaanRincian($model->id);
print_r($test);
echo @$subPemeriksaan->getNilaiBodyMassIndex($model->id);*/
?>

<?php if ($isStatusBMI): ?>
	<table class="table table-hover">
		<tbody>
			<tr>
				<td><b>Nilai Akhir <?= $subPemeriksaan->nama ?></b></td>
				<td width="350px">
					<?= $subPemeriksaan->getLabelBodyMassIndex($model->id) ?>
				</td>
			</tr>
		</tbody>
	</table>
<?php endif ?>

<?php if ($isStatusTekananDarah): ?>
	<table class="table table-hover">
		<tbody>
			<tr>
				<td><b>Nilai Akhir <?= $subPemeriksaan->nama ?></b></td>
				<td width="350px">
					<?= $subPemeriksaan->getLabelTekananDarah($model->id) ?>
				</td>
			</tr>
		</tbody>
	</table>
<?php endif; ?>

<table class="table table-hover">
	<tbody>
		<?php $i = 1; $level = 0; foreach ($subPemeriksaan->manyPemeriksaanRincianInduk as $pemeriksaanRincian): ?>
			<?= $this->render('pemeriksaan-tabs-konten-sub',[
				'i' => $i++,
				'level' => $level,
				'model' => $model,
				'pemeriksaanRincian' => $pemeriksaanRincian,
				'modelPemeriksaanRincianHasil' => $modelPemeriksaanRincianHasil,
    			'form' => $form
			]) ?>
		<?php endforeach ?>

	</tbody>
</table>