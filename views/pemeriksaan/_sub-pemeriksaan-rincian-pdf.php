<?php 

use app\models\PemeriksaanRincianHasil;
use app\models\PemeriksaanRincian;

$pemeriksaanRincianHasil = PemeriksaanRincianHasil::find()
	->andWhere([
		'id_registrasi' => $id_registrasi,
		'id_pemeriksaan_rincian' => $pemeriksaanRincian->id
	])->one();


$isDokter = $pemeriksaanRincian->isDokter();
$isPemeriksa = $pemeriksaanRincian->isPemeriksa();

?>

<?php  if (!$isDokter): ?>
	
	<tr>
		<td width="300px" style="padding-left:<?= ($level + 0.10) * 25 + 5;?>px">
			<?= strtoupper($pemeriksaanRincian->nama) ?>
		</td>
		<td width="10px">:</td>
		<td><?= @$pemeriksaanRincianHasil->jawaban." ".@$pemeriksaanRincian->append ?></td>
	</tr>
<?php else: ?>
	
	<tr>
		<td style="text-align: center">&nbsp;</td>
		<td style="text-align: center">&nbsp;</td>
		<td style="text-align: center">&nbsp;</td>
	</tr>
	
<?php endif ?>

<?php $level++; foreach ($pemeriksaanRincian->manySub as $subPemeriksaanRincian): ?>
	<?= $this->render('_sub-pemeriksaan-rincian-pdf',[
		'level' => $level,
		'pemeriksaanRincian' => $subPemeriksaanRincian,
		'id_registrasi' => $id_registrasi
	]) ?>
<?php endforeach ?>
