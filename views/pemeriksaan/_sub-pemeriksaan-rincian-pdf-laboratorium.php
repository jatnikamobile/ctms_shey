<?php 

use app\models\PemeriksaanRincian;
use app\models\PemeriksaanRincianHasil;

$pemeriksaanRincianHasil = PemeriksaanRincianHasil::find()
	->andWhere([
		'id_registrasi' => $id_registrasi,
		'id_pemeriksaan_rincian' => $pemeriksaanRincian->id
	])->one();
?>

<tr>
	<td width="300px" style="padding-left:<?= ($level + 0.10) * 25 + 5;?>px">
		<?= $pemeriksaanRincian->nama ?>
	</td>
	<?php if ($level == 0): ?>
		<td style="width: 10px">:</td>
	<?php endif ?>
	<?php if ($pemeriksaanRincian->rincian_jenis == PemeriksaanRincian::DOKTER){ ?>
		<td><?= @$pemeriksaanRincianHasil->oneDokter->nama ?></td>
	<?php } elseif($pemeriksaanRincian->rincian_jenis == PemeriksaanRincian::PETUGAS) { ?>
		<td><?= @$pemeriksaanRincianHasil->onePetugas->nama ?></td>
	<?php } else { ?>
		<td><?= @$pemeriksaanRincianHasil->jawaban ?></td>
	<?php } ?>
	<td><?= @$pemeriksaanRincian->append ?></td>
	<td><?= @$pemeriksaanRincian->nilai_rujukan ?></td>
</tr>

<?php $level++; foreach ($pemeriksaanRincian->manySub as $subPemeriksaanRincian): ?>
	<?= $this->render('_sub-pemeriksaan-rincian-pdf-laboratorium',[
		'level' => $level,
		'pemeriksaanRincian' => $subPemeriksaanRincian,
		'id_registrasi' => $id_registrasi
	]) ?>
<?php endforeach ?>