<?php 

use app\models\Dokter;
use app\models\User;
use app\models\PemeriksaanRincianHasil;
use app\models\PemeriksaanRincian;
use app\models\Petugas;
use kartik\select2\Select2;
use yii\helpers\Html;

$isUraian = $pemeriksaanRincian->isUraian();
$isPilihan = $pemeriksaanRincian->isPilihan();
$isPernyataan = $pemeriksaanRincian->isPernyataan();
$isLampiran = $pemeriksaanRincian->isLampiran();
$isDokter = $pemeriksaanRincian->isDokter();
$isPemeriksa = $pemeriksaanRincian->isPemeriksa();
$isKesimpulan = $pemeriksaanRincian->isKesimpulan();
$isDefaultValue = $pemeriksaanRincian->isDefaultValueIsNotNull();
$isAppend = $pemeriksaanRincian->isAppendIsNotNull();
$append = null;

$valuePemeriksaanRincianHasil = PemeriksaanRincianHasil::find()
	->andWhere([
		'id_registrasi' => $model->id,
		'id_pemeriksaan_rincian' => $pemeriksaanRincian->id
])->one();

$check_jawaban_anjing = PemeriksaanRincianHasil::find()
	->andWhere([
		'id_registrasi' => $model->id,
		'id_pemeriksaan_rincian' => $pemeriksaanRincian->id
])->all();

$check_default_anjing = PemeriksaanRincian::find()

	->andWhere(['NOT', ['default_value' => null]])->all();

$modelPemeriksaanRincianHasil->uraian[$pemeriksaanRincian->id] = @$valuePemeriksaanRincianHasil->jawaban;
$modelPemeriksaanRincianHasil->dokter[$pemeriksaanRincian->id] = @$valuePemeriksaanRincianHasil->jawaban;
$modelPemeriksaanRincianHasil->pemeriksa[$pemeriksaanRincian->id] = @$valuePemeriksaanRincianHasil->jawaban;

if ($isAppend) {
	$append = ['append' => ['content' => $pemeriksaanRincian->append]];
}

if (User::isInstansi()){
	$tes = true;
}
else {
	$tes = false;
}

?>
<?php

	$warna = 'white';
	foreach($check_default_anjing as $item){
		
		foreach($check_jawaban_anjing as $item2) {
			if( $item2->jawaban == $item->default_value ){
				$warna = 'orange';
			}
		}
	
	}

?>

