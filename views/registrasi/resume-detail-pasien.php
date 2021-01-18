<?php 

use app\components\Helper;
use kartik\tabs\TabsX;
use yii\helpers\Html;
use yii\helpers\VarDumper;
$allow_button = 1;

?>

<?php //var_dump($searchModel->id) ?>

<?php if (!is_null($modelRegister)): ?>
	<?php /* Jika nik tidak null maka muncul kan detail pasien */ ?>
	<div class="box box-primary">
		<div class="box-header with-border">
			<div class="row">
				<div class="col-sm-6">
					<label for="Regno">No. MCU</label>
		            <?= Html::textInput('name', $modelRegister->no_mcu, ['class' => 'form-control input-sm','readonly'=> true]); ?>
				</div>
				<div class="col-sm-6">
					<label for="Regno">Nama Pasien</label>
		            <?= Html::textInput('name', @$modelRegister->pasien->nama, ['class' => 'form-control input-sm','readonly'=> true]); ?>
				</div>
				<div>&nbsp;</div>
				<div class="col-sm-6">
					<label for="Regno">Tanggal MCU</label>
		            <?= Html::textInput('name', Helper::getTanggal($modelRegister->tanggal), ['class' => 'form-control input-sm','readonly'=> true]); ?>
				</div>
				<div class="col-sm-6">
					<label for="Regno">Tanggal Lahir</label>
		            <?= Html::textInput('name', Helper::getTanggal($modelRegister->pasien->tanggal_lahir), ['class' => 'form-control input-sm','readonly'=> true]); ?>
				</div>
				<div>&nbsp;</div>
				<div class="col-sm-6">
					<label for="Regno">NIK</label>
		            <?= Html::textInput('name', @$modelRegister->pasien->nik, ['class' => 'form-control input-sm','readonly'=> true]); ?>
				</div>
				<div class="col-sm-6">
					<label for="Regno">Instansi</label>
		            <?= Html::textInput('name', @$modelRegister->pasien->instansi->nama, ['class' => 'form-control input-sm','readonly'=> true]); ?>
				</div>
			</div>
		</div>
		<div class="box-body">
			<?= $this->render('pemeriksaan-tabs',[
	            'model' => $modelRegister,
	            'modelPemeriksaanRincianHasil' => $modelPemeriksaanRincianHasil,
				'disabled' => true,
				'allow_button' => $allow_button,
	        ]) ?>
	        <?php// var_dump($modelRegister); ?>
		</div>
	</div>
<?php else: ?>
	<?php /* Jika nik null maka muncul kan pesan untuk memilih pasien terlebih dahulu */ ?>
	<div class="box box-primary">
		<div class="box-body"> 
			<i><span class="fa fa-warning"></span> Silahkan Pilih Pasien Terlebih Dahulu!!</i>
		</div>
	</div>
<?php endif ?>