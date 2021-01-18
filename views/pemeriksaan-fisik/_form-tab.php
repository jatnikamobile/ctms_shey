<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31/12/2018
 * Time: 15:52
 */

use kartik\tabs\TabsX;

/* @var $model \app\models\PemeriksaanFisik */

?>

<?php

$modelMata = $model->findOrCreatePemeriksaanFisikMata(['create'=>false]);
$modelTelinga = $model->findOrCreatePemeriksaanFisikTelinga(['create'=>false]);
$modelTimpani = $model->findOrCreatePemeriksaanFisikTimpani(['create'=>false]);
$modelHidung = $model->findOrCreatePemeriksaanFisikHidung(['create'=>false]);
$modelLeher = $model->findOrCreatePemeriksaanFisikLeher(['create'=>false]);
$modelMulut = $model->findOrCreatePemeriksaanFisikMulut(['create'=>false]);
$modelThorax = $model->findOrCreatePemeriksaanFisikThorax(['create'=>false]);
$modelAbdomen = $model->findOrCreatePemeriksaanFisikAbdomen(['create'=>false]);
$modelManuferEkstremitas = $model->findOrCreatePemeriksaanFisikManuferEkstremitas(['create'=>false]);



$formMata = $this->render('//pemeriksaan-fisik-mata/_form-detail',['form'=>$form,'model' => $modelMata]);
$formTelinga = $this->render('//pemeriksaan-fisik-telinga/_form-detail',['form'=>$form,'model' => $modelTelinga]);
$formTimpani = $this->render('//pemeriksaan-fisik-timpani/_form-detail',['form'=>$form,'model' => $modelTimpani]);
$formHidung = $this->render('//pemeriksaan-fisik-hidung/_form-detail',['form'=>$form,'model' => $modelHidung]);
$formLeher = $this->render('//pemeriksaan-fisik-leher/_form-detail',['form'=>$form,'model' => $modelLeher]);
$formMulut = $this->render('//pemeriksaan-fisik-mulut/_form-detail',['form'=>$form,'model' => $modelMulut]);
$formThorax = $this->render('//pemeriksaan-fisik-thorax/_form-detail',['form'=>$form,'model' => $modelThorax]);
$formAbdomen = $this->render('//pemeriksaan-fisik-abdomen/_form-detail',['form'=>$form,'model' => $modelAbdomen]);
$formManuferEkstremitas = $this->render('//pemeriksaan-fisik-manufer-ekstremitas/_form-detail',['form'=>$form,'model' => $modelManuferEkstremitas]);



$items = [
    [
        'label'=>'<i class="fa fa"></i> Mata',
        'content'=>$formMata,
        'active'=>true
    ],
    [
        'label'=>'<i class="fa fa"></i> Telinga',
        'content'=>$formTelinga,
    ],
    [
        'label'=>'<i class="fa fa"></i> Timpani',
        'content'=>$formTimpani,
    ],
    [
        'label'=>'<i class="fa fa"></i> Hidung',
        'content'=>$formHidung,
    ],
    [
        'label'=>'<i class="fa fa"></i> Leher',
        'content'=>$formLeher,
    ],
    [
        'label'=>'<i class="fa fa"></i> Mulut',
        'content'=>$formMulut,
    ],
    [
        'label'=>'<i class="fa fa"></i> Thorax',
        'content'=>$formThorax,
    ],
    [
        'label'=>'<i class="fa fa"></i> Abdomen',
        'content'=>$formAbdomen,
    ],
    [
        'label'=>'<i class="fa fa"></i> Manufer Ekstremitas',
        'content'=>$formManuferEkstremitas,
    ],
];

?>

<?php echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_ABOVE,
    'encodeLabels'=>false
]); ?>