<tr  class="<?= ($isPilihan) ? 'isPilihan' : '' ?>" >
	<td style="padding-left:<?= ($level + 0.10) * 25 + 5;?>px">
		<b><?= $pemeriksaanRincian->nama ?></b>
	</td>
	<td  width="350px"  bgcolor="<?=$warna?>" >
		<?php if ($isPilihan OR $isKesimpulan): ?>
			<?php foreach ($pemeriksaanRincian->manyPemeriksaanRincianPilihan as $pemeriksaanRincianPilihan) : ?>
				<?php $isDefaultValue = $pemeriksaanRincianPilihan->isDefaultValue() ?>
				<?php if (@$valuePemeriksaanRincianHasil->jawaban == $pemeriksaanRincianPilihan->nama OR $isDefaultValue) {
                    $checked = true; 
                } else {
                    $checked = false;
                } ?>

				<div>
                    <label  for="<?= 'pilihan['.$pemeriksaanRincian->id.']' ?>" style="font-weight: inherit !important;">
                        <?= \yii\helpers\Html::radio('pilihan['.$pemeriksaanRincian->id.']', $checked, ['value' => $pemeriksaanRincianPilihan->nama, 'disabled' => $tes, 'id' => 'isian_label']); ?>
                        <?= $pemeriksaanRincianPilihan->nama ?>
                    </label>
                </div>
			<?php endforeach ?>
		<?php endif ?>	

		<?php if ($isUraian): ?>
			<?php if (is_null($modelPemeriksaanRincianHasil->uraian[$pemeriksaanRincian->id])): ?>

				<?= $form->field($modelPemeriksaanRincianHasil, 'uraian['.$pemeriksaanRincian->id.']',[
				    'addon' => $append,
				])->textInput(['value' => $pemeriksaanRincian->default_value, 'disabled' => $tes])->label(false) ?>

			<?php else: ?>

				<?= $form->field($modelPemeriksaanRincianHasil, 'uraian['.$pemeriksaanRincian->id.']',[
				    'addon' => $append,
				])->textInput(['value' => $modelPemeriksaanRincianHasil->jawaban, 'disabled' => $tes])->label(false) ?>

			<?php endif ?>
		<?php endif ?>

		<?php if ($isLampiran): ?>	
			<?php if (@$valuePemeriksaanRincianHasil): ?>
				<?= $valuePemeriksaanRincianHasil->getGambar(['class' => 'img-responsive','style' => 'width: 300px; padding: 2%']) ?>
				<?= $form->field($modelPemeriksaanRincianHasil, 'file['.$pemeriksaanRincian->id.']')->fileInput(['multiple' => true, 'accept' => 'image/*'])->label(false); ?>
			<?php else: ?>
				<?= $form->field($modelPemeriksaanRincianHasil, 'file['.$pemeriksaanRincian->id.']')->fileInput(['multiple' => true, 'accept' => 'image/*'])->label(false); ?>
			<?php endif ?>
		<?php endif ?>



		<?php if ($isDokter): ?>

			<?php if (is_null($modelPemeriksaanRincianHasil->dokter[$pemeriksaanRincian->id])): ?>

		        <?= $form->field($modelPemeriksaanRincianHasil, 'dokter['.$pemeriksaanRincian->id.']')->widget(Select2::classname(), [
		            'data' =>  \yii\helpers\ArrayHelper::map(Dokter::find()->all(), 'nama','nama'),
		            'options' => [
		              'placeholder' => '- Pilih Dokter -',
		            ],
		            'pluginOptions' => [
		                'allowClear' => true,
		                'disabled' => $tes
		            ],
        		])->label(false); ?>

			<?php else: ?>

		        <?= $form->field($modelPemeriksaanRincianHasil, 'dokter['.$pemeriksaanRincian->id.']')->widget(Select2::classname(), [
		            'data' =>  \yii\helpers\ArrayHelper::map(Dokter::find()->all(), 'nama','nama'),
		            'value' => $modelPemeriksaanRincianHasil->jawaban,
		            'options' => [
		              'placeholder' => '- Pilih Dokter -',
		            ],
		            'pluginOptions' => [
		                'allowClear' => true,
		                'disabled' => $tes
		            ],
        		])->label(false); ?>

			<?php endif ?>

		<?php endif ?>


		<?php if ($isPemeriksa): ?>

			<?php if (is_null($modelPemeriksaanRincianHasil->pemeriksa[$pemeriksaanRincian->id])): ?>

		        <?= $form->field($modelPemeriksaanRincianHasil, 'pemeriksa['.$pemeriksaanRincian->id.']')->widget(Select2::classname(), [
		            'data' =>  \yii\helpers\ArrayHelper::map(Petugas::find()->all(), 'nama','nama'),
		            'options' => [
		              'placeholder' => '- Pilih Petugas -',
		            ],
		            'pluginOptions' => [
		                'allowClear' => true,
		                'disabled' => $tes
		            ],
        		])->label(false); ?>

			<?php else: ?>

		        <?= $form->field($modelPemeriksaanRincianHasil, 'pemeriksa['.$pemeriksaanRincian->id.']')->widget(Select2::classname(), [
		            'data' =>  \yii\helpers\ArrayHelper::map(Petugas::find()->all(), 'nama','nama'),
		            'value' => $modelPemeriksaanRincianHasil->jawaban,
		            'options' => [
		              'placeholder' => '- Pilih Petugas -',
		            ],
		            'pluginOptions' => [
		                'allowClear' => true,
		                'disabled' => $tes
		            ],
        		])->label(false); ?>

			<?php endif ?>

		<?php endif ?>


	</td>
</tr>


<?php $level++; foreach ($pemeriksaanRincian->manySub as $subPemeriksaanRincian): ?>
	<?= $this->render('pemeriksaan-tabs-konten-sub',[
		'i' => '',
		'level' => $level,
		'model' => $model,
		'pemeriksaanRincian' => $subPemeriksaanRincian,
		'modelPemeriksaanRincianHasil' => $modelPemeriksaanRincianHasil,
    	'form' => $form
	]) ?>
<?php endforeach ?>

<?php 

$homeurl = Yii::$app->homeUrl;
$script = <<< JS

	var label_nama = $('#isian_label').val();
	if(label_nama == 'Pakai' ) {
		// label_nama = '';
	}

JS;
$this->registerJs($script);

?>
