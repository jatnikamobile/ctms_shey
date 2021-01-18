<?php 

use app\components\Helper;
use app\models\Pemeriksaan;

?>

<?= $this->render('/site/_kop',['model' => $model]); ?>

<hr>

<?php foreach ($model->paket->manyPaketPemeriksaan as $manyPaketPemeriksaan): ?>

	<div class="text-center">
		<h5>
			<?= strtoupper($manyPaketPemeriksaan->pemeriksaan->nama) ?>
		</h5>
	</div>

	<hr>

	<?php if ($manyPaketPemeriksaan->pemeriksaan->id === Pemeriksaan::PEMERIKSAAN_LABORATORIUM): ?>
	<?php /* Melakukan pengecekan apakah jenis pemeriksaan nya labolatorium atau bukan */ ?>
		<?php $level = 0; ?>
		<table>
			<?php foreach ($manyPaketPemeriksaan->pemeriksaan->manyPemeriksaanRincianInduk as $pemeriksaanRincian): ?>
				<?= $this->render('/pemeriksaan/_sub-pemeriksaan-rincian-pdf-laboratorium',[
					'level' => $level,
					'pemeriksaanRincian' => $pemeriksaanRincian,
					'id_registrasi' => $model->id
				]) ?>
			<?php endforeach ?>
		</table>

		<div>&nbsp;</div>

		<table style="font-size: 11px; padding: 0px" >
			<thead repeat_header="0">
			<tr>
				<th style="border-top: 1px solid black; border-bottom: 1px solid black">NAMA PEMERIKSAAN</th>
				<th style="border-top: 1px solid black; border-bottom: 1px solid black">HASIL</th>
				<th style="border-top: 1px solid black; border-bottom: 1px solid black">SATUAN</th>
				<th style="border-top: 1px solid black; border-bottom: 1px solid black">NILAI RUJUKAN</th>
				<th style="border-top: 1px solid black; border-bottom: 1px solid black">KET</th>
			</tr>
		</thead>

		<div>&nbsp;</div>

		<?php foreach ($manyPaketPemeriksaan->pemeriksaan->manySub as $subPemeriksaan): ?>
			<tr>
				<td width="300px" style="padding-left:<?= ($level + 0.10) * 25 + 5;?>px; font-weight: bold; text-transform: uppercase;">
					<?= $subPemeriksaan->nama ?>
				</td>
				<td><?= @$pemeriksaanRincianHasil->jawaban ?></td>
				<td><?= @$pemeriksaanRincian->append ?></td>
				<td><?= @$pemeriksaanRincian->nilai_rujukan ?></td>
			</tr>


			<tr>
				<?php $level = 0.5; ?>
				<?php foreach ($subPemeriksaan->manyPemeriksaanRincianInduk as $pemeriksaanRincian): ?>
					<?= $this->render('/pemeriksaan/_sub-pemeriksaan-rincian-pdf-laboratorium',[
						'level' => $level,
						'pemeriksaanRincian' => $pemeriksaanRincian,
						'id_registrasi' => $model->id
					]) ?>
				<?php endforeach ?>
			</tr>

			<div>&nbsp;</div>
			
		<?php endforeach ?>
		</table>
	<?php endif ?>

	<table>
		<?php $level = 0; ?>
		<?php foreach ($manyPaketPemeriksaan->pemeriksaan->manyPemeriksaanRincianInduk as $pemeriksaanRincian): ?>
			<?= $this->render('/pemeriksaan/_sub-pemeriksaan-rincian-pdf',[
				'level' => $level,
				'pemeriksaanRincian' => $pemeriksaanRincian,
				'id_registrasi' => $model->id
			]) ?>
		<?php endforeach ?>
	</table>

	<div>&nbsp;</div>

	<?php foreach ($manyPaketPemeriksaan->pemeriksaan->manySub as $subPemeriksaan): ?>
		<?php $isStatusPemeriksaanTtd = $subPemeriksaan->isStatusPemeriksaanTtd(); ?>
		<?php if (!$isStatusPemeriksaanTtd): ?>
			<div>
				<h4>
					<?= strtoupper($subPemeriksaan->nama) ?>
				</h4>
			</div>
		<?php endif ?>

		<div>&nbsp;</div>

		<table>
			<?php $level = 0; ?>
			<?php foreach ($subPemeriksaan->manyPemeriksaanRincianInduk as $pemeriksaanRincian): ?>
				<?= $this->render('/pemeriksaan/_sub-pemeriksaan-rincian-pdf',[
					'level' => $level,
					'pemeriksaanRincian' => $pemeriksaanRincian,
					'id_registrasi' => $model->id
				]) ?>
			<?php endforeach ?>
		</table>

	<?php endforeach ?>
	
	<pagebreak>
<?php endforeach ?>