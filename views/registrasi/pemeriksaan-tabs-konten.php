<?php 

use yii\helpers\Html;
use app\models\PemeriksaanRincianHasil;

?>

<?php if($allow_button == 1): ?>
<?= Html::a('<i class="fa fa-print"></i> Cetak Pemeriksaan '.$paketPemeriksaan->pemeriksaan->nama, ['/pemeriksaan/unduh-hasil-pemeriksaan', 'id' => $paketPemeriksaan->pemeriksaan->id,'id_registrasi' => $model->id], ['class' => 'btn btn-success btn-flat','target' => '_blank']) ?>
<?php endif;?>

<?php foreach($paketPemeriksaan->pemeriksaan->manyPemeriksaanRincianInduk as $pemeriksaanRincian):?>
	<?php $valuePemeriksaanRincianHasil = PemeriksaanRincianHasil::find()
	->andWhere([
	  'id_registrasi' => $model->id,
	  'id_pemeriksaan_rincian' => $pemeriksaanRincian->id,
	])->one();
	?>
	<?php $isLampiran = $pemeriksaanRincian->isLampiran();?>
	<?php if($isLampiran):?>
		<?php if(@$valuePemeriksaanRincianHasil):?>
			<?= Html::a('<i class="fa fa-paperclip"></i> Unduh Lampiran '.$paketPemeriksaan->pemeriksaan->nama, ['/pemeriksaan-rincian-hasil/unduh-lampiran', 'id' => $valuePemeriksaanRincianHasil->id], ['class' => 'btn btn-success btn-flat'])?>
		<?php endif?>

	<?php endif?>
<?php endforeach?>

<div>&nbsp;</div>

<table class="table table-hover" >
	<tbody>
		<?php ;$i = 1; $level = 0; foreach ($paketPemeriksaan->pemeriksaan->manyPemeriksaanRincianInduk as $pemeriksaanRincian):?>
			<?= $this->render('pemeriksaan-tabs-konten-sub',[
				'i' => $i++,
				'level' => $level,
				'model' => $model,
				'paketPemeriksaan' => $paketPemeriksaan,
				'pemeriksaanRincian' => $pemeriksaanRincian,
				'modelPemeriksaanRincianHasil' => $modelPemeriksaanRincianHasil,
           		'form' => $form,
           		'disabled' => $disabled,
			]) ?>


		<?php endforeach ?>

	</tbody>
</table>

<?= $this->render('pemeriksaan-sub',[
	'model' => $model,
	'pemeriksaan' => $paketPemeriksaan->pemeriksaan,
	'modelPemeriksaanRincianHasil' => $modelPemeriksaanRincianHasil,
    'form' => $form
]) ?>
<?php if ($disabled == false) 
	{
		echo \yii\helpers\Html::submitButton('<i class="fa fa-check"></i> Simpan Pemeriksaan',['class' => 'btn btn-success btn-flat pull-right','data-confirm' => 'Apakah anda yakin akan menyimpan data Pemeriksaan?']);
	}
?>


