<?php 
use app\models\PemeriksaanRincianHasil;
echo $this->render('/site/_kop',['model' => $registrasi]);
?>
<?php if( strtolower($model->nama) != 'pemeriksaan fisik' || $model->id != 1 ):?>
<hr>

<div class="text-center">
	<h5>
		<?= strtoupper($model->nama) ?>
	</h5>
</div>
<hr>
<?php endif;?>

<div>&nbsp;</div>
<table border="0" style="font-size: 12px;  padding-top:-20px; padding-bottom:-20px">
	<?php if( strtolower($model->nama) == 'radiologi' || $model->id == 3 ):?>
	 <thead repeat_header="0">
	  <tr>
		<th style="border-top: 1px solid black; border-bottom: 1px solid black">Thorax PA</th>
		<th style="border-top: 1px solid black; border-bottom: 1px solid black"></th>
		<th style="border-top: 1px solid black; border-bottom: 1px solid black"></th>
   	  </tr><br>
	 </thead>
	<?php endif;?>
	<?php if( strtolower($model->nama) == 'pemeriksaan fisik' || $model->id == 1 ):?>
	 <thead repeat_header="0">
	  <tr>
		<th style="border-top: 1px solid black; border-bottom: 1px solid black">PEMERIKSAAN</th>
		<th style="border-top: 1px solid black; border-bottom: 1px solid black"></th>
		<th style="border-top: 1px solid black; border-bottom: 1px solid black">HASIL</th>
   	  </tr>
	 </thead>
	 <thead repeat_header="0">
	  <tr>
	  	<td width="100px">
			
			<h5></h5>
			
		</td>
   	  </tr>
	 </thead>
	<?php endif;?>
	<?php $level = 0.5; ?>
	<?php foreach ($model->manyPemeriksaanRincianInduk as $pemeriksaanRincian): ?>
		<?= $this->render('_sub-pemeriksaan-rincian-pdf',[
			'level' => $level,
			'pemeriksaanRincian' => $pemeriksaanRincian,
			'id_registrasi' => $id_registrasi,
			'model' => $model
		]) ?>
	<?php endforeach ?>
</table>

<?php foreach ($model->manySub as $subPemeriksaan): ?>
		<?php 
			$isStatusBMI = $subPemeriksaan->isStatusBMI();
			$isStatusTekananDarah = $subPemeriksaan->isStatusTekananDarah();
		?>
		<?php if ($isStatusBMI OR $isStatusTekananDarah): ?>
		<table border="0"   style="font-size: 12x">
			
			<?php if ($isStatusBMI): ?>
				<?php if( strtolower($model->nama) == 'pemeriksaan fisik' || $model->id == 1 ):?>
				<thead repeat_header="0">
				<tr>
					<td width="100px">
						
						<h5> </h5>
						
					</td>
				</tr>
				</thead>
				<?php endif;?>
				<tr>
				
					<td width="100px" style="padding-left:<?= (0.5 + 0.10) * 25 + 5;?>px">
						
						BMI

					</td><br>
					<td width="10px">:</td>
					<td ><?= $subPemeriksaan->getLabelBodyMassIndex($id_registrasi) ?></td>
				</tr>
			<?php endif ?>
			<?php if ($isStatusTekananDarah): ?>
				<tr>
					<td width="100px" style="padding-left:<?= (0.75 + 0.10) * 25 + 0;?>px">
						
						TEKANAN DARAH

					</td>
					<td width="10px">:</td>
					<td><?= $subPemeriksaan->getLabelTekananDarah($id_registrasi) ?></td>
				</tr>
			<?php endif ?>
			<?php $level = 1.25; ?>
			<?php foreach ($subPemeriksaan->manyPemeriksaanRincianInduk as $pemeriksaanRincian): ?>
				
				<?= $this->render('_sub-pemeriksaan-rincian-pdf',[
					'level' => $level,
					'pemeriksaanRincian' => $pemeriksaanRincian,
					'id_registrasi' => $id_registrasi,
					'model' => $model
				]) ?>
		
			<?php endforeach ?>
		</table>
		<?php endif ?>
	<?php endforeach ?>

<!-- <hr> -->

<?php foreach ($model->manySub as $subPemeriksaan): ?>
	<?php 
		$isStatusBMI = $subPemeriksaan->isStatusBMI();
		$isStatusTekananDarah = $subPemeriksaan->isStatusTekananDarah();
		$isStatusPemeriksaanTtd = $subPemeriksaan->isStatusPemeriksaanTtd();
	?>
	<?php if (!$isStatusBMI AND !$isStatusTekananDarah): ?>
		<?php if (!$isStatusPemeriksaanTtd): ?>
			<div>
				<h5>
					<?= strtoupper($subPemeriksaan->nama) ?>
				</h5>
			</div>
		
			<div>&nbsp;</div>
		<?php endif ?>


		<table border="0" style="font-size: 12px; padding-top:-20px; padding-bottom:-20px">
			<?php $level = 0.5; ?>
			<?php foreach ($subPemeriksaan->manyPemeriksaanRincianInduk as $pemeriksaanRincian): ?>
				<?= $this->render('_sub-pemeriksaan-rincian-pdf',[
					'level' => $level,
					'pemeriksaanRincian' => $pemeriksaanRincian,
					'id_registrasi' => $id_registrasi,
					'model' => $model
				]) ?>
			<?php endforeach ?>
		</table>
	
		<div>&nbsp;</div>
	<?php endif ?>
<?php endforeach ?>

<table style="margin-top:50px">
	<?php foreach ($model->manyPemeriksaanRincianInduk as $pemeriksaanRincian): ?>
		<?php 
		$pemeriksaanRincianHasil = PemeriksaanRincianHasil::find()
		->andWhere([
			'id_registrasi' => $id_registrasi,
			'id_pemeriksaan_rincian' => $pemeriksaanRincian->id
		])->one();
		$isDokter = $pemeriksaanRincian->isDokter();
					$isPemeriksa = $pemeriksaanRincian->isPemeriksa();  ?>
	<?php endforeach ?>

	<tr>
		<td style="text-align: center">
			<?= ($isPemeriksa) ? "Pemeriksa" : "" ; ?>
		</td>
		<td style="text-align: center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td style="text-align: center;">
			<?= ($isDokter) ?"Dokter" : "" ; ?>
		</td>
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
		<td style="text-align: center">&nbsp;</td>
		<td style="text-align: center">&nbsp;</td>
		<td style="text-align: center">&nbsp;</td>
	</tr>
	<tr>
		<td style="text-align: center">
			<?= ($isPemeriksa) ? @$pemeriksaanRincianHasil->jawaban : "" ; ?>
		</td>
		<td style="text-align: center"></td>
		<td style="text-align: center">
			<?= ($isDokter) ? @$pemeriksaanRincianHasil->jawaban : "" ; ?>
		</td>
	</tr>
</table>

