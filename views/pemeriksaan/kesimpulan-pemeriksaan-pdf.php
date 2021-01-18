<?php 

use app\components\Helper;
use app\models\PaketPemeriksaan;

echo $this->render('/site/_kop',['model' => $model]);
?>

<!-- <table widh="100%" border="1" style="vertical-align: top;">
	<tr>
		<th width="50%">
			<table style="font-size: 10px; vertical-align: top">
				<tr>
					<td style="width: 100px">Nomor MCU </td>
					<td style="width: 10px">: </td>
					<td><?= $model->no_mcu ?></td>
				</tr>
				<tr>
					<td>Nama Pasien </td>
					<td>: </td>
					<td><?= @$model->nama_pasien; ?></td>
				</tr>
				<tr>
					<td>Umur </td>
					<td>: </td>
					<td><?= (is_null($model->pasien)) ? "" : $model->pasien->getUmurHari() ;?> </td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>: </td>
					<td><?= $model->alamat_pasien; ?> </td>
				</tr>				
			</table>
		</th>
		<th width="50%">
			<table style="font-size: 10px">
				<tr>
					<td>Tanggal Pemeriksaan </td>
					<td>: </td>
					<td><?= Helper::getTanggal($model->tanggal); ?> </td>
				</tr>
				<tr>
					<td>Nama Pemeriksaan</td>
					<td>: </td>
					<td><?= $model->paket->nama; ?></td>
				</tr>
				<tr>
					<td>Golongan Darah</td>
					<td>: </td>
					<td><?= $model->golongan_darah_pasien; ?></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>: </td>
					<td><?= $model->jenis_kelamin_pasien; ?></td>
				</tr>						
			</table>			
		</th>
	</tr>
</table> -->

<hr>
<div class="text-center">
	<h4>
		HASIL PEMERIKSAAN
	</h4>
</div>
<hr>

<div>&nbsp;</div>

<table style="width:100%">
  <tr>
    <td width="180">Kesimpulan</td>
    <td>: <?= @$model->kesimpulan->isi_kesimpulan; ?></td>
  </tr>
  <tr>
    <td width="180">Saran</td>
    <td>: <?= @$model->kesimpulan->saran; ?></td>
  </tr>
  <tr>
    <td width="180">Diagnosa Kerja</td>
    <td>: <?= @$model->kesimpulan->diagnosa->nama; ?></td>
  </tr>
</table>

<div>&nbsp;</div>


<table style="width:100%">
	<?php foreach ($model->paket->allPaketPemeriksaan(['status_kesimpulan' => PaketPemeriksaan::KESIMPULAN]) as $paketPemeriksaan) { ?>
		<tr>
			<td width="180"><?= $paketPemeriksaan->pemeriksaan->nama; ?></th>
			<td>: <?= $model->getKesimpulanByPemeriksaan($paketPemeriksaan->id_pemeriksaan); ?></td>
		</tr>
	<?php } ?>
	<?php foreach ($model->allPemeriksaanHitungan() as $pemeriksaanRincianHasil) { ?>
		<tr>
			<td width="180">Nilai Akhir <?= $pemeriksaanRincianHasil->nama ?></td>
			<td>
				: <?= $pemeriksaanRincianHasil->getLabelPemeriksaan($model->id) ?>
			</td>
		</tr>
	<?php } ?>
</table>

<hr>

<table style="width:100%">
  <tr>
    <td width="500"  height="50"></td>
    <td> </td>
  </tr>
  <tr>
    <td width="500"></td>
    <td >Jakarta, ..........................</td>
  </tr>
  <tr>
    <td width="500"></td>
    <td >Dokter Pemeriksa</td>
  </tr>
  <tr>
    <td width="500" height="150"></td>
    <td>(.................................)</td>
  </tr>
</table>