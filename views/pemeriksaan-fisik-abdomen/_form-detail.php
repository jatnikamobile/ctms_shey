<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31/12/2018
 * Time: 16:22
 */

?>

<?= $form->field($model, 'dinding')
	->radioList([ 
		'Normal' => 'Normal', 
		'Nyeri Tekan Epigastrum' => 'Nyeri Tekan Epigastrum', 
		'Lain-lain' => 'Lain-lain' 
	]) ?>

<?= $form->field($model, 'hati')
	->radioList([
		'Normal' => 'Normal', 
		'Hati Teraba' => 'Hati Teraba', 
		'Lain-lain' => 'Lain-lain' 
	]) ?>

<?= $form->field($model, 'limpa')
	->radioList([ 
		'Normal' => 'Normal', 
		'Limpa Membesar' => 'Limpa Membesar', 
		'Lain-lain' => 'Lain-lain' 
	]) ?>

<?= $form->field($model, 'usus')
	->radioList([ 
		'Normal' => 'Normal', 
		'Nyeri Ketok CVA' => 'Nyeri Ketok CVA', 
		'Lain-lain' => 'Lain-lain' 
	]) ?>

<?= $form->field($model, 'hernia')
	->radioList([ 
		'Normal' => 'Normal', 
		'Tidak Normal' => 'Tidak Normal'
	]) ?>

<?= $form->field($model, 'scrotalis')
	->radioList([ 
		'Negativ' => 'Negativ', 
		'Positif' => 'Positif'
	]) ?>