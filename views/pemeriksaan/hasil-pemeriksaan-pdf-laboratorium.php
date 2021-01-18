<?php 

use app\components\Helper;

echo $this->render('/site/_kop',['model' => $registrasi]);
?>

<hr>

<div class="text-center">
	<h4>
		HASIL PEMERIKSAAN <?= strtoupper($model->nama) ?>
	</h4>
</div>


<div>&nbsp;</div>

<?php $level = 0; ?>

<table style="font-size: 11px; padding: 0px" >
	<thead repeat_header="0">
	<tr>
		<th style="border-top: 1px solid black; border-bottom: 1px solid black">PEMERIKSAAN</th>
		<th style="border-top: 1px solid black; border-bottom: 1px solid black">HASIL  </th>
		<th style="border-top: 1px solid black; border-bottom: 1px solid black"></th>
		// <th style="border-top: 1px solid black; border-bottom: 1px solid black">NILAI RUJUKAN  </th>
		<th style="border-top: 1px solid black; border-bottom: 1px solid black"></th>
	</tr>
	</thead>
<?php foreach ($model->manySub as $subPemeriksaan): ?>
	


	<tr>
		<?php $level = 0.5; ?>
		<?php foreach ($subPemeriksaan->manyPemeriksaanRincianInduk as $pemeriksaanRincian): ?>
			<?= $this->render('_sub-pemeriksaan-rincian-pdf-laboratorium',[
				'level' => $level,
				'pemeriksaanRincian' => $pemeriksaanRincian,
				'id_registrasi' => $id_registrasi
			]) ?>
		<?php endforeach ?>
	</tr>

	<div>&nbsp;</div>
	
<?php endforeach ?>
</table>

<hr>

<div>&nbsp;</div>

<div style="font-size: 12px; font-weight: bold">
Catatan : 
</div>

<div style="font-size: 10px">
- Hasil di atas hanya menggambarkan kondisi pada saat pengambilan sampel <br>
- Hasil negatif belum dapat menyingkirkan kemungkinan adanya infeksi SARS CoV-2 <br>
- Bila Positif Lakukan isolasi mandiri dan terpantau <br>
- Tetap Melakukan “MASTAGAR” (Gunakan masker, cuci tangan sesering mungkin dengan sabun atau handrub, jaga jarak dan hindari keramaian serta berperilaku sehat) <br>
- Bila ada keluhan konsultasikan dengan dokter keluarga anda atau klinik kesehatan/RS terdekat
</div>

<div>&nbsp;</div>
<div>&nbsp;</div>

<table width="100%" align="center" style="font-size: 13px">
	<tr>
		<td style="text-align: center">Dokter</td>
		<td style="text-align: center">&nbsp;</td>
		<td style="text-align: center">Pemeriksa</td>
	</tr>
	<tr>
		<td style="text-align: center">&nbsp;</td>
		<td style="text-align: center">&nbsp;</td>
		<td style="text-align: center">&nbsp;</td>
	</tr>
	<tr>
		<td style="text-align: center">&nbsp;</td>
		<td style="text-align: center">&nbsp;</td>
		<td style="text-align: center">&nbsp;</td>
	</tr>	
	<tr>
		<td style="text-align: center">(  <?= $model->getValueDokter($id_registrasi); ?> )</td>
		<td style="text-align: center"></td>
		<td style="text-align: center">(<?= $model->getValuePetugas($id_registrasi); ?>)</td>
	</tr>
</table>