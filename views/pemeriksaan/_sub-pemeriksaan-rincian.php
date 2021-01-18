<?php 

$isUraian = $pemeriksaanRincian->isUraian();
$isPilihan = $pemeriksaanRincian->isPilihan();
$isKesimpulan = $pemeriksaanRincian->isKesimpulan();
$isPernyataan = $pemeriksaanRincian->isPernyataan();
$isDefaultValueIsNotNull = $pemeriksaanRincian->isDefaultValueIsNotNull();
?>
<tr class="<?= ($isPilihan) ? 'isPilihan' : '' ?>">
	<td class="text-center">
		<?= $i ?>
	</td>
	<td style="padding-left:<?= ($level + 0.10) * 25 + 5;?>px"><?= $pemeriksaanRincian->getButtonDropdown()." ".$pemeriksaanRincian->nama ?></td>
	<td width="120px" class="text-center"><?= $pemeriksaanRincian->getRincianJenis() ?></td>
	<td class="text-center" style="background: <?= ($isDefaultValueIsNotNull) ? "#e4dfdf" : ""; ?>">
		<?php if ($isUraian AND $isDefaultValueIsNotNull): ?>
			<?= $pemeriksaanRincian->default_value ?>
		<?php endif ?>
	</td>
	<td><?= $pemeriksaanRincian->nilai_rujukan; ?></td>
</tr>

<?php if ($isPilihan OR $isKesimpulan): ?>
	<?php foreach ($pemeriksaanRincian->manyPemeriksaanRincianPilihan as $pemeriksaanRincianPilihan) : ?>
		<?php $isDefaultValue = $pemeriksaanRincianPilihan->isDefaultValue() ?>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td style="background: <?= ($isDefaultValue) ? "#e4dfdf" : ""; ?>">
				<?= $pemeriksaanRincianPilihan->getButtonDropdown()." ".$pemeriksaanRincianPilihan->nama  ?>
			</td>
			<td><?= $pemeriksaanRincian->nilai_rujukan; ?></td>
		</tr>
	<?php endforeach ?>
<?php endif ?>

<?php $level++; foreach ($pemeriksaanRincian->manySub as $subPemeriksaanRincian): ?>
	<?= $this->render('_sub-pemeriksaan-rincian',[
		'i' => '',
		'level' => $level,
		'pemeriksaanRincian' => $subPemeriksaanRincian
	]) ?>
<?php endforeach ?>