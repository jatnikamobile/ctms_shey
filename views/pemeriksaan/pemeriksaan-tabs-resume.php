<?php 

use kartik\tabs\TabsX;
use kartik\form\ActiveForm;

$modelPemeriksaanRincianHasil = PemeriksaanRincianHasil::findOne([
  'id_registrasi' => $model->id
 ]);

$form = ActiveForm::begin([
    'fieldConfig' => ['template' => "{label}\n{input}\n{hint}"],
]);

foreach ($model->paket->manyPaketPemeriksaan as $paketPemeriksaan) {
	$items[] = [
		'label' => $paketPemeriksaan->pemeriksaan->nama,
        'content' => $this->render('pemeriksaan-tabs-konten',[
            'model' => $model,
            'paketPemeriksaan' => $paketPemeriksaan,
            'modelPemeriksaanRincianHasil' => $modelPemeriksaanRincianHasil,
            'form' => $form
        ])
	];
}

if ($model->paket->hasPaketPemeriksaan()) {
    $tabsPasien = [
    	'label' => 'Pasien',
        'content' => $this->render('pemeriksaan-tabs-pasien',[
            'model' => $model
        ])
    ];

    $tabsKesimpulan = [
        'label' => 'Kesimpulan',
        'content' => $this->render('pemeriksaan-tabs-kesimpulan',[
            'model' => $model
        ])
    ];

    array_push($items, $tabsKesimpulan);
}


?>

<?php if ($model->paket->hasPaketPemeriksaan()): ?>
    <?= TabsX::widget([
        'items' => $items,
        'position' => TabsX::POS_ABOVE,
        'encodeLabels' => false,
    ]); ?>
<?php endif ?>

<?php ActiveForm::end(); ?>